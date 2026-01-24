// Initialize AOS Animation Library
AOS.init({
    duration: 1000,
    once: true,
});


// Testimonial Carousel
$(document).ready(function(){
    $('.testimonials-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 1000,
        startPosition: 0, 
        responsive: {
            0: {
                items: 1,
                margin: 10
            },
            768: {
                items: 2,
                margin: 20
            },
            992: {
                items: 3,
                margin: 30
            }
        }
    });
});
