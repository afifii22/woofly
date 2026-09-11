<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register -WOOFLY</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="woofly-register-page">

    <div class="woofly-register-logo">
        <span class="logo-circle">W</span>
        <span>WOOFLY</span>
    </div>

    <div class="woofly-register-card">

        <div class="woofly-register-form">

            <div class="text-center mb-4">
                <h1>Create Your Account</h1>
                <p>Join WOOFLY and find your new best friend</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger small">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama">Full Name</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="John Doe" 
                    value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="hello@gmail.com"
                    value="{{ old('email') }}" required>
                </div>

                <div class="mb-2">
                    <label for="password">Password</label>
                    <div class="woofly-password">
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>

                        <button type="button" onclick="togglePassword()">
                            ◉
                        </button>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="woofly-password_confirmation">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                    
                        <button type="button" onclick="togglePassword()">
                            ◉
                        </button>
                    </div>
                </div>

                <button type="submit" class="woofly-register-button">
                    Register
                </button>
            </form>

            <div class="woofly-register-text">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </div>

        </div>

        <div class="woofly-register-image">
            <img
                src="{{ asset('images/register-dog.jpg') }}"
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
    const passwordConfirmation = document.getElementById('password_confirmation');

    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }

    if (passwordConfirmation.type === 'password') {
        passwordConfirmation.type = 'text';
    } else {
        passwordConfirmation.type = 'password';
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
    <title>Register - WOOFLY</title>
</head>
<body>
    <h1>WOOFLY</h1>
    <h2>Register</h2>

    @if ($errors->any())
        <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>

    <p>
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
</body>
</html> --}}