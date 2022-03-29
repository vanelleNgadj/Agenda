<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
      <h1 class="logo-text"><span>Agenda</span>DuRoyaume</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
    <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
      <li><a href="<?php echo BASE_URL . '/blog.php' ?>">Events</a></li>
      <li><a href="<?php echo BASE_URL . '/agenda.php' ?>">Agenda</a></li>
      <li><a href="<?php echo BASE_URL . '/shop.php' ?>">Shop</a></li>
      <li><a href="<?php echo BASE_URL . '/about.php' ?>">About</a></li>

      <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>
            <?php if($_SESSION['admin'] || $_SESSION['org']): ?>
              <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Tableau de bord</a></li>
            <?php endif; ?>
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Log Out</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/register.php' ?>">Register</a></li>
        <li><a href="<?php echo BASE_URL . '/login.php' ?>">Log In</a></li>
      <?php endif; ?>
    </ul>
</header>