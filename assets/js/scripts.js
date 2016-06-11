var pic_type = "";
function login() {
    "use strict";

    var data = {
        un: $("#login #username").val(),
        up: $("#login #password").val()
    }


    if (data.un != null && data.up != null) {
        $.ajax({
            type: 'post',
            url: "functions.php?f=login&un=" + data.un + "&up=" + data.up,
            success: function (lg) {
                if (lg == 1) {
                    $('#login #resualts').html("login ok");
                }
                if (lg == 0) {
                    $('#login #resualts').html("login fail, please active your account");
                }
            },
            error: function (err) {
                $('#login #resualts').html("there is a problem");
            }

        })
    }
}

function register() {
    "use strict";

    var data = {
        un: $("#register #username").val(),
        up: $("#register #password").val(),
        ue: $("#register #email").val()
    }


    if (data.un != "" && data.up != "" && data.ue != "") {
        $.ajax({
            type: 'post',
            url: "functions.php?f=regi&un=" + data.un + "&up=" + data.up + "&ue=" + data.ue,
            success: function (reg) {
                if (reg == 'un') {
                    $('#register #resualts').html("username is invalid");
                }
                if (reg == 'ue') {
                    $('#register #resualts').html("this email is used before");
                }
                if (reg == 'unue') {
                    $('#register #resualts').html("this email is used before and username is invalid");
                }
                if (reg == 1) {
                    $('#register #resualts').html("register success");
                }
            },
            error: function (err) {
                $('#register #resualts').html("there is a problem");
            }

        })
    }
    else {
        $('#register #resualts').html("please complete all fields");
    }
}

function insert_pro() {
    "use strict";

    var data = {
        p_n: $("#p_name").val(),
        p_des: $("#p_des").val(),
        p_pold: $("#p_pold").val(),
        p_pr: $("#p_pr").val(),
    }
    var p_pic = new FormData($("#insert_form")[0]);
    p_pic.append('p_pic', $('input[type=file]#p_pic')[0].files[0]);
    if ($('input[type=file]#p_pic')[0].files[0] && data.p_des != "" && data.p_n != "" && data.p_pold != "" && data.p_pr != "") {
        $.ajax({
            contentType: false,
            cache: false,
            processData: false,
            type: 'post',
            url: "functions.php?f=insert&p_n=" + data.p_n + "&p_des=" + data.p_des + "&p_pold=" + data.p_pold + "&p_pr=" + data.p_pr,
            data: p_pic,
            success: function (res) {
                $('#in_res').html(res);
                var reload = confirm("insert success, click ok to reload");
                if (reload == true) {
                    location.reload();
                }
            }
        });
    }
    else {
        $("#in_res").html('please complete all fields');
    }
}
function remove_pro(e) {
    "use strict";

    var remove = confirm("are you sure?");
    if (remove == true) {
        var id = $(e).find('#p_id').attr('data-pid');

        $.ajax({
            contentType: false,
            cache: false,
            processData: false,
            type: 'post',
            url: "functions.php?f=remove&p_id=" + id,
            success: function (res) {
                if(res == "ok")
                    $(e).remove();
            }
        });
    }
}
function edit_pro(this_pro) {
    "use strict";
    var p_this = {
        p_n: $(".pro_name").html(),
        p_des: $(".pro_des").html(),
        p_pold: $(".pro_pold").html(),
        p_pr: $(".pro_price").html(),
        p_pic: $("img.pro_pic").attr('src'),
        p_id: $("#p_id").attr('data-pid'),
    }

    $("#edit_p_name").val(p_this.p_n);
    $("#edit_p_des").val(p_this.p_des);
    $("#edit_p_pold").val(p_this.p_pold);
    $('#edit_p_pic_show').attr('src', p_this.p_pic);
    $("#edit_p_pr").val(p_this.p_pr);
    $(".for_edit").attr('data-pid', p_this.p_id);

    $('.for_edit').css('display', 'block');

    $('body').animate({
        scrollTop: $('.for_edit').offset().top
    });

    $('#edit_p_pic').change(function () {
        pic_type = 'file';
    });
}

function end_edit_pro() {
    "use strict";

    var data = {
        p_n: $("#edit_p_name").val(),
        p_des: $("#edit_p_des").val(),
        p_pold: $("#edit_p_pold").val(),
        p_pr: $("#edit_p_pr").val(),
        p_id: $(".for_edit").attr('data-pid'),
    }
    var p_pic = $("img.pro_pic").attr('src');
    
    if (pic_type == "file") {
        var p_pic = new FormData($("#insert_form")[0]);
        p_pic.append('p_pic', $('input[type=file]#edit_p_pic')[0].files[0]);
    }
    else if (pic_type == "") {
        pic_type = 'ad';
    }

   

    if (data.p_des != "" && data.p_id != "" && data.p_n != "" && data.p_pold != "" && data.p_pr != "") {
        $.ajax({
            contentType: false,
            cache: false,
            processData: false,
            type: 'post',
            url: "functions.php?f=edit&p_n=" + data.p_n + "&p_pic=" + p_pic + "&p_ptype=" + pic_type + "&p_id=" + data.p_id + "&p_des=" + data.p_des + "&p_pold=" + data.p_pold + "&p_pr=" + data.p_pr,
            data: p_pic,
            success: function (res) {
                $('.for_edit #in_res').html(res);
                var reload = confirm("update product is success, click ok to reload");
                if (reload == true) {
                    location.reload();
                }
            }
        });
    }
    else {
        $(".for_edit #in_res").html('please complete all fields');
    }
}
(function ($) {
    "use strict";

    /*===================================================================================*/
    /*  WOW 
    /*===================================================================================*/

    $(document).ready(function () {
        new WOW().init();

        $("#imageGallery").lightSlider({
            // rtl:true,
            gallery:true,
            item:1,
            loop:true,
            thumbItem:9,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            // onSliderLoad: function(el) {
            //     el.lightGallery({
            //         selector: '#imageGallery .lslide'
            //     });
            // }
        });
    });

    /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/

    $(document).ready(function () {

        var dragging = true;
        var owlElementID = "#owl-main";

        function fadeInReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
            }
        }

        function fadeInDownReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
            }
        }

        function fadeInUpReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
            }
        }

        function fadeInLeftReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
            }
        }

        function fadeInRightReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
            }
        }

        function fadeIn() {
            $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInDown() {
            $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInUp() {
            $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInLeft() {
            $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInRight() {
            $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        $(owlElementID).owlCarousel({

            autoPlay: 5000,
            stopOnHover: true,
            navigation: true,
            pagination: true,
            singleItem: true,
            addClassActive: true,
            transitionStyle: "fade",
            navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],

            afterInit: function () {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterMove: function () {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            afterUpdate: function () {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            startDragging: function () {
                dragging = true;
            },

            afterAction: function () {
                fadeInReset();
                fadeInDownReset();
                fadeInUpReset();
                fadeInLeftReset();
                fadeInRightReset();
                dragging = false;
            }

        });

        if ($(owlElementID).hasClass("owl-one-item")) {
            $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
        }

        $(owlElementID + ".owl-one-item").owlCarousel({
            singleItem: true,
            navigation: false,
            pagination: false
        });

        $('#transitionType li a').click(function () {

            $('#transitionType li a').removeClass('active');
            $(this).addClass('active');

            var newValue = $(this).attr('data-transition-type');

            $(owlElementID).data("owlCarousel").transitionTypes(newValue);
            $(owlElementID).trigger("owl.next");

            return false;

        });

        $("#owl-recently-viewed").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 6,
            pagination: false,
            itemsTablet: [768, 3]
        });

        $("#owl-recently-viewed-2").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 4,
            pagination: false,
            itemsTablet: [768, 3],
            itemsDesktopSmall: [1199, 3],
        });

        $("#owl-brands").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 6,
            pagination: false,
            itemsTablet: [768, 4]
        });

        $('#owl-single-product').owlCarousel({
            singleItem: true,
            pagination: false
        });

        $('#owl-single-product-thumbnails').owlCarousel({
            items: 6,
            pagination: false,
            rewindNav: true,
            itemsTablet: [768, 4]
        });

        $('#owl-recommended-products').owlCarousel({
            rewindNav: true,
            items: 4,
            pagination: false,
            itemsTablet: [768, 3],
            itemsDesktopSmall: [1199, 3],
        });

        $('.single-product-slider').owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            singleItem: true,
            pagination: false
        });

        $(".slider-next").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger('owl.next');
            return false;
        });

        $(".slider-prev").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger('owl.prev');
            return false;
        });

        $('.single-product-gallery .horizontal-thumb').click(function () {
            var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
            owl.trigger('owl.goTo', slideTo);
            $this.addClass('active').parent().siblings().find('.active').removeClass('active');
            return false;
        });

    });

    /*===================================================================================*/
    /*  STAR RATING
    /*===================================================================================*/

    $(document).ready(function () {

        if ($('.star').length > 0) {
            $('.star').each(function () {
                var $star = $(this);

                if ($star.hasClass('big')) {
                    $star.raty({
                        starOff: 'assets/images/star-big-off.png',
                        starOn: 'assets/images/star-big-on.png',
                        space: false,
                        score: function () {
                            return $(this).attr('data-score');
                        }
                    });
                } else {
                    $star.raty({
                        starOff: 'assets/images/star-off.png',
                        starOn: 'assets/images/star-on.png',
                        space: false,
                        score: function () {
                            return $(this).attr('data-score');
                        }
                    });
                }
            });
        }
    });

    /*===================================================================================*/
    /*  SHARE THIS BUTTONS
    /*===================================================================================*/

    $(document).ready(function () {
        if ($('.social-row').length > 0) {
            stLight.options({ publisher: "2512508a-5f0b-47c2-b42d-bde4413cb7d8", doNotHash: false, doNotCopy: false, hashAddressBar: false });
        }
    });

    /*===================================================================================*/
    /*  CUSTOM CONTROLS
    /*===================================================================================*/

    $(document).ready(function () {

        // Select Dropdown
        if ($('.le-select').length > 0) {
            $('.le-select select').customSelect({ customClass: 'le-select-in' });
        }

        // Checkbox
        if ($('.le-checkbox').length > 0) {
            $('.le-checkbox').after('<i class="fake-box"></i>');
        }

        //Radio Button
        if ($('.le-radio').length > 0) {
            $('.le-radio').after('<i class="fake-box"></i>');
        }

        // Buttons
        $('.le-button.disabled').click(function (e) {
            e.preventDefault();
        });

        // Quantity Spinner
        $('.le-quantity a').click(function (e) {
            e.preventDefault();
            var currentQty = $(this).parent().parent().find('input').val();
            if ($(this).hasClass('minus') && currentQty > 0) {
                $(this).parent().parent().find('input').val(parseInt(currentQty, 10) - 1);
            } else {
                if ($(this).hasClass('plus')) {
                    $(this).parent().parent().find('input').val(parseInt(currentQty, 10) + 1);
                }
            }
        });

        // Price Slider
        if ($('.price-slider').length > 0) {
            $('.price-slider').slider({
                min: 100,
                max: 700,
                step: 10,
                value: [100, 400],
                handle: "square"

            });
        }

        // Data Placeholder for custom controls

        $('[data-placeholder]').focus(function () {
            var input = $(this);
            if (input.val() == input.attr('data-placeholder')) {
                input.val('');

            }
        }).blur(function () {
            var input = $(this);
            if (input.val() === '' || input.val() == input.attr('data-placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('data-placeholder'));
            }
        }).blur();

        $('[data-placeholder]').parents('form').submit(function () {
            $(this).find('[data-placeholder]').each(function () {
                var input = $(this);
                if (input.val() == input.attr('data-placeholder')) {
                    input.val('');
                }
            });
        });

    });

    /*===================================================================================*/
    /*  LIGHTBOX ACTIVATOR
    /*===================================================================================*/
    $(document).ready(function () {
        if ($('a[data-rel="prettyphoto"]').length > 0) {
            //$('a[data-rel="prettyphoto"]').prettyPhoto();
        }
    });


    /*===================================================================================*/
    /*  SELECT TOP DROP MENU
    /*===================================================================================*/
    $(document).ready(function () {
        $('.top-drop-menu').change(function () {
            var loc = ($(this).find('option:selected').val());
            window.location = loc;
        });
    });

    /*===================================================================================*/
    /*  LAZY LOAD IMAGES USING ECHO
    /*===================================================================================*/
    $(document).ready(function () {
        echo.init({
            offset: 100,
            throttle: 250,
            unload: false
        });
    });

    /*===================================================================================*/
    /*  GMAP ACTIVATOR
    /*===================================================================================*/

    $(document).ready(function () {
        var zoom = 16;
        var latitude = 51.539075;
        var longitude = -0.152424;
        var mapIsNotActive = true;
        setupCustomMap();

        function setupCustomMap() {
            if ($('.map-holder').length > 0 && mapIsNotActive) {

                var styles = [
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "color": "#E6E6E6"
                            }
                        ]
                    }, {
                        "featureType": "administrative",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "saturation": -100
                            }
                        ]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#808080"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "water",
                        "stylers": [
                            {
                                "color": "#CECECE"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#E5E5E5"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }, {}
                ];

                var lt, ld;
                if ($('.map').hasClass('center')) {
                    lt = (latitude);
                    ld = (longitude);
                } else {
                    lt = (latitude + 0.0027);
                    ld = (longitude - 0.010);
                }

                var options = {
                    mapTypeControlOptions: {
                        mapTypeIds: ['Styled']
                    },
                    center: new google.maps.LatLng(lt, ld),
                    zoom: zoom,
                    disableDefaultUI: true,
                    scrollwheel: false,
                    mapTypeId: 'Styled'
                };
                var div = document.getElementById('map');

                var map = new google.maps.Map(div, options);

                var styledMapType = new google.maps.StyledMapType(styles, {
                    name: 'Styled'
                });

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                });

                map.mapTypes.set('Styled', styledMapType);

                mapIsNotActive = false;
            }

        }
    });

})(jQuery);