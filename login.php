<?php
session_start();
require_once 'pdo.php';
if(isset($_POST['log'])){
    if(isset($_POST['pass']) && isset($_POST['userid'])){

        $stmta = $pdo->query("SELECT * FROM investor");
        $rowsa = $stmta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rowsa as $row) {
            if($_POST['userid']==$row['iemail'] && $_POST['pass']==$row['pass2']){
                $_SESSION['userid']=$_POST['userid'];
                $_SESSION['role']='investor';
                header('Location: investor/dashboard');
                return;
            }
        }

        $stmt = $pdo->query("SELECT * FROM company");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            if(($_POST['userid']==$row['cname']) && ($_POST['pass']==$row['pass'])){
                $_SESSION['userid']=$_POST['userid'];
                $_SESSION['role']='company';
                header('Location: company/dashboard');
                return;
            }
        }

        $_SESSION['error1']="Wrong Credentials";
        header('Location: login');
        return;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon"/>
    <title>Log In</title>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Heebo:100,200,300,regular,500,600,700,800,900);

*{
    box-sizing: border-box;
}
h1{
    color: #e14eca;
}
body{
    font-family: 'Heebo', sans-serif;
    background-image: radial-gradient(black, rgb(41, 39, 39));
    display:flex;
    flex-direction: column;
    text-align: center;
    justify-self: center;
    min-height: 100vh;
}
/*------------CONTAINER-----------------*/
.container{
 margin: auto;
 padding: 3%;
 border-radius: 15px;
 background-color:black;
 border: 5px solid rgb(214, 23, 214);
 box-shadow:
  0 0px 2.2px rgb(214, 23, 214),
  0 0px 5.3px rgb(214, 23, 214),
  0 0px 10px rgb(214, 23, 214),
  0 0px 17.9px rgb(214, 23, 214),
  0 0px 8px rgb(214, 23, 214),
  0 0px 20px rgb(214, 23, 214);
}
img{
    width: 60%;
    margin: auto;
    border-radius: 50%;
    height:60%;
}
.email{
    margin-bottom: 40px;

}
/*--------------------INPUT---------------------*/
input{
    width: 300px;
    margin: auto;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 20px;
    border: none;
    font-weight: bold;
    color: black;
    font-size: 15px;
}
input:hover{
    transform: scale(1.03);
}
input:focus{
    outline-style: none;
}
/*--------------LINKS----------------------------*/
button{
    text-decoration: none;
    color: black;
    background-color: #e14eca;
    padding: 20px 20px 20px 20px;
    border-radius: 15px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    font-weight: bold;
    font-size: 15px;
}
button:hover{
    font-size: 17px;
}
</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script>
$(".toggle-password").click(function() { 
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});    
</script>

</head>
<body>




    <script type="text/javascript">
    (function(d, m){
        var kommunicateSettings =
            {"appId":"3524ab098ba553d9125bd9930415f1918","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
    /* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
    </script>




    <div class="container">
        
            <img src="https://cdn.dribbble.com/users/557420/screenshots/2727473/ezgif.com-crop.gif" alt="">
            <h1>Login</h1>

       <form method='post'>
       <h3 align="center" style="color:red; background:black;">
        <?php
        if(isset($_SESSION['error1'])){
          echo $_SESSION['error1'];
          unset($_SESSION['error1']);
        }

        ?>
      </h3>
        <div class="inputs">
            <input type="text" name='userid' class="name" placeholder="Company Name/User Email">
            <br>
            <input type="password" name="pass" id="password-field" class="email" placeholder="Password">
        </div>
        <button name='log' type="submit">Log In</button>
       </form>
    </div>
    
</body>
</html>