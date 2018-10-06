<!-- Inicio de Sesión -->
<?php include 'core/start_session.php'; ?>

<!DOCTYPE html>
<html lang="es">

    <!-- Archivos de Cabecera (css, js) -->
    <?php include 'includes/head.php'; ?>

    <style>
        #custom-search-input {
            padding: 3px;
            border: solid 1px #E4E4E4;
            border-radius: 6px;
            background-color: #fff;
        }

        #custom-search-input input {
            border: 0;
            box-shadow: none;
        }

        #custom-search-input button {
            margin: 2px 0 0 0;
            background: none;
            box-shadow: none;
            border: 0;
            color: #666666;
            padding: 0 8px 0 10px;
            border-left: solid 1px #ccc;
        }

        #custom-search-input button:hover {
            border: 0;
            box-shadow: none;
            border-left: solid 1px #ccc;
        }

        #custom-search-input .glyphicon-search {
            font-size: 23px;
        }
    </style>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Menu -->
        <?php include 'includes/header.php'; ?>
        
        <!-- Barra de busqueda -->
        <?php include 'includes/buscar/barra-busqueda.php'; ?>
        
        <!-- Sección de resultados de busqueda -->
        <?php include 'includes/buscar/mostrar-academicos.php'; ?>

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

    </body>

</html>