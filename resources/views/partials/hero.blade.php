<style>
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

</style>
<!-- HERO -->
<section class="hero-fixed">
    <div class="container text-center">
        <h1 class="fw-bold">USER GUIDE</h1>
        <p class="text-secondary mb-3">Find answers instantly!</p>

        {{-- <div class="input-group mx-auto" style="max-width: 600px;">
            <input type="text" class="form-control" placeholder="Search your question here...">
            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div> --}}
    </div>
</section>