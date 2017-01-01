<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_accueil')

<!-- Div qui constitue le background du site. C'est ici que sont placé les 3 images aléatoire -->
<div class="bg-slider-wrapper">
    <div class="flexslider bg-slider">
        <ul class="slides">
            <!-- affichage des 3 background aléatoire -->
            <li class="slide slide-1" style="background: #253340 url('https://image.tmdb.org/t/p/original<?php echo $background[0] ?>') no-repeat 50% top;"></li>
            <li class="slide slide-2" style="background: #253340 url('https://image.tmdb.org/t/p/original<?php echo $background[1] ?>') no-repeat 50% top;"></li>
            <li class="slide slide-3" style="background: #253340 url('https://image.tmdb.org/t/p/original<?php echo $background[2] ?>') no-repeat 50% top;"></li>
        </ul>
    </div>
</div><!--//bg-slider-wrapper-->

<!-- Partie de texte qui se positione au dessus des images background -->
<section class="promo section section-on-bg">
    <div class="container text-center">
        <h2 class="title">Discover new TV series<br />tall based on your preferences!</h2>
        <p class="intro">Our recommandation website<br />be with you in a new experience</p>
        <p><a class="btn btn-cta btn-cta-primary" href="#why">Discover us</a></p>
    </div><!--//container-->
</section><!--//promo-->

<!-- Corps de la page d'accueil avec les différentes sections -->
<div class="sections-wrapper">
    <!-- ******Why Section****** -->
    <section id="why" class="section why">
        <div class="container">
            <h2 class="title text-center">How Can TV Series Help You?</h2>
            <p class="intro text-center">We take care of your passion for the TV series</p>
            <div class="row item">
                <div class="content col-xs-12 col-md-4">
                    <h3 class="title">Save you time and effort to discover new series</h3>
                    <div class="desc">
                        <p>We propose you a unique tool discover nex tv series with our search engine. You can search informations about more 500 series and tv show.</p>
                        <p>You can search series by differents criterias like the serie's name, the serie's genre or the serie's creator.</p>
                        <p><a href="series">Go to series section to use our search engine.</a></p>
                    </div>
                </div><!--//content-->
                <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                    <img class="img-responsive" src="../resources/assets/images/home/search.png" alt="search engine" />
                    <figcaption class="figure-caption">(Screenshot: Series search engine powered by TV Series) </figcaption>
                </figure>
            </div><!--//item-->

            <div class="row item ">
                <div class="content col-xs-12 col-md-4">
                    <h3 class="title">Easy to use</h3>
                    <div class="desc">
                        <p>Our website propose you a great recommandation of new tv series to discover. You can add all series you like and you watch to your account and receive recommandation based on your preferences.</p>
                        <p>We have to differents system of recommandation. The first is based on your most watches series genres and the second is use the production companies of your watched series..</p>
                    </div>
                </div><!--//content-->
                <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                    <img class="img-responsive" src="../resources/assets/images/home/recommandation.png" alt="recommandation engine" />
                    <figcaption class="figure-caption">(Screenshot: Series recommandation engine powered by TV Series)</figcaption>

                </figure>
            </div><!--//item-->
        </div><!--//container-->
    </section><!--//why-->
</div><!--//section-wrapper-->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')
