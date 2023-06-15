<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
    <?php
function introduccion(){
    $Mivariable = "Santiago";
    echo "<h1>Hola" . $Mivariable . "</h1>";
    $val1 = 10;
    $val2 = 20;
    $suma = $val1 + $val2;
    $resta = $val1 - $val2;

    if ($suma > 10){
        echo "La suma es mayor a 10 " . $suma;
    }
    else {
        echo "La suma es menor a 10 " . $suma;
    }
    for($contador = 1 ; $contador <10 ; $contador ++){
        echo "Contador" .$contador . "<br/>";
    }
}
//introduccion();

$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=intro2023b', 'root', '', $pdo_options);

if (isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){
        
        $insert = $conexion->prepare("INSERT INTO alumno (carnet,nombre,dpi,
        direccion) VALUES (:carnet,:nombre,:dpi,:direccion)");
        $insert->bindValue('carnet', $_POST['carnet']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('dpi', $_POST['dpi']);
        $insert->bindValue('direccion', $_POST['direccion']);
        $insert->execute();
    }


$select = $conexion->query("SELECT carnet, nombre, dpi, direccion FROM alumno");
?>

<a href="crear.php">Crear Boton</a>
    <table border="1">
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Dpi</th>
                <th>Direccion</th>
                <th>Acciones</th>
</tr>
</thead>
<tbody>
    <?php foreach($select->fetchAll() as $alumno) { ?>
        <tr>
            <td> <?php echo $alumno["carnet"] ?> </td>
            <td> <?php echo $alumno["nombre"] ?> </td>
            <td> <?php echo $alumno["dpi"] ?> </td>
            <td> <?php echo $alumno["direccion"] ?> </td>
            <td>
                <form action="editar.php" method="POST">
                    <button type="submit">Editar</button>
                    <input type="hidden" name="carnet"
                    value="<?php echo $alumno["carnet"]?>">
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <script src="script.js"></script>
    </body>
</html>