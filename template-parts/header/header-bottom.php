<?php
$Theme_Options = new Theme_Options;
$header_icon_menu = $Theme_Options->header_icon_menu;

if ($header_icon_menu) {
?>

	<section class="header-bottom header-icon-list small-text d-none" >
		<div class="header-bottom-holder background-secondary">
			<div class="container-fluid">
				<ul class="d-flex justify-content-center align-items-center list-inline row mb-0 fw-light g-0 flex-wrap flex-lg-nowrap">
					<?php foreach ($header_icon_menu as $icon_menu) { ?>
						<li class="col-lg-auto col-md-4 col-6">
							<a href="<?= get_permalink($icon_menu['id']) ?>" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
								<span class="icon"><img src="<?= wp_get_attachment_image_url(get__post_meta_by_id($icon_menu['id'], 'page_icon', 'medium')) ?>" alt="<?= get_the_title($icon_menu['id']) ?>"></span>
								<span class="text"><?= get_the_title($icon_menu['id']) ?></span>
							</a>
						</li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</section>

<?php } ?>

<section class="header-bottom header-icon-list small-text d-none d-lg-block">
	<div class="header-bottom-holder background-secondary">
		<div class="container-fluid">
			<ul class="d-flex justify-content-center align-items-center list-inline row mb-0 fw-light g-0 flex-wrap flex-lg-nowrap">
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
						<span class="icon"><img src="/wp-content/uploads/2022/07/boilers.png" alt=""></span>
						<span class="text">Boilers</span>
					</a>
				</li>
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
						<span class="icon"><img src="/wp-content/uploads/2022/07/heating-systems.png" alt=""></span>
						<span class="text">Heating Systems</span>
					</a>
				</li>
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
						<span class="icon"><img src="/wp-content/uploads/2022/07/insulation.png" alt=""></span>
						<span class="text">Insulation</span>
					</a>
				</li>
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
						<span class="icon"><img src="/wp-content/uploads/2022/07/heat-pumps-1.png" alt=""></span>
						<span class="text">Heat Pumps</span>
					</a>
				</li>
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">

						<span class="icon"><img src="/wp-content/uploads/2022/07/solar.png" alt=""></span>
						<span class="text">Solar PV</span>
					</a>
				</li>
				<li class="col-lg-auto col-md-4 col-6">
					<a href="" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
						<span class="icon"><img src="/wp-content/uploads/2022/07/eco.png" alt=""></span>
						<span class="text">ECO4 / BUS</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</section>