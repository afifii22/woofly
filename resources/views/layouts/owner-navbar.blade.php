<nav>
    <a href="{{ route('owner.dashboard') }}">WOOFLY</a>

    <div>
        <details>
            <summary>👤 {{ Auth::user()->nama }}</summary>

            <a href="{{ route('owner.profile') }}">
                Ubah Profil
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </details>
    </div>
</nav>