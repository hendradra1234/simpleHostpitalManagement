<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-0">
      <div class="col-sm-12">
        <h1 align="center">Form Tambah dokter Baru</h1>
      </div>
    </div>
  </div>
</section>
<!--Skrip Simpan Data Baru-->
<?php
  if(isset($_POST['tambah_dokter'])) {
    $nm_dokter=$_POST['nm_dokter'];
    $telepon=$_POST['telepon'];
    $alamat=$_POST['alamat'];
    if(empty($nm_dokter)){
      echo '<div class="warning">Data Dokter Tidak Boleh Kosong</div>';
    }else{
      $query = "INSERT INTO dokter (
      nm_dokter, telpon, alamat)
      VALUES ('$nm_dokter', '$telepon', '$alamat') ";
      $insert=mysqli_query($koneksi, $query);
    if($insert){
      echo '<div class="alert alert-success alert-dismissible">Data Berhasil DiSimpan</div>';
      echo "<meta http-equiv='refresh' content='0 url=index.php?page=dokter'>";
    }else{
      echo '<div class="error">Dokter Gagal Disimpan</div>';
    }
    }
  }
?>
<!--Batas Simpan data-->
<!--Main Content-->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body p-2">
        <form method="post" action="">

          <!-- <div class = "form-group">
            <label>Kode dokter</label>
          </div>
          <div class = "form-group">
            <input type="text" name="kd_dokter" placeholder="kd_dokter" class="form-control">
          </div> -->
          <div class = "form-group">
            <label>Nama dokter</label>
          </div>
          <div class = "form-group">
            <input type="text" name="nm_dokter" placeholder="Nama dokter" class="form-control">
          </div>
          <div class = "form-group">
            <label>Nomor Telepon</label>
          </div>
          <div class = "form-group">
            <input type="number" name="telepon" placeholder="Nomor Telepon" class="form-control">
          </div>
          <div class = "form-group">
            <label>Alaamt</label>
          </div>
          <div class = "form-group">
            <input type="textarea" name="alamat" placeholder="Alamat dokter" class="form-control">
          </div>

          <div class = "form-group">
            <input type="submit" name="tambah_dokter" value="SIMPAN" class="submit_btn btn-md btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
