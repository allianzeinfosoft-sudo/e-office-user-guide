<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'User Guide | Network')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')
    <style>
        /* SIDEBAR TREE */
        .sidebar .nav-item {
            margin-bottom: 4px;
        }

        .sidebar .topic-item {
            display: block;
            padding: 6px 10px;
            border-radius: 6px;
            color: #212529;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar .topic-item:hover {
            background-color: #e7f1ff;
            color: #0d6efd;
        }

        /* Sub-level indentation */
        .sidebar .nav .nav {
            margin-left: 12px;
        }
        /* Sidebar toggle */

        .topic-row {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .toggle-icon {
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease;
            color: #6c757d;
        }

        .toggle-icon.rotate {
            transform: rotate(90deg);
        }

        .topic-children {
            margin-left: 16px;
            display: none;
        }

        .topic-children.show {
            display: block;
        }
        /* Remove underline from topic links */
        .sidebar a.topic-item {
            text-decoration: none;
        }

        .sidebar a.topic-item:hover,
        .sidebar a.topic-item:focus,
        .sidebar a.topic-item:active {
            text-decoration: none;
        }
        .ck-editor__editable {
            min-height: 600px;
        }
    </style>
</head>
<body>

@include('partials.header')

@include('partials.hero')
<div class="container-fluid mt-4">
    <div class="row px-4">

          <aside class="col-lg-3 col-md-4 mb-4 desktop-sidebar">
               <div class="sidebar p-3 shadow-sm">
                    <h6 class="fw-bold text-uppercase mb-3">Index</h6>
                    @auth
                        <button data-bs-toggle="modal"
                                data-bs-target="#addTopicModal"
                                class="btn btn-sm btn-primary mt-3">
                            ➕ Add Topic
                        </button>
                        @endauth

                    <nav class="nav flex-column">
                         @include('partials.sidebar')
                    </nav>
               </div>
          </aside>

          <main class="col-lg-9 col-md-8">
          <!-- MOBILE INDEX BUTTON -->
               <div class="d-lg-none mb-3 mobile-index-btn">
                    <button class="btn btn-primary w-100"
                         data-bs-toggle="offcanvas"
                         data-bs-target="#mobileIndex">
                         <i class="bi bi-list"></i> Open Index
                    </button>
               </div>

               @yield('content')

          </main>

     </div>
</div>

@include('partials.footer')


<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    @error('email')
                         <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <button class="btn btn-primary w-100">Login</button>
               </form>
            </div>
        </div>
    </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                    <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>

                    @if ($errors->any())
                         <div class="text-danger small mb-2">{{ $errors->first() }}</div>
                    @endif

                    <button class="btn btn-success w-100">Create Account</button>
               </form>

            </div>
        </div>
    </div>
</div>

<!-- Topic MODAL -->
<div class="modal fade" id="addTopicModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Topic</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('topics.store') }}">
                @csrf

                <input name="title" class="form-control mb-2" placeholder="Topic name">

                <select name="parent_id" class="form-select mb-2">
                    <option value="">— Main Topic —</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                    @endforeach
                </select>

                <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



@stack('scripts')

<script>
    function toggleChildren(icon) {
        const container = icon.closest('.nav-item').querySelector('.topic-children');
        icon.classList.toggle('rotate');
        container.classList.toggle('show');
    }
</script>

</body>
</html>
