<?php

//$query = 'SELECT * FROM docgia, muon WHERE docgia.ND = muon.ND AND docgia.ND = '.$_GET['ND'].'';
$query = 'SELECT tua, tacgia, sach.nxb, sach.ns
            from sach, tacpham
            WHERE tacpham.NT = sach.NT 
            and sach.NT = ' . $_GET['NT'] . '
            ';
?>
<div class="mt-5 pb-5 container">
    <table class="table table-bordered table-striped caption-top">
        <caption class="mb-3 justify-content-center  fw-bold fs-5">
            Thông tin tác phẩm
        </caption>
        <thead>
            <tr class="table-primary">
                <th scope="col">Tác Phẩm</th>
                <th scope="col">Tác Giả</th>
                <th scope="col">Nhà xuất bản</th>
                <th scope="col">Số lượng còn lại</th>

            </tr>
        </thead>
        <tbody>

            <?php

            try {

                $sth = $pdo->query($query);
                $row = $sth->fetch();
                $htmlspecialchars = 'htmlspecialchars';
                $ten = $htmlspecialchars($row['tua']);
                $tacgia = $htmlspecialchars($row['tacgia']);

                //$sl = $htmlspecialchars($row['sl']);


                echo '<tr class="">
                <th >' . $ten . '</th>  
                <th >' . $tacgia . '</th>
                <th >';

                $nxb_qr = 'SELECT DISTINCT sach.nxb
                from sach, tacpham
                WHERE tacpham.NT = sach.NT 
                and sach.NT = ' . $_GET['NT'] . '';

                $sth = $pdo->query($nxb_qr);

                $i = 0;
                while ($row = $sth->fetch()) {
                    $i++;
                    $nxb = $htmlspecialchars($row['nxb']);
                    if ($i > 1) {
                        echo ', ';
                    }
                    echo $nxb;
                }
                echo '</th>                         
                <th class=""></th>'; //'.$sl.'

                echo '</tr>';
            } catch (PDOException $e) {
                $error_message = 'Không thể lấy dữ liệu';
                $reason = $e->getMessage();
                //include '../partials/show_error.php';
            }

            ?>
        </tbody>
    </table>
</div>
<?php
$muon = 'SELECT ten, ho,muon.ND, ngaymuon, hantra, ngaytra 
   from muon, docgia ,sach 
   where sach.ns= muon.NS 
   and muon.ND = docgia.ND AND sach.NT = ' . $_GET['NT'] . '';
?>

<div class="mt-5 pb-5 container">
    <table class="table table-bordered table-hover caption-top">
        <caption class="mb-3 fs-5 fw-bold">
            Thông tin mượn sách
        </caption>
        <thead>
            <tr class="table-dark">
                <th scope="col">Họ tên</th>
                <th scope="col">Ngày mượn</th>
                <th scope="col">Hạn trả</th>
                <th scope="col">Ngày trả</th>

            </tr>
        </thead>
        <tbody>

            <?php

            try {

                $sth = $pdo->query($muon);
                while ($row = $sth->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars';
                    $ten = $htmlspecialchars($row['ten']);
                    $ho = $htmlspecialchars($row['ho']);
                    $ngm = $htmlspecialchars($row['ngaymuon']);
                    $nd = $htmlspecialchars($row['ND']);
                    $ngtr = $htmlspecialchars($row['ngaytra']);
                    $hantr = $htmlspecialchars($row['hantra']);


                    echo '<tr class="">
       <th ><a href="index.php?act=docgia&ND=' . $nd . '">' . $ten . '  ' . $ho . '</a></th>  
       <th >' . $ngm . '</th>
       <th >' . $hantr . '</th> 
       <th >' . $ngtr . '</th> ';

                    echo '</tr>';
                }
            } catch (PDOException $e) {
                $error_message = 'Không thể lấy dữ liệu';
                $reason = $e->getMessage();
                //include '../partials/show_error.php';
            }

            ?>
        </tbody>
    </table>
</div>