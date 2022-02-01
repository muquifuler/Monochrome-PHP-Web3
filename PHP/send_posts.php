<?php
    session_start();
    
    $mysqli = new mysqli('localhost','u505721908_muquifuler','SkDoL:&M;2*','u505721908_autotoken');
    $wallet_complete = $_SESSION['wallet_complete'];
    $query2 = $mysqli -> query ($sql2 = "SELECT `posts` FROM `Users` WHERE address = \"$wallet_complete\";");
    $valores2 = mysqli_fetch_array($query2);
    $posts_ = $valores2[posts]+1;
    $_SESSION['posts'] = $posts_;
    $query9 = $mysqli -> query ($sql9 = "UPDATE `Users` SET `posts`=\"$posts_\" WHERE address = \"$wallet_complete\";");
    $valores9 = mysqli_fetch_array($query9);


    $conexion=mysqli_connect('localhost','u505721908_muquifuler','SkDoL:&M;2*','u505721908_autotoken') or die ('Error en la conexion');  
    mysqli_select_db($conexion,'u505721908_autotoken')or die("problemas al conectar con la base de datos");
    
    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['tags']) && isset($_POST['category'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    $category = $_POST['category'];
    $fund_raising = $_POST['fund-raising'];
    $wallet_complete = $_SESSION['wallet_complete'];
    $name = $_SESSION['name'];

    }

    $sql="INSERT INTO `Posts`(category, priority, title, description, tags, fund_raising, author_address, name) VALUES ('$category','no','$title','$description','$tags','$fund_raising','$wallet_complete', '$name')";

    $ejecutar=mysqli_query($conexion,$sql);
    
    mysqli_close( $conexion );

    header("Location: ../buttons/postQuestion.php");
    
?>