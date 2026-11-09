<?php
/**
 * 404 Not Found Template
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0 flex items-center justify-center py-20 px-6">
	<div class="max-w-md w-full text-center flex flex-col items-center gap-5">
		
		<div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container text-on-surface font-label-meta text-label-meta uppercase tracking-wider -rotate-2 shadow-sm border border-outline-variant/40">
			<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
			<span>§ 404 // ROUTE DISCONNECTED</span>
		</div>

		<h1 class="font-display text-[48px] text-on-surface leading-tight tracking-tight">
			Node Not Found.
		</h1>

		<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
			The requested URL coordinate does not exist in the architectural index or has been migrated.
		</p>

		<div class="pt-3">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary-container text-on-primary font-body-sm font-semibold hover:bg-primary transition-all shadow-sm">
				<span class="material-symbols-outlined text-[18px]">home</span>
				<span>Reset to Home Coordinate</span>
			</a>
		</div>

	</div>
</main>

<?php
get_footer();
