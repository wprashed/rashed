<?php
/**
 * Template Name: Contact & Inquiries
 * Description: Precision architectural inquiry and transmission dispatch form saving form data on the website.
 *
 * @package StitchAnimated
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_email    = get_theme_mod( 'stitch_contact_email', 'wprashed@icloud.com' );
$wporg_url        = get_theme_mod( 'stitch_wporg_url', 'https://profiles.wordpress.org/wprashed/' );
$github_url       = get_theme_mod( 'stitch_github_url', 'https://github.com/wprashed' );
$linkedin_url     = get_theme_mod( 'stitch_linkedin_url', 'https://www.linkedin.com/in/wprashedh/' );
$facebook_url     = get_theme_mod( 'stitch_facebook_url', 'https://www.facebook.com/wprashedh/' );
$instagram_url    = get_theme_mod( 'stitch_instagram_url', 'https://www.instagram.com/wprashedh/' );
$pexels_url       = get_theme_mod( 'stitch_pexels_url', 'https://www.pexels.com/@rashed-hossain-1520582336/highlights/' );
$location_text    = get_theme_mod( 'stitch_location_text', 'Dhaka, Bangladesh' );
$contact_sla      = get_theme_mod( 'stitch_contact_sla', '< 24 Hours' );
$contact_headline = get_theme_mod( 'stitch_contact_headline', 'Have a project in mind, an open-source idea, or want to collaborate?' );
$contact_subtext  = get_theme_mod( 'stitch_contact_subtext', 'Send a note below, or reach out directly via email. I typically reply within one business day.' );
?>

<main class="relative z-10 flex-1 w-full bg-surface-container-lowest pt-0">
	<div class="flex flex-col w-full">

		<!-- SECTION 1: CONTACT MASTHEAD (AIRY SWISS ARCHITECTURAL HERO) -->
		<section class="relative px-6 md:px-12 pt-12 pb-12 overflow-hidden bg-surface-container-lowest border-b border-surface-container-high/60">
			<!-- Subtle Top Radial Glow -->
			<div class="pointer-events-none absolute -top-24 right-1/4 w-96 h-96 bg-primary/5 rounded-full blur-3xl opacity-60"></div>

			<div class="relative z-10 flex flex-col items-start gap-5 max-w-4xl mx-auto">
				
				<!-- Eyebrow & Telemetry Pill Strip -->
				<div class="flex flex-wrap items-center gap-2.5">
					<div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-surface-container text-on-surface font-label-code text-[11px] uppercase tracking-wider border border-outline-variant/40">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
						<span>Dispatch Terminal</span>
					</div>
					<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-low text-on-surface-variant font-label-code text-[11px] border border-outline-variant/30">
						<span class="material-symbols-outlined text-[14px] text-primary-container">schedule</span>
						<span>Dhaka (UTC+6) &bull; SLA &lt; 24h</span>
					</div>
				</div>

				<!-- Headline -->
				<h1 class="font-display text-[40px] sm:text-[50px] lg:text-[58px] text-on-surface tracking-[-0.025em] leading-[1.08] font-normal mt-1">
					<?php echo esc_html( $contact_headline ); ?>
				</h1>

				<!-- Subtitle -->
				<p class="font-body-md text-base sm:text-lg text-on-surface-variant max-w-2xl leading-relaxed">
					<?php echo wp_kses_post( $contact_subtext ); ?>
				</p>
			</div>
		</section>

		<!-- OPTIONAL WORDPRESS PAGE EDITOR CONTENT BLOCK -->
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$page_content = get_the_content();
				if ( ! empty( trim( $page_content ) ) ) :
					?>
					<section class="px-6 md:px-12 py-10 bg-surface-container-lowest border-b border-surface-container-high/60">
						<div class="max-w-4xl mx-auto prose prose-slate">
							<?php the_content(); ?>
						</div>
					</section>
					<?php
				endif;
			endwhile;
		endif;
		?>

		<!-- SECTION 2: MAIN SPLIT LAYOUT (CONTACT FORM VS DIRECT LINKS) -->
		<section class="relative px-6 md:px-12 py-16 bg-surface-container-low/30">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start max-w-6xl mx-auto">
				
				<!-- Left Column: Contact Form Console -->
				<div class="lg:col-span-7 flex flex-col gap-4">
					
					<div class="relative bg-surface-container-lowest p-7 sm:p-10 md:p-11 rounded-3xl shadow-sm border border-outline-variant/60 transition-all hover:border-outline-variant/90">
						
						<!-- Subtle Top Corner Crosshairs -->
						<span class="absolute top-4 left-4 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
						<span class="absolute top-4 right-4 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
						<span class="absolute bottom-4 left-4 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>
						<span class="absolute bottom-4 right-4 text-outline-variant/60 font-mono text-[11px] select-none pointer-events-none">+</span>

						<!-- Form Header -->
						<div class="pb-6 mb-8 border-b border-surface-container-high/70 flex items-center justify-between">
							<div>
								<span class="font-label-code text-[11px] uppercase tracking-widest text-outline block mb-1">Direct Transmission</span>
								<h2 class="font-display text-2xl sm:text-[28px] text-on-surface font-normal">Start a Conversation</h2>
								<p class="font-body-sm text-[13.5px] text-on-surface-variant mt-1">Send a message directly to my inbox.</p>
							</div>
							<div class="w-10 h-10 rounded-2xl bg-surface-container flex items-center justify-center text-primary-container shrink-0">
								<span class="material-symbols-outlined text-[20px]">send</span>
							</div>
						</div>

						<!-- THE FORM -->
						<form id="stitch-dispatch-form" class="flex flex-col gap-6">
							
							<!-- Honeypot anti-spam field -->
							<input type="text" name="website_url_hp" value="" tabindex="-1" autocomplete="off" class="hidden" style="display:none !important;">

							<!-- Step 01: Topic Selector -->
							<div class="flex flex-col gap-2.5">
								<label class="font-label-code text-[11px] uppercase tracking-wider text-on-surface-variant flex items-center justify-between font-medium">
									<span>01 / What would you like to discuss?</span>
									<span class="text-outline text-[10px] lowercase">select one</span>
								</label>
								
								<div class="flex flex-wrap gap-2" id="topic-selector">
									<button type="button" data-topic="Open Source Project" class="group px-3.5 py-1.5 rounded-full font-label-code text-[12px] transition-all flex items-center gap-2 bg-on-surface text-surface border border-on-surface shadow-xs font-semibold">
										<span class="topic-dot w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
										<span>Open Source Project</span>
									</button>
									<button type="button" data-topic="Consulting &amp; Advisory" class="group px-3.5 py-1.5 rounded-full font-label-code text-[12px] transition-all flex items-center gap-2 bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 hover:border-outline font-medium">
										<span class="topic-dot w-1.5 h-1.5 rounded-full bg-outline"></span>
										<span>Consulting &amp; Advisory</span>
									</button>
									<button type="button" data-topic="Speaking / WordCamp" class="group px-3.5 py-1.5 rounded-full font-label-code text-[12px] transition-all flex items-center gap-2 bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 hover:border-outline font-medium">
										<span class="topic-dot w-1.5 h-1.5 rounded-full bg-outline"></span>
										<span>Speaking / WordCamp</span>
									</button>
									<button type="button" data-topic="Plugin Development" class="group px-3.5 py-1.5 rounded-full font-label-code text-[12px] transition-all flex items-center gap-2 bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 hover:border-outline font-medium">
										<span class="topic-dot w-1.5 h-1.5 rounded-full bg-outline"></span>
										<span>Plugin Development</span>
									</button>
									<button type="button" data-topic="General Message" class="group px-3.5 py-1.5 rounded-full font-label-code text-[12px] transition-all flex items-center gap-2 bg-surface-container text-on-surface-variant hover:text-on-surface border border-outline-variant/40 hover:border-outline font-medium">
										<span class="topic-dot w-1.5 h-1.5 rounded-full bg-outline"></span>
										<span>General Message</span>
									</button>
								</div>

								<input type="hidden" name="contact_topic" id="selected-topic-input" value="Open Source Project">
							</div>

							<!-- Step 02: Sender Details -->
							<div class="flex flex-col gap-2.5">
								<label class="font-label-code text-[11px] uppercase tracking-wider text-on-surface-variant font-medium">
									02 / Your Details
								</label>
								<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
									<div>
										<label for="sender-name" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase">Your Name</label>
										<input type="text" id="sender-name" name="contact_name" required placeholder="e.g. David Miller" class="w-full px-4 py-3 rounded-2xl bg-surface-container-low border border-outline-variant/50 font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-[14px]">
									</div>
									<div>
										<label for="sender-email" class="block font-label-code text-[11px] text-outline mb-1.5 uppercase">Email Address</label>
										<input type="email" id="sender-email" name="contact_email" required placeholder="e.g. david@agency.org" class="w-full px-4 py-3 rounded-2xl bg-surface-container-low border border-outline-variant/50 font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-[14px]">
									</div>
								</div>
							</div>

							<!-- Step 03: Message Context -->
							<div class="flex flex-col gap-2.5">
								<div class="flex items-center justify-between">
									<label for="sender-message" class="font-label-code text-[11px] uppercase tracking-wider text-on-surface-variant font-medium">
										03 / Your Message
									</label>
									<span id="msg-char-counter" class="font-label-code text-[11px] text-outline">0 / 1500</span>
								</div>
								<textarea id="sender-message" name="contact_message" rows="5" required maxlength="1500" placeholder="Tell me a bit about your project, idea, or questions..." class="w-full px-4 py-3.5 rounded-2xl bg-surface-container-low border border-outline-variant/50 font-body-sm text-on-surface placeholder:text-outline/70 focus:outline-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-[14px] leading-relaxed resize-y"></textarea>
							</div>

							<!-- Step 04: Action & Security Notice -->
							<div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
								<button type="submit" class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-on-surface text-surface font-body-sm font-semibold hover:bg-on-surface/90 transition-all shadow-md active:scale-98 group">
									<span class="btn-label text-[14px]">Send Message</span>
									<span class="material-symbols-outlined text-[18px] group-hover:translate-x-0.5 transition-transform">send</span>
								</button>
								<div class="flex items-center gap-2 text-outline font-label-code text-[11px]">
									<span class="material-symbols-outlined text-[15px] text-emerald-500">lock</span>
									<span>Private &amp; delivered directly</span>
								</div>
							</div>

							<!-- Status Feedback Area -->
							<div id="dispatch-terminal-status" class="hidden font-mono text-label-code pt-2"></div>

						</form>

					</div>

				</div>

				<!-- Right Column: Direct Reachability & Studio Details -->
				<div class="lg:col-span-5 flex flex-col gap-6">
					
					<!-- Card 1: Fast Email Direct Reachability Card (DEEP CARBON SLATE PLATE) -->
					<div class="bg-[#0a0e17] text-white p-7 sm:p-8 rounded-3xl border border-white/10 shadow-xl relative overflow-hidden group">
						<!-- Ambient Glow -->
						<div class="pointer-events-none absolute -top-20 -right-20 w-48 h-48 bg-primary/25 rounded-full blur-2xl opacity-40"></div>

						<div class="relative z-10">
							<div class="flex items-center justify-between mb-4">
								<span class="font-label-code text-[10.5px] uppercase tracking-widest text-white/50 font-semibold">Direct Transmission</span>
								<span class="inline-flex items-center gap-1.5 text-[11px] font-label-code text-emerald-400 font-medium px-2.5 py-0.5 rounded-full bg-emerald-500/15 border border-emerald-500/30">
									<span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
									Replies in &lt; 24h
								</span>
							</div>
							
							<h3 class="font-display text-2xl text-white font-normal mb-2">Prefer to write directly?</h3>
							<p class="font-body-sm text-[13.5px] text-white/70 leading-relaxed mb-5 font-light">
								For advisory inquiries, open-source collaborations, or speaking invitations, write directly to:
							</p>

							<div class="p-3.5 bg-white/[0.06] rounded-2xl border border-white/10 flex items-center justify-between gap-3">
								<div class="flex items-center gap-2.5 min-w-0">
									<span class="material-symbols-outlined text-primary-300 text-[20px] shrink-0">mail</span>
									<span class="font-label-code text-[13px] text-white font-medium truncate select-all"><?php echo esc_html( $contact_email ); ?></span>
								</div>
								<button type="button" data-copy-email="<?php echo esc_attr( $contact_email ); ?>" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-white text-slate-900 hover:bg-white/90 transition-colors text-[11.5px] font-label-code cursor-pointer shrink-0 font-semibold shadow-xs" title="Copy Email">
									<span class="material-symbols-outlined text-[14px]">content_copy</span>
									<span>Copy</span>
								</button>
							</div>
						</div>
					</div>

					<!-- Card 1.5: Institutional Trust Card -->
					<div class="bg-surface-container-lowest p-6 sm:p-7 rounded-3xl border border-outline-variant/60 shadow-xs flex flex-col gap-3.5">
						<div class="flex items-center justify-between border-b border-surface-container-high/70 pb-3">
							<span class="font-label-code text-[11px] uppercase tracking-wider text-outline font-medium">Proven Institutional Trust</span>
							<span class="material-symbols-outlined text-outline text-[18px]">verified</span>
						</div>
						<p class="font-body-sm text-[12.5px] text-on-surface-variant leading-relaxed">
							Trusted by leading global organizations, enterprise companies across the USA &amp; Gulf, UN specialized agencies, and national ministries for high-concurrency, accessible, and secure digital infrastructure:
						</p>
						<div class="flex flex-wrap gap-1.5 pt-1 font-label-code text-[11px]">
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">UNICEF</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">ILO (UN)</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">USA Enterprises</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">Gulf Conglomerates</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">National Governments</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">UCEP</span>
							<span class="px-2.5 py-1 rounded-lg bg-surface-container border border-outline-variant/40 text-on-surface font-medium">WasteSafe</span>
						</div>
					</div>

					<!-- Card 2: Unified Verified Channels Ledger -->
					<div class="bg-surface-container-lowest p-6 sm:p-7 rounded-3xl border border-outline-variant/60 shadow-xs flex flex-col">
						<div class="pb-4 mb-2 border-b border-surface-container-high/70 flex items-center justify-between">
							<div>
								<span class="font-label-code text-[11px] tracking-wider uppercase text-outline block">Find Me Online</span>
								<h3 class="font-display text-xl text-on-surface font-normal">Profiles &amp; Links</h3>
							</div>
							<span class="material-symbols-outlined text-outline text-[20px]">hub</span>
						</div>

						<div class="divide-y divide-surface-container-high/50">
							
							<!-- WordPress.org -->
							<?php if ( ! empty( $wporg_url ) ) : ?>
								<a href="<?php echo esc_url( $wporg_url ); ?>" target="_blank" rel="noopener noreferrer" class="py-3.5 flex items-center justify-between group transition-colors">
									<div class="flex items-center gap-3">
										<span class="font-label-code text-[11px] text-outline w-5 text-center">01</span>
										<div class="flex flex-col">
											<span class="font-body-sm text-[13.5px] text-on-surface font-medium group-hover:text-primary-container transition-colors">WordPress.org Profile</span>
											<span class="font-label-code text-[11px] text-outline">profiles.wordpress.org/wprashed</span>
										</div>
									</div>
									<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
								</a>
							<?php endif; ?>

							<!-- GitHub -->
							<?php if ( ! empty( $github_url ) ) : ?>
								<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="py-3.5 flex items-center justify-between group transition-colors">
									<div class="flex items-center gap-3">
										<span class="font-label-code text-[11px] text-outline w-5 text-center">02</span>
										<div class="flex flex-col">
											<span class="font-body-sm text-[13.5px] text-on-surface font-medium group-hover:text-primary-container transition-colors">GitHub Profile</span>
											<span class="font-label-code text-[11px] text-outline">github.com/wprashed</span>
										</div>
									</div>
									<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
								</a>
							<?php endif; ?>

							<!-- LinkedIn -->
							<?php if ( ! empty( $linkedin_url ) ) : ?>
								<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="py-3.5 flex items-center justify-between group transition-colors">
									<div class="flex items-center gap-3">
										<span class="font-label-code text-[11px] text-outline w-5 text-center">03</span>
										<div class="flex flex-col">
											<span class="font-body-sm text-[13.5px] text-on-surface font-medium group-hover:text-primary-container transition-colors">LinkedIn Profile</span>
											<span class="font-label-code text-[11px] text-outline">linkedin.com/in/wprashedh</span>
										</div>
									</div>
									<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
								</a>
							<?php endif; ?>

							<!-- Pexels Featured Photography -->
							<?php if ( ! empty( $pexels_url ) ) : ?>
								<a href="<?php echo esc_url( $pexels_url ); ?>" target="_blank" rel="noopener noreferrer" class="py-3.5 flex items-center justify-between group transition-colors">
									<div class="flex items-center gap-3">
										<span class="font-label-code text-[11px] text-outline w-5 text-center">04</span>
										<div class="flex flex-col">
											<span class="font-body-sm text-[13.5px] text-on-surface font-medium group-hover:text-primary-container transition-colors">Pexels Photography</span>
											<span class="font-label-code text-[11px] text-outline">125+ Curated Highlights</span>
										</div>
									</div>
									<span class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary-container group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all">north_east</span>
								</a>
							<?php endif; ?>

						</div>
					</div>

					<!-- Card 3: Location & Availability -->
					<div class="bg-surface-container-lowest p-6 sm:p-7 rounded-3xl border border-outline-variant/60 shadow-xs flex flex-col gap-4">
						<div class="flex items-center justify-between border-b border-surface-container-high/70 pb-3">
							<span class="font-label-code text-[11px] uppercase tracking-wider text-outline font-medium">Location &amp; Availability</span>
							<span class="font-label-code text-[11px] text-emerald-700 dark:text-emerald-400 font-medium flex items-center gap-1.5">
								<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
								Active &amp; Online
							</span>
						</div>

						<div class="grid grid-cols-2 gap-y-3.5 gap-x-4 font-label-code text-[12px]">
							<div>
								<span class="text-outline uppercase text-[10.5px] block">Location</span>
								<span class="text-on-surface font-medium">Dhaka, Bangladesh</span>
							</div>
							<div>
								<span class="text-outline uppercase text-[10.5px] block">Timezone</span>
								<span class="text-on-surface font-medium">Asia/Dhaka (UTC+6)</span>
							</div>
							<div>
								<span class="text-outline uppercase text-[10.5px] block">Typical Response</span>
								<span class="text-on-surface font-medium">&lt; 24h Business Hours</span>
							</div>
							<div>
								<span class="text-outline uppercase text-[10.5px] block">Availability</span>
								<span class="text-primary-container font-medium">Open for Inquiries</span>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
