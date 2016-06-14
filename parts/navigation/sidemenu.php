<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown">
    <div class="head">
<!--        <i class="fa fa-list"></i> -->
        همه دسته بندی ها</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">صفحات</a>
                <ul class="dropdown-menu mega-menu">
                    <?php $pageChunkes = array_chunk($pages, 6, true); ?>
                    <li class="yamm-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <?php foreach ( $pageChunkes[0] as $key => $packagePage ) : ?>
                                    <li><a href="index.php?page=<?php echo $key;?>&amp;style=<?php echo $_GET['style'];?>"><?php echo $packagePage;?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <?php foreach ( $pageChunkes[1] as $key => $packagePage ) : ?>
                                    <li><a href="index.php?page=<?php echo $key;?>&amp;style=<?php echo $_GET['style'];?>"><?php echo $packagePage;?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <?php foreach ( $pageChunkes[2] as $key => $packagePage ) : ?>
                                    <li><a href="index.php?page=<?php echo $key;?>&amp;style=<?php echo $_GET['style'];?>"><?php echo $packagePage;?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                        
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>                            
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>    
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                        
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                    </li>
                </ul>
            </li><!-- /.menu-item -->
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">منوی سایت</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <?php require MC_ROOT.'/parts/navigation/megamenu-vertical.php';?>
                    </li>
                </ul>
            </li><!-- /.menu-item -->
<!--            <li><a href="http://themeforest.net/item/media-center-electronic-ecommerce-html-template/8178892?ref=shaikrilwan">Buy this Theme</a></li>-->
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->