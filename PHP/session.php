<?php
    session_start();
    
        $wallet = $_POST['wallet'];

        $mysqli = new mysqli('localhost','u505721908_muquifuler','SkDoL:&M;2*','u505721908_autotoken');
        $query = $mysqli -> query ($sql = "SELECT * FROM `Users` WHERE address = \"$wallet\";");
        $valores = mysqli_fetch_array($query);

    if(isset($_POST['wallet'])){

        $_SESSION['wallet_complete'] = $wallet;
        $wallet = substr($_POST['wallet'], 0, 4) . '...' . substr($_POST['wallet'], 38, 42);

        $_SESSION['name'] = $valores[name];
        $_SESSION['wallet'] = $wallet;
        $_SESSION['state'] = 'Online';
        $_SESSION['followers'] = $valores[followers];

        $_SESSION['level'] = $valores[level];
        $_SESSION['rank'] = '<span style="color:#ff9100;">'.$valores[rank].'</span>';
        $_SESSION['profile'] = '<span style="color:#ff0000;">'.$valores[profile].'</span>';
        $_SESSION['posts'] = $valores[posts];
        $_SESSION['likes'] = $valores[likes];
        $_SESSION['created'] = $valores[creation];
        $_SESSION['team'] = $valores[team];
    
    }

    header("Location: ".$_POST['url']);
    
?>