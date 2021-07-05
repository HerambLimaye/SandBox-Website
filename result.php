<?php

require_once('pdo.php');

$companies = $pdo->query('SELECT * FROM company order by credits desc, cid');

while ( $row = $companies->fetch(PDO::FETCH_OBJ) )
{
	$company[] = $row;
}

?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

 

function drawBasic() {

 

      var data = google.visualization.arrayToDataTable([
        ['Company Name', 'Gems', { role: 'style' }],
          <?php
          foreach($company as $cmp):
            echo "['".$cmp->cname."', ".$cmp->credits.", 'gold'],";
          endforeach;
          ?>
      ]);

 

      var options = {
          colors: ["purple"],
        title: 'Company Rankings',
        width: 950,
        legend:{    position:'none',     textStyle: {           color: 'purple'            },        },
  titleTextStyle: {    color: 'white',  fontSize: 22,  bold: true   },
    textStyle: {      color: 'white'    },
        chartArea: {width: '67%'},
        backgroundColor: 'transparent',
        hAxis: {
          minValue: 0,
          
    textStyle: {
      color: 'white'
    }
        },
        vAxis: {
          
  titleTextStyle: {
    color: 'white'
  },
    textStyle: {
      color: 'white'
    }
        },
        bar: { groupWidth: '50%' }
      };

 

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

 

      chart.draw(data, options);
    }
    </script>
	 <script src="https://kit.fontawesome.com/7c64fa9aba.js" crossorigin="anonymous"></script>



    
    <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap');
@import url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    
        #chart_div {
              display: block;margin-left: auto;margin-right: auto;  
            }


        @media only screen and (max-width: 600px) {
            #chart_div {
               display: block;margin-left: auto;margin-right: auto;
            }
        }
    </style>

  </head>
    <body bgcolor="black">
    <style>.feedback {
  
  color: #ed92df;
  padding: 8px 10px 10px;
  border-radius: 10px;
  border: none;
  font-size:15px
}
.feedback:hover {
  background-color :#e14eca;
}
#btt:hover{
    transform:scale(1.15);
}
#mybutton {
  position: fixed;
  top: 0px;
margin-top: 20px;
margin-left:20px;
 
}
a{
text-decoration:none;
color:black;
text-align: center;
}</style>

<div id="mybutton">
<button id='btt' class="feedback" style="background-color:transparent;border:2px solid white;border-radius:50%;"><span><a href="../"><i class="fas fa-arrow-left" style = "color: white; font-size: 140%;"></i></a></span></button>
</div>
    <br>
    <h1 align="center" style="color:white;">SANDBOX RESULT</h1>
    <br>

     <img src="Result.png" style="display: block;margin-left: auto;margin-right: auto;width:50%;">
  
    <br><br>
    <div id="chart_div" style="width: 1100px; height: 500px;" ></div>  
    <br>
     </body>
</html>

