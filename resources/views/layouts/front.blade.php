<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk+pcg0N63PL6b5fTAOw6Fj9lvh8L1z2t+o" crossorigin="anonymous"></script>
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000; /* Pour s'assurer que le menu reste au-dessus du contenu */
            overflow-y: auto; /* Permettre le défilement vertical si le menu dépasse la hauteur de la fenêtre */
            width: 100%; /* Prendre 100% de la largeur de la fenêtre */
            padding-top: 56px; /* Hauteur du header pour éviter qu'il ne soit masqué par le header */
        }
        .logout-btn {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <!-- Votre header -->
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    Menu Item 1
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Menu Item 2
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="logout-btn text-center">
                        <a href="{{ route('logout') }}" class="btn btn-danger">Déconnexion</a>
                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-sm-auto px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Section Title</h1>
                    </div>

                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </main>

    <footer>
        <!-- Votre footer -->
    </footer>
</body>
</html>
