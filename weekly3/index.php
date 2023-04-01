<?php
require "connect.php";

$buku = mysqli_query($conn, "SELECT buku.*, katalog.nama as nama_katalog, nama_penerbit, nama_pengarang FROM buku
                        JOIN katalog ON katalog.id_katalog = buku.id_katalog
                        JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                        JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang");
?>

<!DOCTYPE html>
<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row text-center" style="margin: 50px;">
            <div class="col-md-3">
                <h5><a href="index.php">Buku</a></h5>
            </div>
            <div class="col-md-3">
                <h5><a href="index.php">Katalog</a></h5>
            </div>
            <div class="col-md-3">
                <h5><a href="index.php">Penerbit</a></h5>
            </div>
            <div class="col-md-3">
                <h5><a href="index.php">Pengarang</a></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="add.php" class="btn btn-primary">Tambah Buku Baru</a>
            </div>
            <div class="col-md-12">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>

            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <td>ISBN</td>
                            <td>Judul</td>
                            <td>Tahun</td>
                            <td>Penerbit</td>
                            <td>Pengarang</td>
                            <td>Katalog</td>
                            <td>Stok</td>
                            <td>Harga Pinjam</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($books = mysqli_fetch_array($buku)){
                        ?>
                            <tr>
                                <td><?= $books['isbn']?></td>
                                <td><?= $books['judul']?></td>
                                <td><?= $books['tahun']?></td>
                                <td><?= $books['nama_penerbit']?></td>
                                <td><?= $books['nama_pengarang']?></td>
                                <td><?= $books['nama_katalog']?></td>
                                <td><?= $books['qty_stok']?></td>
                                <td><?= $books['harga_pinjam']?></td>
                                <td class='text-center'>
                                    <a href="edit.php?isbn=<?=$books['isbn']?>" class='btn btn-warning'>Edit</a>
                                    <a href='delete.php?isbn=<?=$books['isbn']?>' class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>

<script type="text/javascript">
    function confirmation (isbn) {
        if (confirm('Apakah anda yakin akan menghapus data buku ini?')){
            window.location.href = 'delete.php?isbn='+isbn;
        }
    }
</script>