<!-- MAIN CONTENT -->

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div class="">
          <h1 class="fs-3 mb-1">Tambah Kategori</h1>
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
                <label for="productName" class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" id="productName" placeholder="Enter product name" required>
              </div>
              <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Kategori</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
              </div>

          </form>
          <?php
          if (isset($_POST['submit'])) {
            $nama = ucwords($_POST['nama']);

            $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (null,'" . $nama . "')");

            if ($insert) {
              echo '<script>alert("Tambah data berhasil")</script>';
              echo '<script>window.location="category.php"</script>';
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