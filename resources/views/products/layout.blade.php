<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <style>
        /* ===== GLOBAL ===== */
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0 0 2rem 0;
            /* perpaduan biru tua & merah tua */
            background: radial-gradient(circle at top left, #071427, #2a0000 55%, #000000 100%);
            color: #ffffff;
        }

        .container {
            max-width: 960px;
        }

        /* ===== HEADER BAR DENGAN LOGO ===== */
        .header-bar {
            background: rgba(5, 5, 20, 0.95);      /* gelap, sedikit transparan */
            border-bottom: 1px solid #b33;
            padding: 0.75rem 0;
        }

        .header-inner {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-logo {
            height: 42px;
            width: auto;
            object-fit: contain;
        }

        .header-title {
            margin: 0;
            font-size: 1.7rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            color: #ffffff;
            /* sedikit glow supaya kebaca di background gelap */
            text-shadow:
                0 0 3px rgba(0, 0, 0, 0.8),
                0 0 8px rgba(255, 255, 255, 0.3);
        }

        /* ===== CARD ===== */
        .card {
            background-color: rgba(43, 0, 0, 0.92);   /* merah gelap transparan */
            color: #ffffff;
            border: 1px solid #660000;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(90deg, #0c3b8b, #800000);  /* biru tua ke maroon */
            border-color: #800000;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #1450b3, #a00000);
            border-color: #a00000;
        }

        .btn-warning {
            background-color: #cc5500;
            border-color: #cc5500;
            color: #ffffff;
        }
        .btn-warning:hover {
            background-color: #e06a10;
            border-color: #e06a10;
            color: #ffffff;
        }

        .btn-danger {
            background-color: #520303;
            border-color: #b30000;
        }
        .btn-danger:hover {
            background-color: #d00000;
            border-color: #d00000;
        }

        /* ===== TABLE ===== */
        .table {
            color: #ffffff;
        }
        .table thead {
            background-color: #1b2136;
        }
        .table tbody tr {
            background-color: rgba(43, 0, 0, 0.9);
        }
        .table tbody tr:nth-child(even) {
            background-color: rgba(15, 22, 46, 0.9);
        }

        /* ===== FORMS ===== */
        input.form-control,
        textarea.form-control,
        select.form-select {
            background-color: #1d2236;
            color: #ffffff;
            border: 1px solid #4a506e;
        }

        input.form-control::placeholder,
        textarea.form-control::placeholder {
            color: #c7c7c7;
        }

        input.form-control:focus,
        textarea.form-control:focus,
        select.form-select:focus {
            background-color: #252b45;
            color: #ffffff;
            border-color: #ff6666;
            box-shadow: 0 0 0 0.2rem rgba(255, 102, 102, 0.25);
        }

        /* spacing body */
        .page-padding {
            padding: 1.5rem 1rem 2rem;
        }
    </style>
</head>

<body>
    {{-- HEADER BAR + LOGO + JUDUL --}}
    <div class="header-bar">
        <div class="container">
            <div class="header-inner">
                <img 
                    src="{{ asset('images/logo-mirror-double-u.png') }}" 
                    alt="Mirror Double U Logo" 
                    class="header-logo"
                >
                <h1 class="header-title">My Products</h1>
            </div>
        </div>
    </div>

    <div class="page-padding">
        <div class="container mt-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
