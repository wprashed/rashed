<?php
/**
 * Search Results Template
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

global $wp_query;
$results_count = $wp_query->found_posts;
$page_writing  = get_page_by_path( 'writing' ) ?: get_page_by_path( 'articles' );
$articles_url  = $page_writing ? get_permalink( $page_writing ) : home_url( '/writing/' );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<section class="relative px-6 md:px-12 pt-10 pb-10 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="max-w-4xl flex flex-col gap-4">
				
				<div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container text-on-surface font-label-meta text-label-meta uppercase tracking-wider -rotate-2 shadow-sm border border-outline-variant/40 self-start">
					<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
					<span>§ SEARCH INDEX // QUERY RESULTS</span>
				</div>

				<h1 class="font-display text-[34px] md:text-display text-on-surface tracking-tight leading-[1.1]">
					Search: &ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;
				</h1>

				<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
					<span class="font-label-code text-label-code text-on-surface-variant">
						<?php echo esc_html( $results_count ); ?> <?php echo 1 === (int) $results_count ? 'match' : 'matches'; ?> located in database
					</span>

					<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center w-full max-w-md bg-surface-container rounded-xl border border-outline-variant/40 px-3 py-1.5 focus-within:border-primary-container transition-all">
						<span class="material-symbols-outlined text-outline text-[18px] mr-2">search</span>
						<input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Refine search..." class="w-full bg-transparent text-on-surface font-body-sm text-[13px] placeholder:text-outline focus:outline-none">
						<button type="submit" class="px-3 py-1 rounded-lg bg-primary-container text-on-primary font-label-code text-[11px] font-semibold hover:bg-primary transition-all shrink-0">Search</button>
					</form>
				</div>

			</div>
		</section>

		<section class="px-6 md:px-12 py-10 bg-surface-container-low/40">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$read_time = stitch_get_reading_time( get_the_ID() );
						$excerpt   = get_the_excerpt();
						if ( empty( trim( $excerpt ) ) ) {
							$slug = get_post_field( 'post_name', get_the_ID() );
							if ( 'about' === $slug ) {
								$excerpt = 'Background, engineering leadership, open-source philosophy, and technical setup of Rashed Hossain.';
							} elseif ( 'contributions' === $slug || 'wp-contributions' === $slug ) {
								$excerpt = 'Upstream contributions to WordPress Core, CLI, performance modules, and 11 verified community badges.';
							} elseif ( 'writing' === $slug || 'articles' === $slug ) {
								$excerpt = 'Architectural essays, engineering write-ups, Core Web Vitals telemetry, and AI systems analysis.';
							} elseif ( 'contact' === $slug ) {
								$excerpt = 'Direct message dispatch terminal for technical leadership, advisory, and open-source collaborations.';
							} elseif ( 'privacy-policy' === $slug ) {
								$excerpt = 'Site privacy policy, data transmission protocols, and telemetry storage guidelines.';
							} else {
								$content = strip_tags( get_the_content() );
								$excerpt = ! empty( $content ) ? wp_trim_words( $content, 20, '...' ) : get_the_title() . ' — View entry details and full specification.';
							}
						}
						?>
						<article class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 shadow-sm flex flex-col justify-between hover:border-outline-variant/80 transition-all group">
							<div class="flex flex-col gap-3">
								<div class="flex items-center justify-between font-label-code text-label-meta text-on-surface-variant">
									<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-medium uppercase"><?php echo esc_html( get_post_type() ); ?></span>
									<span><?php echo esc_html( $read_time ); ?> MIN READ</span>
								</div>
								<h2 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
									<?php echo esc_html( wp_trim_words( $excerpt, 22, '...' ) ); ?>
								</p>
							</div>
							<div class="pt-4 mt-5 border-t border-surface-container flex items-center justify-between font-label-meta text-label-meta text-outline">
								<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
								<a href="<?php the_permalink(); ?>" class="text-primary font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
									<span>View Entry</span>
									<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
								</a>
							</div>
						</article>
						<?php
					endwhile;
				else :
					?>
					<div class="col-span-full py-16 text-center text-on-surface-variant font-label-code">
						<span class="material-symbols-outlined text-[36px] text-outline mb-2">search_off</span>
						<p class="text-base text-on-surface font-semibold mb-1">No direct records found for &ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;.</p>
						<p class="text-sm text-on-surface-variant mb-5">Try checking for typos or explore primary destination coordinates:</p>
						<div class="flex flex-wrap items-center justify-center gap-2 max-w-md mx-auto">
							<a href="<?php echo esc_url( $articles_url ); ?>" class="px-3.5 py-1.5 rounded-lg bg-primary-container text-on-primary font-label-code text-[12px] font-semibold hover:bg-primary transition-all">
								Writing &amp; Articles
							</a>
							<a href="<?php echo esc_url( home_url( '/contributions/' ) ); ?>" class="px-3.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-code text-[12px] hover:bg-surface-container-high transition-all border border-outline-variant/40">
								WordPress Contributions
							</a>
							<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="px-3.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-code text-[12px] hover:bg-surface-container-high transition-all border border-outline-variant/40">
								About Rashed
							</a>
							<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-3.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-code text-[12px] hover:bg-surface-container-high transition-all border border-outline-variant/40">
								Contact Terminal
							</a>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<div class="pt-8 mt-6 border-t border-surface-container-high/60 w-full">
				<?php
				the_posts_pagination(
					array(
						'mid_size'           => 2,
						'prev_text'          => '<span class="material-symbols-outlined text-[15px]">arrow_back</span> Previous',
						'next_text'          => 'Next <span class="material-symbols-outlined text-[15px]">arrow_forward</span>',
						'screen_reader_text' => __( 'Search results pagination', 'stitch-animated' ),
					)
				);
				?>
			</div>
		</section>

	</div>
</main>

<?php
get_footer();
