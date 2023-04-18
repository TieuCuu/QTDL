<?php
if (isset($_GET['NT']) &&  ($_GET['NT'] > 0)) {
    $query = "select * from tacpham, sach where tacpham.nt=sach.nt and sach.NT=" . $_GET['NT'] . "";

    try {
        $sth = $pdo->query($query);
        $row = $sth->fetch();
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }

    if (!empty($row)) {
?>

        <div class="d-flex justify-content-center">
            <form action="index.php?act=edit" method="post" class="p-5 pb-3 mb-5 mt-5 shadow rounded w-50" style="background-color:  #e5eaf1;">

                <div class="form-floating mb-3">
                    <input type="text" name="tua" value="<?= $row['tua'] ?>" class="form-control" id="tua" placeholder="Tua">
                    <label for="tua">Tên tác phẩm</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tacgia" value="<?= $row['tacgia'] ?>" class="form-control" id="tacgia" placeholder="tacgia">
                    <label for="tacgia">Tác giả</label>
                </div>


                <div class="form-floating mb-3">
                    <select class="form-select" id="nxb" name="nxb" aria-label="Floating label select example">
                        <option value="<?= $row['nxb'] ?>">--<?= $row['nxb'] ?>--</option>
                        <option value="GF">GF</option>
                        <option value="FOLIO">FOLIO</option>
                        <option value="HACHETTE">HACHETTE</option>
                    </select>
                    <label for="nxb">Nhà xuất bản</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="sl" value="<?= $row['SL'] ?>" class="form-control" min="1" id="sl" placeholder="sl">
                    <label for="sl">Số Lượng</label>
                </div>
                <!-- <div>

                    <p><label>Tên tác phẩm: <input type="text" name="tua" value="<?= $row['tua'] ?>"></label></p>
                    <p><label>Tác giả: <input type="text" name="tacgia" value="<?= $row['tacgia'] ?>"></label></p>
                    <p><label for="nxb">Nhà xuất bản: </label>
                        <select id="nxb" name="nxb">
                            <option value="<?= $row['nxb'] ?>">--<?= $row['nxb'] ?>--</option>
                            <option value="GF">GF</option>
                            <option value="FOLIO">FOLIO</option>
                            <option value="HACHETTE">HACHETTE</option>
                        </select>
                    </p>
                    <p><label>Số Lượng: <input type="number" min=1 name="sl" value="<?= $row['SL'] ?>"></label></p>
                </div> -->

                <div class="d-flex justify-content-center"> <input type="hidden" name="NT" value="<?= $_GET['NT'] ?>">
                    <input type="submit" class="btn btn-dark" name="update" value="Cập nhật">
                </div>
            </form>
        </div>


<?php

    } else {
        $error_message = 'Không lấy được trích dẫn này';
        $reason = $pdo_error ?? 'Không rõ nguyên nhân';
        include '../partials/show_error.php';
    }
}


if (isset($_POST['NT']) && isset($_POST['update'])) {
    if (!empty($_POST['NT'])) {

        $query1 = 'update tacpham set tua =?, tacgia =? where NT=?';
        $query2 = 'update sach set sl =?, nxb=? where NT=?';

        try {
            $sth = $pdo->prepare($query1);
            $sth->execute([
                $_POST['tua'],
                $_POST['tacgia'],
                $_POST['NT']
            ]);

            $sth = $pdo->prepare($query2);
            $sth->execute([
                $_POST['sl'],
                $_POST['nxb'],
                $_POST['NT']
            ]);
            echo '<p> Tác phẩm đã được cập nhật.</p>';
        } catch (PDOException $e) {
            $error_message = 'Không thể cập nhật trích dẫn này';
            $reason = $e->getMessage();
            include '../partials/show_error.php';
        }
    } else {
        $error_meeage = 'Hãy gõ vào tất cả thông tin';
        include '../partials/show_error.php';
    }
}
