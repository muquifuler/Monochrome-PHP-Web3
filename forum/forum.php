
<?php
    session_start();

    $mysqli = new mysqli('$SERVER','$USER','$PASS','$BD');

    $cont_featured=0;
    $cont_posts=0;

    $category = $_POST['category'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monochrome NFT</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

        <main id="main">
            <div class="main">
                <div class="titut">
                    <pre  class="letra_style block" style="">
          ____                                                   ,---,                                    ____
        ,'  , `.                                               ,--.' |                                  ,'  , `.
     ,-+-,.' _ |    ,---.         ,---,     ,---.              |  |  :       __  ,-.    ,---.        ,-+-,.' _ |
  ,-+-. ;   , ||   '   ,'\    ,-+-. /  |   '   ,'\             :  :  :     ,' ,'/ /|   '   ,'\    ,-+-. ;   , ||
 ,--.'|'   |  ||  /   /   |  ,--.'|'   |  /   /   |    ,---.   :  |  |,--. '  | |' |  /   /   |  ,--.'|'   |  ||    ,---.
|   |  ,', |  |, .   ; ,. : |   |  ,"' | .   ; ,. :   /     \  |  :  '   | |  |   ,' .   ; ,. : |   |  ,', |  |,   /     \
|   | /  | |--'  '   | |: : |   | /  | | '   | |: :  /    / '  |  |   /' : '  :  /   '   | |: : |   | /  | |--'   /    /  |
|   : |  | ,     '   | .; : |   | |  | | '   | .; : .    ' /   '  :  | | | |  | '    '   | .; : |   : |  | ,     .    ' / |
|   : |  |/      |   :    | |   | |  |/  |   :    | '   ; :__  |  |  ' | : ;  : |    |   :    | |   : |  |/      '   ;   /|
|   | |`-'        \   \  /  |   | |--'    \   \  /  '   | '.'| |  :  :_:,' |  , ;     \   \  /  |   | |`-'       '   |  / |
|   ;/             `----'   |   |/         `----'   |   :    : |  | ,'      ---'       `----'   |   ;/           |   :    |
'---'                       '---'                    \   \  /  `--''                            '---'             \   \  /
                                                      `----'                                                       `----'
              
                    </pre>
                </div>
                <div class="flex">
                    <button onclick="home_f()">Inicio</button>
                    <button onclick="myProfile_f()">Mi Perfil</button>
                    <button onclick="postQuestion_f()">Post Question</button>

                    <?php if($_SESSION['state'] == 'Online'){ ?>
                    <form action="../PHP/session_close.php" method="post">
                        <input class="logout" type="submit" value="Log out">
                        <input type="hidden" name="url" id="url" value="../buttons/myProfile.php">
                    </form>
                    <?php }else{ ?>
                    <form name="login" action="../PHP/session.php" method="POST">
                        <input type="hidden" name="wallet" id="wallet">
                        <input type="hidden" name="url" id="url" value="../buttons/myProfile.php">
                    </form>
                    <button onclick="sendForm_login()">Log in</button>
                    <?php } ?>

                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">POWERED BY <a class="letra_style" href="https://autotoken.tech/" target="blank_" style="color: #f700ff;">AUTOTOKEN ECOSYSTEM</a></span>
                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">~ Monochrome NFT (1.101w 19-Jan-22) (Last on Wed May 14 13:36)</span>
                </div>
                <div class="flex" style="height: 60vh;">
                    <div class="bloqs izq" style="width: 100%; padding-left: 1vw; padding-right: 1vw;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="border:0;"></td>
                                <td><span class="letra_style2">Matter</span></td>
                                <td><span class="letra_style2">Started by</span></td>
                                <td><span class="letra_style2">Answers</span></td>
                                <td><span class="letra_style2">Views</span></td>
                                <td><span class="letra_style2">Last message</span></td>
                            </tr>
                            <tr>
                                <td colspan="6">Featured</td>
                            </tr>
                            <?php

$query = $mysqli -> query ($sql = "SELECT * FROM `Posts` WHERE category = \"$category\" and priority = \"yes\";");
                            
                                while($valores = mysqli_fetch_array($query)){
                                    $description = $valores[description];
                                    $query12 = $mysqli -> query ($sql12 = "SELECT COUNT(`answers`) AS `num_respuestas` FROM `Answers` WHERE question = \"$description\";");
                                    $valores12 = mysqli_fetch_array($query12);
                                    $cont_featured = $cont_featured+1;
                                    if(!isset($valores12[num_respuestas])){
                                        $valores12[num_respuestas] = 0;
                                    }
                                 echo "<tr>
                                 <td class='td' style='border:0;'></td>
                                 
                                 <td class='td' style='padding:0;'>
                                 <form action='./question.php' name='question".$cont_featured."' method='post'>
                                     <input type='hidden' name='title' value='".$valores[title]."'>
                                     <input type='hidden' name='category' value='".$category."'>
                                     <input type='submit' value='".$valores[title]."' class='letra_style' style='width:100%; text-align:left; background-color:transparent; color: #00ff00; border:0; outline:none; font-family:monospace;'>
                                 </form>
                                 </td>
                                 <td class='td'>".$valores[name]."</td>
                                 <td>".$valores12[num_respuestas]."</td>
                                 <td>".$valores[views]."</td>
                                 <td>".$valores[publication]."</td>
                                  </tr>";
                                }

                                /*
                                echo $valores[description];
                                echo $valores[tags];
                                echo $valores[fund_raising];
                                echo $valores[author_address];*/
                            ?>
                            <tr>
                                <td colspan="6">Posts</td>
                            </tr>
                            <?php

$query = $mysqli -> query ($sql = "SELECT * FROM `Posts` WHERE category = \"$category\" and priority = \"no\";");

                                while($valores = mysqli_fetch_array($query)){
                                    $description = $valores[description];
                                    $query12 = $mysqli -> query ($sql12 = "SELECT COUNT(`answers`) AS `num_respuestas` FROM `Answers` WHERE question = \"$description\";");
                                    $valores12 = mysqli_fetch_array($query12);
                                $cont_posts = $cont_posts+1;
                                if(!isset($valores12[num_respuestas])){
                                    $valores12[num_respuestas] = 0;
                                }
                            echo "<tr>
                                <td class='td' style='border:0;'></td>
                                
                                <td class='td'>
                                <form action='./question.php' name='question".$cont_posts."' method='post'>
                                    <input type='hidden' name='title' value='".$valores[title]."'>
                                    <input type='hidden' name='category' value='".$category."'>
                                    <input type='submit' value='".$valores[title]."' class='letra_style' style='width:100%; text-align:left; background-color:transparent; color: #00ff00; border:0; outline:none; font-family:monospace;'>
                                </form>
                                </td>
                                <td class='td'>".$valores[name]."</td>
                                <td>".$valores12[num_respuestas]."</td>
                                <td>".$valores[views]."</td>
                                <td>".$valores[publication]."</td>
                                 </tr>";

                                }

                                /*
                                echo $valores[description];
                                echo $valores[tags];
                                echo $valores[fund_raising];
                                echo $valores[author_address];*/
                            ?>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="../app.js"></script>
    </body>
</html>
