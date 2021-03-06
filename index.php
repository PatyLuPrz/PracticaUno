<?php
// URL que obtiene un JSON con datos generales sobre 5 objetos
$url = "https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items";
// Linea que obtiene los datos y los vuelca en una variable
$data = json_decode(file_get_contents($url), true);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Inicia HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Prueba Uno</title>
</head>
<!-- Finaliza HEAD -->
<!-- Inicia BODY -->
<body>
    <nav class="navbar bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                Prueba Uno
            </a>
        </div>
    </nav>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Variable que guardara el nuevo objeto
                $nuevoArray = [];
                // Clico para imprimir los datos en una tabla
                for ($x = 0; $x < count($data); $x++) {
                    // Sentencia if para filtrar por color = green
                    if($data[$x]['color'] == 'green'){
                ?>
                    <tr>
                        <td scope="row"><?php echo $data[$x]['id']; ?></td>
                        <td><?php echo $data[$x]['type']; ?></td>
                        <td><?php echo $data[$x]['color'];
                        // Añadimos los resultados filtrados a un nuevo array
                        array_push($nuevoArray,array('id'=>$data[$x]['id'],'type'=>$data[$x]['type'],'color'=>$data[$x]['color']));
                        }} 
                        // Convertimos los resultados a JSON
                        $json = json_encode($nuevoArray);
                        // Volcamos el JSON a un archivo
                        $bytes = file_put_contents("Respuesta.json",$json);
                        ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<!-- Finaliza BODY -->
<!-- JS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</html>