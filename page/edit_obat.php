<section class="content-header">
  <div class="container-fluid">
    <div class="row mb 0">
      <div class="col-sm-12">
        <h1 align="center">Form Edit obat</h1>
      </div>
    </div>
  </div>
</section>

<?php
  $kd_obat = $_GET['kd_obat'];
  $sql =mysqli_query($koneksi,"SELECT * FROM obat WHERE kd_obat='$kd_obat'");
  $result = mysqli_fetch_array($sql);

  if (isset($_POST['edit_obat'])) {
    $nm_obat=$_POST['nm_obat'];
    $satuan=$_POST['satuan'];
    $jenis_obat=$_POST['jenis_obat'];
    $stok=$_POST['stok'];

    if (empty($kd_obat) || empty($nm_obat)) {
      echo `<div class = "warning">Data Tidak Boleh Kosong</div>`;
    } else {
      $query = "UPDATE obat SET
      nm_obat = '$nm_obat',
      satuan='$satuan',
      jenis_obat='$jenis_obat',
      stok='$stok'
      WHERE kd_obat='$kd_obat'";
      $edit = mysqli_query($koneksi, $query);
      if($edit){
        echo '<div class="Success")obat Berhasil Diedit</div>';
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=obat'>"; }
      else{
        echo '<div class="error")obat Gagal Diedit</div>';
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
              <label>Kode Obat</label>
            </div>
            <div class = "form-group">
              <input disabled type="text" name="kd_obat" placeholder="kd_obat" class="form-control" 
                value="<?php echo $result['kd_obat']; ?>">
            </div>
            <div class = "form-group">
              <label>Nama Obat</label>
            </div>
            <div class = "form-group">
            <input type="text" name="nm_obat" placeholder="Nama obat" class="form-control" 
                value="<?php echo $result['nm_obat']; ?>">
            </div>
            <div class = "form-group">
              <label>Satuan</label>
            </div>
            <div class = "form-group">
              <select type="text" name="satuan" placeholder="Satuan" class="form-control" 
                value="<?php echo $result['satuan']; ?>">
                <?php
                  show_option($satuan);
                ?>
              </select>
            </div>

            <div class = "form-group">
              <label>Jenis Obat</label>
            </div>
            <div class = "form-group">
              <select type="text" name="jenis_obat" placeholder="Jenis Obat" class="form-control" 
                value="<?php echo $result['jenis_obat']; ?>">
                <?php
                  show_option($jenisObat);
                ?>
              </select>
            </div>
            <div class = "form-group">
              <label>Stok</label>
            </div>
            <div class = "form-group">
              <input type="number" name="stok" placeholder="Stok" class="form-control" 
                value="<?php echo $result['stok']; ?>">
              <br>
            </div>

            <div class = "form-group">
              <input type="submit" name="edit_obat" value="EDIT" class="submit btn btn-md btn-success">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
