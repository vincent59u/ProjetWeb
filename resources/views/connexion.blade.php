<!-- Appel de la barre de navigation commune à tout le site -->
@include('layouts.header_connexion')

<!-- Background de la page composé d'une images aléatoire de la base de données -->
<div class="headline-bg" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $image->backdrop_path ?>');">
</div><!--//headline-bg-->

<!-- Contenu de la page à propos -->
<section class="story-section section section-on-bg">
    <h2 class="title container text-center">Log in</h2>
    <div class="story-container container text-center">
        <div class="story-container-inner">
            <div class="panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        @if(Session::has('message-error'))
                            <div class="alert alert-danger">
                                {{Session::get('message-error')}}
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- Fin de du contenu de la page -->

<!-- Appel du footer commun à tout le site -->
@include('layouts.footer')