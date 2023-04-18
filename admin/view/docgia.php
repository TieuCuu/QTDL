<?php

$query = 'SELECT * FROM docgia WHERE docgia.ND = ' . $_GET['ND'] . '';

$sth = $pdo->query($query);
$row = $sth->fetch();
$htmlspecialchars = 'htmlspecialchars';
$ten = $htmlspecialchars($row['ten']);
$ho = $htmlspecialchars($row['ho']);
$dchi = $htmlspecialchars($row['dchi']);
$tell = $htmlspecialchars($row['tel']);

?>
<div class="mt-5 pb-5 container">
    <table class="table table-bordered table-striped caption-top">
        <caption class="mb-3 justify-content-center fw-bold fs-5" for="">Thông tin user</caption>
        <thead>
            <tr class="table-primary">
                <th scope="col">Họ tên</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>

            </tr>
        </thead>
        <tbody>

            <?php

            echo '<tr class="">
                <th >' . $ten . '  ' . $ho . ' </th>                        
                <th class="">' . $dchi . '</a></th>
                <th>' . $tell . '</th>
                
            </tr>';

            ?>

        </tbody>
    </table>
</div>

<div class="mt-5 pb-5 container">
    <?php

    try {
        $query = 'SELECT * FROM docgia, muon, tacpham, sach 
                    WHERE docgia.ND = muon.ND 
                    AND muon.NS = sach.NS
                    AND sach.NT = tacpham.NT
                    AND docgia.ND = ' . $_GET['ND'] . '';

        $sth = $pdo->query($query);

        if ($sth == NULL) {
            echo '<p>không có mượn sách</p>';
        } else {
            echo '            
                    <table class="table table-bordered table-hover caption-top">
                    <caption class="mb-3 fs-5 fw-bold" for="">Thông tin mượn sách</caption>
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">Tác Phẩm</th>
                        <th scope="col">Tác Giả</th>
                        <th scope="col">Nhà xuất bản</th>
                        <th scope="col">Ngày mượn</th>
                        <th scope="col">Hạn trả</th>
                        <th scope="col">Ngày trả</th>
                        
                      </tr>
                    </thead>
                    <tbody>  ';


            while ($row = $sth->fetch()) {
                $htmlspecialchars = 'htmlspecialchars';
                $ten = $htmlspecialchars($row['tua']);
                $tacgia = $htmlspecialchars($row['tacgia']);
                $muon = $htmlspecialchars($row['ngaymuon']);
                $han = $htmlspecialchars($row['hantra']);
                $tra = $htmlspecialchars($row['ngaytra']);
                $nxb = $htmlspecialchars($row['nxb']);

                $ns = $htmlspecialchars($row['NS']);

                //   $nt = $htmlspecialchars($row['nt']);

                echo '<tr class="">
                    <th >' . $ten . '</th>                        
                    <th class="">' . $tacgia . '</th>
                    <th>' . $nxb . '</th>
                    <th>' . $muon . '</th>
                    <th>' . $han . '</th>';
                if ($tra == NULL) {
                    echo '<th><form method="post">
                      <input type="hidden" name="ns" value =' . $_GET['ND'] . '>
                      <input type="submit" name="" class="btn btn-warning" value="NHẮC NHỞ"></form></th>';
                } else {
                    echo '<th>' . $tra . '</th>';
                }

                echo ' </tr>';
            }
            echo '
                </tbody>
            </table>';
        }
    } catch (PDOException $e) {
        $error_message = 'Không thể lấy dữ liệu';
        $reason = $e->getMessage();
        include '../partials/show_error.php';
    }

    // if(isset($_POST['NHACNHO']) ){ //&& $_POST['tra'] 
    //     $nd = $_GET['ND'];
    //     $ns = $_POST['ns'];
    //     $date = date("Y/m/d");
    //     $query ="UPDATE muon SET ngaytra =? WHERE NS = ? AND ND =? ";
    //     $sth = $pdo->prepare($query);
    //     $sth->execute([$date,$ns,$nd]);

    //     header ('Location: index.php?act=user&ND='.$_GET['ND'].'');

    // }

    ?>

</div>