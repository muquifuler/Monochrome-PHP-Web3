<?php
    session_start();
    $mysqli = new mysqli('$SERVER','$USER','$PASS','$BD');

    if(!isset($_POST['publication'])){

        $answers = $_POST['answers'];

    }

    $query2 = $mysqli -> query ($sql2 = "SELECT `likes` FROM `Answers` WHERE answers = \"$answers\";");
    $valores2 = mysqli_fetch_array($query2);
    $likes_ = $valores2[likes]+1;
    $query9 = $mysqli -> query ($sql9 = "UPDATE `Answers` SET `likes`=\"$likes_\" WHERE answers = \"$answers\";");
    $valores9 = mysqli_fetch_array($query9);
 
    $wallet_complete = $_SESSION['wallet_complete'];
    $query20 = $mysqli -> query ($sql20 = "SELECT `likes` FROM `Users` WHERE address = \"$wallet_complete\";");
    $valores20 = mysqli_fetch_array($query20);
    $likes2_ = $valores20[likes]+1;
    $_SESSION['likes'] = $likes2_;
    $query90 = $mysqli -> query ($sql90 = "UPDATE `Users` SET `likes`=\"$likes2_\" WHERE address = \"$wallet_complete\";");
    $valores90 = mysqli_fetch_array($query90);

    header("Location: ../forum/question.php");
?>
