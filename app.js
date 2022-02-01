
//window.addEventListener('load', function() {
//    colorsTop();
//});

// Redirecciones

    // Desde home
    function myProfile(){
        window.location.href = "./buttons/myProfile.php";
    }
    function postQuestion(){
        window.location.href = "./buttons/postQuestion.php";
    }

    // Desde buttons

    function home_b(){
        window.location.href = "../index.php";
    }
    function myProfile_b(){
        window.location.href = "./myProfile.php";
    }
    function postQuestion_b(){
        window.location.href = "./postQuestion.php";
    }

    // Desde Forum

    function home_f(){
        window.location.href = "../index.php";
    }
    function myProfile_f(){
        window.location.href = "../buttons/myProfile.php";
    }
    function postQuestion_f(){
        window.location.href = "../buttons/postQuestion.php";
    }

    function home_q(){
        window.location.href = "../index.php";
    }
    function myProfile_q(){
        window.location.href = "../buttons/myProfile.php";
    }
    function postQuestion_q(){
        window.location.href = "../buttons/postQuestion.php";
    }

        // Forum

        function goQuestion(cont){
            document.question+cont.submit();
        }

        function answers(){
            window.location.href = "./answers.php";
        }

        function returnForum(url){
            window.location.href = "./"+url;
        }

        function returnQuestion(){
            window.location.href = "./question.php";
        }
// Colors
function colorsTop(){
    i = 1;
    while(i < 101){
        if(document.getElementById("rank"+i).innerHTML == 'Newbie'){
            document.getElementById("rank"+i).style = 'color:#00ff00;';
        }
        if(document.getElementById("rank"+i).innerHTML == 'Recruit'){
            document.getElementById("rank"+i).style = 'color:#fbff00;';
        }
        if(document.getElementById("rank"+i).innerHTML == 'Veteran'){
            document.getElementById("rank"+i).style = 'color:#ff4800;';
        }
        if(document.getElementById("rank"+i).innerHTML == 'Investor'){
            document.getElementById("rank"+i).style = 'color:#a6ff00;';
        }
        if(document.getElementById("rank"+i).innerHTML == 'Crypto-Wizard'){
            document.getElementById("rank"+i).style = 'color:#7700ff;';
        }
        if(document.getElementById("rank"+i).innerHTML == 'Legend'){
            document.getElementById("rank"+i).style = 'color:#ff00dd;';
        }

        if(document.getElementById("profile"+i).innerHTML == 'Admin'){
            document.getElementById("profile"+i).style = 'color:#ff0000;';
        }
        if(document.getElementById("profile"+i).innerHTML == 'Affiliate'){
            document.getElementById("profile"+i).style = 'color:#ff9100;';
        }
        if(document.getElementById("profile"+i).innerHTML == 'Moderator'){
            document.getElementById("profile"+i).style = 'color:#ff0055;';
        }
        if(document.getElementById("profile"+i).innerHTML == 'Reporter'){
            document.getElementById("profile"+i).style = 'color:#00ffea;';
        }
        if(document.getElementById("profile"+i).innerHTML == 'User'){
            document.getElementById("profile"+i).style = 'color:#00ff00;';
        }
        i++;
    }
}
function colorsTop2(){
    i = 1;
    while(i < 101){
        if(document.getElementById("_rank"+i).innerHTML == 'Newbie'){
            document.getElementById("_rank"+i).style = 'color:#00ff00;';
        }
        if(document.getElementById("_rank"+i).innerHTML == 'Recruit'){
            document.getElementById("_rank"+i).style = 'color:#fbff00;';
        }
        if(document.getElementById("_rank"+i).innerHTML == 'Veteran'){
            document.getElementById("_rank"+i).style = 'color:#ff4800;';
        }
        if(document.getElementById("_rank"+i).innerHTML == 'Investor'){
            document.getElementById("_rank"+i).style = 'color:#a6ff00;';
        }
        if(document.getElementById("_rank"+i).innerHTML == 'Crypto-Wizard'){
            document.getElementById("_rank"+i).style = 'color:#7700ff;';
        }
        if(document.getElementById("_rank"+i).innerHTML == 'Legend'){
            document.getElementById("_rank"+i).style = 'color:#ff00dd;';
        }

        if(document.getElementById("_profile"+i).innerHTML == 'Admin'){
            document.getElementById("_profile"+i).style = 'color:#ff0000;';
        }
        if(document.getElementById("_profile"+i).innerHTML == 'Affiliate'){
            document.getElementById("_profile"+i).style = 'color:#ff9100;';
        }
        if(document.getElementById("_profile"+i).innerHTML == 'Moderator'){
            document.getElementById("_profile"+i).style = 'color:#ff0055;';
        }
        if(document.getElementById("_profile"+i).innerHTML == 'Reporter'){
            document.getElementById("_profile"+i).style = 'color:#00ffea;';
        }
        if(document.getElementById("_profile"+i).innerHTML == 'User'){
            document.getElementById("_profile"+i).style = 'color:#00ff00;';
        }
        i++;
    }
}

// Web3

async function Connect(){

    if(window.ethereum.chainId=='0x38'){
        if(ethereum.selectedAddress){

        }else{
            await window.ethereum.enable();
            web3 = new Web3(window.ethereum);
        }
    }else if(window.ethereum.chainId){
        alert('We currently only support binance smart chain, make sure you choose the correct network');
    }else{
        await window.ethereum.enable();
        web3 = new Web3(window.ethereum);
    }
    
    return ethereum.selectedAddress;
}

async function pagarBNB(){
    //web3 = new Web3(window.ethereum);
    document.getElementById('paybnb').value;
    cantidadQueManda = 35000000000000000;
    web3.eth.sendTransaction({from: ethereum.selectedAddress, to: '0xeDe2E77b8DbA16769BAcA9F53e01d97ba30FC0E8', value: cantidadQueManda.toString()})

    //minimo bnb 10000000000000000 = 0.01 BNB
    //minimo bnb 35000000000000000 = 0.035 BNB
    //maximo bnb 5000000000000000000 = 5 BNB
}

// Login

async function sendForm_login(){

    try{
        const datos = await Connect();
        document.getElementById("wallet").value = datos;
        //document.getElementById("new_address").value = datos;
        if(window.ethereum.chainId!='0x38' || ethereum.selectedAddress==null){

        }else{
            document.login.submit();
        }
    }catch(err){
        sendForm_login();
    }

    //document.getElementById("wallet").value = ethereum.selectedAddress;
    //document.login.submit();

}



/*

*/
