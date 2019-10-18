(function($) {
    $('.follow-button').click(function(e) {
    var data = $(this).attr('data');
    var data = data.split(',');
    var userID = parseInt(data[0]);
    var compID = parseInt(data[1]);
    var checkUser = $(this).attr('checkUser');
  if(!checkUser) {
        confirm("Please login to continue...");
  } else {
      $.ajax({
          type:"POST",
          url:rootUrl+'follow/index',
          data:{
            user_id: userID,
            company_id: compID,
          },
          success: function(res){
              var resObject = JSON.parse(res);

              if( resObject.succsess == 1) {
                  if (resObject.status == 1) {
                      $('.add_follow').hide();
                      $('.delete_follow').show();
                  } else {
                    $('.delete_follow').hide();
                    $('.add_follow').show();
                  }
              } else {
                  confirm(resObject.message);
              }
          }
      });
  } 
  e.preventDefault();
});
})(jQuery);

$(document).ready(function() {
    InwaveStickyMenu();
});

function InwaveStickyMenu() {
    var $header = $(".header-sticky");
    var $header_2 = $(".header-sticky-2");
    var h_header = $('.header.header-default').outerHeight();
    if ($header.length) {
        $header.data('sticky', '');
        $(window).on("scroll load resize", function() {
            var fromTop = $(document).scrollTop();
            if (fromTop > h_header) {
                if ($header.data('sticky') == '') {
                    $header.data('sticky', 'true');
                    $header.addClass("clone");
                    $('body').addClass("down");
                    $('.iw-header-version3').addClass("header-clone");
                }
            } else {
                if ($header.data('sticky') == 'true') {
                    $header.data('sticky', '');
                    $header.removeClass("clone");
                    $('body').removeClass("down");
                    $('.iw-header-version3').removeClass("header-clone");
                }
            }
        });
    }
    if ($header_2.length) {
        $header_2.data('sticky', '');
        $(window).on("load resize", function() {
            var fromTop = $(document).scrollTop();
            if ($header_2.data('sticky') == '') {
                $header_2.data('sticky', 'true');
                $header_2.addClass("clone");
                $('body').addClass("down");
            } else {
                $header_2.data('sticky', '');
                $header_2.removeClass("clone");
                $('body').removeClass("down");
            }
        });
    }
    /*
    $('.iw-menu-main ul.iw-nav-menu').singlePageNav({
        currentClass: 'current',
        filter: ':not(.external-link)',
        updateHash: false,
        offset: 100,
        threshold: 100
    });
    */
}   