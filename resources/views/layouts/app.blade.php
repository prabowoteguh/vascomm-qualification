<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    @include('core.style')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('partials.header')
        @include('partials.layoutoptions')
        <div class="app-main">
            @include('partials.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @include('partials.breadcrumb')
                    @include('home')
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
    @include('core.script')
</body>

</html>