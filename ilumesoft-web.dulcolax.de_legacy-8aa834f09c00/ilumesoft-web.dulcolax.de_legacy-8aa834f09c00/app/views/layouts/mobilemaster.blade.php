<!DOCTYPE html>
<html lang="de">
    @include('includes.head')
    <body class="{{$body_class}} section-{{ $MenuActive }}">
        @include('includes.header')

        <div id="content_wrapper">    
            @yield('content')    
        </div>

        @include('includes.footer')
        @include('includes.externalDisclaimer')
        @include('includes.script')
    </body>
</html>