<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: dojo/Deferred with dojo/request</title>

		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: dojo/Deferred with dojo/request</h1>

		<ul id="userlist"></ul>

		<!-- load dojo and provide config via data attribute -->
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
			require(["dojo/request", "dojo/_base/array", "dojo/dom-construct", "dojo/dom", "dojo/domReady!"],
				function(request, arrayUtil, domConstruct, dom) {
					var deferred = request.get("users.json", {
						handleAs: "json"
					});
					deferred.then(function(res){
						var userlist = dom.byId("userlist");

						arrayUtil.forEach(res, function(user){
							domConstruct.create("li", {
								id: user.id,
								innerHTML: user.username + ": " + user.name
							}, userlist);
						});
					},function(err){
						// This shouldn't occur, but it's defined just in case
						alert("An error occurred: " + err);
					});
			});
		</script>
	</body>
</html>
