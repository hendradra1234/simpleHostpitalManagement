<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h3><i class="fa fa-user"></i> Data Dokter
            <div class="btn btn-outline-success mr-2" style="float: right; clear: both;">
              <div style="float: right;clear: both;">
                <a href="index.php?page=tambah_dokter" class="btn-sm btn-primary"> <i class="fa fa-plus"></i> TAMBAH</a>
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
      $kd_dokter = $_GET['kd_dokter'];
      $sql =mysqli_query($koneksi,"DELETE FROM dokter WHERE kd_dokter='$kd_dokter';");
      if($sql){
        echo '<div class="alert alert-warning alert-dismissible">Dokter Berhasil Dihapus</div>'; }
      else {
        echo '<div class="error">Dokter Gagal Dihapus</div>';
      }
    }
  }
?>
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header" style="background-color: teal;">
          <h3 class="card-title">Data Dokter</h3>
        </div>
        <div class="card-body">
          <table id="data-dokter" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><i class=""></i>NO</th>
                <th align="center"><i class="icon_profile"></i>Nomor Dokter</th>
                <th align="center"><i class="icon_profile"></i>Nama Dokter</th>
                <th align="center"><i class="icon_profile"></i>Telepon</th>
                <th align="center"><i class="icon_cogs"></i>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql =mysqli_query($koneksi,"select * from dokter order by kd_dokter"); $no=1;
              ?>
              <?php
                while($result = mysqli_fetch_array($sql)){
                  echo '<tr><td>' . $no.'</td>
                  <td>' . $result['kd_dokter'].'</td>
                  <td>' . $result['nm_dokter'].'</td>
                  <td>' . $result['telpon'].'</td>
                  <td align="left">
                  <a href="index.php?page=edit_dokter&kd_dokter=' . $result['kd_dokter'].'"
                  class="badge badge-primary">EDIT</a>
                  <a href="index.php?page=dokter&action=hapus&kd_dokter='.$result['kd_dokter'].'"
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
