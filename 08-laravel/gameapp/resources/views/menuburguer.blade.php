@guest 
<nav class="nav">
    <menu>
        <a href="{{ url('login') }}">
            <img src="{{ asset('images/ico-login.svg')}}" alt="">
            Login
        </a>
        <a href="{{ url('register') }}">
            <img src="{{ asset('images/ico-register.svg')}}" alt="">
            Register
        </a>
        <a href="{{ url('catalogue') }}">
            <img src="{{ asset('images/ico-catalogue.svg')}}" alt="">
            Catalogue
        </a>
    </menu>
</nav>
@endguest

@auth
<nav class="nav">
<figure class="avatar">
    <img class="mask" src="images/image-game.png" alt="">
    <img class="border" src="images/border-photo.svg" alt="">
</figure>
<h2>Sacarias Flores</h2>
<h4>Admin</h4>
<menu>
    <a href="myprofile.html">
        <img src="images/ico-profile.svg" alt="">
        My profile
    </a>
    <a href="{{ url('dashboard') }}">
        <img src="images/ico-dashboard.svg" alt="">
        Dashboard
    </a>
    <a href="catalogue.html">
        <img src="images/ico-logout.svg" alt="">
        Logout
    </a>
</menu>
</nav>
@endauth