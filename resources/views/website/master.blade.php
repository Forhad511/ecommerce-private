<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}{{asset('/')}}website/assets/images/favicon.svg" />
    @include('website.includes.style')
</head>
<body>


<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>


@include('website.includes.header')

@yield('body')

@include('website.includes.footer')

@include('website.includes.script')
</body>

</html>
