<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Inspecting Dates</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: Inspecting Dates</h1>
		<p>Lear years and days/month</p>

		<div class="resultPanel">
			<h2 id="heading">Output</h2>
			<pre id="outbox"></pre>
		</div>

		<!-- load dojo and provide config via data attribute -->
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
		require(["dojo/date", "dojo/date/locale", "dojo/date/stamp", "dojo/dom", "dojo/domReady!"],
				function(date, locale, stamp, dom){
			var date1 = new Date("Feb 01, 2000"),
				date2 = new Date("Jul 21, 1969");
					
			showResult("Leap Years", 
					[
						"Feb 01, 2000: " + date.getDaysInMonth(date1) +" days in the month. Leap year? " + date.isLeapYear(date1),
						"Jul 21, 1969: " + date.getDaysInMonth(date2) +" days in the month. Leap year? " + date.isLeapYear(date2)
					].join("\n<br>"))
			function showResult(heading, content){
				dom.byId("outbox").innerHTML = content;
			}
		});
		</script>
	</body>
</html>
