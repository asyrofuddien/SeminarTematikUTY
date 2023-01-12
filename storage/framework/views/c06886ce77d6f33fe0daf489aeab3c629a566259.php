<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebarMenu collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <?php if(auth()->user()->is_admin===1): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door"></i>
            Dashboard
          </a>
        </li>
        <?php endif; ?>
        <?php if(auth()->user()->is_admin===1): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/katalog*') ? 'active' : ''); ?>" href="/dashboard/katalog">
            <i class="bi bi-newspaper"></i>
            Katalog Produk
          </a>
        </li>
        <?php endif; ?>
        <?php if(auth()->user()->is_admin===1): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/katalog*') ? 'active' : ''); ?>" href="/dashboard/pesanan">
            <i class="bi bi-cart"></i>
            Pesanan
          </a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/katalog*') ? 'active' : ''); ?>" href="/">
            <i class="bi bi-house-door"></i>
            Kembali Ke Beranda
          </a>
        </li>
      </ul>
      
    </div>
  </nav><?php /**PATH C:\Users\tuf\meubelku\resources\views/dashboard/layout/sidebar.blade.php ENDPATH**/ ?>