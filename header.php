<?php

?>

<header>
    <nav class="main-nav">
        <a href="index.php" class="logo">Villas<em>Park</em></a>
        <ul class="nav">
            <?php if (isset($_SESSION['nome'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="registar.php">Registar</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
