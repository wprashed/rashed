<?php
/**
 * Template Name: WP Contributions
 * Description: Interactive showcase of WordPress Core contributions, Trac tickets, ecosystem badges, and plugins.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$wporg_url    = get_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );
$page_contact = get_page_by_path( 'contact' );
$contact_url  = $page_contact ? get_permalink( $page_contact ) : home_url( '/contact/' );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<!-- SECTION 1: MASTHEAD & METRICS (AIRY ARCHITECTURAL HERO + DEEP CARBON TELEMETRY STRIP) -->
		<section class="relative px-6 md:px-12 pt-12 pb-12 overflow-hidden bg-surface-container-lowest border-b border-surface-container-high/60">
			<!-- Subtle Top Radial Aura -->
			<div class="pointer-events-none absolute -top-24 right-1/4 w-96 h-96 bg-primary/5 rounded-full blur-3xl opacity-60"></div>

			<div class="relative z-10 flex flex-col gap-8 max-w-5xl mx-auto">
				
				<!-- Eyebrow Pill -->
				<div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 self-start">
					<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
					<span>Upstream Governance &amp; Open Web</span>
				</div>

				<!-- Main Headline -->
				<h1 class="font-display text-[40px] sm:text-[52px] lg:text-[60px] text-on-surface tracking-[-0.025em] leading-[1.06] font-normal">
					Building for the Open Web:<br>
					<span class="italic text-primary-container font-serif">10+ Years</span> of WordPress Contributions.
				</h1>

				<!-- Subtitle -->
				<p class="font-body-md text-base sm:text-lg text-on-surface-variant max-w-3xl leading-relaxed">
					From WordPress Core (credited in 6.9, 7.0 &amp; 7.1), WooCommerce, and Jetpack patches to Three.js, Vue.js, WP-CLI config tooling, and organizing national WordCamps across South Asia.
				</p>

				<!-- High-Contrast Actions Strip -->
				<div class="flex flex-wrap items-center gap-3 pt-1">
					<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-on-surface text-surface font-body-sm font-semibold hover:bg-on-surface/90 transition-all shadow-sm group text-[13.5px]">
						<span>WordPress.org Profile (@wprashed)</span>
						<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
					</a>
					<a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-surface-container-low text-on-surface font-body-sm font-medium hover:bg-surface-container-high transition-all border border-outline-variant/50 group text-[13.5px]">
						<span>Get in Touch</span>
						<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
					</a>
				</div>

			</div>
		</section>

		<!-- SECTION 1.5: DEEP CARBON TELEMETRY STRIP (HIGH CONTRAST METRIC STRIP) -->
		<section class="relative px-6 md:px-12 py-12 bg-[#0a0e17] text-white border-b border-white/10 overflow-hidden">
			<!-- Subtle glow elements -->
			<div class="pointer-events-none absolute -top-24 left-1/4 w-80 h-80 bg-primary/20 rounded-full blur-3xl opacity-30"></div>
			<div class="pointer-events-none absolute -bottom-24 right-1/4 w-80 h-80 bg-emerald-500/15 rounded-full blur-3xl opacity-25"></div>

			<div class="relative z-10 max-w-5xl mx-auto">
				<div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
					
					<!-- Metric 1: Websites Powered -->
					<div class="relative p-6 sm:p-7 rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur-md flex flex-col justify-between group hover:border-white/20 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] uppercase tracking-widest text-white/50 font-semibold">01 // GLOBAL IMPACT</span>
								<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
							</div>
							<span class="font-display text-3xl sm:text-4xl text-white font-medium tracking-tight block">Millions</span>
							<p class="font-body-sm text-[12.5px] text-white/70 mt-1.5 leading-snug">Websites Powered Globally</p>
						</div>
						<div class="pt-3.5 mt-4 border-t border-white/10 font-label-code text-[11px] text-emerald-400 font-medium flex items-center gap-1.5">
							<span>Active Production Scale</span>
						</div>
					</div>

					<!-- Metric 2: Plugins Built & Supported -->
					<div class="relative p-6 sm:p-7 rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur-md flex flex-col justify-between group hover:border-white/20 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] uppercase tracking-widest text-white/50 font-semibold">02 // PLUGINS</span>
								<span class="w-2 h-2 rounded-full bg-blue-400"></span>
							</div>
							<span class="font-display text-3xl sm:text-4xl text-white font-medium tracking-tight block">60+</span>
							<p class="font-body-sm text-[12.5px] text-white/70 mt-1.5 leading-snug">Plugins Built &amp; Supported</p>
						</div>
						<div class="pt-3.5 mt-4 border-t border-white/10 font-label-code text-[11px] text-blue-400 font-medium flex items-center gap-1.5">
							<span>WordPress Plugin Directory</span>
						</div>
					</div>

					<!-- Metric 3: Core Releases Credited -->
					<div class="relative p-6 sm:p-7 rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur-md flex flex-col justify-between group hover:border-white/20 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] uppercase tracking-widest text-white/50 font-semibold">03 // CORE RELEASES</span>
								<span class="w-2 h-2 rounded-full bg-purple-400"></span>
							</div>
							<span class="font-display text-3xl sm:text-4xl text-white font-medium tracking-tight block">3</span>
							<p class="font-body-sm text-[12.5px] text-white/70 mt-1.5 leading-snug">Core Releases Credited</p>
						</div>
						<div class="pt-3.5 mt-4 border-t border-white/10 font-label-code text-[11px] text-purple-400 font-medium flex items-center gap-1.5">
							<span>WordPress 6.9, 7.0 &amp; 7.1</span>
						</div>
					</div>

					<!-- Metric 4: Community Badges -->
					<div class="relative p-6 sm:p-7 rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur-md flex flex-col justify-between group hover:border-white/20 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[10.5px] uppercase tracking-widest text-white/50 font-semibold">04 // RECOGNITION</span>
								<span class="w-2 h-2 rounded-full bg-amber-400"></span>
							</div>
							<span class="font-display text-3xl sm:text-4xl text-white font-medium tracking-tight block">11</span>
							<p class="font-body-sm text-[12.5px] text-white/70 mt-1.5 leading-snug">Verified Official Badges</p>
						</div>
						<div class="pt-3.5 mt-4 border-t border-white/10 font-label-code text-[11px] text-amber-400 font-medium flex items-center gap-1.5">
							<span>Core, AI, Community, Support</span>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- OPTIONAL WORDPRESS PAGE EDITOR CONTENT BLOCK -->
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$page_content = get_the_content();
				if ( ! empty( trim( $page_content ) ) ) :
					?>
					<section class="px-6 md:px-12 py-10 bg-surface-container-lowest border-b border-surface-container-high/60">
						<div class="max-w-4xl mx-auto prose prose-slate">
							<?php the_content(); ?>
						</div>
					</section>
					<?php
				endif;
			endwhile;
		endif;
		?>

		<!-- SECTION 2: WORDPRESS.ORG CONTRIBUTION BADGES -->
		<?php get_template_part( 'template-parts/section-wp-badges', null, array( 'bg' => 'bg-surface-container-low/30' ) ); ?>

		<!-- SECTION 3: RECENT VERIFIED COMMITS & PRS -->
		<section class="relative px-6 md:px-12 py-12 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-6">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Recent Activity
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Recent Commits &amp; Pull Requests
						</h2>
					</div>
					<span class="font-label-code text-[11px] text-on-surface-variant">
						Verified on GitHub &amp; Trac
					</span>
				</div>

				<!-- Minimal Repository Filter Tabs -->
				<div class="flex flex-wrap gap-2 pt-2 border-b border-surface-container-high/60 pb-4" id="changeset-filters">
					<button type="button" data-repo-filter="all" class="repo-filter-btn px-3 py-1 rounded-full font-label-code text-[11.5px] bg-primary-container text-on-primary border border-primary-container transition-all">
						All (10)
					</button>
					<button type="button" data-repo-filter="core" class="repo-filter-btn px-3 py-1 rounded-full font-label-code text-[11.5px] bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 transition-all">
						Core &amp; SVN (3)
					</button>
					<button type="button" data-repo-filter="perf" class="repo-filter-btn px-3 py-1 rounded-full font-label-code text-[11.5px] bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 transition-all">
						Performance Lab (2)
					</button>
					<button type="button" data-repo-filter="cli" class="repo-filter-btn px-3 py-1 rounded-full font-label-code text-[11.5px] bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 transition-all">
						WP-CLI (2)
					</button>
					<button type="button" data-repo-filter="gutenberg" class="repo-filter-btn px-3 py-1 rounded-full font-label-code text-[11.5px] bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 transition-all">
						Gutenberg &amp; AI (3)
					</button>
				</div>

				<!-- Upstream Changeset Rows -->
				<div class="flex flex-col divide-y divide-surface-container-high/50 font-label-code text-label-code" id="changeset-list">
					
					<!-- PR 2714 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="perf">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/performance/pull/2714" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#2714
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">WordPress/performance</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Optimization Detective: Disregard URL Metrics with mismatched ETags when current ones exist</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 13, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 14239 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="core">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/wordpress-develop/pull/14239" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#14239
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">wordpress-develop</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Editor: Print buttons stylesheet in wp_editor() when QuickTags is enabled</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 13, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 6432 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="cli">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/wp-cli/wp-cli/pull/6432" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#6432
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">wp-cli/wp-cli</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Handle empty $wpdb-&gt;dbname in wp_get_table_names for drop-ins like HyperDB and LudicrousDB</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 13, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 68 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="cli">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/wp-cli/wp-config-transformer/pull/68" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#68
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">wp-config-transformer</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Save wp-config.php atomically via temporary file to prevent corruption on write failure</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 13, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 2710 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="perf">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/performance/pull/2710" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#2710
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">WordPress/performance</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">View Transitions: Add plvt_show_settings_ui filter to disable settings UI</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 13, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 4403 -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="gutenberg">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/wordpress-playground/pull/4403" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#4403
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">wordpress-playground</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">[Blueprints] Set default $_SERVER['REQUEST_URI'] in enableMultisite for scoped URLs</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 06, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 985 (AI) -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="gutenberg">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/ai/pull/985" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#985
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">WordPress/ai</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Remove Enable AI header toggle (Integrated with Guidelines &amp; Knowledge)</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-emerald-700 dark:text-emerald-400 font-medium">MERGED</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- PR 82162 (Gutenberg) -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="gutenberg">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://github.com/WordPress/gutenberg/pull/82162" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									#82162
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">WordPress/gutenberg</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">DataViews: Fix Field.sort TypeScript type definition</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-emerald-700 dark:text-emerald-400 font-medium">MERGED</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- Meta SVN [15316] -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="core">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://meta.trac.wordpress.org/changeset/15316/" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									[15316]
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">Meta SVN</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">WordPress.tv: Fix subtitle upload error on cached/unauthenticated submissions</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-tertiary font-medium">OCT 12, 2026</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

					<!-- Core SVN [63397] -->
					<div class="changeset-item py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-2 hover:bg-surface-container-low/60 rounded-xl transition-colors group" data-category="core">
						<div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 min-w-0">
							<div class="flex items-center gap-2 shrink-0">
								<a href="https://core.trac.wordpress.org/changeset/63397/" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-container hover:underline">
									[63397]
								</a>
								<span class="text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-outline">WordPress SVN</span>
							</div>
							<span class="text-on-surface text-[13px] font-normal truncate">Upgrade/Install: Update sodium_compat to v1.24.1 (PR #13290)</span>
						</div>
						<div class="flex items-center gap-3 shrink-0 self-end sm:self-auto">
							<span class="text-[11px] text-emerald-700 dark:text-emerald-400 font-medium">MERGED</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- SECTION 4: COMMUNITY LEADERSHIP & SPEAKING -->
		<section class="relative px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-8">
				
				<div>
					<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
						Community &amp; Events
					</span>
					<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
						Speaking &amp; Organizing
					</h2>
					<p class="font-body-sm text-[13.5px] text-on-surface-variant mt-1">
						Mentoring students, organizing contributor days, and speaking at regional and international WordCamps.
					</p>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
					
					<!-- Presidency University 2026 -->
					<div class="relative p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between group hover:border-outline-variant/80 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3 font-label-code text-[11px]">
								<span class="px-2.5 py-0.5 rounded-full bg-primary-container/10 text-primary-container font-semibold">ORGANIZER</span>
								<span class="text-outline">OCT 2026</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">
								<a href="https://events.wordpress.org/campusconnect/2026/presidency-university-dhaka" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container transition-colors inline-flex items-center gap-1.5">
									<span>Presidency University Campus Connect</span>
									<span class="material-symbols-outlined text-[16px]">north_east</span>
								</a>
							</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Joined the organizing team to mentor students, introduce open-source code workflows, and lead hands-on contributor sessions.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>Dhaka, Bangladesh</span>
							<span class="text-on-surface">Campus Connect</span>
						</div>
					</div>

					<!-- Independent University 2026 -->
					<div class="relative p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between group hover:border-outline-variant/80 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3 font-label-code text-[11px]">
								<span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-semibold">SPEAKER &amp; ORGANIZER</span>
								<span class="text-outline">OCT 2026</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">
								<a href="https://events.wordpress.org/campusconnect/2026/independent-university-bangladesh" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container transition-colors inline-flex items-center gap-1.5">
									<span>Independent University (IUB) 2026</span>
									<span class="material-symbols-outlined text-[16px]">north_east</span>
								</a>
							</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Speaker and co-organizer, presenting on modern WordPress architecture, performance best practices, and career paths in open source.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>Dhaka, Bangladesh</span>
							<span class="text-on-surface">Campus Connect</span>
						</div>
					</div>

					<!-- WordCamp Nepal 2027 -->
					<div class="relative p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between group hover:border-outline-variant/80 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3 font-label-code text-[11px]">
								<span class="px-2.5 py-0.5 rounded-full bg-primary-container/10 text-primary-container font-semibold">ORGANIZER</span>
								<span class="text-outline">2027</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">
								<a href="https://nepal.wordcamp.org/2027" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container transition-colors inline-flex items-center gap-1.5">
									<span>WordCamp Nepal 2027</span>
									<span class="material-symbols-outlined text-[16px]">north_east</span>
								</a>
							</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Organizing developer tracks, contributor day tables, and cross-border community collaboration for the national WordCamp.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>Kathmandu, Nepal</span>
							<span class="text-on-surface">National Conference</span>
						</div>
					</div>

					<!-- WordCamp Rajshahi 2026 & Nepal 2026 -->
					<div class="relative p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col justify-between group hover:border-outline-variant/80 transition-all">
						<div>
							<div class="flex items-center justify-between mb-3 font-label-code text-[11px]">
								<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface font-semibold">SPEAKER</span>
								<span class="text-outline">2026</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">
								<a href="https://rajshahi.wordcamp.org/2026" target="_blank" rel="noopener noreferrer" class="hover:text-primary-container transition-colors inline-flex items-center gap-1.5">
									<span>WordCamp Rajshahi &amp; Nepal 2026</span>
									<span class="material-symbols-outlined text-[16px]">north_east</span>
								</a>
							</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Technical presentations on software stewardship, support operations at scale, and building resilient WordPress plugins.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
							<span>Rajshahi &amp; Kathmandu</span>
							<span class="text-on-surface">Regional WordCamps</span>
						</div>
					</div>

				</div>

				<!-- Bespoke Editorial Quote Plate -->
				<div class="relative p-7 sm:p-9 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-sm overflow-hidden">
					<span class="absolute top-3 left-3 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
					<span class="absolute top-3 right-3 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
					<div class="flex flex-col gap-4 max-w-3xl">
						<div class="flex items-center gap-2 font-label-code text-[11px] text-tertiary">
							<span class="material-symbols-outlined text-[15px]">favorite</span>
							<span class="uppercase tracking-wider font-semibold">Community Feedback · WordCamp Slack</span>
						</div>
						<blockquote class="font-display text-lg sm:text-xl text-on-surface italic leading-relaxed">
							&ldquo;Running my first WordPress Hackathon at Stamford University, Bangladesh was a new and challenging experience, and having Rashed Hossain's guidance and support made the contributor onboarding seamless.&rdquo;
						</blockquote>
						<div class="font-label-code text-[11.5px] text-outline">
							WordCamp Community Organizer · Dhaka, Bangladesh
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- SECTION 5: AUTHORED & SUPPORTED PLUGINS (FLAGSHIP BENTO SHOWCASE) -->
		<section class="relative px-6 md:px-12 py-16 bg-[#f8fafc] dark:bg-[#0c121e] border-b border-surface-container-high/60">
			<div class="max-w-5xl mx-auto flex flex-col gap-10">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 mb-2">
							<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
							<span>High-Scale Ecosystem</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl md:text-4xl text-on-surface font-normal">
							Plugins I Help Build &amp; Support
						</h2>
						<p class="font-body-sm text-[14px] text-on-surface-variant mt-1.5 max-w-xl">
							Powering millions of mission-critical websites, online academies, and digital storefronts worldwide.
						</p>
					</div>
					<span class="font-label-code text-[11.5px] text-on-surface-variant shrink-0">
						WordPress.org Directory &amp; Enterprise
					</span>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
					
					<!-- FLAGSHIP HERO (12 COLS): Tutor LMS -->
					<div class="md:col-span-12 relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#090d16] via-[#10172a] to-[#1e1b4b] text-white p-8 sm:p-10 border border-white/10 shadow-xl group">
						<!-- Ambient Glow -->
						<div class="pointer-events-none absolute top-0 right-0 w-80 h-80 bg-emerald-500/15 rounded-full blur-3xl opacity-30 group-hover:opacity-50 transition-opacity"></div>
						
						<div class="relative z-10 flex flex-col justify-between h-full gap-6">
							<div>
								<div class="flex flex-wrap items-center justify-between gap-3 mb-4">
									<div class="flex items-center gap-2">
										<span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-label-code text-[11px] font-semibold tracking-wider uppercase">
											100K+ Active Installs
										</span>
										<span class="px-3 py-1 rounded-full bg-primary/20 text-primary-200 border border-primary/30 font-label-code text-[11px] font-semibold tracking-wider uppercase">
											#1 WordPress LMS
										</span>
									</div>
									<span class="font-label-code text-[11px] text-white/60">Ollyo &amp; Themeum</span>
								</div>
								
								<h3 class="font-display text-2xl sm:text-3xl lg:text-4xl text-white font-normal mb-3">
									Tutor LMS &mdash; Global eLearning Platform
								</h3>
								<p class="font-body-md text-[14.5px] sm:text-base text-white/80 max-w-3xl leading-relaxed font-light mb-4">
									A comprehensive LMS platform to create, manage, and sell online courses. Packed with frontend drag-and-drop course builders, advanced quiz engines, native eCommerce monetization, and certificate builders powering global academies and universities.
								</p>
							</div>

							<!-- Telemetry & Direct Link Footer -->
							<div class="pt-5 border-t border-white/10 flex flex-wrap items-center justify-between gap-4 font-label-code text-[12px]">
								<div class="flex items-center gap-4 text-white/70">
									<span class="inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Role: Tech Support Lead</span>
									<span class="text-white/30">&bull;</span>
									<span>100,000+ Worldwide Classrooms</span>
								</div>
								<a href="https://wordpress.org/plugins/tutor/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-slate-900 hover:bg-white/90 font-semibold transition-all group-hover:translate-x-0.5">
									<span>Inspect on WordPress.org</span>
									<span class="material-symbols-outlined text-[15px]">north_east</span>
								</a>
							</div>
						</div>
					</div>

					<!-- 02. WooCommerce & Jetpack Upstream (4 cols) -->
					<div class="md:col-span-4 relative p-7 rounded-3xl bg-surface-container-lowest border border-outline-variant/50 hover:border-outline-variant/90 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] px-2.5 py-0.5 rounded-full bg-[#7f54b3]/10 text-[#7f54b3] dark:text-[#c084fc] font-semibold border border-[#7f54b3]/20">
									5M+ ACTIVE EACH
								</span>
								<span class="material-symbols-outlined text-[20px] text-outline">shopping_bag</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">WooCommerce &amp; Jetpack</h3>
							<p class="font-label-code text-[11px] text-primary-container font-medium uppercase tracking-wider mb-3">
								eCommerce &amp; Core Security
							</p>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Active upstream contributions and patches to WooCommerce and Jetpack's modular security and performance suites.
							</p>
						</div>
						<div class="pt-4 mt-6 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[11.5px]">
							<span class="text-outline">Open Contributor</span>
							<a href="https://wordpress.org/plugins/woocommerce/" target="_blank" rel="noopener noreferrer" class="text-primary-container inline-flex items-center gap-1 font-semibold hover:underline">
								<span>Plugin</span>
								<span class="material-symbols-outlined text-[14px]">north_east</span>
							</a>
						</div>
					</div>

					<!-- 03. WordPress Performance Lab (4 cols) -->
					<div class="md:col-span-4 relative p-7 rounded-3xl bg-surface-container-lowest border border-outline-variant/50 hover:border-outline-variant/90 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 font-semibold border border-blue-500/20">
									CORE PERFORMANCE
								</span>
								<span class="material-symbols-outlined text-[20px] text-outline">speed</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">Performance Lab</h3>
							<p class="font-label-code text-[11px] text-primary-container font-medium uppercase tracking-wider mb-3">
								Optimization Detective &amp; View Transitions
							</p>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Official modular testbed by the WordPress Core Team. Authored PRs improving tag metrics validation and transient caching.
							</p>
						</div>
						<div class="pt-4 mt-6 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[11.5px]">
							<span class="text-outline">PR Author</span>
							<a href="https://wordpress.org/plugins/performance-lab/" target="_blank" rel="noopener noreferrer" class="text-primary-container inline-flex items-center gap-1 font-semibold hover:underline">
								<span>Plugin</span>
								<span class="material-symbols-outlined text-[14px]">north_east</span>
							</a>
						</div>
					</div>

					<!-- 04. WordPress Gutenberg & DataViews (4 cols) -->
					<div class="md:col-span-4 relative p-7 rounded-3xl bg-surface-container-lowest border border-outline-variant/50 hover:border-outline-variant/90 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] px-2.5 py-0.5 rounded-full bg-purple-500/10 text-purple-600 dark:text-purple-400 font-semibold border border-purple-500/20">
									BLOCK ARCHITECTURE
								</span>
								<span class="material-symbols-outlined text-[20px] text-outline">dashboard_customize</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">Gutenberg &amp; DataViews</h3>
							<p class="font-label-code text-[11px] text-primary-container font-medium uppercase tracking-wider mb-3">
								Next-Gen UI Architecture
							</p>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Authored merged pull requests fixing dialog popover focus transitions and TypeScript definitions for DataViews.
							</p>
						</div>
						<div class="pt-4 mt-6 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[11.5px]">
							<span class="text-outline">PR Author</span>
							<a href="https://github.com/WordPress/gutenberg" target="_blank" rel="noopener noreferrer" class="text-primary-container inline-flex items-center gap-1 font-semibold hover:underline">
								<span>GitHub</span>
								<span class="material-symbols-outlined text-[14px]">north_east</span>
							</a>
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- SECTION 5: RECOMMENDED TECHNICAL DISPATCHES -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest border-t border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-6">
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 mb-2">
							<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
							<span>Engineering Notes</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							From Code to Architecture: Read Recent Articles
						</h2>
						<p class="font-body-sm text-[13px] text-on-surface-variant mt-1">
							In-depth technical reflections on contributing upstream, managing scale, and WordPress systems.
						</p>
					</div>
					<a href="<?php echo esc_url( home_url( '/writing/' ) ); ?>" class="font-label-code text-[11.5px] text-on-surface-variant hover:text-on-surface transition-colors inline-flex items-center gap-1 group">
						<span>View all articles</span>
						<span class="material-symbols-outlined text-[15px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
					</a>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
					<?php
					$articles_q = new WP_Query( array(
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'no_found_rows'       => true,
						'ignore_sticky_posts' => true,
					) );
					if ( $articles_q->have_posts() ) :
						while ( $articles_q->have_posts() ) :
							$articles_q->the_post();
							$c = get_the_category();
							$cn = ! empty( $c ) ? $c[0]->name : 'Core';
							?>
							<a href="<?php the_permalink(); ?>" class="p-6 rounded-2xl bg-surface-container-low border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs">
								<div>
									<div class="flex items-center justify-between font-label-code text-[10.5px] text-outline mb-2.5">
										<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-medium"><?php echo esc_html( $cn ); ?></span>
										<span><?php echo esc_html( stitch_get_reading_time( get_the_ID() ) ); ?> MIN</span>
									</div>
									<h3 class="font-display text-lg text-on-surface font-medium group-hover:text-primary-container transition-colors line-clamp-2 leading-snug">
										<?php the_title(); ?>
									</h3>
									<p class="font-body-sm text-[12.5px] text-on-surface-variant line-clamp-2 mt-2 leading-relaxed">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 15, '...' ) ); ?>
									</p>
								</div>
								<div class="pt-3 mt-4 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[11px] text-outline">
									<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
									<span class="text-on-surface group-hover:text-primary-container font-medium flex items-center gap-0.5">
										<span>Read</span>
										<span class="material-symbols-outlined text-[13px]">north_east</span>
									</span>
								</div>
							</a>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

	</div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var filterBtns = document.querySelectorAll('#changeset-filters .repo-filter-btn');
	var items = document.querySelectorAll('#changeset-list .changeset-item');

	if (!filterBtns.length || !items.length) return;

	filterBtns.forEach(function (btn) {
		btn.addEventListener('click', function () {
			var filter = this.getAttribute('data-repo-filter');

			filterBtns.forEach(function (b) {
				b.classList.remove('bg-primary-container', 'text-on-primary', 'border-primary-container');
				b.classList.add('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');
			});

			this.classList.remove('bg-surface-container', 'text-on-surface-variant', 'border-outline-variant/40');
			this.classList.add('bg-primary-container', 'text-on-primary', 'border-primary-container');

			items.forEach(function (item) {
				var cat = item.getAttribute('data-category');
				if (filter === 'all' || cat === filter) {
					item.style.display = 'flex';
				} else {
					item.style.display = 'none';
				}
			});
		});
	});
});
</script>

<?php
get_footer();
