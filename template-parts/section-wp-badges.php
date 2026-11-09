<?php
/**
 * Template Part: WordPress.org Contribution Badges Section
 *
 * Displays the 11 verified WordPress.org community badges earned by Rashed Hossain (@wprashed),
 * featuring the exact authentic WordPress.org badge icons, colors, and year stamps.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_bg = ! empty( $args['bg'] ) ? $args['bg'] : 'bg-surface-container-low/30';
$wporg_url  = get_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );

$wp_badges = array(
	array(
		'id'          => 'core-ai',
		'title'       => 'Core AI Contributor',
		'team'        => 'Code & AI',
		'year'        => "'26",
		'color'       => '#7b2cbf',
		'border_tw'   => 'border-[#7b2cbf]/70 dark:border-[#a855f7]/70',
		'text_tw'     => 'text-[#7b2cbf] dark:text-[#a855f7]',
		'bg_tw'       => 'bg-[#7b2cbf]/10 dark:bg-[#a855f7]/15',
		'description' => 'Authoring AI translation tools and guidelines integration on WordPress/ai.',
		// Monitor with sparkles / stars AI icon
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line><path d="M12 7l1 2 2 1-2 1-1 2-1-2-2-1 2-1z" fill="currentColor"></path><circle cx="6.5" cy="7.5" r="0.75" fill="currentColor"></circle><circle cx="17.5" cy="12.5" r="0.75" fill="currentColor"></circle></svg>',
	),
	array(
		'id'          => 'core',
		'title'       => 'Core Contributor',
		'team'        => 'Core Software',
		'year'        => "'25",
		'color'       => '#d63638',
		'border_tw'   => 'border-[#d63638]/70 dark:border-[#f87171]/70',
		'text_tw'     => 'text-[#d63638] dark:text-[#f87171]',
		'bg_tw'       => 'bg-[#d63638]/10 dark:bg-[#f87171]/15',
		'description' => 'Contributing patches, bug fixes, and performance improvements to WordPress Core.',
		// Code brackets <>
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
	),
	array(
		'id'          => 'meta',
		'title'       => 'Meta Contributor',
		'team'        => 'Infrastructure',
		'year'        => "'26",
		'color'       => '#50575e',
		'border_tw'   => 'border-[#50575e]/70 dark:border-[#94a3b8]/70',
		'text_tw'     => 'text-[#50575e] dark:text-[#94a3b8]',
		'bg_tw'       => 'bg-[#50575e]/10 dark:bg-[#94a3b8]/15',
		'description' => 'Maintaining upstream subsystems across WordPress Meta and WordPress.tv.',
		// Hierarchy / Sitemap tree nodes
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="3" width="6" height="4" rx="1"></rect><rect x="2" y="17" width="5" height="4" rx="1"></rect><rect x="9.5" y="17" width="5" height="4" rx="1"></rect><rect x="17" y="17" width="5" height="4" rx="1"></rect><path d="M12 7v5M4.5 17v-3h15v3M12 12v5"></path></svg>',
	),
	array(
		'id'          => 'patterns',
		'title'       => 'Pattern Author',
		'team'        => 'Design & Editor',
		'year'        => "'26",
		'color'       => '#503291',
		'border_tw'   => 'border-[#503291]/70 dark:border-[#818cf8]/70',
		'text_tw'     => 'text-[#503291] dark:text-[#818cf8]',
		'bg_tw'       => 'bg-[#503291]/10 dark:bg-[#818cf8]/15',
		'description' => 'Publishing curated Gutenberg block patterns in the official WordPress directory.',
		// Block layout pattern grid
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="12" x2="21" y2="12"></line><line x1="12" y1="12" x2="12" y2="21"></line></svg>',
	),
	array(
		'id'          => 'plugins',
		'title'       => 'Plugin Developer',
		'team'        => 'Ecosystem',
		'year'        => 'Active',
		'color'       => '#d94f00',
		'border_tw'   => 'border-[#d94f00]/70 dark:border-[#fb923c]/70',
		'text_tw'     => 'text-[#d94f00] dark:text-[#fb923c]',
		'bg_tw'       => 'bg-[#d94f00]/10 dark:bg-[#fb923c]/15',
		'description' => 'Developing and maintaining public plugins on the WordPress.org Plugin Directory.',
		// Power plug / extension
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M8 2v4M16 2v4"></path><rect x="5" y="6" width="14" height="7" rx="2"></rect><path d="M12 13v7M9 20h6"></path></svg>',
	),
	array(
		'id'          => 'photo',
		'title'       => 'Photo Contributor',
		'team'        => 'Media',
		'year'        => "'24",
		'color'       => '#bc2385',
		'border_tw'   => 'border-[#bc2385]/70 dark:border-[#ec4899]/70',
		'text_tw'     => 'text-[#bc2385] dark:text-[#ec4899]',
		'bg_tw'       => 'bg-[#bc2385]/10 dark:bg-[#ec4899]/15',
		'description' => 'Contributing CC0 open-source photography to the official Photo Directory.',
		// Camera
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>',
	),
	array(
		'id'          => 'wc-organizer',
		'title'       => 'WordCamp Organizer',
		'team'        => 'Community',
		'year'        => "'26",
		'color'       => '#d97706',
		'border_tw'   => 'border-[#d97706]/70 dark:border-[#fbbf24]/70',
		'text_tw'     => 'text-[#d97706] dark:text-[#fbbf24]',
		'bg_tw'       => 'bg-[#d97706]/10 dark:bg-[#fbbf24]/15',
		'description' => 'Organizing WordCamp Nepal 2027 and Campus Connect Presidency University.',
		// WordCamp ticket badge
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"></path><line x1="12" y1="5" x2="12" y2="19" stroke-dasharray="2 2"></line></svg>',
	),
	array(
		'id'          => 'wc-speaker',
		'title'       => 'WordCamp Speaker',
		'team'        => 'Community',
		'year'        => "'25",
		'color'       => '#d97706',
		'border_tw'   => 'border-[#d97706]/70 dark:border-[#fbbf24]/70',
		'text_tw'     => 'text-[#d97706] dark:text-[#fbbf24]',
		'bg_tw'       => 'bg-[#d97706]/10 dark:bg-[#fbbf24]/15',
		'description' => 'Speaking at WordCamp Rajshahi, WordCamp Nepal, and university sessions.',
		// Megaphone
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v3a1 1 0 0 0 1 1h2l5 4V5L6 9H4a1 1 0 0 0-1 1z"></path><path d="M15 9a4 4 0 0 1 0 6"></path><path d="M18 6a8 8 0 0 1 0 12"></path></svg>',
	),
	array(
		'id'          => 'support',
		'title'       => 'Support Contributor',
		'team'        => 'Support & Docs',
		'year'        => "'26",
		'color'       => '#0085ba',
		'border_tw'   => 'border-[#0085ba]/70 dark:border-[#38bdf8]/70',
		'text_tw'     => 'text-[#0085ba] dark:text-[#38bdf8]',
		'bg_tw'       => 'bg-[#0085ba]/10 dark:bg-[#38bdf8]/15',
		'description' => 'Assisting users and developers on official WordPress.org support forums.',
		// Double chat speech bubbles
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><circle cx="9" cy="10" r="1" fill="currentColor"></circle><circle cx="15" cy="10" r="1" fill="currentColor"></circle></svg>',
	),
	array(
		'id'          => 'translation',
		'title'       => 'Translation Contributor',
		'team'        => 'Polyglots',
		'year'        => "'24",
		'color'       => '#9b1364',
		'border_tw'   => 'border-[#9b1364]/70 dark:border-[#f472b6]/70',
		'text_tw'     => 'text-[#9b1364] dark:text-[#f472b6]',
		'bg_tw'       => 'bg-[#9b1364]/10 dark:bg-[#f472b6]/15',
		'description' => 'Translating core software, themes, and plugins for Bengali speakers.',
		// Translation A 文
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 8l6 12M11 8L5 20M3 16h8"></path><path d="M14 4h7M17.5 4v4M15 12c1 3 3 5 6 6M21 12c-1.5 2-3.5 3.5-5.5 4.5"></path></svg>',
	),
	array(
		'id'          => 'translation-editor',
		'title'       => 'Translation Editor',
		'team'        => 'Polyglots',
		'year'        => "'25",
		'color'       => '#9b1364',
		'border_tw'   => 'border-[#9b1364]/70 dark:border-[#f472b6]/70',
		'text_tw'     => 'text-[#9b1364] dark:text-[#f472b6]',
		'bg_tw'       => 'bg-[#9b1364]/10 dark:bg-[#f472b6]/15',
		'description' => 'Project Translation Editor (PTE) validating and approving localized strings.',
		// Translation A 文 with pen / check
		'icon_svg'    => '<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7l5 10M9 7L4 17M2 14h7"></path><path d="M13 4h7M16.5 4v4M14 11c1 2.5 2.5 4 5 5"></path><path d="M16 19l4-4 2 2-4 4H16v-2z" fill="currentColor"></path></svg>',
	),
);
?>

<section class="relative px-6 md:px-12 py-12 <?php echo esc_attr( $section_bg ); ?> border-b border-surface-container-high/60">
	<div class="max-w-5xl flex flex-col gap-8">
		
		<!-- Header -->
		<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
			<div>
				<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40 mb-3">
					<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
					<span>Official Recognition</span>
				</div>
				<h2 class="font-display text-2xl sm:text-3xl text-on-surface font-normal">
					WordPress.org Contribution Badges
				</h2>
				<p class="font-body-sm text-[13.5px] text-on-surface-variant mt-1 max-w-2xl leading-relaxed">
					11 official community badges awarded to Rashed Hossain across WordPress Core, AI, Polyglots, Community, Support, and Media.
				</p>
			</div>

			<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface font-label-code text-[11.5px] border border-outline-variant/40 transition-all group">
				<span>profiles.wordpress.org/wprashed</span>
				<span class="material-symbols-outlined text-[15px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">north_east</span>
			</a>
		</div>

		<!-- Badges Editorial Detail Cards Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
			<?php foreach ( $wp_badges as $badge ) : ?>
				<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="relative p-4 sm:p-5 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 hover:border-outline-variant/80 transition-all duration-200 shadow-xs flex flex-col justify-between group">
					
					<!-- Top Strip: Icon & Year -->
					<div>
						<div class="flex items-center justify-between mb-3">
							<div class="w-9 h-9 rounded-xl flex items-center justify-center border <?php echo esc_attr( $badge['border_tw'] . ' ' . $badge['text_tw'] . ' ' . $badge['bg_tw'] ); ?>">
								<?php echo $badge['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
							<span class="font-label-code text-[10.5px] px-2 py-0.5 rounded-full bg-surface-container text-on-surface font-medium border border-outline-variant/30">
								<?php echo esc_html( $badge['year'] ); ?>
							</span>
						</div>

						<!-- Badge Title -->
						<h3 class="font-display text-[16px] sm:text-[17px] text-on-surface font-normal group-hover:text-primary-container transition-colors mb-1">
							<?php echo esc_html( $badge['title'] ); ?>
						</h3>

						<!-- Short Narrative -->
						<p class="font-body-sm text-[12px] text-on-surface-variant leading-relaxed">
							<?php echo esc_html( $badge['description'] ); ?>
						</p>
					</div>

					<!-- Bottom Category Meta -->
					<div class="pt-3 mt-3 border-t border-surface-container-high/50 flex items-center justify-between font-label-code text-[11px] text-outline">
						<span><?php echo esc_html( $badge['team'] ); ?></span>
						<span class="text-on-surface-variant group-hover:text-primary-container transition-colors flex items-center gap-0.5">
							<span>WP.org</span>
							<span class="material-symbols-outlined text-[12px]">north_east</span>
						</span>
					</div>

				</a>
			<?php endforeach; ?>
		</div>

	</div>
</section>
