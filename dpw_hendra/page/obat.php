<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h3><i class="fa fa-user"></i> Data Obat
            <div class="btn btn-outline-success mr-2" style="float: right; clear: both;">
              <div style="float: right;clear: both;">
                <a href="index.php?page=tambah_obat" class="btn-sm btn-primary"> <i class="fa fa-plus"></i> TAMBAH</a>
              </div>
            </div>
          </h3>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  include "config/koneksi.php";
    if(isset($_GET['action'])) {
      if($_GET['action']=='hapus') {
      $kd_obat = $_GET['kd_obat'];
      $sql =mysqli_query($koneksi,"DELETE FROM obat WHERE kd_obat='$kd_obat';");
      if($sql){
        echo '<div class="alert alert-warning alert-dismissible">Obat Berhasil Dihapus</div>'; }
      else {
        echo '<div class="error">Obat Gagal Dihapus</div>';
      }
    }
  }
?>
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header" style="background-color: teal;">
          <h3 class="card-title">Data Obat</h3>
        </div>
        <div class="card-body">
          <table id="data-obat" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><i class=""></i>NO</th>
                <th align="center"><i class="icon_profile"></i>Nomor Obat</th>
                <th align="center"><i class="icon_profile"></i>Nama Obat</th>
                <th align="center"><i class="icon_profile"></i>Satuan</th>
                <th align="center"><i class="icon_profile"></i>Jenis Obat</th>
                <th align="center"><i class="icon_profile"></i>Stock</th>
                <th align="center"><i class="icon_cogs"></i>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql =mysqli_query($koneksi,"select * from obat order by kd_obat"); $no=1;
              ?>
              <?php
                while($result = mysqli_fetch_array($sql)){
                  echo '<tr><td>' . $no.'</td>
                  <td>' . $result['kd_obat'].'</td>
                  <td>' . $result['nm_obat'].'</td>
                  <td>' . $result['satuan'].'</td>
                  <td>'.$result['jenis_obat'].'</td>
                  <td>'.$result['stok'].'</td>
                  <td align="left">
                  <a href="index.php?page=edit_obat&kd_obat=' . $result['kd_obat'].'"
                  class="badge badge-primary">EDIT</a>
                  <a href="index.php?page=obat&action=hapus&kd_obat='.$result['kd_obat'].'"
                  class="badge badge-danger">HAPUS</a>
                  </td></tr>';
                  $no++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
