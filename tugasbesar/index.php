<?php 
include 'database.php';
$kontak = mysqli_query($conn, "SELECT admin_address, admin_email, admin_telp FROM tab_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClimbOUTDOOR</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
   <!-- header -->
   <header>
       <div class="container">
            <h1><a href="index.php">ClimbOUTDOOR</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
   </header>

   <!-- Search Bar -->
   <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari produk">
            </form>
        </div>
   </div>

   <!-- kategori -->
   <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?PHP 
                    $kategori = mysqli_query($conn, "SELECT * FROM tab_kategori ORDER BY kategori_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){

                ?>
        <a href="produk.php?kat=<?php echo $k['kategori_id'] ?>">
            <div class="col-5">
                <img src="img/icon-kategori.png" width="50px" style="margin-bottom: 5px;">
                <p><?php echo $k['kategori_name']?></p>
            </div>
        </a>
                <?php  }} else{?>
                    <p>Kategori Tidak Ditemukan</p>
                    <?php }?>
            </div>
        </div>
   </div>
   <!-- new product -->
   <div class="section">
    <div class="container">
        <h3>Produk Terbaru</h3>
        <div class="box">
            <?php 
                $produk = mysqli_query($conn, "SELECT * FROM tab_produk WHERE produk_status = 1 ORDER BY produk_id DESC LIMIT 8");
                if(mysqli_num_rows($produk) > 0 ){
                    while($p = mysqli_fetch_array($produk)){
    
            ?>
            <a href="detail-produk.php?id=<?php echo $p['produk_id']?>">
                <div class="col-4">
                    <img src="produk/<?php echo $p['produk_gambar'] ?>">
                    <p class="nama"><?php echo substr($p['produk_nama'], 0, 30) ?></p>
                    <p class="harga">Rp. <?php echo number_format($p['produk_harga'])?></p>
                </div>
            </a>
            <?php   }}else{  ?>
                <p>PRODUK TIDAK DITEMUKAN</p>
                <?php } ?>
        </div>
    </div>
   </div>

   <!-- foooter -->
   <div class="footer">
    <div class="container">
        <!-- <h4>Contact</h4>
        <p>Agustin Dido Felixson</p> -->

        <h4>Alamat</h4>
        <p><?php echo $a->admin_address?></p>

        <h4>Email</h4>
        <p><?php echo $a->admin_email?></p>

        <h4>Telp</h4>
        <p><?php echo $a->admin_telp?></p>
        <small>Copyright &copy; 2023 - ClimbOUTD00R, Alrights Reserved.</small>
    </div>
   </div>
</body>
</html>