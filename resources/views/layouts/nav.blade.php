<nav class="navbar navbar-fixed-top navbar-toggleable-md navbar-expand-md navbar-light">
    <div class="container">
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <a class="navbar-brand" href="#">SeriTV</a>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="mt-2 mt-md-0">
                <a href="/logout"><i class="fa fa-power-off"></i></a>
            </div>
          </div>
    </div>
</nav>
