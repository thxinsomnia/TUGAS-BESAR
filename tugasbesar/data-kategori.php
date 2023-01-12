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
        <h3>Data Kategori</h3>
        <div class="box">
            <p><a href="tambah-kategori.php">Tambah Data</a></p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Kategori</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>



                <!-- UNTUK MENAMPILKAN DATA YANG ADA DALAM DATABASE PADA TABEL -->
                    <?php
                    $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tab_kategori ORDER BY kategori_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){ 
                        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kategori_name'] ?></td>
                        <td>
                            <a href="edit-kategori.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> || <a href="hapus-kategori.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data? Data Yang SUdah Dihapus Tidak Bisa Kembali!')">Hapus</a>
                        </td>
                    </tr>
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="3">Tidak Ada Data</td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
   </div>

   <!-- Footer -->
   <div class="container">
    <small>Copyright &copy; 2022 - ClimbOUTDOOR</small>
   </div>
</body>
</html>