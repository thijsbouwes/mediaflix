@extends('main')

@section('title', ' | Forgot my password')

@section('content')
    <div class="container">
        <div class="row">

            @if (session('status'))
                <div class="card-panel green">
                    <span class="white-text"><strong>Status:</strong> {{ session('status') }}</span>
                </div>
            @endif
            
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="input-field col s12 m8 l4 offset-m2 offset-l4">
                    <i class="material-icons prefix">mail_outline</i>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" length="255" maxlength="255" required autofocus>
                </div>

                <div class="input-field center-align col s12">
                    <input type="submit" value="Reset Password" class="btn waves-effect waves-light">
                </div>  
            </form> 

        </div>
    </div>
@stop