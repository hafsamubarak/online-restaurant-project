<?php
require './proLogic/proConnection.php';

include './proLogic/helperFunctions.php';


#validation
    $ErrorFlag = 0;
    $ErrorMessage = [];
    $message = '';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name     = cleanInputs($_POST['name']);
		$email    = cleanInputs($_POST['email']);
		$phone    = cleanInputs($_POST['phone']);
		$password = htmlspecialchars(trim($_POST['password']));
		$userMessage  = $_POST['userMessage'];
		if(empty($name) || empty($email) || empty($phone)|| empty($password) || empty($userMessage)){
			$ErrorFlag = 1;
            $ErrorMessage['empty'] = "Empty field";

		}
		$namePattern  = "/^[a-zA-Z\s]*$/";
		$phonePattern = "/^\d{11}$/";
		if(!preg_match($namePattern,$name)){

            $ErrorFlag = 1;
            $ErrorMessage['name'] = "inValid String";
        }

		$email = filter_var($email,FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $ErrorFlag = 1;
        $ErrorMessage['email'] = "invalid email";
        }

        if(!preg_match($phonePattern,$phone)){
            $ErrorFlag = 1;
            $ErrorMessage['phone'] = "inValid number";
        }

		if(strlen($password) < 6){

            $ErrorFlag = 1;
            $ErrorMessage['password'] = "length must be > 6";
        }
		if($ErrorFlag==0){
			$password =md5($password);
			$sql="insert into users (name, email, phone, password, userMessage) values ('$name','$email','$phone','$password','$userMessage')";
			$op=mysqli_query($con,$sql);
			if($op){
				$message='data inserted';
				header("Location:home.php");
			}
		}

	}


if($ErrorFlag==1){
	foreach($ErrorMessage as $key => $err_message){
		echo '*'.$key. ' : '.$err_message.'<br>';
	}
}else{
		echo $message;
	}

?>




<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Simple House - Contact Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	<link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->

<body>

	<div class="container">
		<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/3.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Simple House</h1>
								<h6 class="tm-site-description">new restaurant coming!</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
							    <li class="tm-nav-li"><a href="contact.php" class="tm-nav-link active">Sign Up</a></li>
								<li class="tm-nav-li"><a href="home.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Sign Up Page</h2>
				<p class="col-12 text-center">You may use <a rel="nofollow"
						href="https://www.ltcclock.com/downloads/simple-contact-form/" target="_blank">Simple Contact
						Form</a> to send email to your inbox. You can modify and use this template for your website.
					Header image has a parallax effect. Total 3 HTML pages included in this template.</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="tm-contact-form">
						    <div class="form-group">
								<input type="hidden" name="id" class="form-control" placeholder="Name" value="id"/>
							</div>

							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Name" required="" />
							</div>

							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email" required="" />
							</div>
							<div class="form-group">
								<input type="phone" name="phone" class="form-control" placeholder="Phone Number" required="" />
							</div>
							<div class="form-group">
                                <input class="form-control py-4"  name="password" id="inputEmailAddress" type="password" placeholder="Enter password"  required />
                            </div>

							<div class="form-group">
								<textarea rows="5" name="userMessage" class="form-control" placeholder="Message"
									required=""></textarea>
							</div>

							<div class="form-group tm-d-flex">
								<button type="submit" class="tm-btn tm-btn-success tm-btn-right">
								Sign Up
								</button>
								<button type="submit" class="tm-btn tm-btn-success tm-btn-right" style="margin-top: 20px;">
								<a href="login.php" style=" text-decoration:none; color:#fff">Login</a>
								</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								180 Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
								mus 10550
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>080-090-0110
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>info@company.co
							</a>
							<div class="tm-contact-social">
								<a href="https://fb.com/templatemo" class="tm-social-link"><i
										class="fab fa-facebook tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d218359.68531916945!2d29.81479743690816!3d31.224328548868684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c49126710fd3%3A0xb4e0cda629ee6bb9!2sAlexandria%2C%20Alexandria%20Governorate!5e0!3m2!1sen!2seg!4v1617571892582!5m2!1sen!2seg"
								frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
						<h2 class="text-center tm-section-title">FAQs</h2>
						<p class="text-center">This section comes with Accordion tabs for different questions and
							answers about Simple House HTML CSS template. Thank you. #666</p>
						<div class="tm-accordion">
							<button class="accordion">1. Fusce eu lorem et dui #09C maximus varius?</button>
							<div class="panel">
								<p>#666 Duis blandit purus vel nenenatis rutrum. Pellentesque pellentesque tindicunt
									lorem, ac egestas massa sollicitudin vel. Nam scelerisque vulputate quam mollis
									pretium. Morbi condimentum volutpat.</p>
							</div>

							<button class="accordion">2. Vestibulum #999 ante ipsum primis in faucibus orci?</button>
							<div class="panel">
								<p>Mauris euismod odio at commodo rhoncus. Maecenas nec interdum purus, sed auctor est.
									Sed eleifend urna nec diam consectetur, a aliquet turpis facilisis. Integer est
									sapien, sagittis vel massa vel, interdum euismod erat. Aenean sollicitudin nisi
									neque, efficitur posuere urna rutrum porta.</p>
							</div>

							<button class="accordion">3. Can I redistribute this template as a ZIP file?</button>
							<div class="panel">
								<p>Redistributing this template as a downloadable ZIP file on any template collection
									site is strictly prohibited. You will need to <a
										href="https://templatemo.com/contact">contact TemplateMo</a> for additional
									permissions about our templates. Thank you.</p>
							</div>

							<button class="accordion">4. Ut ac erat sit amet neque efficitur faucibus et in
								lectus?</button>
							<div class="panel">
								<p>Vivamus viverra pretium ultricies. Praesent feugiat, sapien vitae blandit efficitur,
									sem nulla venenatis nunc, vel maximus ligula sem a sem. Pellentesque ligula ex,
									facilisis ac libero a, blandit ullamcorper enim.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2020 Simple House

				| Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function () {
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function () {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + "px";
					}
				});
			}
		});
	</script>
</body>

</html>
<?php
$_SESSION['id']=$_POST['id'];
$_SESSION['name']=$_POST['name'];
?>