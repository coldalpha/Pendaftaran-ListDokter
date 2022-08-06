<?php 

require_once('connection.php');

$sql = "INSERT INTO tasks (tanggal, no, rm, nama, keterangan, dokter) VALUES ('{$_POST['tanggal']}', '{$_POST['no']}', '{$_POST['rm']}', '{$_POST['nama']}', '{$_POST['keterangan']}', '{$_POST['dokter']}')";

if($conn->query($sql)){
	echo json_encode(['status' => 'success']);
	return true;
} else {
	echo json_encode(['status' => 'error', 'err_message' => $conn->error]);
	return true;
}
