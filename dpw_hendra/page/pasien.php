<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h3><i class="fa fa-user"></i> Data Pasien
            <div class="btn btn-outline-success mr-2" style="float: right; clear: both;">
              <div style="float: right;clear: both;">
                <a href="index.php?page=tambah_pasien" class="btn-sm btn-primary"> <i class="fa fa-plus"></i> TAMBAH</a>
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
      $kd_pasien = $_GET['kd_pasien'];
      $sql =mysqli_query($koneksi,"DELETE FROM pasien WHERE kd_pasien='$kd_pasien';");
      if($sql){
        echo '<div class="alert alert-warning alert-dismissible">Pasien Berhasil Dihapus</div>'; }
      else {
        echo '<div class="error">Pasien Gagal Dihapus</div>';
      }
    }
  }
?>
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header" style="background-color: teal;">
          <h3 class="card-title">Data Pasien</h3>
        </div>
        <div class="card-body">
          <table id="data-pasien" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><i class=""></i>NO</th>
                <th align="center"><i class="icon_profile"></i>Nomor Pasien</th>
                <th align="center"><i class="icon_profile"></i>Nama Pasien</th>
                <th align="center"><i class="icon_profile"></i>Tempat Lahir</th>
                <th align="center"><i class="icon_profile"></i>Tanggal Lahir</th>
                <th align="center"><i class="icon_profile"></i>Alamat</th>
                <th align="center"><i class="icon_cogs"></i>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql =mysqli_query($koneksi,"select * from pasien order by kd_pasien"); $no=1;
              ?>
              <?php
                while($result = mysqli_fetch_array($sql)){
                  echo '<tr><td>' . $no.'</td>
                  <td>' . $result['kd_pasien'].'</td>
                  <td>' . $result['nm_pasien'].'</td>
                  <td>' . $result['tempat_lahir'].'</td>
                  <td>'.$result['tgl_lahir'].'</td>
                  <td>'.$result['alamat'].'</td>
                  <td align="left">
                  <a href="index.php?page=edit_pasien&kd_pasien=' . $result['kd_pasien'].'"
                  class="badge badge-primary">EDIT</a>
                  <a href="index.php?page=pasien&action=hapus&kd_pasien='.$result['kd_pasien'].'"
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
