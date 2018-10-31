<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
</button>
<a class="navbar-brand" href="#"><h3 class="masthead-brand"> Portal</h3></a>


<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
</ul>
<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
<li class="nav-item">
<a class="nav-link" href="/class">Classes</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/forum">Forum</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/lectures">Lectures</a>
</li>
@if(Auth::guest)
<li class="nav-item">
<a class="nav-link" href="/register">Register</a>
</li>
@endif
</div>
</nav>