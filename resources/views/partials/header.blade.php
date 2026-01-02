<style>
:root {
    --header-height: 64px;
    --hero-height: 160px;
    --footer-height: 70px;
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

/* AUTH LINKS */
.auth-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease-in-out;
}
.auth-link:hover {
    color: #0d6efd;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-book"></i> Allianze | E-Office
        </a>

        @auth
          <div class="dropdown">
               <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                    {{ auth()->user()->name }}
               </button>
               <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                         <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button class="dropdown-item text-danger">
                              Logout
                              </button>
                         </form>
                    </li>
               </ul>
          </div>
          @else
          <!-- Desktop -->
          <div class="d-none d-lg-flex">
               <button class="btn btn-link auth-link me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
               </button>
               <button class="btn btn-link auth-link" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
               </button>
          </div>

          <!-- Mobile -->
          <div class="dropdown d-lg-none">
               <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                    Account
               </button>
               <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
               </ul>
          </div>
          @endauth
    </div>
</nav>
