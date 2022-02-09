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

-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monochrome NFT</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <main class="welcome" id="welcome" style="display: none;">

            <div class="monochrome">
                <pre  class="letra_style block">
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

        </main>

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
                    <button>Inicio</button>
                    <button onclick="myProfile()">Mi Perfil</button>
                    <button onclick="postQuestion()">Post Question</button>

                    <?php if($_SESSION['state'] == 'Online'){ ?>
                    <form action="./PHP/session_close.php" method="post">
                        <input class="logout" type="submit" value="Log out">
                        <input type="hidden" name="url" id="url" value="../index.php">
                    </form>
                    <?php }else{ ?>
                    <form name="login" action="./PHP/session.php" method="POST">
                        <input type="hidden" name="wallet" id="wallet">
                        <input type="hidden" name="url" id="url" value="../index.php">
                    </form>
                    <button onclick="sendForm_login()">Log in</button>
                    <?php } ?>
                    
                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">POWERED BY <a class="letra_style" href="https://autotoken.tech/" target="blank_" style="color: #f700ff;">AUTOTOKEN ECOSYSTEM</a></span>
                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">~ Monochrome NFT (1.101w 19-Jan-22) (Last on Wed May 14 13:36)</span>
                </div>
                <div class="flex" style="height: 60vh;">
                    <div class="bloqs izq" style="width: 20%;">
                        <div class="card">
                            <span class="letra_style2 block">Monochrome NFT</span>
                        </div>
                        <a href="#" class="letra_style block izq_letras">Faq's</a>
                        <a href="https://alfonsorob11.gitbook.io/monochrome/" class="letra_style block izq_letras">Whitepaper</a>
                        <span class="letra_style block izq_letras">---------------------</span>
                        <div class="card">
                            <span class="letra_style2 block">Hot Tags</span>
                        </div>
                        <a href="#" class="letra_style block izq_letras">#P2E</a>
                        <a href="#" class="letra_style block izq_letras">#lowMarketCap</a>
                        <a href="#" class="letra_style block izq_letras">#oracle</a>
                        <a href="#" class="letra_style block izq_letras">#CCAR</a>
                        <a href="#" class="letra_style block izq_letras">#DeFi</a>
                        <span class="letra_style block izq_letras">---------------------</span>
                        <div class="card">
                            <span class="letra_style2 block">Join the team</span>
                        </div>
                        <a href="https://alfonsorob11.gitbook.io/monochrome/join-the-team-affiliate/moderator" class="letra_style block izq_letras">Moderator</a>
                        <span class="letra_style block izq_letras">Advisor</span>
                        <span class="letra_style block izq_letras">Community Manager</span>
                        <span class="letra_style block izq_letras">---------------------</span>
                        <div class="card">
                            <span class="letra_style2 block">Contact us</span>
                        </div>
                        <div class="flex" style="padding: 10px;">
                            <div class="" style="width: 20%;">
                            
                            </div>
                            <div class="" style="width: 20%;">
                            
                            </div>
                            <div class="" style="width: 20%;">
                            
                            </div>
                            <div class="" style="width: 20%;">

                            </div>
                            <div class="" style="width: 20%;">

                            </div>
                        </div>
                    </div>
                    <div class="bloqs centre" style="width: 57%; text-align: center;">
                        <div class="card">
                            <span class="letra_style2 block">*----------- This forum talks about Dapps on the blockchain -----------*</span>
                        </div>
                        <table style="margin:0; width:100%;">
                            <tr>
                                <td colspan="2">Forum name</td>
                                <td>Views</td>
                                <td>Posts</td>
                                <td>Latest posts</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="letra_style2" style="text-align:center;">Official</td>
                            </tr>
                            <?php
                            $query = $mysqli -> query ($sql = "SELECT DISTINCT `category` FROM `Posts` ORDER BY `views` DESC;");
                            
                            while($valores = mysqli_fetch_array($query)){

                                $nombre_categoria = '';
                            if($valores[category] == 'announcements_official' || $valores[category] == 'news_and_updates_official') {
                                if($valores[category] == 'announcements_official'){
                                    $nombre_categoria = 'Announcements';
                                    $type = 'Admin';
                                    $style = 'td_yellow';
                                }else
                                if($valores[category] == 'news_and_updates_official'){
                                    $nombre_categoria = 'News and Updates';
                                    $type = 'News';
                                    $style = 'td_yellow';
                                }

                                $category = $valores[category];
                                $query2 = $mysqli -> query ($sql2 = "SELECT `publication` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valores2 = mysqli_fetch_array($query2);
                                
                                $queryg = $mysqli -> query ($sqlg = "SELECT SUM(`views`) AS `views` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valoresg = mysqli_fetch_array($queryg);

                                $queryk = $mysqli -> query ($sqlk = "SELECT COUNT(`title`) AS `title` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valoresk = mysqli_fetch_array($queryk);

                            echo "
                            <tr>
                                <td class='".$style."'>".$type."</td>
                                <td class='td' style='padding:0;'>
                                    <form action='./forum/forum.php' method='post'>
                                        <input type='hidden' name='category' value='".$valores[category]."'>
                                        <input class='boton' style='text-align:left; width:100%; height:4vh;' type='submit' value='".$nombre_categoria."'>
                                    </form>
                                </td>
                                <td>".$valoresg[views]."</td>
                                <td>".$valoresk[title]."</td>
                                <td>".$valores2[publication]."</td>
                            </tr>
                            ";
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="letra_style2" style="text-align:center;">General</td>
                            </tr>

                            <?php

                            $query = $mysqli -> query ($sql = "SELECT DISTINCT `category` FROM `Posts` ORDER BY `views` DESC;");
                            
                            while($valores = mysqli_fetch_array($query)){

                                $nombre_categoria = '';
                            if(!($valores[category] == 'announcements_official' || $valores[category] == 'news_and_updates_official')) {
                                if($valores[category] == 'suggestions_and_doubts_about_the_forum_general'){
                                    $nombre_categoria = 'Suggestions and doubts about the forum';
                                    $type = 'Blockchain';
                                    $style = 'td_fresh';
                                }
                                if($valores[category] == 'projects_that_do_not_belong_to_BSC_general'){
                                    $nombre_categoria = 'Projects that do not belong to BSC';
                                    $type = 'Blockchain';
                                    $style = 'td_fresh';
                                }

                                if($valores[category] == 'new_projects_games'){
                                    $nombre_categoria = "New Projects P2E";
                                    $type = 'P2E';
                                    $style = 'td_blue';
                                }
                                if($valores[category] == 'current_projects_games'){
                                    $nombre_categoria = "Current Projects P2E";
                                    $type = 'P2E';
                                    $style = 'td_blue';
                                }
                                if($valores[category] == 'others_games'){
                                    $nombre_categoria = "Others P2E";
                                    $type = 'P2E';
                                    $style = 'td_blue';
                                }

                                if($valores[category] == 'new_projects_nft'){
                                    $nombre_categoria = "New Projects NFT";
                                    $type = 'NFT';
                                    $style = 'td_legend';
                                }
                                if($valores[category] == 'current_projects_nft'){
                                    $nombre_categoria = "Current Projects NFT";
                                    $type = 'NFT';
                                    $style = 'td_legend';
                                }
                                if($valores[category] == 'others_nft'){
                                    $nombre_categoria = "Others NFT";
                                    $type = 'NFT';
                                    $style = 'td_legend';
                                }

                                if($valores[category] == 'new_projects_defi'){
                                    $nombre_categoria = "New Projects DeFi";
                                    $type = 'DeFi';
                                    $style = 'td_violet';
                                }
                                if($valores[category] == 'current_projects_defi'){
                                    $nombre_categoria = "Current Projects DeFi";
                                    $type = 'DeFi';
                                    $style = 'td_violet';
                                }
                                if($valores[category] == 'others_defi'){
                                    $nombre_categoria = "Others DeFi";
                                    $type = 'DeFi';
                                    $style = 'td_violet';
                                }

                                if($valores[category] == 'autotoken_ecosystem_offtopic'){
                                    $nombre_categoria = 'AutoToken Ecosystem';
                                    $type = 'Others';
                                    $style = 'td_roast';
                                }
                                if($valores[category] == 'troubleshooting_offtopic'){
                                    $nombre_categoria = 'Troubleshooting';
                                    $type = 'Others';
                                    $style = 'td_roast';
                                }
                                if($valores[category] == 'others_offtopic'){
                                    $nombre_categoria = 'Others';
                                    $type = 'Others';
                                    $style = 'td_roast';
                                }
                                

                                $category = $valores[category];
                                $query2 = $mysqli -> query ($sql2 = "SELECT `publication` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valores2 = mysqli_fetch_array($query2);
                                
                                $queryg = $mysqli -> query ($sqlg = "SELECT SUM(`views`) AS `views` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valoresg = mysqli_fetch_array($queryg);

                                $queryk = $mysqli -> query ($sqlk = "SELECT COUNT(`title`) AS `title` FROM `Posts` WHERE category = \"$category\" ORDER BY id DESC;");                      
                                $valoresk = mysqli_fetch_array($queryk);

                            echo "
                            <tr>
                                <td class='".$style."'>".$type."</td>
                                <td class='td' style='padding:0;'>
                                    <form action='./forum/forum.php' method='post'>
                                        <input type='hidden' name='category' value='".$valores[category]."'>
                                        <input class='boton' style='text-align:left; width:100%; height:4vh;' type='submit' value='".$nombre_categoria."'>
                                    </form>
                                </td>
                                <td>".$valoresg[views]."</td>
                                <td>".$valoresk[title]."</td>
                                <td>".$valores2[publication]."</td>
                            </tr>
                            ";
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="bloqs" style="width: 23%;">
                        <div class="card">
                            <span class="letra_style2 block">Search by tag</span>
                        </div>
                        <input class="input_tag opacity" type="text" style="margin-left: 0.6vw;" placeholder="#oracle"><input type="submit" class="input_tag boton" value="Go">
                        <div class="card">
                            <span class="letra_style2 block">My Profile</span>
                        </div>
                        <a href="./buttons/myProfile.php" class="letra_style block izq_letras">~ <span name="name"><?php if($_SESSION['name'] == null || $_SESSION['name'] == ''){ echo 'Anon'; }else{ echo $_SESSION['name']; } ?></span> [ <span id="address"><?php if($_SESSION['wallet'] == null || $_SESSION['wallet'] == ''){ echo ''; }else{ echo $_SESSION['wallet']; } ?></span> ]</a><!--anon-->
                        <span class="letra_style izq_letras" style="color: #22eedd;">ATK: <span id="token">0</span></span><span class="letra_style mtmb" style="margin-left:1vw; color: #fbff00;" id="bnb">BNB: 0</span><br>
                        <span class="letra_style block izq_letras">Level: <span name="level"><?php if($_SESSION['level'] == null || $_SESSION['level'] == ''){ echo '0'; }else{ echo $_SESSION['level']; } ?></span></span>
                        <span class="letra_style block izq_letras">Rank: <span name="rank"><?php if($_SESSION['rank'] == null || $_SESSION['rank'] == ''){ echo '...'; }else{ echo $_SESSION['rank']; } ?></span></span>
                        <span class="letra_style block izq_letras">Profile: <span name="profile"><?php if($_SESSION['profile'] == null || $_SESSION['profile'] == ''){ echo '...'; }else{ echo $_SESSION['profile']; } ?></span></span>
                        <span class="letra_style block izq_letras">Posts: <span name="posts"><?php if($_SESSION['posts'] == null || $_SESSION['posts'] == ''){ echo '0'; }else{ echo $_SESSION['posts']; } ?></span></span>
                        <span class="letra_style block izq_letras">Likes: <span name="likes"><?php if($_SESSION['likes'] == null || $_SESSION['likes'] == ''){ echo '0'; }else{ echo $_SESSION['likes']; } ?></span></span>
                        <span class="letra_style block izq_letras">Team: <span name="team"><?php if($_SESSION['team'] == null || $_SESSION['team'] == ''){ echo '...'; }else{ echo $_SESSION['team']; } ?></span></span>
                        <div class="card">
                            <span class="letra_style2 block">Forum statistics</span>
                        </div>
                        <?php
                            $queryaddress = $mysqli -> query ($sqladdress = "SELECT COUNT(`address`) AS `total_users` FROM `Users`");                      
                            $valoresaddress = mysqli_fetch_array($queryaddress);
                        ?>
                        <span class="letra_style block izq_letras">Total Users: <?php echo $valoresaddress[total_users]; ?></span>
                        <?php
                            $querytemas = $mysqli -> query ($sqltemas = "SELECT DISTINCT COUNT(`title`) AS `total_temas` FROM `Posts`");                      
                            $valorestemas = mysqli_fetch_array($querytemas);
                        ?>
                        <span class="letra_style block izq_letras">Total Posts: <?php echo $valorestemas[total_temas]; ?></span>
                        <span class="letra_style block izq_letras">Total de categorías: 6</span>
                        <!--<span class="letra_style block izq_letras">Usuarios on-line: 900</span>-->
                        <div class="card">
                            <span class="letra_style2 block">Top users</span>
                        </div>
                        <?php
                            $querytemas = $mysqli -> query ($sqltemas = "SELECT DISTINCT COUNT(`title`) AS `total_temas` FROM `Posts`");                      
                            $valorestemas = mysqli_fetch_array($querytemas);
                        ?>
                        <a href="./forum/tops.php" class="letra_style block izq_letras">All time</a>
                        <div class="card">
                            <span class="letra_style2 block">Technical team</span>
                        </div>
                        <span class="letra_style block izq_letras">Support</span>
                    </div>
                    
                </div>
            </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="./app.js"></script>
    </body>
</html>
