<?php
    session_start();

    $conexion=mysqli_connect('$SERVER','$USER','$PASS','$BD') or die ('Error en la conexion');  
    mysqli_select_db($conexion,'u505721908_autotoken')or die("problemas al conectar con la base de datos");
    
    if(isset($_POST['answers'])){

    $answers = $_POST['answers'];
    $address = $_POST['address'];
    $question = $_POST['question'];
    $name = $_POST['name'];

    }

    $sql="INSERT INTO `Answers`(answers, address, likes, question, name) VALUES ('$answers','$address',0,'$question','$name')";

    $ejecutar=mysqli_query($conexion,$sql);
    
    mysqli_close( $conexion );

    header("Location: ../index.php");
    
?>
