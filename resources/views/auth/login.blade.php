@extends('main')

@section('title', ' | Login')

@section('content')
    <div class="container">
        <div class="row">

            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="input-field col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">mail_outline</i>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" length="255" maxlength="255" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="input-field col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">lock_outline</i>
                    <label for="password">Password</label>                   
                    <input id="password" type="password" class="form-control" name="password" length="255" maxlength="255" minlength="5" required>
                </div>

                <div class="col col s12 m8 l4 offset-m2 offset-l4">
                    <p><a href="{{ url('password/reset') }}">Forgot my password</a></p>
                </div>  

                <div class="input-field col s12 m8 l4 offset-m2 offset-l4">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
                    <label for="remember">Remember me</label>
                </div>
                
                <div class="input-field center-align col s12">
                    <input type="submit" value="Login" class="btn waves-effect waves-light">
                </div>  
            </form> 

        </div>
    </div>
@stop