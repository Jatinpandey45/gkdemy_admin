<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GKDemy</title>
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('js/manifest.json')}}" rel="manifest">
    </head>
    <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0" class="body-scrolled navbar-scrolled">
        {{-- @isset($post)
            {{!! ssr('js/post-server.js')->context('post', $post)->render() !!}}
        @endisset --}}
        <div id="root">
        </div>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>