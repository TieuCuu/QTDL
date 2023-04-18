<div id="layoutSidenav">
    <main class="mx-auto w-100 ">
        <div class="container-fluid ">
            <h2 class="text-center pt-3">DANH SÁCH TÁC PHẨM</h2>
            <div class="card mb-4">
                <div class="card-header">
                    <?php
                    try {
                        $qr1 = 'select tongSach()';
                        $sth1 = $pdo->prepare($qr1);
                        $sth1->execute();
                        $sumBook = $sth1->fetch();

                        $qr2 = 'select tongSachChuaTra()';
                        $sth2 = $pdo->prepare($qr2);
                        $sth2->execute();
                        $sumNotReturn = $sth2->fetch();
                    } catch (PDOException $e) {
                        $error_message = 'Không thể lấy dữ liệu';
                        $reason = $e->getMessage();
                        echo $error_message;
                    }
                    ?>
                    <div>Tổng số sách trên thư viện: <span class="fw-bold"><?php echo htmlspecialchars($sumBook[0]); ?></span> </div>
                    <div>Tổng số sách chưa trả: <span class="fw-bold text-danger"><?php echo htmlspecialchars($sumNotReturn[0]); ?></span> </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tên tác phẩm</th>
                                <th>Tác giả</th>
                                <th>Số lượng</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên tác phẩm</th>
                                <th>Tác giả</th>
                                <th>Số lượng</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            try {
                                $query = 'SELECT * FROM SACH S, TACPHAM P WHERE S.NT = P.NT';
                                $sth = $pdo->query($query);
                                while ($row = $sth->fetch()) {
                                    $htmlspecialchars = 'htmlspecialchars';
                                    $ten = $htmlspecialchars($row['tua']);
                                    $tacgia = $htmlspecialchars($row['tacgia']);
                                    $sl = $htmlspecialchars($row['SL']);
                                    $nt = $htmlspecialchars($row['NT']);

                                    echo '<tr>           
                                        <td><a href="index.php?act=tacpham&NT=' . $nt . '">' . $ten . '</td>
                                        <td>' . $tacgia . '</td>
                                        <td>' . $sl . '</td>  
                                        <td>
                                            <a href="index.php?act=edit&NT=' . $nt . '"><i class="fa-solid fa-file-pen text-warning mx-3 fs-5"></i></a>
                                            <a href="index.php?act=delete&NT=' . $nt . '"><i class="fa-solid fa-trash-can text-danger fs-5"></i></a>
                                        </td>  
                                        </tr>';
                                }
                            } catch (PDOException $e) {
                                $error_message = 'Không thể lấy dữ liệu';
                                $reason = $e->getMessage();
                                echo $error_message;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>