<?php
include "koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	die("Error. No id Selected! ");
}

$query = "SELECT jenis_srt, nomor_srt, ket , nama_file FROM surat WHERE id='$id'";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_fetch_array($sql);
$jenis_srt = $hasil['jenis_srt'];
$nomor_srt = stripslashes($hasil['nomor_srt']);
$ket = stripslashes($hasil['ket']);
$nama_file = stripslashes($hasil['nama_file']);

if (isset($_POST['Edit'])) {
	$id = $_POST['hid'];
	$jenis_srt = addslashes(strip_tags($_POST['jenis_srt']));
	$nomor_srt = addslashes(strip_tags($_POST['nomor_srt']));
	$ket = addslashes(strip_tags($_POST['ket']));
	$nama_file = $_FILES['file']['name'];
	if (strlen($nama_file) > 0) {
		if (is_uploaded_file($_FILES['file']['tmp_name'])) {
			move_uploaded_file($_FILES['file']['tmp_name'], "files/" . $nama_file);
			mysqli_query($conn, "UPDATE surat SET nama_file='$nama_file' WHERE id='$id'");
		}
	}
	$query = "UPDATE surat SET jenis_srt='$jenis_srt',nomor_srt='$nomor_srt',
			  ket='$ket' WHERE id='$id'";
	$sql = mysqli_query($conn, $query);
	if ($sql) {
		echo "<h2><font color=blue>Data Surat telah berhasil diedit</font></h2>";
	} else {
		echo "<h2><font color=red>Data Surat gagal diedit</font></h2>";
	}
}
?>
<div id="content">
	<h2>Edit Data Surat</h2>
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="700">

			<tr>
				<td width="200">ID</td>
				<td>: <b><?php echo "$id"; ?></b></td>
			</tr>
			<tr>
				<td>Nomor Surat</td>
				<td>: <input type="text" name="nomor_srt" size="30" maxlength="30" value="<?php echo "$nomor_srt"; ?>"></td>
			</tr>
			<tr>
				<td>Jenis Surat</td>
				<td>:
					<select name="jenis_srt">
						<option>-- Pilih Jenis Surat --</option>
						<option value="OJK" <?= ($jenis_srt == 'OJK') ? 'selected' : '' ?>>OJK</option>
						<option value="BI" <?= ($jenis_srt == 'BI') ? 'selected' : '' ?>>BI</option>
						<option value="LPS" <?= ($jenis_srt == 'LPS') ? 'selected' : '' ?>>LPS</option>
						<option value="PAJAK" <?= ($jenis_srt == 'PAJAK') ? 'selected' : '' ?>>PAJAK</option>
						<option value="PPATK" <?= ($jenis_srt == 'PPATK') ? 'selected' : '' ?>>PPATK</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>: <textarea name="ket" cols="40" rows="5"><?php echo "$ket"; ?></textarea></td>
			</tr>
			<tr>
				<td>File</td>
				<td>: <input type="file" name="file" /> File: <?php echo "/files/$nama_file"; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
					<input type="hidden" name="hid" value="<?php echo "$id"; ?>">
					<input type="submit" name="Edit" value="Edit Data">&nbsp;
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
		</table>
	</FORM>
</div>