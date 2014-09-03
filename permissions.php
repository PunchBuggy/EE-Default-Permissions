<html>
	<head>
		<title>PB Expressionengine Permissions Script</title>
		<style type="text/css">
			table td {padding-right:12px;}
			table tbody td:first-child {font-weight:bold;}
		</style>
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<td>Status</td>
					<td>File</td>
					<td>Permission</td>
				</tr>
			</thead>
			<tbody>
				<?php			
					function setPermissions($file, $mode) {
						$success = chmod($file, $mode);
						echo "<tr>";
						echo "<td style='color:" . ($success? '#3c763d' : '#a94442') . ";'>" . ($success? 'Success' : 'Failed') . "</td><td>" . $file . "</td><td>" . $mode . "</td>";
						echo "</tr>";
					}
					
					if (file_exists("control-panel/")) {
						$prefix = "control-panel";
					} elseif (file_exists("system/")) {
						$prefix = "system";
					} else {
						echo "Control panel folder not found";
					}

					if (file_exists($prefix . '/')) {
						echo "Found " . $prefix;
						// 666
						setPermissions($prefix . "/expressionengine/config/config.php", 666);
						setPermissions($prefix . "/expressionengine/config/database.php", 666);
						// 777
						setPermissions($prefix . "/expressionengine/cache/", 777);
						setPermissions("images/avatars/uploads/", 777);
						setPermissions("images/captchas/", 777);
						setPermissions("images/member_photos/", 777);
						setPermissions("images/pm_attachments/", 777);
						setPermissions("images/signature_attachments/", 777);
						setPermissions("images/uploads/", 777);
					} else {
						echo "A strange error has occoured somewhere between line 27 and 33";
					}
				?>
			</tbody>
		</table>
	</body>
</html>



