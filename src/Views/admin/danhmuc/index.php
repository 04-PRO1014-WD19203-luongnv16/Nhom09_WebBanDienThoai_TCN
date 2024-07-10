    <div class="card">
        <div class="">
            <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title?></h3>
        </div>
        <div class="px-5 py-3 text-center">
            <a class="btn btn-success text-center" href="/add-danh-muc">Thêm mới danh muc ++</a>
        </div>
        <div class="table-stats order-table ov-h">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>STT</th>
                        <th class="w-25">Mã danh mục</th>
                        <th class="w-50">Tên danh mục</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($danhmucs as $key=>$danhmuc) :?>
                    <tr class="text-center">
                        <td><?= $key+1?></td>
                        <td class="w-25">DM_<?= $danhmuc['id']?></td>
                        <td class="w-50"><?= $danhmuc['ten_danh_muc']?></td>
                        <td>
                            <form action="/delete-danh-muc" method="post">
                                <div class="" style="display: grid;grid-template-columns: 1fr 1fr;gap: 10px;">
                                    <input type="text" name="id" value="<?=$danhmuc['id']?>" readonly hidden>
                                    <input onclick="return confirm('Bạn có chắc muốn xóa danh mục id: <?=$danhmuc['id']?>');" class="btn btn-danger" type="submit" value="Xóa">
                                    <a class="btn btn-warning text-light" href="/sua-danh-muc?id=<?=$danhmuc['id']?>">Sửa</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>