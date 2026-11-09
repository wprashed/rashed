<?php
/**
 * The header template for Rashed Hossain — Stitch Animated theme.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_email = get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' );

$page_about   = stitch_get_page_cached( 'about' );
$page_contrib = stitch_get_page_cached( 'contributions' ) ?: stitch_get_page_cached( 'wp-contributions' );
$page_writing = stitch_get_page_cached( 'writing' ) ?: stitch_get_page_cached( 'articles' );
$page_contact = stitch_get_page_cached( 'contact' );

$home_url     = home_url( '/' );
$about_url    = $page_about ? get_permalink( $page_about ) : home_url( '/about/' );
$contrib_url  = $page_contrib ? get_permalink( $page_contrib ) : home_url( '/contributions/' );
$articles_url = $page_writing ? get_permalink( $page_writing ) : home_url( '/writing/' );
$contact_url  = $page_contact ? get_permalink( $page_contact ) : home_url( '/contact/' );

// Current active detection
$is_home    = is_front_page();
$is_about   = is_page( 'about' );
$is_contrib = is_page( 'wp-contributions' ) || is_page( 'contributions' );
$is_blog    = is_home() || is_archive() || is_single() || is_page( 'writing' ) || is_page( 'articles' );
$is_contact = is_page( 'contact' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	// Dynamic meta description fallback if no SEO plugin handles it
	if ( ! did_action( 'wpseo_head' ) && ! did_action( 'rank_math/head' ) && ! did_action( 'aioseo_loaded' ) ) :
		$meta_desc = '';
		if ( is_front_page() || is_home() ) {
			$meta_desc = get_bloginfo( 'description' ) ?: 'Rashed Hossain — Software Engineer, Tech Support Lead & AI Specialist. Engineering lead specializing in AI systems, workflow automation, and WordPress Core.';
		} elseif ( is_singular() ) {
			$meta_desc = wp_strip_all_tags( get_the_excerpt() );
		}
		if ( ! empty( $meta_desc ) ) :
			?>
	<meta name="description" content="<?php echo esc_attr( wp_trim_words( $meta_desc, 28, '' ) ); ?>">
			<?php
		endif;
	endif;
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preload" href="https://fonts.gstatic.com/s/josefinsans/v34/Qw3EZQNVED7rKGKxtqIqX5EUCEx6XHgOiJM6.woff2" as="font" type="font/woff2" crossorigin>
	<?php if ( function_exists( 'stitch_has_math_content' ) && stitch_has_math_content() ) : ?>
		<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-surface-container font-body-md text-on-surface antialiased min-h-screen py-6 md:py-10 px-3 sm:px-4 md:px-8 selection:bg-primary-container selection:text-on-primary' ); ?>>
<?php wp_body_open(); ?>

<!-- Main Outer Architectural Editorial Container -->
<div class="max-w-[1120px] mx-auto bg-surface-container-lowest border border-outline-variant/60 rounded-[24px] shadow-shell relative overflow-hidden flex flex-col min-h-[calc(100vh-5rem)] z-10">
	
	<!-- Architectural Grid Guidelines (Tectonic Vertical Accents) -->
	<div class="absolute inset-y-0 left-1/3 w-[1px] bg-surface-container-high pointer-events-none hidden lg:block z-0"></div>
	<div class="absolute inset-y-0 left-2/3 w-[1px] bg-surface-container-high pointer-events-none hidden lg:block z-0"></div>

	<!-- Masthead Header Navigation -->
	<header class="relative z-20 border-b border-outline-variant/50 bg-surface-container-lowest/90 backdrop-blur-md px-6 md:px-10">
		<div class="h-20 flex items-center justify-between gap-4">
			
			<!-- Brand Identity -->
			<div class="flex items-center shrink-0">
				<a href="<?php echo esc_url( $home_url ); ?>" class="flex items-baseline font-headline-md text-headline-md tracking-tight text-on-surface hover:opacity-85 transition-opacity duration-200 whitespace-nowrap">
					<span><?php echo esc_html( get_theme_mod( 'stitch_brand_name', 'Rashed' ) ); ?></span><span class="text-primary-container font-black ml-[1px]">.</span>
				</a>
			</div>

			<!-- Desktop Editorial Nav Links -->
			<nav class="hidden md:flex items-center gap-3.5 lg:gap-5 xl:gap-6 shrink-0 whitespace-nowrap">
				<a href="<?php echo esc_url( $home_url ); ?>" class="relative py-1 font-body-sm text-body-sm whitespace-nowrap transition-colors duration-200 <?php echo $is_home ? 'text-on-surface font-semibold' : 'text-on-surface-variant hover:text-on-surface'; ?>">
					Home
				</a>
				<a href="<?php echo esc_url( $about_url ); ?>" class="relative py-1 font-body-sm text-body-sm whitespace-nowrap transition-colors duration-200 <?php echo $is_about ? 'text-on-surface font-semibold' : 'text-on-surface-variant hover:text-on-surface'; ?>">
					About
				</a>
				<a href="<?php echo esc_url( $contrib_url ); ?>" class="relative py-1 font-body-sm text-body-sm whitespace-nowrap transition-colors duration-200 <?php echo $is_contrib ? 'text-on-surface font-semibold' : 'text-on-surface-variant hover:text-on-surface'; ?>">
					Contributions
				</a>
				<a href="<?php echo esc_url( $articles_url ); ?>" class="relative py-1 font-body-sm text-body-sm whitespace-nowrap transition-colors duration-200 <?php echo ( $is_blog && ! $is_home && ! $is_about && ! $is_contrib && ! $is_contact ) ? 'text-on-surface font-semibold' : 'text-on-surface-variant hover:text-on-surface'; ?>">
					Articles
				</a>
				<a href="<?php echo esc_url( $contact_url ); ?>" class="relative py-1 font-body-sm text-body-sm whitespace-nowrap transition-colors duration-200 <?php echo $is_contact ? 'text-on-surface font-semibold' : 'text-on-surface-variant hover:text-on-surface'; ?>">
					Contact
				</a>
			</nav>

			<!-- Action Cluster: Dark Mode + Live Status Pill + Avatar -->
			<div class="flex items-center gap-1.5 sm:gap-2.5 shrink-0">
				
				<!-- Global Quick Jump / Command Palette Trigger Button -->
				<button type="button" id="cmd-palette-trigger" class="inline-flex items-center gap-1.5 px-2.5 sm:px-3 py-1 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface font-label-code text-[11px] border border-outline-variant/40 transition-all cursor-pointer shadow-xs shrink-0 whitespace-nowrap" title="Quick Jump &amp; Search (⌘K / Ctrl+K)">
					<span class="material-symbols-outlined text-[16px]">search</span>
					<span class="hidden xl:inline">Search</span>
					<kbd class="px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant text-[9.5px] font-mono border border-outline-variant/60 font-semibold">⌘K</kbd>
				</button>

				<!-- Dark / Light Theme Mode Toggle Button -->
				<button type="button" id="theme-toggle-btn" onclick="window.toggleDarkMode()" class="p-2 rounded-full text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors duration-200 cursor-pointer shrink-0" aria-label="Toggle Dark / Light Mode" title="Toggle Theme Mode">
					<span id="theme-toggle-icon" class="material-symbols-outlined text-[19px]">dark_mode</span>
				</button>

				<!-- Live Dispatch Pill with Click-to-Copy -->
				<a href="mailto:<?php echo esc_attr( $contact_email ); ?>" data-copy-email="<?php echo esc_attr( $contact_email ); ?>" class="group flex items-center gap-1.5 sm:gap-2 px-2.5 sm:px-3.5 py-1.5 rounded-full border border-outline-variant/60 bg-surface-container-lowest hover:border-outline-variant/90 transition-all duration-200 shadow-xs cursor-pointer shrink-0" title="Click to copy email address">
					<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block shrink-0"></span>
					<span class="font-label-code text-label-code text-on-surface group-hover:text-primary-container transition-colors duration-200 hidden xl:inline whitespace-nowrap">
						<?php echo esc_html( $contact_email ); ?>
					</span>
					<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container transition-colors duration-200 shrink-0">
						content_copy
					</span>
				</a>

				<!-- Profile Monogram / Avatar -->
				<a href="<?php echo esc_url( $about_url ); ?>" class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shrink-0 hover:ring-2 hover:ring-outline-variant/60 transition-all duration-200 shadow-xs overflow-hidden" title="About">
					<img src="<?php echo esc_url( stitch_get_hero_avatar() ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'stitch_brand_name', 'Rashed Hossain' ) ); ?>" class="w-full h-full object-cover object-top" width="32" height="32" loading="lazy" decoding="async">
				</a>

				<!-- Mobile Menu Toggle Button -->
				<button id="mobile-menu-toggle" type="button" class="md:hidden p-2 rounded-lg text-on-surface hover:bg-surface-container transition-colors duration-200 shrink-0" aria-label="Toggle Navigation">
					<span class="material-symbols-outlined text-[24px]">menu</span>
				</button>

			</div>

		</div>

		<!-- Mobile Navigation Drawer -->
		<div id="mobile-nav-drawer" class="hidden md:hidden border-t border-outline-variant/40 py-4 px-2 flex flex-col gap-2">
			<a href="<?php echo esc_url( $home_url ); ?>" class="px-3 py-2 rounded-lg font-body-sm <?php echo $is_home ? 'bg-surface-container font-semibold text-primary' : 'text-on-surface-variant hover:bg-surface-container-low'; ?>">Home</a>
			<a href="<?php echo esc_url( $about_url ); ?>" class="px-3 py-2 rounded-lg font-body-sm <?php echo $is_about ? 'bg-surface-container font-semibold text-primary' : 'text-on-surface-variant hover:bg-surface-container-low'; ?>">About</a>
			<a href="<?php echo esc_url( $contrib_url ); ?>" class="px-3 py-2 rounded-lg font-body-sm <?php echo $is_contrib ? 'bg-surface-container font-semibold text-primary' : 'text-on-surface-variant hover:bg-surface-container-low'; ?>">Contributions</a>
			<a href="<?php echo esc_url( $articles_url ); ?>" class="px-3 py-2 rounded-lg font-body-sm <?php echo $is_blog ? 'bg-surface-container font-semibold text-primary' : 'text-on-surface-variant hover:bg-surface-container-low'; ?>">Articles</a>
			<a href="<?php echo esc_url( $contact_url ); ?>" class="px-3 py-2 rounded-lg font-body-sm <?php echo $is_contact ? 'bg-surface-container font-semibold text-primary' : 'text-on-surface-variant hover:bg-surface-container-low'; ?>">Contact & Dispatch</a>
			<button type="button" onclick="window.toggleDarkMode()" class="px-3 py-2 rounded-lg font-body-sm text-left flex items-center justify-between text-on-surface-variant hover:bg-surface-container-low transition-colors border-t border-outline-variant/30 pt-3 mt-1">
				<span class="flex items-center gap-2">
					<span class="theme-toggle-mobile-icon material-symbols-outlined text-[18px]">dark_mode</span>
					<span>Theme Mode</span>
				</span>
				<span id="theme-mode-status-text" class="font-label-code text-[11px] text-primary-container uppercase font-semibold">Device Default</span>
			</button>
		</div>

	</header>

	<!-- =========================================================================
	     GLOBAL COMMAND PALETTE MODAL (⌘K / Ctrl+K)
	     ========================================================================= -->
	<div id="global-command-palette" class="fixed inset-0 z-50 flex items-start justify-center pt-16 sm:pt-24 px-4 bg-on-surface/40 backdrop-blur-sm hidden" role="dialog" aria-modal="true">
		<div id="cmd-palette-box" class="w-full max-w-xl bg-surface-container-lowest rounded-2xl border border-outline-variant/60 shadow-2xl overflow-hidden flex flex-col max-h-[75vh]">
			
			<!-- Input Header -->
			<div class="flex items-center gap-3 px-4 py-3.5 border-b border-surface-container-high/70 bg-surface-container-lowest">
				<span class="material-symbols-outlined text-outline text-[20px]">search</span>
				<input type="text" id="cmd-palette-input" placeholder="Type a destination, article, or command..." autocomplete="off" class="w-full bg-transparent text-on-surface font-body-md text-[14px] placeholder:text-outline focus:outline-none">
				<kbd class="px-1.5 py-0.5 rounded bg-surface-container text-outline text-[10px] font-mono border border-outline-variant/40">ESC</kbd>
			</div>

			<!-- Dynamic Filterable Results List -->
			<div id="cmd-palette-results" class="overflow-y-auto p-2 divide-y divide-surface-container/50">
				<!-- Injected dynamically via theme.js -->
			</div>

			<!-- Footer Keyboard Shortcuts Hint -->
			<div class="px-4 py-2.5 bg-surface-container-low border-t border-surface-container-high/60 flex items-center justify-between font-label-code text-[11px] text-outline">
				<div class="flex items-center gap-3">
					<span><kbd class="px-1 py-0.5 rounded bg-surface-container text-on-surface font-mono">↑</kbd> <kbd class="px-1 py-0.5 rounded bg-surface-container text-on-surface font-mono">↓</kbd> Navigate</span>
					<span><kbd class="px-1.5 py-0.5 rounded bg-surface-container text-on-surface font-mono">↵</kbd> Select</span>
				</div>
				<span class="text-primary-container font-medium">Quick Discovery</span>
			</div>

		</div>
	</div>

	<!-- =========================================================================
	     KEYBOARD SHORTCUTS CHEAT SHEET MODAL (?)
	     ========================================================================= -->
	<div id="keyboard-shortcuts-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-on-surface/40 backdrop-blur-sm hidden" role="dialog" aria-modal="true">
		<div class="w-full max-w-md bg-surface-container-lowest rounded-2xl border border-outline-variant/60 shadow-2xl p-6 flex flex-col gap-5">
			<div class="flex items-center justify-between pb-3 border-b border-surface-container-high/60">
				<div class="flex items-center gap-2">
					<span class="material-symbols-outlined text-primary-container text-[20px]">keyboard</span>
					<h3 class="font-display text-lg text-on-surface font-semibold">Keyboard Navigation</h3>
				</div>
				<button type="button" id="close-shortcuts-modal" class="p-1 rounded-full text-outline hover:text-on-surface transition-colors" aria-label="Close shortcuts modal">
					<span class="material-symbols-outlined text-[18px]">close</span>
				</button>
			</div>

			<div class="space-y-2.5 font-label-code text-[12px]">
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Open Command Palette / Search</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">⌘K / Ctrl+K</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Toggle Theme (Dark / Light)</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">T</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Jump to Home</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">H</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Jump to About</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">A</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Jump to WP Contributions</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">C</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Jump to Articles</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">W</span>
				</div>
				<div class="flex items-center justify-between py-1">
					<span class="text-on-surface-variant">Show Keyboard Shortcuts</span>
					<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-mono border border-outline-variant/40">?</span>
				</div>
			</div>

			<div class="pt-3 border-t border-surface-container-high/60 flex justify-end">
				<button type="button" id="dismiss-shortcuts-modal" class="px-4 py-1.5 rounded-lg bg-surface-container text-on-surface font-body-sm text-[12px] hover:bg-surface-container-high transition-colors">Got it</button>
			</div>
		</div>
	</div>
