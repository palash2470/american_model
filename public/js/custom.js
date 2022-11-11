$(function() {
    /*-------------------------------------Header Fixed-------------------------*/
    "use strict";
    $(function() {
        var header = $(".start-style");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });

    /*-------------------------------------Mobile Menu-------------------------*/
    var ico = $('<span></span>');
    $('li.sub_menu_open').append(ico);

    $("#menu_res").click(function() {
        $("#res_nav").toggleClass('left0');
    });

    $('li span').on("click", function(e) {
        if ($(this).hasClass('open')) {

            $(this).prev('ul').slideUp(300, function() {});

        } else {
            $(this).prev('ul').slideDown(300, function() {});
        }
        $(this).toggleClass("open");
    });
    $('#menu_res').click(function() {
        $(this).toggleClass('menu_responsiveTo')
    });



    /*-------------------------------------ScrollTop-------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
            $('.arrow-show').fadeIn();
        } else {
            $('.scrollup').fadeOut();
            $('.arrow-show').fadeOut();
        }
    });
    $('.scrollup').click(function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 300);
        return false;
    });


    /*-------------------------------------HOME_SLIDER-----------------------------------*/
    $('.home_slider').owlCarousel({
        autoplay: true,
        //autoplayHoverPause: true,
        autoplayTimeout: 5000,
        smartSpeed: 2000,
        animateOut: 'fadeOut',
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        navElement: 'div',
        navText: ["<i class='fas fa-caret-left'></i>", "<i class='fas fa-caret-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    /*-------------------------------------Same Height-----------------------------------*/
    // 1
    var sameHeight = 0;
    $('.same_height1').each(function() {
        if ($(this).outerHeight() >= sameHeight) {
            sameHeight = $(this).outerHeight();
        }
    });
    $('.same_height1').css({
        'min-height': sameHeight
    });
    // 2
    var sameHeightT = 0;
    $('.same_height2').each(function() {
        if ($(this).outerHeight() >= sameHeightT) {
            sameHeightT = $(this).outerHeight();
        }
    });
    $('.same_height2').css({
        'min-height': sameHeightT
    });
    // 
    var sameHeightTh = 0;
    $('.same_height_model_text').each(function() {
        if ($(this).outerHeight() >= sameHeightTh) {
            sameHeightTh = $(this).outerHeight();
        }
    });
    $('.same_height_model_text').css({
        'min-height': sameHeightTh
    });
    //Home featute section
    var sameHeightTsm = 0;
    $('.same_height-smtext').each(function() {
        if ($(this).outerHeight() >= sameHeightTsm) {
            sameHeightTsm = $(this).outerHeight();
        }
    });
    $('.same_height-smtext').css({
        'min-height': sameHeightTsm
    });
    /*-------------------------------------Search panel-----------------------------------*/
    $(document).on('click', '.src_pnl', function() {
        $(".src_open").slideToggle();
    });

    /*-------------------------------------Password Eye-----------------------------------*/
    $(document).on('click', '.pass_eye', function() {
        if ($(this).closest('.add-pass-eye').find(".pass_input").attr('type') == 'password') {
            $(this).closest('.add-pass-eye').find(".pass_input").attr('type', 'text');
            $(this).closest('.add-pass-eye').find(".far").addClass("fa-eye").removeClass("fa-eye-slash");
        } else {
            $(this).closest('.add-pass-eye').find(".pass_input").attr('type', 'password');
            $(this).closest('.add-pass-eye').find(".far").removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });
    /*-------------------------------------Mobile Search panel-----------------------------------*/
    $(document).on('click', '.mob_filt', function() {
        $('.mob_filt_wrap').slideToggle();
    });
    /*-------------------------------------Blog Share-----------------------------------*/
    $(document).on('click', '.blog_share', function() {
        $(this).closest('.blog-content').find('.blog_share_list').slideToggle();
    });

    /*-------------------------------------My Account / User account End-----------------------------------*/
    $(document).on('click', '.user_acc_menu', function() {
        $(".my_acc_lft").addClass("acc-open");
    });
    $(document).on('click', '.acc_close', function() {
        $(".my_acc_lft").removeClass("acc-open");
    });

    /*-------------------------------------Plan Mobile-----------------------------------*/
    $(function() {
        // Makes sure the code contained doesn't run until
        // all the DOM elements have loaded
        var selected_val = $('.planSelector').find(":selected").val();
        //console.log(selected_val);
        myfuc(selected_val);
        $('.planSelector').change(function() {
            var selectval = $(this).val();
            //console.log(selectval);
            myfuc(selectval);
        });
    });

    function myfuc(id) {
        $('.only-mobile').hide();
        $('#' + id).show();
    }
    $('.collapse').on('show.bs.collapse', function(e) {
        var selected_val = $(this).find('.planSelector').find(":selected").val();
        myfuc(selected_val);
    });
});