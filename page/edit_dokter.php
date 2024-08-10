<section class="content-header">
  <div class="container-fluid">
    <div class="row mb 0">
      <div class="col-sm-12">
        <h1 align="center">Form Edit dokter</h1>
      </div>
    </div>
  </div>
</section>

<?php
  $kd_dokter = $_GET['kd_dokter'];
  $sql =mysqli_query($koneksi,"SELECT * FROM dokter WHERE kd_dokter='$kd_dokter'");
  $result = mysqli_fetch_array($sql);

  if (isset($_POST['edit_dokter'])) {
    $nm_dokter=$_POST['nm_dokter'];
    $telepon=$_POST['telepon'];
    $alamat=$_POST['alamat'];

    if (empty($kd_dokter) || empty($nm_dokter)) {
      echo `<div class = "warning">Data Tidak Boleh Kosong</div>`;
    } else {
      $query = "UPDATE dokter SET
      nm_dokter = '$nm_dokter',
      telpon = '$telepon',
      alamat = '$alamat'
      WHERE kd_dokter='$kd_dokter'";
      $edit = mysqli_query($koneksi, $query);
      if($edit){
        echo '<div class="Success")dokter Berhasil Diedit</div>';
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=dokter'>"; }
      else{
        echo '<div class="error")dokter Gagal Diedit</div>';
      }
    }
  }
?>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body p-2">
        <form method="post" action="">
          <fieldset style="border:1px solid orange;">
            <div class = "form-group">
              <label>Kode dokter</label>
            </div>
            <div class = "form-group">
              <input disabled type="text" name="kd_dokter" placeholder="kd_dokter" class="form-control" 
                value="<?php echo $result['kd_dokter']; ?>">
            </div>
            <div class = "form-group">
              <label>Nama dokter</label>
            </div>
            <div class = "form-group">
            <input type="text" name="nm_dokter" placeholder="Nama dokter" class="form-control" 
                value="<?php echo $result['nm_dokter']; ?>">
            </div>

            <div class = "form-group">
              <label>Nomor Teleponr</label>
            </div>
            <div class = "form-group">
            <input type="number" name="telepon" placeholder="Telepon" class="form-control" 
                value="<?php echo $result['telpon']; ?>">
            </div>

            <div class = "form-group">
              <label>Alamat</label>
            </div>
            <div class = "form-group">
            <input type="textarea" name="alamat" placeholder="Alamat Dokter" class="form-control" 
                value="<?php echo $result['alamat']; ?>">
            </div>

            <div class = "form-group">
              <input type="submit" name="edit_dokter" value="EDIT" class="submit btn btn-md btn-success">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
