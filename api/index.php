<?php

include 'bd/BD.php';

header('Access-Control-Allow-Origin: *');

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestMethod){
    case 'GET':
        select($_GET);
        break;
    case 'POST':
        create($_POST);
        break;
    case 'PUT':
        update($_GET);
        break;
    case 'DELETE':
        delete($_GET);
            break;
    default:
        var_dump("Sin verbo HTTP");
        break;
}

header("HTTP/1.1 200 OK");


/**
 * @return void
 */
function select($parametros)
{
    if (isset($parametros['id'])) {
        $query = "select * from frameworks where id=" . $parametros['id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
    } else {
        $query = "select * from frameworks";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    }
}

/**
 * @return void
 */
function create($parametros)
{
    $nombre = $parametros['nombre'];
    $lanzamiento = $parametros['lanzamiento'];
    $desarrollador = $parametros['desarrollador'];
    $query = "insert into frameworks(nombre, lanzamiento, desarrollador) values ('$nombre', '$lanzamiento', '$desarrollador')";
    $queryAutoIncrement = "select MAX(id) as id from frameworks";
    $resultado = metodoPost($query, $queryAutoIncrement);
    echo json_encode($resultado->fetchAll);
}

/**
 * @return void
 */
function update($paramaetros)
{
    $id = $paramaetros['id'];
    $nombre = $_GET['nombre'];
    $lanzamiento = $_GET['lanzamiento'];
    $desarrollador = $_GET['desarrollador'];
    $query = "UPDATE frameworks SET nombre='$nombre', lanzamiento='$lanzamiento', desarrollador='$desarrollador' WHERE id='$id'";
    $resultado = metodoPut($query);
    echo json_encode($resultado);
}

/**
 * @return void
 */
function delete($parametros)
{
    $id = $parametros['id'];
    $query = "DELETE FROM frameworks WHERE id='$id'";
    $resultado = metodoDelete($query);
    echo json_encode($resultado);
}
?>

