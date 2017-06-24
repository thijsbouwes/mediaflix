@extends('main')

@section('title', ' | Forgot my password')

@section('content')
    <div class="container">
        <div class="row">

            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="input-field col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">mail_outline</i>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" length="255" maxlength="255" value="{{ $email or old('email') }}" required autofocus>
                </div>

                <div class="input-field col col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">lock_outline</i>
                    <label for="password">New password</label>
                    <input id="password" type="password" class="form-control" name="password" length="255" maxlength="255" minlength="6" required>
                </div>

                <div class="input-field col col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">lock_outline</i>
                    <label for="password-confirm">Confirm password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" length="255" maxlength="255" minlength="6" required>
                </div>

                <div class="input-field center-align col s12">
                    <input type="submit" value="Register" class="btn waves-effect waves-light">
                </div>  
            </form> 

        </div>
    </div>
@stop