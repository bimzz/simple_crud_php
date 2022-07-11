<html>
<title>SEKAR</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="main_container">
		<div id="header">
			<h1>SEKAR</h1>
		</div>
		<div id="navigation">
			<a href="index.php">Home</a>
			<a href="index.php?page=input_srt">Surat Teguran(Denda)</a>
			<a href="index.php?page=about">About</a>
		</div>

		<?php
		$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
		switch ($page) {
			case 'input_srt':
				include "input_srt.php";
				break;
			case 'edit_srt':
				include "edit_srt.php";
				break;
			case 'delete_srt':
				include "delete_srt.php";
				break;
			case 'tampil_srt':
				include "tampil_srt.php";
				break;
			case 'file_srt':
				include "file_srt.php";
				break;
			case 'about':
				include "about.php";
				break;
			case 'main':
			default:
				include 'utama.php';
		}
		?>

		<div id="footer">&copy; 2022 SEKAR</div>
	</div>
</body>

</html>