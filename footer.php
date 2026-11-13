<?php
/**
 * The footer template for Rashed Hossain — Stitch Animated theme.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wporg_url     = get_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );
$github_url    = get_theme_mod( 'stitch_github_url', 'https://github.com/wprashed' );
$linkedin_url  = get_theme_mod( 'stitch_linkedin_url', 'https://www.linkedin.com/in/wprashedh/' );
$facebook_url  = get_theme_mod( 'stitch_facebook_url', 'https://www.facebook.com/wprashedh/' );
$instagram_url = get_theme_mod( 'stitch_instagram_url', 'https://www.instagram.com/wprashedh/' );
$pexels_url    = get_theme_mod( 'stitch_pexels_url', 'https://www.pexels.com/@rashed-hossain-1520582336/highlights/' );
$twitter_url   = get_theme_mod( 'stitch_twitter_url', 'https://x.com/wprashed' );
$telegram      = get_theme_mod( 'stitch_telegram_handle', '@wprashed' );
$contact_email = get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' );
$footer_title  = get_theme_mod( 'stitch_footer_title', 'Still building. Still learning. Still contributing.' );
$telemetry_tag = get_theme_mod( 'stitch_footer_telemetry', 'Built with WordPress & Tailwind CSS' );
$status_line   = get_theme_mod( 'stitch_footer_status', 'Dhaka, Bangladesh · UTC+6' );
$copyright_txt = get_theme_mod( 'stitch_footer_copyright', 'Designed and built by Rashed Hossain. Code open source under GPLv2.' );
$rss_url       = get_feed_link();
?>

	<!-- Footer -->
	<footer class="relative z-20 border-t border-outline-variant/50 bg-surface-container-low px-6 md:px-12 py-14">
		<div class="max-w-5xl mx-auto flex flex-col gap-10">
			
			<!-- Main Top Grid -->
			<div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12 items-start justify-between">
				
				<!-- Column 1: Brand, Title & Location -->
				<div class="md:col-span-6 lg:col-span-5 flex flex-col gap-4">
					<div class="flex items-center gap-2">
						<span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span>
						<span class="font-label-code text-[11px] uppercase tracking-widest text-outline font-medium">
							WordPress Contributor
						</span>
					</div>
					
					<h3 class="font-display text-[26px] sm:text-[30px] text-on-surface leading-snug font-normal">
						<?php echo esc_html( $footer_title ); ?>
					</h3>

					<p class="font-label-code text-[12px] text-on-surface-variant flex items-center gap-2">
						<span class="material-symbols-outlined text-[15px] text-primary-container">location_on</span>
						<span>Dhaka, Bangladesh &bull;</span>
						<span class="live-dhaka-clock text-emerald-600 dark:text-emerald-400 font-mono font-semibold" data-clock-mode="short">UTC+6</span>
					</p>

					<!-- Direct Email Action Chip -->
					<div class="pt-2">
						<div data-copy-email="<?php echo esc_attr( $contact_email ); ?>" class="group inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-surface-container hover:bg-surface-container-high border border-outline-variant/50 hover:border-outline-variant/80 transition-all duration-200 cursor-pointer shadow-xs active:scale-95" title="Click to copy email address">
							<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>
							<span class="font-label-code text-[12px] text-on-surface group-hover:text-primary-container transition-colors duration-200 font-medium">
								<?php echo esc_html( $contact_email ); ?>
							</span>
							<span class="material-symbols-outlined text-[15px] text-outline group-hover:text-primary-container transition-colors duration-200">
								content_copy
							</span>
						</div>
					</div>
				</div>

				<!-- Column 2: Code & Ecosystem -->
				<div class="md:col-span-3 lg:col-span-3 lg:col-start-7 flex flex-col gap-3">
					<span class="font-label-meta text-[11px] uppercase tracking-widest text-outline block font-medium">
						Open Source &amp; Work
					</span>
					<ul class="flex flex-col gap-2 font-body-sm text-[13.5px]">
						<li>
							<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
								<span class="flex items-center gap-1.5">
									<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
									<span>WordPress.org</span>
								</span>
								<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
							</a>
						</li>
						<li>
							<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
								<span class="flex items-center gap-1.5">
									<span class="w-1.5 h-1.5 rounded-full bg-on-surface"></span>
									<span>GitHub</span>
								</span>
								<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
							</a>
						</li>
						<?php if ( ! empty( $pexels_url ) ) : ?>
							<li>
								<a href="<?php echo esc_url( $pexels_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1" title="125+ Photos Featured on Pexels">
									<span class="flex items-center gap-1.5">
										<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
										<span>Pexels Photos</span>
									</span>
									<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
								</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo esc_url( $rss_url ); ?>" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
								<span>RSS Feed</span>
								<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary transition-colors">rss_feed</span>
							</a>
						</li>
					</ul>
				</div>

				<!-- Column 3: Networks & Social -->
				<div class="md:col-span-3 lg:col-span-3 flex flex-col gap-3">
					<span class="font-label-meta text-[11px] uppercase tracking-widest text-outline block font-medium">
						Connect &amp; Social
					</span>
					<ul class="flex flex-col gap-2 font-body-sm text-[13.5px]">
						<li>
							<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
								<span>LinkedIn</span>
								<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
							</a>
						</li>
						<?php if ( ! empty( $twitter_url ) ) : ?>
							<li>
								<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
									<span>X / Twitter</span>
									<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $facebook_url ) ) : ?>
							<li>
								<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
									<span>Facebook</span>
									<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $instagram_url ) ) : ?>
							<li>
								<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between text-on-surface-variant hover:text-primary transition-colors py-1">
									<span>Instagram</span>
									<span class="material-symbols-outlined text-[13px] text-outline group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>

			</div>

			<!-- Colophon Bar -->
			<div class="border-t border-outline-variant/40 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 font-label-meta text-[11px] text-outline">
				<p class="tracking-wider uppercase text-center sm:text-left text-on-surface-variant leading-relaxed">
					<?php echo esc_html( $copyright_txt ); ?> &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_theme_mod( 'stitch_brand_name', 'Rashed Hossain' ) ); ?>.
				</p>
				<button type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="inline-flex items-center gap-1.5 text-on-surface-variant hover:text-primary transition-colors cursor-pointer py-1 font-semibold uppercase tracking-wider group" title="Scroll back to top">
					<span>Back to Top</span>
					<span class="material-symbols-outlined text-[15px] group-hover:-translate-y-0.5 transition-transform">arrow_upward</span>
				</button>
			</div>

		</div>
	</footer>

</div><!-- /Outer Architectural Editorial Container -->

<!-- Floating Toast Element -->
<div id="stitch-toast"></div>

<?php wp_footer(); ?>
</body>
</html>
