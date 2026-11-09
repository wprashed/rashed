<?php
/**
 * Front Page Template — Rashed Hossain Stitch Animated
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$wporg_url     = get_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );
$github_url    = get_theme_mod( 'stitch_github_url', 'https://github.com/wprashed' );
$linkedin_url  = get_theme_mod( 'stitch_linkedin_url', 'https://www.linkedin.com/in/wprashedh/' );
$page_about    = stitch_get_page_cached( 'about' );
$page_contrib  = stitch_get_page_cached( 'contributions' ) ?: stitch_get_page_cached( 'wp-contributions' );
$page_writing  = stitch_get_page_cached( 'writing' ) ?: stitch_get_page_cached( 'articles' );
$page_contact  = stitch_get_page_cached( 'contact' );

$contact_url   = $page_contact ? get_permalink( $page_contact ) : home_url( '/contact/' );
$about_url     = $page_about ? get_permalink( $page_about ) : home_url( '/about/' );
$contrib_url   = $page_contrib ? get_permalink( $page_contrib ) : home_url( '/contributions/' );
$articles_url  = $page_writing ? get_permalink( $page_writing ) : home_url( '/writing/' );

$hero_eyebrow  = get_theme_mod( 'stitch_hero_eyebrow', 'Core Contributor · AI & Automation · Product Management' );
$hero_title    = get_theme_mod( 'stitch_hero_title', 'Hi, I’m Rashed Hossain — <span class="text-primary-container italic font-serif">Software Engineer</span>, Tech Support Lead &amp; AI Specialist.' );
$hero_bio      = get_theme_mod( 'stitch_hero_bio', 'Over a decade building and scaling for the open web. Tech Support Lead at <strong class="text-on-surface font-medium">Ollyo &amp; Themeum</strong> (Tutor LMS), specializing in <strong class="text-on-surface font-medium">AI systems, workflow automation, product management, and data analysis</strong>. Contributing upstream to WordPress Core and architecting solutions that empower millions worldwide.' );

$photo_badge   = get_theme_mod( 'stitch_hero_photo_badge', 'Rashed Hossain · Engineering & AI' );

// Verified Upstream Metrics
$m1_val   = get_theme_mod( 'stitch_metric1_val', 'Millions' );
$m1_sub   = get_theme_mod( 'stitch_metric1_sub', 'Websites Powered' );
$m1_desc  = get_theme_mod( 'stitch_metric1_desc', 'WordPress Core, WooCommerce, Jetpack, Three.js, Vue.js & open-source projects' );

$m2_val   = get_theme_mod( 'stitch_metric2_val', '60+' );
$m2_sub   = get_theme_mod( 'stitch_metric2_sub', 'Plugins Built & Supported' );
$m2_desc  = get_theme_mod( 'stitch_metric2_desc', 'WordPress.org Plugin Directory' );

$m3_val   = get_theme_mod( 'stitch_metric3_val', '3' );
$m3_sub   = get_theme_mod( 'stitch_metric3_sub', 'Core Releases Credited' );
$m3_desc  = get_theme_mod( 'stitch_metric3_desc', 'WordPress 6.9, 7.0 & 7.1' );

$m4_val   = get_theme_mod( 'stitch_metric4_val', '11' );
$m4_sub   = get_theme_mod( 'stitch_metric4_sub', 'Verified Badges' );
$m4_desc  = get_theme_mod( 'stitch_metric4_desc', 'Core, AI, Community, Support & Polyglots' );

// CTA Section
$cta_eyebrow = get_theme_mod( 'stitch_cta_eyebrow', 'Get in Touch' );
$cta_title   = get_theme_mod( 'stitch_cta_title', "Have a project or talk in mind?\nLet's connect." );
$cta_desc    = get_theme_mod( 'stitch_cta_desc', 'I’m always open to discussing WordPress architecture, open source contributions, WordCamp keynotes, or consulting.' );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<!-- =================================================================
		     SECTION 1: HERO & ARCHITECTURAL IDENTITY
		     ================================================================= -->
		<section class="relative px-6 md:px-12 pt-10 pb-14 bg-surface-container-lowest overflow-hidden border-b border-surface-container-high/60">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center max-w-5xl">
				
				<!-- Left Editorial Column -->
				<div class="lg:col-span-7 flex flex-col gap-5">
					
					<!-- Minimal Category Eyebrow -->
					<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 self-start">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
						<span><?php echo esc_html( $hero_eyebrow ); ?></span>
					</div>

					<!-- Primary Headline -->
					<h1 class="font-display text-[40px] sm:text-[50px] lg:text-[58px] text-on-surface leading-[1.08] tracking-[-0.025em] font-normal">
						<?php echo wp_kses_post( $hero_title ); ?>
					</h1>

					<!-- Narrative Bio -->
					<div class="font-body-md text-base sm:text-lg text-on-surface-variant leading-relaxed max-w-2xl font-normal">
						<?php echo wp_kses_post( $hero_bio ); ?>
					</div>

					<!-- Capabilities & Focus Vectors (No Location Mention) -->
					<div class="flex flex-wrap items-center gap-2.5 pt-1 font-label-code text-[11.5px] text-on-surface-variant">
						<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface font-medium border border-outline-variant/40">
							<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
							<span>AI &amp; Workflow Automation</span>
						</span>
						<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface font-medium border border-outline-variant/40">
							<span>Product Management &amp; Data Analysis</span>
						</span>
						<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-container/10 text-primary-container font-medium border border-primary-container/20">
							<span>10+ Years Open Web</span>
						</span>
					</div>

					<!-- Minimal Actions -->
					<div class="flex flex-wrap items-center gap-3 pt-2">
						<a href="<?php echo esc_url( $contrib_url ); ?>" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-on-surface text-surface hover:bg-on-surface/90 font-body-sm font-medium transition-all shadow-sm group text-[13.5px]">
							<span>View Contributions</span>
							<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">arrow_outward</span>
						</a>
						<a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface font-body-sm font-medium border border-outline-variant/40 transition-all text-[13.5px]">
							<span>Get in Touch</span>
							<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
						</a>
						<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3 py-3 text-on-surface-variant hover:text-on-surface font-label-code text-[12px] transition-colors">
							<span>.org/wprashed</span>
							<span class="material-symbols-outlined text-[14px]">north_east</span>
						</a>
					</div>

				</div>

				<!-- Right Architectural Portrait Plate -->
				<div class="lg:col-span-5 flex justify-center lg:justify-end">
					<div class="relative w-full max-w-sm bg-surface-container-lowest p-3 rounded-2xl shadow-sm border border-outline-variant/50 transition-all hover:border-outline-variant/80 group">
						
						<!-- Subtle Corner Crosshairs -->
						<span class="absolute top-2 left-2 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>
						<span class="absolute top-2 right-2 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>

						<div class="relative aspect-square w-full overflow-hidden rounded-xl bg-surface-container">
							<picture>
								<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain-400.webp' ); ?> 400w, <?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.webp' ); ?> 800w" sizes="(max-width: 640px) 320px, 384px">
								<img src="<?php echo esc_url( stitch_get_hero_avatar() ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'stitch_brand_name', 'Rashed Hossain' ) ); ?>" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-[1.02]" width="400" height="400" fetchpriority="high" loading="eager" decoding="async">
							</picture>
							<div class="absolute bottom-2 left-2 px-2.5 py-0.5 bg-on-surface/85 backdrop-blur-md rounded-full text-surface font-label-code text-[10px] tracking-wider uppercase font-medium">
								<?php echo esc_html( $photo_badge ); ?>
							</div>
						</div>

						<div class="flex items-center justify-between pt-2.5 px-1 font-label-code text-[11px]">
							<span class="text-outline">WordPress Core Contributor</span>
							<span class="text-emerald-700 dark:text-emerald-400 font-medium flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
								Active Contributor
							</span>
						</div>

					</div>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 2: ARCHITECTURAL METRICS (NUMERICAL SCALE)
		     ================================================================= -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-8">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							At a Glance
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Work and community impact.
						</h2>
					</div>
					<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-on-surface-variant hover:text-on-surface font-label-code text-[11.5px] transition-colors">
						<span>View WordPress.org Profile</span>
						<span class="material-symbols-outlined text-[14px]">north_east</span>
					</a>
				</div>

				<!-- 4-Column Minimal Metric Ledger -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
					
					<!-- Card 1: Scale -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs">
						<div>
							<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">01 // GLOBAL IMPACT</span>
							<div class="my-2.5 font-display text-[44px] sm:text-[48px] text-on-surface font-normal leading-none">
								<?php echo esc_html( $m1_val ); ?>
							</div>
							<h3 class="font-body-sm text-[14px] font-semibold text-on-surface">
								<?php echo esc_html( $m1_sub ); ?>
							</h3>
							<p class="font-body-sm text-[12px] text-on-surface-variant mt-1.5 leading-relaxed">
								<?php echo esc_html( $m1_desc ); ?>
							</p>
						</div>
						<div class="pt-3 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-emerald-700 dark:text-emerald-400 font-medium flex items-center gap-1.5">
							<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
							Active Production Scale
						</div>
					</div>

					<!-- Card 2: Software Artifacts -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs">
						<div>
							<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">02 // PLUGINS</span>
							<div class="my-2.5 font-display text-[44px] sm:text-[48px] text-on-surface font-normal leading-none">
								<?php echo esc_html( $m2_val ); ?>
							</div>
							<h3 class="font-body-sm text-[14px] font-semibold text-on-surface">
								<?php echo esc_html( $m2_sub ); ?>
							</h3>
							<p class="font-body-sm text-[12px] text-on-surface-variant mt-1 leading-relaxed">
								<?php echo esc_html( $m2_desc ); ?>
							</p>
						</div>
						<div class="pt-3 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							WordPress.org Plugins
						</div>
					</div>

					<!-- Card 3: Core Releases -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs">
						<div>
							<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">03 // CORE RELEASES</span>
							<div class="my-2.5 font-display text-[44px] sm:text-[48px] text-on-surface font-normal leading-none">
								<?php echo esc_html( $m3_val ); ?>
							</div>
							<h3 class="font-body-sm text-[14px] font-semibold text-on-surface">
								<?php echo esc_html( $m3_sub ); ?>
							</h3>
							<p class="font-body-sm text-[12px] text-on-surface-variant mt-1 leading-relaxed">
								<?php echo esc_html( $m3_desc ); ?>
							</p>
						</div>
						<div class="pt-3 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							WordPress Credits
						</div>
					</div>

					<!-- Card 4: Accreditations -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs">
						<div>
							<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">04 // COMMUNITY</span>
							<div class="my-2.5 font-display text-[44px] sm:text-[48px] text-on-surface font-normal leading-none">
								<?php echo esc_html( $m4_val ); ?>
							</div>
							<h3 class="font-body-sm text-[14px] font-semibold text-on-surface">
								<?php echo esc_html( $m4_sub ); ?>
							</h3>
							<p class="font-body-sm text-[12px] text-on-surface-variant mt-1 leading-relaxed">
								<?php echo esc_html( $m4_desc ); ?>
							</p>
						</div>
						<div class="pt-3 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							Community Badges
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 3: ECOSYSTEM RECOGNITION BANNER (11 Badges & Upstream PRs)
		     ================================================================= -->
		<section class="px-6 md:px-12 py-10 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="max-w-5xl">
				
				<div class="relative p-6 sm:p-8 rounded-2xl bg-surface-container-low/60 border border-outline-variant/50 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col gap-6 group">
					
					<!-- Top Architectural Ledger Bar -->
					<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-surface-container-high/60">
						<div class="flex items-center gap-3">
							<div class="w-7 h-7 rounded-full bg-[#0073aa]/10 dark:bg-[#0073aa]/20 border border-[#0073aa]/30 text-[#0073aa] dark:text-[#38bdf8] flex items-center justify-center shrink-0 shadow-xs">
								<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"/>
								</svg>
							</div>
							<span class="font-label-meta text-[11px] uppercase tracking-wider text-outline font-semibold">
								WordPress.org Verified Track Record
							</span>
						</div>
						<div class="flex items-center gap-2">
							<span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-label-code text-[11px] font-semibold border border-emerald-500/20">
								11 Official Badges
							</span>
							<span class="text-outline-variant hidden sm:inline">·</span>
							<span class="font-label-code text-[11px] text-on-surface-variant hidden sm:inline">
								3 Core Releases Credited
							</span>
						</div>
					</div>

					<!-- Main Editorial Content & Narrative -->
					<div class="flex flex-col gap-2">
						<h3 class="font-display text-xl sm:text-2xl text-on-surface font-semibold tracking-tight">
							Recognized Across WordPress Core, AI &amp; Open-Source Ecosystems
						</h3>
						<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed max-w-3xl">
							Active upstream contributor across WordPress Core (6.9, 7.0, 7.1), WooCommerce, Jetpack, the official WordPress AI Initiative, Three.js, Vue.js, WordCamp organizing, and global open-source ecosystems.
						</p>
					</div>

					<!-- Visual Micro-Badges Ribbon (Replacing the boring text list) -->
					<div class="flex flex-wrap items-center gap-2 pt-1">
						<!-- Core -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#d63638]/40 bg-[#d63638]/10 text-[#d63638] dark:text-[#f87171] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
							<span>Core Contributor ('25)</span>
						</span>
						<!-- Core AI -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#7b2cbf]/40 bg-[#7b2cbf]/10 text-[#7b2cbf] dark:text-[#c084fc] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"></rect><path d="M12 7l1 2 2 1-2 1-1 2-1-2-2-1 2-1z" fill="currentColor"></path></svg>
							<span>Core AI ('26)</span>
						</span>
						<!-- Meta -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#50575e]/40 bg-[#50575e]/10 text-[#50575e] dark:text-[#94a3b8] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="3" width="6" height="4" rx="1"></rect><rect x="2" y="17" width="5" height="4" rx="1"></rect><rect x="17" y="17" width="5" height="4" rx="1"></rect><path d="M12 7v5M4.5 17v-3h15v3M12 12v5"></path></svg>
							<span>Meta ('26)</span>
						</span>
						<!-- Gutenberg Patterns -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#503291]/40 bg-[#503291]/10 text-[#503291] dark:text-[#a5b4fc] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="12" x2="21" y2="12"></line><line x1="12" y1="12" x2="12" y2="21"></line></svg>
							<span>Pattern Author ('26)</span>
						</span>
						<!-- Plugins -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#d94f00]/40 bg-[#d94f00]/10 text-[#d94f00] dark:text-[#fdba74] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M8 2v4M16 2v4"></path><rect x="5" y="6" width="14" height="7" rx="2"></rect></svg>
							<span>Plugin Developer</span>
						</span>
						<!-- WordCamp -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#d97706]/40 bg-[#d97706]/10 text-[#d97706] dark:text-[#fde047] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11v3a1 1 0 0 0 1 1h2l5 4V5L6 9H4a1 1 0 0 0-1 1z"></path><path d="M15 9a4 4 0 0 1 0 6"></path></svg>
							<span>WordCamp Organizer &amp; Speaker</span>
						</span>
						<!-- Support -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#0085ba]/40 bg-[#0085ba]/10 text-[#0085ba] dark:text-[#7dd3fc] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
							<span>Support ('26)</span>
						</span>
						<!-- Polyglots -->
						<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-[#9b1364]/40 bg-[#9b1364]/10 text-[#9b1364] dark:text-[#f472b6] font-label-code text-[11px] font-medium">
							<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 8l6 12M11 8L5 20M3 16h8"></path><path d="M14 4h7M17.5 4v4"></path></svg>
							<span>Polyglots Editor</span>
						</span>
					</div>

					<!-- Bottom Action Footer Strip -->
					<div class="pt-4 border-t border-surface-container-high/60 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
						<span class="font-label-code text-[11px] text-outline">
							profiles.wordpress.org/wprashed
						</span>
						<a href="<?php echo esc_url( home_url( '/contributions/' ) ); ?>" class="inline-flex items-center gap-2 font-label-code text-[12px] font-semibold text-primary-container hover:text-primary group-hover:translate-x-0.5 transition-all">
							<span>Explore Full Contribution Ledger &amp; Badges</span>
							<span class="material-symbols-outlined text-[15px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
						</a>
					</div>

				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 4: SIGNATURE PLATFORMS & SCALE
		     ================================================================= -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-8">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Featured Code Repositories
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Projects &amp; Open-Source Repositories I Build
						</h2>
					</div>
					<div class="flex items-center gap-3">
						<span class="font-label-code text-[11px] text-on-surface-variant">
							Powering Millions of Websites
						</span>
						<a href="https://github.com/wprashed" target="_blank" rel="noopener noreferrer" class="font-label-code text-[11.5px] text-primary-container hover:underline inline-flex items-center gap-1">
							<span>github.com/wprashed</span>
							<span class="material-symbols-outlined text-[14px]">north_east</span>
						</a>
					</div>
				</div>

				<!-- 6-Card Official GitHub Repositories Grid -->
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
					
					<!-- Card 1: WordPress/wordpress-develop -->
					<a href="https://github.com/WordPress/wordpress-develop" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">01 // WORDPRESS CORE</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								WordPress Core
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 font-label-code text-[11px] font-semibold">
								<span>30 PRs · Major Core Releases</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Upstream contributions to WordPress Core powering over 43% of the internet. Authoring patches for editor components, media routers, internationalization, and platform stability across WordPress 6.9, 7.0, and 7.1.
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>WordPress/wordpress-develop</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">Core Contributor ↗</span>
						</div>
					</a>

					<!-- Card 2: WordPress/performance -->
					<a href="https://github.com/WordPress/performance" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">02 // PERFORMANCE LAB</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								Performance Suite
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-label-code text-[11px] font-semibold">
								<span>Optimization Detective &amp; View Transitions</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Official performance testbed created by the WordPress Performance Team. Authored pull requests improving Optimization Detective tag metrics validation, mismatched ETag cache transients, and View Transitions UI filter hooks.
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>WordPress/performance</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">8 PRs Authored ↗</span>
						</div>
					</a>

					<!-- Card 3: WordPress/gutenberg -->
					<a href="https://github.com/WordPress/gutenberg" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">03 // BLOCK EDITOR</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								Gutenberg &amp; DataViews
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-[#7f54b3]/10 text-[#7f54b3] dark:text-[#c084fc] font-label-code text-[11px] font-semibold">
								<span>UI Architecture &amp; TypeScript</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Contributed to WordPress's block-based editing engine and modern DataViews interface. Authored fixes for dialog focus popover containment and Field.sort TypeScript type definitions.
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>WordPress/gutenberg</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">Merged Upstream ↗</span>
						</div>
					</a>

					<!-- Card 4: WordPress/ai & Playground -->
					<a href="https://github.com/WordPress/ai" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">04 // AI &amp; WEBASSEMBLY</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								WordPress AI &amp; Playground
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-[#7b2cbf]/10 text-[#7b2cbf] dark:text-[#c084fc] font-label-code text-[11px] font-semibold">
								<span>Core AI Guidelines &amp; WASM</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Upstream contributions integrating Content Translation guidelines and knowledge systems for the official WordPress AI initiative, and Blueprints multisite REQUEST_URI scoping in WordPress Playground (in-browser WASM).
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>WordPress/ai · Playground</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">Merged Upstream ↗</span>
						</div>
					</a>

					<!-- Card 5: wp-cli Suite -->
					<a href="https://github.com/wp-cli/wp-cli" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">05 // CLI TOOLING</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								WP-CLI &amp; Config Tools
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 font-label-code text-[11px] font-semibold">
								<span>Atomic Config &amp; CLI Commands</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Engineered atomic temporary file writing in wp-config-transformer to prevent corruption on write failures, improved custom remote SSH binary parameters, and added multi-ID embed cache clearing.
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>wp-cli/wp-cli · transformer</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">Upstream Contributor ↗</span>
						</div>
					</a>

					<!-- Card 6: Tutor LMS Platform -->
					<a href="https://github.com/themeum/tutor" target="_blank" rel="noopener noreferrer" class="group relative bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col justify-between">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] text-outline uppercase font-medium">06 // LMS PLATFORM</span>
								<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-normal mb-2 group-hover:text-primary-container transition-colors">
								Tutor LMS Platform
							</h3>
							<div class="inline-flex items-center gap-1.5 mb-3 px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-label-code text-[11px] font-semibold">
								<span>#1 WordPress LMS · 100K+ Sites</span>
							</div>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Leading technical support operations and contributing to the core codebase of the leading WordPress LMS plugin. Engineered integrations, social metadata sanitizer fixes, and multisite course architecture.
							</p>
						</div>
						<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>Tech Support Lead · Ollyo</span>
							<span class="text-on-surface group-hover:text-primary-container font-medium">themeum/tutor ↗</span>
						</div>
					</a>

				</div>

				<!-- Extra GitHub Repos Banner -->
				<div class="mt-6 p-4 rounded-xl bg-surface-container-low/50 border border-outline-variant/40 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-on-surface-variant font-label-code text-[12px]">
					<div class="flex flex-wrap items-center gap-2">
						<span class="text-on-surface font-medium">Also contributing to:</span>
						<a href="https://github.com/woocommerce/woocommerce" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container underline underline-offset-2">woocommerce/woocommerce</a>
						<span class="text-outline-variant">·</span>
						<a href="https://github.com/Automattic/jetpack" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container underline underline-offset-2">Automattic/jetpack</a>
						<span class="text-outline-variant">·</span>
						<a href="https://github.com/WordPress/openverse" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container underline underline-offset-2">WordPress/openverse</a>
						<span class="text-outline-variant">·</span>
						<a href="https://github.com/WordPress/wordcamp.org" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container underline underline-offset-2">WordPress/wordcamp.org</a>
						<span class="text-outline-variant">·</span>
						<a href="https://github.com/wprashed/lms-security-dashboard" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container underline underline-offset-2">wprashed/lms-security-dashboard</a>
					</div>
					<a href="https://github.com/wprashed" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-primary-container font-semibold hover:underline shrink-0">
						<span>View 130+ PRs on GitHub</span>
						<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
					</a>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 5: GLOBAL CLIENTS & INSTITUTIONAL TRUST
		     ================================================================= -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-8">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 mb-2">
							<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
							<span>Global Clients &amp; Enterprise Impact</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Trusted by Global Organizations, Enterprises &amp; Governments
						</h2>
						<p class="font-body-sm text-[13.5px] text-on-surface-variant mt-1.5 max-w-2xl leading-relaxed">
							Delivering robust digital solutions, accessible web architecture, and mission-critical systems for international agencies, leading corporations across the USA and Gulf region, and sovereign national governments.
						</p>
					</div>
					<div class="font-label-code text-[11px] text-outline flex items-center gap-2 shrink-0">
						<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
						<span>Proven Enterprise Delivery</span>
					</div>
				</div>

				<!-- 7-Card Institutional & Enterprise Trust Grid -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
					
					<!-- 1. UNICEF -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#1cabe2]/10 text-[#1cabe2] dark:text-[#38bdf8] font-label-code text-[10.5px] font-semibold border border-[#1cabe2]/20">
									United Nations Agency
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">public</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">UNICEF</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Engineered digital platforms, accessible tools, and scalable web solutions supporting children’s health, education, and humanitarian initiatives globally.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>United Nations Children's Fund</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 2. ILO (International Labour Organization) -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#1e40af]/10 text-[#1e40af] dark:text-[#93c5fd] font-label-code text-[10.5px] font-semibold border border-[#1e40af]/20">
									UN Specialized Agency
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">balance</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">International Labour Organization</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Developed reliable technical web architecture, international policy portals, and multilingual communication platforms advancing labor standards and worker rights worldwide.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>ILO // Geneva &amp; Global Missions</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 3. Leading US Enterprises -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#2563eb]/10 text-[#2563eb] dark:text-[#60a5fa] font-label-code text-[10.5px] font-semibold border border-[#2563eb]/20">
									United States Enterprise
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">corporate_fare</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">Leading US Enterprises</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Partnered with prominent United States corporations, technology ventures, and high-growth SaaS firms across the US to deliver resilient web architectures, automated workflows, and high-performance digital products.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>USA Corporate &amp; Tech Scale</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 4. Gulf Regional Conglomerates -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#0d9488]/10 text-[#0d9488] dark:text-[#2dd4bf] font-label-code text-[10.5px] font-semibold border border-[#0d9488]/20">
									Gulf &amp; GCC Region
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">location_city</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">Gulf Regional Conglomerates</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Architected mission-critical web applications, commercial digital solutions, and scalable enterprise portals for major holding groups and established businesses across the UAE, Saudi Arabia, and the Gulf region.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>UAE, Saudi Arabia &amp; GCC</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 5. UCEP -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#059669]/10 text-[#059669] dark:text-[#34d399] font-label-code text-[10.5px] font-semibold border border-[#059669]/20">
									Education &amp; Social Impact
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">school</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">UCEP</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Built institutional digital infrastructure and educational platforms empowering underprivileged youth with technical skills, vocational learning, and employment pathways.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>Underprivileged Children's Programs</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 6. WasteSafe -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#d97706]/10 text-[#d97706] dark:text-[#fbbf24] font-label-code text-[10.5px] font-semibold border border-[#d97706]/20">
									International Research
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">eco</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">WasteSafe</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Engineered research dissemination portals, academic conference platforms, and digital tools for the International Conference on Solid and Hazardous Waste Management.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>Environmental Research Consortium</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 7. National Governments -->
					<div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group sm:col-span-2 lg:col-span-3">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#7c3aed]/10 text-[#7c3aed] dark:text-[#c084fc] font-label-code text-[10.5px] font-semibold border border-[#7c3aed]/20">
									Public Sector &amp; Ministries
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">account_balance</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">Multiple National Governments</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Developed mission-critical government web portals, high-security public sector systems, and high-concurrency citizen-facing digital services across multiple countries, ensuring strict accessibility standards, data protection, and zero-downtime reliability.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex flex-wrap items-center justify-between gap-2">
							<div class="flex items-center gap-3">
								<span>Civil Portals</span>
								<span>·</span>
								<span>National Ministries</span>
								<span>·</span>
								<span>Public Digital Services</span>
								<span>·</span>
								<span>Strict Compliance &amp; Accessibility</span>
							</div>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified_user</span>
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 6: LATEST DISPATCHES & WRITING
		     ================================================================= -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-8">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Writing &amp; Notes
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Recent articles and thoughts.
						</h2>
					</div>
					<a href="<?php echo esc_url( $articles_url ); ?>" class="font-label-code text-[11.5px] text-on-surface-variant hover:text-on-surface transition-colors inline-flex items-center gap-1 group">
						<span>View all articles</span>
						<span class="material-symbols-outlined text-[15px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
					</a>
				</div>

				<!-- Dynamic Posts Query -->
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
					<?php
					$recent_posts = new WP_Query(
						array(
							'posts_per_page'         => 3,
							'post_status'            => 'publish',
							'ignore_sticky_posts'    => true,
							'no_found_rows'          => true,
							'update_post_meta_cache' => true,
							'update_post_term_cache' => true,
						)
					);

					if ( $recent_posts->have_posts() ) :
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
							$categories = get_the_category();
							$cat_name   = ! empty( $categories ) ? $categories[0]->name : 'Engineering';
							$read_time  = stitch_get_reading_time( get_the_ID() );
							?>
							<article class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between hover:border-outline-variant/80 transition-all group">
								<div class="flex flex-col gap-2.5">
									<div class="flex items-center justify-between font-label-code text-[11px] text-on-surface-variant">
										<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface font-medium"><?php echo esc_html( $cat_name ); ?></span>
										<span><?php echo esc_html( $read_time ); ?> MIN READ</span>
									</div>
									<h3 class="font-display text-xl text-on-surface group-hover:text-primary-container transition-colors line-clamp-2 leading-snug">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
									<p class="font-body-sm text-[13px] text-on-surface-variant line-clamp-3 leading-relaxed">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?>
									</p>
								</div>
								<div class="pt-4 mt-5 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
									<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
									<span class="text-on-surface group-hover:text-primary-container inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-all font-medium">
										<span>Read Dispatch</span>
										<span class="material-symbols-outlined text-[14px]">north_east</span>
									</span>
								</div>
							</article>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<div class="col-span-full p-8 rounded-2xl bg-surface-container-lowest border border-dashed border-outline-variant/60 text-center flex flex-col items-center justify-center gap-2">
							<span class="material-symbols-outlined text-[24px] text-outline">edit_note</span>
							<h3 class="font-display text-lg text-on-surface">No dispatches published yet</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant">
								Publish your first post in WordPress to populate this feed.
							</p>
						</div>
						<?php
					endif;
					?>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 7: DIRECT ENGAGEMENT & DISPATCH CTA
		     ================================================================= -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest">
			<div class="max-w-5xl bg-surface-container-low/40 p-8 sm:p-10 md:p-12 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
				
				<div class="max-w-xl">
					<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-2 font-medium">
						<?php echo esc_html( $cta_eyebrow ); ?>
					</span>
					<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal mb-3">
						<?php
						$title_lines = explode( "\n", $cta_title );
						if ( count( $title_lines ) > 1 ) :
							echo esc_html( $title_lines[0] ) . '<br><span class="italic font-serif text-primary-container">' . esc_html( $title_lines[1] ) . '</span>';
						else :
							echo wp_kses_post( $cta_title );
						endif;
						?>
					</h2>
					<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed">
						<?php echo wp_kses_post( $cta_desc ); ?>
					</p>
				</div>

				<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0 w-full sm:w-auto">
					<a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-on-surface text-surface hover:bg-on-surface/90 font-body-sm font-medium shadow-sm transition-all text-[13.5px] group">
						<span>Start a Conversation</span>
						<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
					</a>
					<button type="button" data-copy-email="<?php echo esc_attr( get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' ) ); ?>" class="inline-flex items-center justify-center gap-1.5 px-5 py-3 rounded-full bg-surface-container text-on-surface hover:bg-surface-container-high font-label-code text-[12px] border border-outline-variant/40 transition-all cursor-pointer" title="Copy Email">
						<span class="material-symbols-outlined text-[15px]">content_copy</span>
						<span>Copy Email</span>
					</button>
				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
