<?php
require_once('pdo.php');

$companies = $pdo->query("SELECT * FROM company ORDER BY cid");
while ( $row = $companies->fetch(PDO::FETCH_OBJ) )
{
	$comps[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" >
<link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon"/>
<title>Sandbox</title>
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
<!-- Header -->
<section id="header">
<div class="header container">
<div class="nav-bar">
<div class="brand">
<a href="#hero">
<h1><span>S</span>AND<span>B</span>OX</h1>
</a>
</div>
<div class="nav-list">
<div class="hamburger">
<div class="bar"></div>
</div>
<ul>
<li><a href="#hero" data-after="Home">Home</a></li>
<li><a href="#aboutproject" data-after="About">About</a></li>
<li><a href="#step" data-after="Projects">Instructions</a></li>
<li><a href="#about" data-after="About">Company List</a></li>
<li><a href="#contact" data-after="Contact">Contact</a></li>
<li> <a href="./creators" data-after="Team">Creators</a></li>
</ul>
</div>
</div>
</div>
</section>
<!-- End Header -->




<!-- Hero Section -->
<section id="hero">
<div class="hero hcontainer">
<div>
<h1>Hello, <span></span></h1>
<h1>here we are <span></span></h1>
<h1>For You<span></span></h1>
<a href="./login" type="button" class="cta" style="text-decoration:none; color:white;">LogIn</a>&nbsp;&nbsp;&nbsp;
<a href="./info/investors" type="button" class="cta" style="text-decoration:none; color:white;">Investors</a>&nbsp;&nbsp;&nbsp;
<a href="./result" type="button" class="cta" style="text-decoration:none; color:white;">Result</a>

</div>
</div>
</section>
<!-- End Hero Section -->






<section id="aboutproject">
<h1 class="section-title" style="margin-top:50px;">About<span> us</span></h1>




<p style="text-align:center; ">‘SandBox’ is a website where First Year Information Technology and Electronics and Telecommunication students will showcase their products through their company. The students have selected problems related to chemistry, science, or general category. The products displayed are in the form of the app, webpage, animation, video, models etc. The products are open to pitch the investors who will invest the ‘Gems’ (our mock currency) and the best invested company will be chosen as the winner. <br>
<em><span style="color:crimson;"><strong>Disclaimer:</strong></span> This website and the contents are purely for the activity in Engineering chemistry class of Ms. Borkar. It is not for any type of commercial process. All the rights of this website are with Ms. Sonaali Borkar.</em>
</p>

<a href="./SandBox.pdf"  target='_blank' type="button" class="cta" id="brochure" style="text-decoration:none; color:black;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">View Brochure</a>
    

</section>
<!-- Service Section -->
<!-- Projects Section -->
<section id="step">
<div class="step container">
<div class="step-header">
<h1 class="section-title">INSTRUCTIONS</h1>
<h1 class="section-title"><span >STEPS</span></h1>
</div>
<div class="all-step">
<div class="step-item">
<div class="step-info">
<h1>Step 1</h1>
<h2>Login using your Investor Credentials</h2>
<p>From homepage click on <strong><a href="./login" style="color:white;text-decoration:none;">Login</a></strong>.</p>
</div>
<div class="step-img">
<img src="./img/step1crop.PNG" alt="img">
</div>
</div>
<div class="step-item">
<div class="step-info">
<h1>Step 2</h1>
<h2>Authenticate your Credentials</h2>
<p>Login using your credentials which are mailed to you.</p>
</div>
<div class="step-img">
<img src="./img/step2crop.PNG" alt="img">
</div>
</div>
<div class="step-item">
<div class="step-info">
<h1>Step 3</h1>
<h2>Inspect the Company</h2>
<p>Click on the more option to get a clear idea about the company.</p>
</div>
<div class="step-img">
<img src="./img/step3crop.PNG" alt="img">
</div>
</div>
<div class="step-item">
<div class="step-info">
<h1>Step 4</h1>
<h2>Investments</h2>
<p>When you like the idea of a specific company, select the denomination which you would like to invest.<br/>Take a look at how much credits are assigned to you in the User Profile section under your Dashboard.</br><strong>Note : You are allowed to invest only in three companies.</strong></p>
</div>
<div class="step-img">
<img src="./img/step4crop.PNG" alt="img">
</div>
</div>
<div class="step-item">
<div class="step-info">
<h1>Gems Distribution</h1>
<h2>The Gems are provided role-wise as follows</h2>
<p><strong>Note : You are allowed to invest only in three companies.</strong><br/>- FE 200</br>- Senior 400<br/>- Faculty 1000<br/>- Alumni 1000<br/>- External 1000<br/><strong>Happy Investments!</strong></p>
</div>
<div class="step-img">
<img src="./img/step5crop.PNG" alt="img">
</div>
</div>
</div>
</section>
<!-- End Projects Section -->



<!-- About Section -->
<section id="about">
<div class="about container">

<div class="col-right">
<h1 class="section-title" style="text-align:center; color:white;">Company </h1>
<h1 class="section-title" style="text-align:center;"> <span>List</span></h1>

<p>
<?php foreach($comps as $comp): ?>
<div class="card mb-3" style="max-width: 840px; margin: auto;">
<div class="row no-gutters">
<div class="col-md-4">
<img src=<?php echo "'".$comp->clogo."'";?> class="card-img" style="height:270px; " alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title"><?php echo $comp->cname;?></h5>
<p class="card-text"><?php echo $comp->cslogan;?></p>
<p class="card-text"><small class="text-muted">



<a href=<?php echo "./info/company?cid=".$comp->cid;?>><button type="button" class="cta bsh" >
MORE </button></a>

</p>
</div>
</div>
</div>
</div>
<?php endforeach; ?>

</p>

<h1 class="section-title" style="text-align:center; color:white;">Special Projects</h1>
<h1 class="section-title" style="text-align:center;"> <span>by FE</span></h1>

<div class="card mb-3" style="max-width: 840px; margin: auto;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="./img/autobeam.jpeg" class="card-img" style="height:270px; " alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Auto Beam</h5>
<p class="card-text">Be Creative</p>
<p class="card-text"><small class="text-muted">



<a href="./project/autobeam"><button type="button" class="cta bsh" >
MORE </button></a>

</p>
</div>
</div>
</div>
</div>

<div class="card mb-3" style="max-width: 840px; margin: auto;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="./img/joule.jpg" class="card-img" style="height:270px; " alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Joule</h5>
<p class="card-text">Charge it! Carry it! Use it!!!</p>
<p class="card-text"><small class="text-muted">



<a href="./project/joule"><button type="button" class="cta bsh" >
MORE </button></a>

</p>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
<!-- End About Section -->



<!-- Contact Section -->
<section id="contact">
<div class="contact container">
<div>
<h1 class="section-title">Contact <span>info</span></h1>
</div>
<div class="contact-items">
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
<div class="contact-info">
<h1>Phone</h1>
<a href="tel:+919819322711" style="color:#6c757d;text-decoration:none;"><h2>+91 98193 22711</h2></a>
<a href="tel:+919372232061" style="color:#6c757d;text-decoration:none;"><h2>+91 93722 32061</h2></a>
<a href="tel:+919892983279" style="color:#6c757d;text-decoration:none;"><h2>+91 98929 83279</h2></a>
<a href="tel:+917028205226" style="color:#6c757d;text-decoration:none;"><h2>+91 70282 05226</h2></a>
</div>
</div>
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
<div class="contact-info">
<h1>Email</h1>
<a href="mailto:sonaali.borkar@vit.edu.in" style="color:#6c757d;text-decoration:none;"><h2>sonaali.borkar@vit.edu.in</h2></a>
<a href="mailto:samant.nimish@gmail.com" style="color:#6c757d;text-decoration:none;"><h2>samant.nimish@gmail.com</h2></a>
<a href="mailto:heramba96l@gmail.com" style="color:#6c757d;text-decoration:none;"><h2>heramba96l@gmail.com</h2></a>
<a href="mailto:shraddhadshine192@gmail.com" style="color:#6c757d;text-decoration:none;"><h2>shraddhadshine192@gmail.com</h2></a>
</div>
</div>
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
<div class="contact-info">
<h1>Address</h1>
<h2><a href="https://www.google.com/maps?ll=19.021602,72.870818&z=17&t=m&hl=en&gl=IN&mapclient=embed&cid=6633573694618577808" target="_blank" style="color:#6c757d;text-decoration:none;">Vidyalankar Institute of Technology, Vidyalankar College Marg, Wadala(E), Mumbai-400 037</h2>
</div>
</div>
</div>
</div>
</section>
<!-- End Contact Section -->



<!-- Footer -->
<!-- End Footer -->
<script src="./app.js"></script>
</body>



</html>