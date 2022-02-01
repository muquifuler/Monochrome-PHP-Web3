<?php
    session_start();
    $mysqli = new mysqli('localhost','u505721908_muquifuler','SkDoL:&M;2*','u505721908_autotoken');



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
                    <button onclick="home_q()">Inicio</button>
                    <button onclick="myProfile_q()">Mi Perfil</button>
                    <button onclick="postQuestion_q()">Post Question</button>

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
                    <div class="centre" style="width: 100%;">
                       <table>
                          
                        <?php 
                            if(isset($_POST['title'])){
                                $title = $_POST['title'];
                                $url = $_POST['url'];
                                $category_ = $_POST['category'];
                                $_SESSION['title'] = $_POST['title'];
                                $_SESSION['url'] = $_POST['url'];
                                $_SESSION['category'] = $_POST['category'];
                            }else{
                                $title = $_SESSION['title'];
                                $url = $_SESSION['url'];
                                $category_ = $_SESSION['category'];
                            }
                        

                            $query = $mysqli -> query ($sql = "SELECT * FROM `Posts` WHERE title = \"$title\";");
                            $valores = mysqli_fetch_array($query);
                            
                            $views = $valores[views]+1;
                            $query8 = $mysqli -> query ($sql8 = "UPDATE `Posts` SET `views`=\"$views\" WHERE title = \"$title\";");
                            $valores8 = mysqli_fetch_array($query8);

                            $_SESSION['question'] = $valores[description];
                            $wallet = $valores[author_address];

                            $query2 = $mysqli -> query ($sql2 = "SELECT * FROM `Users` WHERE address = \"$wallet\";");
                            $valores2 = mysqli_fetch_array($query2);

                          echo "<tr>
                               <td style='width:15%; text-align:center;'>
                                    <div class='bloqs' style='width: 150px; height: 150px;'>
                                        <img src='../img/1.jpeg' alt='' style='width: 150px; height: 150px;'>
                                    </div>
                                    <span class='letra_style2 block mtmb'>".$valores2[name]."</span>
                                    <span class='letra_style block mtmb'>".substr($wallet, 0, 4)."...".substr($wallet, 38)."</span>
                                    <span class='letra_style block mtmb'>La leche no es sana</span>
                                    <span class='letra_style block mtmb'>Post: ".$valores[publication]."</span>
                                    <span class='letra_style block mtmb'>Respuestas: ".$valores[num_respuestas]."</span>
                                    <span class='letra_style block mtmb'>Views: ".$valores[views]."</span>
                                    <button onclick='answers()'>Answer to</button>
                               </td>
                               <td colspan='2' class='text-top' style='padding-left:2vw;padding-right:2vw;'>
                                    <form method='post' action='./forum.php'>
                                        <input type='hidden' name='category' value='".$category_."'>
                                        <input class='boton' type='submit' value='Return'>
                                    </form>
                                    <span class='letra_style2 block mtmb' style='text-align:center;'>".$valores[title]."</span>
                                    <p class='letra_style block mtmb'>".$valores[description]."</p>";
                                    if($valores[fund_raising] == 'fund-n'){
                                        echo "";
                                    }else{
                                        echo "
                                        <div class='fund'>
                                            <span>Total recaudado: 1000 BNB</span>
                                            <div class='mtmb'>
                                            <span style='color:blue;'>From:</span>  <span>0x23...123a </span><span style='color:blue;'>To: </span><span>0x23...123a </span>
                                            </div>
                                            <div class='mtmb' style='margin-bottom:0;'>
                                                <input type='text' placeholder='Only BNB' class='paybnb' id='paybnb'><button style='margin-left:0;' onclick='pagarBNB()'>Pay</button>
                                            </div>
                                        </div>" ; 
                                    }
                               echo "</td>
                            </tr>
                            <tr>
                                <td colspan='3' style='text-align:center;'>
                                    <span class='letra_style mtmb' style='color: #f700ff;'>Just one like per question</span>
                                </td>
                            </tr>";
                          
                       ?>

                            <tr>
                                <td style='border:none;'></td>
                                <td style='border:none;'>
                                    <span class='letra_style'>Ordenar por: </span>
                                    <button>Likes</button>
                                    <button>Ultimos</button>
                                </td>
                                <td style='border:none;'></td>
                            </tr>


                            <?php // la respuesta
                            $question = $_SESSION['question'];
                            $query4 = $mysqli -> query ($sql4 = "SELECT * FROM `Answers` WHERE question = \"$question\";");

                            while($valores4 = mysqli_fetch_array($query4)){
                                $_publc = $valores4[answers];
                            echo "<tr class='respuestas'> 
                                <td colspan='2' class='text-top' style='padding-left:2vw;padding-right:2vw;'>
                                    <span class='letra_style block mtmb'>".$_publc."</span>
                                </td>
                                <td style='width:15%; text-align:center;'>
                                    <span class='letra_style2 block mtmb'>".$valores4[name]."</span>
                                    <span class='letra_style block mtmb'>".$valores4[address]."</span>
                                    <span class='letra_style block mtmb'>La leche no es sana</span>
                                    <span class='letra_style block mtmb'>Post: ".$_publc."</span>
                                    <span class='letra_style block mtmb'>Likes: ".$valores4[likes]."</span>
                                    <form method='post' action='../PHP/like.php'>
                                        <input type='hidden' name='answers' value='".$_publc."'>
                                        <input class='boton' type='submit' value='Like'>
                                    </form>
                                </td>
                           </tr>";
                            }

                            ?>
                       </table>
                    </div>
                </div>
            </div><!--
            <div class='bloqs' style='width: 150px; height: 150px;'>
                                        <img src='../img/1.jpeg' alt=' style='width: 150px; height: 150px;'>
                                    </div>-->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="../app.js"></script>
    </body>
</html>