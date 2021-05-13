<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    
    <title>Rooms</title>
</head>
<body>
    <div class="container">
        <h1>Elenco stanze:</h1>
        <?php
            require_once "data.php";
            $conn = getConnection();
            $sql = getStanzeSql();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $stmt -> bind_result($room_number, $osId);
            while ($stmt -> fetch()) {
                echo '<a href="/room_details.php?id=' . $osId . '">'. 'Stanza n°:' . ' ' . $room_number . '</a><br>';
            }
            closeConn($conn, $stmt);
        ?>
    </div>
</html>
