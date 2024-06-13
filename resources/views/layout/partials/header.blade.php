<style>
    .header {
        display: flex;
        justify-content: center;
        gap: 2rem;
    }
</style>

<div class="header">
    @if (!Auth::check())
        <div><a href="{{ route('user.register') }}">Register</a></div>
        <div><a href="{{ route('user.login') }}">Login</a></div>
    @endif
    @if (Auth::check())
        <div> <a href="{{ route('user.logout') }}">Logout</a></div>
    @endif
    <div></div>
</div>
