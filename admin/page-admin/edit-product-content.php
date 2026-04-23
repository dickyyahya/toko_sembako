<!-- MAIN CONTENT -->
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '$id'");
$p = mysqli_fetch_object($result);
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div class="">
          <h1 class="fs-3 mb-1">Edit Produk</h1>
          <?php echo $p->product_image; ?>
        </div>
        <div>
          <a href="inventory.php" class="btn btn-primary">Go to Inventory List</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body p-4">
          <form id="addProductForm" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productName" class="form-label">Nama Produk</label>
                <input type="text" name="nama" class="form-control" id="productName" value=" <?php echo $p->product_name ?> " required>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="prostock" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="productPrice" value="<?php echo $p->product_price ?>" step="0.01" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productStock" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="productStock" value="<?php echo $p->product_stock ?>" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="productCategory" class="form-label">Kategori</label>
              <select name="kategori" class="form-select" id="productCategory" required>
                <option value="">Pilih Kategori</option>
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                while ($r = mysqli_fetch_array($kategori)) {
                ?>
                  <option value="<?php
                                  echo $r['category_id']
                                  ?>" <?php
                                      echo ($r['category_id'] == $p->category_id) ? 'selected' : '';
                                      ?>><?php echo $r['category_name'] ?></option><?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">Gambar Produk</label>
              <br>
              <img src="../produk/<?php echo $p->product_image ?>" width="100px" alt="">
              <br><br>
              <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
              <input type="file" name="gambar" class="input-control">
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="productDescription" rows="4"><?php echo $p->product_description ?></textarea>
            </div>
            <div class="mb-3">
              <label for="productCategory" class="form-label">Status</label>
              <select class="form-select" name="status" id="productCategory" required>
                <option value="">Pilih</option>
                <option value="1" <?php echo ($p->product_status == 1) ? 'selected' : '' ?>>Aktif</option>
                <option value="0" <?php echo ($p->product_status == 0) ? 'selected' : '' ?>>Nonaktif</option>
              </select>
            </div>
            <div class="d-flex gap-2">
              <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
              <button type="reset" class="btn btn-secondary">Clear</button>
            </div>

          </form>
          <?php
          if (isset($_POST['submit'])) {
            // data inputan for form
            $kategori = $_POST['kategori'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
            $stok = $_POST['stok'];
            $status = $_POST['status'];
            $foto = $_POST['foto'];

            // tampung data gambar
            // tampung data file
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];


            // jika ganti gambar
            if ($filename != '') {

              $type2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

              $newname = time() . '.' . $type2;

              $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

              if (!in_array($type2, $tipe_diizinkan)) {
                echo '<script>alert("Format file tidak diizinkan")</script>';
                exit;
              }

              // hapus file lama
              $oldFile = '../produk/' . $foto;
              if (!empty($foto) && file_exists($oldFile)) {
                unlink($oldFile);
              }

              // simpan file baru
              move_uploaded_file($tmp_name, '../produk/' . $newname);

              $namagambar = $newname;
            } else {
              $namagambar = $foto;
            }
            // queri update data produk
            $update = mysqli_query($conn, "UPDATE tb_product SET
                    category_id='" . $kategori . "',
                    product_name = '" . $nama . "',
                    product_price = '" . $harga . "',
                    product_description='" . $deskripsi . "',
                    product_stock = '" . $stok . "',
                    product_image='" . $namagambar . "',
                    product_status='" . $status . "' WHERE product_id = '" . $p->product_id . "'");

            if ($update) {
              echo '<script>alert("ubah data berhasil")</script>';
              echo '<script>window.location="inventory.php"</script>';
            } else {
              echo 'gagal' . mysqli_error($conn);
            }
          }
          ?>
        </div>
      </div>


    </div>

  </div>

  <div class="row">
    <div class="col-12">
      <footer class="text-center py-2 mt-6 text-secondary ">
        <p class="mb-0">Copyright © 2026 InApp Inventory Dashboard. Developed by <a href="https://codescandy.com/" target="_blank" class="text-primary">CodesCandy</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="text-primary">ThemeWagon</a> </p>
      </footer>
    </div>

  </div>

</div>