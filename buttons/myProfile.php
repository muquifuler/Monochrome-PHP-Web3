<?php
    session_start();
?>

<!--

Puede ser que se haya quedado en cache app.js o style.css

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
                    <button onclick="home_b()">Inicio</button>
                    <button>Mi Perfil</button>
                    <button onclick="postQuestion_b()">Post Question</button>

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
                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">~ Monochrome NFT (1.101w 19-Jan-22) (Last on Wed May 14 13:36)
                </span>
                </div>
                <div class="flex" style="height: 60vh;">
                    <div class="bloqs izq" style="width: 80%; padding-left: 1vw; padding-right: 1vw;">
                        <div class="flex">
                            <div class="bloqs" style="width: 150px; height: 150px; margin-right: 1vw;">
                                <img src="../img/1.jpeg" alt="" style="width: 150px; height: 150px;">
                            </div>
                            <div class="flex">
                                <div style="margin-right:2vw;">
                                    <span class="letra_style2 mtmb"><span id="respuesta"><?php if($_SESSION['name'] == null || $_SESSION['name'] == ''){ echo 'Anon'; }else{ echo $_SESSION['name']; } ?></span></span>
                                    <span style=" color:#00ff00 ;"><?php if($_SESSION['state'] == null || $_SESSION['state'] == ''){ echo 'Offline'; }else{ echo $_SESSION['state']; } ?></span>
                                    <span class="letra_style block mtmb">[ <?php if($_SESSION['wallet'] == null || $_SESSION['wallet'] == ''){ echo '...'; }else{ echo $_SESSION['wallet']; } ?> ]</span>
                                    <span class="letra_style mtmb" style="color: #22eedd;">ATK: 0</span><span class="letra_style mtmb" style="margin-left:1vw; color: #fbff00;" id="bnb">BNB: 0</span>
                                    <span class="letra_style block mtmb">Followers: <?php if($_SESSION['followers'] == null || $_SESSION['followers'] == ''){ echo '0'; }else{ echo $_SESSION['followers']; } ?></span>
                                    <input type="text" class="block mtmb input_tag ask centre opacity" style="width:6vw; height:0.3vh; resize:none;" placeholder="Your bio...">
                                    <input type="submit" class="boton" value="Save Changes">
                                </div>
                                <div style="height:19vh;">
                                    <?php if($_SESSION['state'] == null || $_SESSION['state'] == ''){ echo ''; }else{ ?> 
                                    <form action="../PHP/register.php" method="post" style="width:25vw; text-align:center; margin-bottom:1vh;">
                                        <span class="letra_style block mtmb">Registration / New profile</span>
                                        <input class="input_tag opacity" type="text" name="new_name" placeholder="Your new name...">
                                        <input type="submit" class="boton" style="padding:10px;" value="Register in One Click">
                                        <span class="letra_style2 block mtmb">* Warning *</span>
                                        <span class="letra_style">When creating a new profile all the statistics in the forum will be reset, you can only have <span style="color:#a556ff;">1 profile per address.</span></span>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div style="width: 10vw;">
                            <?php
                                $rank = $valorestemas[rank];
                                if($rank == 'Newbie'){
                                    $style_rank = '#00ff00;';
                                }
                                if($rank == 'Recruit'){
                                    $style_rank = 'color:#fbff00;';
                                }
                                if($rank == 'Veteran'){
                                    $style_rank = 'color:#ff4800;';
                                }
                                if($rank == 'Investor'){
                                    $style_rank = 'color:#a6ff00;';
                                }
                                if($rank == 'Crypto-Wizard'){
                                    $style_rank = 'color:#7700ff;';
                                }
                                if($rank == 'Legend'){
                                    $style_rank = 'color:#ff00dd;';
                                }
                            ?>
                                <span class="letra_style block mtmb" name="level">Level: <?php if($_SESSION['level'] == null || $_SESSION['level'] == ''){ echo '0'; }else{ echo $_SESSION['level']; } ?></span>
                                <span class="letra_style block mtmb" name="rank" id="rank">Rank: <?php if($_SESSION['rank'] == null || $_SESSION['rank'] == ''){ echo '...'; }else{ echo $_SESSION['rank']; } ?></span>
                                <span class="letra_style block mtmb" name="profile" id="profile">Profile: <?php if($_SESSION['profile'] == null || $_SESSION['profile'] == ''){ echo '...'; }else{ echo $_SESSION['profile']; } ?></span>
                                <span class="letra_style block mtmb" name="posts">Posts: <?php if($_SESSION['posts'] == null || $_SESSION['posts'] == ''){ echo '0'; }else{ echo $_SESSION['posts']; } ?></span>
                                <span class="letra_style block mtmb" name="likes">Likes: <?php if($_SESSION['likes'] == null || $_SESSION['likes'] == ''){ echo '0'; }else{ echo $_SESSION['likes']; } ?></span>
                                <span class="letra_style block mtmb" name="creation">Created in: <?php if($_SESSION['created'] == null || $_SESSION['created'] == ''){ echo '...'; }else{ echo $_SESSION['created']; } ?></span>
                                <span class="letra_style block mtmb" name="team">Team: <?php if($_SESSION['team'] == null || $_SESSION['team'] == ''){ echo '...'; }else{ echo $_SESSION['team']; } ?></span>
                                
                            </div>
                            <div style="width: 35vw;">
                           
                            </div>
                        </div>
                        <span class="letra_style block mtmb">Achievements: </span>
                        <div class="flex bloq_achievements">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                            <img class="achievements" onclick="claim()" src="../img/achievements/1.jpeg" alt="Logros" height="100" width="100">
                        </div>
                    </div>
                    <div class="bloqs izq" style="width: 20%; text-align: center;">

                        <span class="letra_style2 block">----------</span>
                        <span class="letra_style2 block"> Friends </span>
                        <span class="letra_style2 block">----------</span>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Twitter</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Instagram</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Facebook</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Discord</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Telegram</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Web</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Email</a>

                        <span class="letra_style2 block">-----------------------</span>
                        <span class="letra_style2 block"> Your social networks </span>
                        <span class="letra_style2 block">-----------------------</span>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Twitter</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Instagram</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Facebook</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Discord</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Telegram</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Web</a>
                        <a href="#" class="letra_style block" style="margin-top: 1vh;">add Email</a>
                    </div>
                </div>
            </div>

        </main>
<!--
        <form style="background-color:red;" id="desdeFormulario" name="desdeFormulario" role="form"> 
            <input type="hidden" name="wallet" id="wallet"> 
            <button style="background-color:red;" id="action-button" type="submit"></button> 
        </form>
        <h2 style="background-color:red;" id='respuesta'></h2>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="../app.js"></script>
    </body>
</html>


