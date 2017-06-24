<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
        @yield('stylesheet')
    </head>

    <body>
        <!--nav-->
        @include('partials._nav')

        <!--show meessages when set-->
        @include('partials._messages')

        <!--content-->
        <div id="app">
            @yield('content')        
        </div>

        <!--footer and js-->
        @include('partials._footer')
        @include('partials._javascript')
        @yield('scripts')
        
    </body>
</html>