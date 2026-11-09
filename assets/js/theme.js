/**
 * Rashed Hossain — Stitch Animated Theme Main Interactions
 *
 * @package StitchAnimated
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // =========================================================================
  // 1. Toast Notification System
  // =========================================================================
  window.stitchShowToast = function (message, duration = 3000) {
    let toast = document.getElementById('stitch-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'stitch-toast';
      document.body.appendChild(toast);
    }
    toast.innerHTML = `
      <span class="material-symbols-outlined text-[16px] text-tertiary-fixed">check_circle</span>
      <span>${message}</span>
    `;
    toast.classList.add('show');

    clearTimeout(window._toastTimeout);
    window._toastTimeout = setTimeout(() => {
      toast.classList.remove('show');
    }, duration);
  };

  // =========================================================================
  // 2. Click-to-Copy Email with Toast
  // =========================================================================
  document.querySelectorAll('[data-copy-email]').forEach((el) => {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      const email = this.getAttribute('data-copy-email') || 'wprashed@icloud.com';
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(email).then(() => {
          window.stitchShowToast(`Copied ${email} to clipboard`);
        });
      } else {
        const input = document.createElement('input');
        input.value = email;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
        window.stitchShowToast(`Copied ${email} to clipboard`);
      }
    });
  });

  // =========================================================================
  // 3. Live Dhaka UTC+6 Clock
  // =========================================================================
  function updateDhakaClock() {
    const clockEls = document.querySelectorAll('.live-dhaka-clock');
    if (!clockEls.length) return;

    try {
      const now = new Date();
      // Dhaka is UTC+6
      const options = {
        timeZone: 'Asia/Dhaka',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
      };
      const formatter = new Intl.DateTimeFormat('en-GB', options);
      const timeStr = formatter.format(now);

      clockEls.forEach((el) => {
        el.textContent = `DHAKA UTC+6 · ${timeStr}`;
      });
    } catch (e) {
      // Fallback
    }
  }
  if (document.querySelectorAll('.live-dhaka-clock').length > 0) {
    updateDhakaClock();
    setInterval(updateDhakaClock, 1000);
  }

  // =========================================================================
  // 4. Focus Vector (Topic Selector) Chips in Contact Form
  // =========================================================================
  const topicContainer = document.getElementById('topic-selector');
  const topicInput = document.getElementById('selected-topic-input');

  if (topicContainer && topicInput) {
    const buttons = topicContainer.querySelectorAll('button[data-topic]');
    buttons.forEach((btn) => {
      btn.addEventListener('click', function () {
        buttons.forEach((b) => {
          b.classList.remove('bg-primary-container', 'text-on-primary', 'shadow-sm', 'border-primary-container');
          b.classList.add('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');
          const dot = b.querySelector('.topic-dot');
          if (dot) dot.classList.replace('bg-on-primary', 'bg-outline');
        });

        this.classList.remove('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');
        this.classList.add('bg-primary-container', 'text-on-primary', 'shadow-sm', 'border-primary-container');
        const activeDot = this.querySelector('.topic-dot');
        if (activeDot) activeDot.classList.replace('bg-outline', 'bg-on-primary');

        const topicVal = this.getAttribute('data-topic');
        topicInput.value = topicVal;

        // Visual click wave
        this.style.transform = 'scale(0.96)';
        setTimeout(() => {
          this.style.transform = '';
        }, 120);
      });
    });
  }

  // =========================================================================
  // 5. Message Live Character Counter
  // =========================================================================
  const msgInput = document.getElementById('sender-message');
  const charCounter = document.getElementById('msg-char-counter');
  if (msgInput && charCounter) {
    msgInput.addEventListener('input', function () {
      const len = this.value.length;
      charCounter.textContent = `${len} / 1500`;
      if (len > 1400) {
        charCounter.classList.add('text-error');
      } else {
        charCounter.classList.remove('text-error');
      }
    });
  }

  // =========================================================================
  // 6. Direct Dispatch Contact Form AJAX & Database Storage
  // =========================================================================
  const dispatchForm = document.getElementById('stitch-dispatch-form');
  const dispatchTerminal = document.getElementById('dispatch-terminal-status');

  if (dispatchForm && dispatchTerminal) {
    dispatchForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const submitBtn = dispatchForm.querySelector('button[type="submit"]');
      const submitText = submitBtn ? submitBtn.querySelector('.btn-label') : null;
      const submitIcon = submitBtn ? submitBtn.querySelector('.material-symbols-outlined') : null;

      if (submitBtn) submitBtn.disabled = true;
      if (submitText) submitText.textContent = 'Sending message...';

      // Clean status feedback
      dispatchTerminal.classList.remove('hidden');
      dispatchTerminal.innerHTML = `
        <div class="flex items-center gap-2.5 text-on-surface-variant font-label-code text-[12px] py-1">
          <span class="inline-block w-2 h-2 rounded-full bg-primary-container"></span>
          <span>Securing connection &amp; preparing transmission...</span>
        </div>
      `;

      const formData = new FormData(dispatchForm);
      formData.append('action', 'stitch_submit_contact');
      if (window.stitchData && window.stitchData.contactNonce) {
        formData.append('nonce', window.stitchData.contactNonce);
      }

      setTimeout(() => {
        dispatchTerminal.innerHTML = `
          <div class="flex items-center gap-2.5 text-on-surface-variant font-label-code text-[12px] py-1">
            <span class="inline-block w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Delivering inquiry to inbox and site ledger...</span>
          </div>
        `;

        fetch(window.stitchData ? window.stitchData.ajaxUrl : '/wp-admin/admin-ajax.php', {
          method: 'POST',
          body: formData,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.success) {
              const receipt = data.data.receiptId || 'TX-CONFIRMED';
              const time = data.data.timestamp || 'NOW';

              dispatchTerminal.innerHTML = `
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl flex flex-col gap-2">
                  <div class="flex items-center justify-between">
                    <span class="font-label-code text-[12.5px] text-emerald-700 dark:text-emerald-400 font-semibold flex items-center gap-1.5">
                      <span class="material-symbols-outlined text-[17px]">check_circle</span>
                      Message Received
                    </span>
                    <span class="font-label-code text-[11px] px-2 py-0.5 rounded-full bg-surface-container font-medium text-on-surface">${receipt}</span>
                  </div>
                  <p class="font-body-sm text-[13px] text-on-surface leading-relaxed">
                    Thank you for reaching out! Your dispatch has been saved to the database and forwarded to Rashed. You'll hear back within 24 hours.
                  </p>
                  <span class="font-label-code text-[11px] text-outline">Stored timestamp: ${time}</span>
                </div>
              `;

              dispatchForm.reset();
              if (charCounter) charCounter.textContent = '0 / 1500';
              if (submitText) submitText.textContent = 'Message Sent';
              window.stitchShowToast(`Message confirmed (Ref: ${receipt})`);
            } else {
              dispatchTerminal.innerHTML = `
                <div class="p-4 bg-error-container/20 border border-error/40 rounded-xl text-error font-label-code text-[12px] flex items-center gap-2">
                  <span class="material-symbols-outlined text-[18px]">error</span>
                  <span>${data.data.message || 'Transmission failed. Please check inputs or contact directly via email.'}</span>
                </div>
              `;
              if (submitBtn) submitBtn.disabled = false;
              if (submitText) submitText.textContent = 'Retry Send';
            }
          })
          .catch((err) => {
            dispatchTerminal.innerHTML = `
              <div class="p-4 bg-error-container/20 border border-error/40 rounded-xl text-error font-label-code text-[12px] flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">signal_cellular_connected_no_internet_4_bar</span>
                <span>Connection anomaly. Direct line available at wprashed@icloud.com</span>
              </div>
            `;
            if (submitBtn) submitBtn.disabled = false;
            if (submitText) submitText.textContent = 'Retry Send';
          });
      }, 400);
    });
  }

  // =========================================================================
  // 7. Articles Instant Search & Category Filter
  // =========================================================================
  const searchInput = document.getElementById('archive-search');
  const searchClearBtn = document.getElementById('search-clear-btn');
  const filterResetBtn = document.getElementById('filter-reset-btn');
  const filterStatusText = document.getElementById('filter-status-text');
  const filterPills = document.querySelectorAll('.filter-pill');
  const postCards = document.querySelectorAll('.article-dispatch-card');
  const categoryFilters = document.getElementById('category-filters');
  const carouselPrev = document.getElementById('carousel-prev');
  const carouselNext = document.getElementById('carousel-next');
  const fadeLeft = document.getElementById('carousel-fade-left');
  const fadeRight = document.getElementById('carousel-fade-right');

  function updateCarouselControls() {
    if (!categoryFilters) return;
    const scrollLeft = categoryFilters.scrollLeft;
    const maxScroll = categoryFilters.scrollWidth - categoryFilters.clientWidth;
    const canScrollLeft = scrollLeft > 6;
    const canScrollRight = scrollLeft < maxScroll - 6;

    if (carouselPrev) {
      carouselPrev.setAttribute('data-visible', canScrollLeft ? 'true' : 'false');
    }
    if (carouselNext) {
      carouselNext.setAttribute('data-visible', canScrollRight ? 'true' : 'false');
    }
    if (fadeLeft) {
      fadeLeft.style.opacity = canScrollLeft ? '1' : '0';
    }
    if (fadeRight) {
      fadeRight.style.opacity = canScrollRight ? '1' : '0';
    }
  }

  function filterArticles() {
    if (!postCards.length) return;
    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const activePill = document.querySelector('.filter-pill.active');
    const selectedCat = activePill ? activePill.getAttribute('data-cat') : 'all';

    // Toggle search clear button
    if (searchClearBtn) {
      if (query) {
        searchClearBtn.classList.remove('hidden');
        searchClearBtn.classList.add('flex');
      } else {
        searchClearBtn.classList.remove('flex');
        searchClearBtn.classList.add('hidden');
      }
    }

    const featuredLead = document.getElementById('featured-lead-section');
    if (featuredLead) {
      if (query || selectedCat !== 'all') {
        featuredLead.style.display = 'none';
      } else {
        featuredLead.style.display = '';
      }
    }

    let matchCount = 0;

    postCards.forEach((card) => {
      const title = (card.getAttribute('data-title') || '').toLowerCase();
      const excerpt = (card.getAttribute('data-excerpt') || '').toLowerCase();
      const tags = (card.getAttribute('data-tags') || '').toLowerCase();
      const cat = card.getAttribute('data-category') || 'all';

      const matchesQuery = !query || title.includes(query) || excerpt.includes(query) || tags.includes(query);
      const matchesCat = selectedCat === 'all' || cat.includes(selectedCat);

      if (matchesQuery && matchesCat) {
        card.style.display = '';
        card.style.opacity = '1';
        matchCount++;
      } else {
        card.style.display = 'none';
        card.style.opacity = '0';
      }
    });

    // Update status text & reset button
    const isFiltered = query || selectedCat !== 'all';
    if (filterResetBtn) {
      if (isFiltered) {
        filterResetBtn.classList.remove('hidden');
        filterResetBtn.classList.add('inline-flex');
      } else {
        filterResetBtn.classList.remove('inline-flex');
        filterResetBtn.classList.add('hidden');
      }
    }

    if (filterStatusText) {
      if (query && selectedCat !== 'all') {
        const catName = activePill && activePill.querySelector('span') ? activePill.querySelector('span').textContent.trim() : selectedCat;
        filterStatusText.textContent = `Filtered: ${catName} + "${query}" (${matchCount})`;
      } else if (query) {
        filterStatusText.textContent = `Search "${query}" (${matchCount} ${matchCount === 1 ? 'match' : 'matches'})`;
      } else if (selectedCat !== 'all') {
        const catName = activePill && activePill.querySelector('span') ? activePill.querySelector('span').textContent.trim() : selectedCat;
        filterStatusText.textContent = `Topic: ${catName} (${matchCount} ${matchCount === 1 ? 'article' : 'articles'})`;
      } else {
        filterStatusText.textContent = `Showing all ${postCards.length} articles`;
      }
    }

    const noResults = document.getElementById('no-articles-found');
    if (noResults) {
      noResults.style.display = matchCount === 0 ? 'block' : 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterArticles);

    // Keyboard shortcut CMD+K / CTRL+K
    window.addEventListener('keydown', function (e) {
      if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        searchInput.focus();
        window.stitchShowToast('Search index activated');
      }
    });
  }

  if (searchClearBtn) {
    searchClearBtn.addEventListener('click', function () {
      if (searchInput) {
        searchInput.value = '';
        searchInput.focus();
        filterArticles();
      }
    });
  }

  if (filterResetBtn) {
    filterResetBtn.addEventListener('click', function () {
      if (searchInput) searchInput.value = '';
      const allPill = document.querySelector('.filter-pill[data-cat="all"]');
      if (allPill) allPill.click();
      if (categoryFilters) categoryFilters.scrollTo({ left: 0, behavior: 'smooth' });
    });
  }

  if (filterPills.length) {
    filterPills.forEach((pill) => {
      pill.addEventListener('click', function () {
        filterPills.forEach((p) => {
          p.classList.remove('active', 'bg-on-surface', 'text-surface', 'border-transparent', 'shadow-xs');
          p.classList.add('bg-surface-container-low', 'text-on-surface-variant', 'border-outline-variant/40');
        });

        this.classList.add('active', 'bg-on-surface', 'text-surface', 'border-transparent', 'shadow-xs');
        this.classList.remove('bg-surface-container-low', 'text-on-surface-variant', 'border-outline-variant/40');

        this.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });

        filterArticles();
        setTimeout(updateCarouselControls, 300);
      });
    });
  }

  if (categoryFilters) {
    categoryFilters.addEventListener('wheel', (e) => {
      if (e.deltaY !== 0 && !e.shiftKey) {
        e.preventDefault();
        categoryFilters.scrollLeft += e.deltaY;
      }
    }, { passive: false });

    categoryFilters.addEventListener('scroll', updateCarouselControls, { passive: true });
    window.addEventListener('resize', updateCarouselControls, { passive: true });
    setTimeout(updateCarouselControls, 100);

    if (carouselPrev) {
      carouselPrev.addEventListener('click', () => {
        categoryFilters.scrollBy({ left: -240, behavior: 'smooth' });
      });
    }
    if (carouselNext) {
      carouselNext.addEventListener('click', () => {
        categoryFilters.scrollBy({ left: 240, behavior: 'smooth' });
      });
    }
  }

  // =========================================================================
  // 10. Reading Progress Bar (Single Article - Optimized with rAF & passive scroll)
  // =========================================================================
  const progressBar = document.getElementById('reading-progress-fill');
  if (progressBar) {
    let isTicking = false;
    const article = document.querySelector('article');

    function updateProgressBar() {
      if (!article) return;
      const rect = article.getBoundingClientRect();
      const totalHeight = rect.height - window.innerHeight;
      if (totalHeight > 0) {
        const progress = Math.min(Math.max((window.scrollY - article.offsetTop) / totalHeight, 0), 1);
        progressBar.style.width = `${progress * 100}%`;
      }
      isTicking = false;
    }

    window.addEventListener(
      'scroll',
      function () {
        if (!isTicking) {
          window.requestAnimationFrame(updateProgressBar);
          isTicking = true;
        }
      },
      { passive: true }
    );
  }

  // =========================================================================
  // 11. Mobile Menu Toggle
  // =========================================================================
  const menuToggle = document.getElementById('mobile-menu-toggle');
  const mobileNav = document.getElementById('mobile-nav-drawer');
  if (menuToggle && mobileNav) {
    menuToggle.addEventListener('click', function () {
      const isOpen = !mobileNav.classList.contains('hidden');
      if (isOpen) {
        mobileNav.classList.add('hidden');
      } else {
        mobileNav.classList.remove('hidden');
      }
    });
  }

  // =========================================================================
  // 12. Dark / Light Mode System Manager (Device-Default First)
  // =========================================================================
  function initThemeMode() {
    const toggleBtn = document.getElementById('theme-toggle-btn');
    const toggleIcon = document.getElementById('theme-toggle-icon');
    const mobileStatus = document.getElementById('theme-mode-status-text');
    const mobileIcons = document.querySelectorAll('.theme-toggle-mobile-icon');

    function updateIcons(isDark) {
      if (toggleIcon) {
        toggleIcon.textContent = isDark ? 'light_mode' : 'dark_mode';
      }
      if (toggleBtn) {
        toggleBtn.setAttribute('title', isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode');
        toggleBtn.setAttribute('aria-label', isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode');
      }
      mobileIcons.forEach((icon) => {
        icon.textContent = isDark ? 'light_mode' : 'dark_mode';
      });
      if (mobileStatus) {
        const stored = localStorage.getItem('theme');
        if (!stored) {
          mobileStatus.textContent = isDark ? 'Device (Dark)' : 'Device (Light)';
        } else {
          mobileStatus.textContent = isDark ? 'Dark Mode' : 'Light Mode';
        }
      }
    }

    // Determine initial state
    const currentIsDark = document.documentElement.classList.contains('dark');
    updateIcons(currentIsDark);

    // Global toggle function
    window.toggleDarkMode = function () {
      const isDark = document.documentElement.classList.toggle('dark');
      document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      updateIcons(isDark);

      if (typeof window.stitchShowToast === 'function') {
        window.stitchShowToast(isDark ? 'Dark mode activated' : 'Light mode activated');
      }
    };

    // Listen for OS / device preference changes in real-time
    if (window.matchMedia) {
      const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
      mediaQuery.addEventListener('change', function (e) {
        // If user hasn't set an explicit manual override in localStorage, follow system
        if (!localStorage.getItem('theme')) {
          if (e.matches) {
            document.documentElement.classList.add('dark');
            document.documentElement.setAttribute('data-theme', 'dark');
          } else {
            document.documentElement.classList.remove('dark');
            document.documentElement.setAttribute('data-theme', 'light');
          }
          updateIcons(e.matches);
          if (typeof window.stitchShowToast === 'function') {
            window.stitchShowToast(`Adapted to system (${e.matches ? 'Dark' : 'Light'})`);
          }
        }
      });
    }
  }

  initThemeMode();

  // =========================================================================
  // 13. Enhanced Code Blocks with Copy Button & Terminal Chrome
  // =========================================================================
  function initCodeBlockEnhancements() {
    const codeBlocks = document.querySelectorAll('.entry-content pre, .entry-content .wp-block-code');
    if (!codeBlocks.length) return;

    codeBlocks.forEach((block) => {
      // Avoid duplicate wrappers
      if (block.classList.contains('code-wrapped') || block.closest('.code-block-wrapper')) {
        return;
      }
      block.classList.add('code-wrapped');

      // Create outer wrapper
      const wrapper = document.createElement('div');
      wrapper.className = 'code-block-wrapper';

      // Detect language if specified (e.g. class="language-python", "lang-bash", etc.)
      const codeEl = block.querySelector('code') || block;
      let lang = 'CODE';
      const classList = Array.from(codeEl.classList).concat(Array.from(block.classList));
      for (const cls of classList) {
        if (cls.startsWith('language-') || cls.startsWith('lang-')) {
          lang = cls.replace(/^(language-|lang-)/, '').toUpperCase();
          break;
        }
      }

      // If text content starts with pip, npm, wp, etc., infer language
      const rawText = (codeEl.textContent || '').trim();
      if (lang === 'CODE') {
        if (/^(npm|npx|yarn|pnpm|pip|pip3|brew|curl|git|docker|wp\s)/i.test(rawText)) {
          lang = 'BASH';
        } else if (/^<\?php|\bwp_/i.test(rawText)) {
          lang = 'PHP';
        } else if (/^(import |def |class |from |python)/i.test(rawText)) {
          lang = 'PYTHON';
        } else if (/^(const |let |var |function |export )/i.test(rawText)) {
          lang = 'JS';
        } else if (/^(select |insert |update |create table)/i.test(rawText)) {
          lang = 'SQL';
        }
      }

      // Create Mac Terminal Header Bar
      const header = document.createElement('div');
      header.className = 'code-block-header';
      header.innerHTML = `
        <div class="code-block-controls">
          <span class="code-block-dot dot-red"></span>
          <span class="code-block-dot dot-yellow"></span>
          <span class="code-block-dot dot-green"></span>
        </div>
        <div class="code-block-meta">
          <span class="code-block-lang">${lang}</span>
          <button type="button" class="code-copy-btn" aria-label="Copy code to clipboard">
            <span class="material-symbols-outlined text-[14px]">content_copy</span>
            <span>Copy</span>
          </button>
        </div>
      `;

      // Insert wrapper into DOM and move pre into it
      block.parentNode.insertBefore(wrapper, block);
      wrapper.appendChild(header);
      wrapper.appendChild(block);

      // Copy event listener
      const copyBtn = header.querySelector('.code-copy-btn');
      if (copyBtn) {
        copyBtn.addEventListener('click', function () {
          const textToCopy = (block.querySelector('code') || block).innerText.trim();

          function onCopySuccess() {
            copyBtn.classList.add('copied');
            copyBtn.innerHTML = `
              <span class="material-symbols-outlined text-[14px]">check</span>
              <span>Copied!</span>
            `;
            if (typeof window.stitchShowToast === 'function') {
              window.stitchShowToast('Code copied to clipboard');
            }
            setTimeout(() => {
              copyBtn.classList.remove('copied');
              copyBtn.innerHTML = `
                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                <span>Copy</span>
              `;
            }, 2000);
          }

          if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(textToCopy).then(onCopySuccess).catch(() => {
              fallbackCopy(textToCopy, onCopySuccess);
            });
          } else {
            fallbackCopy(textToCopy, onCopySuccess);
          }
        });
      }
    });

    function fallbackCopy(text, cb) {
      const ta = document.createElement('textarea');
      ta.value = text;
      ta.style.position = 'fixed';
      ta.style.opacity = '0';
      document.body.appendChild(ta);
      ta.select();
      try {
        document.execCommand('copy');
        if (cb) cb();
      } catch (err) {}
      document.body.removeChild(ta);
    }
  }

  initCodeBlockEnhancements();

  // =========================================================================
  // 14. Upstream Code Spotlight Tab Switcher (Homepage)
  // =========================================================================
  function initSpotlightSwitcher() {
    const tabs = document.querySelectorAll('#spotlight-tabs .spotlight-btn');
    if (!tabs.length) return;

    const filenames = {
      atomic: 'src/WPConfigTransformer.php',
      hyperdb: 'php/WP_CLI/CommandWithMeta.php',
      etags: 'plugins/optimization-detective/url-metric.php',
    };

    const filenameEl = document.getElementById('spotlight-filename');
    const copyBtn = document.getElementById('spotlight-copy-btn');

    tabs.forEach((tab) => {
      tab.addEventListener('click', function () {
        const target = this.getAttribute('data-spotlight');

        // Toggle active button
        tabs.forEach((t) => {
          t.classList.remove('active', 'bg-primary-container', 'text-on-primary', 'border-primary-container');
          t.classList.add('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');
        });
        this.classList.add('active', 'bg-primary-container', 'text-on-primary', 'border-primary-container');
        this.classList.remove('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');

        // Toggle active snippet
        document.querySelectorAll('.spotlight-snippet').forEach((el) => el.classList.add('hidden'));
        const activeSnippet = document.getElementById(`spotlight-snippet-${target}`);
        if (activeSnippet) {
          activeSnippet.classList.remove('hidden');
        }

        if (filenameEl && filenames[target]) {
          filenameEl.textContent = filenames[target];
        }
      });
    });

    if (copyBtn) {
      copyBtn.addEventListener('click', function () {
        const visibleSnippet = document.querySelector('.spotlight-snippet:not(.hidden) code');
        if (!visibleSnippet) return;
        const text = visibleSnippet.innerText.trim();

        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(text).then(() => {
            copyBtn.classList.add('copied');
            copyBtn.innerHTML = `
              <span class="material-symbols-outlined text-[14px]">check</span>
              <span>Copied!</span>
            `;
            if (typeof window.stitchShowToast === 'function') {
              window.stitchShowToast('Upstream patch copied to clipboard');
            }
            setTimeout(() => {
              copyBtn.classList.remove('copied');
              copyBtn.innerHTML = `
                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                <span>Copy</span>
              `;
            }, 2000);
          });
        }
      });
    }
  }

  initSpotlightSwitcher();

  // =========================================================================
  // 15. Global Spotlight Command Palette (⌘K / Ctrl+K & Search Modal)
  // =========================================================================
  function initGlobalCommandPalette() {
    const modal = document.getElementById('global-command-palette');
    const input = document.getElementById('cmd-palette-input');
    const resultsContainer = document.getElementById('cmd-palette-results');
    const triggerBtn = document.getElementById('cmd-palette-trigger');

    if (!modal || !input || !resultsContainer) return;

    // Search Database
    const catalog = [
      // Navigation
      { type: 'Page', title: 'Home', desc: 'Overview, hero & signature platforms', url: '/', icon: 'home' },
      { type: 'Page', title: 'About Rashed', desc: 'Background, values, setup & photography', url: '/about/', icon: 'person' },
      { type: 'Page', title: 'WordPress Contributions', desc: '11 verified badges, upstream PRs & releases', url: '/contributions/', icon: 'verified' },
      { type: 'Page', title: 'Articles & Writing', desc: 'Architecture notes, tutorials & dispatches', url: '/writing/', icon: 'article' },
      { type: 'Page', title: 'Contact & Inquiries', desc: 'Direct message dispatch terminal', url: '/contact/', icon: 'mail' },

      // Key Badges
      { type: 'Badge', title: 'Core AI Contributor', desc: 'WordPress/ai translation & tooling', url: '/contributions/', icon: 'auto_awesome' },
      { type: 'Badge', title: 'Core Contributor', desc: 'WordPress 6.9, 7.0 & 7.1 releases', url: '/contributions/', icon: 'code' },
      { type: 'Badge', title: 'Meta Contributor', desc: 'WordPress Meta & TV subsystems', url: '/contributions/', icon: 'dns' },
      { type: 'Badge', title: 'Pattern Author', desc: 'Gutenberg block patterns directory', url: '/contributions/', icon: 'view_quilt' },
      { type: 'Badge', title: 'Plugin Developer', desc: 'Public plugins on WordPress.org', url: '/contributions/', icon: 'extension' },
      { type: 'Badge', title: 'WordCamp Organizer & Speaker', desc: 'WordCamp Nepal 2027 & Rajshahi', url: '/contributions/', icon: 'campaign' },

      // Key Projects & Institutional Impact
      { type: 'Project', title: 'Tutor LMS Platform', desc: '#1 WordPress LMS with 100,000+ academies', url: 'https://wordpress.org/plugins/tutor/', icon: 'school', external: true },
      { type: 'Project', title: 'WooCommerce & Jetpack', desc: 'Upstream contributions to 5M+ active installs each', url: 'https://woocommerce.com/', icon: 'shopping_cart', external: true },
      { type: 'Client', title: 'UNICEF Digital Systems', desc: 'Humanitarian & child welfare platforms', url: '/about/', icon: 'public' },
      { type: 'Client', title: 'International Labour Organization (ILO)', desc: 'UN specialized agency policy & web architecture', url: '/about/', icon: 'balance' },
      { type: 'Client', title: 'UCEP Vocational Education', desc: 'Non-profit youth education infrastructure', url: '/about/', icon: 'school' },
      { type: 'Client', title: 'National Government Portals', desc: 'High-security citizen & ministry platforms', url: '/about/', icon: 'account_balance' },
      { type: 'Project', title: 'WordPress Performance Lab', desc: 'Optimization Detective & View Transitions', url: 'https://wordpress.org/plugins/performance-lab/', icon: 'speed', external: true },
      { type: 'Project', title: 'WordPress Performance Lab', desc: 'Optimization modules by WordPress Core Team', url: 'https://github.com/WordPress/performance', icon: 'speed', external: true },
      { type: 'Code', title: 'Atomic wp-config Writes (PR #68)', desc: 'Zero-byte write protection in wp-config-transformer', url: 'https://github.com/wp-cli/wp-config-transformer/pull/68', icon: 'terminal', external: true },
      { type: 'Code', title: 'HyperDB Multi-DB Fix (PR #6432)', desc: 'Enterprise database drop-in resolution', url: 'https://github.com/wp-cli/wp-cli/pull/6432', icon: 'terminal', external: true },

      // Articles
      { type: 'Article', title: 'How to Make AI Coding Assistants Smarter: The Best Python Packages and Tools for Better Performance', desc: 'Python AST analysis, context optimization & tools', url: '/how-to-make-ai-coding-assistants-smarter-the-best-python-packages-and-tools-for-better-performance/', icon: 'menu_book' },
      { type: 'Article', title: 'The Anatomy of a High-Impact WordCamp Contributor Day Table', desc: 'Organizing effective contributor tables', url: '/anatomy-of-high-impact-wordcamp-contributor-day/', icon: 'menu_book' },
      { type: 'Article', title: 'Optimization Detective: Disregard URL Metrics with Mismatched ETags', desc: 'Core Web Vitals telemetry debugging', url: '/optimization-detective-disregard-url-metrics-mismatched-etags/', icon: 'menu_book' },
      { type: 'Article', title: 'Why Open Source Needs More Than Code: The Unsung Infrastructure', desc: 'Support, documentation & triage culture', url: '/why-open-source-needs-more-than-code/', icon: 'menu_book' },
      { type: 'Article', title: 'What Contributing to WordPress Has Taught Me About Open Scale', desc: 'Backwards compatibility as a moral contract', url: '/what-contributing-to-wordpress-has-taught-me/', icon: 'menu_book' },
      { type: 'Article', title: 'Atomic Configurations & Remote Execution: Lessons from WP-CLI', desc: 'Safe file rotation & production workflows', url: '/atomic-configurations-and-remote-execution-wp-cli/', icon: 'menu_book' },
      { type: 'Article', title: 'WordPress AI Initiative: Structuring Knowledge & Content Translation Pipelines', desc: 'AI localization in WordPress', url: '/wordpress-ai-initiative-knowledge-and-translation-pipelines/', icon: 'menu_book' },

      // Actions
      { type: 'Action', title: 'Toggle Dark / Light Theme', desc: 'Switch visual display mode', action: 'theme', icon: 'contrast' },
      { type: 'Action', title: 'Copy Direct Email Address', desc: 'wprashed@icloud.com', action: 'email', icon: 'content_copy' },
      { type: 'Action', title: 'Open WordPress.org Profile', desc: 'profiles.wordpress.org/wprashed', url: 'https://profiles.wordpress.org/wprashed/', icon: 'open_in_new', external: true },
      { type: 'Action', title: 'Open GitHub Profile', desc: 'github.com/wprashed', url: 'https://github.com/wprashed', icon: 'open_in_new', external: true },
    ];

    let selectedIndex = 0;
    let filteredItems = catalog;

    function renderResults(items) {
      filteredItems = items;
      selectedIndex = 0;

      if (!items.length) {
        resultsContainer.innerHTML = `
          <div class="py-8 text-center text-outline font-label-code text-[12px] flex flex-col items-center gap-1">
            <span class="material-symbols-outlined text-[24px]">search_off</span>
            <span>No matching destinations found.</span>
          </div>
        `;
        return;
      }

      resultsContainer.innerHTML = items
        .map((item, idx) => {
          const isSelected = idx === selectedIndex;
          return `
            <div data-index="${idx}" class="cmd-item flex items-center justify-between p-2.5 rounded-xl transition-all cursor-pointer ${
            isSelected ? 'bg-primary-container text-on-primary' : 'hover:bg-surface-container text-on-surface'
          }">
              <div class="flex items-center gap-3 min-w-0">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 ${
                  isSelected ? 'bg-white/20 text-white' : 'bg-surface-container-low text-primary-container'
                }">
                  <span class="material-symbols-outlined text-[17px]">${item.icon}</span>
                </div>
                <div class="min-w-0">
                  <div class="font-body-sm text-[13px] font-medium truncate">${item.title}</div>
                  <div class="text-[11px] truncate ${isSelected ? 'text-white/80' : 'text-outline'}">${item.desc}</div>
                </div>
              </div>
              <div class="flex items-center gap-1.5 shrink-0 ml-3">
                <span class="font-label-code text-[10px] px-2 py-0.5 rounded-full ${
                  isSelected ? 'bg-white/20 text-white' : 'bg-surface-container text-outline'
                }">${item.type}</span>
                ${item.external ? '<span class="material-symbols-outlined text-[13px] opacity-75">north_east</span>' : ''}
              </div>
            </div>
          `;
        })
        .join('');

      // Add click handlers
      resultsContainer.querySelectorAll('.cmd-item').forEach((el) => {
        el.addEventListener('click', function () {
          const idx = parseInt(this.getAttribute('data-index'), 10);
          triggerItem(filteredItems[idx]);
        });
      });
    }

    function triggerItem(item) {
      if (!item) return;

      if (item.action === 'theme') {
        if (typeof window.toggleDarkMode === 'function') {
          window.toggleDarkMode();
        }
        closePalette();
      } else if (item.action === 'email') {
        if (navigator.clipboard) {
          navigator.clipboard.writeText('wprashed@icloud.com');
          if (typeof window.stitchShowToast === 'function') {
            window.stitchShowToast('Copied wprashed@icloud.com to clipboard');
          }
        }
        closePalette();
      } else if (item.url) {
        closePalette();
        if (item.external) {
          window.open(item.url, '_blank', 'noopener,noreferrer');
        } else {
          window.location.href = item.url;
        }
      }
    }

    function updateActiveItem() {
      const items = resultsContainer.querySelectorAll('.cmd-item');
      items.forEach((el, idx) => {
        if (idx === selectedIndex) {
          el.classList.add('bg-primary-container', 'text-on-primary');
          el.classList.remove('hover:bg-surface-container', 'text-on-surface');
          el.scrollIntoView({ block: 'nearest' });
        } else {
          el.classList.remove('bg-primary-container', 'text-on-primary');
          el.classList.add('text-on-surface');
        }
      });
    }

    function openPalette() {
      modal.classList.remove('hidden');
      input.value = '';
      renderResults(catalog);
      setTimeout(() => input.focus(), 50);
    }

    function closePalette() {
      modal.classList.add('hidden');
    }

    if (triggerBtn) {
      triggerBtn.addEventListener('click', openPalette);
    }

    modal.addEventListener('click', function (e) {
      if (e.target === modal) {
        closePalette();
      }
    });

    input.addEventListener('input', function () {
      const rawVal = this.value.trim();
      const q = rawVal.toLowerCase();
      if (!q) {
        renderResults(catalog);
        return;
      }
      const filtered = catalog.filter((item) => {
        return (
          item.title.toLowerCase().includes(q) ||
          item.desc.toLowerCase().includes(q) ||
          item.type.toLowerCase().includes(q)
        );
      });

      // Always append a direct site-wide search option
      filtered.push({
        type: 'Search',
        title: `Search site for "${rawVal}"`,
        desc: 'Execute global site search across all articles & pages',
        url: `/?s=${encodeURIComponent(rawVal)}`,
        icon: 'search',
      });

      renderResults(filtered);
    });

    input.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        if (filteredItems.length) {
          selectedIndex = (selectedIndex + 1) % filteredItems.length;
          updateActiveItem();
        }
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        if (filteredItems.length) {
          selectedIndex = (selectedIndex - 1 + filteredItems.length) % filteredItems.length;
          updateActiveItem();
        }
      } else if (e.key === 'Enter') {
        e.preventDefault();
        if (filteredItems[selectedIndex]) {
          triggerItem(filteredItems[selectedIndex]);
        } else if (input.value.trim()) {
          closePalette();
          window.location.href = `/?s=${encodeURIComponent(input.value.trim())}`;
        }
      } else if (e.key === 'Escape') {
        e.preventDefault();
        closePalette();
      }
    });

    // Global Keyboard Listeners
    window.addEventListener('keydown', function (e) {
      // ⌘K or Ctrl+K
      if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        if (modal.classList.contains('hidden')) {
          openPalette();
        } else {
          closePalette();
        }
      }

      // Escape closes modal
      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closePalette();
      }
    });
  }

  initGlobalCommandPalette();

  // =========================================================================
  // 16. Keyboard Shortcuts Cheat Sheet (?)
  // =========================================================================
  function initKeyboardShortcuts() {
    const modal = document.getElementById('keyboard-shortcuts-modal');
    const closeBtn = document.getElementById('close-shortcuts-modal');
    const dismissBtn = document.getElementById('dismiss-shortcuts-modal');

    if (!modal) return;

    function openModal() {
      modal.classList.remove('hidden');
    }

    function closeModal() {
      modal.classList.add('hidden');
    }

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (dismissBtn) dismissBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeModal();
    });

    window.addEventListener('keydown', function (e) {
      // Ignore if user is currently typing in an input, textarea or contenteditable
      const tag = (e.target && e.target.tagName) ? e.target.tagName.toLowerCase() : '';
      if (tag === 'input' || tag === 'textarea' || (e.target && e.target.isContentEditable)) {
        return;
      }

      if (e.key === '?' || (e.shiftKey && e.key === '/')) {
        e.preventDefault();
        if (modal.classList.contains('hidden')) {
          openModal();
        } else {
          closeModal();
        }
      }

      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeModal();
      }

      // Quick Nav Shortcuts
      if (!e.metaKey && !e.ctrlKey && !e.altKey && modal.classList.contains('hidden')) {
        if (e.key.toLowerCase() === 't') {
          if (typeof window.toggleDarkMode === 'function') window.toggleDarkMode();
        } else if (e.key.toLowerCase() === 'h') {
          window.location.href = '/';
        } else if (e.key.toLowerCase() === 'a') {
          window.location.href = '/about/';
        } else if (e.key.toLowerCase() === 'c') {
          window.location.href = '/contributions/';
        } else if (e.key.toLowerCase() === 'w') {
          window.location.href = '/writing/';
        }
      }
    });
  }

  initKeyboardShortcuts();

  // =========================================================================
  // 13. Mathematical Typography Rendering (KaTeX)
  // =========================================================================
  function initMathRendering() {
    function renderMath() {
      if (typeof window.renderMathInElement !== 'function') return false;
      const target = document.querySelector('.entry-content') || document.querySelector('article');
      if (!target) return false;

      window.renderMathInElement(target, {
        delimiters: [
          { left: '$$', right: '$$', display: true },
          { left: '\\[', right: '\\]', display: true },
          { left: '\\(', right: '\\)', display: false },
          { left: '\\begin{equation}', right: '\\end{equation}', display: true },
          { left: '\\begin{align}', right: '\\end{align}', display: true },
          { left: '\\begin{alignat}', right: '\\end{alignat}', display: true },
          { left: '\\begin{gather}', right: '\\end{gather}', display: true },
          { left: '\\begin{CD}', right: '\\end{CD}', display: true }
        ],
        ignoredTags: ['script', 'noscript', 'style', 'textarea', 'pre', 'code', 'option'],
        throwOnError: false,
        errorColor: '#ef4444',
        preProcess: function (math) {
          return math
            .replace(/[\u2013\u2014]/g, '-')
            .replace(/[\u2018\u2019]/g, "'")
            .replace(/&ndash;/g, '-')
            .replace(/&mdash;/g, '-')
            .replace(/&#8211;/g, '-')
            .replace(/&#8212;/g, '-')
            .replace(/&#8217;/g, "'")
            .trim();
        }
      });
      return true;
    }

    if (!renderMath()) {
      window.addEventListener('load', renderMath, { once: true });
    }
  }

  initMathRendering();
});
