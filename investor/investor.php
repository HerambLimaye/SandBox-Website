<?php
session_start();
require_once '../pdo.php';
if ( !isset($_SESSION['userid']) || strlen($_SESSION['userid']) < 1  ) {
    header('Location: ../login');
    return;
}
$users = $pdo->prepare("SELECT * FROM investor where iemail=:urnm");
$users->execute(array(
':urnm' => $_SESSION['userid'])
);
$user = $users->fetchAll(PDO::FETCH_ASSOC);


$investorlog = $pdo->prepare("
	SELECT company.cname as company_name,investorlog.creditamount as credit
    FROM investorlog
    INNER JOIN company
    ON investorlog.cid = company.cid
    WHERE investorlog.invid=:invid
    ORDER BY investorlog.tstamp ASC;
");
$investorlog->execute([
	':invid' => $user[0]['invid'],
]);

while ( $row = $investorlog->fetch(PDO::FETCH_OBJ) )
{
    $inlogs[] = $row;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <title>
    Sandbox
  </title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<link rel="shortcut icon" href="../img/logo2.png" type="image/x-icon"/>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
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
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="https://i2.wp.com/creddybull.com/wp-content/uploads/2018/03/CREDDYBULL-favicon.jpg?fit=512%2C512&ssl=1&w=640" alt="Profile Photo" style="border: 2px solid white;">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            <?php echo $user[0]['iname']?>
          </a>
        </div>
        <ul class="nav">
          <li >
            <a href="./dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
         <li class="active ">
                    <a href="./investor">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="../logout">
              
              <button type="submit" class="btn btn-fill btn-primary" style="border:2px solid white;background-color:black;">LOG OUT</button>
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
          <div class="col-md-8"  >

                        <div class="col-md-7"  style="  
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
                      <h5 class="title"> <?php echo $user[0]['iname']?> </h5>
                    </a>
                    <p class="description">
                      <?php echo $user[0]['idesignation']?> Investor
                    </p>
                  </div>
                </p>
                <div class="card-description">
                  “Jab jeb mein money ho na toh kundli mein shani hone se koi fark nahi padta.”<br>– Scam 1992: The Harshad Mehta Story
                </div>
              </div>
             
      
    </div>
  </div>
 











  <div class="content">
        <div class="row">
          <div class="col-md-12"  >

                        <div class="col-md-12"  style="  
  width: 100%;
  margin:auto;
  padding: 10px;
" >
            <div class="card card-user">
              <div class="card-body"  >
              <style>
.bttn {

  background-image: url("https://media1.giphy.com/media/jsUIl8W67ohMXGx1V8/giphy.gif");
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
}
.bttn:hover
{
  width: 135px;
  height: 135px;
}
.container {
  position: absolute;
  top: 18%;
  left: 50%;
  margin-left: -80px;
}
</style>
<div class="container">
  <button class="bttn" style="vertical-align:middle"></button>

</div>
                <p style=" text-align:center; font-size: 20px;" ><i class="fas fa-gem"></i> GEMS</P>
              </div>
             
      <p style="display: flex;
  justify-content: center;
  align-items: center;
  height: 150px;
font-size:180%;
 width:50%;
margin:auto;
margin-bottom: 100px;
  border: 3px solid #e14eca;"><?php echo $user[0]['icredits'].' '.💎 ?></P>
    </div>
  </div>
 






<div class="card card-user">
              

<div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title"> Investment Info</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php if (empty($inlogs)) : ?>
                  No investment yet!!!
                <?php else : ?>
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Company Name
                        </th>
                        <th>
                          Gem Amount
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($inlogs as $inlog) : ?>
                      <tr>
                        <td>
                          <?php echo $inlog->company_name; ?>
                        </td>
                        <td>
                          <?php echo $inlog->credit." ".💎; ?>
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

              </div >







<!--<style>.bttn {
  background: transperent;
  background-image: url("../assets/img/emilyz.jpg");
  background-size: cover;
  
  border: none;
  padding: 20px;
  width: 100px;
 
  height: 100px;
  transition: all 0.5s;
  cursor: pointer;
}
.bttn:hover
{
  width: 175px;
  height: 175px;
}
.container {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -80px;
}
</style>
<div class="container">
  <button class="bttn" style="vertical-align:middle"></button>
</div>
-->















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
</body>

</html>