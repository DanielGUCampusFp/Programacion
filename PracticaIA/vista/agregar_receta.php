<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $puerto = '1234';
    $url = "http://localhost:$puerto/v1/chat/completions";
    
    $datos = array(
        'messages' => array(
            array('role' => 'system', 'content' => 'Responde siempre en español y como si fueses un libro de recetas sin comentarios de respuesta, solo la receta.'),
            array('role' => 'user', 'content' => 'Dame la receta de una' . $_POST['receta'])
        ),
        "temperature"=> 0.8,
        "max_tokens"=> -1,
        "stream"=> false
    );
    
    $jsonDatos = json_encode($datos);
    
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonDatos)
    ));
    
    $respuesta = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    } else {
        $data = json_decode($respuesta, true);
    
        $message = $data['choices'][0]['message']['content'];
    
        $controller = new RecetasController();
        $controller->agregarReceta($_POST['receta'], $message);    
    }
    curl_close($ch);
    header ("Location: lista_recetas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Receta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<style>
body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: left;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    width: 100%;
    height: 20%;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>

<body>
    <h1>AGREGAR NUEVA RECETA</h1>
    
    <form method="POST">
        <label for="receta">Nombre de la Receta:</label>
        <input type="text" id="receta" name="receta" class="form-control" required>
        
        <input type="submit" class="btn btn-primary" value="Agregar Receta">
        
        <br><br>
        
        <a href="lista_recetas.php?" class="btn btn-primary">Volver</a>
    </form>
</body>
</html>
