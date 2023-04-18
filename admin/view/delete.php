<?php

define('TITLE', 'Xóa một Trích dẫn');

echo '<h2 class="text-center mt-3">Xóa một Trích dẫn</h2>';

//include '../partials/check_admin.php';

//include '../partials/db_connect.php';
if (isset($_GET['NT']) && is_numeric($_GET['NT']) && ($_GET['NT'] > 0)) {
    $query = "select * from tacpham where NT={$_GET['NT']}";

    try {
        $sth = $pdo->query($query);
        $row = $sth->fetch();
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }

    if (!empty($row)) {
        $htmlspecialchars = 'htmlspecialchars';
        $ten = $htmlspecialchars($row['tua']);
        $tg = $htmlspecialchars($row['tacgia']);

        echo '<div class="d-flex justify-content-center">
            <form action="index.php?act=delete" method="post" class="p-5 mt-5 shadow rounded w-25" style="background-color: #e5eaf1;">
            <strong style="color: #ea4c89;">Bạn có chắc là muốn xóa trích dẫn này?</strong>
            <p class="text-center my-3" style="color: #3caaa5;">' . $ten . '</p>
            <p class="text-center" style="color:#288cb0;">' . $tg . '</p>';

        echo '<input type="hidden" name="NT" value="' . $_GET['NT'] . '">
            <p class="text-center"><input type="submit" name="submit" class="btn btn-dark" value="Xóa trích dẫn này!"></p>
            </form>
            </div>';
    } else {
        $error_message = 'Không thể lấy được trích dẫn này';
        $reason = $pdo_error ?? 'Không rõ nguyên nhân';
        // include '../partials/show_error.php';
    }
} elseif (isset($_POST['NT']) && is_numeric($_POST['NT']) && ($_POST['NT'] > 0)) {
    $query2 = "delete from libra.sach where NT={$_POST['NT']}";

    $query = "delete from libra.tacpham where NT={$_POST['NT']} limit 1";

    try {
        $sth = $pdo->query($query2);
        $sth1 = $pdo->query($query);
    } catch (PDOException $e) {
        $pdo_error  = $e->getMessage();
    }

    // if($sth && $sth->rowCount() == 1){
    //     echo '<p>Trích dẫn đã bị xóa.</p>';
    // }
    // else{
    //     $error_message = 'Không thể xóa trích dẫn này';
    //     $reason = $pdo_error ?? 'Không rõ nguyên nhân';
    //     //include '../partials/show_error.php';
    // }
} else {
    //include '../partials/show_error.php';
}
