<?php
/**
 * The template for displaying the Articles & Notes index (blog archive).
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Get counts
$total_posts = wp_count_posts()->publish;
$categories  = get_categories( array( 'hide_empty' => true ) );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<!-- SECTION 1: MASTHEAD -->
		<section class="relative px-6 md:px-12 pt-12 pb-10 bg-surface-container-lowest border-b border-surface-container-high/60">
			<div class="flex flex-col gap-5 max-w-5xl mx-auto">
				
				<div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container text-on-surface font-label-meta text-[11px] uppercase tracking-widest self-start rounded-full border border-outline-variant/40 shadow-xs">
					<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
					<span>Writing &amp; Notes</span>
				</div>

				<h1 class="font-display text-[40px] sm:text-[50px] lg:text-[56px] text-on-surface tracking-[-0.025em] leading-[1.08] font-normal">
					Thoughts on systems, open source, and building for the web.
				</h1>

				<div class="flex flex-wrap items-center gap-3 pt-1 font-label-code text-[12px] text-on-surface-variant">
					<span class="inline-flex items-center gap-1.5 text-on-surface font-medium">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
						<span><?php echo esc_html( $total_posts ); ?> Articles</span>
					</span>
					<span class="text-outline-variant">/</span>
					<span>Lessons &amp; notes from 10+ years of engineering</span>
					<span class="text-outline-variant">/</span>
					<span class="text-on-surface-variant font-medium">Filter by topic</span>
				</div>

			</div>
		</section>

		<!-- SECTION 2: COMMAND-K SEARCH & TAXONOMY FILTER TOOLBAR -->
		<section class="sticky top-0 z-30 px-6 md:px-12 py-2.5 bg-surface-container-lowest/95 backdrop-blur-md border-b border-surface-container-high/80 transition-all duration-200">
			<div class="max-w-5xl mx-auto flex flex-col gap-2.5">
				
				<!-- Row 1: Status Ledger & Search Input -->
				<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
					
					<!-- Left: Ledger Status & Active Filter Badge -->
					<div class="flex items-center gap-2 font-label-code text-[11.5px] text-on-surface-variant min-h-[28px]">
						<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold uppercase tracking-wider text-[10.5px]">
							<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
							<span>Dispatches</span>
						</span>
						<span class="text-outline-variant">/</span>
						<div id="filter-active-status" class="flex items-center gap-2 text-outline">
							<span id="filter-status-text">Showing all <?php echo esc_html( $total_posts ); ?> articles</span>
							<button type="button" id="filter-reset-btn" class="hidden items-center gap-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary hover:bg-primary/20 text-[10.5px] font-semibold transition-colors cursor-pointer" title="Reset all filters">
								<span>Clear</span>
								<span class="material-symbols-outlined text-[12px]">close</span>
							</button>
						</div>
					</div>

					<!-- Right: Instant Search Input with Clear Button & ⌘K -->
					<div class="relative w-full sm:w-72 lg:w-80 shrink-0">
						<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
							<span class="material-symbols-outlined text-[17px]">search</span>
						</div>
						<input type="text" id="archive-search" placeholder="Search by title, tag or keyword..." class="w-full pl-9 pr-16 py-1.5 bg-surface-container-low hover:bg-surface-container/70 text-on-surface font-body-sm text-[13px] rounded-full focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-on-surface placeholder:text-outline/70 transition-all border border-outline-variant/40">
						
						<!-- Clear Query Button (Hidden when empty) -->
						<button type="button" id="search-clear-btn" class="hidden absolute inset-y-0 right-11 my-auto w-4 h-4 rounded-full bg-outline-variant/60 hover:bg-outline text-surface items-center justify-center transition-colors cursor-pointer" title="Clear search">
							<span class="material-symbols-outlined text-[11px]">close</span>
						</button>

						<div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none">
							<kbd class="font-label-code text-[9.5px] px-1.5 py-0.5 rounded-full bg-surface-container text-on-surface-variant border border-outline-variant/30 font-medium">⌘K</kbd>
						</div>
					</div>

				</div>

				<!-- Row 2: Full-Width Topic Carousel with Navigation Chevrons & Edge Fades -->
				<div class="relative w-full flex items-center">
					
					<!-- Left Scroll Arrow -->
					<button type="button" id="carousel-prev" class="hidden sm:flex absolute -left-3 z-10 w-7 h-7 rounded-full bg-surface-container-lowest/95 hover:bg-surface-container text-on-surface border border-outline-variant/60 shadow-md items-center justify-center transition-all opacity-0 pointer-events-none data-[visible=true]:opacity-100 data-[visible=true]:pointer-events-auto active:scale-95 cursor-pointer" aria-label="Scroll left">
						<span class="material-symbols-outlined text-[16px]">chevron_left</span>
					</button>

					<!-- Left Gradient Mask -->
					<div id="carousel-fade-left" class="pointer-events-none absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-surface-container-lowest to-transparent z-[5] opacity-0 transition-opacity duration-200"></div>

					<!-- Scrollable Chips Track -->
					<div class="flex items-center gap-1.5 sm:gap-2 overflow-x-auto scrollbar-none no-scrollbar py-1 w-full scroll-smooth select-none px-0.5" id="category-filters">
						<button type="button" class="filter-pill active shrink-0 px-3.5 py-1.5 rounded-full bg-on-surface text-surface font-label-code text-[12px] transition-all duration-150 shadow-xs flex items-center gap-1.5 cursor-pointer font-medium border border-transparent whitespace-nowrap" data-cat="all">
							<span>All</span>
							<span class="text-[10px] opacity-75 font-mono">(<?php echo esc_html( $total_posts ); ?>)</span>
						</button>

						<?php foreach ( $categories as $cat ) : ?>
							<button type="button" class="filter-pill shrink-0 px-3.5 py-1.5 rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-code text-[12px] transition-all duration-150 flex items-center gap-1.5 border border-outline-variant/40 hover:border-outline-variant/70 cursor-pointer font-medium whitespace-nowrap" data-cat="<?php echo esc_attr( $cat->slug ); ?>">
								<span><?php echo esc_html( $cat->name ); ?></span>
								<span class="text-[10px] text-outline font-mono">(<?php echo esc_html( $cat->count ); ?>)</span>
							</button>
						<?php endforeach; ?>
					</div>

					<!-- Right Gradient Mask -->
					<div id="carousel-fade-right" class="pointer-events-none absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-surface-container-lowest to-transparent z-[5] opacity-0 transition-opacity duration-200"></div>

					<!-- Right Scroll Arrow -->
					<button type="button" id="carousel-next" class="hidden sm:flex absolute -right-3 z-10 w-7 h-7 rounded-full bg-surface-container-lowest/95 hover:bg-surface-container text-on-surface border border-outline-variant/60 shadow-md items-center justify-center transition-all opacity-0 pointer-events-none data-[visible=true]:opacity-100 data-[visible=true]:pointer-events-auto active:scale-95 cursor-pointer" aria-label="Scroll right">
						<span class="material-symbols-outlined text-[16px]">chevron_right</span>
					</button>

				</div>

			</div>
		</section>

		<!-- SECTION 3: FEATURED DISPATCH LEAD COVER STORY -->
		<?php
		$featured_query = new WP_Query(
			array(
				'posts_per_page'      => 1,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => false,
				'no_found_rows'       => true,
			)
		);
		$featured_id = 0;
		if ( $featured_query->have_posts() ) :
			while ( $featured_query->have_posts() ) :
				$featured_query->the_post();
				$featured_id   = get_the_ID();
				$feat_cats     = get_the_category();
				$feat_cat_name = ! empty( $feat_cats ) ? $feat_cats[0]->name : 'Core Architecture';
				$feat_time     = stitch_get_reading_time( $featured_id );
				?>
				<section id="featured-lead-section" class="px-6 md:px-12 py-10 bg-surface-container-low/40 border-b border-surface-container-high/60">
					<div class="max-w-5xl mx-auto relative bg-surface-container-lowest rounded-3xl shadow-xs hover:border-outline-variant/80 transition-all duration-300 overflow-hidden border border-outline-variant/50 group">
						
						<!-- Architectural registration crosshairs -->
						<span class="absolute top-3 left-3 font-mono text-[11px] text-outline-variant pointer-events-none select-none">+</span>
						<span class="absolute top-3 right-3 font-mono text-[11px] text-outline-variant pointer-events-none select-none">+</span>
						<span class="absolute bottom-3 left-3 font-mono text-[11px] text-outline-variant pointer-events-none select-none">+</span>
						<span class="absolute bottom-3 right-3 font-mono text-[11px] text-outline-variant pointer-events-none select-none">+</span>

						<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 p-6 sm:p-8 lg:p-10 items-center">
							
							<!-- Left Column: Essay Meta, Title & Excerpt -->
							<div class="lg:col-span-7 flex flex-col justify-between">
								<div>
									<!-- Eyebrow Meta Strip -->
									<div class="flex flex-wrap items-center gap-2 mb-3.5 font-label-code text-[11px]">
										<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary/10 text-primary uppercase tracking-wider font-semibold">
											<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
											<span>Featured Dispatch</span>
										</span>
										<span class="text-outline-variant">&bull;</span>
										<span class="text-on-surface-variant font-medium"><?php echo esc_html( $feat_cat_name ); ?></span>
										<span class="text-outline-variant">&bull;</span>
										<span class="text-outline"><?php echo esc_html( $feat_time ); ?> MIN READ</span>
									</div>

									<!-- Headline -->
									<h2 class="font-display text-[26px] sm:text-[32px] lg:text-[36px] text-on-surface mb-3.5 leading-[1.2] tracking-[-0.02em] font-normal group-hover:text-primary transition-colors">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>

									<!-- Excerpt -->
									<p class="font-body-md text-[14.5px] sm:text-[15.5px] text-on-surface-variant mb-6 leading-relaxed line-clamp-3">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '...' ) ); ?>
									</p>
								</div>

								<!-- Author Byline & Action Button -->
								<div class="pt-5 border-t border-surface-container flex flex-wrap items-center justify-between gap-4 font-label-code text-label-code">
									<div class="flex items-center gap-3">
										<div class="w-8 h-8 rounded-full overflow-hidden bg-primary shrink-0 ring-1 ring-outline-variant/40">
											<img src="<?php echo esc_url( stitch_get_hero_avatar() ); ?>" alt="Rashed Hossain" class="w-full h-full object-cover object-top" width="32" height="32" loading="lazy" decoding="async">
										</div>
										<div class="flex flex-col text-left">
											<span class="font-body-sm text-[13px] text-on-surface font-semibold">Rashed Hossain</span>
											<span class="font-label-meta text-[10.5px] text-outline uppercase tracking-wider"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?> &bull; Engineering</span>
										</div>
									</div>

									<a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-on-surface text-surface hover:bg-primary hover:text-white transition-all duration-300 font-label-code text-[12px] font-semibold shadow-xs group-hover:translate-x-0.5">
										<span>Read Article</span>
										<span class="material-symbols-outlined text-[15px]">arrow_outward</span>
									</a>
								</div>
							</div>

							<!-- Right Column: Framed Editorial Artwork or Quotation Plate -->
							<div class="lg:col-span-5 flex flex-col justify-center">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" class="group/thumb block relative w-full aspect-[16/10] rounded-2xl overflow-hidden bg-surface-container shadow-sm border border-outline-variant/40 hover:border-outline-variant/80 transition-all duration-300">
										<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover object-center transition-transform duration-500 group-hover/thumb:scale-[1.03] group-hover:scale-[1.03]' ) ); ?>
										<div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60 group-hover/thumb:opacity-40 transition-opacity pointer-events-none"></div>
										<div class="absolute bottom-3 left-3 right-3 flex items-center justify-between pointer-events-none">
											<span class="px-2.5 py-1 rounded-md bg-surface/90 dark:bg-surface-container-highest/90 backdrop-blur-md font-label-code text-[10.5px] text-on-surface font-medium border border-outline-variant/30 uppercase tracking-wider shadow-xs">
												<?php echo esc_html( $feat_cat_name ); ?>
											</span>
											<span class="w-7 h-7 rounded-full bg-white/95 text-on-surface flex items-center justify-center shadow-xs">
												<span class="material-symbols-outlined text-[15px]">arrow_outward</span>
											</span>
										</div>
									</a>
								<?php else : ?>
									<!-- Minimalist Architectural Quotation Plate (Replaces duplicate portrait photo) -->
									<div class="relative w-full bg-surface-container-low/90 rounded-2xl p-6 sm:p-8 border border-outline-variant/40 flex flex-col justify-between shadow-xs">
										<div class="flex items-center justify-between mb-4 font-label-code text-[11px] text-outline">
											<span class="flex items-center gap-1.5 text-primary font-semibold">
												<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
												<span>CORE INSIGHT</span>
											</span>
											<span>WORDCAMP // 2026</span>
										</div>
										<blockquote class="font-display text-[20px] sm:text-[22px] text-on-surface leading-snug italic font-normal my-2">
											&ldquo;Newcomers are eager to contribute; the barrier is intimidation, not ability. Structure the table, lower the friction, and watch them ship.&rdquo;
										</blockquote>
										<div class="pt-4 mt-4 border-t border-surface-container flex items-center justify-between font-label-meta text-[10.5px] text-outline uppercase tracking-wider">
											<span>WordCamp Nepal &bull; Rajshahi</span>
											<span class="text-primary font-semibold">Table Lead</span>
										</div>
									</div>
								<?php endif; ?>
							</div>

						</div>
					</div>
				</section>
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>

		<!-- SECTION 4: POSTS GRID -->
		<section class="px-6 md:px-12 py-12 bg-surface-container-lowest">
			<div class="max-w-5xl mx-auto flex flex-col gap-8">
				
				<div class="flex items-center justify-between border-b border-surface-container-high/60 pb-3">
					<span class="font-label-meta text-[11px] uppercase tracking-widest text-outline font-medium">
						All Articles
					</span>
					<span class="font-label-code text-[11px] text-on-surface-variant">
						Latest First
					</span>
				</div>

				<!-- Grid Container -->
				<div id="articles-grid-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					
					<?php
					$card_counter = 1;
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							$post_id     = get_the_ID();
							$is_lead     = ( ! is_paged() && $post_id === $featured_id );
							$cats        = get_the_category();
							$cat_slugs   = ! empty( $cats ) ? wp_list_pluck( $cats, 'slug' ) : array();
							$cat_name    = ! empty( $cats ) ? $cats[0]->name : 'Engineering';
							$read_time   = stitch_get_reading_time( $post_id );
							$post_tags   = get_the_tags();
							$tag_names   = $post_tags ? implode( ', ', wp_list_pluck( $post_tags, 'name' ) ) : '';
							$card_num    = sprintf( '%02d', $card_counter++ );
							?>
							<article class="article-dispatch-card bg-surface-container-low/70 hover:bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all duration-200 shadow-xs flex flex-col justify-between group relative <?php echo $is_lead ? 'hidden' : ''; ?>"
								data-title="<?php echo esc_attr( get_the_title() ); ?>"
								data-excerpt="<?php echo esc_attr( get_the_excerpt() ); ?>"
								data-tags="<?php echo esc_attr( $tag_names ); ?>"
								data-category="<?php echo esc_attr( implode( ' ', $cat_slugs ) ); ?>"
								<?php if ( $is_lead ) : ?>data-featured-lead="true"<?php endif; ?>>
								
								<!-- Corner registration mark -->
								<span class="absolute top-2.5 right-3 font-mono text-[10px] text-outline-variant/60 pointer-events-none select-none">+</span>

								<div class="flex flex-col gap-3">
									<div class="flex items-center justify-between font-label-code text-[11px] text-on-surface-variant">
										<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-medium"><?php echo esc_html( $cat_name ); ?></span>
										<span class="text-outline"><?php echo esc_html( $read_time ); ?> MIN READ</span>
									</div>
									<h2 class="font-headline-sm text-[20px] text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug font-semibold pt-1">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
									<p class="font-body-sm text-[13px] text-on-surface-variant line-clamp-3 leading-relaxed">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?>
									</p>
								</div>

								<div class="pt-4 mt-5 border-t border-surface-container flex items-center justify-between font-label-meta text-[11px] text-outline">
									<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
									<a href="<?php the_permalink(); ?>" class="text-primary font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
										<span>Read Article</span>
										<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
									</a>
								</div>

							</article>
							<?php
						endwhile;
					else :
						?>
						<div class="col-span-full py-16 text-center text-on-surface-variant font-label-code">
							<span class="material-symbols-outlined text-[36px] text-outline mb-2">article</span>
							<p>No articles found in this category.</p>
						</div>
						<?php
					endif;
					?>

				</div>

				<!-- Hidden No Results State -->
				<div id="no-articles-found" class="hidden py-16 text-center text-on-surface-variant font-label-code">
					<span class="material-symbols-outlined text-[36px] text-outline mb-2">search_off</span>
					<p>No articles matched your search.</p>
					<button type="button" onclick="document.getElementById('archive-search').value=''; document.querySelector('.filter-pill[data-cat=\'all\']').click();" class="mt-3 px-4 py-1.5 rounded-full bg-surface-container text-primary font-semibold hover:bg-surface-container-high transition-colors">
						Reset Filter
					</button>
				</div>

				<!-- Pagination -->
				<div class="pt-8 mt-6 border-t border-surface-container-high/60 w-full">
					<?php
					the_posts_pagination(
						array(
							'mid_size'           => 2,
							'prev_text'          => '<span class="material-symbols-outlined text-[15px]">arrow_back</span> Newer',
							'next_text'          => 'Older <span class="material-symbols-outlined text-[15px]">arrow_forward</span>',
							'screen_reader_text' => __( 'Articles navigation', 'stitch-animated' ),
						)
					);
					?>
				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
