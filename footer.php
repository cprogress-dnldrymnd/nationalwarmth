<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
$hide_footer_cta = carbon_get_the_post_meta('hide_footer_cta');
?>
<section class="cta background-accent sm-padding">
	<div class="container text-center text-lg-start">
		<div class="row align-items-center justify-content-between">
			<div class="col-lg-auto mb-4 mb-lg-0">
				<div class="column-holder">
					<div class="heading-box no-margin medium-heading">
						<h2>
							Let's future-proof your home
						</h2>
					</div>
					<div class="description-box">
						<p>
							Use our handy online tool to get an instant quote
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-auto">
				<div class="column-holder">
					<div class="button-box button-bordered button-big icon-sixty-seconds">
						<a href="">
							Get an instant quote
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
get_template_part('template-parts/footer/content', 'before-footer');
do_action( 'open_footer');
get_template_part('template-parts/footer/footer', 'logo') ;
get_template_part('template-parts/footer/footer', 'navigation') ;
get_template_part('template-parts/footer/footer', 'text') ;
do_action( 'close_footer' );
?>

<?php wp_footer();?>
</body>
</html>