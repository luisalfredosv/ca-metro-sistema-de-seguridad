<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">


<script type="text/javascript">
	
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);

</script>

<style type="text/css">
.marginBottom-0 {margin-bottom:0;}
.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
.dropdown-submenu:hover>a:after{border-left-color:#555;}
.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}body { padding-top: 70px; }
</style>

       	<title></title>
</head>
<body>

      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Control de Visitas</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="app.php">Inicio</a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">Visitantes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="reg_vis.php">Registrar Entrada</a></li>
                  <li><a href="con_vis.php">Registrar Salida</a></li>

                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="reg_con_equ.php">Registrar Entrada/Salida</a></li>
                  <!-- <li><a href="con_equ.php">Registrar Salida</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="rep_equ.php">Reporte de Equipos</a></li> -->
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="rep_vis.php">Reporte de Visitantes</a></li>
                  <li><a href="rep_equ.php">Reporte de Equipos</a></li>
<!--                   <li><a href="rep_veh.php">Reporte de Vehículos</a></li> -->
                   <li role="separator" class="divider"></li>
                  <li><a href="rep_veh.php">Reporte de Vehículos Empleados</a></li>
 
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="det_equ.php">Detalles de equipos</a></li>
<!--                   <li><a href="">Reporte de Equipos</a></li>
                  <li><a href="rep_veh.php">Reporte de Vehículos</a></li> -->
 
                </ul>
              </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
           
             
              <?php if($_SESSION['user_nivel']==1){ ?>
              <li><a href="gst_usr.php">&nbsp;Administrador<span class="sr-only"></span></a></li>
              <?php } ?>
            <li class="navbar-text"><button class="btn btn-success btn-xs"><?php echo $_SESSION['user_usuario']; ?></button></li>
            

            <li class=""><a href="login/logout.php"></span>  Salir <span class="sr-only"></span></a></li>
<!--               <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li> -->
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
<!-- data-hover="dropdown" Habilita el despliegue del menu con con el hover -->
<!-- <script>
  !function(e,n){var o=e();e.fn.dropdownHover=function(t){return"ontouchstart"in document?this:(o=o.add(this.parent()),this.each(function(){function r(){d.parents(".navbar").find(".navbar-toggle").is(":visible")||(n.clearTimeout(a),n.clearTimeout(i),i=n.setTimeout(function(){o.find(":focus").blur(),v.instantlyCloseOthers===!0&&o.removeClass("open"),n.clearTimeout(i),d.attr("aria-expanded","true"),s.addClass("open"),d.trigger(h)},v.hoverDelay))}var a,i,d=e(this),s=d.parent(),u={delay:500,hoverDelay:0,instantlyCloseOthers:!0},l={delay:e(this).data("delay"),hoverDelay:e(this).data("hover-delay"),instantlyCloseOthers:e(this).data("close-others")},h="show.bs.dropdown",c="hide.bs.dropdown",v=e.extend(!0,{},u,t,l);s.hover(function(e){return s.hasClass("open")||d.is(e.target)?void r(e):!0},function(){n.clearTimeout(i),a=n.setTimeout(function(){d.attr("aria-expanded","false"),s.removeClass("open"),d.trigger(c)},v.delay)}),d.hover(function(e){return s.hasClass("open")||s.is(e.target)?void r(e):!0}),s.find(".dropdown-submenu").each(function(){var o,t=e(this);t.hover(function(){n.clearTimeout(o),t.children(".dropdown-menu").show(),t.siblings().children(".dropdown-menu").hide()},function(){var e=t.children(".dropdown-menu");o=n.setTimeout(function(){e.hide()},v.delay)})})}))},e(document).ready(function(){e('[data-hover="dropdown"]').dropdownHover()})}(jQuery,window);
</script> -->

</body>
</html>
