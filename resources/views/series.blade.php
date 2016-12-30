<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_series')

<!-- Création du background de la page -->
<div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
</div><!--//headline-bg-->

<!-- Contenu de la page à propos -->
<section class="story-section section section-on-bg">
    <h2 class="title container text-center">Recherche de séries</h2>
    <div class="story-container container text-center">
                <div class="story-container-inner">
            <!-- Description et contenu textuel de la page -->

            <!-- Ouverture du formulaire de recherche de série -->
            {!! Form::open() !!}

            <!-- Div qui permet d'afficher les erreur de validation de formulaire lorsqu'il y en a -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Choix du type de recherche de série -->
            <div class="form-group">
                <center>{!! Form::label('Type de recherche') !!}</center>
                {!! Form::select('recherche', ['N' => 'Recherche par nom',
                                               'G' => 'Recherche par genre',
                                               'R' => 'Recherche par réalisateur'],
                'N', ['class' => 'recherche select']); !!}
            </div>

            <!-- Champ de saisie du nom de la série recherchée -->
            <div class="form-group nom">
                <center>{!! Form::label('Nom de la série recherchée') !!}</center>
                {!! Form::text('nom', null, array('required', 'class'=>'form-control', 'placeholder'=>'Nom de la série')) !!}
            </div>

            <!-- Liste des checkboxs pour la recherche de séries par genre -->
            <div class="form-group genre">
                <center>{!! Form::label('Nom du genre recherché') !!}</center>
                <div class="row">
                    <div class="col-md-3">Adventure {!! Form::checkbox('genre[]', 'Adventure') !!}</div>
                    <div class="col-md-3">Fantasy {!! Form::checkbox('genre[]', 'Fantasy') !!}</div>
                    <div class="col-md-3">Animation {!! Form::checkbox('genre[]', 'Animation') !!}</div>
                    <div class="col-md-3">Drama {!! Form::checkbox('genre[]', 'Drama') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Comedy {!! Form::checkbox('genre[]', 'Comedy') !!}</div>
                    <div class="col-md-3">History {!! Form::checkbox('genre[]', 'History') !!}</div>
                    <div class="col-md-3">Western {!! Form::checkbox('genre[]', 'Western') !!}</div>
                    <div class="col-md-3">Thriller {!! Form::checkbox('genre[]', 'Thriller') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Science Fiction {!! Form::checkbox('genre[]', 'Science Fiction') !!}</div>
                    <div class="col-md-3">Mystery {!! Form::checkbox('genre[]', 'Mystery') !!}</div>
                    <div class="col-md-3">Music {!! Form::checkbox('genre[]', 'Music') !!}</div>
                    <div class="col-md-3">Romance {!! Form::checkbox('genre[]', 'Romance') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Action & Adventure {!! Form::checkbox('genre[]', 'Action & Adventure') !!}</div>
                    <div class="col-md-3">Kids {!! Form::checkbox('genre[]', 'Kids') !!}</div>
                    <div class="col-md-3">News {!! Form::checkbox('genre[]', 'News') !!}</div>
                    <div class="col-md-3">Reality {!! Form::checkbox('genre[]', 'Reality') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Talk {!! Form::checkbox('genre[]', 'Talk') !!}</div>
                    <div class="col-md-3">War & Politics {!! Form::checkbox('genre[]', 'War & Politics') !!}</div>
                    <div class="col-md-3">TV Movie {!! Form::checkbox('genre[]', 'TV Movie') !!}</div>
                    <div class="col-md-3">Sci-Fi & Fantasy {!! Form::checkbox('genre[]', 'Sci-Fi & Fantasy') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Soap {!! Form::checkbox('genre[]', 'Soap') !!}</div>
                    <div class="col-md-3">Family {!! Form::checkbox('genre[]', 'Family') !!}</div>
                    <div class="col-md-3">War {!! Form::checkbox('genre[]', 'War') !!}</div>
                    <div class="col-md-3">Crime {!! Form::checkbox('genre[]', 'Crime') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Documentary {!! Form::checkbox('genre[]', 'Documentary') !!}</div>
                    <div class="col-md-3">Horror {!! Form::checkbox('genre[]', 'Horror') !!}</div>
                    <div class="col-md-3">Action {!! Form::checkbox('genre[]', 'Action') !!}</div>
                </div>
            </div>

            <!-- Champ de saisie du nom du réalisateur de la série recherchée -->
            <div class="form-group realisateur">
                <center>{!! Form::label('Nom du réalisateur recherché') !!}</center>
                {!! Form::text('realisateur', null, array('required', 'class'=>'form-control', 'placeholder'=>'Nom du réalisateur')) !!}
            </div>

            <!-- Choix du nombre de résultats retournés -->
            <div class="form-group">
                <center>{!! Form::label('Nombre de résultats') !!}</center>
                {!! Form::select('taille', ['10' => '10 résultats retournés',
                                               '20' => '20 résultats retournés',
                                               '50' => '50 résultats retournés',
                                               '100' => '100 résultats retournés',
                                               'X' => 'Retourne tous les résultats de la recherche'],
                '10', ['class' => 'nbResult select']); !!}
            </div>

            <!-- Bouton d'envoi du formulaire de recherche de série -->
            <center>{!! Form::submit('Rechercher', array('class'=>'btn btn-primary')) !!}</center>
            <!-- Fermeture du formulaire de recherche de série -->
            {!! Form::close() !!}
        </div>
    </div>
</section><!-- Fin de du contenu de la page -->


<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')