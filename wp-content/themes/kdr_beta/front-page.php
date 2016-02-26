<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kdr_beta
 */

$fields = array(
	'herobanner_images'		=> 'hero_images',
	'herobanner_text' 		=> 'hero_banner_barker_text',
	'herobanner_subtext' 	=> 'hero_banner_barker_subtext',
	'section1_video' 		=> 'section_1_video',
	'section1_blurb'		=> 'section_1_blurb',
	'officers'				=> 'officers',
	'section3_text'			=> 'section_3_title',
	'section3_paragraph'	=> 'section_3_paragraph',
	'map'					=> 'where_are_we'
);
foreach ( $fields as $key => $val):
	$$key = get_field('homepage_content')[0][$val];
endforeach;

$rand_num = rand(0, sizeOf($herobanner_images)-1);
$rand_img = $herobanner_images[$rand_num]['image'];

get_header('homepage'); ?>


<div id="page" class="site">
	<div id="content" class="site-content">
		<section class="hero_banner">
			<div class="barker_content">
				<h1><?php echo($herobanner_text); ?></h1>
				<h2><?php echo($herobanner_subtext); ?></h2>
			</div>
			<div class="hero_banner_overlay"></div>
			<figure>
				<img src="<?php echo($rand_img); ?>" alt="" />
			</figure>
		</section>

		<div class="page-wrapper">
			<section class="section1">
				<iframe src="<?php echo($section1_video); ?>" frameborder="0" allowfullscreen></iframe>
				<hr class="text_divider">
				<p class="blurb">
					<?php echo($section1_blurb); ?>
				</p>
				<hr class="text_divider">
			</section>

			<section class="section2">
				<div class="section2_background">
					<div class="texture"></div>
				</div>
				<div class="officer_wrapper">
					<div class="section-wrapper">
						<?php foreach ($officers as $officer => $_info):
							$position = strtolower(preg_replace('/\s/','_',$_info['position']));
						?>
						<figure class="<?php echo($position); ?>">
							<img src="<?php echo($_info['photo']); ?>" alt="<?php echo($_info['position']); ?>" />
							

							<figcaption>
								<span><?php echo($_info['position']); ?></span>
								
								<hr>
								<span><?php echo($_info['name']); ?></span>
								<span>Class of <?php echo($_info['graduation_year']); ?></span>
							</figcaption>
						</figure>

						<?php endforeach; ?>

						<div class="white_crest">
							<div class="exec_board">
								<h3><?php echo(date("Y") . " Exec Board"); ?></h3>
							</div>
							<img src="<?php echo($siteOptions['url']); ?>images/whitecrest.png" alt="white crest" />
						</div>
					</div>
				</div>
			</section>

			<section class="section3">
				<h2><?php echo($section3_text); ?></h2>
				<p><?php echo($section3_paragraph); ?></p>
			</section>

			<section class="section4">
				<div class="section4_background">
					<div class="texture"></div>
				</div>
				<div class="gallery_wrapper">
					<div class="gallery grid">
						<h2>Gallery</h2>
						<?php $_1_prev_random = false; $_2_prev_random = false;
							foreach(corrected_homepage_image_gallery(do_shortcode('[mediatag name="image_gallery" size="large" class="gallery"]')) as $ind => $url):
							$what_size = rand(0,10)%2;
							
							if($what_size===1 && $_1_prev_random === false){
								$_1_prev_random = true;
							?>
								<figure class="grid-item<?php {echo(' grid-item--width2');} ?>">
									<img data-src="<?php echo($url); ?>" src="<?php echo($url); ?>" alt="<?php echo($ind); ?>" />
								</figure>
							<?php } else { 
								$_1_prev_random = false;
							?>
								<figure class="grid-item">
									<img data-src="<?php echo($url); ?>" src="<?php echo($url); ?>" alt="<?php echo($ind); ?>" />
								</figure>
							<?php } ?>
							
								
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="section5">
				<?php do_shortcode($map);?>
			</section>
<?php
get_footer();



















