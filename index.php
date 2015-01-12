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
		<script type="text/javascript">

			function popup(){
			  cuteLittleWindow = window.open("popup.php", "littleWindow", "location=no,width=800,height=500"); 
			}

		</script>
		

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
				setcookie("date", $date, time()+1800);
				}
			else
				{
				$stab="";
				setcookie("date", $date, time()+1800);
				}
				
			if(isset($_POST['klas']))
				{
					$klas=$_POST['klas'];
					if($klas < 10)
						{
							$klas="0" . $date;
						}
					setcookie("klas", $klas, time()+1800);
				}
			if(isset($_COOKIE['klas']))
				{
					$klas=$_COOKIE['klas'];
				}
			else
				{
					$klas="01";
					setcookie("klas", $klas, time()+1800);
				}
			
		?>
		
		<div id="logo">
			<h1>
				Rooster
			</h1>
		</div>
		
		<div id="info">
			<ul id="tabnavr">
				<li id="tabr">
					<a href="javascript:popup()">Info</a>
				</li>
			</ul>
			<ul id="tabnavr">
				<li id="tabr">
					<form id='klas' name='klas' method='post'>
						<label for='klas'>Klas</label>
							<select name='klas' id='klas' onchange='this.form.submit()'>";
								<option value=1>AD2H</option><option value="2">AD3A</option><option value="3">AD4A</option><option value="4">AM1A</option><option value="5">AM1B</option><option value="6">AM2A</option><option value="7">AM2B</option><option value="8">DS1A</option><option value="9">DS2A</option><option value="10">DS3A</option><option value="11">DS4A</option><option value="12">FB1A</option><option value="13">FB1B</option><option value="14">FB1C</option><option value="15">FM2A</option><option value="16">FM2B</option><option value="17">IB1D</option><option value="18">IB2D</option><option value="19">IO1A</option><option value="20">IO2A</option><option value="21">IO3A</option><option value="22">IT4A</option><option value="23">JD1A</option><option value="24">MB1A</option><option value="25">MB2A</option><option value="26">MC1A</option><option value="27">MC1B</option><option value="28">MC2A</option><option value="29">MC3A</option><option value="30">MT1A</option><option value="31">MT2A</option><option value="32">SE1A</option><option value="33">SE2A</option>
							</select>
							<noscript><input type="submit" value="Submit"></noscript>
					</form>
				</li>
			</ul>
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
		echo "<iframe src='http://rooster.horizoncollege.nl/rstr/ECO/HRN/Roosters/" . $date . "/c/c000" . $klas . ".htm' frameborder='0' width='100%' height='800px'>Rooster</iframe>";
		?>
		
	</body>
</html>
 
