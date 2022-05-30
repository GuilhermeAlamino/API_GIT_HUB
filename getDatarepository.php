<?php

$full_name = $_GET['full_name'];

$header = [
    "User-Agent: api git",
    //token associação
    // "Authorization: token #Personal access tokens#"
    //token pessoal
    "Authorization: token #Personal access tokens#"
];


//iniciando o curl
// $ch = curl_init();
$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$full_name");

$response = curl_exec($ch);

// $data = json_encode($response);

$data = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Api-GIT-HUB</title>
    <style>
        body {
            padding: 0px;
            margin: 0px;
            background-color: black;
            height: 100vh;
        }

        thead,
        tbody {
            background-color: white;
        }

        h1 {
            color: white;
        }
    </style>
</head>

<body>

    <div class="row p-0 m-0">
        <div class="col-12">
            <h1>Repositorio do Git-Hub | Pegando dado da API <?= $full_name ?></h1>
        </div>
    </div>

    <div class="row mb-4 p-0 m-0">
        <div class="col-12 d-flex justify-content-end">
            <a href="./selectDatarespository.php"><button class="w-100"> Todos Registros </button></a>
        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">

            <table>
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Descrição</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $data['full_name'] ?></td>
                        <td><?= $data['description'] ?></td>
                        <td><a href="./editDatarepository.php?full_name=<?= $data['full_name'] ?>">Editar</a></td>
                        <td>
                            <form method="POST" action="./deleteDatarepository.php">

                                <input type="hidden" name="full_name" value="<?= $data['full_name'] ?>">

                                <button class="mt-4">Deletar</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</body>

</html>