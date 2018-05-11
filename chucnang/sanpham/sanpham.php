<?php
$sql = "SELECT * FROM sanpham WHERE dac_biet=1 ORDER BY id_sp DESC LIMIT 8";
$que = mysqli_query($conn, $sql);
?>
<div class="products">
    <h2 class="h2-bar">sản phẩm đặc biệt</h2>
    <div class="row">
    <?php while ($row = mysqli_fetch_array($que)) { ?>
        <div class="col-md-3 col-sm-6 product-item text-center">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
            <p class="price">Giá: <?php echo $row['gia_sp']; ?> VNĐ</p>
        </div>
    <?php 
} ?>
    </div>
</div>
<?php
$sql_n = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 8";
$que_n = mysqli_query($conn, $sql_n);
?>
<div class="products">
    <h2 class="h2-bar">sản phẩm mới</h2>
    <div class="row">
    <?php while ($row_n = mysqli_fetch_array($que_n)) { ?>
        <div class="col-md-3 col-sm-6 product-item text-center">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_n['id_sp']; ?>"><img width="80" height="144" src="quantri/anh/<?php echo $row_n['anh_sp']; ?>"></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_n['id_sp']; ?>"><?php echo $row_n['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row_n['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row_n['tinh_trang']; ?></p>
            <p class="price">Giá: <?php echo $row_n['gia_sp']; ?> VNĐ</p>
        </div>
    <?php 
} ?>
    </div>
</div>