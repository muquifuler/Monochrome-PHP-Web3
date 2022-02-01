<?php
    session_start();
    
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
                    <button onclick="home_b()">Inicio</button>
                    <button onclick="myProfile_b()">Mi Perfil</button>
                    <button>Post Question</button>

                    <?php if($_SESSION['state'] == 'Online'){ ?>
                    <form action="../PHP/session_close.php" method="post">
                        <input class="logout" type="submit" value="Log out">
                        <input type="hidden" name="url" id="url" value="../buttons/postQuestion.php">
                    </form>
                    <?php }else{ ?>
                    <form name="login" action="../PHP/session.php" method="POST">
                        <input type="hidden" name="wallet" id="wallet">
                        <input type="hidden" name="url" id="url" value="../buttons/postQuestion.php">
                    </form>
                    <button onclick="sendForm_login()">Log in</button>
                    <?php } ?>

                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">POWERED BY <a class="letra_style" href="https://autotoken.tech/" target="blank_" style="color: #f700ff;">AUTOTOKEN ECOSYSTEM</a></span>
                    <span class="letra_style" style="margin-top:2vh; margin-left: 4vw ;">~ Monochrome NFT (1.101w 19-Jan-22) (Last on Wed May 14 13:36)</span>
                </div>
                <div class="flex" style="height: 60vh;">
                <form style="display:flex;width:100%;" action="../PHP/send_answers.php" method="post">
                    <div class="bloqs izq" style="width: 70%; text-align: center;">
                        <span class="letra_style2 block">-------------------</span>
                        <span class="letra_style2 block">| Your answer... |</span>
                        <span class="letra_style2 block">-------------------</span>
                        <div style="text-align: left; margin-left: 2vw; width: 35vw;">
                        <input type="hidden" name="address" value="<?php echo $_SESSION['wallet'];?>">
                        <input type="hidden" name="question" value="<?php echo $_SESSION['question'];?>">
                        <input type="hidden" name="name" value="<?php echo $_SESSION['name'];?>">
                            <span class="letra_style block" style="margin-bottom: 2vh; margin-top: 2vh;" maxlength="2000">Answer: (2000 max)</span>
                            <textarea name="answers" class="input_tag ask centre opacity" style="height: 15vh; resize:none;" placeholder="Here you can develop your answer..."></textarea>                  
                        </div>
                    </div>
                        <input class="boton" type="submit" value="Post">
                    </form>
                </div>
            </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="../app.js"></script>
    </body>
</html>