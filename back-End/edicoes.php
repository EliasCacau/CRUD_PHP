<?php
include 'conexao.php';

$id = $_POST['idCadastro'];
$nome = $_POST['Nome'];
$telefone = $_POST['Telefone'];

    $update_cad = "UPDATE cadastros_pessoas SET
                            Nome = '$nome',
                            Telefone = '$telefone'
                            WHERE id = '$id'
                            ";
                        
    $queryCad = mysqli_query($connex, $update_cad) or die(mysqli_error($connex));

    header('location: ../index.php');

?>