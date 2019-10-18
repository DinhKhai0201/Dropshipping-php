$(window).scroll(function(){
    if($(this).scrollTop() > 540){
        $('.heightt').css('height','100px');    
    } else{
        $('.heightt').css('height','0');
    }
    $('.iwj-sidebar-sticky').css('height',$('.job-list').height()+'px')
});

$(document).ready(function() {
    var owl = $('.owl-them-center');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });

    var owl1 = $('#slider-center');
    owl1.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });

    var owl2 = $('.owl-them-center2');
    owl2.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        dots: false,
        nav: true
    });

    var owl3 = $('.owl-them-work');
    owl3.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });
    
    var owl4 = $('.owl-them-work-salary');
    owl4.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: "fadeOut",
    });

    if(!isMobile){  
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
            } else {
            $('.scroll-top').fadeOut();
            }
        });
    }
    
    $('.scroll-top').click(function () {
        $("html, body").animate({
        scrollTop: 0
        }, 100);
        return false;
    });

    jQuery('.link-new-jobs').click( function(){
        jQuery('.link-new-jobs a').fadeToggle( "slow", "linear" );
    })

    $('.clicklink').on('click', function(){
        window.open($(this).attr('data-url'), '_blank');
    })

    $("#search-home-page").hover(function(){
        $('.overlay').css('display', 'block')
        }, function(){
            $('.overlay').css('display', 'none')
    });

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myUl li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#myInput-location").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myUl-location li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('.menu-thumbnail-home .item').on('click', function(){
        if($(this).attr('data')){
            document.cookie = "link="+ $(this).attr('data');
            document.cookie = "role="+ $(this).attr('role');
        }
    })

    $('.post-job-btn').on('click', function(){
        if($(this).attr('data')){
            document.cookie = "link="+ $(this).attr('data');
            document.cookie = "role="+ $(this).attr('role');
        }
    })
})