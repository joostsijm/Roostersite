<!doctype html>
<html>
	<head>
		<title>Rooster | Popup</title>		
		<Meta charset=utf-8>
		<meta name=description content="">
		<link rel=stylesheet href="rooster.css">
		<link rel=stylesheet href="popup.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link href='http://fonts.googleapis.com/css?family=Kreon:700' rel='stylesheet' type='text/css'>
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-57154028-2', 'auto');
		  ga('send', 'pageview');

		</script>
		<?php	
			date_default_timezone_set('Europe/Amsterdam');
			$date=date("W");
			if(isset($_POST['tabs']))
				{
				$stab=$_POST['tabs'];
				}
			else
				{
				$stab="1";
				}
		?>
		
		<div class="logo">
				Rooster
		</div>
		
		<div class="head1">
			<form id='rooster' name='rooster' method='post'>
				<ul id="tabnavr">
					<li class="tabr<?php if($stab== 1){echo "s";}?>"><button type='submit' value='1' name='tabs'>Info</button></li>
					<li class="tabr<?php if($stab== 2){echo "s";}?>"><button type='submit' value='2' name='tabs'>Contact</button></li>
				</ul>
			</form>
		</div>
		
		<div style="padding:5% 0% 30% 2.5%">
			<?php 
				if($stab==1)
					{
						/* info */
						?>
						<p>Deze site, Gemaakt door Joost Sijm.<br>Is er om op een snelle manier het rooster van de klas IO1A van het Horizoncollege te kunnen bekijken</p>
						<p>Er zijn verder geen plannen voor uitbreiding van deze website</p>
						<p>Als je interesse heb in de code achter deze site.<br>kan je deze vind op <a href='https://github.com/joostsijm/Roostersite'>Github</a></p>
						<?php
					}
				if($stab==2)
				{
					/* contact */
					?>
					<p>Als je opmerking of verbeterpunten heb<br>Kan je die mailen naar: <a href='mailto:joostsijm@gmail.com'>joostsijm@gmail.com</a>.</p>
					<?php
				}
			?>
		</div>
	</body>
</html>
 
