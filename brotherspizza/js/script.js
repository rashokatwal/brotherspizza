$(document).ready(function() {

    var active = "pizza";
    var slide = 'on';

    $('.drinks-list-grid').fadeOut(0);

    $('#show-pizza-button').click(function() {
        if (active == "drinks") {
            $('#show-pizza-button').addClass('active-nav');
            $('#show-drinks-button').removeClass('active-nav');
            $('.drinks-list-grid').fadeOut(0);
            $('.pizza-list-grid').fadeIn(500);
            active = "pizza";
        }
    })

    $('#show-drinks-button').click(function() {
        if (active == "pizza") {
            $('#show-drinks-button').addClass('active-nav');
            $('#show-pizza-button').removeClass('active-nav');
            $('.pizza-list-grid').fadeOut(0);
            $('.drinks-list-grid').fadeIn(500);
            active = "drinks";
        }
    })

    $('#outer-box').click(function() {
        console.log('clicked');
        $('#first-rotator').toggleClass('first-rotator');
        $('#second-rotator').toggleClass('second-rotator');
        $('#invisible').toggleClass('invisible');
        if (slide == 'on') {
            $('#navigation-slide').css({"right": "0"});
            slide = 'off';
        }
        else {
            $('#navigation-slide').css({"right": "-100%"});
            slide = 'on';
        }
    })

    // $('.grid-element').each(function() {
    //     $(this).attr('href', 'item-detail.php');
    // })

    if (document.documentElement.scrollTop == 0) {
        $('#hero-h1').addClass('slideUp');
        $('#hero-p').addClass('slideUp');
        $('#hero-button').addClass('slideUp');
        $('.hero-right').addClass('slideUp');
    }
    
})

window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.documentElement.scrollTop > 0) {
        $('.navigation-outer').css({"top": "0", "background": "var(--light)", "box-shadow": "0 5px 5px rgba(0, 0, 0, 0.1)"});
    }
    else if (document.documentElement.scrollTop == 0){
        $('.navigation-outer').css({"top": "-100px", "background": "transparent", "box-shadow": "none"});
    }
}

// $(".grid-element").click(function() {
//     alert(this.id);
// })