<div class="d-flex justify-content-center">
    <form action="index.php?act=add" method="post" class="p-5 pb-3 mb-5 mt-5 shadow rounded w-50 " style="background-color: #e5eaf1;">
        <!-- <p><label>Tên tác phẩm: <input type="text" name="Tua"></label></p>
        <p><label>Tác giả: <input type="text" name="Tacgia"></label></p>
        <p><label for="nxb">Nhà xuất bản:</label>
            <select id="nxb" name="nxb">
                <option value="GF">GF</option>
                <option value="FOLIO">FOLIO</option>
                <option value="HACHETTE">HACHETTE</option>
            </select>
        </p>
        <p><label>Số Lượng: <input type="number" min=1 name="sl"></label></p> -->

        <div class="form-floating mb-3">
            <input type="text" name="Tua" class="form-control" id="tua" placeholder="Tua">
            <label for="tua">Tên tác phẩm</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="Tacgia" class="form-control" id="tacgia" placeholder="tacgia">
            <label for="tacgia">Tác giả</label>
        </div>


        <div class="form-floating mb-3">
            <select class="form-select" id="nxb" name="nxb" aria-label="Floating label select example">
                <option value="GF">GF</option>
                <option value="FOLIO">FOLIO</option>
                <option value="HACHETTE">HACHETTE</option>
            </select>
            <label for="nxb">Nhà xuất bản</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" name="sl" class="form-control" min="1" id="sl" placeholder="sl">
            <label for="sl">Số Lượng</label>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" name="submit" class="btn btn-dark" value="Thêm">
        </div>
    </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['submit'])) {
    if (!empty($_POST['Tua'])) {

        $tua =  $_POST['Tua'];
        $tacgia = $_POST['Tacgia'];
        $nxb = $_POST['nxb'];
        $sl = $_POST['sl'];

        $qr = 'call addTacPham(?, ?, ?, ?)';
        // $query = 'INSERT INTO tacpham (tua, tacgia) VALUES (?, ?)';

        try {
            $sth = $pdo->prepare($qr);
            $sth->execute([$tua, $tacgia, $nxb, $sl]);
            // $sth = $pdo->prepare($query);
            // $sth->execute([
            //     $_POST['Tua'],
            //     $_POST['Tacgia']
            // ]);

            // $nt = $pdo->lastInsertId();

            // $query1 = 'INSERT INTO sach(nxb, nt,sl) VALUES (?, ?, ?)';
            // $sth1 = $pdo->prepare($query1);
            // $sth1->execute([$nxb, $nt, $sl]);
        } catch (PDOException $e) {
            $pdo_error = $e->getMessage();
        }

        if ($sth && $sth->rowCount() == 1) {
            echo '<script>alert("Tác phẩm mới đã được thêm vào.");</script>';
        } else {
            $error_message = 'Không thể lưu trữ';
            $reason = $pdo_error ?? 'không rõ nguyên nhân';
            include '../partials/show_error.php';
        }
    } else {
        $error_message = 'Hãy gõ vào đầy đủ thông tin ';
        include '../partials/show_error.php';
    }
}
?>