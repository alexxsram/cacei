<!-- Barra de busqueda para Personal Academico -->
<section id="buscar" class="contact-section" style="padding-bottom: 0px; color: white; margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Buscar</h1>
                <div class="col-md-6" style="float: none; margin: 0 auto;">
                    <form id="search" method="get" action="buscar.php" autocomplete="off">
                        <div id="custom-search-input" style="">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control input-lg" placeholder="Buscar" id="codigo" name="codigo">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="button" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>

                    <?php
                    if(!empty($_SESSION)) {
                        echo "<a href=\"agregar.php\"><button class=\"btn btn-success btn-lg\" type=\"button\" style=\"margin-top: 10px; font-size: 1em;\"> Agregar Academico </button></a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>