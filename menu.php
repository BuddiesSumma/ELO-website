<?php $activePage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); ?>
<aside>
    <div id="title">
        <h1>ELO</h1>
    </div>
    <nav>
        <a href="home.php" <?php if ($activePage == "home") echo 'class="active"'; ?>>Home</a>
        <a href="huiswerk.php" <?php if ($activePage == "huiswerk") echo 'class="active"'; ?>>Huiswerk</a>
        <a href="cijfers.php" <?php if ($activePage == "cijfers") echo 'class="active"'; ?>>Cijfers</a>
        <a href="persoonsgegevens.php" <?php if ($activePage == "persoonsgegevens") echo 'class="active"'; ?>>Persoonsgegevens</a>
        <a href="?logout">Uitloggen</a>
    </nav>
</aside>