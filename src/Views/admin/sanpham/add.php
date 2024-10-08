<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="container my-3">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="lable-control" for="">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="ten_san_pham" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên sản phẩm</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ảnh chính</label>
                    <input class="form-control" type="file" name="anh_chinh" id="">
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ảnh 1</label>
                    <input class="form-control" type="file" name="anh_phu_1" id="">
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ảnh 2</label>
                    <input class="form-control" type="file" name="anh_phu_2" id="">
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ảnh 3</label>
                    <input class="form-control" type="file" name="anh_phu_3" id="">
                </div>

                <div class="mb-3">
                    <label class="lable-control" for="">Mô tả ngắn</label>
                    <input class="form-control" type="text" name="mo_ta_ngan" id="">
                </div>

                <div class="mb-3">
                    <label class="lable-control" for="">Mô tả </label>
                    <textarea class="form-control" id="" name="mo_ta" rows="3"></textarea>

                </div>

                <div class="mb-3">

                    <select class="form-select" name="id_danh_mucs" aria-label="Chọn danh mục">
                        <option selected>Chọn danh mục</option>
                        <?php foreach ($danhmucs as $key => $danhmuc) : ?>
                            <option value="<?= $danhmuc['id'] ?>"> <?= $danhmuc['ten_danh_muc'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Danh mục không được để trống</div>
                    <?php endif ?>
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
                    <div class="text-center">
                        <button type="button" id="addForm" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg></button>
                    </div>
                </div>

                <div class="text-center">
                    <input name="submit" class="btn btn-success" type="submit" value="Thêm mới">
                    <a class="btn btn-info" href="/admin-san-pham">Quay lại</a>
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