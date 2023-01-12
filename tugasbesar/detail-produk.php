<?php 
error_reporting(0);
include 'database.php';
$kontak = mysqli_query($conn, "SELECT admin_address, admin_email, admin_telp FROM tab_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

// untuk memanggil produk yang sudah kita buat sesuai dengan id nya
$produk = mysqli_query($conn, "SELECT * FROM tab_produk WHERE produk_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
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
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search']?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" >
                <input type="submit" name="cari" value="Cari produk">
            </form>
        </div>
   </div>

    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->produk_gambar?>" width="100%" alt="">
                </div>
                <div class="col-2">
                   <h3><?php echo $p->produk_nama ?></h3>
                   <h4>Rp. <?php echo number_format($p->produk_harga) ?></h4>
                   <p>Deskripsi : <br>
                        <?php echo $p->produk_deskripsi ?>            
                        </p>
                        <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Selamat Siang, Saya Ingin Melakukan Pemesanan <?php echo $p->produk_nama ?>." target="_blank"> Pesan Sekarang</a></p>
                </div>
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