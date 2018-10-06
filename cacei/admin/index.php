<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['estado_a'] == 'Autenticado') {
    header("Location: principal_admin.php");
} else {
	header("Location: login_admin.php");
};
?>
