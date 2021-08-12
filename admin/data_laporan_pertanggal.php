<?php include '../koneksi1.php';?>
<?php 
$semuadata=array();


if(isset($_GET["kirim"])){
    $tanggal_mulai = $_GET["tglm"];
    $tanggal_selesai = $_GET["tgls"];
    $ambil = $koneksi1->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan LEFT JOIN pembelian_produk pp ON pm.id_pembelian=pp.id_pembelian WHERE tanggal_pembelian BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[] = $pecah;
    }
    //echo "<pre>";
    //print_r ($semuadata);
    //echo "</pre>";
}
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0;?>
                <?php foreach ($semuadata as $key => $value): ?>
                <?php $tanggal = $value['tanggal_pembelian'];?>
                <?php $total+=$value['total_pembelian'];?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value["nama_pelanggan"];?></td>
                        <td><?php echo $value["nama"];?></td>
                        <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
                        <td>Rp. <?php echo number_format ($value["total_pembelian"]);?></td>
                        <td><?php echo $value["status_pembelian"];?></td>
                    </tr>
                <?php endforeach?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="2">Rp. <?php echo number_format($total)?></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>