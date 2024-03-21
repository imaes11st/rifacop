<?php
require("./conexion.php");

$sqlPlanchas = "SELECT COUNT(a.id_plancha) AS total, a.id_plancha AS plancha, p.nombre, p.numeroPlancha, p.descripcion
                FROM asistencia a 
                INNER JOIN planchas p ON a.id_plancha = p.id 
                GROUP BY a.id_plancha, p.nombre, p.numeroPlancha, p.descripcion";

$query = mysqli_query($con, $sqlPlanchas) or die("Error al consultar: " . mysqli_error($con));

if ($query->num_rows > 0) {
    ?>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            width: calc(25% - 20px); /* Ajusta el ancho de las cartas */
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
            text-align: center; /* Centra el contenido dentro de las cartas */
        }

        .card-title {
            margin-bottom: 10px;
            font-size: 16px; /* Tamaño de fuente reducido para el título */
            color: #343a40;
        }

        .card-total {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
        }
    </style>

    <div class="card-container">
    <?php
    while ($row = $query->fetch_assoc()) {
        ?>
        <div class="card">
            <img src="img/Group-Vector-PNG-Clipart.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-total"><?php echo $row['descripcion']; ?></h1>
                <h3 class="card-title"><?php echo $row['nombre']; ?></h3>
                <h1 class="card-total"><?php echo $row['total']; ?></h1>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
}
?>
