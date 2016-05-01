/*JQuery adding hover animation to feature and news section elements*/

$('#feature1').hover(
    function(){ $('#feature1 .img-circle').addClass('hover') },
    function(){ $('#feature1 .img-circle').removeClass('hover')}
);
$('#feature1').hover(
    function(){ $('#feature1 .feature-heading').addClass('slide-up') },
    function(){ $('#feature1 .feature-heading').removeClass('slide-up')}
);
$('#feature2').hover(
    function(){ $('#feature2 .img-circle').addClass('hover') },
    function(){ $('#feature2 .img-circle').removeClass('hover')}
);
$('#feature2').hover(
    function(){ $('#feature2 .feature-heading').addClass('slide-up') },
    function(){ $('#feature2 .feature-heading').removeClass('slide-up')}
);
$('#feature3').hover(
    function(){ $('#feature3 .img-circle').addClass('hover') },
    function(){ $('#feature3 .img-circle').removeClass('hover')}
);
$('#feature3').hover(
    function(){ $('#feature3 .feature-heading').addClass('slide-up') },
    function(){ $('#feature3 .feature-heading').removeClass('slide-up')}
);
$('#feature4').hover(
    function(){ $('#feature4 .img-circle').addClass('hover') },
    function(){ $('#feature4 .img-circle').removeClass('hover')}
);
$('#feature4').hover(
    function(){ $('#feature4 .feature-heading').addClass('slide-up') },
    function(){ $('#feature4 .feature-heading').removeClass('slide-up')}
);
$('#feature5').hover(
    function(){ $('#feature5 .img-circle').addClass('hover') },
    function(){ $('#feature5 .img-circle').removeClass('hover')}
);
$('#feature5').hover(
    function(){ $('#feature5 .feature-heading').addClass('slide-up') },
    function(){ $('#feature5 .feature-heading').removeClass('slide-up')}
);
$('#feature6').hover(
    function(){ $('#feature6 .img-circle').addClass('hover') },
    function(){ $('#feature6 .img-circle').removeClass('hover')}
);
$('#feature6').hover(
    function(){ $('#feature6 .feature-heading').addClass('slide-up') },
    function(){ $('#feature6 .feature-heading').removeClass('slide-up')}
);


/*Fade carousel caption on scroll*/
$(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    var height = $(window).height();
    $('.carousel-caption').css({
        'opacity': ((height - scrollTop) / height)
    });
});

/*Hide carousel banner share icons on load*/


$(function(){ $('.carousel-social').addClass('roll_back') }
);

$(function(){ $('.social').addClass('roll_back_effect') }
);

/*Hide "shop" button then fade into the viewport on scroll*/

$(function(){ $('.shopping-btn-container').addClass('hideme') }
);

$(function() {

    /* Every time the window is scrolled ... */
    $(window).scroll( function(){

        /* Check the location of each desired element */
        $('.hideme').each( function(i){

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){

                $(this).animate({'opacity':'1'},1000);

            }

        });

    });

});

