jQuery(document).ready(function ($) {

    style_forms();
    init_core_effects();
    $('input').livequery(function(){
        $(this).placeholder();
    });

    /* TABS --------------------------------- */
    $('dl.tabs').ftabs();

    /* ALERT BOXES ------------ */
    $(".alert-box a.close").live("click", function(event) {
    event.preventDefault();
      $(this).closest(".alert-box").fadeOut(function(event){
        $(this).remove();
      });
    });

    /* TOOLTIPS ------------ */
    $(this).tooltips();

    /* UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE6/7/8 SUPPORT AND ARE USING .block-grids */
//  $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
//  $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
//  $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
//  $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});

    /* DROPDOWN NAV ------------- */

    var lockNavBar = false;
    $('.nav-bar a.flyout-toggle').live('click', function(e) {
        e.preventDefault();
        var flyout = $(this).siblings('.flyout');
        if (lockNavBar === false) {
            $('.nav-bar .flyout').not(flyout).slideUp(500);
            flyout.slideToggle(500, function(){
                lockNavBar = false;
            });
        }
        lockNavBar = true;
    });
  if (Modernizr.touch) {
    $('.nav-bar>li.has-flyout>a.main').css({
      'padding-right' : '75px'
    });
    $('.nav-bar>li.has-flyout>a.flyout-toggle').css({
      'border-left' : '1px dashed #eee'
    });
  } else {
    $('.nav-bar>li.has-flyout').hover(function() {
      $(this).children('.flyout').show();
    }, function() {
      $(this).children('.flyout').hide();
    })
  }

});

function init_core_effects() {
    init_quantity_controls();
    init_carousel();
    init_fancybox();
}


function init_carousel() {
 jQuery(".carousel").jcarousel({
    scroll: 1,
    initCallback: function(carousel) {
      $('#carousel_next').bind('click', function() {
        carousel.next();
        return false;
      });

      $('#carousel_prev').bind('click', function() {
        carousel.prev();
        return false;
      });
    },
    itemVisibleInCallback: function(carousel, li, index, state) {
      $('#image_index').text(index);
      var cnt = $(li).parent().children('li').length;

      if (index == 1)
        $('#carousel_prev').addClass('disabled');
      else
        $('#carousel_prev').removeClass('disabled');

      if (index == cnt)
        $('#carousel_next').addClass('disabled');
      else
        $('#carousel_next').removeClass('disabled');
    },
    buttonNextHTML: null,
    buttonPrevHTML: null
 });
}

function init_fancybox() {
  $("a.gallery_image").fancybox({
    titleShow: true
  });
}

function style_forms() {
  var ua = $.browser;
  if (!(ua.msie && ua.version.slice(0,1) == "7"))
  {
    $('input:checkbox, input:radio').livequery(function(){
      $(this).uniform();
    });
  }
}
