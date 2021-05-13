<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title>Room Details</title>
</head>
<body>
    <div class="container">
        <h1>Dettagli stanza:</h1>
        <?php
            require_once "data.php";
            $id = $_GET['id'];
            $conn = getConnection();
            $sql = getStanzeDetailsSql();
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param("i", $id);
            $stmt -> execute();
            $stmt -> bind_result($stanza, $floor, $beds);
            $stmt -> fetch();
            echo '<h3> Stanza n°: ' . ' ' . $stanza . '</h3>'
                .'<h3> Piano: ' . ' ' . $floor . '</h3>'
                .'<h3> Letti: ' . ' ' . $beds .'</h3>' ;
            closeConn($conn, $stmt);
        ?>

        <a href="/index.php">
            <div>
                Back
            </div>
        </a>
    </div>
</html>
