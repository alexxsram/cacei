<?php
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['estado'] == 'Autenticado') {
    header("Location: principal.php");
} else {
	header("Location: login.php");
};
?>
