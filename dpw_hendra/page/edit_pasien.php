<section class="content-header">
  <div class="container-fluid">
    <div class="row mb 0">
      <div class="col-sm-12">
        <h1 align="center">Form Edit Pasien</h1>
      </div>
    </div>
  </div>
</section>

<?php
  $kd_pasien = $_GET['kd_pasien'];
  $sql =mysqli_query($koneksi,"select * from pasien where kd_pasien='$kd_pasien'");
  $result = mysqli_fetch_array($sql);

  if (isset($_POST['edit_pasien'])) {
    $nm_pasien = $_POST['nm_pasien'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $goldar = $_POST['goldar'];
    $jenkel = $_POST['jenkel'];
    $alamat = $_POST['alamat'];

    if (empty($kd_pasien) || empty($nm_pasien)) {
      echo `<div class = "warning">Data Tidak Boleh Kosong</div>`;
    } else {
      $query = "UPDATE pasien SET
      nm_pasien = '$nm_pasien',
      tempat_lahir='$tempat_lahir',
      tgl_lahir='$tgl_lahir',
      agama='$agama',
      goldar='$goldar',
      jenkel='$jenkel',
      alamat='$alamat'
      WHERE kd_pasien='$kd_pasien'";
      $edit = mysqli_query($koneksi, $query);
      if($edit){
        echo '<div class="Success")pasien Berhasil Diedit</div>';
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=pasien'>"; }
      else{
        echo '<div class="error")Pasien Gagal Diedit</div>';
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
            <legend>Edit pasien</legend>

            <div class = "form-group">
              <label>Nomor Pasien</label>
            </div>
            <div class = "form-group">
              <input disabled name="kd_pasien" placeholder="Nomot Induk pasien" class="form-control"
                value="<?php echo $kd_pasien; ?>">
            </div>

            <div class = "form-group">
              <label>Nama Pasien</label>
            </div>
            <div class = "form-group">
             <input type="text" name="nm_pasien" placeholder="Nama pasien" class="form-control"
              value="<?php echo $result['nm_pasien']; ?>">
            </div>

            <div class = "form-group">
              <label>Tempat Lahir</label>
            </div>
            <div class = "form-group">
              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control"
                value="<?php echo $result['tempat_lahir' ]; ?>">
            </div>


            <div class = "form-group">
              <label>Tanggal Lahir</label>
            </div>
            <div class = "form-group">
               <input type="text" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control"
                value="<?php echo $result['tgl_lahir']; ?>"'>
            </div>

            <div class = "form-group">
              <label>Agama</label>
            </div>
            <div class = "form-group">
              <select type="text" name="agama" placeholder="agama" class="form-control" value="<?php echo $result['agama']; ?>">
                <?php
                  show_option($religion);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Golongan Darah</label>
            </div>

            <div class = "form-group">
              <select type="text" name="goldar" placeholder="goldar" class="form-control" value="<?php echo $result['goldar']; ?>">
                <?php
                  show_option($bloodType);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Jenis Kelamin</label>
            </div>
            <div class = "form-group">
              <select type="text" name="jenkel" placeholder="jenkel" class="form-control" value="<?php echo $result['jenkel']; ?>">
                <?php
                  show_option($gender);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Alamat</label>
            </div>
            <div class = "form-group">
              <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="<?php echo $result['alamat']; ?>">
            </div>

            <div class = "form-group">
              <input type="submit" name="edit_pasien" value="EDIT" class="submit btn btn-md btn-success">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
