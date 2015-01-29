<!doctype html>
<html>
	<head>
		<title>Rooster | 
		
		<?php
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
			}
		else
			{
				echo "Horizon";
			}
		?>
		
		</title>		
		<Meta charset=utf-8>
		<meta name=description content="">
		<link rel=stylesheet href="rooster.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css" />
<<<<<<< HEAD
<<<<<<< HEAD
		<script type="text/javascript">
			function popup(){
			  cuteLittleWindow = window.open("popup.php", "littleWindow", "location=no,width=800,height=500"); 
			}
		</script>
=======
>>>>>>> parent of 76b7112... Info toegevoegd
=======
>>>>>>> parent of 76b7112... Info toegevoegd
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
				setcookie("date", $date, time()+60*60*24*30);
				}
			else
				{
				$stab="0";
				}
				
			if(isset($_COOKIE['week']))
				{
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
							setcookie("date", $date, time()+60*60*24*30);	
						}
					else
						{
							$klas=$_COOKIE['klas'];
						}
				}
			else
				{
					setcookie("date", $date, time()+60*60*24*30);
				}
				
			if(isset($_POST['klas']))
				{
					$klas=$_POST['klas'];
					/* setcookie("klas", $klas, time()+60*60*24*30); */
				}
			if(isset($_COOKIE['klas']))
				{
					if(isset($_POST['klas']))
						{
							$klas=$_POST['klas'];
							setcookie("klas", $klas, time()+60*60*24*30);
						}
					else
						{
							$klas=$_COOKIE['klas'];
						}
				}
			else
				{
					$klas="-666";
				}
				
			if(isset($_POST['lokaat']))
				{
					$lokaat=$_POST['lokaat'];
				}
			if(isset($_COOKIE['lokaat']))
				{
					if(isset($_POST['lokaat']))
						{
							$lokaat=$_POST['lokaat'];
							setcookie("lokaat", $lokaat, time()+60*60*24*30);
							unset($_COOKIE['klas']);
							$klas="-666";
						}
					else
						{
							$lokaat=$_COOKIE['lokaat'];					
						}
				}
			else
				{
					$lokaat="hrn";
				}
				
			setcookie("lokaat", $lokaat, time()+60*60*24*30);
			setcookie("klas", $klas, time()+60*60*24*30);
				
			if(isset($klas))
				{
					$sklas = "";
					include("/eco/" . $lokaat . "/head.php");
				}
		?>	
		<div class="h1"><!-- iets anders dan h1 gebruiken -->
			<div class="logo" ><a href="http://localhost:8080/Roostersite/" >Rooster</a></div>
			<div class="logo"><p style="font-size: 0.25em; padding-left: 200px; text-align: left; padding-top: 25px;"><?php echo $sklas ?></p></div>
			<div class="logo">
				<form style="font-size: 0.2em; padding-left: 200px; text-align: right; padding-top: 45px;" name='lokaat' method='post'>
					<label for='lokaat'></label>
					<select name='lokaat' id='lokaat' onchange='this.form.submit()'>
						<option <?php if ($lokaat == 'hrn') { ?>selected <?php }; ?>value="hrn">Hoorn</option>
						<option <?php if ($lokaat == 'alk') { ?>selected <?php }; ?>value="alk">Alkmaar</option>
					</select>
				</form>
			</div>
		</div>
<<<<<<< HEAD
<<<<<<< HEAD
	
		<div id="info">
			<ul class="tabnavrklas">
				<li class="tabrklas">
					<a href="javascript:popup()">Info</a><!-- week <?php echo $date ?> klas <?php echo $klas ?> tab <?php echo $stab ?> -->
				</li>
			</ul>
			<ul class="tabnavrklas">
				<li class="tabrklas">
					<form name='klas' method='post'>
						<label for='klas'>Klas:</label>
						<select name='klas' id='klas' onchange='this.form.submit()'>
							<?php
							if ($klas ==-666)
								{
									echo "<option selected value='0'>    </option>";
								}
							include("/eco/" . $lokaat . "/klas.php"); 
							?>
						</select>
					</form>
				</li>
			</ul>
		</div>
=======
		
>>>>>>> parent of 76b7112... Info toegevoegd
=======
		
>>>>>>> parent of 76b7112... Info toegevoegd
		<div class="head1">
			<form id='rooster' name='rooster' method='post'>
				<ul id="tabnavr">
					<?php
						if ($klas >= "0")
							{
								?>
								<li class="tabr<?php if($stab==-1){echo "s";}?>">	<button type='submit' value='-1' 	name='week'>Vorige week		</button></li>
								<li class="tabr<?php if($stab==0){echo "s";}?>">	<button type='submit' value='0' 	name='week'>Deze week			</button></li>
								<li class="tabr<?php if($stab==1){echo "s";}?>">	<button type='submit' value='1' 	name='week'>Volgende week	</button></li>
								<li class="tabr<?php if($stab==2){echo "s";}?>">	<button type='submit' value='2' 	name='week'>Over 2 weken		</button></li>
								<li class="tabr<?php if($stab==3){echo "s";}?>">	<button type='submit' value='3' 	name='week'>Over 3 weken		</button></li>
								<?php 
							}
						else
							{
							echo "<li>&nbsp;</li>";
							}
					?>
				</ul>
			</form>
		</div><?php
		
			if ($klas ==-666)
				{
				echo "<div class='frame'>Kies hier je klas &#8593;</div>";
				}
			else
				{
				include("/eco/" . $lokaat . "/rooster.php"); 
				}
			?>
	</body>
</html>
