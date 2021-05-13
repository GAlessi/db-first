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
    </style>
    <title>Rooms</title>
</head>
<body>
    <div class="container">
        <h1>DB</h1>
        <?php
            require_once "data.php";
            $conn = getConnection();
            $sql = getStanzeSql();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $stmt -> bind_result($room_number, $osId);
            while ($stmt -> fetch()) {
                echo '<a href="/room_details.php?id=' . $osId . '">'. $room_number . '</a><br>';
            }
            closeConn($conn, $stmt);
        ?>
    </div>
</html>
