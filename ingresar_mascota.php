<?php include_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de nueva mascota</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .fondo{
            background-image: url("img/fondo.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 100vh;
            min-height: 60rem;
        }
    </style>
</head>
<body class="fondo">
    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
        <a class="navbar-brand" href="#">Busquedad de afiliado</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="registro.php">Registrar mascota</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="ingresar_mascota.php">Buscar afliliado</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Salir</a>
            </li>
            </ul>

        </div>
    </nav>
    </div>
    <div class="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="m-5 p-3 text-white rounded col-6" style="background-color: rgba(218, 210, 201, 0.808);">
                    <form action="" method="post">
                        <div class="form-row justify-content-center">
                            <h2>Buscar afiliado</h2>
                        </div>
                        <div class="form-group">
                            <label for="NumeroCD">Numero de cedula</label>
                            <input type="text" class="form-control" name="ced"id="NumeroCD" >
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn">Ingresar</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="row d-flex justify-content-center" >
            <div class="m-5 p-3 text-white rounded col d-block" style="background-color: rgba(218, 210, 201, 0.808);">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nombre de Mascota</th>
                            <th scope="col">Tipo de Mascota</th>
                            <th scope="col">Nombre del dueño</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php if (!isset($_POST['btn'])) {
                                $consulta="SELECT nombre,nombre_animal,tipo_animal FROM registro";
                                $resultado=mysqli_query($con,$consulta);
                                foreach ($resultado as $r) {
                            ?>
                            <tr>
                                <td><?php echo($r['nombre_animal']);?></td>
                                <td><?php echo($r['tipo_animal']);?></td>
                                <td><?php echo($r['nombre']);?></td>
                            </tr>
                            <?php }
                        } else{
                                $ced=$_POST['ced'];
                    $cons="SELECT nombre,nombre_animal,tipo_animal FROM registro where cedula='$ced'";
                    $res=mysqli_query($con,$cons);
                        if(mysqli_num_rows($res)>0){
                                foreach ($res as $e) {
                                ?>
                            <tr>
                                <td><?php echo($e['nombre_animal']);?></td>
                                <td><?php echo($e['tipo_animal']);?></td>
                                <td><?php echo($e['nombre']);?></td>
                            </tr>
                            <?php }
                            }else{?>
                            <h1 class="alert alert-primary" role="alert"> <?php echo("Sin datos que mostrar")?></h1>
                            <?php }
                        }?>
                        </tbody>
                      </table>
                      <div class="form-group">
                        <a href="registro.php" class="btn btn-primary">Añadir nueva mascota</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>