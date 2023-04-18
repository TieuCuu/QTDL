<div class="position-relative text-center mt-5">
    <p><b>DANH SÁCH TÁC PHẨM</b></p>
</div>

<div id="layoutSidenav mx-auto">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tên tác phẩm</th>
                                    <th>Tác giả</th>
                                    <th>Số lượng </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên tác phẩm</th>
                                    <th>Tác giả</th>
                                    <th>Số lượng</th>
                                    <th></th>
                                </tr>
                            </tfoot>

                            <tbody>


                                <?php
                                $query = "SELECT tacpham.NT,tua,tacgia, sach.ns, SL
                        From tacpham, sach WHERE tacpham.NT = sach.NT ";

                                try {

                                    $sth = $pdo->query($query);
                                    while ($row = $sth->fetch()) {
                                        $htmlspecialchars = 'htmlspecialchars';
                                        $ten = $htmlspecialchars($row['tua']);
                                        $tacgia = $htmlspecialchars($row['tacgia']);
                                        $sl = $htmlspecialchars($row['SL']);
                                        $ns = $htmlspecialchars($row['ns']);

                                        echo '<tr>
                                    <td >' . $ten . '</td> 
                                    <td >' . $tacgia . '</td>                        
                                    <td >' . $sl . '</td>';

                                        if ($sl != 0) {

                                            echo '<td>
                                        <form action="index.php?act=home&NS=' . $ns . '" method="post">
                                        <input type="hidden" name="ns" value =' . $ns . '>
                                        <input type="hidden" name="SL" value =' . $sl . '>
                                        <input type="submit" name="muon" value="Mượn"></form>
                                </td>';
                                        }

                                        echo '</tr>';
                                    }
                                } catch (PDOException $e) {
                                    $error_message = 'Không thể lấy dữ liệu';
                                    $reason = $e->getMessage();
                                    include '../partials/show_error.php';
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

<?php

if (isset($_POST['muon'])) {

    $nd = $_SESSION['nd'];
    $ns = $_POST['ns'];
    $sl = $_POST['SL'];
    //$sl = $sl - 1;

    $date1 = date("Y/m/d");
    //$date2 =  date("Y/m/d","+14 days");
    //var_dump($date1);
    $date2 = date('Y/m/d', strtotime($date1 . '+ 14 days'));
    //var_dump($date2);
    $qr = "SELECT * FROM MUON WHERE NS = ? AND NGAYMUON = ? AND HANTRA = ? AND NGAYTRA IS NULL AND ND = ?";
    $sth = $pdo->prepare($qr);
    $result = $sth->execute([$ns, $date1, $date2, $nd]);

    if ($result && $sth->rowCount() == 0) {
        // Cách 1
        // $pdo->beginTransaction();
        // $query = "INSERT INTO muon (NS, ngaymuon, hantra, ND) value(?, ?, ?, ?)";
        // $sth = $pdo->prepare($query);
        // $sth->execute([$ns, $date1, $date2, $nd]);

        // $query2 = 'update sach set sl =? where NS=?';
        // $sth = $pdo->prepare($query2);
        // $sth->execute([$sl, $ns]);
        // $pdo->commit();

        //Cách 2
        $query = 'call muonSach(?, ?, ?, ?)';
        $sth = $pdo->prepare($query);
        $success = $sth->execute([$ns, $date1, $date2, $nd]);
        var_dump($success);
        var_dump($sth->rowCount());

        header('Location: index.php?act=user&ND=' . $nd . '');
    } else {
        echo '<script>alert("Sách này bạn đang mượn, không được phép mượn tiếp");</script>';
    }
}
