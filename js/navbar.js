// Función para animación del boton del menu para mobiles
var $menu_abierto = false;

$(function() {
    $('#menu').bind('click', function(event) {

        if(!$menu_abierto) {
            
            $menu_abierto = true;

            document.getElementById("t").className += " t";
            document.getElementById("m").className += " m";
            document.getElementById("b").className += " b";

            $("#t").removeClass("ta");
            $("#b").removeClass("ba");
            $("#m").removeClass("ma");

        } else {
            
            $menu_abierto = false;

            $("#t").addClass("ta");
            $("#t").removeClass("t");

            $("#b").addClass("ba");
            $("#b").removeClass("b");

            $("#m").addClass("ma");
            $("#m").removeClass("m");
            
        }
    });
});