<?php 
session_start();
include 'koneksi1.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Pembelian</title>
    <link href="assets/css/nota.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!--  
    Favicons
    =============================================
    -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/icon.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <a href="index.php"><img src="assets/images/logo_black.png" style="width:100%; max-width:300px;"></a>
                            </td>
<?php 
$ambil = $koneksi1->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
$tanggal = $detail['tanggal_pembelian'];
?>

<!--Jika Pelanggan Yang Beli Tidak Sama Dengan Yang Login, Maka dilarikan ke riwayat-->
<?php
 $idpelbeli = $detail["id_pelanggan"];
 $idpellogin = $_SESSION ["id_pelanggan"];
 if($idpelbeli!=$idpellogin){
    echo "<script>alert('Your Page Error!');</script>";
    echo "<script></script>";
    exit();
 } 
?>

                            <td>
                                Invoice #: <?= $detail['id_pembelian'] ?><br>
                                Date: <?php echo date('d F Y',strtotime($tanggal)); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                            <strong><?= $detail['nama_kota'];?></strong><br>
                            <?= $detail['alamat_pengiriman'];?><br>
                           <strong>Nomor Resi :</strong><?php echo $detail['resi_pengiriman'];?>
                            </td>
                            
                            <td>
                            Nama Pelanggan : <strong><?= $detail['nama_pelanggan'];?></strong><br>
                            <?= $detail['email_pelanggan']; ?><br>
                            <?= $detail['telpon_pelanggan'];?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                   Informasi Pembayaran
                </td>
                
                <td>
                    
                </td>
            </tr>
            <?php $ambil=$koneksi1->query("SELECT * FROM pembayaran WHERE id_pembelian='$_GET[id]'");?> 
            <?php while ($bayar=$ambil->fetch_assoc()) { ?>
            <tr class="item">
                <td>
                    Nama Pengirim
                </td>
                
                <td >
                <?php echo $bayar['nama']?>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Nama Bank
                </td>
                
                <td>
                <?php echo $bayar['bank']?>
                </td>
            </tr>
            <tr class="details">
                <td>
                    Jumlah
                </td>
                
                <td>
                <?php echo ($bayar['jumlah'])?>
                </td>
            </tr>
            <?php }?>
            <tr class="heading">
                <td>
                    Nama Produk
                </td>
                
                <td>
                    Harga
                </td>
            </tr>
            <?php $nomor=1; ?>
            <?php $ambil=$koneksi1->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
            <?php while ($pecah=$ambil->fetch_assoc()) { ?>
            <tr class="item">
                <td>
                <?php echo $nomor; ?>. <?php echo $pecah['nama']; ?>
                </td>
                
                <td>
                    Rp. <?php echo number_format ($pecah['harga']); ?>
                </td>
            </tr>
            <?php $nomor++;?>
            <?php } ?>
            
            <tr class="heading">
                <td>
                    Biaya Pengiriman
                </td>
                
                <td>
                    Harga
                </td>
            </tr>
            <tr class="item">
                <td>
                    Tarif Pengiriman
                </td>
                
                <td>
                    Rp. <?= number_format($detail['tarif']);?>
                </td>
            </tr>
            
            <!--PAJAK PEMBELIAN-->
            <!--<tr class="item ">
                <td>
                    Pajak
                </td>
                
                <td>
                    Rp. <?= number_format($detail['pajak']);?>
                </td>
            </tr>-->
            
            <tr class="total">
                <td>
               <a href="order.php "><button class="btn btn-lg btn-round btn-d"><i class="fa fa-arrow-circle-left fa-2x"></i></button></a>
               <a href="cetak_nota.php?id=<?php echo $detail['id_pembelian'];?>" target="_BLANK" ><button class="btn btn-lg btn-round btn-danger"><i class="fa fa-print fa-2x"></i>  </button></a>
                </td>
                
                <td>
                   Total: Rp. <?= number_format($detail['total_pembelian']);?>
                </td>
            </tr>

        </table>
    </div>
</body>
</html>