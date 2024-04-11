<?php
$Theme_Options = new Theme_Options();
$SVG = new SVG();
?>
<section class="header-navigation background-white py-3 px-4 px-sm-0">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-lg-3 col-md-4 col-6">
				<div class="column-holder">
					<?= $Theme_Options->logo ?>
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-6">
				<div class="column-holder">
					<nav class="navbar navbar-expand-lg p-0">
						<div class="collapse navbar-collapse justify-content-end" id="navbarMain">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'header-menu',
								'container' => false,
								'menu_class' => 'd-none d-lg-flex',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-center fw-light mt-5 mt-lg-0 %2$s">%3$s</ul>',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
							?>

							<?php
							wp_nav_menu(array(
								'theme_location' => 'mobile-menu',
								'container' => false,
								'menu_class' => 'd-flex d-lg-none',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'items_wrap' => '<ul id="%1$s" class="navbar-nav align-items-center fw-light mt-5 mt-lg-0 %2$s">%3$s</ul>',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
							?>
					</nav>
				</div>


				<div class="d-block d-lg-none text-end">
					<button class="navbar-toggler toggler-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</span>
					</button>
				</div>
			</div>
		</div>


	</div>
	</div>
</section>