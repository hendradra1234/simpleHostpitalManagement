<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-0">
      <div class="col-sm-12">
        <h1 align="center">Form Tambah Pasien Baru</h1>
      </div>
    </div>
  </div>
</section>
<!--Skrip Simpan Data Baru-->
<?php
  if(isset($_POST['tambah_pasien'])) {
    $nm_pasien=$_POST['nm_pasien'];
    $tempat_lahir=$_POST['tempat_lahir'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $agama=$_POST['agama'];
    $goldar=$_POST['goldar'];
    $jenkel=$_POST['jenkel'];
    $alamat=$_POST['alamat'];
    if(empty($nm_pasien)){
      echo '<div class="warning">Data pasien Tidak Boleh Kosong</div>';
    }else{
      $insert=mysqli_query($koneksi, "insert into pasien (
      nm_pasien, tempat_lahir,tgl_lahir, agama, goldar, jenkel, alamat)
      values ('$nm_pasien', '$tempat_lahir', '$tgl_lahir', '$agama', '$goldar', '$jenkel', '$alamat') ");
    if($insert){
      echo '<div class="alert alert-success alert-dismissible">Berhasil DiSimpan</div>';
      echo "<meta http-equiv='refresh' content='0 url=index.php?page=pasien'>";
    }else{
      echo '<div class="error">pasien Gagal Disimpan</div>';
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
          <div class = "form-group">
            <!-- <label>Kode Pasien</label>
            </div>
            <div class = "form-group">
              <input type="text" name="kd_pasien" placeholder="kd_pasien" class="form-control">
            </div> -->

            <div class = "form-group">
              <label>Nama Pasien</label>
            </div>
            <div class = "form-group">
              <input type="text" name="nm_pasien" placeholder="Nama pasien" class="form-control">
            </div>

            <div class = "form-group">
              <label>Tempat Lahir</label>
            </div>
            <div class = "form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
            </div>


            <div class = "form-group">
              <label>Tanggal Lahir</label>
            </div>
            <div class = "form-group">
              <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control">
            </div>

            <div class = "form-group">
              <label>Agama</label>
            </div>
            <div class = "form-group">
              <select type="text" name="agama" placeholder="agama" class="form-control">
                <?php
                  show_option($religion);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Golongan Darah</label>
            </div>

            <div class = "form-group">
              <select type="text" name="goldar" placeholder="goldar" class="form-control">
                <?php
                  show_option($bloodType);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Jenis Kelamin</label>
            </div>
            <div class = "form-group">
              <select type="text" name="jenkel" placeholder="jenkel" class="form-control">
                <?php
                  show_option($gender);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Alamat</label>
            </div>
            <div class = "form-group">
              <input type="text" name="alamat" placeholder="alamat" class="form-control">
            </div>

            <div class = "form-group">
              <input type="submit" name="tambah_pasien" value="SIMPAN" class="submit_btn btn-md btn-success">
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
