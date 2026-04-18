<!-- MAIN CONTENT -->

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div class="">
          <h1 class="fs-3 mb-1">Tambah Produk</h1>
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
                <input type="text" name="nama" class="form-control" id="productName" placeholder="Enter product name" required>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productPrice" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="productPrice" placeholder="0.00" step="0.01" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productStock" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="productStock" placeholder="0" required>
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
                                  ?>"><?php echo $r['category_name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">Gambar Produk</label>
              <input type="file" name="gambar" class="form-control" id="productImage" required>
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="productDescription" rows="4"
                placeholder="Enter product description"></textarea>
            </div>
            <div class="mb-3">
              <label for="productCategory" class="form-label">Status</label>
              <select class="form-select" name="status" id="productCategory" required>
                <option value="">Pilih</option>
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
              </select>
            </div>
            <div class="d-flex gap-2">
              <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
              <button type="reset" class="btn btn-secondary">Clear</button>
            </div>

          </form>
          <?php
          if (isset($_POST['submit'])) {

            // print_r($_FILES['gambar']);
            // tampung inputan form
            $kategori = $_POST['kategori'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $status = $_POST['status'];
            // tampung data file
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $type1 = explode('.', $filename);
            $type2 = $type1[1];

            $newname = 'produk' . time() . '.' . $type2;

            // tampung data format file allowed

            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
            // validasi format file

            if (!in_array($type2, $tipe_diizinkan)) {
              echo '<script>alert("Format tidak diizinkan")</script>';
              // proses upload file + insert to db
            } else {
              move_uploaded_file($tmp_name, '../produk/' . $newname);
              $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(null, '" . $kategori . "','" . $nama . "','" . $harga . "','" . $deskripsi . "','" . $stok . "','" . $newname . "','" . $status . "',null)");
              if ($insert) {
                echo '<script>alert("Berhasil tambah")</script>';
                echo '<script>window.location="inventory.php"</script>';
              } else {
                echo 'gagal' . mysqli_error($conn);
              }
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