<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TRAVEL ON CLOUD</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 5px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		text-align:left;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<div id="body">
		<table>
		<?php
			foreach ($regions as $region => $subregions) {
			echo '<tr><th colspan="15" style="font-size:16px;">'.$region.'</th></tr>';
			foreach ($subregions as $subregion => $hotels) {
				echo '<tr><th colspan="15">'.$subregion.'</th></tr>';
				$count = 0;
				echo '';
				foreach ($hotels as $hotel => $file) {
					echo '<tr><td><a href="'.base_url().'index.php/hotel?q='.$region.'/'.$subregion.'/'.$hotel.'">'.$hotel.'</a></td></tr>';
					$count++;
				}
				
				echo '';
			}
		}
		?>
		
		</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>