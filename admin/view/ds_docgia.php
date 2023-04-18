<div class="position-relative text-center mt-5">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="btn border-primary">
                <a class="nav-link " id="tab-login" data-mdb-toggle="pill" href="index.php?act=qldocgia1" role="tab"
                    aria-controls="pills-login" aria-selected="false">Chưa trả sách</a>
            </button>
        </li>

        <li class="nav-item " role="presentation">
            <button class="btn">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="index.php?act=ds_docgia" role="tab"
                    aria-controls="pills-login" aria-selected="true">Danh sách đọc giả</a>
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="btn  border-primary">
                <a class="nav-link " id="tab-register" data-mdb-toggle="pill" href="index.php?act=qldocgia2" role="tab"
                    aria-controls="pills-register" aria-selected="false">Trả sách trễ hạn</a>
            </button>
        </li>
    </ul>            
</div>  
        

<div id="layoutSidenav">
        <main class="mx-auto w-100 ">
            <div class="container-fluid ">                    
                <div class="card mb-4">                            
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                               <tr>
                                   <th>Họ tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>                                                                     
                               </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>Họ tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>                                                                      
                                </tr>
                            </tfoot>
                            <tbody>                

        <?php

            try {
                $sth = $pdo->query($query);       
                while ($row = $sth->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars'; 
                   // $ten = $htmlspecialchars($row['tua']);
                    $ten = $htmlspecialchars($row['ten']);
                    $ho = $htmlspecialchars($row['ho']);
                    $nd = $htmlspecialchars($row['ND']);
                    $dc = $htmlspecialchars($row['dchi']);
                    $sdt = $htmlspecialchars($row['tel']);

                echo '<tr class="">
                <td><a href="index.php?act=docgia&ND='.$nd.'">'.$ten.'  '.$ho.'</a></th>
                   <form method="post">
                    <input type="hidden" name="ND" value ='.$nd.'>                               
                    </form>
                </td>                                           
                <td>'.$dc.'</td>
                <td>'.$sdt.'</td>
                
            </tr>';

            }

            } catch (PDOException $e) {
                $error_message = 'Không thể lấy dữ liệu';
                $reason= $e->getMessage();
                echo $error_message;
                //include '../partials/show_error.php';
            }
        ?>
                    
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>                

</div>