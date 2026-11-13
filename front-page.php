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
		     SECTION 1: HERO & ARCHITECTURAL IDENTITY (PRECISION EDITORIAL & TELEMETRY)
		     ================================================================= -->
		<section class="relative px-6 md:px-12 lg:px-16 pt-14 pb-18 md:pt-20 md:pb-24 lg:pt-24 lg:pb-28 bg-surface-container-lowest overflow-hidden border-b border-surface-container-high/60">
			<!-- Atmospheric Subtle Background Glows -->
			<div class="pointer-events-none absolute -top-32 right-1/4 w-[500px] h-[500px] bg-gradient-to-br from-primary/10 via-indigo-500/5 to-transparent rounded-full blur-3xl opacity-70"></div>
			<div class="pointer-events-none absolute top-1/2 -left-20 w-80 h-80 bg-emerald-500/5 rounded-full blur-3xl opacity-50"></div>

			<!-- Architectural Watermark (Coordinates) -->
			<div class="pointer-events-none absolute top-6 right-8 lg:right-12 font-mono text-[10px] text-outline-variant/40 tracking-widest hidden md:flex items-center gap-3 select-none">
				<span>DHAKA // 23.8103°N 90.4125°E</span>
				<span class="text-outline-variant/30">&bull;</span>
				<span class="live-dhaka-clock" data-clock-mode="short">UTC+6</span>
				<span class="text-outline-variant/30">&bull;</span>
				<span>CORE: 6.9 &bull; 7.0 &bull; 7.1</span>
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center max-w-6xl mx-auto relative z-10">
				
				<!-- Left Editorial Column -->
				<div class="lg:col-span-7 flex flex-col gap-6">
					
					<!-- Live Availability & Capability Eyebrow -->
					<div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-surface-container/70 backdrop-blur-md text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/50 self-start shadow-xs">
						<span class="flex h-2 w-2 relative">
							<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
							<span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
						</span>
						<span class="font-semibold"><?php echo esc_html( $hero_eyebrow ); ?></span>
						<span class="text-outline-variant/60 hidden sm:inline">&bull;</span>
						<span class="text-emerald-700 dark:text-emerald-400 font-semibold hidden sm:inline">Active</span>
					</div>

					<!-- Primary Headline with High-Contrast Editorial Styling -->
					<h1 class="font-display text-[42px] sm:text-[54px] lg:text-[62px] text-on-surface leading-[1.06] tracking-[-0.035em] font-normal">
						<?php echo wp_kses_post( $hero_title ); ?>
					</h1>

					<!-- Narrative Bio with Typographic Finesse -->
					<p class="font-body-md text-[16px] sm:text-[17.5px] text-on-surface-variant leading-relaxed max-w-2xl font-light">
						Over a decade building and scaling for the open web. Tech Support Lead at <strong class="text-on-surface font-semibold">Ollyo &amp; Themeum</strong> (Tutor LMS), specializing in <strong class="text-on-surface font-semibold">AI systems, workflow automation, product management, and data analysis</strong>. Contributing upstream to WordPress Core and architecting solutions that empower millions worldwide.
					</p>

					<!-- Tactile Engineering Focus Dossier (Replaces disconnected chips) -->
					<div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 p-2 bg-surface-container-low/60 rounded-2xl border border-outline-variant/40 max-w-2xl">
						<div class="px-3.5 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/30 flex flex-col justify-between shadow-xs">
							<span class="font-label-code text-[10px] uppercase text-outline font-semibold tracking-wider flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> AI &amp; Automation
							</span>
							<span class="font-display text-[13px] text-on-surface font-medium mt-1">Autonomous Workflows</span>
						</div>
						<div class="px-3.5 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/30 flex flex-col justify-between shadow-xs">
							<span class="font-label-code text-[10px] uppercase text-outline font-semibold tracking-wider flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span> Product &amp; Data
							</span>
							<span class="font-display text-[13px] text-on-surface font-medium mt-1">Scale Telemetry</span>
						</div>
						<div class="px-3.5 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/30 flex flex-col justify-between shadow-xs">
							<span class="font-label-code text-[10px] uppercase text-outline font-semibold tracking-wider flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-[#0073aa]"></span> Open Web
							</span>
							<span class="font-display text-[13px] text-on-surface font-medium mt-1">10+ Years Upstream</span>
						</div>
					</div>

					<!-- High-Impact Action Controls -->
					<div class="flex flex-wrap items-center gap-3.5 pt-1">
						<a href="<?php echo esc_url( $contrib_url ); ?>" class="btn-magnetic inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-full bg-on-surface text-surface hover:bg-primary-container hover:text-white font-body-sm font-semibold transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 group text-[13.5px]">
							<span>View Contributions</span>
							<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">arrow_outward</span>
						</a>
						<a href="<?php echo esc_url( $contact_url ); ?>" class="btn-magnetic inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface font-body-sm font-medium border border-outline-variant/50 hover:border-outline-variant transition-all text-[13.5px]">
							<span>Get in Touch</span>
							<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
						</a>
						<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3.5 py-3 rounded-full bg-surface-container/60 hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-code text-[12px] border border-outline-variant/30 transition-all">
							<svg class="w-3.5 h-3.5 text-[#0073aa]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0zm0 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11"/></svg>
							<span>.org/wprashed</span>
							<span class="material-symbols-outlined text-[14px]">north_east</span>
						</a>
					</div>

				</div>

				<!-- Right Architectural Portrait Plate with Floating Telemetry Satellites -->
				<div class="lg:col-span-5 flex justify-center lg:justify-end">
					<div class="relative w-full max-w-[390px] pt-4 pb-2 px-2">
						
						<!-- Floating Satellite Pill 1 (Top Left): WordPress Core Releases -->
						<div class="absolute -top-1 -left-2 sm:-left-4 z-20 px-3.5 py-1.5 rounded-full bg-surface-container-lowest/95 backdrop-blur-md border border-outline-variant/70 shadow-md flex items-center gap-2 font-label-code text-[11px] text-on-surface animate-fadeIn">
							<svg class="w-3.5 h-3.5 text-[#0073aa]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0zm0 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11"/></svg>
							<span class="font-semibold">Core Contributor</span>
							<span class="text-outline text-[10px] font-mono">6.9 &bull; 7.0 &bull; 7.1</span>
						</div>

						<!-- Floating Satellite Pill 2 (Bottom Right): Live Dhaka Telemetry Beacon -->
						<div class="absolute -bottom-2 -right-2 sm:-right-4 z-20 px-3.5 py-1.5 rounded-full bg-[#0a0e17] text-white border border-white/20 shadow-xl flex items-center gap-2 font-label-code text-[11px] animate-fadeIn">
							<span class="flex h-1.5 w-1.5 relative">
								<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
								<span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-400"></span>
							</span>
							<span class="font-medium text-white/90">Dhaka, BD</span>
							<span class="text-white/30">&bull;</span>
							<span class="live-dhaka-clock text-emerald-400 font-mono text-[10px]" data-clock-mode="time-only">UTC+6</span>
						</div>

						<!-- Main Glassmorphism Portrait Frame -->
						<div class="relative bg-gradient-to-b from-surface-container-lowest via-surface-container-lowest to-surface-container-low/40 p-3.5 sm:p-4 rounded-3xl shadow-card-soft border border-outline-variant/60 hover:border-outline-variant/90 transition-all duration-500 group" data-tilt data-tilt-max="4">
							
							<!-- Corner Crosshairs -->
							<span class="absolute top-2.5 left-2.5 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>
							<span class="absolute top-2.5 right-2.5 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>
							<span class="absolute bottom-2.5 left-2.5 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>
							<span class="absolute bottom-2.5 right-2.5 font-mono text-[10px] text-outline-variant/50 pointer-events-none select-none">+</span>

							<div class="relative aspect-square w-full overflow-hidden rounded-2xl bg-surface-container shadow-xs">
								<picture>
									<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain-400.webp' ); ?> 400w, <?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.webp' ); ?> 800w" sizes="(max-width: 640px) 320px, 384px">
									<img src="<?php echo esc_url( stitch_get_hero_avatar() ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'stitch_brand_name', 'Rashed Hossain' ) ); ?>" class="w-full h-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-[1.03]" width="400" height="400" fetchpriority="high" loading="eager" decoding="async">
								</picture>
								<div class="absolute bottom-2.5 left-2.5 right-2.5 px-3 py-1.5 bg-on-surface/85 backdrop-blur-md rounded-xl text-surface font-label-code text-[10.5px] tracking-wide flex items-center justify-between border border-white/10 shadow-sm">
									<span class="font-medium truncate"><?php echo esc_html( $photo_badge ); ?></span>
									<span class="text-emerald-400 text-[10px] font-semibold flex items-center gap-1">
										<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Verified
									</span>
								</div>
							</div>

							<div class="flex items-center justify-between pt-3 px-1.5 font-label-code text-[11px]">
								<span class="text-outline flex items-center gap-1.5">
									<span>Profiles: profiles.wordpress.org/wprashed</span>
								</span>
								<span class="text-emerald-700 dark:text-emerald-400 font-semibold flex items-center gap-1.5">
									<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
									Active
								</span>
							</div>

						</div>

					</div>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 2: ARCHITECTURAL METRICS (DEEP CARBON TELEMETRY STRIP)
		     ================================================================= -->
		<section class="relative px-6 md:px-12 lg:px-16 py-16 md:py-20 lg:py-24 bg-[#0a0e17] text-white border-y border-[#1e293b] overflow-hidden">
			<!-- Ambient technical backdrop glow -->
			<div class="absolute -top-32 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
			<div class="absolute -bottom-32 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

			<div class="max-w-6xl mx-auto relative z-10">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 pb-6 border-b border-white/10">
					<div>
						<div class="inline-flex items-center gap-2 font-mono text-[11px] tracking-widest uppercase text-emerald-400 mb-2">
							<span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
							<span>Live Telemetry &bull; Production Scale</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl lg:text-4xl text-white font-normal tracking-tight">
							Global footprint and community impact.
						</h2>
					</div>
					<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-white font-mono text-[11.5px] transition-colors pb-1 group">
						<span>Verify on WordPress.org</span>
						<span class="material-symbols-outlined text-[15px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
					</a>
				</div>

				<!-- Continuous Deep Carbon Telemetry Grid -->
				<div class="rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-md shadow-2xl overflow-hidden">
					<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-white/10">
						
						<!-- Metric 1: Millions -->
						<div class="interactive-spotlight interactive-spotlight-emerald p-7 lg:p-8 flex flex-col justify-between hover:bg-white/[0.04] transition-colors group relative">
							<div class="absolute top-0 left-0 right-0 h-[2px] bg-emerald-500 opacity-60"></div>
							<div>
								<div class="flex items-center justify-between font-mono text-[10.5px] text-slate-400 mb-4">
									<span class="font-medium tracking-wider">01 // SCALE</span>
									<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
								</div>
								<div class="font-display text-[48px] sm:text-[54px] text-white font-light tracking-tight leading-none mb-2.5">
									<?php echo esc_html( $m1_val ); ?>
								</div>
								<h3 class="font-mono text-[13px] font-semibold text-emerald-400 uppercase tracking-wide">
									<?php echo esc_html( $m1_sub ); ?>
								</h3>
							</div>
							<p class="font-body text-[12.5px] text-slate-300/80 mt-3 leading-relaxed">
								<?php echo esc_html( $m1_desc ); ?>
							</p>
						</div>

						<!-- Metric 2: 60+ Plugins -->
						<div class="interactive-spotlight p-7 lg:p-8 flex flex-col justify-between hover:bg-white/[0.04] transition-colors group relative">
							<div class="absolute top-0 left-0 right-0 h-[2px] bg-blue-500 opacity-60"></div>
							<div>
								<div class="flex items-center justify-between font-mono text-[10.5px] text-slate-400 mb-4">
									<span class="font-medium tracking-wider">02 // PLUGINS</span>
									<span class="material-symbols-outlined text-[15px] text-blue-400">extension</span>
								</div>
								<div class="font-display text-[48px] sm:text-[54px] text-white font-light tracking-tight leading-none mb-2.5" data-counter-target="60" data-counter-suffix="+">
									<?php echo esc_html( $m2_val ); ?>
								</div>
								<h3 class="font-mono text-[13px] font-semibold text-blue-400 uppercase tracking-wide">
									<?php echo esc_html( $m2_sub ); ?>
								</h3>
							</div>
							<p class="font-body text-[12.5px] text-slate-300/80 mt-3 leading-relaxed">
								<?php echo esc_html( $m2_desc ); ?>
							</p>
						</div>

						<!-- Metric 3: 3 Core Releases -->
						<div class="interactive-spotlight interactive-spotlight-purple p-7 lg:p-8 flex flex-col justify-between hover:bg-white/[0.04] transition-colors group relative">
							<div class="absolute top-0 left-0 right-0 h-[2px] bg-purple-500 opacity-60"></div>
							<div>
								<div class="flex items-center justify-between font-mono text-[10.5px] text-slate-400 mb-4">
									<span class="font-medium tracking-wider">03 // UPSTREAM</span>
									<span class="material-symbols-outlined text-[15px] text-purple-400">deployed_code</span>
								</div>
								<div class="font-display text-[48px] sm:text-[54px] text-white font-light tracking-tight leading-none mb-2.5" data-counter-target="3">
									<?php echo esc_html( $m3_val ); ?>
								</div>
								<h3 class="font-mono text-[13px] font-semibold text-purple-400 uppercase tracking-wide">
									<?php echo esc_html( $m3_sub ); ?>
								</h3>
							</div>
							<p class="font-body text-[12.5px] text-slate-300/80 mt-3 leading-relaxed">
								<?php echo esc_html( $m3_desc ); ?>
							</p>
						</div>

						<!-- Metric 4: 11 Verified Badges -->
						<div class="interactive-spotlight p-7 lg:p-8 flex flex-col justify-between hover:bg-white/[0.04] transition-colors group relative">
							<div class="absolute top-0 left-0 right-0 h-[2px] bg-amber-500 opacity-60"></div>
							<div>
								<div class="flex items-center justify-between font-mono text-[10.5px] text-slate-400 mb-4">
									<span class="font-medium tracking-wider">04 // RECOGNITION</span>
									<span class="material-symbols-outlined text-[15px] text-amber-400">verified</span>
								</div>
								<div class="font-display text-[48px] sm:text-[54px] text-white font-light tracking-tight leading-none mb-2.5" data-counter-target="11">
									<?php echo esc_html( $m4_val ); ?>
								</div>
								<h3 class="font-mono text-[13px] font-semibold text-amber-400 uppercase tracking-wide">
									<?php echo esc_html( $m4_sub ); ?>
								</h3>
							</div>
							<p class="font-body text-[12.5px] text-slate-300/80 mt-3 leading-relaxed">
								<?php echo esc_html( $m4_desc ); ?>
							</p>
						</div>

					</div>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 3: ECOSYSTEM RECOGNITION (ASYMMETRIC DUAL-PANE LEDGER)
		     ================================================================= -->
		<section class="px-6 md:px-12 lg:px-16 py-16 md:py-20 lg:py-24 bg-surface-container-lowest border-b border-surface-container-high/60 relative overflow-hidden">
			<div class="max-w-6xl mx-auto">
				
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
					
					<!-- Left Editorial Pane (5 cols) -->
					<div class="lg:col-span-5 flex flex-col justify-between h-full">
						<div>
							<div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-[#0073aa]/10 text-[#0073aa] dark:text-[#38bdf8] font-mono text-[11px] uppercase tracking-wider border border-[#0073aa]/25 mb-4">
								<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0zm0 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11"/></svg>
								<span class="font-semibold">Upstream Ledger</span>
							</div>

							<h2 class="font-display text-2xl sm:text-3xl lg:text-[34px] text-on-surface font-normal leading-[1.15] tracking-tight mb-4">
								Recognized Across WordPress Core, AI &amp; Open Ecosystems
							</h2>

							<p class="font-body text-[14.5px] text-on-surface-variant leading-relaxed mb-6">
								Active upstream contributor across WordPress Core (6.9, 7.0, 7.1), WooCommerce, Jetpack, the official WordPress AI Initiative, Three.js, Vue.js, WordCamp organizing, and global open-source ecosystems.
							</p>

							<!-- Trust Metrics Pill Counters -->
							<div class="flex flex-wrap items-center gap-2 mb-8 font-mono text-[11px]">
								<span class="px-3 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-semibold border border-emerald-500/20 flex items-center gap-1.5">
									<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
									<span>11 Official Badges</span>
								</span>
								<span class="px-3 py-1.5 rounded-xl bg-primary-container/10 text-primary-container font-semibold border border-primary-container/20">
									3 Core Releases Credited
								</span>
								<span class="px-3 py-1.5 rounded-xl bg-surface-container text-on-surface font-medium border border-outline-variant/40">
									130+ Pull Requests
								</span>
							</div>
						</div>

						<div class="pt-6 border-t border-surface-container-high/60 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
							<a href="<?php echo esc_url( home_url( '/contributions/' ) ); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-on-surface text-surface hover:bg-primary hover:text-white font-mono text-[12px] font-semibold transition-all shadow-xs group/link">
								<span>View Complete Ledger</span>
								<span class="material-symbols-outlined text-[15px] group-hover/link:translate-x-1 transition-transform">arrow_forward</span>
							</a>
							<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="font-mono text-[11px] text-outline hover:text-primary transition-colors inline-flex items-center gap-1">
								<span>profiles.wordpress.org</span>
								<span class="material-symbols-outlined text-[13px]">north_east</span>
							</a>
						</div>
					</div>

					<!-- Right Interactive Badge Matrix (7 cols) -->
					<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-3.5">
						
						<!-- Badge 1: Core Contributor -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#d63638]/20 hover:border-[#d63638]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#d63638]/10 text-[#d63638] dark:text-[#f87171] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#d63638] font-bold px-2 py-0.5 rounded-md bg-[#d63638]/10">Core '25</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#d63638] transition-colors">Core Contributor</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Authored patches for core editor, media router &amp; internationalization.</p>
						</div>

						<!-- Badge 2: Core AI -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#7b2cbf]/20 hover:border-[#7b2cbf]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#7b2cbf]/10 text-[#7b2cbf] dark:text-[#c084fc] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"></rect><path d="M12 7l1 2 2 1-2 1-1 2-1-2-2-1 2-1z" fill="currentColor"></path></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#7b2cbf] font-bold px-2 py-0.5 rounded-md bg-[#7b2cbf]/10">AI '26</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#7b2cbf] transition-colors">Core AI Specialist</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Upstream guidelines and translation models for official WordPress AI.</p>
						</div>

						<!-- Badge 3: Meta & Infrastructure -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#50575e]/20 hover:border-[#50575e]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#50575e]/10 text-[#50575e] dark:text-[#94a3b8] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="3" width="6" height="4" rx="1"></rect><rect x="2" y="17" width="5" height="4" rx="1"></rect><rect x="17" y="17" width="5" height="4" rx="1"></rect><path d="M12 7v5M4.5 17v-3h15v3M12 12v5"></path></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#50575e] font-bold px-2 py-0.5 rounded-md bg-[#50575e]/10">Meta '26</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#50575e] transition-colors">Meta &amp; Infrastructure</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Architecting ecosystem tooling, profiles and developer infrastructure.</p>
						</div>

						<!-- Badge 4: Pattern Author -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#503291]/20 hover:border-[#503291]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#503291]/10 text-[#503291] dark:text-[#a5b4fc] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="12" x2="21" y2="12"></line><line x1="12" y1="12" x2="12" y2="21"></line></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#503291] font-bold px-2 py-0.5 rounded-md bg-[#503291]/10">Pattern '26</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#503291] transition-colors">Pattern Author</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Curating production block patterns for global creators and sites.</p>
						</div>

						<!-- Badge 5: Plugin Developer -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#d94f00]/20 hover:border-[#d94f00]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#d94f00]/10 text-[#d94f00] dark:text-[#fdba74] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M8 2v4M16 2v4"></path><rect x="5" y="6" width="14" height="7" rx="2"></rect></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#d94f00] font-bold px-2 py-0.5 rounded-md bg-[#d94f00]/10">Directory</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#d94f00] transition-colors">Plugin Developer</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Published and maintained tools on the official WordPress.org repository.</p>
						</div>

						<!-- Badge 6: WordCamp Speaker -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#d97706]/20 hover:border-[#d97706]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#d97706]/10 text-[#d97706] dark:text-[#fde047] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11v3a1 1 0 0 0 1 1h2l5 4V5L6 9H4a1 1 0 0 0-1 1z"></path><path d="M15 9a4 4 0 0 1 0 6"></path></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#d97706] font-bold px-2 py-0.5 rounded-md bg-[#d97706]/10">Community</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#d97706] transition-colors">WordCamp Speaker</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Keynote speaker and Contributor Table lead across international WordCamps.</p>
						</div>

						<!-- Badge 7: Technical Support -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#0085ba]/20 hover:border-[#0085ba]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#0085ba]/10 text-[#0085ba] dark:text-[#7dd3fc] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#0085ba] font-bold px-2 py-0.5 rounded-md bg-[#0085ba]/10">Support '26</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#0085ba] transition-colors">Support Lead</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Mentoring and solving critical site issues across thousands of forum inquiries.</p>
						</div>

						<!-- Badge 8: Polyglots Editor -->
						<div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-lowest border border-[#9b1364]/20 hover:border-[#9b1364]/50 hover:-translate-y-0.5 transition-all shadow-2xs group">
							<div class="flex items-start justify-between mb-2">
								<div class="w-8 h-8 rounded-xl bg-[#9b1364]/10 text-[#9b1364] dark:text-[#f472b6] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 8l6 12M11 8L5 20M3 16h8"></path><path d="M14 4h7M17.5 4v4"></path></svg>
								</div>
								<span class="font-mono text-[10px] uppercase tracking-wider text-[#9b1364] font-bold px-2 py-0.5 rounded-md bg-[#9b1364]/10">Polyglots</span>
							</div>
							<h3 class="font-display text-[15px] text-on-surface font-semibold group-hover:text-[#9b1364] transition-colors">Polyglots Editor</h3>
							<p class="font-body text-[12px] text-on-surface-variant mt-1 leading-snug">Translating and validating core packages for international languages.</p>
						</div>

					</div>

				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 4: SIGNATURE OPEN-SOURCE REPOSITORIES (DEEP TERMINAL DEV LAB)
		     ================================================================= -->
		<section class="relative px-6 md:px-12 lg:px-16 py-18 md:py-24 lg:py-28 bg-[#080d1a] text-white border-y border-white/10 overflow-hidden">
			<!-- Atmospheric Developer Lab Glows -->
			<div class="pointer-events-none absolute -top-40 left-1/3 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-3xl opacity-50"></div>
			<div class="pointer-events-none absolute -bottom-40 right-1/4 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-3xl opacity-40"></div>

			<!-- Subtle Terminal Grid Lines -->
			<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)]"></div>

			<div class="max-w-6xl mx-auto flex flex-col gap-12 relative z-10">
				
				<!-- Section Masthead with Git Status -->
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pb-2 border-b border-white/10">
					<div>
						<div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 text-white font-mono text-[11px] uppercase tracking-wider border border-white/15 mb-3">
							<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
							<span>Upstream Repositories &bull; Git &amp; SVN</span>
						</div>
						<h2 class="font-display text-3xl sm:text-4xl lg:text-[42px] text-white font-normal tracking-tight leading-tight">
							Projects &amp; Open-Source Repositories I Build
						</h2>
						<p class="font-body text-[14.5px] text-white/70 mt-2 max-w-2xl font-light leading-relaxed">
							Contributing patches, performance frameworks, and tooling upstream to software powering over 43% of the internet.
						</p>
					</div>

					<div class="flex items-center gap-3 shrink-0">
						<a href="https://github.com/wprashed" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-slate-900 hover:bg-white/90 font-mono text-[12px] font-semibold transition-all shadow-md group">
							<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
							<span>github.com/wprashed</span>
							<span class="material-symbols-outlined text-[15px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
						</a>
					</div>
				</div>

				<!-- Interactive Repository Category Filter Bar -->
				<div class="flex flex-wrap items-center gap-2 -mt-4 mb-2" id="repo-filter-bar">
					<button type="button" class="repo-filter-btn px-4 py-1.5 rounded-full text-xs font-mono font-medium transition-all duration-200 bg-white text-slate-900 shadow-sm border border-white" data-filter="all">
						All Repositories (6)
					</button>
					<button type="button" class="repo-filter-btn px-4 py-1.5 rounded-full text-xs font-mono font-medium transition-all duration-200 bg-white/[0.06] text-slate-300 hover:text-white border border-white/10 hover:border-white/20" data-filter="core">
						Core Architecture
					</button>
					<button type="button" class="repo-filter-btn px-4 py-1.5 rounded-full text-xs font-mono font-medium transition-all duration-200 bg-white/[0.06] text-slate-300 hover:text-white border border-white/10 hover:border-white/20" data-filter="performance">
						Performance &amp; WASM
					</button>
					<button type="button" class="repo-filter-btn px-4 py-1.5 rounded-full text-xs font-mono font-medium transition-all duration-200 bg-white/[0.06] text-slate-300 hover:text-white border border-white/10 hover:border-white/20" data-filter="ecosystem">
						Ecosystem &amp; LMS
					</button>
				</div>

				<!-- Dual-Hero Flagship Showcases (High-Contrast Glassmorphic Terminals) -->
				<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
					
					<!-- Flagship 1: WordPress Core -->
					<a href="https://github.com/WordPress/wordpress-develop" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight group relative bg-white/[0.04] p-8 sm:p-9 rounded-3xl border border-white/10 hover:border-[#38bdf8]/60 hover:bg-white/[0.06] transition-all duration-300 shadow-xl flex flex-col justify-between overflow-hidden" data-category="core" data-tilt data-tilt-max="3">
						<!-- Ambient Corner Glow -->
						<div class="pointer-events-none absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-2xl opacity-40 group-hover:opacity-70 transition-opacity"></div>
						<div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-[#0073aa] via-[#38bdf8] to-transparent"></div>

						<div>
							<!-- Terminal Window Bar -->
							<div class="flex items-center justify-between mb-5">
								<div class="flex items-center gap-2">
									<div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
									<div class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></div>
									<div class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></div>
									<span class="font-mono text-[11px] text-[#38bdf8] uppercase font-bold tracking-wider ml-2 px-2.5 py-0.5 rounded-md bg-[#38bdf8]/10 border border-[#38bdf8]/20">01 // CORE ARCHITECTURE</span>
								</div>
								<span class="font-mono text-[11px] text-white/50 flex items-center gap-1.5">
									<span class="material-symbols-outlined text-[14px]">fork_right</span>
									<span>trunk</span>
								</span>
							</div>

							<div class="flex items-center justify-between mb-3">
								<h3 class="font-display text-2xl sm:text-3xl text-white font-normal group-hover:text-[#38bdf8] transition-colors">
									WordPress Core
								</h3>
								<div class="w-8 h-8 rounded-full bg-[#0073aa]/20 border border-[#0073aa]/40 text-[#38bdf8] flex items-center justify-center shrink-0">
									<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0zm0 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11"/></svg>
								</div>
							</div>

							<div class="flex flex-wrap items-center gap-2 mb-4 font-mono text-[11px]">
								<span class="px-3 py-1 rounded-full bg-blue-500/20 text-[#60a5fa] font-semibold border border-blue-500/30">
									30+ PRs Merged
								</span>
								<span class="px-3 py-1 rounded-full bg-white/10 text-white/90 font-medium border border-white/15">
									Credited in 6.9, 7.0 &amp; 7.1
								</span>
							</div>

							<p class="font-body text-[14px] text-white/70 leading-relaxed mb-6 font-light">
								Upstream contributions to WordPress Core powering over 43% of all global websites. Authoring patches for block editor components, media routers, internationalization, and platform stability.
							</p>

							<!-- Key Architectural Impact Points -->
							<div class="space-y-2.5 pt-4 border-t border-white/10 font-body text-[13px] text-white/80">
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>Editor &amp; DataViews focus containment popover fixes</span>
								</div>
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>REST API &amp; media query route resilience under load</span>
								</div>
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>Polyglots translation infrastructure and string indexing</span>
								</div>
							</div>
						</div>

						<div class="pt-5 mt-6 border-t border-white/10 flex items-center justify-between font-mono text-[11.5px] text-white/50">
							<span class="text-white/60">WordPress/wordpress-develop</span>
							<span class="text-white group-hover:text-[#38bdf8] font-semibold inline-flex items-center gap-1">
								<span>Inspect Code</span>
								<span class="material-symbols-outlined text-[14px]">north_east</span>
							</span>
						</div>
					</a>

					<!-- Flagship 2: Performance Suite -->
					<a href="https://github.com/WordPress/performance" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight interactive-spotlight-emerald group relative bg-white/[0.04] p-8 sm:p-9 rounded-3xl border border-white/10 hover:border-emerald-400/60 hover:bg-white/[0.06] transition-all duration-300 shadow-xl flex flex-col justify-between overflow-hidden" data-category="performance" data-tilt data-tilt-max="3">
						<!-- Ambient Corner Glow -->
						<div class="pointer-events-none absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-2xl opacity-40 group-hover:opacity-70 transition-opacity"></div>
						<div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-emerald-500 via-teal-400 to-transparent"></div>

						<div>
							<!-- Terminal Window Bar -->
							<div class="flex items-center justify-between mb-5">
								<div class="flex items-center gap-2">
									<div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
									<div class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></div>
									<div class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></div>
									<span class="font-mono text-[11px] text-emerald-400 uppercase font-bold tracking-wider ml-2 px-2.5 py-0.5 rounded-md bg-emerald-500/10 border border-emerald-500/20">02 // PERFORMANCE LAB</span>
								</div>
								<span class="font-mono text-[11px] text-white/50 flex items-center gap-1.5">
									<span class="material-symbols-outlined text-[14px]">fork_right</span>
									<span>trunk</span>
								</span>
							</div>

							<div class="flex items-center justify-between mb-3">
								<h3 class="font-display text-2xl sm:text-3xl text-white font-normal group-hover:text-emerald-400 transition-colors">
									Performance Suite
								</h3>
								<div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 flex items-center justify-center shrink-0">
									<span class="material-symbols-outlined text-[18px]">speed</span>
								</div>
							</div>

							<div class="flex flex-wrap items-center gap-2 mb-4 font-mono text-[11px]">
								<span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 font-semibold border border-emerald-500/30">
									Optimization Detective &amp; Core Vitals
								</span>
								<span class="px-3 py-1 rounded-full bg-white/10 text-white/90 font-medium border border-white/15">
									8 PRs Authored
								</span>
							</div>

							<p class="font-body text-[14px] text-white/70 leading-relaxed mb-6 font-light">
								Official performance testbed created by the WordPress Performance Team. Authored pull requests improving Optimization Detective tag metrics validation, mismatched ETag cache transients, and View Transitions UI filter hooks.
							</p>

							<!-- Key Architectural Impact Points -->
							<div class="space-y-2.5 pt-4 border-t border-white/10 font-body text-[13px] text-white/80">
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>Optimization Detective tag metrics validation pipeline</span>
								</div>
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>ETag header transient cache invalidation fixes</span>
								</div>
								<div class="flex items-center gap-2.5">
									<span class="material-symbols-outlined text-[16px] text-emerald-400 shrink-0">check_circle</span>
									<span>View Transitions UI filter hooks and client navigation</span>
								</div>
							</div>
						</div>

						<div class="pt-5 mt-6 border-t border-white/10 flex items-center justify-between font-mono text-[11.5px] text-white/50">
							<span class="text-white/60">WordPress/performance</span>
							<span class="text-white group-hover:text-emerald-400 font-semibold inline-flex items-center gap-1">
								<span>Inspect Code</span>
								<span class="material-symbols-outlined text-[14px]">north_east</span>
							</span>
						</div>
					</a>

				</div>

				<!-- Secondary Deck (4 Distinct Chromatic Cards in Bento Grid) -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
					
					<!-- Deck Card 1: Gutenberg & DataViews (Purple Accent) -->
					<a href="https://github.com/WordPress/gutenberg" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight interactive-spotlight-purple group bg-white/[0.03] hover:bg-white/[0.06] p-6 rounded-2xl border border-white/10 hover:border-purple-400/50 hover:-translate-y-1 transition-all duration-300 shadow-lg flex flex-col justify-between" data-category="core" data-tilt data-tilt-max="2.5">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="font-mono text-[10px] text-purple-300 font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-purple-500/20 border border-purple-500/30">BLOCK EDITOR</span>
								<span class="material-symbols-outlined text-[15px] text-white/40 group-hover:text-purple-300 transition-colors">north_east</span>
							</div>
							<h3 class="font-display text-lg text-white font-medium mb-2 group-hover:text-purple-300 transition-colors">
								Gutenberg &amp; DataViews
							</h3>
							<p class="font-body text-[12.5px] text-white/70 leading-relaxed font-light">
								Authored fixes for dialog focus popover containment and Field.sort TypeScript type definitions in WordPress's core UI engine.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-white/10 flex items-center justify-between font-mono text-[11px] text-white/50">
							<span class="truncate">WordPress/gutenberg</span>
							<span class="text-purple-300 font-semibold shrink-0">Merged ↗</span>
						</div>
					</a>

					<!-- Deck Card 2: WordPress AI & Playground (Cyan Accent) -->
					<a href="https://github.com/WordPress/ai" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight group bg-white/[0.03] hover:bg-white/[0.06] p-6 rounded-2xl border border-white/10 hover:border-cyan-400/50 hover:-translate-y-1 transition-all duration-300 shadow-lg flex flex-col justify-between" data-category="performance" data-tilt data-tilt-max="2.5">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="font-mono text-[10px] text-cyan-300 font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-cyan-500/20 border border-cyan-500/30">AI &amp; WASM</span>
								<span class="material-symbols-outlined text-[15px] text-white/40 group-hover:text-cyan-300 transition-colors">north_east</span>
							</div>
							<h3 class="font-display text-lg text-white font-medium mb-2 group-hover:text-cyan-300 transition-colors">
								AI &amp; Playground
							</h3>
							<p class="font-body text-[12.5px] text-white/70 leading-relaxed font-light">
								Integrated Content Translation guidelines for official WordPress AI, and Blueprints multisite REQUEST_URI scoping in WASM.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-white/10 flex items-center justify-between font-mono text-[11px] text-white/50">
							<span class="truncate">WordPress/ai &bull; wasm</span>
							<span class="text-cyan-300 font-semibold shrink-0">Merged ↗</span>
						</div>
					</a>

					<!-- Deck Card 3: WP-CLI & Config Tools (Amber Accent) -->
					<a href="https://github.com/wp-cli/wp-cli" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight group bg-white/[0.03] hover:bg-white/[0.06] p-6 rounded-2xl border border-white/10 hover:border-amber-400/50 hover:-translate-y-1 transition-all duration-300 shadow-lg flex flex-col justify-between" data-category="core" data-tilt data-tilt-max="2.5">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="font-mono text-[10px] text-amber-300 font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-amber-500/20 border border-amber-500/30">CLI TOOLING</span>
								<span class="material-symbols-outlined text-[15px] text-white/40 group-hover:text-amber-300 transition-colors">north_east</span>
							</div>
							<h3 class="font-display text-lg text-white font-medium mb-2 group-hover:text-amber-300 transition-colors">
								WP-CLI &amp; Config Tools
							</h3>
							<p class="font-body text-[12.5px] text-white/70 leading-relaxed font-light">
								Engineered atomic temporary file writing in wp-config-transformer to prevent corruptions, improved SSH binary parameters.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-white/10 flex items-center justify-between font-mono text-[11px] text-white/50">
							<span class="truncate">wp-cli/wp-cli</span>
							<span class="text-amber-300 font-semibold shrink-0">Upstream ↗</span>
						</div>
					</a>

					<!-- Deck Card 4: Tutor LMS Platform (Emerald Accent) -->
					<a href="https://github.com/themeum/tutor" target="_blank" rel="noopener noreferrer" class="repo-card-item interactive-spotlight interactive-spotlight-emerald group bg-white/[0.03] hover:bg-white/[0.06] p-6 rounded-2xl border border-white/10 hover:border-emerald-400/50 hover:-translate-y-1 transition-all duration-300 shadow-lg flex flex-col justify-between" data-category="ecosystem" data-tilt data-tilt-max="2.5">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="font-mono text-[10px] text-emerald-300 font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-500/30">100K+ SITES</span>
								<span class="material-symbols-outlined text-[15px] text-white/40 group-hover:text-emerald-300 transition-colors">north_east</span>
							</div>
							<h3 class="font-display text-lg text-white font-medium mb-2 group-hover:text-emerald-300 transition-colors">
								Tutor LMS Platform
							</h3>
							<p class="font-body text-[12.5px] text-white/70 leading-relaxed font-light">
								Powering 100K+ educational sites. Leading tech support operations and contributing to core code, multisite and metadata security.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-white/10 flex items-center justify-between font-mono text-[11px] text-white/50">
							<span class="truncate">themeum/tutor</span>
							<span class="text-emerald-300 font-semibold shrink-0">100K+ ↗</span>
						</div>
					</a>

				</div>

				<!-- Extra GitHub Repos Console Bar -->
				<div class="p-6 rounded-2xl bg-white/[0.04] border border-white/10 shadow-lg flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-white/70 font-mono text-[12px]">
					<div class="flex flex-wrap items-center gap-2.5">
						<span class="text-white font-semibold flex items-center gap-2">
							<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
							<span>Also contributing to:</span>
						</span>
						<a href="https://github.com/woocommerce/woocommerce" target="_blank" rel="noopener noreferrer" class="hover:text-white hover:underline underline-offset-2">woocommerce/woocommerce</a>
						<span class="text-white/30">&bull;</span>
						<a href="https://github.com/Automattic/jetpack" target="_blank" rel="noopener noreferrer" class="hover:text-white hover:underline underline-offset-2">Automattic/jetpack</a>
						<span class="text-white/30">&bull;</span>
						<a href="https://github.com/WordPress/openverse" target="_blank" rel="noopener noreferrer" class="hover:text-white hover:underline underline-offset-2">WordPress/openverse</a>
						<span class="text-white/30">&bull;</span>
						<a href="https://github.com/WordPress/wordcamp.org" target="_blank" rel="noopener noreferrer" class="hover:text-white hover:underline underline-offset-2">WordPress/wordcamp.org</a>
					</div>
					<a href="https://github.com/wprashed" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-white font-semibold hover:text-[#38bdf8] shrink-0 transition-colors">
						<span>View 130+ PRs on GitHub</span>
						<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
					</a>
				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 5: GLOBAL CLIENTS & INSTITUTIONAL TRUST (EXECUTIVE BENTO)
		     ================================================================= -->
		<section class="px-6 md:px-12 lg:px-16 py-16 md:py-20 lg:py-24 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="max-w-6xl mx-auto flex flex-col gap-10">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-mono text-[11px] uppercase tracking-wider border border-outline-variant/40 mb-2.5">
							<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
							<span>Global Clients &bull; Institutional Trust</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl lg:text-4xl text-on-surface font-normal">
							Trusted by Global Organizations, Enterprises &amp; Governments
						</h2>
						<p class="font-body text-[14px] text-on-surface-variant mt-2 max-w-2xl leading-relaxed">
							Delivering robust digital solutions, accessible web architecture, and mission-critical systems for international agencies, leading corporations across the USA and Gulf region, and sovereign national governments.
						</p>
					</div>
					<div class="font-mono text-[11px] text-outline flex items-center gap-2 shrink-0 pb-1">
						<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
						<span>Proven Enterprise Delivery</span>
					</div>
				</div>

				<!-- Executive Bento Grid -->
				<div class="flex flex-col gap-6">
					
					<!-- Top Hero Bento Card: Multiple National Governments -->
					<div class="interactive-spotlight interactive-spotlight-indigo relative bg-gradient-to-br from-[#090d16] via-[#1e1b4b] to-[#0f172a] text-white p-7 sm:p-10 md:p-12 rounded-3xl border border-indigo-500/30 shadow-xl overflow-hidden group" data-tilt data-tilt-max="3">
						<div class="absolute -top-24 -right-24 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
						<div class="relative z-10 flex flex-col justify-between h-full">
							<div>
								<div class="flex flex-wrap items-center justify-between gap-3 mb-4">
									<span class="px-3.5 py-1 rounded-full bg-indigo-500/20 text-indigo-300 font-mono text-[11px] font-semibold border border-indigo-500/30 flex items-center gap-1.5 shadow-xs">
										<span class="material-symbols-outlined text-[15px]">account_balance</span>
										<span>Sovereign Digital Services &bull; Public Sector</span>
									</span>
									<span class="font-mono text-[11px] text-indigo-200/80 flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/[0.06] border border-white/10">
										<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
										<span>Zero-Downtime High Concurrency</span>
									</span>
								</div>

								<h3 class="font-display text-2xl sm:text-3xl lg:text-4xl text-white font-normal mb-3 leading-snug">
									Multiple National Governments
								</h3>

								<p class="font-body text-[14.5px] text-indigo-100/90 max-w-3xl leading-relaxed mb-6">
									Developed mission-critical government web portals, high-security public sector systems, and high-concurrency citizen-facing digital services across multiple countries, ensuring strict accessibility standards, data protection, and zero-downtime reliability.
								</p>
							</div>

							<div class="pt-5 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 font-mono text-[11.5px] text-indigo-200/90">
								<div class="flex flex-wrap items-center gap-2">
									<span class="px-3 py-1 rounded-full bg-white/10 border border-white/15 text-white text-[11px] font-medium flex items-center gap-1.5 shadow-2xs">
										<span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Civil Portals
									</span>
									<span class="px-3 py-1 rounded-full bg-white/10 border border-white/15 text-white text-[11px] font-medium flex items-center gap-1.5 shadow-2xs">
										<span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> National Ministries
									</span>
									<span class="px-3 py-1 rounded-full bg-white/10 border border-white/15 text-white text-[11px] font-medium flex items-center gap-1.5 shadow-2xs">
										<span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Public Digital Services
									</span>
									<span class="px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[11px] font-medium flex items-center gap-1.5 shadow-2xs">
										<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Strict Compliance &amp; WCAG AAA
									</span>
								</div>
								<div class="flex items-center gap-1.5 text-emerald-400 shrink-0 font-semibold px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20">
									<span class="material-symbols-outlined text-[16px]">verified_user</span>
									<span>Verified Sovereign Track Record</span>
								</div>
							</div>
						</div>
					</div>

					<!-- 4 Strategic Enterprise Pillar Cards (2x2 Grid) -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						
						<!-- Pillar 1: UN Agencies (UNICEF & ILO) -->
						<div class="interactive-spotlight p-8 rounded-3xl bg-surface-container-low/40 hover:bg-surface-container-lowest border border-[#1cabe2]/30 hover:border-[#1cabe2]/60 hover:-translate-y-1 hover:shadow-card-soft transition-all duration-300 flex flex-col justify-between shadow-2xs group" data-tilt data-tilt-max="2.5">
							<div>
								<div class="flex items-center justify-between mb-4">
									<span class="px-3 py-1 rounded-full bg-[#1cabe2]/10 text-[#1cabe2] dark:text-[#38bdf8] font-mono text-[11px] font-semibold border border-[#1cabe2]/20 flex items-center gap-1.5">
										<span class="material-symbols-outlined text-[15px]">public</span>
										<span>United Nations Agencies</span>
									</span>
									<span class="font-mono text-[11px] text-outline">Geneva &bull; Global</span>
								</div>
								<h3 class="font-display text-2xl text-on-surface font-medium mb-2.5">
									UNICEF &amp; International Labour Organization (ILO)
								</h3>
								<p class="font-body text-[13px] text-on-surface-variant leading-relaxed mb-4">
									Engineered digital platforms, accessible tools, and scalable multilingual communication systems advancing global children’s health, education, and international labour standards worldwide.
								</p>
							</div>
							<div class="pt-4 border-t border-surface-container-high/60 font-mono text-[11px] text-outline flex items-center justify-between">
								<span>Humanitarian &amp; Policy Infrastructure</span>
								<span class="material-symbols-outlined text-[16px] text-emerald-600">verified</span>
							</div>
						</div>

						<!-- Pillar 2: Leading US Enterprises -->
						<div class="interactive-spotlight p-8 rounded-3xl bg-surface-container-low/40 hover:bg-surface-container-lowest border border-[#2563eb]/30 hover:border-[#2563eb]/60 hover:-translate-y-1 hover:shadow-card-soft transition-all duration-300 flex flex-col justify-between shadow-2xs group" data-tilt data-tilt-max="2.5">
							<div>
								<div class="flex items-center justify-between mb-4">
									<span class="px-3 py-1 rounded-full bg-[#2563eb]/10 text-[#2563eb] dark:text-[#60a5fa] font-mono text-[11px] font-semibold border border-[#2563eb]/20 flex items-center gap-1.5">
										<span class="material-symbols-outlined text-[15px]">corporate_fare</span>
										<span>United States Enterprise</span>
									</span>
									<span class="font-mono text-[11px] text-outline">Silicon Valley &bull; USA</span>
								</div>
								<h3 class="font-display text-2xl text-on-surface font-medium mb-2.5">
									Leading US Enterprises &amp; SaaS Scale
								</h3>
								<p class="font-body text-[13px] text-on-surface-variant leading-relaxed mb-4">
									Partnered with prominent United States corporations, technology ventures, and high-growth SaaS firms across the US to deliver resilient web architectures, automated workflows, and high-performance digital products.
								</p>
							</div>
							<div class="pt-4 border-t border-surface-container-high/60 font-mono text-[11px] text-outline flex items-center justify-between">
								<span>Corporate Tech &amp; Cloud Workflows</span>
								<span class="material-symbols-outlined text-[16px] text-emerald-600">verified</span>
							</div>
						</div>

						<!-- Pillar 3: Gulf Regional Conglomerates -->
						<div class="interactive-spotlight p-8 rounded-3xl bg-surface-container-low/40 hover:bg-surface-container-lowest border border-[#0d9488]/30 hover:border-[#0d9488]/60 hover:-translate-y-1 hover:shadow-card-soft transition-all duration-300 flex flex-col justify-between shadow-2xs group" data-tilt data-tilt-max="2.5">
							<div>
								<div class="flex items-center justify-between mb-4">
									<span class="px-3 py-1 rounded-full bg-[#0d9488]/10 text-[#0d9488] dark:text-[#2dd4bf] font-mono text-[11px] font-semibold border border-[#0d9488]/20 flex items-center gap-1.5">
										<span class="material-symbols-outlined text-[15px]">location_city</span>
										<span>Gulf &amp; GCC Region</span>
									</span>
									<span class="font-mono text-[11px] text-outline">UAE &bull; Saudi Arabia</span>
								</div>
								<h3 class="font-display text-2xl text-on-surface font-medium mb-2.5">
									Gulf Regional Conglomerates &amp; Holdings
								</h3>
								<p class="font-body text-[13px] text-on-surface-variant leading-relaxed mb-4">
									Architected mission-critical web applications, commercial digital solutions, and scalable enterprise portals for major holding groups and established businesses across the UAE, Saudi Arabia, and the Gulf region.
								</p>
							</div>
							<div class="pt-4 border-t border-surface-container-high/60 font-mono text-[11px] text-outline flex items-center justify-between">
								<span>Enterprise Portals &amp; Holding Groups</span>
								<span class="material-symbols-outlined text-[16px] text-emerald-600">verified</span>
							</div>
						</div>

						<!-- Pillar 4: Social Impact & Research (UCEP & WasteSafe) -->
						<div class="interactive-spotlight p-8 rounded-3xl bg-surface-container-low/40 hover:bg-surface-container-lowest border border-[#d97706]/30 hover:border-[#d97706]/60 hover:-translate-y-1 hover:shadow-card-soft transition-all duration-300 flex flex-col justify-between shadow-2xs group" data-tilt data-tilt-max="2.5">
							<div>
								<div class="flex items-center justify-between mb-4">
									<span class="px-3 py-1 rounded-full bg-[#d97706]/10 text-[#d97706] dark:text-[#fbbf24] font-mono text-[11px] font-semibold border border-[#d97706]/20 flex items-center gap-1.5">
										<span class="material-symbols-outlined text-[15px]">school</span>
										<span>Education &amp; Research Impact</span>
									</span>
									<span class="font-mono text-[11px] text-outline">International</span>
								</div>
								<h3 class="font-display text-2xl text-on-surface font-medium mb-2.5">
									UCEP &amp; WasteSafe International
								</h3>
								<p class="font-body text-[13px] text-on-surface-variant leading-relaxed mb-4">
									Built institutional educational platforms empowering underprivileged youth with technical skills, alongside academic research dissemination portals for international environmental waste management conferences.
								</p>
							</div>
							<div class="pt-4 border-t border-surface-container-high/60 font-mono text-[11px] text-outline flex items-center justify-between">
								<span>Vocational Pathways &amp; Global Ecology</span>
								<span class="material-symbols-outlined text-[16px] text-emerald-600">verified</span>
							</div>
						</div>

					</div>

				</div>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 6: LATEST WRITING (WARM EDITORIAL MAGAZINE LAYOUT)
		     ================================================================= -->
		<section class="px-6 md:px-12 lg:px-16 py-16 md:py-20 lg:py-24 bg-[#faf8f4] dark:bg-[#13141a] border-b border-surface-container-high/60">
			<div class="max-w-6xl mx-auto flex flex-col gap-10">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<div class="inline-flex items-center gap-2 font-mono text-[11px] tracking-wider uppercase text-outline mb-1.5">
							<span class="w-1.5 h-1.5 bg-primary-container rounded-full"></span>
							<span>Editorial Journal &bull; Technical Dispatches</span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl lg:text-4xl text-on-surface font-normal">
							Recent Articles &amp; Architectural Insights
						</h2>
					</div>
					<a href="<?php echo esc_url( $articles_url ); ?>" class="font-mono text-[11.5px] text-on-surface-variant hover:text-primary-container transition-colors inline-flex items-center gap-1.5 group pb-1">
						<span>Explore all articles</span>
						<span class="material-symbols-outlined text-[15px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
					</a>
				</div>

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
					$post_index = 0;
					$lead_post  = null;
					$sub_posts  = array();

					while ( $recent_posts->have_posts() ) :
						$recent_posts->the_post();
						if ( 0 === $post_index ) {
							$lead_post = array(
								'id'        => get_the_ID(),
								'title'     => get_the_title(),
								'permalink' => get_permalink(),
								'date'      => get_the_date( 'M j, Y' ),
								'excerpt'   => get_the_excerpt(),
								'read_time' => stitch_get_reading_time( get_the_ID() ),
								'category'  => ( $c = get_the_category() ) ? $c[0]->name : 'Engineering',
							);
						} else {
							$sub_posts[] = array(
								'id'        => get_the_ID(),
								'title'     => get_the_title(),
								'permalink' => get_permalink(),
								'date'      => get_the_date( 'M j, Y' ),
								'excerpt'   => get_the_excerpt(),
								'read_time' => stitch_get_reading_time( get_the_ID() ),
								'category'  => ( $c = get_the_category() ) ? $c[0]->name : 'Engineering',
							);
						}
						$post_index++;
					endwhile;
					wp_reset_postdata();
					?>

					<!-- Asymmetric Magazine Split Layout (7 cols Lead Story + 5 cols Stacked List) -->
					<div class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-stretch">
						
						<!-- Left Lead Editorial Essay (7 cols) -->
						<?php if ( $lead_post ) : ?>
							<article class="lg:col-span-7 bg-surface-container-lowest p-8 sm:p-10 rounded-3xl border border-outline-variant/50 shadow-sm hover:shadow-card-soft transition-all duration-300 flex flex-col justify-between group relative overflow-hidden">
								<div>
									<div class="flex items-center justify-between mb-4 font-mono text-[11px]">
										<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary font-semibold uppercase tracking-wider">
											<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
											<span>Featured Lead Essay</span>
										</span>
										<span class="text-outline"><?php echo esc_html( $lead_post['read_time'] ); ?> MIN READ</span>
									</div>

									<h3 class="font-display text-[26px] sm:text-[32px] text-on-surface font-normal leading-[1.18] tracking-tight mb-4 group-hover:text-primary transition-colors">
										<a href="<?php echo esc_url( $lead_post['permalink'] ); ?>">
											<?php echo esc_html( $lead_post['title'] ); ?>
										</a>
									</h3>

									<p class="font-body text-[15px] text-on-surface-variant leading-relaxed mb-6">
										<?php echo esc_html( wp_trim_words( $lead_post['excerpt'], 34, '...' ) ); ?>
									</p>
								</div>

								<div class="pt-6 border-t border-surface-container-high/60 flex items-center justify-between font-mono text-[11.5px] text-outline">
									<div class="flex items-center gap-3">
										<span class="px-2.5 py-1 rounded-md bg-surface-container text-on-surface font-medium"><?php echo esc_html( $lead_post['category'] ); ?></span>
										<span><?php echo esc_html( $lead_post['date'] ); ?></span>
									</div>
									<a href="<?php echo esc_url( $lead_post['permalink'] ); ?>" class="inline-flex items-center gap-1.5 text-on-surface group-hover:text-primary font-semibold transition-colors">
										<span>Read Full Essay</span>
										<span class="material-symbols-outlined text-[15px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
									</a>
								</div>
							</article>
						<?php endif; ?>

						<!-- Right Stacked Dispatch Feed (5 cols) -->
						<div class="lg:col-span-5 flex flex-col gap-6">
							<?php foreach ( $sub_posts as $sp ) : ?>
								<article class="bg-surface-container-lowest p-7 rounded-3xl border border-outline-variant/50 shadow-2xs hover:shadow-card-soft hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between flex-1 group">
									<div>
										<div class="flex items-center justify-between mb-3 font-mono text-[11px] text-outline">
											<span class="px-2.5 py-0.5 rounded-full bg-surface-container text-on-surface font-medium"><?php echo esc_html( $sp['category'] ); ?></span>
											<span><?php echo esc_html( $sp['read_time'] ); ?> MIN READ</span>
										</div>

										<h4 class="font-display text-xl text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug mb-2 font-medium">
											<a href="<?php echo esc_url( $sp['permalink'] ); ?>">
												<?php echo esc_html( $sp['title'] ); ?>
											</a>
										</h4>

										<p class="font-body text-[13px] text-on-surface-variant line-clamp-2 leading-relaxed">
											<?php echo esc_html( wp_trim_words( $sp['excerpt'], 18, '...' ) ); ?>
										</p>
									</div>

									<div class="pt-4 mt-4 border-t border-surface-container-high/50 flex items-center justify-between font-mono text-[11px] text-outline">
										<span><?php echo esc_html( $sp['date'] ); ?></span>
										<a href="<?php echo esc_url( $sp['permalink'] ); ?>" class="text-on-surface group-hover:text-primary inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform font-medium">
											<span>Read Dispatch</span>
											<span class="material-symbols-outlined text-[14px]">north_east</span>
										</a>
									</div>
								</article>
							<?php endforeach; ?>
						</div>

					</div>
				<?php else : ?>
					<div class="p-8 rounded-3xl bg-surface-container-lowest border border-dashed border-outline-variant/60 text-center flex flex-col items-center justify-center gap-2">
						<span class="material-symbols-outlined text-[24px] text-outline">edit_note</span>
						<h3 class="font-display text-lg text-on-surface">No dispatches published yet</h3>
					</div>
				<?php endif; ?>

			</div>
		</section>

		<!-- =================================================================
		     SECTION 7: DIRECT ENGAGEMENT (DEEP MIDNIGHT AURORA TERMINAL)
		     ================================================================= -->
		<section class="px-6 md:px-12 lg:px-16 py-20 md:py-28 bg-surface-container-lowest">
			<div class="max-w-6xl mx-auto relative bg-gradient-to-br from-[#090d16] via-[#0f172a] to-[#020617] text-white p-8 sm:p-12 md:p-16 rounded-3xl border border-indigo-500/20 shadow-2xl overflow-hidden">
				
				<!-- Ambient Aurora Glows -->
				<div class="absolute -top-32 -right-32 w-96 h-96 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
				<div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>

				<div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-10">
					<div class="max-w-xl">
						<div class="inline-flex items-center gap-2 font-mono text-[11px] tracking-wider uppercase text-emerald-400 mb-3 font-semibold">
							<span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
							<span>Direct Dispatch &bull; <?php echo esc_html( $cta_eyebrow ); ?></span>
						</div>
						<h2 class="font-display text-2xl sm:text-3xl lg:text-[40px] text-white font-normal mb-3.5 leading-[1.18] tracking-tight">
							<?php
							$title_lines = explode( "\n", $cta_title );
							if ( count( $title_lines ) > 1 ) :
								echo esc_html( $title_lines[0] ) . '<br><span class="italic font-serif text-emerald-400">' . esc_html( $title_lines[1] ) . '</span>';
							else :
								echo wp_kses_post( $cta_title );
							endif;
							?>
						</h2>
						<p class="font-body text-[15px] text-slate-300 leading-relaxed">
							<?php echo wp_kses_post( $cta_desc ); ?>
						</p>
					</div>

					<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 shrink-0 w-full sm:w-auto relative z-10">
						<a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-full bg-white text-[#090d16] hover:bg-emerald-400 hover:text-[#090d16] font-mono text-[13px] font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all group">
							<span>Start a Conversation</span>
							<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
						</a>
						<button type="button" data-copy-email="<?php echo esc_attr( get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' ) ); ?>" class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-full bg-white/10 hover:bg-white/20 text-white font-mono text-[12px] border border-white/15 transition-all cursor-pointer backdrop-blur-md" title="Copy Email">
							<span class="material-symbols-outlined text-[15px]">content_copy</span>
							<span>Copy Email</span>
						</button>
					</div>
				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
