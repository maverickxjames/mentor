<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <meta name="generator" content="mentormate.com 2021 3.8.56" />
    <title>Login/Signup</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    {{-- swal fire cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: white;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group label {
            font-size: 1rem;
            color: #333;
        }

        .form-control {
            border-radius: 6px;
            /* padding: 12px; */
            font-size: 1rem;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .btn {
            width: 100%;
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            font-size: 0.9rem;
            margin-top: 20px;
            text-align: center;
        }

        /* Centered Form */
        .login-container {
            max-width: 450px;
            width: 100%;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
            }
        }

    </style>

</head>

<body>

    <div class="login-container">
        <h1>Login</h1>

        <!-- Login Form -->
        <form id="loginForm" method="POST" >
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password">
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="mentor">Mentor</option>
                    <option value="user">User</option>
                </select>
            </div>
 
            <button type="submit" onclick=login() class="btn btn-primary">Login</button>
        </form>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- External Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: '{{ route('login') }}', // Adjust with your route
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                email: $('#email').val(),
                password: $('#password').val(),
                role: $('#role').val(),
                _token: $('input[name="_token"]').val()
            },
         
            success: function(response) {
                Swal.fire({
                    title: 'Success',
                    text: response.message,
                    icon: 'success',
                    // confirmButtonText: 'Ok'
                }).then(() => {
                    window.location.href = response.redirect; 
                });
            },
            error: function(response) {
                Swal.fire({
                    title: 'Error',
                    text: response.responseJSON.message || 'An error occurred.',
                    icon: 'error',
                    // confirmButtonText: 'Ok'
                });
            }
        });
    });
</script>

</body>

</html>
