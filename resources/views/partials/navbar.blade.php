      <nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4">
        <div class="container">
          <a class="navbar-brand" href="/">TOP BLOG</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
          <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Welcome back, {{ auth()->user()->nama }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(auth()->user()->is_admin===1)
                  <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
                  <hr class="dropdown-divider">
                  @endif
                  @if(auth()->user()->is_admin===0)
                  <a class="dropdown-item" href="/dashboard/pembelian"><i class="bi bi-layout-text-sidebar-reverse"></i> Pembelian Saya</a>
                  <hr class="dropdown-divider">
                  @endif
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                      </button>
                    </form>
                  
                </div>
               </li>
            @else   
            <li class="nav-item">
                <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          </ul>
        @endauth
          </div>
        </div>
      </nav>