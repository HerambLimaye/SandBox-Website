<!DOCTYPE html>
<html>
<head>
	<title>Team Section</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon"/>
	 <script src="https://kit.fontawesome.com/7c64fa9aba.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styleteam.css">
 
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap');
@import url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
body{
	margin:0;
	font-family: 'Open Sans', sans-serif;
}
*{
	box-sizing: border-box;
}



.container{
	max-width: 1170px;
	margin:auto;
}

.row{
	display: flex;
	flex-wrap: wrap;
}

.team-section .section-title{
	flex-basis: 100%;
	max-width: 100%;
	margin-bottom: 70px;
}

.team-section .section-title h1{
	font-size: 40px;
	text-align: center;
	margin:0;
	color: #ffffff;
	font-weight: 700;
}

.team-section .section-title p{
	font-size:16px;
	text-align: center;
	margin:15px 0 0;
	color:#ffffff;
}
.team-section .team-items{
	
	flex-basis: 100%;
	max-width: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
}
.team-section .team-items .item{
 flex-basis: calc(25% - 30px);
 max-width: calc(25% - 30px);
 transition: all .5s ease;
 margin-bottom: 40px;
}
.team-section .team-items .item img{
	display: block;
	width: 100%;
	border-radius: 8px;
}

.team-section .team-items .item .inner{
	position: relative;
	z-index: 11;
	padding:0 15px;
}
.team-section .team-items .item .inner .info{
	background-color:#e14eca;
	text-align: center;
	padding: 20px 15px;
	border-radius:8px;
	transition: all .5s ease;
	margin-top: -40px;
}
.team-section .team-items .item:hover  .info{
    transform: translateY(-20px);
}
.team-section .team-items .item:hover{
 transform: translateY(-10px);	
}
.team-section .team-items .item .inner .info h5, h4{
	margin:0;
	font-size: 18px;
	font-weight: 600;
	color:#ffffff;
}
.team-section .team-items .item .inner .info p{
	font-size: 16px;
	font-weight: 400;
	color:#c5c5c5;
	margin:10px 0 0;
}

.team-section .team-items .item .inner .info .social-links{
	padding-top: 15px;
}

.team-section .team-items .item .inner .info .social-links a{
	display: inline-block;
	height: 32px;
	width: 32px;
	background-color: #ffffff;
	color:#009688;
	border-radius: 50%;
	margin:0 2px;
	text-align: center;
	line-height: 32px;
	font-size:16px;
	transition: all .5s ease;
}

.team-section .team-items .item .inner .info .social-links a:hover{
	box-shadow: 0 0 10px #000;
}

/*responsive*/
@media(max-width: 991px){
	.team-section .team-items .item{
      flex-basis: calc(50% - 30px);
       max-width: calc(50% - 30px);

   }
}

@media(max-width: 767px){
	.team-section .team-items .item{
      flex-basis: calc(60%);
       max-width: calc(60%);

   }
}
 @media (max-width: 500px ){
#particles-js
{
display:none;
}
}
</style>
</head>




<style>

#particles-js{
position: absolute;
  width: 100%;
  height: 290vh;
 background-size: cover;
z-index:0;
}

.imgg {
	height: 100%;
	width: 100%;
	object-fit: cover;
}

.section-titlee {
	font-size: 4rem;
	font-weight: 300;
	color: white;
	margin-bottom: 10px;
	text-transform: uppercase;
	letter-spacing: 0.2rem;
	text-align: center;
}
.section-titlee span {
	color: white;
}




/* About Section */
#aboutt .aboutt {
	flex-direction: column-reverse;
	text-align: center;
	max-width: 1200px;
	margin: 0 auto;
	padding: 10px 20px;
}
#aboutt .col-left {
	width: 250px;
	height: 360px;
}
#aboutt .col-right {
	width: 100%;
}
#aboutt .col-right h2 {
	font-size: 1.8rem;
	font-weight: 500;
	letter-spacing: 0.2rem;
	margin-bottom: 10px;
}
#aboutt .col-right p {
	margin-bottom: 20px;
}
#aboutt .col-right  {
	color: black;
	margin-bottom: 50px;
	padding: 8px 20px;
	font-size: 2rem;
}
#aboutt .col-left .aboutt-img {
	height: 100%;
	width: 100%;
	position: relative;
	border: 10px solid white;
}
#aboutt .col-left .aboutt-img::after {
	content: '';
	position: absolute;
	left: -33px;
	top: 19px;
	height: 95%;
	width: 98%;
	border: 7px solid white;
	z-index: -1;
}
@media only screen and (min-width: 768px) {
	.cta {
		font-size: 2.5rem;
		padding: 20px 60px;
	}
	h1.section-title {
		font-size: 6rem;
	}

	/* Hero */
	#hero h1 {
		font-size: 7rem;
	}
	/* End Hero */

	/* Services Section */
	#services .service-bottom .service-item {
		flex-basis: 45%;
		margin: 2.5%;
	}
}

/* End About Section */
</style>


<body style="background: rgb(67,39,114);
background: radial-gradient(circle, rgba(67,39,114,1) 0%, rgba(0,0,0,0.9928922252494747) 48%);">
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
  <!-- About Section -->
  <section id="aboutt">
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
<h1 class="section-titlee" >Our Team</h1>
        <h2 style="text-align:center; color:white; ">Sonaali Borkar</h2>
        <h3 style="text-align:center; color:white; ">Creator and Owner</h3>
    <div class="aboutt containerr" style="min-height: 100vh;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;">
      
      <div class="col-right">
       
        <p  style="
	color:white;
	font-size: 1.4rem;
	margin-top: 5px;
	line-height: 2.5rem;
	font-weight: 300;
	letter-spacing: 0.05rem;">The entire concept of ‘SandBox’ is designed and mentored by Ms. Sonaali Borkar, Applied Chemistry, VIT. The website is developed and maintained by second year Computer Engineering students, Mr. Heramba Limaye, Ms. Shraddha Shinde and Mr. Nimish Samant, and first year Information Technology student, Mr. Anuj Bhor. Mr. Jay Keer helped the team. Overall activity coordination was managed by Mr. Vedant Patil and Mr. Samay Shetty from First year Engineering, VIT.</p>
        
      </div>
 <div class="col-left">
        <div class="aboutt-img">
          <img src="https://media-exp3.licdn.com/dms/image/C4E03AQEXe8qV3b2Asg/profile-displayphoto-shrink_400_400/0/1620570381248?e=1629331200&v=beta&t=pql1MMLjcxmy9g97fFfTWm49CudeZMF5txnaAed0rcc" class="imgg" alt="img">
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <section class="team-section">
     <div class="container">
         <div class="row">
             
         </div>
         <div class="row">
             <div class="team-items">
                  <div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C4E03AQEyn3PQ9NcsOg/profile-displayphoto-shrink_800_800/0/1617299452882?e=1628726400&v=beta&t=nlcBtP01a40oLuPcJd7AyFtFluqxBDnCGKA3LMl8D8w" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Heramba Limaye</h5>
                               <p style='color:white;'>Lead Developer<br>[CEO]</p>
                               <p>SE CMPN A</p>
                               <div class="social-links">
                                   <a href="https://www.linkedin.com/in/heramba-limaye/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href="https://github.com/holeinthewal" target="_blank"><span class="fa fa-github"></span></a>
                                   <a href="https://www.instagram.com/a_zra3l/" target="_blank"><span class="fa fa-instagram"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="./img/shraddha.png" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h4>Shraddha Shinde</h4>
                               <p style='color:white;'>Lead Designer<br>[CTO]</p>
                               <p>SE CMPN A</p>
                               <div class="social-links">
                                   <a href="https://www.linkedin.com/in/shraddha-shinde-b3b473196/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href="https://github.com/shraddha-1" target="_blank"><span class="fa fa-github"></span></a>
                                   <a href="https://www.instagram.com/__shraddha.shinde__/" target="_blank"><span class="fa fa-instagram"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C5603AQGZCUCnakmlyQ/profile-displayphoto-shrink_400_400/0/1588283230003?e=1629331200&v=beta&t=cb0h56-u4-aSIVhrXdMuKd_9kCeczexjN4z2LbLlxlQ" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Nimish Samant</h5>
                               <p style='color:white;'>Lead Developer<br>[CFO]</p>
                               <p>SE CMPN A</p>
                               <div class="social-links">
                                   <a href="https://www.linkedin.com/in/nimishsamant/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href="https://github.com/realhunter7869" target="_blank"><span class="fa fa-github"></span></a>
                                   <a href="https://www.instagram.com/nimish.samant/" target="_blank"><span class="fa fa-instagram"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
             </div>
         </div>
        <div class="row">
             <div class="team-items">
                  <div class="item">
                      <img src="https://media-exp1.licdn.com/dms/image/C4D03AQE5vyJCneqp5A/profile-displayphoto-shrink_200_200/0/1623775030239?e=1629331200&v=beta&t=ISm41lwXNfIFHBRzA10JsouM4nB79-8swQQBMRLvHCY" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Anuj Bhor</h5>
                               <p style='color:white;'>Web Designer<br>[VP]</p>
                               <p>FE INFT B</p>
                               <div class="social-links">
                                   <a href="https://www.linkedin.com/in/anuj-bhor-b4b6601b5/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href="https://github.com/anujb6" target="_blank"><span class="fa fa-github"></span></a>
                                   <a href="https://www.instagram.com/anujb888/" target="_blank"><span class="fa fa-instagram"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C4D03AQFQaoklUO481Q/profile-displayphoto-shrink_400_400/0/1623766889453?e=1629331200&v=beta&t=eur0OzNmfErjeGMBpTwc6hfz2L-hn0uEFA4Un6azDqk" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Jay Keer</h5>
                               <p style='color:white;'>Graphic Designer<br>[GM]</p>
                               <p>FE EXTC B</p>
                               <div class="social-links">
                                   <a href="https://www.linkedin.com/in/jay-keer-0ba889200" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href="https://github.com/Yolo-cell-hash"><span class="fa fa-github"></span></a>
                                   <a href="https://instagram.com/jaykeer__?utm_medium=copy_link"><span class="fa fa-instagram"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <!--div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C4D03AQETUl5FlVvrMQ/profile-displayphoto-shrink_400_400/0/1616508050743?e=1629331200&v=beta&t=M7N1eOrG_k47wO2OCiSaMwOrYS0AorrrIHEsniBwHAs" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Anuj Bhor</h5>
                               <p>Designer</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href="https://www.linkedin.com/in/anuj-bhor-b4b6601b5/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-github"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C4D03AQETUl5FlVvrMQ/profile-displayphoto-shrink_400_400/0/1616508050743?e=1629331200&v=beta&t=M7N1eOrG_k47wO2OCiSaMwOrYS0AorrrIHEsniBwHAs" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Anuj Bhor</h5>
                               <p>Designer</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href="https://www.linkedin.com/in/anuj-bhor-b4b6601b5/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-github"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="https://media-exp3.licdn.com/dms/image/C4D03AQETUl5FlVvrMQ/profile-displayphoto-shrink_400_400/0/1616508050743?e=1629331200&v=beta&t=M7N1eOrG_k47wO2OCiSaMwOrYS0AorrrIHEsniBwHAs" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Anuj Bhor</h5>
                               <p>Designer</p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href="https://www.linkedin.com/in/anuj-bhor-b4b6601b5/" target="_blank"><span class="fa fa-linkedin"></span></a>
                                   <a href=""><span class="fa fa-github"></span></a>
                               </div>
                          </div>
                      </div>
                  </div-->
             </div>
         </div>
     </div>
  </section>
  
<script type"text/javascript" src="particles.js"></script>
<script src="appp.js"></script>
</body>
</html>
