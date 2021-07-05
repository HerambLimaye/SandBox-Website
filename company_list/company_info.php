<?php
session_start();
require_once '../pdo.php';

if ( !isset($_SESSION['userid']) || strlen($_SESSION['userid']) < 1  ) {
    header('Location: ../login');
    return;
}

if($_SESSION['role'] == 'investor'){
    $users = $pdo->prepare("SELECT * FROM investor where iemail=:urnm");
    $users->execute(array(
    ':urnm' => $_SESSION['userid'])
    );
    $user = $users->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $mcomps = $pdo->prepare("SELECT * FROM company where cname=:crnm");
    $mcomps->execute(array(
    ':crnm' => $_SESSION['userid'])
    );
    $mcomp = $mcomps->fetchAll(PDO::FETCH_ASSOC);
}

$comps = $pdo->prepare("SELECT * FROM company where cid=:cid");
$comps->execute(array(
':cid' => $_GET['cid'])
);
$comp = $comps->fetchAll(PDO::FETCH_ASSOC);

$comments = $pdo->prepare("SELECT * FROM feedback where cid=:cid");
$comments->execute(array(
':cid' => $_GET['cid'])
);
while ( $row = $comments->fetch(PDO::FETCH_OBJ) )
{
	$comms[] = $row;
}


$employees = $pdo->prepare("
	SELECT * FROM employee
	WHERE cid=:cid
    order by eid
");
$employees->execute([
	':cid' => $_GET['cid'],
]);

while ( $row = $employees->fetch(PDO::FETCH_OBJ) )
{
    $emps[] = $row;
}

if(isset($_POST['add'])){
    try{
        $stmt = $pdo->prepare('INSERT INTO feedback(iname, iemail, comm, cid) 
            VALUES (:iname, :iemail, :comm, :cid)');

        $stmt->execute(array(
            ':iname'=>$user[0]['iname'],
            ':iemail'=>$user[0]['iemail'],
            ':comm'=>$_POST['comm'],
            ':cid'=>$_GET['cid'],
        ));

        $_SESSION['error']="Comment Added";
        header('Location: company_info?cid='.$_GET['cid']);
        return;
    }

    catch(Exception $e){
        $_SESSION['error']=$e;
        header('Location: company_info?cid='.$_GET['cid']);
        return;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="../img/logo2.png" type="image/x-icon"/>
 
  <title>
    Sandbox
  </title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href=".../assets/demo/demo.css" rel="stylesheet" />
  <style>
    
@media(max-width: 991px){
	#tab{
         overflow: auto;
   }
}
    </style>
</head>

<body class="">


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






  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <?php if ($_SESSION['role'] == 'investor') : ?>
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="https://i2.wp.com/creddybull.com/wp-content/uploads/2018/03/CREDDYBULL-favicon.jpg?fit=512%2C512&ssl=1&w=640" alt="Profile Photo" style="border: 2px solid white;">
          </a>
          <?php else : ?>
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src=<?php echo "'".$mcomp[0]['clogo']."'";?> alt="Profile Photo">
          </a>
          <?php endif;?>
          <a href="javascript:void(0)" class="simple-text logo-normal">
           <?php if($_SESSION['role']=='investor'){           
            echo $user[0]['iname'];
           }
           else{  
            echo $mcomp[0]['cname'];
           }
           ?>        
          </a>
        </div>
        <ul class="nav">
         
         <li class="active ">
                    <a href=<?php echo "./company_info?cid=".$_GET['cid']?>>
              <i class="tim-icons icon-single-02"></i>
              <p>Company Profile</p>
            </a>
          </li>
          
         
           <li >
           <?php if($_SESSION['role']=='investor'){           
            echo '<a href="../investor/dashboard">';
           }
           else{  
            echo '<a href="../company/dashboard">';
           }
           ?>              
              <button type="submit" class="btn btn-fill btn-primary" style="border:2px solid white;background-color:black;">BACK</button>
            </a>
          </li>
       
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse">  <!-- id="navigation"-->
            <ul class="navbar-nav ml-auto">
             <li class="search-bar input-group">
              
              </li>
             </ul>
            </div>


        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="title"><?php echo $comp[0]['cname'] ?></h1>
                <h4><?php echo $comp[0]['cslogan']?></h4>
              </div>
              <div class="card-body">
                <p><img align="middle" src=<?php echo '"'.$comp[0]['clogo'].'"' ?> width="150" height="150"  style="border-radius: 50%;"></p>
<br>
<h2>Owner Name</h2>
<h4><?php echo $comp[0]['cowner']?></h4><br>

<h2>Contact Email</h2>
<h4><a href=<?php echo 'mailto:'.$comp[0]['cownermail']?>><?php echo $comp[0]['cownermail']?></a></h4><br>

<h2>Description</h2>
<h4><?php echo $comp[0]['cdesc']?></h4><br>

<h2> Website Link:</h2>
<h4><?php 
if($comp[0]['infosite']=='Not Provided'){

 echo "Link Not Provided";

}
else{

  echo "<a href=".$comp[0]['infosite']." target='_blank'>".$comp[0]['infosite']."</a>";

}
?>
</h4><br>

<h2> Youtube video:</h2>
<?php 
if($comp[0]['infoyt']=='Not Provided'){
    echo "<h4>Link Not Provided</h4>";
}
else{

echo 
"<div class='embed-responsive embed-responsive-16by9'>
  <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/".explode('&', explode("v=",$comp[0]['infoyt'])[1])[0]."' allowfullscreen></iframe>
</div>";
}
?>


<BR>

 </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>
          
      
    </div>
  </div>


<div class="content">
        <div class="row">
            <div class="card">
          <div class="col-md-12">
           
          <div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title"> Members Info</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php if (empty($emps)) : ?>
                  No employee
                <?php else : ?>
                  <table class="table tablesorter " id="tab">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Name
                        </th>
                        <th>
                          Email Id
                        </th>
                        <th>
                         Designation
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($emps as $emp) : ?>
                      <tr>
                        <td>
                          <?php echo $emp->ename; ?>
                        </td>
                        <td>
                          <?php echo $emp->eemail; ?>
                        </td>
                        <td>
                          <?php echo $emp->edesignation; ?>
                        </td>
                      </tr>
					<?php endforeach; ?>
















                    </tbody>
                  </table>
                <?php endif; ?>
                </div>
              </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>

<?php if ($_SESSION['role'] == 'investor') : ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="title">Invest Your Gems</h1>
              </div>
              <div class="card-body">      
      




 <div class="row">
          <div class="col-md-12"  >

                        <div class="col-md-12"  style="  
  width: 100%;
  margin:auto;
  padding: 10px;
" >
           <div class="card card-user">
<div class="card-body cardb">

    
                <p style=" text-align:center; font-size: 20px; " ><i class="fas fa-gem"></i> GEMS</P>
             

<style>
  .bttn {
    background-size: cover;
    background-color:#1e1e2f;
    border: none;
    padding: 10px;
    width: 100px;
   height: 100px;
  margin:auto;
  border-radius:50%;
    transition: all 0.5s;
    cursor: pointer;
  margin-right:20px;
  }
  .bttn:hover{
   
  }
  @media(max-width: 768px){
  .bttn{
   width: 50px;
   height: 50px;
  margin-left:120px;
  margin-right: none;
  }
   
  }
   
  .container {
    position: absolute;
    top: 20%;
    left: 40%;
    margin-left: -200px;
  padding:10px;
  display:flex;
   
  }
  .abc{
  padding:10px;
  }
   
  .spann{
  display:block;
  text-align:center;
  color:white;
  font-size:29px;
   
  
  text-shadow : 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff2d95, 0 0 30px #ff2d95, 0 0 40px #ff2d95, 0 0 50px #ff2d95, 0 0 75px #ff2d95;
  }
  @media(max-width: 768px){
  .abc{
   width: 50px;
   height: 50px;
   
  
  }
  .container{
  display:block;
   
  }
   
  .spann{
  display:inline-block;
  font-size:10px;
  }
   
  .cardb{
  height:350px;
  align-item:center;
  }
  }
   
  
  .modal-button {
      background-color: black;
      border-color: #e14eca;
      border-radius: 6px;
      color: white;
      font-size: 17px;
      padding-right: 76px;
      padding-left: 76px
  }
  .btnn{
   
  
  justify-content: center;
      background-color: #e14eca;
      border-color: rgb(29, 226, 226);
      border-radius: 25px;
      color: white;
      font-size: 20px;
  width:100%;
   
  
  }
  .cardd {
      border-radius: 3vh;
      margin: auto;
      max-width: 380px;
  background-color:#101523;
      padding: 2vh 6vh;
      align-items: center;
   
      box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19)
  }
   
  @media(max-width:767px) {
      .cardd {
          width: 90vw
      }
  }
   
  .cardd-img {
      padding: 20px 0;
      width: 40%
  }
   
  .cardd-img img {
      opacity: 0.7
  height: 80px;
   
    margin-left: auto;
    margin-right: auto;
  }
   
  .cardd-title {
  align-item: center;
      margin-bottom: unset
  }
   
  .cardd-title p {
      color: rgb(29, 226, 226);
      font-weight: 900;
      font-size: 30px;
      margin-bottom: unset
  }
   
  .cardd-text p {
      color: grey;
      font-size: 25px;
      text-align: center;
      padding: 3vh 0;
      font-weight: lighter
  }
   
   
  </style>

<?php
if(isset($_SESSION['transact'])){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#myModal').modal();
    });
    </script>";
}
?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="cardd">

            <div class="cardd-img"   style="  margin-left: auto; margin-right: auto;"> 
<img class="img-fluid"  src="https://i.pinimg.com/originals/cd/7d/aa/cd7daad71e44513a249225216855582a.gif"> 
</div>
            <div class="cardd-title">
                <p style="text-align:center; color:#e14eca;" >
                    <?php
                    	if(isset($_SESSION['transact'])){
                    		echo $_SESSION['transact'];
                    		unset($_SESSION['transact']);
                    	}
                    ?>
                </p>
            </div>
            <div class="cardd-text">
                <p>Click Anywhere to Continue!</p>
            </div>
        </div>
    </div>
</div>

<div class="container ">

<div classs="abc"><button class="bttn" type="button" class="modal-button" onclick="notransaction(0)" style="vertical-align:middle; background-image: url('https://i.pinimg.com/originals/29/73/de/2973de78f5a1be8301abd77243d9bc8a.gif');"></button><span class="spann">50</span></div>


<div classs="abc"><button class="bttn" type="button" class="modal-button" onclick="notransaction(0)" style="vertical-align:middle; background-image: url('https://cdna.artstation.com/p/assets/images/images/009/406/820/original/anna-mellor-meecham-yellowgem-final.gif?1518802667');"></button><span class="spann">100</span></div>

<div classs="abc"><button class="bttn" type="button" class="modal-button" onclick="notransaction(0)" style="vertical-align:middle; background-image: url('https://media2.giphy.com/media/j78oOWCoCbNFYUJmSK/giphy.gif');"></button><span class="spann">200</span></div>

<div classs="abc"><button class="bttn" type="button" class="modal-button" onclick="notransaction(0)" style="vertical-align:middle; background-image: url('https://cdnb.artstation.com/p/assets/images/images/009/406/821/original/anna-mellor-meecham-bluegem-final.gif?1518802668');"></button><span class="spann">400</span></div>

 <div classs="abc "><button class="bttn" type="button" class="modal-button" onclick="notransaction(0)" style="vertical-align:middle; background-image: url('https://media.tenor.com/images/1e0b3b74357d8adb2ece86a07fd8474f/tenor.gif');"></button><span class="spann">700</span></div>

             
       </div>
  </div>


  </div>
 </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>
              </div>
            </div>
          </div>
            </div>
          </div>



<?php else : ?>
<?php endif; ?>



<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="title">FeedBack</h1>
              </div>
              <div class="card-body">
<div class="content">
<div class="row">
<?php if (empty($comms)) : ?>
<div class="col-md-12">No FeedBacks Yet</div>
<?php else : ?>
<?php foreach($comms as $comm) : ?>
<div class="col-md-4"  style="  
  width: 90%;
  margin:auto;
  padding: 10px;
" >
            <div class="card card-user">
              <div class="card-body"  >
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="https://i2.wp.com/creddybull.com/wp-content/uploads/2018/03/CREDDYBULL-favicon.jpg?fit=512%2C512&ssl=1&w=640" alt="..." style="border: 5px solid white;">
                      <h5 class="title"><?php echo $comm->iname;?> </h5>
                    </a>
                    <p class="description">
                      <?php echo $comm->iemail;?>
                    </p>
                  </div>
                </p>
                <div class="card-description" style="text-align:center;">
                    <?php echo $comm->comm;?>
                </div>
              </div>
             
      
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif;?>
  
  </div>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </div>



<?php if ($_SESSION['role'] == 'investor') : ?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="title">Provide Your FeedBack</h1>
              </div>
              <div class="card-body">
<div class="content">
<div class="row">
<div class="col-md-4"  style="  
  width: 90%;
  margin:auto;
  padding: 10px;
" >
            <div class="card card-user">
              <div class="card-body"  >
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="https://i2.wp.com/creddybull.com/wp-content/uploads/2018/03/CREDDYBULL-favicon.jpg?fit=512%2C512&ssl=1&w=640" alt="..." style="border: 5px solid white;">
                      <h5 class="title"> <?php echo $user[0]['iname'];?> </h5>
                    </a>
                    <p class="description">
                      <?php echo $user[0]['iemail'];?>
                    </p>
                  </div>
                </p>
                <form method="POST">
                <div class="card-description" style="text-align:center;">
                    <textarea name='comm' rows='4' cols="30" style="background-color:transparent;color:white;"></textarea>
                </div>
                <div class="card-description" style="text-align:center;">
                    <button name="add" type="submit" class="btn btn-outline-primary">Add FeedBack</button>
                </div>
                </form>
              </div>
             
      
    </div>
  </div>  
  </div>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </div>
          </div>


<?php else : ?>
<?php endif; ?>


  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
     

      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
  

<script>
function transaction(v) {
  var r = confirm("Are you sure you want to invest " + v);
  if (r == true) { 
    document.location = "transact?cid="+<?php echo $_GET['cid']?>+"&v="+v;
  }
}
function notransaction(v) {
  alert("The event has ended... Thank you for your Support!");
}
</script>
<script>
function modalview() {
  $("#myModal").modal();
}
</script>
</body>

</html>