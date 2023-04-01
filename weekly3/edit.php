<?php 
    require "connect.php";
    $isbn = $_GET['isbn'];

    $buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
    while($data = mysqli_fetch_array($buku)){
        $judul = $data['judul'];
        $tahun = $data['tahun'];
        $id_penerbit = $data['id_penerbit'];
        $id_katalog = $data['id_katalog'];
        $id_pengarang = $data['id_pengarang'];
        $qty_stok = $data['qty_stok'];
        $harga_pinjam = $data['harga_pinjam'];
    }

    if (isset($_POST['Submit'])){
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        $result = mysqli_query($conn, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit',
        id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam'
        WHERE isbn = '$isbn';");
        
        header("Location:index.php");
        ob_end_flush();
    }

    $array_katalog = mysqli_query($conn, "SELECT * FROM katalog");
    $array_penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $array_pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
?>
<!DOCTYPE html>
<head>
    <title>Tambah buku</title>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>EDIT BUKU</h4>
            </div>
        </div>

        <div class="row">
            <?php
        var_dump($isbn);
        ?>
            <div class="col-md-12">
                <form action="edit.php?isbn=<?php echo $isbn ?>" method="post" name="form1">
                    <table width="100%" class="table-bordered" cellpadding="10">
                        <tr>
                            <td>ISBN</td>
                            <td><input type="text" readonly="" class="form-control" name="isbn" value="<?= $isbn ?>"></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td><input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td><input type="text" class="form-control" name="tahun" value="<?php echo $tahun; ?>"></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>
                                <select class="form-control" name="id_penerbit">
                                    <?php  
                                        while($penerbit = mysqli_fetch_array($array_penerbit)){
                                            echo "
                                                <option ".($penerbit['id_penerbit'] == $id_penerbit ? 'selected' : '')."
                                                value=".$penerbit['id_penerbit'].">".$penerbit['nama_penerbit']."</option>
                                            ";
                                        } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>
                                <select class="form-control" name="id_pengarang">
                                    <?php  
                                        while($pengarang = mysqli_fetch_array($array_pengarang)){
                                            echo "
                                                <option ".($pengarang['id_pengarang'] == $id_pengarang ? 'selected' : '')."
                                                value=".$pengarang['id_pengarang'].">".$pengarang['nama_pengarang']."</option>
                                            ";
                                        } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Katalog</td>
                            <td>
                                <select class="form-control" name="id_katalog">
                                    <?php  
                                        while($katalog = mysqli_fetch_array($array_katalog)){
                                            echo "
                                                <option ".($katalog['id_katalog'] == $id_katalog ? 'selected' : '')."
                                                value=".$katalog['id_katalog'].">".$katalog['nama']."</option>
                                            ";
                                        } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Qty Stok</td>
                            <td><input type="text" class="form-control" name="qty_stok" value="<?php echo $qty_stok; ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga Pinjam</td>
                            <td><input type="text" class="form-control" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Add"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>