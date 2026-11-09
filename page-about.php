<?php
/**
 * Template Name: About
 * Description: About Rashed Hossain - WordPress Core contributor, background, tools, and photography.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$page_contact = get_page_by_path( 'contact' );
$page_contrib = get_page_by_path( 'contributions' ) ?: get_page_by_path( 'wp-contributions' );
$contact_url  = $page_contact ? get_permalink( $page_contact ) : home_url( '/contact/' );
$contrib_url  = $page_contrib ? get_permalink( $page_contrib ) : home_url( '/contributions/' );

$about_eyebrow = get_theme_mod( 'stitch_about_eyebrow', 'Tech Support Lead · AI & Automation · Product Management' );
$about_title   = get_theme_mod( 'stitch_about_title', 'Curiosity became a career.<br><span class="italic text-primary-container font-serif">Contribution</span> became a habit.' );
$about_intro   = get_theme_mod( 'stitch_about_intro', 'I am Rashed Hossain — Tech Support Lead, software engineer, and AI automation specialist. Over the past 10+ years, I have engineered and scaled solutions powering millions of websites worldwide. Combining deep open-source expertise (WordPress Core, WooCommerce, Jetpack, Three.js, Vue.js) with modern AI architectures, workflow automation, and data analytics, I bridge product vision, complex codebases, and global user scale.' );
$about_quote   = get_theme_mod( 'stitch_about_quote', 'Great software is not measured solely by lines of code, but by the resilience of the systems you build, the workflows you automate, and the communities you empower. When you engineer tools powering millions worldwide, empathy and stewardship are your greatest technical virtues.' );
$about_horizon = get_theme_mod( 'stitch_about_horizon', 'Outside of software, I love exploring architectural lines, quiet urban scenes, and cultural heritage through photography. Over 125 of my photos have been featured on Pexels and shared freely with the creative commons.' );
$pexels_url    = get_theme_mod( 'stitch_pexels_url', 'https://www.pexels.com/@rashed-hossain-1520582336/highlights/' );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<!-- SECTION 1: ABOUT MASTHEAD -->
		<section class="relative px-6 md:px-12 pt-10 pb-12 overflow-hidden bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center max-w-5xl">
				
				<div class="lg:col-span-8 flex flex-col gap-4">
					<!-- Eyebrow Pill -->
					<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 self-start">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
						<span><?php echo esc_html( $about_eyebrow ); ?></span>
					</div>

					<!-- Main Headline -->
					<h1 class="font-display text-[38px] sm:text-[48px] lg:text-[54px] text-on-surface tracking-[-0.025em] leading-[1.08] font-normal">
						<?php echo wp_kses_post( $about_title ); ?>
					</h1>

					<!-- Narrative Subtext -->
					<div class="font-body-md text-base sm:text-lg text-on-surface-variant max-w-2xl leading-relaxed">
						<?php echo wp_kses_post( $about_intro ); ?>
					</div>

					<!-- Quick Highlights -->
					<div class="flex flex-wrap items-center gap-3 pt-2 font-label-code text-[12px] text-on-surface-variant">
						<span class="inline-flex items-center gap-1.5 text-on-surface font-medium">
							<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
							<span>AI &amp; Workflow Automation</span>
						</span>
						<span class="text-outline-variant">/</span>
						<span class="inline-flex items-center gap-1.5 text-on-surface font-medium">
							<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
							<span>Product Management &amp; Data Analysis</span>
						</span>
						<span class="text-outline-variant">/</span>
						<span>Tech Support Lead @ Ollyo</span>
						<span class="text-outline-variant">/</span>
						<span class="text-primary-container font-medium">10+ Years Open Web</span>
					</div>
				</div>

				<!-- Portrait Card -->
				<div class="lg:col-span-4 flex justify-center lg:justify-end">
					<div class="relative w-full max-w-xs bg-surface-container-lowest p-3 rounded-2xl shadow-sm border border-outline-variant/50 transition-all hover:border-outline-variant/80 group">
						<span class="absolute top-2 left-2 text-outline-variant/50 font-mono text-[10px] select-none pointer-events-none">+</span>
						<span class="absolute top-2 right-2 text-outline-variant/50 font-mono text-[10px] select-none pointer-events-none">+</span>

						<div class="relative aspect-square w-full overflow-hidden rounded-xl bg-surface-container">
							<picture>
								<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain-400.webp' ); ?> 400w, <?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.webp' ); ?> 800w" sizes="(max-width: 640px) 320px, 384px">
								<img src="<?php echo esc_url( stitch_get_hero_avatar() ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'stitch_brand_name', 'Rashed Hossain' ) ); ?>" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-[1.02]" width="400" height="400" fetchpriority="high" loading="eager" decoding="async">
							</picture>
							<div class="absolute bottom-2 left-2 px-2.5 py-0.5 bg-on-surface/85 backdrop-blur-md rounded-full text-surface font-label-code text-[10px] tracking-wider uppercase font-medium">
								Rashed Hossain · Engineering &amp; AI
							</div>
						</div>

						<div class="flex items-center justify-between pt-2.5 px-1 font-label-code text-[11px]">
							<span class="text-outline">Core Contributor</span>
							<span class="text-emerald-700 dark:text-emerald-400 font-medium flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
							</span>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- WORDPRESS PAGE EDITOR CONTENT BLOCK (IF CUSTOM CONTENT ENTERED IN WP ADMIN) -->
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$about_content = get_the_content();
				if ( ! empty( trim( $about_content ) ) ) :
					?>
					<section class="px-6 md:px-12 py-12 bg-surface-container-lowest border-b border-surface-container-high/60">
						<div class="max-w-4xl mx-auto prose prose-slate">
							<?php the_content(); ?>
						</div>
					</section>
					<?php
				endif;
			endwhile;
		endif;
		?>

		<!-- SECTION 2: PHILOSOPHY & BACKGROUND -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="flex flex-col gap-8 max-w-4xl">
				
				<div class="relative bg-surface-container-lowest p-8 sm:p-10 md:p-12 rounded-2xl shadow-sm border border-outline-variant/50 transition-all hover:border-outline-variant/80">
					<!-- Architectural Crosshairs -->
					<span class="absolute top-3 left-3 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
					<span class="absolute top-3 right-3 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>

					<div class="flex items-center justify-between pb-5 mb-6 border-b border-surface-container-high/60">
						<span class="font-label-code text-[11px] text-outline uppercase tracking-wider">Philosophy &amp; Approach</span>
						<span class="font-label-code text-[11px] text-primary-container font-medium px-2.5 py-0.5 rounded-full bg-surface-container">10+ Years</span>
					</div>

					<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal mb-5">
						Architecting Systems That Scale &amp; Endure
					</h2>

					<div class="font-body-md text-[14.5px] sm:text-base text-on-surface-variant space-y-4 leading-relaxed">
						<p>
							In a fast-moving industry often distracted by ephemeral trends, my engineering philosophy centers on durability, precision, and measurable user impact. As Tech Support Lead at <strong>Ollyo &amp; Themeum</strong>, I operate at the intersection of complex codebases, product management, and high-scale user empathy. Guiding technical operations for <strong>Tutor LMS</strong> (the leading WordPress LMS plugin) alongside custom enterprise platforms, I translate real-world user telemetry and customer feedback into resilient product architectures and seamless experiences.
						</p>
						<p>
							Modern engineering demands more than writing code—it requires intelligent automation and data-informed decision-making. I specialize in designing <strong>AI-driven workflows, agentic automation, and deep data analysis</strong> that eliminate operational bottlenecks and optimize systems at scale. Whether engineering automated security intelligence benchmarks, optimizing database queries for high-concurrency environments, or integrating AI translation frameworks, I treat reliability, backwards compatibility, and sub-second performance as non-negotiable promises.
						</p>
						<p>
							Contributing upstream to open-source software that powers more than 43% of the internet is a profound responsibility. My active open-source work spans <strong>WordPress Core</strong> (with credited contributions across releases 6.9, 7.0, and 7.1), the <strong>WordPress Performance Lab</strong> (advancing Optimization Detective metrics and View Transitions), the official <strong>WordPress AI Initiative</strong>, <strong>Gutenberg</strong> UI architecture, and <strong>WP-CLI</strong> atomic config tools. Beyond code, I actively support the global community through hands-on technical mentoring, contributor workshops, and international conferences like <strong>WordCamp Nepal 2027</strong>.
						</p>
					</div>

					<!-- Integrated Quote Line -->
					<div class="mt-8 pt-6 border-t border-surface-container-high/60 flex items-start gap-3">
						<span class="material-symbols-outlined text-primary-container text-[20px] shrink-0 mt-0.5">format_quote</span>
						<blockquote class="font-display text-base sm:text-lg text-on-surface italic leading-relaxed">
							&ldquo;<?php echo esc_html( $about_quote ); ?>&rdquo;
						</blockquote>
					</div>
				</div>

			</div>
		</section>

		<!-- SECTION 2.5: GLOBAL CLIENTS & INSTITUTIONAL TRUST -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/20 border-b border-surface-container-high/60">
			<div class="flex flex-col gap-8 max-w-5xl">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Institutional Trust &amp; Global Impact
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Global Clients &amp; Enterprise Track Record
						</h2>
						<p class="font-body-sm text-[13.5px] text-on-surface-variant mt-1.5 max-w-2xl leading-relaxed">
							Trusted by international agencies, leading enterprise corporations across the USA &amp; Gulf region, non-profit institutions, and national governments to architect resilient, mission-critical digital systems.
						</p>
					</div>
					<div class="flex items-center gap-2 font-label-code text-[11px] text-outline shrink-0">
						<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
						<span>High-Security Enterprise Delivery</span>
					</div>
				</div>

				<!-- Client Trust Dossier Cards (7-Card Symmetric Grid) -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
					
					<!-- 1. UNICEF -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#1cabe2]/10 text-[#1cabe2] dark:text-[#38bdf8] font-label-code text-[10.5px] font-semibold border border-[#1cabe2]/20">
									United Nations Agency
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">public</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">UNICEF</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Delivered web platforms, technical solutions, and accessible interfaces supporting international child welfare, healthcare, and education programs.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>United Nations Children's Fund</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 2. ILO (International Labour Organization) -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#1e40af]/10 text-[#1e40af] dark:text-[#93c5fd] font-label-code text-[10.5px] font-semibold border border-[#1e40af]/20">
									UN Specialized Agency
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">balance</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">International Labour Organization</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Architected reliable web tools, policy communication platforms, and institutional portals advancing global labor rights and international standards.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>ILO // Geneva &amp; Global Missions</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 3. Leading US Enterprises -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
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
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
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
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#059669]/10 text-[#059669] dark:text-[#34d399] font-label-code text-[10.5px] font-semibold border border-[#059669]/20">
									Non-Profit &amp; Education
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">school</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">UCEP</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Engineered digital infrastructure and educational platforms empowering underprivileged youth with vocational training and career readiness.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>Underprivileged Children's Programs</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 6. WasteSafe -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#d97706]/10 text-[#d97706] dark:text-[#fbbf24] font-label-code text-[10.5px] font-semibold border border-[#d97706]/20">
									Environmental Research
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">eco</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">WasteSafe</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Developed academic conference platforms, research repositories, and digital resources for the International Conference on Solid &amp; Hazardous Waste Management.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex items-center justify-between">
							<span>WasteSafe Research Consortium</span>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified</span>
						</div>
					</div>

					<!-- 7. National Governments -->
					<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between shadow-xs group sm:col-span-2 lg:col-span-3">
						<div>
							<div class="flex items-center justify-between mb-3.5">
								<span class="px-2.5 py-0.5 rounded-full bg-[#7c3aed]/10 text-[#7c3aed] dark:text-[#c084fc] font-label-code text-[10.5px] font-semibold border border-[#7c3aed]/20">
									Public Sector &amp; Ministries
								</span>
								<span class="material-symbols-outlined text-[19px] text-outline group-hover:text-primary-container transition-colors">account_balance</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-medium">Multiple National Governments</h3>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant mt-2 leading-relaxed">
								Developed secure, accessible, high-traffic government portals and civic digital platforms across multiple nations, complying with rigorous national security, privacy, and accessibility standards.
							</p>
						</div>
						<div class="pt-3.5 mt-5 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline flex flex-wrap items-center justify-between gap-2">
							<div class="flex items-center gap-3">
								<span>National Ministries</span>
								<span>·</span>
								<span>Citizen Portals</span>
								<span>·</span>
								<span>High-Availability Systems</span>
								<span>·</span>
								<span>Strict Compliance &amp; Accessibility</span>
							</div>
							<span class="material-symbols-outlined text-[14px] text-outline-variant">verified_user</span>
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- SECTION 3: TOOLING & TECH STACK -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="flex flex-col gap-8 max-w-5xl">
				
				<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Tools &amp; Technologies
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							What I Work With Daily
						</h2>
					</div>
					<span class="font-label-code text-[11px] text-emerald-700 dark:text-emerald-400 font-medium flex items-center gap-1.5">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
						Tested &amp; Production Ready
					</span>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
					
					<div class="relative p-6 sm:p-7 bg-surface-container-low/40 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group">
						<span class="absolute top-3 right-3 text-outline-variant/50 font-mono text-[10px] select-none">+</span>
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] uppercase tracking-wider text-outline">01 // BACKEND</span>
								<span class="material-symbols-outlined text-primary-container text-[22px]">terminal</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">Backend &amp; Data</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								PHP 8.2+, MySQL, Redis, Composer, Local WP for fast offline development, and automated PHPUnit test suites.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							Architecture &amp; Performance
						</div>
					</div>

					<div class="relative p-6 sm:p-7 bg-surface-container-low/40 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group">
						<span class="absolute top-3 right-3 text-outline-variant/50 font-mono text-[10px] select-none">+</span>
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] uppercase tracking-wider text-outline">02 // FRONTEND</span>
								<span class="material-symbols-outlined text-primary-container text-[22px]">devices</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">Frontend &amp; Gutenberg</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								TypeScript, React, Gutenberg Block API, Tailwind CSS, Vite, and modern semantic web standards.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							Modern Interface &amp; React
						</div>
					</div>

					<div class="relative p-6 sm:p-7 bg-surface-container-low/40 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group">
						<span class="absolute top-3 right-3 text-outline-variant/50 font-mono text-[10px] select-none">+</span>
						<div>
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] uppercase tracking-wider text-outline">03 // OPERATIONS</span>
								<span class="material-symbols-outlined text-primary-container text-[22px]">schema</span>
							</div>
							<h3 class="font-display text-xl text-on-surface font-normal mb-2">Workflows &amp; Tooling</h3>
							<p class="font-body-sm text-[13px] text-on-surface-variant leading-relaxed">
								Git, GitHub Actions CI/CD, Trac tickets, Docker containerization, WP-CLI, and automated release pipelines.
							</p>
						</div>
						<div class="pt-4 mt-4 border-t border-surface-container-high/50 font-label-code text-[11px] text-outline">
							CI/CD &amp; Version Control
						</div>
					</div>

				</div>

			</div>
		</section>

		<!-- SECTION 3.5: OPEN SOURCE CONTRIBUTIONS & RECOGNITION SHOWCASE -->
		<section class="px-6 md:px-12 py-10 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl">
				
				<div class="relative p-6 sm:p-8 rounded-2xl bg-surface-container-lowest border border-outline-variant/50 hover:border-outline-variant/80 transition-all shadow-xs flex flex-col gap-6 group">
					
					<!-- Top Architectural Ledger Bar -->
					<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-surface-container-high/60">
						<div class="flex items-center gap-3">
							<div class="w-7 h-7 rounded-full bg-[#0073aa]/10 dark:bg-[#0073aa]/20 border border-[#0073aa]/30 text-[#0073aa] dark:text-[#38bdf8] flex items-center justify-center shrink-0 shadow-xs">
								<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"/>
								</svg>
							</div>
							<span class="font-label-meta text-[11px] uppercase tracking-wider text-outline font-semibold">
								Community Leadership &amp; Upstream Governance
							</span>
						</div>
						<div class="flex items-center gap-2">
							<span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-label-code text-[11px] font-semibold border border-emerald-500/20">
								11 Official Badges
							</span>
							<span class="text-outline-variant hidden sm:inline">·</span>
							<span class="font-label-code text-[11px] text-on-surface-variant hidden sm:inline">
								Open Scale Stewardship
							</span>
						</div>
					</div>

					<!-- Main Editorial Content & Narrative -->
					<div class="flex flex-col gap-2">
						<h3 class="font-display text-xl sm:text-2xl text-on-surface font-semibold tracking-tight">
							Active Contributor Across the WordPress &amp; Open-Source Ecosystem
						</h3>
						<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed max-w-3xl">
							Active upstream contributor to WordPress Core, WooCommerce, Jetpack, the WordPress AI Initiative, Three.js, Vue.js, and developer tooling. Recognized across Core Development, Meta Infrastructure, Gutenberg Patterns, Plugin Development, and WordCamp Leadership.
						</p>
					</div>

					<!-- Visual Micro-Badges Ribbon -->
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

		<!-- SECTION 4: CURATED PHOTOGRAPHY & EDITORIAL ARCHIVE -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="flex flex-col gap-8 max-w-5xl">
				
				<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
					<div>
						<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
							Photography &amp; Visuals
						</span>
						<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
							Moments Outside the Terminal
						</h2>
					</div>
					<div class="flex flex-wrap items-center gap-2">
						<span class="px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] border border-outline-variant/30">
							125+ Featured on Pexels
						</span>
						<span class="px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] border border-outline-variant/30">
							Free Creative Commons
						</span>
					</div>
				</div>

				<!-- 8 Curated Photo Cards Grid -->
				<?php
				$curated_gallery = array(
					array(
						'id'       => '36236714',
						'file'     => 'pexels-36236714-phewa-lake-kayak',
						'title'    => 'Sunset Kayaking on Phewa Lake',
						'category' => 'WATERSCAPES',
						'tag'      => 'Pokhara, Nepal',
						'caption'  => 'Golden hour reflections on tranquil waters.',
						'url'      => 'https://www.pexels.com/photo/sunset-kayaking-on-phewa-lake-in-pokhara-36236714/',
						'width'    => 1200,
						'height'   => 800,
					),
					array(
						'id'       => '36308816',
						'file'     => 'pexels-36308816-annapurna-mountain',
						'title'    => 'Annapurna Himalayas Peak',
						'category' => 'EXPEDITIONS',
						'tag'      => 'Himalayas',
						'caption'  => 'Snow-capped Himalayan ridge and morning light.',
						'url'      => 'https://www.pexels.com/photo/36308816/',
						'width'    => 1200,
						'height'   => 900,
					),
					array(
						'id'       => '39003449',
						'file'     => 'pexels-39003449-airplane-sunset',
						'title'    => 'Commercial Aircraft at Sunset',
						'category' => 'AVIATION',
						'tag'      => 'Twilight Horizon',
						'caption'  => 'High-altitude silhouette against sunset gradients.',
						'url'      => 'https://www.pexels.com/photo/commercial-airplane-flying-at-sunset-with-orange-sky-39003449/',
						'width'    => 1200,
						'height'   => 900,
					),
					array(
						'id'       => '35358099',
						'file'     => 'pexels-35358099-river-walk-bw',
						'title'    => 'Evening Walk Along River Path',
						'category' => 'MONOCHROME',
						'tag'      => 'Reportage',
						'caption'  => 'High-contrast monochrome human stillness.',
						'url'      => 'https://www.pexels.com/photo/black-and-white-evening-walk-along-river-path-35358099/',
						'width'    => 1200,
						'height'   => 1800,
					),
					array(
						'id'       => '36308832',
						'file'     => 'pexels-36308832-mountain-ridge',
						'title'    => 'Himalayan Ridge & Cloud Sea',
						'category' => 'ALPINE',
						'tag'      => 'Topography',
						'caption'  => 'Dramatic cloud inversions and mountain ridges.',
						'url'      => 'https://www.pexels.com/photo/36308832/',
						'width'    => 1200,
						'height'   => 900,
					),
					array(
						'id'       => '32791929',
						'file'     => 'pexels-32791929-lake-reflection',
						'title'    => 'Serene Waterways & Reflection',
						'category' => 'WATERSCAPES',
						'tag'      => 'Tranquility',
						'caption'  => 'Lush greenery mirroring stillness on calm waters.',
						'url'      => 'https://www.pexels.com/photo/32791929/',
						'width'    => 1200,
						'height'   => 904,
					),
					array(
						'id'       => '32760703',
						'file'     => 'pexels-32760703-light-shadow',
						'title'    => 'Minimal Geometric Shadow',
						'category' => 'MINIMALISM',
						'tag'      => 'Light Study',
						'caption'  => 'Interplay of architectural light and negative space.',
						'url'      => 'https://www.pexels.com/photo/32760703/',
						'width'    => 1200,
						'height'   => 904,
					),
					array(
						'id'       => '32760701',
						'file'     => 'pexels-32760701-architectural-form',
						'title'    => 'Architectural Lines & Spatial Form',
						'category' => 'ARCHITECTURE',
						'tag'      => 'Geometry',
						'caption'  => 'Linear symmetry, rhythm, and structural engineering.',
						'url'      => 'https://www.pexels.com/photo/32760701/',
						'width'    => 1200,
						'height'   => 1594,
					),
				);
				?>

				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
					<?php foreach ( $curated_gallery as $photo ) : ?>
						<a href="<?php echo esc_url( $photo['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="group flex flex-col gap-2.5 bg-surface-container-lowest p-2.5 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all shadow-xs">
							<div class="relative aspect-[4/3] w-full overflow-hidden rounded-xl bg-surface-container">
								<picture>
									<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $photo['file'] . '.webp' ); ?>" type="image/webp">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $photo['file'] . '.jpg' ); ?>" alt="<?php echo esc_attr( $photo['title'] ); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" width="<?php echo esc_attr( $photo['width'] ); ?>" height="<?php echo esc_attr( $photo['height'] ); ?>" loading="lazy" decoding="async">
								</picture>
								<div class="absolute top-2 left-2 px-2 py-0.5 bg-on-surface/80 backdrop-blur-md rounded-full text-surface font-label-code text-[9px] uppercase font-medium">
									<?php echo esc_html( $photo['category'] ); ?>
								</div>
								<div class="absolute bottom-2 right-2 px-2 py-0.5 bg-black/60 backdrop-blur-md rounded-full text-white font-label-code text-[9px]">
									<?php echo esc_html( $photo['tag'] ); ?>
								</div>
							</div>
							<div class="px-1 flex flex-col gap-0.5">
								<div class="flex items-center justify-between">
									<h3 class="font-display text-[15px] text-on-surface font-normal group-hover:text-primary-container transition-colors line-clamp-1">
										<?php echo esc_html( $photo['title'] ); ?>
									</h3>
									<span class="material-symbols-outlined text-[14px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all shrink-0">north_east</span>
								</div>
								<p class="font-body-sm text-[11.5px] text-on-surface-variant line-clamp-1">
									<?php echo esc_html( $photo['caption'] ); ?>
								</p>
							</div>
						</a>
					<?php endforeach; ?>
				</div>

				<!-- Direct Pexels Highlight Module -->
				<div class="p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary-container shrink-0">
							<span class="material-symbols-outlined text-[20px]">photo_camera</span>
						</div>
						<div>
							<h4 class="font-display text-lg text-on-surface font-normal">Explore 125+ Photos on Pexels</h4>
							<p class="font-body-sm text-[12.5px] text-on-surface-variant">Full-resolution gallery, curated editorial collections, and CC0 open commons.</p>
						</div>
					</div>
					<a href="<?php echo esc_url( $pexels_url ); ?>" target="_blank" rel="noopener noreferrer" class="shrink-0 inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-on-surface text-surface hover:bg-on-surface/90 transition-all font-body-sm text-[13px] font-medium shadow-xs group">
						<span>View Pexels Profile</span>
						<span class="material-symbols-outlined text-[15px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
					</a>
				</div>

			</div>
		</section>

		<!-- SECTION 4.5: EXPLORE THE WORK & ECOSYSTEM GATEWAY -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-low/30 border-b border-surface-container-high/60">
			<div class="max-w-5xl flex flex-col gap-6">
				<div>
					<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-1">
						Explore Further
					</span>
					<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
						From philosophy to real production impact.
					</h2>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
					<!-- Card 1: Contributions -->
					<a href="<?php echo esc_url( $contrib_url ); ?>" class="p-7 sm:p-8 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[11px] px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 font-semibold">11 BADGES · 3 RELEASES</span>
								<span class="material-symbols-outlined text-[18px] text-outline group-hover:text-primary-container group-hover:translate-x-1 transition-all">arrow_forward</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-medium group-hover:text-primary-container transition-colors mb-2">
								WordPress Contributions &amp; Code
							</h3>
							<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed">
								Browse verified upstream patches, core trac tickets, WP-CLI tools, and community leadership badges across the open web.
							</p>
						</div>
						<div class="pt-4 mt-6 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[12px] text-primary-container font-semibold">
							<span>Inspect Contribution Ledger</span>
							<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
						</div>
					</a>

					<!-- Card 2: Writing -->
					<a href="<?php echo esc_url( home_url( '/writing/' ) ); ?>" class="p-7 sm:p-8 rounded-2xl bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs">
						<div>
							<div class="flex items-center justify-between mb-3">
								<span class="font-label-code text-[11px] px-2.5 py-0.5 rounded-full bg-primary-container/10 text-primary-container font-semibold">6 ARTICLES · ARCHITECTURE</span>
								<span class="material-symbols-outlined text-[18px] text-outline group-hover:text-primary-container group-hover:translate-x-1 transition-all">arrow_forward</span>
							</div>
							<h3 class="font-display text-2xl text-on-surface font-medium group-hover:text-primary-container transition-colors mb-2">
								Technical Writing &amp; Dispatches
							</h3>
							<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed">
								Reflections on open source sustainability, atomic configurations, performance debugging, and community day organization.
							</p>
						</div>
						<div class="pt-4 mt-6 border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[12px] text-primary-container font-semibold">
							<span>Read All Dispatches</span>
							<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
						</div>
					</a>
				</div>
			</div>
		</section>

		<!-- SECTION 5: CALL TO ACTION -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest">
			<div class="bg-surface-container-low/40 p-8 sm:p-10 md:p-12 rounded-2xl border border-outline-variant/40 shadow-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-8 max-w-5xl">
				<div class="max-w-xl">
					<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block mb-2 font-medium">Get in Touch</span>
					<h3 class="font-display text-2xl sm:text-3xl text-on-surface font-normal mb-3">
						Have a project in mind or want to collaborate on open source?
					</h3>
					<p class="font-body-sm text-[13.5px] text-on-surface-variant leading-relaxed">
						I am always open to discussing WordPress architecture, open-source initiatives, or speaking at community conferences.
					</p>
				</div>
				<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0 w-full sm:w-auto">
					<a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-on-surface text-surface rounded-full hover:bg-on-surface/90 font-body-sm font-medium shadow-sm transition-all text-[13.5px] group">
						<span>Send Message</span>
						<span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
					</a>
					<a href="<?php echo esc_url( $contrib_url ); ?>" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-surface-container text-on-surface rounded-full hover:bg-surface-container-high font-body-sm font-medium border border-outline-variant/40 transition-all text-[13.5px]">
						<span>View Contributions</span>
					</a>
				</div>
			</div>
		</section>

	</div>
</main>

<?php
get_footer();
