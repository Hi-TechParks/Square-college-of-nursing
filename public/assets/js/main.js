
  // Add Active Class In Slider First Element
    $('#slider .carousel-item:first-child').addClass('active');

    
	// Stuffs Carousel Script
  $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          loop: false,
          margin: 20,
          nav: true,
          dots: false,
          responsiveClass: true,
          navText: ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            800: {
              items: 1
            },
            1000: {
              items: 2
            },
            1200: {
              items: 2
            }
          }
        })
    });
    // Stuffs Carousel Script


    /*====================================
    //  Equal Height Divs
    ======================================*/ 
    // Select and loop the container element of the elements you want to equalise
    $('.container').each(function(){
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      $('.person-box-footer', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });
            
      // Set the height of all those children to whichever was highest 
      $('.person-box-footer', this).height(highestBox);
                    
    });



// checkbox all-check-button selector
/*$("input[name=All]").click(function(){
    if($(this).is(":checked")){
        // check all checkbox
        $("input[name=Sat]").prop('checked', true);
        $("input[name=Sun]").prop('checked', true);
        $("input[name=Mon]").prop('checked', true);
        $("input[name=Tue]").prop('checked', true);
        $("input[name=Wed]").prop('checked', true);
        $("input[name=Thu]").prop('checked', true);
        $("input[name=Fri]").prop('checked', true);

    }
    else if($(this).is(":not(:checked)")){
        // uncheck all checkbox
        $("input[name=vedio_flag]").prop('checked', false);
        $("input[name=audio_flag]").prop('checked', false);

    }
});*/

$("#All").click(function(){
    if($(this).is(":checked")){
        // check all checkbox
        $("#Sat").prop('checked', true);
        $("#Sun").prop('checked', true);
        $("#Mon").prop('checked', true);
        $("#Tue").prop('checked', true);
        $("#Wed").prop('checked', true);
        $("#Thu").prop('checked', true);
        $("#Fri").prop('checked', true);

    }
    else if($(this).is(":not(:checked)")){
        // uncheck all checkbox
        $("#Sat").prop('checked', false);
        $("#Sun").prop('checked', false);
        $("#Mon").prop('checked', false);
        $("#Tue").prop('checked', false);
        $("#Wed").prop('checked', false);
        $("#Thu").prop('checked', false);
        $("#Fri").prop('checked', false);

    }
});

// uncheck all-checkbox if anyone checkbox get uncheck
$("#Sat, #Sun, #Mon, #Tue, #Wed, #Thu, #Fri").click(function(){
    if($(this).is(":not(:checked)")){

        $("#All").prop('checked', false);

    }
});


(function($) {
    $.fn.textWidth = function(){
         var calc = '<span style="display:none">' + $(this).text() + '</span>';
         $('body').append(calc);
         var width = $('body').find('span:last').width();
         $('body').find('span:last').remove();
        return width;
    };
    
    $.fn.marquee = function(args) {
        var that = $(this);
        var textWidth = that.textWidth(),
            offset = that.width(),
            width = offset,
            css = {
                'text-indent' : that.css('text-indent'),
                'overflow' : that.css('overflow'),
                'white-space' : that.css('white-space')
            },
            marqueeCss = {
                'text-indent' : width,
                'overflow' : 'hidden',
                'white-space' : 'nowrap'
            },
            args = $.extend(true, { count: -1, speed: 1e1, leftToRight: false }, args),
            i = 0,
            stop = textWidth*-1,
            dfd = $.Deferred();
        
        function go() {
            if(!that.length) return dfd.reject();
            if(width == stop) {
                i++;
                if(i == args.count) {
                    that.css(css);
                    return dfd.resolve();
                }
                if(args.leftToRight) {
                    width = textWidth*-1;
                } else {
                    width = offset;
                }
            }
            that.css('text-indent', width + 'px');
            if(args.leftToRight) {
                width++;
            } else {
                width--;
            }
            setTimeout(go, args.speed);
        };
        if(args.leftToRight) {
            width = textWidth*-1;
            width++;
            stop = offset;
        } else {
            width--;            
        }
        that.css(marqueeCss);
        go();
        return dfd.promise();
    };
})(jQuery);

$('.newstext').marquee();
$('demo').marquee({ count: 2 });
$('demo').marquee({ speed: 5 });
$('demo').marquee({ leftToRight: true });
$('demo').marquee({ count: 1, speed: 2 }).done(function() { $('demo').css('color', '#f00'); })
