<!doctype html>
<html>
	<head>
		<title>Rooster | 
		
			<?php
			if(isset($_POST['week']))
			{
				if($_POST['week'] == -1)
				echo "Vorige week";
				if($_POST['week'] == 0)
				echo "Deze week";
				if($_POST['week'] == 1)
				echo "Volgende week";
				if($_POST['week'] == 2)
				echo "2 Weken";
				if($_POST['week'] == 3)
				echo "3 Weken";
			}
			else
				echo "Horizon";
			?>

		</title>	
		
		<Meta charset=utf-8>
		<meta name=description content="">
		<link rel=stylesheet href="rooster.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function popup()
			{
				cuteLittleWindow = window.open("popup.php", "littleWindow", "location=no,width=800,height=500"); 
			}
		</script>
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

			if(isset($_POST['home']))
			{
				unset($_COOKIE['lokaat']);
				unset($_COOKIE['afdeling']);
				unset($_COOKIE['klas']);
				$_GET['klas']=-666;
				$_POST['afdeling']=-666;
			}
		
			if(isset($_GET['week']))
			{
				$stab=$_GET['week'];
				$date=date("W") + $_GET['week'];
				if($date > 52)
				{
					$date=$date - 52;
				}
				if($date < 10)
				{
					$date="0" . $date;
				}
			setcookie("date", $date, time()+60*60*24*30*12);
			}
			else
			{
			$stab="0";
			}
				
			if(isset($_COOKIE['week']))
			{
				if(isset($_GET['week']))
				{
					$stab=$_GET['week'];
					$date=date("W") + $_GET['week'];
					if($date > 52)
					{
						$date=$date - 52;
					}
					if($date < 10)
					{
						$date="0" . $date;
					}
					setcookie("date", $date, time()+60*60*24*30*12);	
				}
				else
				{
					$date=$_COOKIE['week'];
				}
			}
				
			if(isset($_GET['klas']))
			{
				$klas=$_GET['klas'];
			}
			else
			{
				$klas="-666";
			}
			if(isset($_COOKIE['klas']))
			{
				if(isset($_GET['klas']))
				{
					$klas=$_GET['klas'];
				}
				else
				{
					$klas=$_COOKIE['klas'];
				}
			}
				
			if(isset($_POST['lokaat']))
			{
				$lokaat=$_POST['lokaat'];
				unset($_COOKIE['afdeling']);
			}
			else
			{
				$lokaat="-666";
			}
			if(isset($_COOKIE['lokaat']))
			{
				if(isset($_POST['lokaat']))
				{
					$lokaat=$_POST['lokaat'];
					unset($_COOKIE['klas']);
					$klas="-666";
				}
				else
				{
					$lokaat=$_COOKIE['lokaat'];					
				}
			}
				
			if(isset($_POST['afdeling']))
			{
				setcookie("afdeling", $_POST['afdeling'], time()+60*60*24*30*12);
				$afdeling=$_POST['afdeling'];
			}
			else
			{
				$afdeling="-666";
			}
			if(isset($_COOKIE['afdeling']))
			{
				if(isset($_POST['afdeling']))
				{
					$afdeling=$_POST['afdeling'];
					unset($_COOKIE['klas']);
					$klas="-666";
				}
				else
				{
					$afdeling=$_COOKIE['afdeling'];					
				}
			}
			if($lokaat !=-666 )
			{setcookie("lokaat", $lokaat, time()+60*60*24*30*12);}
			if($afdeling !=-666)
			{setcookie("afdeling", $afdeling, time()+60*60*24*30*12);}
			if($klas !=-666)
			{setcookie("klas", $klas, time()+60*60*24*30*12);}
				
			if($afdeling  !=-666 and $lokaat !=-666)
			{
				$sklas = "";
				include("/horizon/" . $lokaat . "/" . $afdeling . "/head.php");
			}
		?>	
		<div>
			<div class="logo" >
				<form  action="index.php" id='home' name='home' method='post'>	
					<button class="logo" type='submit' value='1' name='home'>Rooster</button>
				</form>
			<!--<a href="http://localhost:8080/Roostersite/" >Rooster</a>-->
			</div>
			<div class=feed><a href='mailto:joostsijm@gmail.com'>Feedback</a></div> 
			<div class="logo"><p style="font-size: 0.25em; margin: 0 0 0 200px; text-align: left;"><?php if(isset($sklas)) echo $sklas; ?></p></div>
			<div style="font-size:0.2em; margin:20px 0 0 200px;" class="logo">
				<form name='lokaat' method='post'>
					<select style="width:120px" name='lokaat' class='drop' onchange='this.form.submit()'>
						<?php
							if($lokaat==-666)
							{
								?>
									<option <?php if ($lokaat == '-666') { ?>selected <?php }; ?>value="-666">locatie</option>
								<?php
							}
						?>
						<option <?php if ($lokaat == 'hrn') { ?>selected <?php }; ?>value="hrn">Hoorn</option>
						<option <?php if ($lokaat == 'alk') { ?>selected <?php }; ?>value="alk">Alkmaar</option>
						<option <?php if ($lokaat == 'hee') { ?>selected <?php }; ?>value="hee">Heerhugowaard</option>
						<option <?php if ($lokaat == 'pur') { ?>selected <?php }; ?>value="pur">Purmerend</option>
					</select>
				</form>
			</div>
			<div style="font-size:0.2em; margin:41px 0 0 200px;" class="logo">
				<form name='lokaat' method='post'>
					<select style="width:120px" name='afdeling' class='drop' onchange='this.form.submit()'>
						<?php
							if($lokaat==-666)
							{
								?>
									<option <?php if ($afdeling == '-666') { ?>selected <?php }; ?>value="-666">afdeling</option>
								<?php
							}
							else
							{
								if($afdeling==-666)
								{
									?>
										<option <?php if ($afdeling == '-666') { ?>selected <?php }; ?>value="-666">afdeling</option>
									<?php
								}
								include("/horizon/" . $lokaat . "/afdelingen.php");
							}
						?>
					</select>
				</form>
			</div>
		</div>
	
		<div id="info">
			<ul class="tabnavrklas">
				<li>
					<a href="javascript:popup()">Info</a><!-- week <?php echo $date ?> klas <?php echo $klas ?> tab <?php echo $stab ?> -->
				</li>
			</ul>
			<ul class="tabnavrklas">
				<li>
					<form name='klas' method='get'>
						<label for='klas'>Klas:</label>
						<select style="width:80px" id="klas" name='klas' class='drop' onchange='this.form.submit()'>
							<?php
							if ($klas ==-666)
							{
								echo "<option selected value='0'>Klas</option>";
							}
							if($lokaat  !=-666)
							{
								if($afdeling !=-666)
								{
									include("/horizon/" . $lokaat . "/" . $afdeling . "/klas.php"); 
								}
							}
							?>
						</select>
					</form>
				</li>
			</ul>
		</div>
		<div class="tabs">
			<form id='rooster' name='rooster' method='get'>
				<ul id="tabnavr">
					<?php
						if ($klas != -666)
							{
								?>
								<li class="tabr<?php if($stab==-1){echo "s";}?>">	<button type='submit' value='-1' 	name='week'>Vorige week			</button></li>
								<li class="tabr<?php if($stab==0){echo "s";}?>">		<button type='submit' value='0' 	name='week'>Deze week			</button></li>
								<li class="tabr<?php if($stab==1){echo "s";}?>">		<button type='submit' value='1' 	name='week'>Volgende week		</button></li>
								<li class="tabr<?php if($stab==2){echo "s";}?>">		<button type='submit' value='2' 	name='week'>Over 2 weken		</button></li>
								<li class="tabr<?php if($stab==3){echo "s";}?>">		<button type='submit' value='3' 	name='week'>Over 3 weken		</button></li>
								<?php 
							}
						else
							{
							//echo "<li>&nbsp;</li>";
                            echo "<div class='frame 'style='color:red; font-size:1em;'>Nog niet alle klassen zijn beschikbaar</div>";
							}
					?>
				</ul>
			</form>
		</div>
		<div class="shad"></div>
		<div class="frame">
			<?php
				if ($klas !=-666)
					{
					include("/horizon/" . $lokaat . "/" . $afdeling . "/rooster.php"); 
					}
				else
					{
						if($lokaat  !=-666)
							{
								if($afdeling !=-666)
									{
										echo "<div class='frame1'>Kies hier je klas &#8593;</div>";
									}
								else
									{
										echo "<div class='frame2'>Kies hier je afdeling &#8593;</div>";
									}
							}
						else
							{
								echo "<div class='frame2'>Kies hier je locatie &#8593;</div>";
							}
					}
			?>
		</div>
	</body>
</html>