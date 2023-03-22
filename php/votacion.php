<div class="container" style="padding-top: 45px">
        <h2>Elecciones Planchas Asamblea COOPSECON</h2>
        <p class="card-text">Para votar por alguna plancha debera estar en el boton de votar de la plancha correspondiente.</p>
    </div>
    <br>
    <br>
    <div class="usuario">
        <?php
          
          require("php/conexion.php");
          $nombre=$_SESSION['usuario'];
          $cedula=$_SESSION['cedula'];

          $sql="SELECT * FROM planchas WHERE fkUsuario='$cedula'";

          $query=mysqli_query($con,$sql)or die("error al consultar".mysli_error($con));

          $res=mysqli_fetch_array($query);

          @$id=$res['id'];
          @$votacion=$res['votacion'];

          if($votacion==1){
            
            echo '<h1 class="container">'."YA REALIZO SU VOTO"."</h1>";
            echo '<a class="btn btn-primary d-grid gap-2 col-6 mx-auto" href="./php/salir.php">'."Salir".'</a>';

            // echo $_SESSION['usuario'];
        }else{

      ?>
    </div>
    <div class="container">
        <div class="card" style="width: 12rem;">
            <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
             <div class="card-body">
                <h5 class="card-title">Plancha #01</h5>
                <a href="php/votar.php?plan=1" class="btn btn-primary">VOTAR</a>
            </div>
        </div>
        <div class="card" style="width: 12rem;">
        <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Plancha #02</h5>
            <a href="php/votar.php?plan=2" class="btn btn-primary">VOTAR</a>
            </div>
        </div>
        <div class="card" style="width: 12rem;">
            <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Plancha #03</h5>
                <a href="php/votar.php?plan=3" class="btn btn-primary">VOTAR</a>
            </div>
        </div>
        <div class="card" style="width: 12rem;">
            <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Plancha #04</h5>
                <a href="php/votar.php?plan=4" class="btn btn-primary">VOTAR</a>
            </div>
        </div>
        <div class="card" style="width: 12rem;">
            <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Plancha #05</h5>
                <a href="php/votar.php?plan=5" class="btn btn-primary">VOTAR</a>
            </div>
        </div>
</div>


<?php


} 

?>