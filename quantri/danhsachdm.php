<?php
    include_once './ketnoi.php';
    $sql = "SELECT * FROM dmsanpham";
    $que = mysqli_query($conn, $sql);
?>
<script>
    function xoaDanhMuc() {
        var conf = confirm("Ban co chac muon xoa danh muc nay ?");
        return conf;
    }
</script>
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active"></li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý danh mục</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body" style="position: relative;">
                            <a href="./quantri.php?page_layout=themdm" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm danh mục mới</a>
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>						        
                                        <th data-sortable="true">ID</th>
                                        <th data-sortable="true">Tên danh mục</th>
                                        <th data-sortable="true">Sửa</th>
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($row=mysqli_fetch_array($que)){ ?>
                                    <tr>
                                        <td data-checkbox="true"><?php echo $row['id_dm']; ?></td>
                                        <td data-checkbox="true"><a href="#"><?php echo $row['ten_dm']; ?></a></td>						        
                                        <td>
                                            <a href="./quantri.php?page_layout=suadm&&id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                        </td>

                                        <td>
                                            <a onClick="return xoaDanhMuc()" href="./xoadm.php?id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <ul class="pagination" style="float: right;">
                                <li><a href="#"><<</a></li>
                                <li><a href="#"><</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">></a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->	
