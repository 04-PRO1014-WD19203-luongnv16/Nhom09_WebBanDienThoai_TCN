<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="container my-3">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- form biến thể -->
                <div class="form-group">
                    <label class="">Sản phẩm biến thể</label>
                    <table id="tablebt" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Màu sắc</th>
                                <th>Dung lượng</th>
                                <th>Số lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="id_mau_sacs[]">
                                        <?php
                                        foreach ($mausacs as $key => $mausac) {
                                            if ($bienthe['id_mau_sacs'] == $mausac['id']) {
                                                echo '<option value=" ' . $mausac['id'] . '"selected>' . $mausac['ten_mau_sac'] . ' </option>';
                                            } else
                                                echo '<option value=" ' . $mausac['id'] . '">' . $mausac['ten_mau_sac'] . ' </option>';
                                        }
                                        ?>

                                    </select>
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống màu sắc</div>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <select class="form-control" name="id_dung_luongs[]">
                                        <option value="">Dung lượng</option>
                                        <?php
                                        foreach ($dungluongs as $key => $dungluong) {
                                        ?>
                                            <option value="<?= $dungluong['id'] ?>"><?= $dungluong['ten_dung_luong'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống dung lượng</div>
                                    <?php endif ?>

                                </td>

                                <td><input type="number" class="form-control" name="so_luong[]" placeholder="Số lượng">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống số lượng</div>
                                    <?php endif ?>
                                </td>

                                <td><input type="number" class="form-control" name="gia_goc[]" placeholder="Giá gốc">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                                    <?php endif ?>
                                </td>
                                <td><input type="number" class="form-control" name="gia_ban[]" placeholder="Giá bán">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                                    <?php endif ?>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deleteForm(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg></button>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <button type="button" id="addForm" class="btn btn-success">Add</button>
                </div>

                <div class="text-center">
                    <input name="submit" class="btn btn-success" type="submit" value="Sửa">
                    <a class="btn btn-info" href="/detail-san-pham?id=<?= $sanpham['id'] ?>">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#addForm').click(function() {
        var newForm = `
            <tr>
                                <td>
                                    <select class="form-control" name="id_mau_sacs[]">
                                        <option value="">Chọn màu sắc</option>
                                        <?php
                                        foreach ($mausacs as $key => $mausac) {
                                        ?>
                                            <option value="<?= $mausac['id'] ?>"><?= $mausac['ten_mau_sac'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="id_dung_luongs[]">
                                        <option value="">Dung lượng</option>
                                        <?php
                                        foreach ($dungluongs as $key => $dungluong) {
                                        ?>
                                            <option value="<?= $dungluong['id'] ?>"><?= $dungluong['ten_dung_luong'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>

                                </td>

                                <td><input type="number" class="form-control" name="so_luong[]" placeholder="Số lượng">

                                </td>

                                <td><input type="number" class="form-control" name="gia_goc[]" placeholder="Giá gốc">

                                </td>
                                <td><input type="number" class="form-control" name="gia_ban[]" placeholder="Giá bán">

                                </td>

                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deleteForm(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg></button>
                                </td>

                            </tr>
        `
        $('#tablebt tbody').append(newForm);
    });

    function deleteForm(button) {
        $(button).closest('tr').remove();
    }
</script>