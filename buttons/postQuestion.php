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
                <form style="display:flex;width:100%;" action="../PHP/send_posts.php" method="post">
                    <div class="bloqs izq" style="width: 70%; text-align: center;">
                        <span class="letra_style2 block">-------------------</span>
                        <span class="letra_style2 block">| Ask your question |</span>
                        <span class="letra_style2 block">-------------------</span>
                        <div style="text-align: left; margin-left: 2vw; width: 35vw;">

                            <span class="letra_style block" style="margin-bottom: 2vh; margin-top: 2vh;">Title: (70 max)</span>
                            <input name="title" type="text" class="input_tag ask opacity" maxlength="70" placeholder="Example: What are the best p2e currently?">
                            <span class="letra_style block" style="margin-bottom: 2vh; margin-top: 2vh;" maxlength="10000">Description: (10000 max) (only normal characters)</span>
                            <textarea name="description" class="input_tag ask centre opacity" style="height: 15vh; resize:none;" placeholder="Here you can develop your question..."></textarea>
                            <span class="letra_style block" style="margin-bottom: 2vh; margin-top: 2vh;">Tags: (Only 1)</span>
                            <input name="tags" type="text" class="input_tag ask opacity" style="margin-bottom: 2vh;" placeholder="#p2e">
                        
                        </div>
                    </div>
                    <div class="bloqs izq" style="width: 30%; margin-left: 1vw; padding-left: 1vw; padding-right: 1vw;">

                                <span class="letra_style block">Category:</span>
                                <select class="route" name="category" id="category">
                                    <optgroup label="Official" class="options">
                                        <?php
                                        if($_SESSION['rank'] == 'Admin'){
                                            echo "<option class='options' value='announcements_official'>Announcements</option>";
                                        }else if($_SESSION['rank'] == 'Moderador' || $_SESSION['rank'] == 'Admin'){
                                            echo "<option class='options' value='news_and_updates_official'>News and updates</option>";
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="General" class="options">
                                        <option class="options" value="suggestions_and_doubts_about_the_forum_general">Suggestions and doubts about the forum</option>
                                        <option class="options" value="projects_that_do_not_belong_to_BSC_general">Projects that do not belong to BSC</option>
                                    </optgroup>
                                    <optgroup label="Games" class="options">
                                        <option class="options" value="new_projects_games">New Projects</option>
                                        <option class="options" value="current_projects_games">Current Projects</option>
                                        <option class="options" value="others_games">Others</option>
                                    </optgroup>
                                    <optgroup label="NFT" class="options">
                                        <option class="options" value="new_projects_nft">New Projects</option>
                                        <option class="options" value="current_projects_nft">Current Projects</option>
                                        <option class="options" value="others_nft">Others</option>
                                    </optgroup>
                                    <optgroup label="DeFi" class="options">
                                        <option class="options" value="new_projects_defi">New Projects</option>
                                        <option class="options" value="current_projects_defi">Current Projects</option>
                                        <option class="options" value="others_defi">Others</option>
                                    </optgroup>
                                    <optgroup label="Off-Topic" class="options">
                                        <option class="options" value="autotoken_ecosystem_offtopic">AutoToken Ecosystem</option>
                                        <option class="options" value="troubleshooting_offtopic">Troubleshooting</option>
                                        <option class="options" value="others_offtopic" selected>Others</option>
                                    </optgroup>
                                </select>

                        <span class="letra_style block">Fund-raising:</span>
                            <select class="route" name="fund-raising" id="category">
                                <option class="options" value="fund-y">Yes</option>
                                <option class="options" value="fund-n" selected>No</option>
                            </select>
                            <input type="hidden">
                        <!--<span class="letra_style block">Attach image or video:</span>
                        <input class="boton" type="file">-->
                        <input class="boton" type="submit" value="Post">

                    </div>
                    </form>
                </div>
            </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/web3@1.7.0/lib/index.js" integrity="sha256-npH2u6SrLONpdNW4QOj4YmDEVeTs3o4RttcpdIkfOMw=" crossorigin="anonymous"></script>
        <script src="../app.js"></script>
    </body>
</html>