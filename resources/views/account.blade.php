<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_account')

<div class="blog-slider">
    <!-- Création du background de la page -->
    <div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
    </div><!--//headline-bg-->
</div><!--//flexslider-->

<div class="sections-wrapper">
    <section id="why" class="section why">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>List of watched series</h2>
                    @foreach($series as $s)
                        {!! $s->original_name !!}<br>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h2>Recommandation of series</h2>
                    {!! Form::open() !!}
                    {!! Form::submit('Recommandation by series genre', array('class'=>'btn btn-primary')) !!}
                    <br><br>
                    {!! Form::submit('Recommandation by series creator', array('class'=>'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')