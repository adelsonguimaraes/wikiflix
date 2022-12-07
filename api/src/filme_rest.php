<?php

require_once './filme_control.php';

$metodo = $_SERVER['REQUEST_METHOD'];

$acoes = array(
    "GET" => get(),
);

$acoes[$metodo];

function get() {
    if (!empty($_GET['id'])) return buscarPorId();
    return listar();
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