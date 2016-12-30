<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_account')

<div class="blog-slider">
    <!-- Création du background de la page -->
    <div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
    </div><!--//headline-bg-->
</div><!--//flexslider-->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')