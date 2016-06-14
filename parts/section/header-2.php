<!-- ============================================================= HEADER ============================================================= -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        
        <div class="col-xs-12 col-md-3 logo-holder">
			<?php require_once MC_ROOT.'/parts/widgets/header/logo.php'; ?>
		</div><!-- /.logo-holder -->


		<div class="search_cart">

			<div class="col-xs-12 col-md-2 top-cart-row no-margin">
				<?php require_once MC_ROOT.'/parts/widgets/header/shopping-cart-dropdown.php'; ?>
			</div><!-- /.top-cart-row -->

			<div class="col-xs-12 col-md-5 top-search-holder no-margin">
				<?php require_once MC_ROOT.'/parts/widgets/header/search-bar.php'; ?>
			</div><!-- /.top-search-holder -->

		</div>
	</div><!-- /.container -->

	<?php require_once MC_ROOT.'/parts/navigation/horizontal-menu.php'; ?>

	<?php require MC_ROOT.'/parts/breadcrumb/breadcrumb.php';?>

</header>
<!-- ============================================================= HEADER : END ============================================================= -->