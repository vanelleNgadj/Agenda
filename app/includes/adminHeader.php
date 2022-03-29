<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php'; ?>">
        <h1 class="logo-text"><span>Agenda</span>DuRoyaume</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['username'])): ?>
            <li>
                <a href="<?php echo BASE_URL . '/blog.php'; ?>"> Events</a>
            </li>
            
      <li><a href="<?php echo BASE_URL . '/shop.php' ?>">Shop</a></li>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                </a>
            </li>
                
            <li>
                <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout" >Log Out</a>
            </li>
                
            
        <?php endif; ?>
    </ul>
</header>