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
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

