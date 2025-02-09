<?php
session_start();
require_once '../pdo.php';
if ( !isset($_SESSION['userid']) || strlen($_SESSION['userid']) < 1  ) {
    header('Location: ../login');
    return;
}
$mcomps = $pdo->prepare("SELECT * FROM company where cname=:crnm");
$mcomps->execute(array(
':crnm' => $_SESSION['userid'])
);
$mcomp = $mcomps->fetchAll(PDO::FETCH_ASSOC);

$salpers = $pdo->prepare("SELECT sum(salary) as curr_sal FROM employee WHERE cid=:cid");
$salpers->execute(array(
':cid' => $mcomp[0]['cid'])
);
$salper = $salpers->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    if((50-($salper[0]['curr_sal']+$_POST['esal']))>=0){
        try{
            $stmt = $pdo->prepare('INSERT INTO employee(ename, eemail, edesignation, salary, cid) 
            VALUES (:ename, :eemail, :edesg, :salary, :cid);');

            $stmt->execute(array(
                ':ename'=>$_POST['ename'],
                ':eemail'=>$_POST['eemail'],
                ':edesg'=>$_POST['edesg'],
                ':salary'=>$_POST['esal'],
                ':cid'=>$mcomp[0]['cid'],
            ));

            $_SESSION['error']="Member Added";
            header('Location: adduser');
            return;
        }

        catch(Exception $e){
            $_SESSION['error']=$e;
            header('Location: adduser');
            return;
        }
    }
    else{
         $_SESSION['error']="Salary percentage exceeded limit!!";
            header('Location: adduser');
            return;
    }
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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
<link rel="shortcut icon" href="../img/logo2.png" type="image/x-icon"/>
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
             <img src=<?php echo "'".$mcomp[0]['clogo']."'"; ?> alt="Company Logo" >
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
           <?php echo $mcomp[0]['cname']; ?>
          </a>
        </div>
        <ul class="nav">
          <li >
            <a href="./dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
         <li>
                    <a href="./user">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>     
          <li>
            <a href="./update">
              <i class="tim-icons icon-map-big"></i>
              <p>Update Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>member List</p>
            </a>
          </li>
          <li class="active ">
            <a href="./adduser">
              <i class="tim-icons icon-align-center"></i>
              <p>add members</p>
            </a>
          </li>
           <li >
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
        <div class="collapse navbar-collapse">  <!-- id="navigation"-->
            <ul class="navbar-nav ml-auto">
             <li class="search-bar input-group">
              
              </li>
             </ul>
</div>



        </div>
      </nav>      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
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
            <form method="POST">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Employee</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value=<?php echo "'".$mcomp[0]['cname']."'"; ?>>
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Employee Name</label>
                        <input name="ename" type="text" class="form-control" placeholder="Employee Name" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Email Address</label>
                        <input name="eemail" type="email" class="form-control" placeholder="Employee Email Address" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Employee Designation</label>
                        <input name="edesg" type="text" class="form-control" placeholder="Employee Designation" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Employee Salary Percent</label>
                        <input name="esal" type="number" class="form-control" placeholder="Percentage" value=0 required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <p align="Center">Percentage alloted : <?php echo 0+$salper[0]['curr_sal']; ?>%</p>
                      </div>
                    </div>
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <p align="Center">Percentage left : <?php echo 50-$salper[0]['curr_sal']; ?>%</p>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 pr-md-1">
                        <p align="Center">
                        <?php
                    	    if(isset($_SESSION['error'])){
                    			echo $_SESSION['error'];
                    			unset($_SESSION['error']);
                    		}
                        ?>
                        </p>
                    </div>
                    <div class="col-md-6 pr-md-1 d-grid gap-2 d-md-flex justify-content-md-center">
                        <p align="Center">
                            <button type="submit" name="submit" class="btn btn-fill btn-primary">Add</button>
                        </p>
                    <div>
                </div>
              </div>
            </form>
            </div>
          </div>
         















        </div>
      </div>
    </div>
  </div>
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