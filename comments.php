<?php
/**
 * Comments Template
 *
 * Provides a precision Swiss architectural discussion ledger
 * and responsive comment dispatch terminal.
 *
 * @package Rashed
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

<div id="comments" class="pt-12 mt-14 border-t border-surface-container-high/60 w-full">

	<?php if ( have_comments() ) : ?>
		<div class="flex items-center justify-between mb-8 pb-4 border-b border-surface-container-high/60">
			<div class="flex items-center gap-3">
				<div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
					<span class="material-symbols-outlined text-[20px]">forum</span>
				</div>
				<div>
					<h2 class="font-display text-[22px] sm:text-[24px] text-on-surface font-semibold tracking-tight m-0">
						Discussion Ledger
					</h2>
					<p class="font-mono text-[11px] text-outline mt-0.5">Peer notes, questions &amp; technical dispatches</p>
				</div>
			</div>
			<span class="font-mono text-[11px] px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-medium border border-outline-variant/40 shadow-2xs">
				<?php echo esc_html( sprintf( _n( '%s entry', '%s entries', $comment_count, 'rashed' ), number_format_i18n( $comment_count ) ) ); ?>
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

		<?php the_comments_navigation( array( 'class' => 'pagination my-8' ) ); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="p-4 rounded-2xl bg-surface-container-low border border-outline-variant/40 text-center font-mono text-[12px] text-outline mb-8">
			Discussion ledger is closed for this dispatch.
		</div>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<!-- Architectural Comment Dispatch Terminal -->
		<div class="relative p-6 sm:p-8 md:p-10 rounded-3xl bg-surface-container-low/70 dark:bg-surface-container-low/30 border border-outline-variant/50 shadow-xs overflow-hidden backdrop-blur-xs my-8">

			<!-- Corner Crosshairs -->
			<span class="absolute top-3.5 left-3.5 font-mono text-[11px] text-outline-variant/60 pointer-events-none select-none">+</span>
			<span class="absolute top-3.5 right-3.5 font-mono text-[11px] text-outline-variant/60 pointer-events-none select-none">+</span>
			<span class="absolute bottom-3.5 left-3.5 font-mono text-[11px] text-outline-variant/60 pointer-events-none select-none">+</span>
			<span class="absolute bottom-3.5 right-3.5 font-mono text-[11px] text-outline-variant/60 pointer-events-none select-none">+</span>

			<?php
			$fields = array(
				'author'  => '<div class="comment-form-author">
					<label for="author" class="block font-mono text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Name' . $html_req . '</label>
					<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="e.g. Elena Rostova" size="30" maxlength="245" autocomplete="name"' . $aria_req . ' class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/60 hover:border-outline-variant font-body text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-[14px]">
				</div>',

				'email'   => '<div class="comment-form-email">
					<label for="email" class="block font-mono text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Email' . $html_req . '</label>
					<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="e.g. elena@example.com" size="30" maxlength="100" autocomplete="email"' . $aria_req . ' class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/60 hover:border-outline-variant font-body text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-[14px]">
				</div>',

				'url'     => '<div class="comment-form-url">
					<label for="url" class="block font-mono text-[11px] text-outline mb-1.5 uppercase tracking-wider font-medium">Website</label>
					<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="https://... (optional)" size="30" maxlength="200" autocomplete="url" class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/60 hover:border-outline-variant font-body text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-[14px]">
				</div>',

				'cookies' => '<div class="comment-form-cookies-consent flex items-start gap-2.5 pt-1 col-span-full">
					<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . ( empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"' ) . ' class="mt-1 w-4 h-4 rounded border-outline-variant/60 text-primary focus:ring-primary/30 bg-surface-container-lowest cursor-pointer">
					<label for="wp-comment-cookies-consent" class="font-body text-[12.5px] text-on-surface-variant leading-snug cursor-pointer select-none">Save my name, email, and website in this browser for the next time I comment.</label>
				</div>',
			);

			comment_form(
				array(
					'title_reply_before'   => '<div class="flex items-center gap-2 mb-2"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span><span class="font-mono text-[11px] text-primary uppercase tracking-wider font-semibold">Public Dispatch Terminal</span></div><h3 id="reply-title" class="font-display text-[22px] sm:text-[26px] text-on-surface font-semibold tracking-tight m-0">',
					'title_reply_after'    => '</h3>',
					'comment_notes_before' => '<p class="comment-notes font-body text-[13px] text-outline mt-1 mb-6">Your email address will not be published. Plain text, Markdown formatting, and KaTeX mathematical notation supported. Required fields are marked <span class="text-error font-semibold">*</span></p>',
					'comment_notes_after'  => '',
					'class_form'           => 'comment-form flex flex-col gap-4.5',
					'comment_field'        => '<div class="comment-form-comment w-full">
						<div class="flex items-center justify-between mb-1.5">
							<label for="comment" class="block font-mono text-[11px] text-outline uppercase tracking-wider font-medium">Comment <span class="text-error font-semibold">*</span></label>
							<span class="font-mono text-[10.5px] text-outline/70 hidden sm:inline">Markdown &bull; KaTeX supported</span>
						</div>
						<textarea id="comment" name="comment" rows="5" required placeholder="Write your thoughts, observations, or feedback..." class="w-full px-4 py-3.5 rounded-2xl bg-surface-container-lowest border border-outline-variant/60 hover:border-outline-variant font-body text-on-surface placeholder:text-outline/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-[14.5px] leading-relaxed resize-y shadow-2xs"></textarea>
					</div>',
					'fields'               => $fields,
					'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full bg-on-surface text-surface hover:bg-primary hover:text-white transition-all duration-200 font-mono text-[12.5px] font-semibold tracking-wide shadow-xs hover:shadow-md cursor-pointer active:scale-98 group"><span>%4$s</span><span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 transition-transform">send</span></button>',
					'label_submit'         => __( 'Post Comment', 'rashed' ),
					'submit_field'         => '<div class="form-submit pt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4 col-span-full border-t border-surface-container-high/60 mt-2">%1$s <div class="flex items-center gap-2 font-mono text-[11px] text-outline"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span><span class="material-symbols-outlined text-[14px] text-emerald-500">lock</span><span>Delivered directly &bull; Public ledger</span></div>%2$s</div>',
				)
			);
			?>

		</div>
	<?php endif; ?>

</div>
