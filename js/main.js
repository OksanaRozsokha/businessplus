jQuery(function($) {
    $(document).ready(function () {
        $(".slide-one").owlCarousel({
            loop:true,
            margin:10,
            dots: true,
            responsive:{
                0:{
                    items:1

                },
                830:{
                    items:3
                }
            }
        });

        $(".slide-two").owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            responsive:{
                0:{
                    items:2

                },
                400:{
                    items:3

                },
                830:{
                    items:6
                }
            }
        });
    });
});


