<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <LINK REL=StyleSheet HREF="css/chef.css" TYPE="text/css" MEDIA=screen>

        <title>CARFOOD</title>

    </head>

    <body style="background-image: url('fondo.png');">

        <header>
        <img src="logo.png" id="logo">
        </a>
    </header>
    

        <?php
        include 'conexion.php';
        ?>
            
        
        <!-- Start Portfolio Section -->
        <div class="section-modal modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">

                    <div class="container">
        <div class="row">
            <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                
                        
                            <?php 
                            $re=mysql_query("
                                SELECT PLATOS.NOMBRE, PLATOS.DETALLE, MESA.ID_MESA, MESA.OBSERVACIONES
                                FROM DETALLE
                                INNER JOIN PLATOS ON DETALLE.ID_PLATO = PLATOS.ID_PLATO 
                                INNER JOIN MESA ON MESA.ID_PEDIDOS = DETALLE.ID_PEDIDOS")or die(mysql_error());
                                while ($row=mysql_fetch_array($re)) {
                                    echo "<ul class='event-list'>
                                            <br>
                                            <li>
                                            <time datetime='2014-07-20 0000'>
                                    <span class='day'>".$row['ID_MESA']."<br>"; 
                                    echo "<span class='month'>Mesa</span><br>";
                                    echo "</time>";
                            
                        echo " <img alt='Independence Day' src='http://www.unionjalisco.mx/sites/default/files/imagecache/v2_660x370/comidajal.jpg' />
                        <div class='info'>";
                        echo " <h2 class='title'>".$row['NOMBRE']."</h2>
                            <p class='desc'>".$row['DETALLE']."</p>
                            <p class='observaciones'>".$row['OBSERVACIONES']."</p>
                        </div>
                    </li>
                </ul>";
                 } 
                    ?>
            </div>
        </div>
    </div>

                </div>
                
            </div>
        </div>
        <!-- End Portfolio Section -->
        
       
                
            </div>
        </div>
        <!-- End Testimonial Section -->
        
    </body>
    
</html>