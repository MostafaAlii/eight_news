<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Cairo:300,400&amp;subset=arabic,latin-ext" rel="stylesheet">
<style>
    html,
    body,
    li,
    a,
    i,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    label,
    table,
    .btn,
    .alert {
        font-family: 'Cairo', sans-serif;
    }
</style>
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/datatable/datatable_bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/datatable/responsive_bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/datatable/buttons_bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/js/switch/dist/switch.css') }}" rel="stylesheet">
<!--- Style css -->
@if (App::getLocale() == 'en')
<link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
<style>
    .scrollbar {
        overflow-x: hidden !important;
    }
</style>
@else
<link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
<link href="{{ URL::asset('assets/css/select2.min.css') }}" rel="stylesheet">

