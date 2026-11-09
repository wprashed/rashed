<?php
/**
 * Comments Template
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<?php
/**
 * Comments Template
 *
 * Provides a clean, modern Swiss architectural discussion ledger
 * and responsive comment dispatch terminal.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}

$commenter     = wp_get_current_commenter();
$req           = get_option( 'require_name_email' );
$aria_req      = ( $req ? ' aria-required="true" required' : '' );
$html_req      = ( $req ? ' <span class="text-error font-semibold">*</span>' : '' );
$comment_count = get_comments_number();
?>

<div id="comments" class="pt-10 mt-12 border-t border-surface-container-high/60">

	<?php if ( have_comments() ) : ?>
		<div class="flex items-center justify-between mb-8 pb-3 border-b border-surface-container-high/60">
			<div class="flex items-center gap-2.5">
				<div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
					<span class="material-symbols-outlined text-[18px]">forum</span>
				</div>
				<h2 class="font-display text-[22px] sm:text-[24px] text-on-surface font-semibold tracking-tight m-0">
					Discussion &amp; Notes
				</h2>
			</div>
			<span class="font-label-code text-[11.5px] px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant font-medium border border-outline-variant/40">
				<?php echo esc_html( sprintf( _n( '%s entry', '%s entries', $comment_count, 'stitch-animated' ), number_format_i18n( $comment_count ) ) ); ?>
			</span>
		</div>

		<ol class="space-y-6 mb-12 list-none p-0 comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 44,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation( array( 'class' => 'pagination my-6' ) ); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="p-4 rounded-xl bg-surface-container-low border border-outline-variant/40 text-center font-label-code text-[12px] text-outline mb-8">
			Discussion ledger is closed for this dispatch.
		</div>
	<?php endif; ?>

	<?php
	// Architectural fields layout with clear, styled input boxes
	$fields = array(
		'author'  => '<div class="comment-form-author">
			<label for="author" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Name' . $html_req . '</label>
			<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="e.g. Elena Rostova" size="30" maxlength="245" autocomplete="name"' . $aria_req . ' class="w-full px-4 py-2.5 rounded-xl bg-surface-container-low border border-outline-variant/50 hover:border-outline-variant font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary focus:border-primary transition-all text-[14px]">
		</div>',

		'email'   => '<div class="comment-form-email">
			<label for="email" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Email' . $html_req . '</label>
			<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="e.g. elena@example.com" size="30" maxlength="100" autocomplete="email"' . $aria_req . ' class="w-full px-4 py-2.5 rounded-xl bg-surface-container-low border border-outline-variant/50 hover:border-outline-variant font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary focus:border-primary transition-all text-[14px]">
		</div>',

		'url'     => '<div class="comment-form-url">
			<label for="url" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Website</label>
			<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="https://..." size="30" maxlength="200" autocomplete="url" class="w-full px-4 py-2.5 rounded-xl bg-surface-container-low border border-outline-variant/50 hover:border-outline-variant font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary focus:border-primary transition-all text-[14px]">
		</div>',

		'cookies' => '<div class="comment-form-cookies-consent flex items-start gap-2.5 pt-1">
			<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . ( empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"' ) . ' class="mt-1 w-4 h-4 rounded border-outline-variant/60 text-primary focus:ring-primary/40 bg-surface-container-low cursor-pointer">
			<label for="wp-comment-cookies-consent" class="font-body-sm text-[12.5px] text-on-surface-variant leading-snug cursor-pointer select-none">Save my name, email, and website in this browser for the next time I comment.</label>
		</div>',
	);

	comment_form(
		array(
			'title_reply_before'   => '<div class="flex items-center gap-2 mb-2"><span class="w-2 h-2 rounded-full bg-primary-container inline-block"></span><h3 id="reply-title" class="font-display text-[22px] sm:text-[24px] text-on-surface font-semibold tracking-tight m-0">',
			'title_reply_after'    => '</h3></div>',
			'comment_notes_before' => '<p class="comment-notes font-body-sm text-[13px] text-outline mb-5">Your email address will not be published. Required fields are marked <span class="text-error font-semibold">*</span></p>',
			'comment_notes_after'  => '',
			'class_form'           => 'comment-form flex flex-col gap-4',
			'comment_field'        => '<div class="comment-form-comment">
				<label for="comment" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Comment <span class="text-error font-semibold">*</span></label>
				<textarea id="comment" name="comment" rows="5" required placeholder="Write your thoughts, feedback, or response..." class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/50 hover:border-outline-variant font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary focus:border-primary transition-all text-[14px] leading-relaxed resize-y"></textarea>
			</div>',
			'fields'               => $fields,
			'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-full bg-on-surface text-surface hover:bg-primary hover:text-white transition-all duration-200 font-label-code text-[12px] font-semibold shadow-xs cursor-pointer active:scale-98 group"><span>%4$s</span><span class="material-symbols-outlined text-[15px] group-hover:translate-x-0.5 transition-transform">send</span></button>',
			'submit_field'         => '<div class="form-submit pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-3">%1$s <span class="font-label-code text-[11px] text-outline flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-emerald-500">lock</span> Delivered directly &bull; Public ledger</span>%2$s</div>',
		)
	);
	?>

</div>
