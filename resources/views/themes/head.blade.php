<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SuperAdmin | Dashboard</title>
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    @yield('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous">

    <style>
        @font-face {
            font-family: 'THSarabun';
            src: url('{{ asset('fonts/THSarabun.ttf') }}') format('truetype');
            font-size: 22px;
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'THSarabun';
            src: url('{{ asset('fonts/THSarabun Bold.ttf') }}') format('truetype');
            font-size: 22px;
            font-weight: bold;
            font-style: normal;
        }

        @font-face {
            font-family: 'THSarabun';
            src: url('{{ asset('fonts/THSarabun Italic.ttf') }}') format('truetype');
            font-size: 22px;
            font-weight: normal;
            font-style: italic;
        }

        @font-face {
            font-family: 'THSarabun';
            src: url('{{ asset('fonts/THSarabun BoldItalic.ttf') }}') format('truetype');
            font-size: 22px;
            font-weight: bold;
            font-style: italic;
        }

        /* บังคับใช้ทั้ง AdminLTE */
        body,
        .content-wrapper,
        .content,
        .card,
        .card-body,
        .small-box,
        .small-box .inner,
        .nav-link,
        .brand-text,
        .sidebar,
        .main-header,
        .table,
        .form-control,
        label {
            font-family: 'THSarabun', sans-serif !important;
        }
    </style>

</head>
