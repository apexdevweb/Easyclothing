<?php
require("backend/users/login.php");
?>
<header>
    <?php
    if (isset($_SESSION['validAuth'])) {
    ?>
        <h4>Bienvenue<?= " " . $_SESSION['last_name'] ?></h4>
    <?php
    }
    ?>
    <div class="burgerContainer" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <nav id="firstNav">
        <ul class="myLinks">
            <li class="firstLi"><a href="#"><span>P</span>rintemp </a></li>
            <li class="firstLi"><a href="#"><span>E</span>te</a></li>
            <li class="firstLi"><a href="#"><span>A</span>utomne</a></li>
            <li class="firstLi"><a href="#"><span>H</span>iver</a></li>
            <li class="firstLi">
                <form method="POST" id="navForm">
                    <input type="email" name="Mail" id="" placeholder="e-mail">
                    <input type="password" name="Pass" id="" placeholder="password">
                    <input type="submit" name="Login" value="Login">
                </form>
                <p><a href="signup.php"><span>C</span>reer un compte<i class="fa-solid fa-arrow-right"></i></a></p>
                <?php
                if (isset($_SESSION['validAuth'])) {
                ?>
                    <p><a href="backend/users/logout.php"><span>D</span>éconexion<i class="fa-solid fa-arrow-right"></i></a></p>
                <?php
                }
                ?>
            </li>
        </ul>
    </nav>
</header>
<br>
<br>