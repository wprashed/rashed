<?php
/**
 * Rashed Hossain — Stitch Animated Theme Functions
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STITCH_VERSION', '1.1.0' );

/**
 * Theme Setup
 */
function stitch_theme_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 630, true );
	add_image_size( 'stitch-card', 600, 400, true );

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Register Navigation Menus.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'stitch-animated' ),
			'footer'  => __( 'Footer Navigation', 'stitch-animated' ),
		)
	);
}
add_action( 'after_setup_theme', 'stitch_theme_setup' );

/**
 * Detect whether the current queried object or post content contains mathematical formulas (LaTeX/TeX).
 *
 * Checks for standard LaTeX display delimiters (\[, $$), inline delimiters (\(),
 * mathematical symbols and environments (\frac, \times, \approx, \sqrt, \begin{equation}, etc.).
 *
 * @return bool True if content contains math expressions, false otherwise.
 */
function stitch_has_math_content() {
	if ( ! is_singular() ) {
		return false;
	}

	global $post;
	if ( empty( $post ) || empty( $post->post_content ) ) {
		return false;
	}

	$content  = $post->post_content;
	$has_math = (
		strpos( $content, '\\[' ) !== false ||
		strpos( $content, '\\(' ) !== false ||
		strpos( $content, '$$' ) !== false ||
		strpos( $content, '\\frac' ) !== false ||
		strpos( $content, '\\times' ) !== false ||
		strpos( $content, '\\approx' ) !== false ||
		strpos( $content, '\\sqrt' ) !== false ||
		strpos( $content, '\\sum' ) !== false ||
		strpos( $content, '\\int' ) !== false ||
		strpos( $content, '\\begin{' ) !== false ||
		strpos( $content, 'class="katex' ) !== false ||
		strpos( $content, 'class="math' ) !== false
	);

	return (bool) apply_filters( 'stitch_has_math_content', $has_math, $post );
}

/**
 * Enqueue scripts and styles with Core Web Vitals optimizations.
 */
function stitch_enqueue_scripts() {
	// Google Fonts: Streamlined to exact weights utilized in theme design
	wp_enqueue_style(
		'stitch-fonts',
		'https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&family=Josefin+Sans:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Poppins:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Material Symbols Outlined (scoped to exact axes used to reduce font payload by >90%)
	wp_enqueue_style(
		'stitch-material-symbols',
		'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400,0,0&display=swap',
		array(),
		null
	);

	// Compiled Production Tailwind CSS (Static, minified, zero client-side overhead)
	wp_enqueue_style(
		'stitch-tailwind',
		get_template_directory_uri() . '/assets/css/tailwind.min.css',
		array(),
		STITCH_VERSION
	);

	// Main Theme Stylesheet & Architectural Tokens
	wp_enqueue_style(
		'stitch-style',
		get_stylesheet_uri(),
		array( 'stitch-tailwind' ),
		STITCH_VERSION
	);

	// KaTeX Mathematical Typography Engine (conditionally enqueued on posts with math)
	if ( stitch_has_math_content() ) {
		wp_enqueue_style(
			'katex',
			'https://cdn.jsdelivr.net/npm/katex@0.16.21/dist/katex.min.css',
			array(),
			'0.16.21'
		);

		wp_enqueue_script(
			'katex',
			'https://cdn.jsdelivr.net/npm/katex@0.16.21/dist/katex.min.js',
			array(),
			'0.16.21',
			true
		);
		wp_script_add_data( 'katex', 'strategy', 'defer' );

		wp_enqueue_script(
			'katex-auto-render',
			'https://cdn.jsdelivr.net/npm/katex@0.16.21/dist/contrib/auto-render.min.js',
			array( 'katex' ),
			'0.16.21',
			true
		);
		wp_script_add_data( 'katex-auto-render', 'strategy', 'defer' );

		$inline_katex = 'document.addEventListener("DOMContentLoaded",function(){function r(){if(typeof renderMathInElement==="function"){var e=document.querySelector(".entry-content")||document.querySelector("article")||document.body;renderMathInElement(e,{delimiters:[{left:"$$",right:"$$",display:true},{left:"\\\\[",right:"\\\\]",display:true},{left:"\\\\(",right:"\\\\)",display:false},{left:"\\\\begin{equation}",right:"\\\\end{equation}",display:true},{left:"\\\\begin{align}",right:"\\\\end{align}",display:true},{left:"\\\\begin{alignat}",right:"\\\\end{alignat}",display:true},{left:"\\\\begin{gather}",right:"\\\\end{gather}",display:true},{left:"\\\\begin{CD}",right:"\\\\end{CD}",display:true}],ignoredTags:["script","noscript","style","textarea","pre","code","option"],throwOnError:false,errorColor:"#ef4444",preProcess:function(m){return m.replace(/[\u2013\u2014]/g,"-").replace(/[\u2018\u2019]/g,"\'").replace(/&ndash;/g,"-").replace(/&mdash;/g,"-").replace(/&#8211;/g,"-").replace(/&#8212;/g,"-").replace(/&#8217;/g,"\'").trim();}});}}if(typeof renderMathInElement==="function"){r();}else{window.addEventListener("load",r,{once:true});}});';
		wp_add_inline_script( 'katex-auto-render', $inline_katex );
	}

	// Main Theme Interactive JS (deferred, production minified)
	$theme_js_path = file_exists( get_template_directory() . '/assets/js/theme.min.js' ) ? '/assets/js/theme.min.js' : '/assets/js/theme.js';
	wp_enqueue_script(
		'stitch-theme',
		get_template_directory_uri() . $theme_js_path,
		array(),
		STITCH_VERSION,
		true
	);
	wp_script_add_data( 'stitch-theme', 'strategy', 'defer' );

	// Localize script with AJAX URL, Nonce, and settings
	wp_localize_script(
		'stitch-theme',
		'stitchData',
		array(
			'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
			'contactNonce'  => wp_create_nonce( 'stitch_contact_nonce' ),
			'themeUri'      => get_template_directory_uri(),
			'siteUrl'       => home_url( '/' ),
			'contactEmail'  => get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' ),
			'shaderEnabled' => get_theme_mod( 'stitch_ambient_shader', true ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stitch_enqueue_scripts' );

/**
 * Preconnect to KaTeX CDN when mathematical content is present.
 */
function stitch_math_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && stitch_has_math_content() ) {
		$urls[] = array(
			'href'        => 'https://cdn.jsdelivr.net',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'stitch_math_resource_hints', 10, 2 );

/**
 * Protect and sanitize LaTeX mathematical expressions from WordPress texturizing.
 *
 * Replaces typographic dashes (en-dash, em-dash) and curly quotes generated by
 * wptexturize back into standard mathematical hyphens and primes within formulas.
 *
 * @param string $content Post content.
 * @return string Cleaned content.
 */
function stitch_sanitize_math_expressions( $content ) {
	if ( strpos( $content, '\\[' ) === false && strpos( $content, '\\(' ) === false && strpos( $content, '$$' ) === false ) {
		return $content;
	}

	return preg_replace_callback(
		'/(\\\\\[.*?\\\\\]|\\\\\(.*?\\\\\)|\\$\\$.*?\\$\\$)/s',
		function( $matches ) {
			$math = $matches[1];
			// Restore typographic dashes to minus/hyphen
			$math = str_replace( array( '&#8211;', '&ndash;', '–', '&#8212;', '&mdash;', '—' ), '-', $math );
			// Restore curly quotes to straight primes/quotes
			$math = str_replace( array( '&#8217;', '’', '&#8216;', '‘' ), "'", $math );
			return $math;
		},
		$content
	);
}
add_filter( 'the_content', 'stitch_sanitize_math_expressions', 99 );

/**
 * Dequeue unused core Gutenberg block library styles and global styles on frontend.
 * Removes ~60KB of unnecessary inline CSS that blocks first paint.
 */
function stitch_remove_block_styles() {
	if ( ! is_admin() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'classic-theme-styles' );
		wp_dequeue_style( 'global-styles' );
		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
		remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
		remove_action( 'wp_head', 'wp_print_auto_sizes_contain_css_fix', 1 );
	}
}
add_action( 'wp_enqueue_scripts', 'stitch_remove_block_styles', 100 );
add_filter( 'should_load_separate_core_block_assets', '__return_false' );

/**
 * Clean up redundant tags in <head> to reduce page weight and HTTP requests.
 */
function stitch_cleanup_head() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'stitch_cleanup_head' );

/**
 * Filter script tags to defer theme scripts for optimal mobile Total Blocking Time (TBT).
 */
function stitch_defer_scripts( $tag, $handle ) {
	if ( 'stitch-theme' === $handle ) {
		if ( false === strpos( $tag, 'defer' ) ) {
			return str_replace( ' src', ' defer src', $tag );
		}
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'stitch_defer_scripts', 10, 2 );

/**
 * Filter style tag for secondary icon fonts to prevent render blocking.
 */
function stitch_optimize_style_tags( $html, $handle, $href, $media ) {
	if ( 'stitch-material-symbols' === $handle ) {
		return sprintf(
			'<link rel="preload" href="%s" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"><noscript><link rel="stylesheet" href="%s"></noscript>' . "\n",
			esc_url( $href ),
			esc_url( $href )
		);
	}
	return $html;
}
add_filter( 'style_loader_tag', 'stitch_optimize_style_tags', 10, 4 );

/**
 * Disable default WordPress emoji overhead to optimize mobile performance and reduce main-thread execution.
 */
function stitch_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'stitch_disable_emojis' );

/**
 * Output Anti-FOUC Theme Detection and LCP Hero Preload in <head>
 */
function stitch_output_head_optimizations() {
	?>
	<script>
	(function() {
		try {
			var theme = localStorage.getItem('theme');
			var supportDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
			if (theme === 'dark' || (!theme && supportDark)) {
				document.documentElement.classList.add('dark');
				document.documentElement.setAttribute('data-theme', 'dark');
			} else {
				document.documentElement.classList.remove('dark');
				document.documentElement.setAttribute('data-theme', 'light');
			}
		} catch (e) {}
	})();
	</script>
	<?php if ( is_front_page() || is_page( 'about' ) ) : ?>
	<link rel="preload" as="image" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.webp' ); ?>" type="image/webp" fetchpriority="high">
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', 'stitch_output_head_optimizations', 1 );

/**
 * Enable GZIP Compression for fast transfer
 */
function stitch_enable_output_compression() {
	if ( ! is_admin() && ! wp_doing_ajax() && ! wp_doing_cron() && ! headers_sent() ) {
		if ( extension_loaded( 'zlib' ) && ! ini_get( 'zlib.output_compression' ) && 'ob_gzhandler' !== ini_get( 'output_handler' ) ) {
			ob_start( 'ob_gzhandler' );
		}
	}
}
add_action( 'init', 'stitch_enable_output_compression', 1 );

/**
 * Send performance & browser caching headers for public front-end pages
 */
function stitch_send_performance_headers() {
	if ( ! is_admin() && ! is_user_logged_in() && ! headers_sent() ) {
		header( 'X-Content-Type-Options: nosniff' );
		header( 'Cache-Control: public, max-age=300, stale-while-revalidate=86400' );
	}
}
add_action( 'send_headers', 'stitch_send_performance_headers' );

/**
 * ==========================================================================
 * CUSTOM POST TYPE: DIRECT INQUIRIES (Save Contact Form Data On Website)
 * ==========================================================================
 */
function stitch_register_inquiries_cpt() {
	$labels = array(
		'name'               => _x( 'Inquiries', 'post type general name', 'stitch-animated' ),
		'singular_name'      => _x( 'Inquiry', 'post type singular name', 'stitch-animated' ),
		'menu_name'          => _x( 'Inquiries', 'admin menu', 'stitch-animated' ),
		'name_admin_bar'     => _x( 'Inquiry', 'add new on admin bar', 'stitch-animated' ),
		'all_items'          => __( 'All Inquiries', 'stitch-animated' ),
		'view_item'          => __( 'View Inquiry', 'stitch-animated' ),
		'search_items'       => __( 'Search Inquiries', 'stitch-animated' ),
		'not_found'          => __( 'No inquiries received yet.', 'stitch-animated' ),
		'not_found_in_trash' => __( 'No inquiries found in Trash.', 'stitch-animated' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Contact inquiries and direct transmissions submitted through the website.', 'stitch-animated' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'capabilities'       => array(
			'create_posts' => 'do_not_allow', // Prevents manually creating fake ones
		),
		'map_meta_cap'       => true,
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 26,
		'menu_icon'          => 'dashicons-email-alt',
		'supports'           => array( 'title' ),
	);

	register_post_type( 'portfolio_inquiry', $args );
}
add_action( 'init', 'stitch_register_inquiries_cpt' );

/**
 * Count unread inquiries.
 */
function stitch_get_unread_inquiries_count() {
	$query = new WP_Query(
		array(
			'post_type'      => 'portfolio_inquiry',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'meta_query'     => array(
				array(
					'key'     => '_inquiry_status',
					'value'   => 'unread',
					'compare' => '=',
				),
			),
		)
	);
	return $query->found_posts;
}

/**
 * Add unread notification bubble badge to WordPress Admin menu.
 */
function stitch_add_inquiry_unread_menu_bubble() {
	global $menu;
	$unread_count = stitch_get_unread_inquiries_count();

	if ( ! empty( $menu ) && is_array( $menu ) && $unread_count > 0 ) {
		foreach ( $menu as $key => $item ) {
			if ( isset( $item[2] ) && 'edit.php?post_type=portfolio_inquiry' === $item[2] ) {
				$menu[ $key ][0] .= ' <span class="awaiting-mod count-' . absint( $unread_count ) . '"><span class="pending-count" aria-hidden="true">' . number_format_i18n( $unread_count ) . '</span></span>';
				break;
			}
		}
	}
}
add_action( 'admin_menu', 'stitch_add_inquiry_unread_menu_bubble' );

/**
 * Custom Admin CSS for Inquiries and Menu Styling
 */
function stitch_admin_inquiries_custom_css() {
	?>
	<style id="stitch-inquiries-admin-styles">
		/* Seamless Native Alignment & Badge Styling for Inquiries Menu */
		#adminmenu li.menu-top a[href*="post_type=portfolio_inquiry"] .awaiting-mod,
		#adminmenu li.menu-top a[href*="post_type=portfolio_inquiry"] .update-plugins {
			display: inline-block !important;
			vertical-align: middle !important;
			margin: -1px 0 0 6px !important;
			padding: 0 6px !important;
			min-width: 18px !important;
			height: 18px !important;
			line-height: 18px !important;
			border-radius: 9px !important;
			background-color: #2271b1 !important;
			color: #ffffff !important;
			font-size: 10.5px !important;
			font-weight: 700 !important;
			text-align: center !important;
			box-shadow: none !important;
		}
		#adminmenu li.menu-top.current a[href*="post_type=portfolio_inquiry"] .awaiting-mod,
		#adminmenu li.menu-top.wp-has-current-submenu a[href*="post_type=portfolio_inquiry"] .awaiting-mod,
		#adminmenu li.menu-top.current a[href*="post_type=portfolio_inquiry"] .update-plugins,
		#adminmenu li.menu-top.wp-has-current-submenu a[href*="post_type=portfolio_inquiry"] .update-plugins {
			background-color: #ffffff !important;
			color: #2271b1 !important;
		}
		
		/* Inquiries Post Type List Screen Polish */
		.post-type-portfolio_inquiry .page-title-action {
			display: none !important;
		}
		.stitch-admin-inquiry-header {
			background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
			border-radius: 12px;
			padding: 22px 26px;
			color: #ffffff;
			margin: 18px 0 22px 0;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: space-between;
			gap: 16px;
			box-shadow: 0 8px 24px -4px rgba(15, 23, 42, 0.18);
		}
		.stitch-admin-inquiry-title h2 {
			color: #ffffff !important;
			font-size: 20px !important;
			font-weight: 700 !important;
			margin: 0 0 5px 0 !important;
			display: flex;
			align-items: center;
			gap: 10px;
		}
		.stitch-admin-inquiry-title p {
			color: #94a3b8;
			margin: 0;
			font-size: 13px;
		}
		.stitch-admin-inquiry-stats {
			display: flex;
			align-items: center;
			gap: 12px;
		}
		.stitch-admin-stat-chip {
			background: rgba(255, 255, 255, 0.08);
			border: 1px solid rgba(255, 255, 255, 0.12);
			border-radius: 8px;
			padding: 6px 14px;
			display: flex;
			flex-direction: column;
			min-width: 80px;
		}
		.stitch-admin-stat-chip .val {
			font-size: 19px;
			font-weight: 800;
			color: #ffffff;
			line-height: 1.2;
		}
		.stitch-admin-stat-chip .lbl {
			font-size: 10px;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			color: #94a3b8;
		}
		.stitch-admin-stat-chip.unread .val {
			color: #4ade80;
		}
		.stitch-admin-export-btn {
			background: #1d4ed8;
			color: #ffffff !important;
			border: none;
			padding: 9px 16px;
			border-radius: 8px;
			font-size: 13px;
			font-weight: 600;
			display: inline-flex;
			align-items: center;
			gap: 6px;
			text-decoration: none !important;
			transition: background 0.15s ease, transform 0.15s ease;
			box-shadow: 0 3px 10px rgba(29, 78, 216, 0.35);
		}
		.stitch-admin-export-btn:hover {
			background: #2563eb;
			color: #ffffff !important;
			transform: translateY(-1px);
		}

		/* Table Polish */
		.post-type-portfolio_inquiry table.wp-list-table {
			border: 1px solid #e2e8f0;
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0 2px 8px rgba(0,0,0,0.03);
			border-collapse: separate;
			border-spacing: 0;
		}
		.post-type-portfolio_inquiry table.wp-list-table th {
			background: #f8fafc;
			font-weight: 700;
			text-transform: uppercase;
			font-size: 11px;
			letter-spacing: 0.05em;
			color: #475569;
			padding: 12px 14px;
			border-bottom: 1px solid #e2e8f0;
		}
		.post-type-portfolio_inquiry table.wp-list-table td {
			padding: 13px 14px;
			vertical-align: middle;
			border-bottom: 1px solid #f1f5f9;
		}
		.post-type-portfolio_inquiry table.wp-list-table tr:hover td {
			background-color: #f8fafc;
		}
		.stitch-avatar-badge {
			width: 32px;
			height: 32px;
			border-radius: 50%;
			background: linear-gradient(135deg, #1d4ed8, #60a5fa);
			color: #ffffff;
			font-size: 12px;
			font-weight: 700;
			display: flex;
			align-items: center;
			justify-content: center;
			text-transform: uppercase;
			box-shadow: 0 2px 4px rgba(29, 78, 216, 0.2);
			flex-shrink: 0;
		}
	</style>
	<?php
}
add_action( 'admin_head', 'stitch_admin_inquiries_custom_css' );

/**
 * Render Header Stats Banner on Inquiries Admin Screen
 */
function stitch_render_inquiries_dashboard_header() {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-portfolio_inquiry' !== $screen->id ) {
		return;
	}

	$counts = wp_count_posts( 'portfolio_inquiry' );
	$total  = isset( $counts->publish ) ? $counts->publish : 0;
	$unread = stitch_get_unread_inquiries_count();
	$read   = max( 0, $total - $unread );
	$export_url = admin_url( 'edit.php?post_type=portfolio_inquiry&page=stitch-inquiries-export' );
	?>
	<div class="stitch-admin-inquiry-header">
		<div class="stitch-admin-inquiry-title">
			<h2>
				<span class="dashicons dashicons-email-alt" style="font-size:22px;width:22px;height:22px;"></span>
				Direct Inquiries & Transmissions
			</h2>
			<p>Live messages captured directly from the portfolio contact form and archived securely in your website database.</p>
		</div>
		<div class="stitch-admin-inquiry-stats">
			<div class="stitch-admin-stat-chip">
				<span class="val"><?php echo esc_html( $total ); ?></span>
				<span class="lbl">Total</span>
			</div>
			<div class="stitch-admin-stat-chip unread">
				<span class="val"><?php echo esc_html( $unread ); ?></span>
				<span class="lbl">Unread</span>
			</div>
			<div class="stitch-admin-stat-chip">
				<span class="val"><?php echo esc_html( $read ); ?></span>
				<span class="lbl">Archived</span>
			</div>
			<a href="<?php echo esc_url( $export_url ); ?>" class="stitch-admin-export-btn">
				<span class="dashicons dashicons-download" style="font-size:15px;width:15px;height:15px;"></span>
				Export CSV
			</a>
		</div>
	</div>
	<?php
}
add_action( 'all_admin_notices', 'stitch_render_inquiries_dashboard_header' );

/**
 * Custom Admin Columns for Direct Inquiries.
 */
function stitch_inquiry_columns( $columns ) {
	$new_columns = array(
		'cb'            => $columns['cb'],
		'status'        => __( 'Status', 'stitch-animated' ),
		'sender'        => __( 'Sender Coordinates', 'stitch-animated' ),
		'topic'         => __( 'Focus Vector', 'stitch-animated' ),
		'message_snip'  => __( 'Transmission Payload', 'stitch-animated' ),
		'receipt'       => __( 'Receipt ID', 'stitch-animated' ),
		'date'          => __( 'Timestamp', 'stitch-animated' ),
		'actions'       => __( 'Actions', 'stitch-animated' ),
	);
	return $new_columns;
}
add_filter( 'manage_portfolio_inquiry_posts_columns', 'stitch_inquiry_columns' );

/**
 * Populate Custom Columns for Direct Inquiries.
 */
function stitch_inquiry_custom_column( $column, $post_id ) {
	$status  = get_post_meta( $post_id, '_inquiry_status', true ) ?: 'unread';
	$name    = get_post_meta( $post_id, '_sender_name', true );
	$email   = get_post_meta( $post_id, '_sender_email', true );
	$topic   = get_post_meta( $post_id, '_focus_vector', true );
	$message = get_post_meta( $post_id, '_message', true );
	$receipt = get_post_meta( $post_id, '_receipt_id', true ) ?: ( 'TX-' . $post_id );
	$ip      = get_post_meta( $post_id, '_ip_address', true );

	switch ( $column ) {
		case 'status':
			if ( 'unread' === $status ) {
				echo '<span style="display:inline-flex;align-items:center;gap:5px;padding:3px 9px;border-radius:9999px;background:#dcfce7;color:#15803d;font-weight:700;font-size:11px;letter-spacing:0.04em;"><span style="width:6px;height:6px;border-radius:50%;background:#16a34a;box-shadow:0 0 6px #16a34a;"></span> NEW</span>';
			} else {
				echo '<span style="display:inline-flex;align-items:center;padding:3px 9px;border-radius:9999px;background:#f1f5f9;color:#64748b;font-weight:600;font-size:11px;">READ</span>';
			}
			break;

		case 'sender':
			$initials = '';
			$parts = explode( ' ', trim( $name ?: 'Anonymous' ) );
			foreach ( $parts as $p ) {
				if ( ! empty( $p ) ) {
					$initials .= strtoupper( $p[0] );
					if ( strlen( $initials ) >= 2 ) {
						break;
					}
				}
			}
			if ( empty( $initials ) ) {
				$initials = 'IN';
			}

			$view_url = admin_url( 'admin.php?page=stitch-inquiry-detail&id=' . $post_id );
			echo '<div style="display:flex;align-items:center;gap:10px;">';
			echo '<div class="stitch-avatar-badge">' . esc_html( $initials ) . '</div>';
			echo '<div>';
			echo '<a href="' . esc_url( $view_url ) . '" style="font-weight:700;color:#0f172a;font-size:13px;text-decoration:none;" class="row-title">' . esc_html( $name ) . '</a><br>';
			echo '<a href="' . esc_url( 'mailto:' . $email . '?subject=Re: [Direct Inquiry] ' . rawurlencode( $topic ) ) . '" style="color:#2563eb;font-size:12px;text-decoration:none;">' . esc_html( $email ) . '</a>';
			echo '</div>';
			echo '</div>';
			break;

		case 'topic':
			echo '<span style="display:inline-block;padding:3px 9px;background:#f1f5f9;color:#0f172a;border-radius:6px;font-size:11px;font-weight:600;font-family:monospace;border:1px solid #e2e8f0;">' . esc_html( $topic ) . '</span>';
			break;

		case 'message_snip':
			echo '<div style="max-width:320px;color:#475569;font-size:13px;line-height:1.45;font-style:italic;">&ldquo;' . esc_html( wp_trim_words( $message, 12, '...' ) ) . '&rdquo;</div>';
			break;

		case 'receipt':
			echo '<code style="background:#f8fafc;padding:3px 8px;border-radius:6px;font-size:11px;font-weight:600;border:1px solid #e2e8f0;color:#1e293b;">' . esc_html( $receipt ) . '</code>';
			break;

		case 'actions':
			$toggle_url = wp_nonce_url( admin_url( 'admin-post.php?action=stitch_toggle_inquiry_status&id=' . $post_id ), 'stitch_toggle_inquiry_' . $post_id );
			$view_url   = admin_url( 'admin.php?page=stitch-inquiry-detail&id=' . $post_id );

			echo '<div style="display:flex;gap:6px;align-items:center;">';
			echo '<a href="' . esc_url( $view_url ) . '" class="button button-small button-primary" style="font-size:11px;font-weight:600;" title="View Full Transmission">View</a>';
			if ( 'unread' === $status ) {
				echo '<a href="' . esc_url( $toggle_url ) . '" class="button button-small" style="font-size:11px;" title="Mark as Read">✓ Read</a>';
			} else {
				echo '<a href="' . esc_url( $toggle_url ) . '" class="button button-small" style="font-size:11px;" title="Mark as Unread">Unread</a>';
			}
			echo '</div>';
			break;
	}
}
add_action( 'manage_portfolio_inquiry_posts_custom_column', 'stitch_inquiry_custom_column', 10, 2 );

/**
 * Handle Toggle Inquiry Status (Read/Unread)
 */
function stitch_handle_toggle_inquiry_status() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Unauthorized.' );
	}
	$post_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;
	check_admin_referer( 'stitch_toggle_inquiry_' . $post_id );

	$current = get_post_meta( $post_id, '_inquiry_status', true ) ?: 'unread';
	$new     = ( 'unread' === $current ) ? 'read' : 'unread';
	update_post_meta( $post_id, '_inquiry_status', $new );

	wp_safe_redirect( wp_get_referer() ?: admin_url( 'edit.php?post_type=portfolio_inquiry' ) );
	exit;
}
add_action( 'admin_post_stitch_toggle_inquiry_status', 'stitch_handle_toggle_inquiry_status' );

/**
 * Register Inquiries Admin Submenu & Hidden Detail View
 */
function stitch_register_inquiries_admin_pages() {
	// Register Detail Page with parent null (hidden from sidebar menu)
	add_submenu_page(
		null,
		__( 'Inquiry Details', 'stitch-animated' ),
		__( 'Inquiry Details', 'stitch-animated' ),
		'edit_posts',
		'stitch-inquiry-detail',
		'stitch_render_inquiry_detail_page'
	);

	// Export to CSV page in submenu
	add_submenu_page(
		'edit.php?post_type=portfolio_inquiry',
		__( 'Export to CSV', 'stitch-animated' ),
		__( 'Export to CSV', 'stitch-animated' ),
		'edit_posts',
		'stitch-inquiries-export',
		'stitch_handle_inquiries_export'
	);
}
add_action( 'admin_menu', 'stitch_register_inquiries_admin_pages' );

/**
 * Render single inquiry view in WP Admin
 */
function stitch_render_inquiry_detail_page() {
	$post_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;
	$post    = get_post( $post_id );

	if ( ! $post || 'portfolio_inquiry' !== $post->post_type ) {
		echo '<div class="wrap" style="padding-top:20px;"><h1>Inquiry not found</h1><p><a href="' . esc_url( admin_url( 'edit.php?post_type=portfolio_inquiry' ) ) . '">&larr; Back to Inquiries</a></p></div>';
		return;
	}

	// Auto mark as read on view
	update_post_meta( $post_id, '_inquiry_status', 'read' );

	$name       = get_post_meta( $post_id, '_sender_name', true );
	$email      = get_post_meta( $post_id, '_sender_email', true );
	$topic      = get_post_meta( $post_id, '_focus_vector', true );
	$message    = get_post_meta( $post_id, '_message', true );
	$receipt    = get_post_meta( $post_id, '_receipt_id', true ) ?: ( 'TX-' . $post_id );
	$ip         = get_post_meta( $post_id, '_ip_address', true );
	$user_agent = get_post_meta( $post_id, '_user_agent', true );
	$date       = get_the_date( 'F j, Y \a\t g:i a', $post_id );

	$toggle_url = wp_nonce_url( admin_url( 'admin-post.php?action=stitch_toggle_inquiry_status&id=' . $post_id ), 'stitch_toggle_inquiry_' . $post_id );
	$trash_url  = get_delete_post_link( $post_id );

	// Initials
	$initials = '';
	$parts = explode( ' ', trim( $name ?: 'Anonymous' ) );
	foreach ( $parts as $p ) {
		if ( ! empty( $p ) ) {
			$initials .= strtoupper( $p[0] );
			if ( strlen( $initials ) >= 2 ) {
				break;
			}
		}
	}
	if ( empty( $initials ) ) {
		$initials = 'IN';
	}
	?>
	<div class="wrap" style="max-width:960px;margin-top:24px;">
		
		<!-- Breadcrumbs & Actions Bar -->
		<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
			<div style="display:flex;align-items:center;gap:12px;">
				<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_inquiry' ) ); ?>" class="button button-secondary" style="display:inline-flex;align-items:center;gap:4px;">
					&larr; Back to All Inquiries
				</a>
				<span style="font-family:monospace;font-size:12px;color:#64748b;">
					<?php echo esc_html( $receipt ); ?>
				</span>
			</div>
			<div style="display:flex;gap:8px;">
				<a href="<?php echo esc_url( $toggle_url ); ?>" class="button button-secondary">
					Mark as Unread
				</a>
				<?php if ( $trash_url ) : ?>
					<a href="<?php echo esc_url( $trash_url ); ?>" class="button button-link-delete" onclick="return confirm('Are you sure you want to delete this transmission?');" style="color:#dc2626;align-self:center;margin-left:8px;">
						Move to Trash
					</a>
				<?php endif; ?>
			</div>
		</div>

		<!-- Main Two-Column Layout -->
		<div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">
			
			<!-- Left Column: Transmission Payload -->
			<div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:14px;padding:28px;box-shadow:0 4px 14px rgba(0,0,0,0.04);">
				
				<div style="border-bottom:1px solid #f1f5f9;padding-bottom:18px;margin-bottom:22px;">
					<div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
						<span style="display:inline-block;padding:2px 8px;background:#eff6ff;color:#1d4ed8;font-size:11px;font-weight:700;border-radius:4px;font-family:monospace;">
							FOCUS VECTOR
						</span>
						<span style="font-size:12px;color:#64748b;">Received on <?php echo esc_html( $date ); ?></span>
					</div>
					<h1 style="margin:0;font-size:24px;font-weight:800;color:#0f172a;line-height:1.3;">
						<?php echo esc_html( $topic ); ?>
					</h1>
				</div>

				<div style="margin-bottom:24px;">
					<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
						<span style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:#475569;">
							Transmission Message
						</span>
						<button type="button" class="button button-small" onclick="navigator.clipboard.writeText(document.getElementById('inquiry-payload').innerText);alert('Message copied to clipboard!');">
							Copy Text
						</button>
					</div>
					<div id="inquiry-payload" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:22px;font-size:15px;line-height:1.75;color:#1e293b;white-space:pre-wrap;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;">
						<?php echo esc_html( $message ); ?>
					</div>
				</div>

				<div style="display:flex;justify-content:flex-end;">
					<a href="<?php echo esc_url( 'mailto:' . $email . '?subject=Re: [Direct Inquiry] ' . rawurlencode( $topic ) ); ?>" class="button button-primary button-hero" style="font-size:14px;display:inline-flex;align-items:center;gap:8px;">
						<span class="dashicons dashicons-email-alt" style="font-size:16px;width:16px;height:16px;"></span>
						Reply to <?php echo esc_html( $name ); ?> via Email
					</a>
				</div>
			</div>

			<!-- Right Column: Sender Profile & Telemetry Dossier -->
			<div style="display:flex;flex-direction:column;gap:20px;">
				
				<!-- Sender Profile Card -->
				<div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:14px;padding:22px;box-shadow:0 4px 14px rgba(0,0,0,0.04);">
					<span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:#64748b;display:block;margin-bottom:14px;">
						Sender Profile
					</span>
					
					<div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
						<div style="width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg, #1d4ed8, #60a5fa);color:#fff;font-size:16px;font-weight:800;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 10px rgba(29, 78, 216, 0.25);">
							<?php echo esc_html( $initials ); ?>
						</div>
						<div>
							<div style="font-size:16px;font-weight:800;color:#0f172a;line-height:1.2;">
								<?php echo esc_html( $name ); ?>
							</div>
							<div style="font-size:12px;color:#64748b;">
								Client Dispatcher
							</div>
						</div>
					</div>

					<div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:12px;margin-bottom:16px;">
						<div style="font-size:11px;color:#64748b;text-transform:uppercase;margin-bottom:3px;font-weight:600;">Email Address</div>
						<a href="<?php echo esc_url( 'mailto:' . $email . '?subject=Re: [Direct Inquiry] ' . rawurlencode( $topic ) ); ?>" style="font-size:13px;font-weight:700;color:#1d4ed8;word-break:break-all;text-decoration:none;">
							<?php echo esc_html( $email ); ?> &nearr;
						</a>
					</div>

					<a href="<?php echo esc_url( 'mailto:' . $email . '?subject=Re: [Direct Inquiry] ' . rawurlencode( $topic ) ); ?>" class="button button-primary" style="width:100%;text-align:center;justify-content:center;padding:6px 0;font-weight:600;">
						Send Direct Email
					</a>
				</div>

				<!-- Telemetry Card -->
				<div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:14px;padding:22px;box-shadow:0 4px 14px rgba(0,0,0,0.04);">
					<span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:#64748b;display:block;margin-bottom:14px;">
						System Telemetry
					</span>
					
					<div style="font-family:monospace;font-size:11px;display:flex;flex-direction:column;gap:10px;">
						<div>
							<span style="color:#64748b;display:block;">RECEIPT ID:</span>
							<strong style="color:#0f172a;font-size:12px;"><?php echo esc_html( $receipt ); ?></strong>
						</div>
						<div>
							<span style="color:#64748b;display:block;">IP ADDRESS:</span>
							<strong style="color:#0f172a;"><?php echo esc_html( $ip ?: '127.0.0.1 (Local)' ); ?></strong>
						</div>
						<div>
							<span style="color:#64748b;display:block;">CLIENT USER AGENT:</span>
							<span style="color:#334155;word-break:break-word;font-size:10px;line-height:1.4;display:block;">
								<?php echo esc_html( $user_agent ?: 'Mozilla/5.0 Web Client' ); ?>
							</span>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php
}

/**
 * Sanitize CSV cell against CSV Formula Injection (CWE-1236)
 */
function stitch_clean_csv_formula( $val ) {
	$str = (string) $val;
	if ( '' !== $str && in_array( $str[0], array( '=', '+', '-', '@', "\t", "\r" ), true ) ) {
		return "'" . $str;
	}
	return $str;
}

/**
 * Handle CSV Export of Direct Inquiries
 */
function stitch_handle_inquiries_export() {
	if ( ! current_user_can( 'export' ) ) {
		wp_die( esc_html__( 'Unauthorized access.', 'stitch-animated' ), 403 );
	}

	$inquiries = get_posts(
		array(
			'post_type'      => 'portfolio_inquiry',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);

	if ( isset( $_GET['download_csv'] ) && '1' === $_GET['download_csv'] ) {
		check_admin_referer( 'stitch_export_inquiries_action', '_stitch_export_nonce' );

		header( 'Content-Type: text/csv; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=direct_inquiries_' . gmdate( 'Y-m-d_H-i' ) . '.csv' );
		header( 'X-Content-Type-Options: nosniff' );

		$output = fopen( 'php://output', 'w' );
		fputcsv( $output, array( 'Receipt ID', 'Date', 'Sender Name', 'Sender Email', 'Focus Vector', 'Status', 'IP Address', 'Message' ) );

		foreach ( $inquiries as $inquiry ) {
			fputcsv(
				$output,
				array(
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_receipt_id', true ) ?: ( 'TX-' . $inquiry->ID ) ),
					stitch_clean_csv_formula( $inquiry->post_date ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_sender_name', true ) ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_sender_email', true ) ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_focus_vector', true ) ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_inquiry_status', true ) ?: 'read' ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_ip_address', true ) ),
					stitch_clean_csv_formula( get_post_meta( $inquiry->ID, '_message', true ) ),
				)
			);
		}
		fclose( $output );
		exit;
	}

	$download_url = wp_nonce_url( admin_url( 'edit.php?post_type=portfolio_inquiry&page=stitch-inquiries-export&download_csv=1' ), 'stitch_export_inquiries_action', '_stitch_export_nonce' );
	?>
	<div class="wrap" style="max-width:760px;margin-top:24px;">
		<p><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_inquiry' ) ); ?>" class="button">&larr; Back to Inquiries List</a></p>
		
		<div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:14px;padding:32px;box-shadow:0 4px 14px rgba(0,0,0,0.04);margin-top:16px;">
			<div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
				<div style="width:42px;height:42px;border-radius:10px;background:#eff6ff;color:#1d4ed8;display:flex;align-items:center;justify-content:center;">
					<span class="dashicons dashicons-media-spreadsheet" style="font-size:22px;width:22px;height:22px;"></span>
				</div>
				<div>
					<h1 style="margin:0;font-size:22px;font-weight:800;color:#0f172a;">Export Direct Inquiries</h1>
					<p style="margin:2px 0 0 0;color:#64748b;font-size:13px;">Download all incoming portfolio submissions as a structured CSV dataset.</p>
				</div>
			</div>

			<hr style="border:none;border-top:1px solid #f1f5f9;margin:20px 0;">

			<div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:18px 22px;margin-bottom:24px;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
					<span style="font-size:13px;font-weight:700;color:#0f172a;">Total Exportable Records:</span>
					<span style="font-size:18px;font-weight:800;color:#1d4ed8;font-family:monospace;"><?php echo count( $inquiries ); ?> Inquiries</span>
				</div>
				<div style="font-size:12px;color:#64748b;line-height:1.6;">
					<strong>Included fields:</strong> Receipt ID, Submission Timestamp, Sender Name, Sender Email, Focus Vector, Status (Read/Unread), IP Address, Full Transmission Message.
				</div>
			</div>

			<a href="<?php echo esc_url( $download_url ); ?>" class="button button-primary button-hero" style="display:inline-flex;align-items:center;gap:8px;font-size:14px;">
				<span class="dashicons dashicons-download" style="font-size:18px;width:18px;height:18px;"></span>
				Download Complete CSV Archive (<?php echo count( $inquiries ); ?>)
			</a>
		</div>
	</div>
	<?php
}

/**
 * ==========================================================================
 * AJAX HANDLER: CONTACT FORM SUBMISSION
 * ==========================================================================
 */
function stitch_handle_contact_submission() {
	check_ajax_referer( 'stitch_contact_nonce', 'nonce' );

	$ip_address = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '127.0.0.1';

	// IP Rate Limiting (Defense against automated flooding: max 5 messages per 10 minutes)
	$rate_limit_key = 'stitch_cf_rate_' . md5( $ip_address );
	$attempt_count  = (int) get_transient( $rate_limit_key );
	if ( $attempt_count >= 5 ) {
		wp_send_json_error( array( 'message' => 'Rate limit exceeded. Please wait a few moments before sending another message.' ) );
	}
	set_transient( $rate_limit_key, $attempt_count + 1, 10 * MINUTE_IN_SECONDS );

	// Honeypot check for spam bots
	if ( ! empty( $_POST['website_url_hp'] ) ) {
		// Silent success to confuse spam bots
		wp_send_json_success( array( 'message' => 'Transmission received successfully.' ) );
	}

	$name    = isset( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
	$email   = isset( $_POST['contact_email'] ) ? sanitize_email( wp_unslash( $_POST['contact_email'] ) ) : '';
	$topic   = isset( $_POST['contact_topic'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_topic'] ) ) : 'General Inquiry';
	$message = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';

	// Boundary length limits
	$name    = mb_substr( $name, 0, 100 );
	$topic   = mb_substr( $topic, 0, 100 );
	$message = mb_substr( $message, 0, 5000 );

	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => 'Please fill in all coordinates and message payload with a valid email address.' ) );
	}

	// Prevent Email Header CRLF Injection
	$safe_name  = str_replace( array( "\r", "\n", "%0a", "%0d" ), '', $name );
	$safe_email = str_replace( array( "\r", "\n", "%0a", "%0d" ), '', $email );

	$receipt_id = 'TX-' . strtoupper( wp_generate_password( 6, false, false ) );
	$user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';

	// 1. SAVE IN DATABASE AS A CUSTOM POST TYPE (Saved permanently on the website)
	$post_id = wp_insert_post(
		array(
			'post_title'   => sprintf( 'Inquiry // %s [%s]', $safe_name, $receipt_id ),
			'post_content' => $message,
			'post_status'  => 'publish',
			'post_type'    => 'portfolio_inquiry',
		)
	);

	if ( ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_sender_name', $safe_name );
		update_post_meta( $post_id, '_sender_email', $safe_email );
		update_post_meta( $post_id, '_focus_vector', $topic );
		update_post_meta( $post_id, '_message', $message );
		update_post_meta( $post_id, '_receipt_id', $receipt_id );
		update_post_meta( $post_id, '_ip_address', $ip_address );
		update_post_meta( $post_id, '_user_agent', $user_agent );
		update_post_meta( $post_id, '_inquiry_status', 'unread' );
	}

	// 2. DISPATCH EMAIL NOTIFICATION TO SITE ADMIN
	$admin_email = get_option( 'admin_email' );
	$subject     = sprintf( '[%s // %s] Direct Dispatch from %s', $receipt_id, $topic, $safe_name );
	$body        = "Architectural Transmission Received on " . get_bloginfo( 'name' ) . "\n\n"
		. "RECEIPT ID: {$receipt_id}\n"
		. "TIMESTAMP:  " . current_time( 'mysql' ) . " (Dhaka UTC+6)\n\n"
		. "SENDER COORDINATES:\n"
		. "- Name:  {$safe_name}\n"
		. "- Email: {$safe_email}\n"
		. "- Focus Vector: {$topic}\n"
		. "- IP: {$ip_address}\n\n"
		. "TRANSMISSION PAYLOAD:\n"
		. "--------------------------------------------------------\n"
		. "{$message}\n"
		. "--------------------------------------------------------\n\n"
		. "View and manage all transmissions in your WordPress dashboard:\n"
		. admin_url( 'edit.php?post_type=portfolio_inquiry' ) . "\n";

	$headers = array(
		'From: ' . get_bloginfo( 'name' ) . ' <' . $admin_email . '>',
		'Reply-To: ' . $safe_name . ' <' . $safe_email . '>',
	);

	@wp_mail( $admin_email, $subject, $body, $headers );

	wp_send_json_success(
		array(
			'message'   => 'Transmission received & verified successfully.',
			'receiptId' => $receipt_id,
			'timestamp' => current_time( 'H:i:s' ) . ' UTC+6',
		)
	);
}
add_action( 'wp_ajax_stitch_submit_contact', 'stitch_handle_contact_submission' );
add_action( 'wp_ajax_nopriv_stitch_submit_contact', 'stitch_handle_contact_submission' );

/**
 * Static runtime caching helper for pages to prevent redundant DB queries.
 */
function stitch_get_page_cached( $slug ) {
	static $cache = array();
	if ( isset( $cache[ $slug ] ) ) {
		return $cache[ $slug ];
	}
	$page = get_page_by_path( $slug );
	$cache[ $slug ] = $page;
	return $page;
}

/**
 * Cached page URL resolver.
 */
function stitch_get_page_url( $slug, $fallback = '' ) {
	static $urls = array();
	if ( isset( $urls[ $slug ] ) ) {
		return $urls[ $slug ];
	}
	$page = stitch_get_page_cached( $slug );
	$url  = $page ? get_permalink( $page ) : ( $fallback ?: home_url( '/' . trim( $slug, '/' ) . '/' ) );
	$urls[ $slug ] = $url;
	return $url;
}

/**
 * Estimated reading time helper with static per-request memoization.
 */
function stitch_get_reading_time( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	static $reading_cache = array();
	if ( isset( $reading_cache[ $post_id ] ) ) {
		return $reading_cache[ $post_id ];
	}
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	$minutes = max( 1, (int) ceil( $words / 200 ) );
	$reading_cache[ $post_id ] = $minutes;
	return $minutes;
}

function stitch_inquiry_row_actions( $actions, $post ) {
	if ( 'portfolio_inquiry' === $post->post_type ) {
		unset( $actions['inline hide-if-no-js'] );
		unset( $actions['edit'] );
		$view_url = admin_url( 'admin.php?page=stitch-inquiry-detail&id=' . $post->ID );
		$actions['view'] = '<a href="' . esc_url( $view_url ) . '">View Full Transmission</a>';
	}
	return $actions;
}
add_filter( 'post_row_actions', 'stitch_inquiry_row_actions', 10, 2 );

function stitch_inquiry_edit_link( $link, $post_id ) {
	$post = get_post( $post_id );
	if ( $post && 'portfolio_inquiry' === $post->post_type ) {
		return admin_url( 'admin.php?page=stitch-inquiry-detail&id=' . $post_id );
	}
	return $link;
}
add_filter( 'get_edit_post_link', 'stitch_inquiry_edit_link', 10, 2 );

/**
 * Helper to retrieve hero avatar image URL with WebP default for optimal speed
 */
function stitch_get_hero_avatar() {
	$avatar = get_theme_mod( 'stitch_hero_avatar' );
	if ( ! empty( $avatar ) ) {
		return $avatar;
	}
	return get_template_directory_uri() . '/assets/images/rashed-hossain.webp';
}

/**
 * Register Comprehensive Theme Customizer Settings.
 * Gives the user full dynamic control over every headline, bio, metrics,
 * images, buttons, social links, dossier, and telemetry across the site.
 */
function stitch_customize_register( $wp_customize ) {

	// Master Panel: Rashed Portfolio Settings
	$wp_customize->add_panel(
		'stitch_theme_panel',
		array(
			'title'       => __( 'Rashed Portfolio Settings', 'stitch-animated' ),
			'priority'    => 20,
			'description' => __( 'Customize all text, headlines, images, metrics, dossier content, and social links across the entire site.', 'stitch-animated' ),
		)
	);

	// =========================================================================
	// 1. SECTION: HERO & FRONT IDENTITY
	// =========================================================================
	$wp_customize->add_section(
		'stitch_hero_section',
		array(
			'title'       => __( 'Hero & Front Identity', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 10,
			'description' => __( 'Configure the homepage hero section, headline, portrait photo, and call-to-action buttons.', 'stitch-animated' ),
		)
	);

	// Portrait Photo
	$wp_customize->add_setting(
		'stitch_hero_avatar',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'stitch_hero_avatar',
			array(
				'label'       => __( 'Portrait Photo / Avatar', 'stitch-animated' ),
				'description' => __( 'Upload your custom portrait photo. Falls back to default assets/images/rashed-hossain.jpg if empty.', 'stitch-animated' ),
				'section'     => 'stitch_hero_section',
			)
		)
	);

	// Hero Eyebrow
	$wp_customize->add_setting(
		'stitch_hero_eyebrow',
		array(
			'default'           => 'Core Contributor · AI & Automation · Product Management',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_eyebrow',
		array(
			'label'   => __( 'Hero Eyebrow Tag', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Headline Title
	$wp_customize->add_setting(
		'stitch_hero_title',
		array(
			'default'           => 'Hi, I’m Rashed Hossain — <span class="text-primary-container italic font-serif">Software Engineer</span>, Tech Support Lead &amp; AI Specialist.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_title',
		array(
			'label'       => __( 'Hero Headline Title', 'stitch-animated' ),
			'description' => __( 'Main hero title. HTML tags like <span> or <em> are permitted.', 'stitch-animated' ),
			'section'     => 'stitch_hero_section',
			'type'        => 'textarea',
		)
	);

	// Hero Narrative Bio
	$wp_customize->add_setting(
		'stitch_hero_bio',
		array(
			'default'           => 'Over a decade building and scaling for the open web. Tech Support Lead at <strong>Ollyo &amp; Themeum</strong> (Tutor LMS), specializing in <strong>AI systems, workflow automation, product management, and data analysis</strong>. Contributing upstream to WordPress Core and architecting solutions that empower millions worldwide.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_bio',
		array(
			'label'       => __( 'Hero Narrative Bio', 'stitch-animated' ),
			'description' => __( 'Introductory paragraph below the headline.', 'stitch-animated' ),
			'section'     => 'stitch_hero_section',
			'type'        => 'textarea',
		)
	);

	// Hero Photo Plate Tag
	$wp_customize->add_setting(
		'stitch_hero_photo_badge',
		array(
			'default'           => 'RASHED HOSSAIN // ENGINEERING & AI',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_photo_badge',
		array(
			'label'   => __( 'Portrait Plate Bottom Badge', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Creator Tag
	$wp_customize->add_setting(
		'stitch_hero_creator_tag',
		array(
			'default'           => 'VERIFIED CREATOR #882',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_creator_tag',
		array(
			'label'   => __( 'Creator Badge Tag', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Commits Status
	$wp_customize->add_setting(
		'stitch_hero_commits_status',
		array(
			'default'           => 'CORE COMMITS ACTIVE',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_commits_status',
		array(
			'label'   => __( 'Commits Status Tag', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero SLA Note
	$wp_customize->add_setting(
		'stitch_hero_status_sla',
		array(
			'default'           => 'SLA: < 24h on business days',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_status_sla',
		array(
			'label'   => __( 'Telemetry Bar SLA Text', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Ready Note
	$wp_customize->add_setting(
		'stitch_hero_status_ready',
		array(
			'default'           => 'Ready for Dispatch',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_status_ready',
		array(
			'label'   => __( 'Telemetry Bar Status Tag', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Button 1 Text
	$wp_customize->add_setting(
		'stitch_hero_btn1_text',
		array(
			'default'           => 'Send Direct Dispatch',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_btn1_text',
		array(
			'label'   => __( 'Primary Button 1 Text', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Button 1 Link URL
	$wp_customize->add_setting(
		'stitch_hero_btn1_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_btn1_url',
		array(
			'label'       => __( 'Primary Button 1 Link URL', 'stitch-animated' ),
			'description' => __( 'Leave empty to link directly to the contact page.', 'stitch-animated' ),
			'section'     => 'stitch_hero_section',
			'type'        => 'url',
		)
	);

	// Hero Button 2 Text
	$wp_customize->add_setting(
		'stitch_hero_btn2_text',
		array(
			'default'           => '.org/wprashed',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_btn2_text',
		array(
			'label'   => __( 'Secondary Button 2 Text', 'stitch-animated' ),
			'section' => 'stitch_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Button 2 Link URL
	$wp_customize->add_setting(
		'stitch_hero_btn2_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'stitch_hero_btn2_url',
		array(
			'label'       => __( 'Secondary Button 2 Link URL', 'stitch-animated' ),
			'description' => __( 'Leave empty to link to your configured WordPress.org profile.', 'stitch-animated' ),
			'section'     => 'stitch_hero_section',
			'type'        => 'url',
		)
	);

	// =========================================================================
	// 2. SECTION: CUMULATIVE METRICS LEDGER
	// =========================================================================
	$wp_customize->add_section(
		'stitch_metrics_section',
		array(
			'title'       => __( 'Cumulative Metrics Ledger', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 20,
			'description' => __( 'Customize the numbers and labels in the 4-column cumulative engineering ledger.', 'stitch-animated' ),
		)
	);

	// Metric 1: Ecosystem Scale
	$wp_customize->add_setting( 'stitch_metric1_title', array( 'default' => 'GLOBAL IMPACT', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric1_title', array( 'label' => __( 'Metric 1 Category', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric1_val', array( 'default' => 'Millions', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric1_val', array( 'label' => __( 'Metric 1 Number / Value', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric1_sub', array( 'default' => 'Websites Powered', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric1_sub', array( 'label' => __( 'Metric 1 Title', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric1_desc', array( 'default' => 'WordPress Core, WooCommerce, Jetpack, Three.js, Vue.js & open-source projects', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric1_desc', array( 'label' => __( 'Metric 1 Description', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric1_badge_lbl', array( 'default' => 'Websites Powered', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric1_badge_lbl', array( 'label' => __( 'Metric 1 Badge Label', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );

	// Metric 2: Software Artifacts
	$wp_customize->add_setting( 'stitch_metric2_title', array( 'default' => 'SOFTWARE ARTIFACTS', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric2_title', array( 'label' => __( 'Metric 2 Category', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric2_val', array( 'default' => '60+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric2_val', array( 'label' => __( 'Metric 2 Number / Value', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric2_sub', array( 'default' => 'Authored WordPress Plugins', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric2_sub', array( 'label' => __( 'Metric 2 Title', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric2_desc', array( 'default' => 'Official WordPress.org Repository', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric2_desc', array( 'label' => __( 'Metric 2 Description', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );

	// Metric 3: Core Releases
	$wp_customize->add_setting( 'stitch_metric3_title', array( 'default' => 'CORE CONTRIBUTIONS', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric3_title', array( 'label' => __( 'Metric 3 Category', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric3_val', array( 'default' => '3', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric3_val', array( 'label' => __( 'Metric 3 Number / Value', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric3_sub', array( 'default' => 'Major WordPress Releases', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric3_sub', array( 'label' => __( 'Metric 3 Title', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric3_desc', array( 'default' => 'Credited: WordPress 6.9, 7.0 & 7.1', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric3_desc', array( 'label' => __( 'Metric 3 Description', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );

	// Metric 4: Community Recognition
	$wp_customize->add_setting( 'stitch_metric4_title', array( 'default' => 'COMMUNITY RECOGNITION', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric4_title', array( 'label' => __( 'Metric 4 Category', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric4_val', array( 'default' => '11', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric4_val', array( 'label' => __( 'Metric 4 Number / Value', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric4_sub', array( 'default' => 'Official .org Badges', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric4_sub', array( 'label' => __( 'Metric 4 Title', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'stitch_metric4_desc', array( 'default' => 'Core AI, Meta, Speaker, Org, PTE', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_metric4_desc', array( 'label' => __( 'Metric 4 Description', 'stitch-animated' ), 'section' => 'stitch_metrics_section', 'type' => 'text' ) );

	// =========================================================================
	// 3. SECTION: INTAKE & DISPATCH CTA
	// =========================================================================
	$wp_customize->add_section(
		'stitch_cta_section',
		array(
			'title'       => __( 'Intake & Dispatch CTA Banner', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 30,
			'description' => __( 'Configure the bottom call-to-action banner on the homepage and dossier.', 'stitch-animated' ),
		)
	);

	$wp_customize->add_setting( 'stitch_cta_eyebrow', array( 'default' => 'DIRECT TRANSMISSION & DISCOURSE', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_cta_eyebrow', array( 'label' => __( 'CTA Eyebrow', 'stitch-animated' ), 'section' => 'stitch_cta_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_cta_title', array( 'default' => 'Initiate an engineering dialogue or schedule technical advisory.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_cta_title', array( 'label' => __( 'CTA Headline', 'stitch-animated' ), 'section' => 'stitch_cta_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_cta_desc', array( 'default' => 'Available for select WordPress Core migrations, open-source team workshops, and WordCamp keynote presentations. Form data is recorded directly into the website ledger.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_cta_desc', array( 'label' => __( 'CTA Description', 'stitch-animated' ), 'section' => 'stitch_cta_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'stitch_cta_btn1_text', array( 'default' => 'Open Dispatch Channel', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_cta_btn1_text', array( 'label' => __( 'Primary CTA Button Text', 'stitch-animated' ), 'section' => 'stitch_cta_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_cta_btn2_text', array( 'default' => 'Direct Mailto', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_cta_btn2_text', array( 'label' => __( 'Secondary CTA Button Text', 'stitch-animated' ), 'section' => 'stitch_cta_section', 'type' => 'text' ) );

	// =========================================================================
	// 4. SECTION: ABOUT DOSSIER DETAILS
	// =========================================================================
	$wp_customize->add_section(
		'stitch_about_section',
		array(
			'title'       => __( 'About Dossier Content', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 40,
			'description' => __( 'Configure headings, quotes, and bio text on the About page.', 'stitch-animated' ),
		)
	);

	$wp_customize->add_setting( 'stitch_about_eyebrow', array( 'default' => 'Tech Support Lead · AI & Automation · Product Management', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_about_eyebrow', array( 'label' => __( 'About Eyebrow', 'stitch-animated' ), 'section' => 'stitch_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_about_title', array( 'default' => 'Curiosity became a career. Contribution became a habit.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_about_title', array( 'label' => __( 'About Dossier Headline', 'stitch-animated' ), 'section' => 'stitch_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'stitch_about_intro', array( 'default' => 'I am Rashed Hossain — Tech Support Lead, software engineer, and AI automation specialist. Over the past 10+ years, I have engineered and scaled solutions powering millions of websites worldwide. Combining deep open-source expertise (WordPress Core, WooCommerce, Jetpack, Three.js, Vue.js) with modern AI architectures, workflow automation, and data analytics, I bridge product vision, complex codebases, and global user scale.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_about_intro', array( 'label' => __( 'About Dossier Intro Paragraph', 'stitch-animated' ), 'section' => 'stitch_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'stitch_about_quote', array( 'default' => 'Great software is not measured solely by lines of code, but by the resilience of the systems you build, the workflows you automate, and the communities you empower. When you engineer tools powering millions worldwide, empathy and stewardship are your greatest technical virtues.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_about_quote', array( 'label' => __( 'Philosophy Highlight Quote', 'stitch-animated' ), 'section' => 'stitch_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'stitch_about_horizon', array( 'default' => 'Beyond software architecture, I am an active photographer whose work documents architectural geometry, urban stillness, and cultural heritage. 125+ photographs have been officially featured on Pexels, with editorial selections licensed and published across international top news outlets and magazines.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_about_horizon', array( 'label' => __( 'Photography & Visual Portfolio Narrative', 'stitch-animated' ), 'section' => 'stitch_about_section', 'type' => 'textarea' ) );

	// =========================================================================
	// 5. SECTION: CONTACT PAGE DETAILS
	// =========================================================================
	$wp_customize->add_section(
		'stitch_contact_section',
		array(
			'title'       => __( 'Contact Page Coordinates', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 50,
			'description' => __( 'Configure contact page coordinates, SLA, and security fingerprint.', 'stitch-animated' ),
		)
	);

	$wp_customize->add_setting( 'stitch_contact_headline', array( 'default' => 'Initiate Direct Dispatch', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_contact_headline', array( 'label' => __( 'Contact Form Headline', 'stitch-animated' ), 'section' => 'stitch_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_contact_subtext', array( 'default' => 'Submit inquiries, architectural consultations, or technical dispatch below. Submissions are captured live into the website inquiries database.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_contact_subtext', array( 'label' => __( 'Contact Form Subtitle', 'stitch-animated' ), 'section' => 'stitch_contact_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'stitch_contact_sla', array( 'default' => '< 24 Hours', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_contact_sla', array( 'label' => __( 'Response SLA Text', 'stitch-animated' ), 'section' => 'stitch_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_contact_pgp', array( 'default' => '0x7F4B92C1... (ED25519)', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_contact_pgp', array( 'label' => __( 'Security / PGP Fingerprint', 'stitch-animated' ), 'section' => 'stitch_contact_section', 'type' => 'text' ) );

	// =========================================================================
	// 6. SECTION: SOCIAL & DEVELOPER PROFILES
	// =========================================================================
	$wp_customize->add_section(
		'stitch_social_section',
		array(
			'title'       => __( 'Social & Developer Profiles', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 60,
			'description' => __( 'Manage all profile URLs, email addresses, and location identifiers.', 'stitch-animated' ),
		)
	);

	$wp_customize->add_setting( 'stitch_contact_email', array( 'default' => 'wprashed@icloud.com', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'stitch_contact_email', array( 'label' => __( 'Primary Contact Email', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'email' ) );

	$wp_customize->add_setting( 'stitch_wporg_url', array( 'default' => 'https://profiles.wordpress.org/wprashed/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_wporg_url', array( 'label' => __( 'WordPress.org Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_github_url', array( 'default' => 'https://github.com/wprashed', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_github_url', array( 'label' => __( 'GitHub Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_linkedin_url', array( 'default' => 'https://www.linkedin.com/in/wprashedh/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_linkedin_url', array( 'label' => __( 'LinkedIn Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_facebook_url', array( 'default' => 'https://www.facebook.com/wprashedh/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_facebook_url', array( 'label' => __( 'Facebook Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_instagram_url', array( 'default' => 'https://www.instagram.com/wprashedh/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_instagram_url', array( 'label' => __( 'Instagram Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_pexels_url', array( 'default' => 'https://www.pexels.com/@rashed-hossain-1520582336/highlights/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_pexels_url', array( 'label' => __( 'Pexels Portfolio URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_twitter_url', array( 'default' => 'https://x.com/wprashed', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'stitch_twitter_url', array( 'label' => __( 'Twitter / X Profile URL', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'stitch_telegram_handle', array( 'default' => '@wprashed', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_telegram_handle', array( 'label' => __( 'Telegram Handle', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_location_text', array( 'default' => 'Dhaka, Bangladesh', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_location_text', array( 'label' => __( 'Primary Base Location', 'stitch-animated' ), 'section' => 'stitch_social_section', 'type' => 'text' ) );

	// =========================================================================
	// 7. SECTION: HEADER, FOOTER & TELEMETRY
	// =========================================================================
	$wp_customize->add_section(
		'stitch_header_footer_section',
		array(
			'title'       => __( 'Header, Footer & Telemetry', 'stitch-animated' ),
			'panel'       => 'stitch_theme_panel',
			'priority'    => 70,
			'description' => __( 'Manage masthead brand text, WebGL shader toggle, and footer telemetry lines.', 'stitch-animated' ),
		)
	);

	$wp_customize->add_setting( 'stitch_brand_name', array( 'default' => 'Rashed', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_brand_name', array( 'label' => __( 'Brand Name Text', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_brand_pill', array( 'default' => 'Core Contributor', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_brand_pill', array( 'label' => __( 'Brand Tagline Pill', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_ambient_shader', array( 'default' => true, 'sanitize_callback' => 'wp_validate_boolean' ) );
	$wp_customize->add_control( 'stitch_ambient_shader', array( 'label' => __( 'Enable WebGL Fluid Shader Canvas', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'stitch_footer_telemetry', array( 'default' => 'STITCH ARCHITECTURAL CORE // REV 2026.10', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_footer_telemetry', array( 'label' => __( 'Footer Telemetry Badge', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_footer_title', array( 'default' => 'Still building. Still learning. Still contributing.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_footer_title', array( 'label' => __( 'Footer Headline Statement', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_footer_status', array( 'default' => 'Dhaka, Bangladesh // UTC+6 Standard Time', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'stitch_footer_status', array( 'label' => __( 'Footer Timezone Line', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'stitch_footer_copyright', array( 'default' => 'Crafted with open-source precision. All engineering artifacts open under CC0 & GPLv2.', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'stitch_footer_copyright', array( 'label' => __( 'Footer Copyright Notice', 'stitch-animated' ), 'section' => 'stitch_header_footer_section', 'type' => 'textarea' ) );
}
add_action( 'customize_register', 'stitch_customize_register' );

/**
 * ==========================================================================
 * AUTOMATIC SITE CONTENT & ARCHITECTURE GENERATOR
 * Generates all site pages, navigation menus, and reading settings on activation
 * ==========================================================================
 */
function stitch_auto_generate_site_content( $force = false ) {
	// 1. Pages Definition Matrix
	$pages_to_create = array(
		'home'          => array(
			'title'    => 'Overview',
			'slug'     => 'home',
			'template' => 'default',
			'content'  => '<!-- Front page content is dynamically generated by front-page.php template -->',
		),
		'about'         => array(
			'title'    => 'About',
			'slug'     => 'about',
			'template' => 'page-about.php',
			'content'  => '<!-- About dossier content is dynamically generated by page-about.php template -->',
		),
		'contributions' => array(
			'title'    => 'Contributions',
			'slug'     => 'contributions',
			'template' => 'page-contributions.php',
			'content'  => '<!-- Contributions ecosystem content is dynamically generated by page-contributions.php template -->',
		),
		'writing'       => array(
			'title'    => 'Writing',
			'slug'     => 'writing',
			'template' => 'default',
			'content'  => '<!-- Writing archive content is dynamically generated by home.php template -->',
		),
		'contact'       => array(
			'title'    => 'Contact',
			'slug'     => 'contact',
			'template' => 'page-contact.php',
			'content'  => '<!-- Secure dispatch channel and inquiries form is dynamically generated by page-contact.php template -->',
		),
	);

	$created_pages = array();

	foreach ( $pages_to_create as $key => $page_data ) {
		$existing_page = get_page_by_path( $page_data['slug'] );

		if ( ! $existing_page ) {
			$page_id = wp_insert_post(
				array(
					'post_title'     => $page_data['title'],
					'post_name'      => $page_data['slug'],
					'post_content'   => $page_data['content'],
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'comment_status' => 'closed',
				)
			);
			if ( $page_id && ! is_wp_error( $page_id ) ) {
				if ( 'default' !== $page_data['template'] ) {
					update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
				}
				$created_pages[ $key ] = $page_id;
			}
		} else {
			$created_pages[ $key ] = $existing_page->ID;
			// Ensure template is assigned if missing
			if ( 'default' !== $page_data['template'] ) {
				$current_template = get_post_meta( $existing_page->ID, '_wp_page_template', true );
				if ( empty( $current_template ) || 'default' === $current_template || $force ) {
					update_post_meta( $existing_page->ID, '_wp_page_template', $page_data['template'] );
				}
			}
		}
	}

	// 2. Set Reading Settings (Static Front Page = Overview, Posts Page = Writing)
	if ( ! empty( $created_pages['home'] ) && ! empty( $created_pages['writing'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $created_pages['home'] );
		update_option( 'page_for_posts', $created_pages['writing'] );
	}

	// 3. Navigation Menu Setup
	$menu_locations = get_theme_mod( 'nav_menu_locations', array() );
	$primary_menu_id = isset( $menu_locations['primary'] ) ? $menu_locations['primary'] : 0;

	if ( ! $primary_menu_id || ! is_nav_menu( $primary_menu_id ) || $force ) {
		$menu_name = 'Stitch Architectural Menu';
		$menu_obj  = wp_get_nav_menu_object( $menu_name );

		if ( ! $menu_obj ) {
			$menu_id = wp_create_nav_menu( $menu_name );
		} else {
			$menu_id = $menu_obj->term_id;
		}

		if ( ! is_wp_error( $menu_id ) ) {
			// Check if menu has items
			$items = wp_get_nav_menu_items( $menu_id );
			if ( empty( $items ) || $force ) {
				// Clear existing items if forcing
				if ( $force && ! empty( $items ) ) {
					foreach ( $items as $it ) {
						wp_delete_post( $it->ID, true );
					}
				}

				// Home link
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'   => 'Home',
					'menu-item-url'     => home_url( '/' ),
					'menu-item-status'  => 'publish',
					'menu-item-type'    => 'custom',
				) );

				// About link
				if ( ! empty( $created_pages['about'] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => 'About',
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $created_pages['about'],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}

				// Contributions link
				if ( ! empty( $created_pages['contributions'] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => 'WP Contributions',
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $created_pages['contributions'],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}

				// Writing link
				if ( ! empty( $created_pages['writing'] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => 'Articles',
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $created_pages['writing'],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}

				// Contact link
				if ( ! empty( $created_pages['contact'] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => 'Contact',
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $created_pages['contact'],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}
			}

			// Assign menu to primary and footer locations
			$menu_locations['primary'] = $menu_id;
			$menu_locations['footer']  = $menu_id;
			set_theme_mod( 'nav_menu_locations', $menu_locations );
		}
	}

	// 4. Default Customizer Settings
	if ( false === get_theme_mod( 'stitch_contact_email' ) ) {
		set_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' );
	}
	if ( false === get_theme_mod( 'stitch_wporg_url' ) ) {
		set_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );
	}
	if ( false === get_theme_mod( 'stitch_github_url' ) ) {
		set_theme_mod( 'stitch_github_url', 'https://github.com/wprashed' );
	}
	if ( false === get_theme_mod( 'stitch_linkedin_url' ) ) {
		set_theme_mod( 'stitch_linkedin_url', 'https://www.linkedin.com/in/wprashedh/' );
	}
	if ( false === get_theme_mod( 'stitch_facebook_url' ) ) {
		set_theme_mod( 'stitch_facebook_url', 'https://www.facebook.com/wprashedh/' );
	}
	if ( false === get_theme_mod( 'stitch_instagram_url' ) ) {
		set_theme_mod( 'stitch_instagram_url', 'https://www.instagram.com/wprashedh/' );
	}
	if ( false === get_theme_mod( 'stitch_ambient_shader' ) ) {
		set_theme_mod( 'stitch_ambient_shader', true );
	}

	return $created_pages;
}

// Hook into theme activation
add_action( 'after_switch_theme', 'stitch_auto_generate_site_content' );

/**
 * Admin Menu: Appearance > Rashed Theme Setup
 */
function stitch_register_theme_setup_admin_menu() {
	add_theme_page(
		__( 'Rashed Content Generator', 'stitch-animated' ),
		__( 'Rashed Theme Setup', 'stitch-animated' ),
		'manage_options',
		'stitch-theme-setup',
		'stitch_render_theme_setup_admin_page'
	);
}
add_action( 'admin_menu', 'stitch_register_theme_setup_admin_menu' );

/**
 * Render Theme Setup Admin Page
 */
function stitch_render_theme_setup_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message = '';
	if ( isset( $_POST['stitch_regenerate_content'] ) && check_admin_referer( 'stitch_setup_nonce', '_stitch_nonce' ) ) {
		stitch_auto_generate_site_content( true );
		$message = __( 'All theme pages, templates, navigation menus, and reading settings have been successfully generated and configured!', 'stitch-animated' );
	}

	$p_home    = get_page_by_path( 'home' );
	$p_about   = get_page_by_path( 'about' );
	$p_contrib = get_page_by_path( 'contributions' );
	$p_writing = get_page_by_path( 'writing' );
	$p_contact = get_page_by_path( 'contact' );

	$front_id = get_option( 'page_on_front' );
	$posts_id = get_option( 'page_for_posts' );
	?>
	<div class="wrap" style="max-width:850px;margin-top:20px;">
		<h1><?php esc_html_e( 'Rashed — Site Content & Architecture Setup', 'stitch-animated' ); ?></h1>
		<p class="description">
			<?php esc_html_e( 'This automated utility ensures that whenever this theme is installed on any WordPress site, all architectural pages, custom templates, navigation menus, and reading settings are automatically generated and linked.', 'stitch-animated' ); ?>
		</p>

		<?php if ( ! empty( $message ) ) : ?>
			<div class="notice notice-success is-dismissible" style="padding:12px;margin:20px 0;">
				<p><strong><?php echo esc_html( $message ); ?></strong></p>
			</div>
		<?php endif; ?>

		<div style="background:#fff;border:1px solid #c4c5d7;border-radius:12px;padding:25px;margin-top:20px;box-shadow:0 4px 12px rgba(0,0,0,0.03);">
			<h2 style="margin-top:0;font-size:18px;border-bottom:1px solid #eee;padding-bottom:10px;">
				<?php esc_html_e( 'Current Site Configuration Matrix', 'stitch-animated' ); ?>
			</h2>

			<table class="widefat striped" style="margin:15px 0;">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Entity / Page', 'stitch-animated' ); ?></th>
						<th><?php esc_html_e( 'Required Slug', 'stitch-animated' ); ?></th>
						<th><?php esc_html_e( 'Target Template', 'stitch-animated' ); ?></th>
						<th><?php esc_html_e( 'Status', 'stitch-animated' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Overview (Front Page)</strong></td>
						<td><code>home</code></td>
						<td><code>front-page.php</code></td>
						<td>
							<?php if ( $p_home && (int) $front_id === (int) $p_home->ID ) : ?>
								<span style="color:#15803d;font-weight:600;">✓ Active Front Page</span>
							<?php else : ?>
								<span style="color:#ba1a1a;">Not Configured</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td><strong>About Dossier</strong></td>
						<td><code>about</code></td>
						<td><code>page-about.php</code></td>
						<td>
							<?php if ( $p_about && 'page-about.php' === get_post_meta( $p_about->ID, '_wp_page_template', true ) ) : ?>
								<span style="color:#15803d;font-weight:600;">✓ Active (page-about.php)</span>
							<?php else : ?>
								<span style="color:#ba1a1a;">Missing / Unassigned</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td><strong>WP Contributions</strong></td>
						<td><code>contributions</code></td>
						<td><code>page-contributions.php</code></td>
						<td>
							<?php if ( $p_contrib && 'page-contributions.php' === get_post_meta( $p_contrib->ID, '_wp_page_template', true ) ) : ?>
								<span style="color:#15803d;font-weight:600;">✓ Active (page-contributions.php)</span>
							<?php else : ?>
								<span style="color:#ba1a1a;">Missing / Unassigned</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td><strong>Writing / Articles</strong></td>
						<td><code>writing</code></td>
						<td><code>home.php</code></td>
						<td>
							<?php if ( $p_writing && (int) $posts_id === (int) $p_writing->ID ) : ?>
								<span style="color:#15803d;font-weight:600;">✓ Active Posts Page</span>
							<?php else : ?>
								<span style="color:#ba1a1a;">Not Configured</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td><strong>Contact &amp; Inquiries</strong></td>
						<td><code>contact</code></td>
						<td><code>page-contact.php</code></td>
						<td>
							<?php if ( $p_contact && 'page-contact.php' === get_post_meta( $p_contact->ID, '_wp_page_template', true ) ) : ?>
								<span style="color:#15803d;font-weight:600;">✓ Active (page-contact.php)</span>
							<?php else : ?>
								<span style="color:#ba1a1a;">Missing / Unassigned</span>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>

			<div style="background:#faf9f4;border:1px solid #efeee9;padding:15px;border-radius:8px;margin-top:20px;">
				<h3 style="margin-top:0;font-size:14px;"><?php esc_html_e( 'Automated Deployment & Distribution Guarantee:', 'stitch-animated' ); ?></h3>
				<p style="margin-bottom:0;color:#555;font-size:13px;line-height:1.5;">
					<?php esc_html_e( 'When you zip and install this theme on any client or staging server, the theme activation hook will run automatically. All 5 pages, their template assignments, the primary navigation menu, and reading options will be created instantly. Your blog posts remain untouched and independent in the WordPress database as requested.', 'stitch-animated' ); ?>
				</p>
			</div>

			<form method="post" action="" style="margin-top:25px;">
				<?php wp_nonce_field( 'stitch_setup_nonce', '_stitch_nonce' ); ?>
				<input type="submit" name="stitch_regenerate_content" class="button button-primary button-hero" value="<?php esc_attr_e( '↻ Re-Generate / Re-Sync All Pages & Menus', 'stitch-animated' ); ?>">
			</form>
		</div>
	</div>
	<?php
}

/**
 * ==========================================================================
 * ENTERPRISE THEME SECURITY HARDENING SUITE
 * ==========================================================================
 */

/**
 * 1. HTTP Security Headers
 * Injects robust HTTP defensive headers to prevent clickjacking, MIME-type sniffing,
 * cross-site scripting (XSS), and sensitive referrer leakage.
 */
function stitch_apply_security_headers() {
	if ( headers_sent() ) {
		return;
	}

	// Prevent site from being embedded in malicious third-party iframes (Clickjacking)
	header( 'X-Frame-Options: SAMEORIGIN' );

	// Instruct browsers not to guess MIME types (prevents malicious file execution)
	header( 'X-Content-Type-Options: nosniff' );

	// Enable legacy browser XSS filters
	header( 'X-XSS-Protection: 1; mode=block' );

	// Only pass origin on cross-origin requests to preserve user privacy
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );

	// Restrict unneeded browser device capabilities
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
}
add_action( 'send_headers', 'stitch_apply_security_headers' );

/**
 * 2. Prevent WordPress Version Fingerprinting
 * Strips generator tags and version signatures so attackers cannot automate exploits based on exact WP version.
 */
function stitch_harden_version_leakage() {
	// Remove generator meta tags
	remove_action( 'wp_head', 'wp_generator' );
	add_filter( 'the_generator', '__return_empty_string' );
}
add_action( 'init', 'stitch_harden_version_leakage' );

/**
 * 3. User Enumeration Defense
 * Blocks brute-force reconnaissance scans targeting /?author=1 or /?author=2 to prevent harvesting admin usernames.
 */
function stitch_block_author_enumeration() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}

	if ( isset( $_REQUEST['author'] ) || is_author() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'stitch_block_author_enumeration' );

/**
 * 4. Legacy URLs & Search 404 Prevention
 * Seamlessly 301 redirects legacy routes, search pagination overflows, and outdated indexed slugs.
 */
function stitch_legacy_and_search_redirects() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}

	// 1. Prevent 404 on search pagination overflows (e.g. ?s=query&paged=99) or broken search URLs
	if ( is_404() && ! empty( $_GET['s'] ) ) {
		$search_query = sanitize_text_field( wp_unslash( $_GET['s'] ) );
		wp_safe_redirect( home_url( '/?s=' . rawurlencode( $search_query ) ), 301 );
		exit;
	}

	if ( is_search() && is_404() ) {
		$search_query = get_search_query();
		if ( ! empty( $search_query ) ) {
			wp_safe_redirect( home_url( '/?s=' . rawurlencode( $search_query ) ), 301 );
			exit;
		}
	}

	// Parse clean request URI path
	$raw_path  = isset( $_SERVER['REQUEST_URI'] ) ? (string) $_SERVER['REQUEST_URI'] : '';
	$path_only = trim( (string) wp_parse_url( $raw_path, PHP_URL_PATH ), '/' );

	if ( empty( $path_only ) ) {
		return;
	}

	// 1b. Handle pretty search pagination overflows (e.g. /search/term/page/2/)
	if ( is_404() && preg_match( '#^search/([^/]+)/page/(\d+)#i', $path_only, $m ) ) {
		wp_safe_redirect( home_url( '/search/' . rawurlencode( $m[1] ) . '/' ), 301 );
		exit;
	}

	// Normalise path to lower case
	$path_lower = strtolower( $path_only );

	// 2. Direct 301 Redirect Maps for Legacy/Indexed URLs
	$direct_redirects = array(
		'articles'          => '/writing/',
		'wp-contributions'  => '/contributions/',
		'blog'              => '/writing/',
		'work'              => '/#work',
		'portfolio'         => '/#work',
		'projects'          => '/#work',
		'experience'        => '/about/#experience',
		'cv'                => '/about/',
		'resume'            => '/about/',
	);

	if ( isset( $direct_redirects[ $path_lower ] ) ) {
		wp_safe_redirect( home_url( $direct_redirects[ $path_lower ] ), 301 );
		exit;
	}

	// 3. Handle paginated legacy URLs (e.g. /articles/page/2/ -> /writing/page/2/)
	if ( preg_match( '#^articles/page/(\d+)#i', $path_only, $m ) ) {
		wp_safe_redirect( home_url( '/writing/page/' . $m[1] . '/' ), 301 );
		exit;
	}
	if ( preg_match( '#^(blog|wp-contributions)/page/(\d+)#i', $path_only, $m ) ) {
		$target = ( 'wp-contributions' === strtolower( $m[1] ) ) ? '/contributions/' : '/writing/';
		wp_safe_redirect( home_url( $target . 'page/' . $m[2] . '/' ), 301 );
		exit;
	}

	// 4. Handle nested legacy single post routes (e.g. /articles/some-slug/ -> /some-slug/)
	if ( preg_match( '#^(articles|blog)/([^/]+)/?$#i', $path_only, $m ) ) {
		$sub_slug = sanitize_title( $m[2] );
		if ( ! empty( $sub_slug ) ) {
			$post = get_page_by_path( $sub_slug, OBJECT, 'post' );
			if ( $post && 'publish' === $post->post_status ) {
				wp_safe_redirect( get_permalink( $post ), 301 );
				exit;
			}
		}
	}

	// 5. Catch-all for 404s: Resolve extensions (.html, .php) or trailing matches
	if ( is_404() ) {
		$cleaned_slug = preg_replace( '/\.(html|php|htm)$/i', '', $path_lower );
		if ( $cleaned_slug !== $path_lower ) {
			$found = get_page_by_path( $cleaned_slug, OBJECT, array( 'post', 'page' ) );
			if ( $found && 'publish' === $found->post_status ) {
				wp_safe_redirect( get_permalink( $found ), 301 );
				exit;
			}
		}

		// Check if slug without prefixes matches an existing published post
		if ( str_contains( $path_lower, '/' ) ) {
			$segments = explode( '/', $path_lower );
			$last_segment = end( $segments );
			$found_post = get_page_by_path( $last_segment, OBJECT, 'post' );
			if ( $found_post && 'publish' === $found_post->post_status ) {
				wp_safe_redirect( get_permalink( $found_post ), 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'stitch_legacy_and_search_redirects', 1 );

/**
 * 5. Search Query Guard & Post-Type Whitelist
 * Guarantees search queries only return published public posts and pages, preventing draft/private leaks.
 */
function stitch_filter_search_queries( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'post', 'page' ) );
		$query->set( 'post_status', 'publish' );
	}
}
add_action( 'pre_get_posts', 'stitch_filter_search_queries' );

/**
 * 6. Disable XML-RPC Pingback Attacks & Abuse
 * Mitigates Distributed Denial of Service (DDoS) reflection and internal SSRF probes via pingbacks.
 */
function stitch_disable_xmlrpc_pingback( $methods ) {
	if ( isset( $methods['pingback.ping'] ) ) {
		unset( $methods['pingback.ping'] );
	}
	if ( isset( $methods['pingback.extensions.getPingbacks'] ) ) {
		unset( $methods['pingback.extensions.getPingbacks'] );
	}
	return $methods;
}
add_filter( 'xmlrpc_methods', 'stitch_disable_xmlrpc_pingback' );

// Close pings
add_filter( 'pings_open', '__return_false', 20, 2 );

// Remove X-Pingback header
function stitch_remove_x_pingback_header( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
}
add_filter( 'wp_headers', 'stitch_remove_x_pingback_header' );

/**
 * 5. Sanitize SVG Upload Capabilities (if enabled)
 * Restricts SVG/raw uploads to Administrators only.
 */
function stitch_restrict_unfiltered_uploads( $caps, $cap, $user_id, $args ) {
	if ( 'unfiltered_html' === $cap && ! user_can( $user_id, 'administrator' ) ) {
		$caps = array( 'do_not_allow' );
	}
	return $caps;
}
add_filter( 'map_meta_cap', 'stitch_restrict_unfiltered_uploads', 10, 4 );

/**
 * 6. Swiss Architectural Pagination Template Filter
 * Completely suppresses unstyled screen-reader headings and ensures all pagination renders as an elevated tactile pill bar.
 */
function stitch_custom_navigation_markup_template( $template, $class ) {
	return '
	<nav class="navigation %1$s my-10 flex flex-col items-center justify-center w-full" aria-label="%4$s">
		<h2 class="sr-only screen-reader-text">%2$s</h2>
		<div class="nav-links inline-flex flex-wrap items-center justify-center gap-1.5 p-1.5 rounded-full bg-surface-container-low/80 border border-outline-variant/40 shadow-xs backdrop-blur-xs font-mono text-[13px]">%3$s</div>
	</nav>';
}
add_filter( 'navigation_markup_template', 'stitch_custom_navigation_markup_template', 10, 2 );

/**
 * 7. Default Pagination Arguments Filter
 * Enforces refined tactile icons and clean monospace typography across all archive queries.
 */
function stitch_custom_pagination_args( $args ) {
	$args['screen_reader_text'] = __( 'Articles navigation', 'rashed' );
	$args['aria_label']         = __( 'Articles navigation', 'rashed' );
	$args['prev_text']          = '<span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">arrow_back</span><span>Newer</span></span>';
	$args['next_text']          = '<span class="inline-flex items-center gap-1"><span>Older</span><span class="material-symbols-outlined text-[15px]">arrow_forward</span></span>';
	$args['class']              = 'pagination';
	return $args;
}
add_filter( 'the_posts_pagination_args', 'stitch_custom_pagination_args' );



