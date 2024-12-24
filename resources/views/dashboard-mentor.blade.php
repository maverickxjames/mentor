<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .dashboard-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
        }
        .btn-secondary {
            margin-top: 1rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">MentorMyMate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               @php
                   if($mentor->status == 1) {
                       echo ' <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li><li class="nav-item">
                           <a class="nav-link" href="/dashboard">Dashboard</a>
                       </li>';
                   }
               @endphp
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div id="content" class="c-site-content">
        <main id="main" role="main" itemprop="mainContentOfPage" class="c-main">
            <div class="o-vc-layout">
                <div class="container d-flex justify-content-center">
                    <div class="dashboard-container text-center">
                        @php
                            if ($mentor->status == 0) {
                                echo '<div class="alert alert-warning" role="alert">Your account is under process. Please wait...</div>';
                            } else {
                                echo '<h1 class="mb-4">Welcome to Mentor Dashboard</h1>';
                            }
                        @endphp

                        @if ($mentor->status == 1)
                            <p class="lead">Manage your mentorship tasks, connect with students, and access resources below.</p>
                        @endif

                        <button onclick="window.location.href='/logout'" class="btn btn-secondary">Logout</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
