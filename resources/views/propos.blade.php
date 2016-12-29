<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_propos')

<!-- Background de la page composé d'une images aléatoire de la base de données -->
<div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
</div><!--//headline-bg-->

<!-- Contenu de la page à propos -->
<section class="story-section section section-on-bg">
    <h2 class="title container text-center">A propos</h2>
    <div class="story-container container text-center">
        <div class="story-container-inner">
            <!-- Description et contenu textuel de la page -->
            <div class="about">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                <blockquote class="belife">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</blockquote>
            </div>
            <!-- Partie de présentation de l'équipe -->
            <div class="team row">
                <h3 class="title">Découvrez l'équipe</h3>
                <div class="member col-md-3 col-sm-6 col-xs-12">
                    <!-- Case qui représente un membre de l'equipe -->
                    <div class="member-inner">
                        <figure class="profile">
                            <img class="img-responsive" src="../resources/assets/images/equipe/anonyme.jpeg" alt=""/>
                            <figcaption class="info">
                                <span class="name">Matthieu VINCENT</span>
                                <br />
                                <span class="job-title">Dévellopeur</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <!-- Case qui représente un membre de l'equipe -->
                <div class="member col-md-3 col-sm-6 col-xs-12">
                    <div class="member-inner">
                        <figure class="profile">
                            <img class="img-responsive" src="../resources/assets/images/equipe/anonyme.jpeg" alt=""/>
                            <figcaption class="info"><span class="name">Mervine LIEFFROY</span><br /><span class="job-title">Développeur</span></figcaption>
                        </figure>
                    </div>
                </div>
                <!-- Case qui représente un membre de l'equipe -->
                <div class="member col-md-3 col-sm-6 col-xs-12">
                    <div class="member-inner">
                        <figure class="profile">
                            <img class="img-responsive" src="../resources/assets/images/equipe/anonyme.jpeg" alt=""/>
                            <figcaption class="info"><span class="name">Justine SCHMITT</span><br /><span class="job-title">Développeur</span></figcaption>
                        </figure>
                    </div>
                </div>
                <!-- Case qui représente un membre de l'equipe -->
                <div class="member col-md-3 col-sm-6 col-xs-12">
                    <div class="member-inner">
                        <figure class="profile">
                            <img class="img-responsive" src="../resources/assets/images/equipe/anonyme.jpeg" alt=""/>
                            <figcaption class="info"><span class="name">Raphaël SELSEK</span><br /><span class="job-title">Développeur</span></figcaption>
                        </figure>
                    </div>
                </div>
            </div><!-- Fin de la partie de présentation de l'équipe-->
        </div>
    </div>
</section><!-- Fin de du contenu de la page -->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')