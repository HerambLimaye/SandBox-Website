<?php

session_start();

require_once "../pdo.php";

if ( !isset($_SESSION['userid']) || strlen($_SESSION['userid']) < 1  ) {
    header('Location: ../login');
    return;
}

$mcomps = $pdo->prepare("SELECT * FROM company where cname=:crnm");
$mcomps->execute(array(
':crnm' => $_SESSION['userid'])
);
$mcomp = $mcomps->fetchAll(PDO::FETCH_ASSOC);

function GetImageExtension($imagetype){
    if(empty($imagetype)) return false;
    switch($imagetype){
        case 'image/jpg' : return '.jpg';
        case 'image/jpeg' : return '.jpeg';
        case 'image/png' : return '.png';
        default: return false;
    }
}

if(isset($_POST['back'])){
    header('Location: dashboard');
    return;
}

if(isset($_POST['submit'])){
    $file1=$_FILES['clogo']['name'];
    if($file1){
        $imgtype=$_FILES['clogo']["type"];
        $ext=GetImageExtension($imgtype);
        $dest1='../images/'.$mcomp[0]['cname'].$ext;
        $file1=$_FILES['clogo']['tmp_name'];
        if(in_array($ext,['.png']) || in_array($ext,['.jpeg']) || in_array($ext,['.jpg'])){
            move_uploaded_file($file1, $dest1);
        }
        else{
            $_SESSION['error']="Please upload a image with appropriate format".$file1;
            header('Location: update');
            return;
        }
    }
    else{
        $dest1=$mcomp[0]['clogo'];
    }

    $yt = 'Not Provided';
    
    if(isset($_POST['infoyt'])){
        $yt = $_POST['infoyt'];
    }
    if($_POST['infoyt']==''){
        $yt = 'Not Provided';
    }

    $site = 'Not Provided';

    if(isset($_POST['infosite'])){
        $site = $_POST['infosite'];
    }
    if($_POST['infosite']==''){
        $site = 'Not Provided';
    }

    try{
        $stmt = $pdo->prepare('UPDATE company SET pass=:pass, clogo=:clogo, cslogan=:cslogan, cdesc=:cdesc,
            cowner=:cowner, cownermail=:cownermail, infosite=:infosite, infoyt=:infoyt WHERE cname=:cname');

        $stmt->execute(array(
            ':cname'=>$_SESSION['userid'],
            ':pass'=>$_POST['pass'],
            ':clogo'=>$dest1,
            ':cslogan'=>$_POST['cslogan'],
            ':cdesc'=>$_POST['cdesc'],
            ':cowner'=>$_POST['cowner'],
            ':cownermail'=>$_POST['cownermail'],
            ':infosite'=>$site,
            ':infoyt'=>$yt,
        ));

        $_SESSION['error']="Company Updated";
        header('Location: update');
        return;
    }

    catch(Exception $e){
        $_SESSION['error']=$e;
        header('Location: update');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="shortcut icon" href="../img/logo2.png" type="image/x-icon"/>
</head>
<style>
body {
    background: #222D32;
    font-family: 'Roboto', sans-serif;
height: 100vh;
width:100%;
}
#particles-js {
  position: absolute;
  width: 100%;
  height: 300vh;
 background-size: cover;
}
.login-box {
    margin-top: 75px;
    height: auto;
    background: #1A2226;
    text-align: center;
margin-bottom:30px;
border-radius: 15px;
  
  border: 5px solid #e14eca;
    box-shadow: 0 5px 10px #ff1aff, 0 5px 10px #ff1aff;
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#410b39, #e14eca);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #ECF0F5;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type="text",disabled=''] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=PASSWORD] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=email] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}
input[type=file] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}
#textarea {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #e14eca;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: #e14eca;
    color: #e566d2;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #f0a8e5;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}

</style>

<body  >




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




<div id="particles-js"></div>
    <div class="container" >
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    UPDATE COMPANY
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method='POST' enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-control-label">COMPANY'S NAME (CANNOT BE CHANGED)</label>
                                <input name='cname' type="text" class="form-control" disabled='' style='background:transparent;' value='<?php echo $mcomp[0]['cname']?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input name='pass' type="PASSWORD" class="form-control" value='<?php echo $mcomp[0]['pass']?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">COMPANY'S SLOGAN</label>
                                <input name='cslogan' type="text" class="form-control" value='<?php echo $mcomp[0]['cslogan']?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">LOGO (DO NOT ADD ANY IMAGE IF YOU DON'T WANT TO CHANGE)</label>
                                <input type="file" class="form-control" id="img" name="clogo">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">OWNER NAME</label>
                                <input name='cowner' type="text" class="form-control" value='<?php echo $mcomp[0]['cowner']?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">CONTACT EMAIL ID</label>
                                <input name='cownermail' type="email" class="form-control" value='<?php echo $mcomp[0]['cownermail']?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">COMPANY'S DESCRIPTION</label>
                                <textarea name='cdesc' type="textarea" class="form-control" id="textarea" cols="30" rows="10" required><?php echo $mcomp[0]['cdesc']?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">YOUTUBE LINK (OPTIONAL)</label>
                                <input name='infoyt' type="text" class="form-control" 
                                <?php 
                                    if($mcomp[0]['infoyt'] == 'Not Provided')
                                    { 
                                        echo "placeholder='Not Provided'"; 
                                    } 
                                    else
                                    { 
                                        echo "value=".$mcomp[0]['infoyt']; 
                                    } 
                                ?>>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">WEBSITE LINK (OPTIONAL)</label>
                                <input name='infosite' type="text" class="form-control"
                                <?php 
                                    if($mcomp[0]['infosite'] == 'Not Provided')
                                    { 
                                        echo "placeholder='Not Provided'"; 
                                    } 
                                    else
                                    { 
                                        echo "value=".$mcomp[0]['infosite']; 
                                    } 
                                ?>>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <?php
                    						if(isset($_SESSION['error'])){
                    							echo $_SESSION['error'];
                    							unset($_SESSION['error']);
                    						}
                    				?>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button name='submit' type="submit" class="btn btn-outline-primary">UPDATE</button>
                                </div><br>  
                                <div class="col-lg-6 login-btm login-text">
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button name='back' type="submit" class="btn btn-outline-primary">BACK TO DASHBOARD</button>
                                </div>                             
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>






<script type"text/javascript" src="particles.js"></script>
<script src="app.js"></script>
</body>
</html>