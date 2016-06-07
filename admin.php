<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="audivor" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>MediaCenter - Responsive eCommerce Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/blue.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/animate.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/navy.css" rel="alternate stylesheet" title="Navy color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

	    <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>

    <div id="admin_page">
        <div id="users">
            <div style="font-size: 25px;color: red;font-weight: bold;padding: 10px 0;">users</div>
            <?php
                include("config.php");
                $query = "SELECT * FROM users";
                $resualt = mysqli_query($conn,$query);
                foreach($resualt as $rows){
                    ?> 
                    <div class="dis_in" id="user"><?php echo $rows["un"] ?></div>
                    <div class="dis_in" id="user"><?php echo $rows["ue"] ?></div>
                    <div class="dis_in" id="user"><?php echo $rows["up"] ?></div>
                    <div class="dis_in" id="user"><?php echo $rows["ut"] ?></div>
                    <br />
                    <?php
                }
            ?>
        </div>
        <hr />
        <div id="in_products">
            <div style="font-size: 25px;color: red;font-weight: bold;padding: 10px 0;text-align: center;">insert product</div>

            <div class="pro_form">
                <iframe name="targetif" style="display: none;"></iframe>
                <form id="insert_form" action="#" enctype='multipart/form-data' target="targetif">
                    <input id="p_name" type="text" class="le-input pro_inp" name="p_name" placeholder="name" />
                    <input id="p_des" type="text" class="le-input pro_inp" name="p_des" placeholder="description"/>
                    <input id="p_pold" type="number" class="le-input pro_inp" name="p_pold" placeholder="old price"/>
                    <input id="p_pr" type="number" class="le-input pro_inp" name="p_pr" placeholder="price"/>
                    <input id="p_pic" type="file" class="le-input pro_inp" name="p_pic" placeholder="image"/>
                    <input type="submit" class="le-input pro_inp sub" onclick="insert_pro()"/>
                </form>
                <div id="in_res"></div>
            </div>
        </div>
        <hr />
        <div id="show_product">
            <div style="font-size: 25px;color: red;font-weight: bold;padding: 10px 0;text-align: center;">products</div>
            <div class="tab_head">
                <div class="dis_in t_head">name</div>
                <div class="dis_in t_head">description</div>
                <div class="dis_in t_head">price</div>
                <div class="dis_in t_head">old price</div>
                <div class="dis_in t_head">image</div>
                <div class="dis_in t_head">remove</div>
            </div>
                <?php
                    include("config.php");
                    $query = "SELECT * FROM product";
                    $resualt = mysqli_query($conn,$query);
                    foreach($resualt as $rows){
                        ?> 
                    <div class="tab_body">
                        <div id="p_id" style="display: none" data-pid="<?php echo $rows["id"] ?>"></div>
                        <div class="dis_in tbody pro_name" id="pro"><?php echo $rows["p_n"] ?></div>
                        <div class="dis_in tbody pro_des" id="pro"><?php echo $rows["p_des"] ?></div>
                        <div class="dis_in tbody pro_price" id="pro"><?php echo $rows["p_pr"] ?></div>
                        <div class="dis_in tbody pro_pold" id="pro"><?php echo $rows["p_pold"] ?></div>
                        <div class="dis_in tbody pro_pic" id="pro"><img class="pro_pic" src="<?php echo $rows["p_pic"] ?>" /></div>
                        <div class="dis_in tbody" id="pro">
                            <input type="submit" class="le-input pro_inp remove" onclick="remove_pro($(event.target).parents('.tab_body'))" value="remove"/>
                            <input type="submit" class="le-input pro_inp remove" onclick="edit_pro($(event.target).parents('.tab_body'))" value="edit"/>
                        </div>
                    </div>
                        <?php
                    }
                ?>
        </div>
        <hr />

        <div id="in_products" class="for_edit">
            <div style="font-size: 25px;color: red;font-weight: bold;padding: 10px 0;text-align: center;">edit product</div>

            <div class="pro_form">
                <iframe name="targetif" style="display: none;"></iframe>
                <form id="insert_form" action="#" enctype='multipart/form-data' target="targetif">
                    <input id="edit_p_name" type="text" class="le-input pro_inp" name="p_name" placeholder="name" />
                    <input id="edit_p_des" type="text" class="le-input pro_inp" name="p_des" placeholder="description"/>
                    <input id="edit_p_pold" type="number" class="le-input pro_inp" name="p_pold" placeholder="old price"/>
                    <input id="edit_p_pr" type="number" class="le-input pro_inp" name="p_pr" placeholder="price"/>
                    <input id="edit_p_pic" type="file" class="le-input pro_inp" name="p_pic" placeholder="image"/>
                    <input type="submit" class="le-input pro_inp sub" onclick="end_edit_pro()"/>
                    <div class="le-input pro_inp" style="text-align: center"><img src="" id='edit_p_pic_show'/></div>
                </form>
                <div id="in_res"></div>
            </div>
        </div>
    </div>


	<!-- JavaScripts placed at dive end of dive document so dive pages load faster -->
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/jquery-migrate-1.2.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="assets/js/gmap3.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/css_browser_selector.min.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.raty.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.min.js"></script>
    <script src="assets/js/jquery.customSelect.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-diveme-options').click(function(){
				$(divis).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-diveme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<script src="http://w.sharedivis.com/button/buttons.js"></script>

</body>
</html>