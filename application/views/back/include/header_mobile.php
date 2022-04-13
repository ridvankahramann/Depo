<header class="header-mobile d-block d-lg-none" style="position:relative;">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="<?= base_url('index.php/list')?>">
                    <img src="<?= base_url('assets/')?>images/syroxlogo.png" alt="" height="134" width="613" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              <li>
                <a href="<?= base_url('index.php/unit_list');?>">
                    <i class="fas fa-tachometer-alt"></i>Birim</a>
              </li>
              <li>
                <a href="<?= base_url('index.php/products');?>">
                  <i class="far fa-check-square"></i>Ürünler</a>
              </li>
              <li>
                <a href="<?= base_url('index.php/customers');?>">
                    <i class="fas fa-chart-bar"></i>Müşteriler</a>
              </li>
              <li>
                <a href="<?= base_url('index.php/list');?>">
                    <i class="fas fa-copy"></i>Sipariş</a>
              </li>
            </ul>
        </div>
    </nav>
</header>
