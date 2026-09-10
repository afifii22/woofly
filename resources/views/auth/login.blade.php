<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - WOOFLY</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="woofly-login-page">

    <div class="woofly-login-logo">
        <span class="logo-circle">W</span>
        <span>WOOFLY</span>
    </div>

    <div class="woofly-login-card">

        <div class="woofly-login-form">

            <div class="text-center mb-4">
                <h1>Welcome Back</h1>
                <p>Sign in to continue to WOOFLY.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger small">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="hello@woofly.com"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="mb-2">
                    <label for="password">Password</label>

                    <div class="woofly-password">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="••••••••"
                            required
                        >

                        <button type="button" onclick="togglePassword()">
                            ◉
                        </button>
                    </div>
                </div>

                <div class="text-end mb-4">
                    <a href="#" class="woofly-forgot">
                        Forgot Password?
                    </a>
                </div>

                <button type="submit" class="woofly-login-button">
                    Login
                </button>
            </form>

            <div class="woofly-register-text">
                Don't have an account?
                <a href="{{ route('register') }}">Register</a>
            </div>

        </div>

        <div class="woofly-login-image">
            <img
                src="{{ asset('images/login-dog.jpg') }}"
                alt="Anabul WOOFLY"
            >

            <div class="woofly-image-caption">
                <strong>"The loyalty of a true friend."</strong>
                <span>Join thousands of pet families today.</span>
            </div>
        </div>

    </div>

    <div class="woofly-back-home">
        <a href="{{ url('/') }}">
            ← Back to Home
        </a>
    </div>

</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');

    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}
</script>

</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - WOOFLY</title>
</head>
<body>
    <h1>WOOFLY</h1>
    <h2>Login</h2>

    @if ($errors->any())
        <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>

    <p>
        Belum punya akun? <a href="{{ route('register') }}">Register</a>
    </p>
    
</body>
</html> --}}