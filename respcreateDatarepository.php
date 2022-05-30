<?php

$header = [
    "User-Agent: api git",
    //token associação
    // "Authorization: token #Personal access tokens#"
    //token pessoal
    "Authorization: token #Personal access tokens#"
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");

// curl_setopt($ch, CURLOPT_POST, true);

// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

// $data = json_encode($response);

$data = json_decode($response, true);

if ($status_code === 422) {
    echo "<br><br>Data invalid <br>";
    print_r($data['errors']);
    exit;
}

if ($status_code !== 201) {
    echo "<br>Unexpected status code: $status_code";
    var_dump($data);
    exit;
}

// var_dump($data);
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
            <h1>Repositorio do Git-Hub | Criando com sucesso</h1>

        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">

            <h1>Criando com sucesso
                <a href="./getDatarepository.php?full_name=<?= $data["full_name"] ?>">Mostrar</a>
            </h1>
        </div>
    </div>


</body>

</html>