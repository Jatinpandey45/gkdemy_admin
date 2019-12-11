<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GKDemy</title>
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('js/manifest.json')}}" rel="manifest">
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-RTNY5R8LZR"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-RTNY5R8LZR');
        </script>

    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />

    </head>
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0" class="body-scrolled navbar-scrolled">
        <div id="root"></div>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>