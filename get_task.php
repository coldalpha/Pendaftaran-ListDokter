<?php 

require_once('connection.php');
// $pilihDokter = isset($_POST['pilihDokter']);
// $pilihTanggal = isset($_POST['pilihTanggal']);
$hariIni = date("Y/m/d");
if(isset($_POST['pilihDokter'])){
	$pilihDokter = $_POST['pilihDokter'];
	if(isset($_POST['pilihTanggal'])){
		$pilihTanggal = $_POST['pilihTanggal'];
		if($pilihTanggal != ""){
			$sql = "SELECT * FROM tasks where tanggal='$pilihTanggal' and dokter='$pilihDokter' ";
		}else{
			$sql = "SELECT * FROM tasks where dokter='$pilihDokter'";
		}
	}
	$query = $conn->query($sql);
	$no = 1;

	if ($query->num_rows == 0) {
		?>
		<tr>
			<td colspan="8" align="center">No Data</td>
		</tr>
		<?php
	} else {
		while ($row = $query->fetch_assoc()){
			if($row['is_archive'] == 0){
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row['tanggal'] ?></td>
					<td><?= $row['dokter'] ?></td>
					<td><?= $row['no'] ?></td>
					<td><?= $row['rm'] ?></td>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['keterangan'] ?></td>
					<td>
						<?php if ($row['is_finish'] == 0): ?>
							<button type="button" data-url="mark_as_finish.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success btn-finish">Finish</button>
						<?php endif ?>
						<button type="button" data-url="archive_task.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white btn-archive">Archive</button>
					</td>
				</tr>
			<?php
			}
		}
	}
} else if(isset($_POST['pilihTanggal'])){
	$pilihTanggal = $_POST['pilihTanggal'];
	$sql = "SELECT * FROM tasks where tanggal='$pilihTanggal'";
	if(isset($_POST['pilihDokter'])){
		$pilihDokter = $_POST['pilihDokter'];
		$sql = "SELECT * FROM tasks where tanggal='$pilihTanggal' and dokter='$pilihDokter' ";
	}
	$query = $conn->query($sql);
	$no = 1;

	if ($query->num_rows == 0) {
		?>
		<tr>
			<td colspan="8" align="center">No Data</td>
		</tr>
		<?php
	} else {
		while ($row = $query->fetch_assoc()){
			if($row['is_archive'] == 0){
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row['tanggal'] ?></td>
					<td><?= $row['dokter'] ?></td>
					<td><?= $row['no'] ?></td>
					<td><?= $row['rm'] ?></td>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['keterangan'] ?></td>
					<!-- <td>
						<?php if ($row['is_finish'] == 0): ?>
							<button type="button" data-url="mark_as_finish.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success btn-finish">Finish</button>
						<?php endif ?>
						<button type="button" data-url="archive_task.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white btn-archive">Archive</button>
					</td> -->
				</tr>
			<?php
			}
		}
	}
} else{
	$sql = "SELECT * FROM tasks where tanggal = '$hariIni'";
	$query = $conn->query($sql);
	$no = 1;

	if ($query->num_rows == 0) {
		?>
		<tr>
			<td colspan="8" align="center">No Data</td>
		</tr>
		<?php
	} else {
		while ($row = $query->fetch_assoc()){
			if($row['is_archive'] == 0){
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row['tanggal'] ?></td>
					<td><?= $row['dokter'] ?></td>
					<td><?= $row['no'] ?></td>
					<td><?= $row['rm'] ?></td>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['keterangan'] ?></td>
					<!-- <td>
						<?php if ($row['is_finish'] == 0): ?>
							<button type="button" data-url="mark_as_finish.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success btn-finish">Finish</button>
						<?php endif ?>
						<button type="button" data-url="archive_task.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white btn-archive">Archive</button>
					</td> -->
				</tr>
			<?php
			}
		}
	}
}
// $sql = "SELECT * FROM tasks";
// $sql = "SELECT * FROM tasks where dokter='$pilihDokter'";


?>