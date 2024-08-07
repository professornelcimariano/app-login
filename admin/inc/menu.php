<style>
  .nav-item {
    border-bottom: 1px solid #666;
  }
</style>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $base ?>/admin/home.php"> <i class="bi bi-bar-chart-fill"></i> Painel CMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Painel CMS</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= $base ?>/admin/home.php">
              <i class="bi bi-house-fill"></i>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base ?>/admin/user/">
              <i class="bi bi-person-fill"></i>
              Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base ?>/admin/product/">
              <i class="bi bi-person-fill"></i>
              Produtos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base ?>/admin/car/">
              <i class="bi bi-person-fill"></i>
              Carros
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base ?>/admin/suplier/">
              <i class="bi bi-person-fill"></i>
              Fornecedores
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-airplane-fill"></i> Sistema
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#"> <i class="bi bi-arrow-right-short"></i> Action</a></li>
              <li><a class="dropdown-item" href="#"> <i class="bi bi-arrow-right-short"></i> Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#"> <i class="bi bi-arrow-right-short"></i> Something else here</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>