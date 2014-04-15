<!DOCTYPE html>
<html>
	<head>
		<title>Contact - Beautifully Tressed Hair</title>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
	</head>
	<body>
		
		<?php
			$nameErr = $emailErr = $inquiryErr = $subjectErr = $messageErr = "";
			$name = $email = $inquiry = $subject = $message = "";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				} else {
					$name = testInput($_POST["name"]);
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
						$nameErr = "Only letters and white space allowed";
					}
				}
				
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					$email = testInput($_POST["email"]);
					if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
						$emailErr = "Invalid e-mail format";
					}
				}
				
				if (empty($_POST["inquiry"])) {
					$inquiryErr = "Inquiry type is required";
				} else {
					$inquiry = testInput($_POST["inquiry"]);
				}
				
				if (empty($_POST["subject"])) {
					$subjectErr = "Subject is required";
				} else {
					$subject = testInput($_POST["subject"]);
				}
				
				if (empty($_POST["message"])) {
					$messageErr = "Message is required";
				} else {
					$message = testInput($_POST["message"]);
				}
				
			}
			
			function testInput($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		
		<div id="outerWrapper">
			<div id="banner">
			<a href="index.html"><img src="img/banner.png"/></a>
			</div>
			<div id="navContainer">
				<ul id="navBar">
					<li><a href="index.html">Home</a></li>
					<li><a href="tutorials.html">Tutorials</a></li>
					<li><a href="pictures.html">Pictures</a></li>
					<li><a href="videos.html">Videos</a></li>
					<li><a href="sales.html">Sales</a></li>
					<li><a class="current" href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div id="content">
				<h1>Contact Us</h1>
				<?php
					if (!isset($_POST["submit"])) {
				?>
				<p>Fill out the form below to contact us with inquiries related to Lilla Rose products or this website.
				<p><span class="required">* - Required field</span></p>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					Name: <input type="text" name="name"/><span class="required"> * <?php echo $nameErr;?></span><br>
					E-Mail: <input type="text" name="email"/><span class="required"> *<?php echo $emailErr;?></span><br>
					Inquiry related to: <span class="required"> *<?php echo $inquiryErr;?></span>
					<input type="radio" name="inquiry" value="Lilla Rose Products">Lilla Rose Products
					<input type="radio" name="inquiry" value="This Website">This Website<br>
					Subject: <input type="text" name="subject"/><span class="required"> *<?php echo $subjectErr;?></span><br>
					Message: <span class="required"> *<?php echo $messageErr;?></span><br>
					<textarea name="message" rows="5" cols="40"></textarea><br>
					<input type="submit">
				</form>
				<?php
					} else {
						if (isset($_POST["email"])) {
							$message = wrap($message, 70);
							mail("bobderrico80@gmail.com",$subject,$message,"From: $from\n");
							echo("Thank you for sending feedback.");
						}
					}
				?>
			</div>
			<div id="footer">
				<p><a href="credits.html">Image Credits</a> | <a href="sitemap.html">Site Map</a> | Site designed and maintained by <a href="http://www.derricowebdesign.com" target="_blank">D'Errico Web Design</a></p>
				<p>Copyright &copy 2014 by Shannon DeVol</p>
			</div>
		</div>
	</body>
</html>