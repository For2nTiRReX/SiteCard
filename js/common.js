$(document).ready(function() {
    $(".top_mnu ul a").mPageScroll2id();
    //scroll nav
    $("input, select, textarea").jqBootstrapValidation();
    //bootstrap validate
    $(".portfolio_item").each(function(i){
        $(this).find(".popup_content").attr("href", "#work_"+i);
        $(this).find(".podrt_descr").attr("id","work_"+i);
    });
    //add ids for mugnific popup
    $("#portfolio_grid").mixItUp();
    //filter portfolio
    $(".s_portfolio li").click(function(){
        $(".s_portfolio li").removeClass("active");
        $(this).addClass("active");
    });
    //portfolio active
    function heightDetect(){
        $(".main_head").css("height", $(window).height());  
    };
    heightDetect();
    $(window).resize(function(){
        heightDetect();        
    });
    //header bg resize
    /*
    $(".main_head").parallax({imageSrc: "img/bg.jpg"});
    //header paralax
     */
    
    $(".toggle_mnu").click(function() {
        $("#sandwich").toggleClass("active");
        if($(".top_mnu").is(":visible")){
            $(".top_text").removeClass("h_opacity");
            $(".top_mnu").fadeOut(600);
            $(".top_mnu li a").removeClass("fadeInUp animated");
        } else {
            $(".top_text").addClass("h_opacity");
            $(".top_mnu").fadeIn(600);
            $(".top_mnu li a").addClass("fadeInUp animated");
        }
        //header button  top mnu togle 
    });
    $(".top_mnu ul li").click(function() {
        $(".top_mnu").fadeOut(600);
        $("#sandwich").toggleClass("active");
        $(".top_text").css("opacity", "1");
    });
    // fixed menu hide show
    $('.popup').magnificPopup({type:'image'});
    //foto popup magnific
    $('.popup_content').magnificPopup({type:'inline'});
    //portfolio popup magnific
   
});

$(window).load(function() { 
    $(".loader_inner").fadeOut(); 
    $(".loader").delay(400).fadeOut("slow"); 
    // load  page preview
    $(".top_text h1").animated("fadeInDown");
    $(".top_text p").animated("fadeInUp");
    $("section h2, .s_descr_wrap").animated("fadeInUp");
    $(".s_about .animation_left, .s_descr_wrap").animated("fadeInLeft");
    $(".s_about .animation_right").animated("fadeInRight");
    $(".animation_center").animated("flipInY");
    $(".s_resume .animation_left .resume_item").animated("fadeInLeft", "fadeOutLeft");
    $(".s_resume .animation_right .resume_item").animated("fadeInRight", "fadeOutRight");
});