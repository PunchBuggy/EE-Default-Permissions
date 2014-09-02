<html>
	<head>
		<title>PB Expressionengine Permissions Script</title>
	</head>
	<body>
		<?php
			function setPermissions($file, $mode) {
				$success = chmod($file, $mode);
				echo "<p style='font-weight:bold;color:" . ($success? '#3c763d' : '#a94442') . ";'>" . $file . ': ';
				echo ($success? 'Success' : 'Failed') . '</p>';
			}

			$prefix = "system";

			if (file_exists($prefix . '/')) {
				echo "Found " . $prefix;
				// 666
				setPermissions($prefix . "/expressionengine/config/config.php", 0666);
				setPermissions($prefix . "/expressionengine/config/database.php", 0666);
				// 777
				setPermissions($prefix . "/expressionengine/cache/", 0777);
				setPermissions("images/avatars/uploads/", 0777);
				setPermissions("images/captchas/", 0777);
				setPermissions("images/member_photos/", 0777);
				setPermissions("images/pm_attachments/", 0777);
				setPermissions("images/signature_attachments/", 0777);
				setPermissions("images/uploads/", 0777);
			} else {
				echo "Configuration files not found";
			}
		?>
	</body>
</html>



