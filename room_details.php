<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: rgb(128 0 0);
            color: white;
        }
        .container{
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        a{
            color: white;
            text-decoration: none;
        }
        a div{
            padding: 10px;
            border-radius: 5px;
            border: 1px solid black;
            background-color: rgb(255 141 0);
        }
    </style>

    <title>Room Details</title>
</head>
<body>
    <div class="container">
        <h1>Room Details</h1>
        <?php
            require_once "data.php";
            $id = $_GET['id'];
            $conn = getConnection();
            $sql = getStanzeDetailsSql();
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param("i", $id);
            $stmt -> execute();
            $stmt -> bind_result($floor, $beds);
            $stmt -> fetch();
            echo '<h3>Piano: ' . $floor . '</br> ' .'Letti: ' . $beds . '</h3>';
            closeConn($conn, $stmt);
        ?>

        <a href="/index.php">
            <div>
                Back
            </div>
        </a>
    </div>
</html>
