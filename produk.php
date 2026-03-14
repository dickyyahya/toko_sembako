<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id =1");
$a = mysqli_fetch_object($kontak);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Savon</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Warung Savon</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" id="" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" id="" value="Cari Produk">
            </form>
        </div>
    </div>



    <!-- new produk -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                if ($_GET['search'] != '' || $_GET['kat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%'AND category_id LIKE '%" . $_GET['kat'] . "%'";
                }
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {

                ?>
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>" alt="">
                                <p class="nama"><?php echo $p['product_name'] ?></p>
                                <p class="harga"><?php echo $p['product_price'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Tidak ada produk</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>No hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>
                copyright &copy; 2026 - Warung Savon
            </small>
        </div>
    </div>

</body>

</html>