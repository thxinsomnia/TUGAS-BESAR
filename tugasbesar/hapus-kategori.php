<?php

    include 'database.php';
// Hapus Data Kategori
    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tab_kategori WHERE kategori_id = '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }
// Hapus Data Produk
    if(isset($_GET['idp'])){

        $produk = mysqli_query($conn, "SELECT produk_gambar FROM tab_produk WHERE produk_id = '".$_GET['idp']."'" );
        $p = mysqli_fetch_object($produk);
        unlink('./produk/'.$p->produk_gambar);

        
        $delete = mysqli_query($conn, "DELETE FROM tab_produk WHERE produk_id = '".$_GET['idp']."'");
        echo '<script>window.location="data-produk.php"</script>';

    }



?>