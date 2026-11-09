<?php
/**
 * Single Article / Post Template
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$read_time  = stitch_get_reading_time( get_the_ID() );
$categories   = get_the_category();
$cat_name     = ! empty( $categories ) ? $categories[0]->name : 'Engineering';
$author_id    = get_post_field( 'post_author', get_the_ID() );
$page_writing = get_page_by_path( 'writing' ) ?: get_page_by_path( 'articles' );
$articles_url = $page_writing ? get_permalink( $page_writing ) : home_url( '/writing/' );
?>

<!-- Reading Progress Tracker (Sticky hairline indicator) -->
<div class="sticky top-0 z-30 w-full h-[2.5px] bg-surface-container">
	<div id="reading-progress-fill" class="h-full bg-primary-container w-0 transition-all duration-75"></div>
</div>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<!-- Header Masthead Section -->
			<header class="relative px-6 md:px-12 pt-10 pb-10 bg-surface-container-lowest border-b border-surface-container-high/60">
				<div class="max-w-4xl flex flex-col gap-5">
					
					<div class="flex flex-wrap items-center gap-3">
						<a href="<?php echo esc_url( $articles_url ); ?>" class="inline-flex items-center gap-1 font-label-code text-label-code text-outline hover:text-primary transition-colors">
							<span class="material-symbols-outlined text-[15px]">arrow_back</span>
							<span>Back to Articles</span>
						</a>
						<span class="text-outline-variant">/</span>
						<span class="px-2 py-0.5 rounded bg-surface-container font-label-meta text-[11px] text-on-surface font-medium uppercase">
							<?php echo esc_html( $cat_name ); ?>
						</span>
					</div>

					<h1 class="font-display text-[34px] md:text-[46px] text-on-surface tracking-tight leading-[1.15]">
						<?php the_title(); ?>
					</h1>

					<div class="flex flex-wrap items-center gap-y-2 gap-x-4 font-label-code text-label-code text-on-surface-variant pt-2 border-t border-surface-container">
						<span class="text-on-surface font-medium">By Rashed Hossain</span>
						<span class="text-outline-variant">|</span>
						<span><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
						<span class="text-outline-variant">|</span>
						<span class="text-primary-container font-semibold"><?php echo esc_html( $read_time ); ?> MIN READ</span>
					</div>

				</div>
			</header>

			<!-- Asymmetric Editorial Grid: Side Meta + Main Prose -->
			<div class="px-6 md:px-12 py-10 bg-surface-container-lowest">
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start max-w-6xl">
					
					<!-- Left Metadata Sidebar -->
					<aside class="lg:col-span-3 hidden lg:flex flex-col gap-6 sticky top-16 font-label-code text-label-code">
						
						<div class="p-4 rounded-xl bg-surface-container-low border border-outline-variant/40 flex flex-col gap-3">
							<span class="font-label-meta text-[10px] text-outline uppercase tracking-wider">Article Details</span>
							<div class="space-y-1.5 text-[12px]">
								<div class="flex justify-between">
									<span class="text-outline">Read Time:</span>
									<span class="text-on-surface"><?php echo esc_html( $read_time ); ?> min</span>
								</div>
								<div class="flex justify-between">
									<span class="text-outline">Category:</span>
									<span class="text-on-surface font-medium"><?php echo esc_html( $cat_name ); ?></span>
								</div>
								<div class="flex justify-between">
									<span class="text-outline">Published:</span>
									<span class="text-on-surface"><?php echo esc_html( get_the_date( 'M Y' ) ); ?></span>
								</div>
							</div>
						</div>

						<!-- Share Article -->
						<div class="p-4 rounded-xl bg-surface-container-low border border-outline-variant/40 flex flex-col gap-3">
							<span class="font-label-meta text-[10px] text-outline uppercase tracking-wider">Share Article</span>
							<div class="flex items-center gap-2">
								<a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode( get_the_title() ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="p-2 rounded bg-surface-container text-on-surface hover:text-primary transition-colors" title="Share on Twitter / X">
									<span class="material-symbols-outlined text-[16px]">share</span>
								</a>
								<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="p-2 rounded bg-surface-container text-on-surface hover:text-primary transition-colors" title="Share on LinkedIn">
									<span class="material-symbols-outlined text-[16px]">link</span>
								</a>
								<button type="button" data-copy-email="<?php echo esc_url( get_permalink() ); ?>" class="p-2 rounded bg-surface-container text-on-surface hover:text-primary transition-colors" title="Copy Article URL">
									<span class="material-symbols-outlined text-[16px]">content_copy</span>
								</button>
							</div>
						</div>

					</aside>

					<!-- Center Article Content -->
					<article class="lg:col-span-9 max-w-3xl">
						
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="mb-8 rounded-2xl overflow-hidden border border-outline-variant/50 shadow-sm aspect-[16/9]">
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
							</div>
						<?php endif; ?>

						<!-- Prose Typography -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div>

						<!-- Tags Lockup -->
						<?php
						$tags = get_the_tags();
						if ( $tags ) :
							?>
							<div class="pt-8 mt-10 border-t border-surface-container flex flex-wrap items-center gap-2 font-label-code text-[12px]">
								<span class="text-outline uppercase text-[11px]">Tags:</span>
								<?php foreach ( $tags as $t ) : ?>
									<span class="px-2.5 py-1 rounded bg-surface-container text-on-surface">#<?php echo esc_html( $t->name ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<!-- Previous / Next Navigation Loop -->
						<?php
						$prev_post = get_previous_post();
						$next_post = get_next_post();
						if ( $prev_post || $next_post ) :
							?>
							<div class="my-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
								<?php if ( $prev_post ) : ?>
									<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs">
										<span class="font-label-code text-[11px] text-outline uppercase flex items-center gap-1 group-hover:text-primary-container transition-colors">
											<span class="material-symbols-outlined text-[14px]">arrow_back</span>
											<span>Previous Dispatch</span>
										</span>
										<h4 class="font-display text-base font-semibold text-on-surface group-hover:text-primary-container transition-colors mt-2 line-clamp-2">
											<?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
										</h4>
										<span class="font-label-code text-[11px] text-outline mt-3">
											<?php echo esc_html( get_the_date( 'M j, Y', $prev_post->ID ) ); ?>
										</span>
									</a>
								<?php else : ?>
									<div class="hidden sm:block"></div>
								<?php endif; ?>

								<?php if ( $next_post ) : ?>
									<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs sm:text-right">
										<span class="font-label-code text-[11px] text-outline uppercase flex items-center gap-1 sm:justify-end group-hover:text-primary-container transition-colors">
											<span>Next Dispatch</span>
											<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
										</span>
										<h4 class="font-display text-base font-semibold text-on-surface group-hover:text-primary-container transition-colors mt-2 line-clamp-2">
											<?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
										</h4>
										<span class="font-label-code text-[11px] text-outline mt-3">
											<?php echo esc_html( get_the_date( 'M j, Y', $next_post->ID ) ); ?>
										</span>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<!-- Related Reading / Recommendations Section -->
						<?php
						$current_cat_ids = wp_get_post_categories( get_the_ID() );
						$related_query = new WP_Query(
							array(
								'category__in'        => $current_cat_ids,
								'post__not_in'        => array( get_the_ID() ),
								'posts_per_page'      => 2,
								'post_status'         => 'publish',
								'no_found_rows'       => true,
								'ignore_sticky_posts' => true,
							)
						);
						if ( ! $related_query->have_posts() ) {
							$related_query = new WP_Query(
								array(
									'post__not_in'        => array( get_the_ID() ),
									'posts_per_page'      => 2,
									'post_status'         => 'publish',
									'no_found_rows'       => true,
									'ignore_sticky_posts' => true,
								)
							);
						}
						if ( $related_query->have_posts() ) :
							?>
							<div class="pt-8 my-10 border-t border-surface-container">
								<div class="flex items-center justify-between mb-5">
									<h3 class="font-display text-lg text-on-surface font-semibold">
										More Articles to Explore
									</h3>
									<a href="<?php echo esc_url( $articles_url ); ?>" class="font-label-code text-[11.5px] text-outline hover:text-primary-container transition-colors flex items-center gap-1">
										<span>All Articles</span>
										<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
									</a>
								</div>
								<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
									<?php
									while ( $related_query->have_posts() ) :
										$related_query->the_post();
										$rel_cats = get_the_category();
										$rel_cat  = ! empty( $rel_cats ) ? $rel_cats[0]->name : 'Engineering';
										$rel_time = stitch_get_reading_time( get_the_ID() );
										?>
										<a href="<?php the_permalink(); ?>" class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/40 hover:border-outline-variant/80 transition-all flex flex-col justify-between group shadow-xs">
											<div>
												<div class="flex items-center justify-between font-label-code text-[10.5px] text-outline mb-2">
													<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface font-medium"><?php echo esc_html( $rel_cat ); ?></span>
													<span><?php echo esc_html( $rel_time ); ?> MIN READ</span>
												</div>
												<h4 class="font-display text-base text-on-surface font-medium group-hover:text-primary-container transition-colors line-clamp-2 leading-snug">
													<?php the_title(); ?>
												</h4>
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
									?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Cross-Link to Contributions & Badges -->
						<div class="my-10 p-6 rounded-2xl bg-surface-container-low border border-outline-variant/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-xs">
							<div class="flex items-center gap-3.5">
								<div class="w-10 h-10 rounded-xl bg-primary-container/10 border border-primary-container/20 text-primary-container flex items-center justify-center shrink-0">
									<span class="material-symbols-outlined text-[20px]">verified</span>
								</div>
								<div>
									<h4 class="font-display text-[15px] font-semibold text-on-surface">Curious about Rashed's open-source work?</h4>
									<p class="font-body-sm text-[12.5px] text-on-surface-variant">Explore 11 verified WordPress.org badges, upstream PRs, and core releases.</p>
								</div>
							</div>
							<a href="<?php echo esc_url( home_url( '/contributions/' ) ); ?>" class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-on-surface text-surface hover:bg-primary-container hover:text-on-primary font-body-sm text-[12px] font-semibold transition-all">
								<span>View Badges &amp; Code</span>
								<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
							</a>
						</div>

						<!-- Author Bio Box -->
						<div class="my-12 p-6 md:p-8 rounded-2xl bg-surface-container-low border border-outline-variant/40 flex flex-col sm:flex-row items-start sm:items-center gap-6 shadow-sm">
							<div class="w-16 h-16 rounded-full overflow-hidden shrink-0 bg-primary border-2 border-surface-container-lowest">
								<picture>
									<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.webp' ); ?>" type="image/webp">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rashed-hossain.jpg' ); ?>" alt="Rashed Hossain" class="w-full h-full object-cover object-top" width="64" height="64" loading="lazy" decoding="async">
								</picture>
							</div>
							<div class="flex flex-col gap-1">
								<span class="font-label-meta text-[11px] text-primary-container uppercase tracking-wider font-semibold">About Rashed</span>
								<h3 class="font-headline-sm text-headline-sm text-on-surface">Rashed Hossain</h3>
								<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
									Tech Support Lead, Software Engineer, and WordPress Core Contributor. Writing about software architecture, AI automation, and open-source systems at global scale.
								</p>
							</div>
						</div>

						<!-- Comments -->
						<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					</article>

				</div>
			</div>

		<?php endwhile; ?>

	</div>
</main>

<?php
get_footer();
