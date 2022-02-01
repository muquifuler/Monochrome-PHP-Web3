<?php
    session_start();
    $mysqli = new mysqli('$SERVER','$USER','$PASS*','$BD');

?>
<!--

    Un foro con un aspecto que recrea una consola de comandos e imita
    el actual funcionamiento de telnet, 

    Tokenomics

        90% pool reservada a quema paulatina de 1 año
        7% Public Sale
        3% Private Sale

    Comisiones

        10% Devs
        50% Marketing
        40% AutoToken Ecosystem

    NFT

        Al publicar un articulo, este se minteará y la comision adicional
        sera de 1$.

    Funciones adicionales (Free)

        Cambiar foto perfil.
        Que salgan el num total de respuestas.
        Que suban de rango segun su implicacion en el foro.
        ?Ventajas adicionales en el foro como que tus respuestas salgan
        como destacadas.    

-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monochrome NFT</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <script src="../app.js"></script>
        <main id="main">
            <div class="main" style="margin-right:10vw; margin-left:10vw;">
                <div class="titut">
                    <pre  class="letra_style block" style="padding-left:12%;">
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
                    <div class="bloqs centre2" style="width: 49%; text-align: center;">
                        <table style="width:96%; margin-left:2%;">
                            <tr>
                                <td class="tops"></td>
                                <td class="tops">Name</td>
                                <td class="tops">Address</td>
                                <td class="tops">Level</td>
                                <td class="tops">Rank</td>
                                <td class="tops">Profile</td>
                                <td class="tops td_fresh">$ATK</td>
                                <td class="tops">Reward</td>
                            </tr>

                            <?php
                            $querytemas = $mysqli -> query ($sqltemas = "SELECT * FROM `Users` ORDER BY ATK DESC"); 
                            $id=1;    
                            $cont=1;                 
                            while($valorestemas = mysqli_fetch_array($querytemas)){
                                $address = $valorestemas[address];
                            echo "<tr>
                                <td class='tops'>".$id++."</td>
                                <td class='td'>".$valorestemas[name]."</td>
                                <td>".substr($address, 0, 4)."...".substr($address, 38)."</td>
                                <td>".$valorestemas[level]."</td>
                                <td><span id='rank".$cont."'>".$valorestemas[rank]."</span></td>
                                <td><span id='profile".$cont."'>".$valorestemas[profile]."</span></td>
                                <td class='td_fresh'>".$valorestemas[ATK]."</td>
                                <td></td>
                            </tr>";$cont++;
                        };
                            ?>
                        </table>
                        <script>
                            colorsTop();
                        </script>
                    </div>         
                    <div class="bloqs centre2" style="width: 49%; text-align: center;">
                        <table style="width:96%; margin-left:2%;">
                            <tr>
                                <td class="tops"></td>
                                <td class="tops">Name</td>
                                <td class="tops">Address</td>
                                <td class="tops td_fresh">Level</td>
                                <td class="tops">Rank</td>
                                <td class="tops">Profile</td>
                                <td class="tops">$ATK</td>
                                <td class="tops">Reward</td>
                            </tr>
                            <?php
                            $querylevel = $mysqli -> query ($sqllevel = "SELECT * FROM `Users` ORDER BY level DESC"); 
                            $id=1;    
                            $cont=1;                    
                            while($valoreslevel = mysqli_fetch_array($querylevel)){
                                $address = $valoreslevel[address];
                            echo "<tr>
                                <td class='tops'>".$id++."</td>
                                <td class='td'>".$valoreslevel[name]."</td>
                                <td>".substr($address, 0, 4)."...".substr($address, 38)."</td>
                                <td class='td_fresh'>".$valoreslevel[level]."</td>
                                <td><span id='_rank".$cont."'>".$valoreslevel[rank]."</span></td>
                                <td><span id='_profile".$cont."'>".$valoreslevel[profile]."</span></td>
                                <td>".$valoreslevel[ATK]."</td>
                                <td></td>
                            </tr>";$cont++;
                        };
                            ?>
                        </table>
                        <script>
                            colorsTop2();
                        </script>
                    </div>
                </div>
            </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
    </body>
</html>
