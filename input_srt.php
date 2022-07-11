<?php
include "koneksi.php";


if (isset($_POST['Input'])) {
	$jenis_srt = addslashes(strip_tags($_POST['jenis_srt']));
	$nomor_srt = addslashes(strip_tags($_POST['nomor_srt']));
	$ket = addslashes(strip_tags($_POST['ket']));
	$nama_file = $_FILES['file']['name'];

	if (strlen($nomor_srt) < 12) {
		die("Nomor surat kurang dari 12 digit , silahkan cek kembali <a href='javascript:history.back(1);'>Back</a>");
	}
	if (strlen($nama_file) > 0) {

		if (is_uploaded_file($_FILES['file']['tmp_name'])) {
			move_uploaded_file($_FILES['file']['tmp_name'], "files/" . $nama_file);
		}
	}

	$query = "INSERT INTO surat VALUES('','$jenis_srt','$nomor_srt','$ket','$nama_file')";
	$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($sql) {
		echo "<h2><font color=blue>Data Surat telah berhasil ditambahkan</font></h2>";
	} else {
		echo "<h2><font color=red>Data Surat gagal ditambahkan</font></h2>";
	}
}
?>
<div id="content">
	<h2>Surat Teguran(Denda) || <a href="index.php?page=tampil_srt">Tampil Data Surat</a></h2>
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="700">

			<tr>
				<td width="200">Jenis Surat</td>
				<td>: <select name="jenis_srt" required>
						<option>-- Pilih Jenis Surat --</option>
						<option value="OJK">OJK</option>
						<option value="BI">BI</option>
						<option value="LPS">LPS</option>
						<option value="PAJAK">PAJAK</option>
						<option value="PPATK">PPATK</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nomor Surat</td>
				<td>: <input type="text" name="nomor_srt" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>: <textarea name="ket" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<td>Upload File</td>
				<td>: <input type="file" name="file" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;<input type="submit" name="Input" value="Input Data">&nbsp;
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
		</table>
	</FORM>
</div>