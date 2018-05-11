<?php
include_once './ketnoi.php';
$sql = "SELECT * FROM sanpham WHERE id_sp = '" . $_GET['id_sp'] . "'";
$que = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($que);

$queDM = mysqli_query($conn, "SELECT * FROM dmsanpham");
if (isset($_POST['submit'])) {
    $id_dm = $_POST['id_dm'];
    $ten_sp = $_POST['ten_sp'];
    $gia_sp = $_POST['gia_sp'];
    $bao_hanh = $_POST['bao_hanh'];
    $phu_kien = $_POST['phu_kien'];
    $tinh_trang = $_POST['tinh_trang'];
    $khuyen_mai = $_POST['khuyen_mai'];
    $trang_thai = $_POST['trang_thai'];
    $dac_biet = $_POST['dac_biet'];
    $chi_tiet_sp = $_POST['chi_tiet_sp'];
    if ($_FILES['anh_sp']['name'] == "") {
        $anh_sp = $_POST['anh_sp'];
    }
    else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp_name = $_FILES['anh_sp']['tmp_name'];
    }

    move_uploaded_file($tmp_name, 'anh/' . $anh_sp);
    $sql1 = "UPDATE sanpham SET ten_sp='" . $ten_sp . "', gia_sp='" . $gia_sp . "', id_dm='" . $id_dm . "', bao_hanh='" . $bao_hanh . "', phu_kien='" . $phu_kien . "', tinh_trang='" . $tinh_trang . "', khuyen_mai='" . $khuyen_mai . "', trang_thai='" . $trang_thai . "', dac_biet='" . $dac_biet . "', chi_tiet_sp='" . $chi_tiet_sp . "', anh_sp='" . $anh_sp . "' WHERE id_sp='" . $_GET['id_sp'] . "'";
    mysqli_query($conn, $sql1);
    header('location:./quantri.php?page_layout=danhsachsp');
}
?>
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg>
            </a>
        </li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa thông tin sản phẩm</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin sản phẩm</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="ten_sp" value="<?php echo $row['ten_sp']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" value="<?php echo $row['gia_sp']; ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Bảo hành</label>
                            <input type="text" class="form-control" name="bao_hanh" value="<?php echo $row['bao_hanh']; ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Đi kèm</label>
                            <input type="text" class="form-control" name="phu_kien" value="<?php echo $row['phu_kien']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <input type="text" class="form-control" name="tinh_trang" value="<?php echo $row['tinh_trang']; ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp"><input type="hidden" name="anh_sp" value="<?php echo $row['anh_sp']; ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input type="text" class="form-control" name="khuyen_mai" value="<?php echo $row['khuyen_mai']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Còn hàng</label>
                            <input type="text" class="form-control" name="trang_thai" value="<?php echo $row['trang_thai']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <div class="radio">
                                <label>
                                                <input type="radio" name="dac_biet" <?php
                                                                                    if ($row['dac_biet'] == 1) echo "checked";
                                                                                    ?> id="optionsRadios1" value=1>Có
                                            </label>
                            </div>
                            <div class="radio">
                                <label>
                                                <input type="radio" name="dac_biet" <?php
                                                                                    if ($row['dac_biet'] == 0) echo "checked";
                                                                                    ?> id="optionsRadios2" value=0>Không
                                            </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <select name="id_dm" class="form-control">
                                <?php while ($rowDM = mysqli_fetch_array($queDM)) { ?>
                                            <option value=<?php echo $rowDM['id_dm']; ?>
                                            <?php if ($row['id_dm'] == $rowDM['id_dm']) echo 'selected'; ?>><?php echo $rowDM['ten_dm']; ?></option>
                                <?php 
                            } ?>
                                        </select>
                        </div>
                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea class="form-control" rows="3" name="chi_tiet_sp"><?php echo $row['chi_tiet_sp']; ?></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace('chi_tiet_sp');
                            </script>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row -->