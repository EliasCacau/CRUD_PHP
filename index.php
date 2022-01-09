<!doctype html>
<html lang="en">

<head>
    <title>Cadastros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row mt-4">

            <div class="col">
                <h3 class="text-primary "> Formulário de Cadastro</h3>
            </div>

            <div class="col text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newcad">
                    Novo Cadastro
                </button>
            </div>

        </div>

        <!-- The Modal -->
        <div class="modal" id="newcad">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastrando Usuários</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="back-End/cadastros.php" method="post">

                            <label for="">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
                            <br>

                            <label for="">Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Digite seu telefone" required>
                            <br>

                            <hr>

                            <div class="text-right">

                                <input type="submit" value="ENVIAR" class="btn btn-success">

                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <br>




        <?php

        include 'back-End/conexao.php';

        $query_listar = " SELECT *
                          FROM cadastros_pessoas ";

        $buscar_cadastros = mysqli_query($connex, $query_listar);
        ?>
        <br>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php

                include 'back-End/conexao.php';

                $query_listar = " SELECT *
                                       FROM cadastros_pessoas ";

                $buscar_cadastros = mysqli_query($connex, $query_listar);

                while ($retorno_cadastros = mysqli_fetch_array($buscar_cadastros)) {
                ?>

                    <tr>
                        <td scope="row"><?php echo $retorno_cadastros['id']; ?> </td>
                        <td><?php echo $retorno_cadastros['Nome']; ?> </td>
                        <td><?php echo $retorno_cadastros['Telefone']; ?> </td>
                        <td><?php echo $retorno_cadastros['dataCadastro']; ?> </td>

                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#n<?php echo $retorno_cadastros['id']; ?>">
                                Editar
                            </button>
                        </td>

                        <td>
                            <form action="back-End/delete.php" method="post">

                                <input type="hidden" name="idCadastro" value="<?php echo $retorno_cadastros['id']; ?>">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?php echo $retorno_cadastros['id']; ?>">
                                     EXCLUIR
                                </button>
                            </form>
                        </td>
                    </tr>

        <div class="modal" id="n<?php echo $retorno_cadastros['id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editando Usuários</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                         <form action="back-End/edicoes.php" method="post">

                            <input type="hidden" name="idCadastro" value="<?php echo $retorno_cadastros['id']; ?>">

                            <label for="">Nome</label>
                            <input type="text" name="Nome" value="<?php echo $retorno_cadastros['Nome']; ?>" class="form-control">
                            <br>

                            <label for="">Telefone</label>
                            <input type="text" name="Telefone" value="<?php echo $retorno_cadastros['Telefone']; ?>" class="form-control">
                            <br>

                             <input type="submit" value="EDITAR" class="btn btn-warning">

                         </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal" id="e<?php echo $retorno_cadastros['id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tem certeza que deseja excluir o usuário?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                         <form action="back-End/delete.php" method="post">

                            <input type="hidden" name="idCadastro" value="<?php echo $retorno_cadastros['id']; ?>">
                            
                            <label for="">Nome</label>
                            <input type="text" name="Nome" value="<?php echo $retorno_cadastros['Nome']; ?>" class="form-control"br>
                            <br>

                            <label for="">Telefone</label>
                            <input type="text" name="Telefone" value="<?php echo $retorno_cadastros['Telefone']; ?>" class="form-control">
                            <br>
                             <input type="submit" value="EXCLUIR" class="btn btn-danger">

                         </form>
                    </div>

                </div>
            </div>
        </div>
                <?php } ?>

            </tbody>
        </table>

        <hr>
        
        <?php

                include 'back-End/conexao.php';

                $query_collapse = " SELECT *
                                      FROM cadastros_pessoas ";

                $buscar_collapse = mysqli_query($connex, $query_collapse);

                while ($retorno_collapse = mysqli_fetch_array($buscar_collapse)) {
        ?>


        <button data-toggle="collapse" data-target="#d<?php echo $retorno_collapse['id']; ?>" class="btn btn-success btn-block" ><?php echo $retorno_collapse['Nome']; ?></button>

        <div id="d<?php echo $retorno_collapse['id']; ?>" class="collapse">
            <Label>Telefone:</Label>
            <?php echo $retorno_collapse['Telefone'];?>
        </div>  
        <br>

        <?php } ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>