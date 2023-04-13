<?php
header('Content-Type: application/json; charset=utf8');
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'mahasiswa';

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if(isset($_GET['nim'])) {
            $nim = $_GET['nim'];
            $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
            $query = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($query) === 0){
                http_response_code(404);
            } else {
                $data = mysqli_fetch_assoc($query);
                http_response_code(200);
                echo json_encode([$data]);
            }
        } else {
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($koneksi, $sql);
            $response = array();
            while ($data = mysqli_fetch_assoc($query)){
                $response[] = $data;
            }
            http_response_code(200);
            echo json_encode($response);
        }
        break;
    
    case 'POST':
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];
        $sql = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$email','$jurusan')";
        $query = mysqli_query($koneksi, $sql);

        if($query) {
            http_response_code(201);
            $data = [
                'status' => 'Data Mahasiswa Berhasil Ditahmbahkan'
            ];

            echo json_encode([$data]);
        } else {
            http_response_code(500);
            $data = [
                'status' => 'Data Mahasiswa Gagal Ditambahkan'
            ];

            echo json_encode([$data]);
        }
        break;
    
    case 'PUT':
        if (!isset($_GET['nim'])) {
            http_response_code(400);
            echo json_encode(array('error' => 'NIM belum diisi'));
            break;
        }

        $nim = $_GET['nim'];
        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $query = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($query) === 0){
            http_response_code(404);
        } else {
            $nama = $_GET['nama'];
            $email = $_GET['email'];
            $jurusan = $_GET['jurusan'];
    
            $sql = "UPDATE mahasiswa SET nama='$nama', email='$email', jurusan='$jurusan' WHERE nim='$nim'";
            $query = mysqli_query($koneksi, $sql);
            if($query) {
                http_response_code(200);
                $data = [
                    'status' => 'Data Mahasiswa Berhasil Diubah'
                ];
    
                echo json_encode([$data]);
            } else {
                http_response_code(500);
                $data = [
                    'status' => 'Data Mahasiswa Gagal Diubah'
                ];
    
                echo json_encode([$data]);
            }
        }
        break;

    case 'DELETE':
        if (!isset($_GET['nim'])) {
            http_response_code(400);
            echo json_encode(array('error' => 'NIM belum diisi'));
            break;
        }

        $nim = $_GET['nim'];
        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $query = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($query) === 0){
            http_response_code(404);
        } else {
            $sql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
            $query = mysqli_query($koneksi, $sql);
            if($query) {
                http_response_code(200);
                $data = [
                    'status' => 'Data Mahasiswa Berhasil Dihapus'
                ];
    
                echo json_encode([$data]);
            } else {
                http_response_code(500);
                $data = [
                    'status' => 'Data Mahasiswa Gagal Dihapus'
                ];
    
                echo json_encode([$data]);
            }
        }
        break;

    default :
        http_response_code(405);
        $data = [
            'status' => 'Method yang diizinkan hanya GET, POST, PUT, dan DELETE'
        ];

        echo json_encode([$data]);
        break;
}
?>
