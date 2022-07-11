<?php
include "koneksi.php";
?>
<div id="content">
	<h2>File Surat</h2>
	<div align="center">
		<?php
		$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
		if ($id == 0) die("no id selected");
		$query = "SELECT nama_file FROM surat WHERE id='$id'";
		$sql = mysqli_query($conn, $query);
		$hasil = mysqli_fetch_array($sql);
		$file = $hasil['nama_file'];
		if (empty($file)) echo "<strong>File surat tidak tersedia</strong>";
		echo "File berada di /files/$file";
		?>
	</div>
</div>