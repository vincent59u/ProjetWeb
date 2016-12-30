<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_series')


<div class="blog-slider">
    <!-- Création du background de la page -->
    <div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
    </div><!--//headline-bg-->
</div><!--//flexslider-->
<!-- ******BLOG LIST****** -->
<div class="blog container">
    <div class="row">
        <div id="blog-mansonry" class="blog-list">
            @if(sizeof($result) == 0)
                <div class="row">
                    <center><h1>Désolé, votre recherche n'a produit<br>aucun résultat</h1><br></center>
                </div>
            @else
                @foreach(array_chunk($result->all(), 3) as $row)
                    <div class="row">
                        @foreach($row as $r)
                            <article class="post col-md-4 col-sm-6 col-xs-12">
                                <div class="post-inner">
                                    <figure class="post-thumb">
                                        <img class="img-responsive" src="https://image.tmdb.org/t/p/original/{!! $r->backdrop_path !!}" alt="image" />
                                    </figure><!--//post-thumb-->
                                    <div class="content">
                                        <h3 class="post-title">{!! $r->original_name !!}</h3>
                                        <div class="post-entry">
                                            <p class="overview">{!! $r->overview !!}</p>
                                            <a id="read">Read more &rarr;</a>
                                        </div>
                                        <div class="meta">
                                            <ul class="meta-list list-inline">
                                                <li class="post-time post_date date updated">First air date {!! $r->first_air_date !!}</li>
                                            </ul><!--//meta-list-->
                                        </div><!--meta-->
                                    </div><!--//content-->
                                </div><!--//post-inner-->
                            </article><!--//post-->
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div><!--//blog-list-->
    </div><!--//row-->
</div><!--//blog-->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')