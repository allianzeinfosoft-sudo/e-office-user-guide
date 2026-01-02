@extends('layouts.app')

@section('title', 'User Guide')

@section('hero')
<style>
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
    background: #fff;
    border-right: 1px solid #dee2e6;
    position: sticky;
    top: calc(var(--header-height) + var(--hero-height) + 20px);
    max-height: calc(100vh - var(--header-height) - var(--hero-height) - var(--footer-height) - 40px);
    overflow-y: auto;
    border-radius: 12px;
}

/* CONTENT */
.content-area {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
}

/* MOBILE */
@media (max-width: 991.98px) {
    .desktop-sidebar { display: none; }
    .mobile-index-btn {
        position: sticky;
        top: calc(var(--header-height) + var(--hero-height) + 10px);
        z-index: 1010;
    }
}
</style>

<section class="hero-fixed">
    <div class="container text-center">
        <h1 class="fw-bold">USER GUIDE</h1>
        <p class="text-secondary">Find answers instantly!</p>
        <div class="input-group mx-auto" style="max-width:600px">
            <input class="form-control" placeholder="Search your question here...">
            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row px-4">

        <!-- Desktop Sidebar -->
        <aside class="col-lg-3 col-md-4 desktop-sidebar">
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

        <!-- Content -->
        <main class="col-lg-9 col-md-8">
            <div class="d-lg-none mb-3 mobile-index-btn">
                <button class="btn btn-primary w-100" data-bs-toggle="offcanvas" data-bs-target="#mobileIndex">
                    <i class="bi bi-list"></i> Open Index
                </button>
            </div>

            <div class="content-area shadow-sm">
                <section id="intro"><h3>Introduction</h3><hr></section>
                <section id="start"><h3>Getting Started</h3><hr></section>
                <section id="specs"><h3>Technical Specifications</h3><hr></section>
                <section id="support"><h3>Technical Support</h3><hr></section>
                <section id="safety"><h3>Safety Warnings</h3></section>
            </div>
        </main>

    </div>
</div>

<!-- Mobile Index -->
<div class="offcanvas offcanvas-start" id="mobileIndex">
    <div class="offcanvas-header">
        <h5>Index</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
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
@endsection
