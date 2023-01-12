<!-- UNTUK VERIFIKASI APAKAH LOGIN ATAU TIDAK -->
<?php
    session_start();
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
    <title>ClimbOUTDOOR</title>
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
        <h3>Dashboard</h3>
        <div class="box">
            <h4>Wilujeung Sumping <?php echo $_SESSION['a_global']->admin_name?> di ClimbOUTDOOR</h4>
        </div>
    </div>
   </div>

   <!-- Footer -->
   <div class="container">
    <small>Copyright &copy; 2022 - ClimbOUTDOOR</small>
   </div>
</body>
</html>