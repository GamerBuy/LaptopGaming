$(document).ready(function(){
    $('.category-featured').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        draggable: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1204,
                settings: {
                slidesToShow: 3,
                }
            },
            {
                breakpoint: 500,
                settings: {
                slidesToShow: 2,
                }
            },
            {
                breakpoint: 400,
                settings: {
                slidesToShow: 1,
                }
            }
        ]
    });
});