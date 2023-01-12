<?php
    session_start();
    include 'database.php';
    if($_SESSION['status_login'] != true ){
        echo '<script>window.location="login.php"</script>';
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
</head>
<body>
   <!-- header -->
   <header>
       <div class="container">
            <h1><a href="">ClimbOUTDOOR</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </div>
   </header>

   <!-- konten -->
   <div class="section">
    <div class="container">
        <h3>Tambah Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori"  required>
                    <option value="">--Pilih--</option>
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM tab_kategori ORDER BY kategori_id DESC");
                        while($r = mysqli_fetch_array($kategori)){

                    ?>
                    <option value="<?php echo $r['kategori_id']?>"><?php echo $r['kategori_name']?></option>
                    <?php } ?>
                </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" required>
                <textarea name="deskripsi" class="input-control" placeholder="Deskripsi"></textarea><br>
                <select name="status" class="input-control">
                    <option value="">--Pilih--</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                <input type="submit" name="submit" value="submit" class="btn">
            </form>


            <!-- MENAMBAH DATA PADA DATABASE -->
            <?php
                if(isset($_POST['submit'])){

                //    print_r($_FILES['gambar']);

                // Nampung Input From
                $kategori   = $_POST['kategori'];
                $nama       = $_POST['nama'];
                $harga      = $_POST['harga'];
                $deskripsi  = $_POST['deskripsi'];
                $status     = $_POST['status'];



                // Nampung data File yang di uplod
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $type1 = explode('.', $filename);
                $type2 = $type1[1];

                $newname = 'produk'.time().'.'.$type2;



                // menampung data format file yang diizinkan
                $tipe_diizinkan = array ('jpg', 'jpeg', 'png', 'gif');



                // validasi format file
                if(!in_array($type2, $tipe_diizinkan)){
                        // jika format ga sama
                    echo '<script>alert(Format File Tidak Didukung!!)</script>';
                }else{
                        // jika format sama
                        // prossnupload file ke database
                    move_uploaded_file($tmp_name, './produk/'.$newname);
                    $insert = mysqli_query($conn, "INSERT INTO tab_produk VALUES (null, '".$kategori."', '".$nama."', '".$harga."', '".$deskripsi."', '".$newname."', '".$status."', null ) ");
                    if($insert){
                        echo '<script>alert("Tambah Data Berhasil")</script>';
                        echo '<script>window.location="data-produk.php"</script>';
                    }else{
                        echo 'Gagal'.mysqli_error($conn);
                    }
                }
                
            } 
            ?>

    </div>
   </div>
   </div>
   <!-- Footer -->
   <div class="container">
    <small>Copyright &copy; 2022 - ClimbOUTDOOR</small>
   </div>
   <script>
         CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>