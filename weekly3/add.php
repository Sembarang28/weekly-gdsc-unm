<?php
    require 'connect.php';
    if(isset($_POST['tambah'])){
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        
        $insert = mysqli_query($conn, "INSERT INTO buku (isbn, judul, tahun, id_penerbit) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit')");
        header("Location: index.php");
        exit;
    }

    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");

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
                <h4>TAMBAH BUKU</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
                    <table width="100%" class="table-bordered" cellpadding="10">
                        <tr>
                            <td>ISBN</td>
                            <td><input type="text" class="form-control" name="isbn"></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td><input type="text" class="form-control" name="judul"></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td><input type="text" class="form-control" name="tahun"></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>
                                <select class="form-control" name="id_penerbit">
                                    <?php  
                                        while($p = mysqli_fetch_array($penerbit)){
                                            echo "
                                                <option value=".$p['id_penerbit'].">".$p['nama_penerbit']."</option>
                                            ";
                                        } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="tambah" value="Add"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
