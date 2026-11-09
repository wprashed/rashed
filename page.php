<?php
/**
 * Generic Page Template
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<header class="relative px-6 md:px-12 pt-10 pb-8 bg-surface-container-lowest border-b border-surface-container-high/60">
				<div class="max-w-4xl">
					<h1 class="font-display text-[36px] md:text-display text-on-surface tracking-tight leading-[1.1]">
						<?php the_title(); ?>
					</h1>
				</div>
			</header>

			<div class="px-6 md:px-12 py-10 bg-surface-container-lowest">
				<div class="max-w-3xl entry-content">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; ?>

	</div>
</main>

<?php
get_footer();
