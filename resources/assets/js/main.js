$(document).ready(function() {

    /* ======= Twitter Bootstrap hover dropdown ======= */
    /* Ref: https://github.com/CWSpear/bootstrap-hover-dropdown */
    /* apply dropdownHover to all elements with the data-hover="dropdown" attribute */

    $('[data-hover="dropdown"]').dropdownHover();

    /* ======= Fixed header when scrolled ======= */
    $(window).on('scroll load', function() {
         if ($(window).scrollTop() > 0) {
             $('#header').addClass('scrolled');
         }
         else {
             $('#header').removeClass('scrolled');

         }
    });

    /* ======= jQuery Placeholder ======= */
    /* Ref: https://github.com/mathiasbynens/jquery-placeholder */
    
    $('input, textarea').placeholder();
    
    /* ======= FAQ accordion ======= */
    function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find('.panel-title a')
        .toggleClass('active')
        .find("i.fa")
        .toggleClass('fa-plus-square fa-minus-square');
    }
    $('.panel').on('hidden.bs.collapse', toggleIcon);
    $('.panel').on('shown.bs.collapse', toggleIcon);    
    
    
    /* ======= Header Background Slideshow - Flexslider ======= */    
    /* Ref: https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties */
    
    $('.bg-slider').flexslider({
        animation: "fade",
        directionNav: false, //remove the default direction-nav - https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties
        controlNav: false, //remove the default control-nav
        slideshowSpeed: 8000
    });
    
     /* ======= Testimonial Bootstrap Carousel ======= */
     /* Ref: http://getbootstrap.com/javascript/#carousel */
    $('#testimonials-carousel').carousel({
      interval: 8000 
    });

    /* ======= Construit la page de recherche de séries du site ======= */
    //La recherche par défaut se fait par le nom des séries donc on ne rends visible que ce champ.
    $('.name').show();
    $('.creator').hide();
    $('.genre').hide();

    //Cette fonction permet de changer le champ de recherche en fonction du type sélectionné
    $( ".search" ).change(function() {
        //Si le type de recherche est : par nom
        if($(this).val() == 'N'){
            $('.name').show();
            $('.genre').hide();
            $('.creator').hide();
        }
        //Si le type de recherche est : par genre
        if($(this).val() == 'G'){
            $('.genre').show();
            $('.name').hide();
            $('.creator').hide();
        }
        //Si le type de recherche est : par réalisateur
        if($(this).val() == 'R'){
            $('.creator').show();
            $('.genre').hide();
            $('.name').hide();
        }
    });
});