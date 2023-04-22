<?php

require_once './filme_control.php';
require_once './filme_model.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$uploads = __DIR__ . '/../uploads';

$acoes = array(
    "GET" => 'get',
    "POST" => 'post',
);

$acoes[$metodo]();

function get() {
    if (!empty($_GET['id'])) return buscarPorId();
    return listar();
}

function post() {
    $res = upload();
    if (!$res) return "Erro no upload de imagem";


    $obj = new FilmeModel(
        NULL,
        $_POST['titulo'],
        $_POST['sinopse'],
        $_FILES['foto_1']['name'],
        $_FILES['foto_2']['name'],
        $_FILES['foto_3']['name'],
        $_FILES['foto_4']['name'],
        $_POST['avaliacao']
    );

    $control = new FilmeControl();
    $response = $control->cadastrar($obj);
    echo json_encode($response);
}

function checkUploadsPath() {
    $uploads = __DIR__ . '/../uploads';
    if (!file_exists($uploads)) mkdir($uploads, 0777, true);
}

function upload() {
    $path = __DIR__ . '/../uploads';
    $check = true;

    checkUploadsPath();

    foreach($_FILES as $file) {
        $name = $path . "/" . basename($file["name"]);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $check = getimagesize($file["tmp_name"]);
        $resMove = move_uploaded_file($file['tmp_name'], $name);
        $check = ($resMove) ? true : false;
    }

    return $check;
}

function listar() {
    $control = new FilmeControl();
    $response = $control->listar();
    echo json_encode($response);
}

function buscarPorId() {
    $control = new FilmeControl();
    $response = $control->buscarPorId($_GET['id']);
    
    echo json_encode($response);
}

?>