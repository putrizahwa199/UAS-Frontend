<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');
$conn = new mysqli("localhost", "root", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = array('error' => false);
$action = '';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
// read karyawan
if ($action == 'read') {
    $sql = $conn->query("SELECT * FROM karyawan");
    $users = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($users, $row);
    }
    $result['users'] = $users;
}

if ($action == 'create') {
    $ID_Karyawan = $_POST['id_karyawan'];
    $Nama = $_POST['nama'];
    $Jabatan = $_POST['jabatan'];
    $Jenis_Kelamin = $_POST['jenis_kelamin'];
    $Alamat = $_POST['alamat'];
    $Tanggal_Lahir = $_POST['tanggal_lahir'];
    $No_Telp = $_POST['no_telp'];


    $sql = "INSERT INTO `karyawan`(`id_karyawan`, `nama`, `jabatan`, `jenis_kelamin`, `alamat`, `tanggal_lahir`, `no_telp`) VALUES ('$ID_Barang','$Nama', '$Jabatan','$Jenis_Kelamin','$Alamat','$Tanggal_Lahir','$No_Telp')";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "Berhasil Menambahkan Data Karyawan";
    } else {
        $result['error'] = true;
        $result['message'] = "Data tidak dapat ditambahkan";
    }
}

if ($action == 'update') {

    $ID_Karyawan = $_POST['id_karyawan'];
    $Nama = $_POST['nama'];
    $Jabatan = $_POST['jabatan'];
    $Jenis_Kelamin = $_POST['jenis_kelamin'];
    $Alamat = $_POST['alamat'];
    $Tanggal_Lahir = $_POST['tanggal_lahir'];
    $No_Telp = $_POST['no_telp'];

    $sql = "UPDATE `karyawan` SET `nama`='$Nama',`jabatan`='$Jabatan',`jenis_kelamin`='$Jenis_Kelamin',`alamat`='$Alamat',`tamggal_lahir`='$Tanggal_Lahir',`no_telp`='$No_Telp'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "Data Karyawan Berhasil Diubah";
    } else {
        $result['error'] = true;
        $result['message'] = "Tidak Dapat Mengubah Data";
    }
}

if ($action == 'delete') {

    $EMPLOYEE_ID = $_POST['id_karyawan'];

    $sql = "DELETE FROM `karyawan` WHERE id_karyawan =  '$ID_Karyawan'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "Data Karyawan Berhasil Dihapus";
    } else {
        $result['error'] = true;
        $result['message'] = "Data karyawan tidak dapat dihapus";
    }
}


$conn->close();

header("Content-type: application/json");
echo json_encode($result);
die();