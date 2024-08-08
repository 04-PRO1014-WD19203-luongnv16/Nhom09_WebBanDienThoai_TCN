<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="container my-3">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">

                    <input class="form-control" type="text" name="id" value="<?= $bienthe['id'] ?>" readonly hidden>
                </div>
                <div class="mb-3">

                    <input class="form-control" type="text" name="id_san_phams" value="<?= $bienthe['id_san_phams'] ?>" readonly hidden>
                </div>
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

                                    <select class="form-control" name="id_mau_sacs">
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
                                    <select class="form-control" name="id_dung_luongs">
                                        <?php
                                        foreach ($dungluongs as $key => $dungluong) {
                                            if ($bienthe['id_dung_luongs'] == $dungluong['id']) {
                                                echo '<option value=" ' . $dungluong['id'] . '"selected>' . $dungluong['ten_dung_luong'] . ' </option>';
                                            } else
                                                echo '<option value=" ' . $dungluong['id'] . '">' . $dungluong['ten_dung_luong'] . ' </option>';
                                        }
                                        ?>
                                    </select>
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống dung lượng</div>
                                    <?php endif ?>

                                </td>

                                <td><input type="number" class="form-control" name="so_luong" value="<?= $bienthe['so_luong'] ?>" placeholder="Số lượng">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống số lượng</div>
                                    <?php endif ?>
                                </td>

                                <td><input type="number" class="form-control" name="gia_goc" value="<?= $bienthe['gia_goc'] ?>" placeholder="Giá gốc">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                                    <?php endif ?>
                                </td>
                                <td><input type="number" class="form-control" name="gia_ban" value="<?= $bienthe['gia_ban'] ?>" placeholder="Giá bán">
                                    <?php if ($check) : ?>
                                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                                    <?php endif ?>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <!-- <button type="button" id="addForm" class="btn btn-success">Add</button> -->
                </div>

                <div class="text-center">
                    <input name="submit" class="btn btn-success" type="submit" value="Sửa">
                    <a class="btn btn-info" href="/admin-san-pham">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- <script>
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

                            </tr>
        `
        $('#tablebt tbody').append(newForm);
    });
</script> -->