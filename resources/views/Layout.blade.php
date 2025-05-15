<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        header {
            background: linear-gradient(135deg, #001f3d, #003366); /* Dégradé de bleu nuit */
            color: white;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem; /* Réduire l'espace entre les éléments */
        }
        nav ul li {
            position: relative;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Effet de survol léger */
            transform: translateY(-2px);
        }
        nav ul li a i {
            font-size: 1.2rem;
        }

        /* Menu déroulant */
        nav ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #003366;
            padding: 0.5rem;
            border-radius: 5px;
        }
        nav ul li:hover > ul {
            display: block;
        }

        nav ul li ul li a {
            padding: 0.5rem 1rem;
            font-size: 0.95rem;
        }

        main {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, #001f3d, #003366); /* Dégradé de bleu nuit */
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <nav>
            <div>
                <h1 style="font-size: 7 rem; font-weight: 800,margin: 0; text-align: veryleft;">LOGISTIQUE</h1>
            </div>
            <ul>
                <li><a href="/"><i class="fas fa-home"></i>Accueil</a></li>
                <li><a href="/about"><i class="fas fa-info-circle"></i>À propos</a></li>
                <li><a href="/contact"><i class="fas fa-envelope"></i>Contact</a></li>

                <!-- Menu déroulant pour les matériels -->
                <li>
                    <a href="#"><i class="fas fa-cogs"></i>Matériels</a>
                    <ul>
                        <li><a href="{{ route('roulants.create') }}">Roulants</a></li>
                        <li><a href="{{ route('informatique') }}">Matériels d'Informatique</a></li>
                        <li><a href="/materiels">Matériels de bureau</a></li>
                    </ul>
                </li>

                <!-- Menu déroulant pour le personnel -->
                <li>
                    <a href="#"><i class="fas fa-users"></i>Personnel</a>
                    <ul>
                    <li><a href="{{ route('personnels.create') }}">Inscription Personnel</a></li>
                    
                        <li><a href="{{ route('personnels.index') }}"><i class="fas fa-users"></i>Liste du Personnel</a></li>

                    </ul>
                </li>

                <li><a href="/types"><i class="fas fa-list"></i>Types</a></li>
                <li><a href="{{ route('inventaire.index') }}"><i class="fas fa-clipboard-list"></i>Inventaire</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p style="margin: 0; font-size: 0.9rem;">&copy; LOGISTIQUE</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
