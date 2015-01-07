<!doctype html>
<html>
	<head>
		<title>Rooster | <?php
		if(isset($_POST['week']))
			{
			if($_POST['week'] == -1)
				{
				echo "Vorige week";
				}
			if($_POST['week'] == 0)
				{
				echo "Deze week";
				}
			if($_POST['week'] == 1)
				{
				echo "Volgende week";
				}
			if($_POST['week'] == 2)
				{
				echo "2 Weken";
				}
			if($_POST['week'] == 3)
				{
				echo "3 Weken";
				}
			else
				{
				echo "";}
			}
		else
			{
				echo "Deze week";
			}
		?>
		</title>		
		<Meta charset=utf-8>
		<meta name=description content="">
		<link rel=stylesheet href="rooster.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Amsterdam');
			$date=date("W");
			if(isset($_POST['week']))
				{
				$stab=$_POST['week'];
				$date=date("W") + $_POST['week'];
				if($date > 52)
					{
						$date=$date - 52;
					}
				if($date < 10)
					{
						$date="0" . $date;
					}
				}
			else
				{
				$stab="";
				}
		?>
		
		<div id="logo">
			<h1>
				Rooster
			</h1>
		</div>
		
		<div class="head1">
			<form id='rooster' name='rooster' method='post'>
				<ul id="tabnavr">
					<li class="tabr<?php if($stab==-1){echo "s";}?>"><button type='submit' value='-1' name='week'>Vorige week</button></li>
					<li class="tabr<?php if($stab== 0){echo "s";}?>"><button type='submit' value='0' name='week'>Deze week</button></li>
					<li class="tabr<?php if($stab== 1){echo "s";}?>"><button type='submit' value='1' name='week'>Volgende week</button></li>
					<li class="tabr<?php if($stab== 2){echo "s";}?>"><button type='submit' value='2' name='week'>Over 2 weken</button></li>
					<li class="tabr<?php if($stab== 3){echo "s";}?>"><button type='submit' value='3' name='week'>Over 3 weken</button></li>
				</ul>
			</form>
		</div>
		
		<?php 
		echo "<iframe src='http://rooster.horizoncollege.nl/rstr/ECO/HRN/Roosters/" . $date . "/c/c00019.htm' frameborder='0' width='100%' height='800px'>Rooster</iframe>";
		?>
		
	</body>
</html>
 
