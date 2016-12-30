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
            <h2 class="title text-center">How Can Velocity Help You?</h2>
            <p class="intro text-center">We take care of the UX and front-end design so you can save time building your site</p>
            <div class="row item">
                <div class="content col-xs-12 col-md-4">
                    <h3 class="title">Save you time and effort</h3>
                    <div class="desc">
                        <p>Explain one of your product benefits here. Let users know how they can benefit using your product. It’s also a good idea to back it up with a testimonial or tweet from your users.</p>
                        <p>The original PSD of the graphic is included in the package. You can easily customise the PSD to meet your needs.</p>
                    </div>
                    <div class="quote">
                        <div class="quote-profile">
                            <img class="img-responsive img-circle" src="../resources/assets/images/people/profile-s-1.png" alt="" />
                        </div><!--//profile-->
                        <div class="quote-content">
                            <blockquote><p><a href="https://twitter.com/3rdwave_themes" target="_blank">@velocity</a> Love it! Thank you for making my life easier and saving me time! I’ll definitely recommend it to my friends. :)</p></blockquote>
                            <p class="source">@LisaW, Bristol</p>
                        </div><!--//quote-content-->
                    </div><!--//quote-->
                </div><!--//content-->
                <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                    <img class="img-responsive" src="../resources/assets/images/figures/figure-1.png" alt="" />
                    <figcaption class="figure-caption">(Screenshot: Coral - App &amp; website startup kit) </figcaption>
                </figure>
            </div><!--//item-->

            <div class="row item">
                <div class="content col-md-push-8 col-sm-push-0 col-xs-push-0 col-xs-12 col-md-4">
                    <h3 class="title">Works across all devices</h3>
                    <div class="desc">
                        <p>Explain one of your product benefits here. Let users know how they can benefit using your product. It’s also a good idea to back it up with a testimonial or tweet from your users.</p>
                        <p>The original PSD of the graphic is included in the package. You can easily customise the PSD to meet your needs.</p>
                        <p><i class="fa fa-download"></i> <a href="download.html">Download mobile versions</a></p>
                    </div>

                    <div class="quote">
                        <div class="quote-profile">
                            <img class="img-responsive img-circle" src="../resources/assets/images/people/profile-s-2.png" alt="" />
                        </div><!--//profile-->
                        <div class="quote-content">
                            <blockquote><p>I find the mobile app very useful when I'm on the go. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p></blockquote>
                            <p class="source">@JackT, San Francisco</p>
                        </div><!--//quote-content-->
                    </div><!--//quote-->
                </div><!--//content-->
                <figure class="figure col-md-pull-4 col-sm-pull-0 col-xs-pull-0 col-xs-12 col-md-7">
                    <img class="img-responsive" src="../resources/assets/images/figures/figure-2.png" alt="" />
                    <div class="control text-center">
                        <button type="button" class="play-trigger" data-toggle="modal" data-target="#modal-video"><i class="fa fa-play"></i></button>
                    </div><!--//control-->
                </figure>
            </div><!--//item-->

            <div class="row item ">
                <div class="content col-xs-12 col-md-4">
                    <h3 class="title">Easy to customise</h3>
                    <div class="desc">
                        <p>Explain one of your product benefits here. Let users know how they can benefit using your product. It’s also a good idea to back it up with a testimonial or tweet from your users.</p>
                        <p>The original PSD of the graphic is included in the package. You can easily customise the PSD to meet your needs.</p>
                    </div>
                    <div class="quote">
                        <div class="quote-profile">
                            <img class="img-responsive img-circle" src="../resources/assets/images/people/profile-s-3.png" alt="" />
                        </div><!--//profile-->
                        <div class="quote-content">
                            <blockquote><p>Nice template! It’s practical and there is no gimmicks. Very easy to customise as well!</p></blockquote>
                            <p class="source"><a href="#">@AlexD</a>, London</p>
                        </div><!--//quote-content-->
                    </div><!--//quote-->
                </div><!--//content-->
                <figure class="figure col-md-offset-1 col-sm-offset-0 col-xs-offset-0 col-xs-12 col-md-7">
                    <img class="img-responsive" src="../resources/assets/images/figures/figure-3.png" alt="" />
                    <figcaption class="figure-caption">(Screenshot: <a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-startups-tempo/?ref=3wm" target="_blank">Tempo - Bootstrap template for startups)</a> </figcaption>

                </figure>
            </div><!--//item-->
        </div><!--//container-->
    </section><!--//why-->
</div><!--//section-wrapper-->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')
