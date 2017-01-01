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


    $('.synopsis').each(function(event){ /* select all divs with the item class */

        var max_length = 250; /* set the max content length before a read more link will be added */

        if($(this).html().length > max_length){ /* check for content length */


            var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
            var content	= $(this).html();

            $(this).html('<p class="limited_text">'+short_content+'...'+'</p>'+
                '<p class="more_text" style="display:none;">'+content+'</p>'+
                '<a id="read" href="#" class="read_more" >Read more &rarr;</a>'); /* Alter the html to allow the read more functionality */

            $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */

                event.preventDefault(); /* prevent the a from changing the url */
                $(this).hide(); /* hide the read more button */
                $(this).parents('.synopsis').find('.limited_text').hide(); /* Et on cache le texte partiel*/
                $(this).parents('.synopsis').find('.more_text').show(); /* show the .more_text span */

            });

        }

    });
});

/* ======= Crée une requête AJAX qui ajoute une série au séries visionnées ======= */
function addWatchedSerie(element){
    //Permet de placer le token de vérification dans l'envoi (évite les 500 internal server error)
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //Envoi des données via une requête ajax
    $.ajax({
        //URL appelée lors de l'envoi de donnée
        url: 'addWatchedSerie',
        //Méthode post
        type: 'post',
        //Données à transmettre
        data: {'name':$(element).closest('.post-inner').find('.post-title').text(), '_token': $('input[name=_token]').val()},
        success: function(data){
            //Fonction de succès.
            alert(data);
        },
        error: function(){
            //Fonction d'erreur
            alert('An error was encountered');
        }
    });
}

/* ======= Crée une requête AJAX afin de faire une recommandation à l'utilisateur ======= */
function recommandationGenre(){
    //Permet de placer le token de vérification dans l'envoi (évite les 500 internal server error)
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    //Envoi des données via une requête ajax
    $.ajax({
        //URL appelée lors de l'envoi de donnée
        url: 'recommandationGenre',
        //Méthode post
        type: 'post',
        //Aucune données à transmettre, c'est le retour de la fonction appelée qui nous intéresse ici.
        data: {},
        success: function(data){
            //Fonction de succès.
            afficheRecommandation(data);
        },
        error: function(){
            //Fonction d'erreur
            alert('An error was encountered');
        }
    });
}

/* ======= Crée une requête AJAX afin de faire une recommandation à l'utilisateur ======= */
function recommandationCompanies() {
    //Permet de placer le token de vérification dans l'envoi (évite les 500 internal server error)
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    //Envoi des données via une requête ajax
    $.ajax({
        //URL appelée lors de l'envoi de donnée
        url: 'recommandationCompanies',
        //Méthode post
        type: 'post',
        //Aucune données à transmettre, c'est le retour de la fonction appelée qui nous intéresse ici.
        data: {},
        success: function (data) {
            //Fonction de succès.
            afficheRecommandation(data);
        },
        error: function () {
            //Fonction d'erreur
            alert('An error was encountered');
        }
    });
}

/* ======= Fonction qui permet d'afficher des recommandations de séries ======= */
function afficheRecommandation(data){
    //On vide la div recommandation de la page + on ajoute un titre à la partie
    $('.recommandation').empty().append(
        "<div class='col-md-12'>" +
        "<center><h2>Recommandation of series</h2></center>" +
        "</div>"
    );
    //Pour tous les résultats, on affiche les informations de chaques série afin que l'utilisateur puisse prendre note des recommandations
    for(var i = 0; i < data.length; i++) {
        $('.recommandation').append(
            "<div class='row'>" +
            "<div class='col-md-3'>" +
            "<img class='img-responsive' src='https://image.tmdb.org/t/p/original/" + data[i]['backdrop_path'] + "' alt='image' />" +
            "</div>" +
            "<div class='col-md-3'>" +
            "<ul>" +
            "<li>Name : " + data[i]['original_name'] + "</li>" +
            "<li>First air date : " + data[i]['first_air_date'] + "</li>" +
            "<li>Number of seasons : " + data[i]['number_of_seasons'] + "</li>" +
            "<li>Number of episodes : " + data[i]['number_of_episodes'] + "</li>" +
            "<li>Original language : " + data[i]['original_language'] + "</li>" +
            "</ul>" +
            "</div>" +
            "<div class='col-md-6'>" +
            "<p>" + data[i]['overview'] + "</p>" +
            "</div>" +
            "</div><br>"
        );
    }
}