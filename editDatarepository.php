<?php

$full_name = $_GET['full_name'];

$header = [
    "User-Agent: api git",
    //token blackpar.co
    // "Authorization: token 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"
    //token pessoal
    "Authorization: token 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"
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
            <h1>Repositorio do Git-Hub | Editando Dado na Api </h1>
        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">
            <form method="POST" action="./respupdateDatarepository.php">

                <input type="hidden" name="full_name" value="<?= $data['full_name'] ?>">

                <label for="nome">Nome</label>
                <input type="text" name="name" id="name" value="<?= $data['name'] ?>">

                <label for="nome">Descrição</label>
                <textarea name="description" id="description"><?= $data['description'] ?></textarea>

                <button class="mt-4">Salvar </button>
            </form>

        </div>
    </div>

</body>

</html>