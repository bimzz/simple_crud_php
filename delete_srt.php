<?php
include "koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	die("Error. No id Selected! ");
}
?>
<div id="content">
	<?php
	if (!empty($id) && $id != "") {

		$query = "DELETE FROM surat WHERE id='$id'";
		$sql = mysqli_query($conn, $query);
		if ($sql) {
			echo "<h2><font color=blue>Data Surat telah berhasil dihapus</font></h2>";
		} else {
			echo "<h2><font color=red>Data Surat gagal dihapus</font></h2>";
		}
		echo "Klik <a href='index.php?page=tampil_srt'>di sini</a> untuk kembali ke halaman data surat";
	} else {
		die("Access Denied");
	}
	?>
</div>