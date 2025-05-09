<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
            <!-- Page Content -->
            <main>
                @include('partials.nav')
                @yield('content')
                @include('partials.footer')
                {{-- {{ $slot }} --}}

                <!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/67e43cf4ec7c9f190e0dcbec/1in9os7cb';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
</script> --}}
    <!--End of Tawk.to Script-->
            </main>
    </body>
</html>
