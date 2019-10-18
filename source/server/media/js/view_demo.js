$('.btn-apply').on('click', function(){
            $(this).remove();
        });  
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if(scroll> 600){
        $('.fb-action').css('top', '50px');
        $('.fb-action').css('left', '-30px');
        $('.job-employer-logo-border').css('min-height', '50px !important')
    }else{
        $('.fb-action').css('top', '110px');
        $('.fb-action').css('left', '0');
        $('.job-employer-logo-border').css('min-height', 'unset')
    }
});
$("#btn_view_info").click(function(){
    $("#records_info").show();     
    $('html, body').animate({
        scrollTop: $("#records_info").offset().top
    }, 2000);
});
