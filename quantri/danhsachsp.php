<?php
include_once './ketnoi.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 1;
}
$rowPerPage = 5;
$perRow = $page * $rowPerPage - $rowPerPage;
$sql = "SELECT * FROM sanpham LIMIT " . $perRow . "," . $rowPerPage;
$que = mysqli_query($conn, $sql);
function nha_cc($id_dm)
{
    global $conn;
    $sql = "SELECT * FROM dmsanpham WHERE id_dm = '" . $id_dm . "'";
    $que = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($que);
    return $row['ten_dm'];
}

$totalPage = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham")) / $rowPerPage);
$listPage = "";
if ($page != 1) {
    $listPage .= "<li><a href='quantri.php?page_layout=danhsachsp&&page=1'><<</a></li>";
    $listPage .= "<li><a href='quantri.php?page_layout=danhsachsp&&page=" . ($page - 1) . "'><</a></li>";
}
for ($i = 1; $i <= $totalPage; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachsp&&page=' . $i . '">' . $i . '</a></li>';
    }
    else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachsp&&page=' . $i . '">' . $i . '</a></li>';
    }
}
if ($page != $totalPage) {
    $listPage .= '<li><a href="quantri.php?page_layout=danhsachsp&&page=' . ($page + 1) . '">></a></li>';
    $listPage .= '<li><a href="quantri.php?page_layout=danhsachsp&&page=' . $totalPage . '">>></a></li>';
}
?>
    <script>
        function xoaSanPham() {
            var conf = confirm("Ban co chac muon xoa san pham nay ?");
            return conf;
        }
    </script>
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
            <h1 class="page-header">Quản lý sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body" style="position: relative;">
                    <a href="./quantri.php?page_layout=themsp" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm sản phẩm mới</a>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                        data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-sortable="true">ID</th>
                                <th data-sortable="true">Tên sản phẩm</th>
                                <th data-sortable="true">Giá</th>
                                <th data-sortable="true">Nhà cung cấp</th>
                                <th data-sortable="true">Ảnh mô tả</th>
                                <th data-sortable="true">Sửa</th>
                                <th data-sortable="true">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($que)) { ?>
                            <tr style="height: 300px;">
                                <td data-checkbox="true">
                                    <?php echo $row['id_sp']; ?>
                                </td>
                                <td data-checkbox="true">
                                    <a href="#">
                                        <?php echo $row['ten_sp']; ?>
                                    </a>
                                </td>
                                <td data-checkbox="true">
                                    <?php echo $row['gia_sp']; ?>
                                </td>
                                <td data-sortable="true">
                                    <?php echo nha_cc($row['id_dm']); ?>
                                </td>
                                <td data-sortable="true">
                                    <span class="thumb"><img width="80px" height="150px" src="anh/<?php echo $row['anh_sp']; ?>" /></span>

                                </td>
                                <td>
                                    <a href="./quantri.php?page_layout=suasp&&id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                </td>

                                <td>
                                    <a onClick="return xoaSanPham()" href="./xoasp.php?id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                </td>
                            </tr>
                            <?php 
                        } ?>
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right;">
                        <?php echo $listPage; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->