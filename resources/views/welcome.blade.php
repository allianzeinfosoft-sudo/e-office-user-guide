<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>User Guide | Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    :root {
        --header-height: 64px;
        --hero-height: 160px;
        --footer-height: 70px;
    }

    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        background-color: #f4f6f9;
        padding-top: calc(var(--header-height) + var(--hero-height));
        padding-bottom: var(--footer-height);
    }

    /* HEADER */
    .navbar {
        height: var(--header-height);
    }

    /* FIXED HERO */
    .hero-fixed {
        position: fixed;
        top: var(--header-height);
        left: 0;
        width: 100%;
        height: var(--hero-height);
        background: linear-gradient(135deg, #0d1117, #161b22);
        color: #fff;
        z-index: 1020;
        display: flex;
        align-items: center;
    }

    /* SIDEBAR */
    .sidebar {
        background: #ffffff;
        border-right: 1px solid #dee2e6;
        position: sticky;
        top: calc(var(--header-height) + var(--hero-height) + 20px);
        max-height: calc(100vh - var(--header-height) - var(--hero-height) - var(--footer-height) - 40px);
        overflow-y: auto;
        border-radius: 12px;
    }

    .sidebar .nav-link {
        color: #333;
        font-weight: 500;
        border-radius: 8px;
    }

    .sidebar .nav-link.active {
        background: #0d6efd;
        color: #fff;
    }

    /* CONTENT */
    .content-area {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        min-height: 600px;
    }

    /* FIXED FOOTER */
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: var(--footer-height);
        background: #0d1117;
        color: #9da3af;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1030;
    }
    .auth-link {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease-in-out;
    }

    .auth-link:hover {
        color: #0d6efd;
        text-decoration: none;
    }

    /* MOBILE CONTENT FIX */
    @media (max-width: 991.98px) {

        body {
            padding-top: calc(var(--header-height) + var(--hero-height) + 10px);
        }

        .content-area {
            padding: 20px;
            border-radius: 12px;
        }

        /* Hide desktop sidebar */
        .desktop-sidebar {
            display: none;
        }

        /* Mobile index button */
        .mobile-index-btn {
            position: sticky;
            top: calc(var(--header-height) + var(--hero-height) + 10px);
            z-index: 1010;
        }
    }
</style>

</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold" href="#"><i class="bi bi-book"></i> Allianze | E-Office</a>
        <div class="d-none d-lg-flex align-items-center">
            <button class="btn btn-link auth-link me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                Login
            </button>
            <button class="btn btn-link auth-link"
                    data-bs-toggle="modal"
                    data-bs-target="#registerModal">
                Register
            </button>
        </div>

        <!-- MOBILE AUTH DROPDOWN -->
        <div class="dropdown d-lg-none">
            <button class="btn btn-outline-light dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                Account
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                        Login
                    </a>
                </li>
                <li>
                    <a class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#registerModal">
                        Register
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- HERO -->
<section class="hero-fixed">
    <div class="container text-center">
        <h1 class="fw-bold">USER GUIDE</h1>
        <p class="text-secondary mb-3">Find answers instantly!</p>

        <div class="input-group mx-auto" style="max-width: 600px;">
            <input type="text" class="form-control" placeholder="Search your question here...">
            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="container-fluid mt-4">
    <div class="row px-4">

        <!-- SIDEBAR -->
        <aside class="col-lg-3 col-md-4 mb-4 desktop-sidebar">
            <div class="sidebar p-3 shadow-sm">
                <h6 class="fw-bold text-uppercase mb-3">Index</h6>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#intro">Introduction</a>
                    <a class="nav-link" href="#start">Getting Started</a>
                    <a class="nav-link" href="#specs">Technical Specifications</a>
                    <a class="nav-link" href="#support">Technical Support</a>
                    <a class="nav-link" href="#safety">Safety Warnings</a>
                </nav>
            </div>
        </aside>

        <!-- CONTENT -->
        <main class="col-lg-9 col-md-8">
            <!-- MOBILE INDEX BUTTON -->
            <div class="d-lg-none mb-3 mobile-index-btn">
                <button class="btn btn-primary w-100"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#mobileIndex">
                    <i class="bi bi-list"></i> Open Index
                </button>
            </div>

            <div class="content-area shadow-sm">

                <section id="intro">
                    <h3>Introduction</h3>
                    <p class="text-muted">Welcome to the Network User Guide.</p>
                    <hr>
                </section>

                <section id="start">
                    <h3>Getting Started</h3>
                    <p class="text-muted">Step-by-step instructions.</p>
                    <hr>
                </section>

                <section id="specs">
                    <h3>Technical Specifications</h3>
                    <p class="text-muted">Detailed specs.</p>
                    <hr>
                </section>

                <section id="support">
                    <h3>Technical Support</h3>
                    <p class="text-muted">Help & troubleshooting.</p>
                    <hr>
                </section>

                <section id="safety">
                    <h3>Safety Warnings</h3>
                    <p class="text-muted">Important safety instructions.</p>
                </section>

            </div>
        </main>

    </div>
</div>

<!-- FOOTER -->
<footer class="text-center py-4">
    <small>© 2025 Network. All rights reserved.</small>
</footer>


<!-- MOBILE INDEX OFFCANVAS -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileIndex">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Index</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav flex-column">
            <a class="nav-link" href="#intro" data-bs-dismiss="offcanvas">Introduction</a>
            <a class="nav-link" href="#start" data-bs-dismiss="offcanvas">Getting Started</a>
            <a class="nav-link" href="#specs" data-bs-dismiss="offcanvas">Technical Specifications</a>
            <a class="nav-link" href="#support" data-bs-dismiss="offcanvas">Technical Support</a>
            <a class="nav-link" href="#safety" data-bs-dismiss="offcanvas">Safety Warnings</a>
        </nav>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
