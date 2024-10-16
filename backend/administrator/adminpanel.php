<?php
if (isset($_SESSION['validAuthAdmin'])) {
?>
    <div id="session_admin_container">
        <h4><span>A</span>dministrateur<?= " " .  $_SESSION['adminName'] ?></h4>
        <ul id="admin_ul">
            <li class="admin_li"><a href="insertproduit.php"><i class="fa-solid fa-upload"></i></a></li>
            <li class="admin_li"><a href="#"><i class="fa-solid fa-file-pen"></i></i></a></li>
            <li class="admin_li"><a href="#"><i class="fa-solid fa-trash-can"></i></i></a></li>
            <li class="admin_li"><a href="#"><i class="fa-solid fa-user-gear"></i></a></li>
            <li class="admin_li"><a href="#"><i class="fa-solid fa-user-slash"></i></a></li>
            <p><a href="backend/users/logout.php"><span>D</span>éconexion<i class="fa-solid fa-arrow-right"></i></a></p>
        </ul>
    </div>
<?php
}
?>