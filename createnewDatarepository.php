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
            <h1>Repositorio do Git-Hub | Criando Dado na Api </h1>
        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">
            <form method="POST" action="./respcreateDatarepository.php">

                <label for="nome">Nome</label>
                <input type="text" name="name" id="name">

                <label for="nome">Descrição</label>
                <textarea name="description" id="description"></textarea>

                <button class="mt-4">Enviar</button>
            </form>

        </div>
    </div>

</body>

</html>