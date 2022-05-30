<?php

$header = [
    "User-Agent: api git",
    //token associação
    // "Authorization: token #Personal access tokens#"
    //token pessoal
    "Authorization: token #Personal access tokens#"
];


//iniciando o curl

// $ch = curl_init("https://api.github.com/user/repos");

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");

$response = curl_exec($ch);

// $data = json_encode($response);

$data = json_decode($response, true);

// print_r($data);

// foreach($data as $repository){
//     echo 'nome: ' . $repository['name'] . "<br>";
//     echo 'descrição: ' . $repository['description'] . "<br>";
//     echo 'nome completo: ' . $repository['full_name'] . "<br>
//     -------------------------------------
//     <br>";
// }

curl_close($ch);
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
            <h1 class="text-center">Repositorio do Git-Hub | consumindo API </h1>
        </div>
    </div>

    <div class="row mb-4 p-0 m-0">
        <div class="col-12 d-flex justify-content-end">
            <a href="./createnewDatarepository.php"><button class="w-100"> Novo Repositorio </button></a>
        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th>Nome Completo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $repository) : ?>

                        <tr>
                            <td>
                                <a href="./getDatarepository.php?full_name=<?= $repository['full_name'] ?>">
                                    <?= $repository['name'] ?>
                                </a>
                            </td>

                            <td><?= $repository['description'] ?></td>
                            <td><?= $repository['full_name'] ?></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>

</html>