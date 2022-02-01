<?php
    session_start();
    
    $conexion=mysqli_connect('$SERVER','$USER','$PASS','$BD') or die ('Error en la conexion');  
    //$consulta="SELECT*FROM Whitelist where Usuario='$userlogin' and Contrasena='$passlogin'";
    mysqli_select_db($conexion,'u505721908_autotoken')or die("problemas al conectar con la base de datos");
    //$wallet_free=$_POST['wallet_free'];
    $new_address=$_SESSION['wallet_complete'];
    $new_name=$_POST['new_name'];
    //$wallet=$_POST['meta'];
    $sql="INSERT INTO `Users`(address, name, followers, level, rank, profile, posts, likes) VALUES ('$new_address','$new_name',0,0,'Newbie','User',0,0)";
    //$sql="SELECT 'BNB' FROM Whitelist where wallet='$wallet'";
    $ejecutar=mysqli_query($conexion,$sql);
    
    mysqli_close( $conexion );
    unset($new_address);
    unset($new_name);
    
    session_destroy();
    header("Location: ../buttons/myProfile.php");
?>
