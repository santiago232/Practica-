<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="carnet" placeholder="ingrese el carnet">
        <br/>
        <input type="text" name="nombre" placeholder="ingrese el nombre">
        <br/>
        <input type="text" name="dpi" placeholder="ingrese el dpi">
        <br/>
        <input type="text" name="direccion" placeholder="ingrese el direccion">
        <br/>
        <input type="hidden" name="accion" value="crear">
        <button type="submit">Guardar</button>  
</form>
</body>
</html>