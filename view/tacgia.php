    <div class="position-relative text-center mt-5">
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item " role="presentation">
                <button class="btn border-primary">
                <a class="nav-link " id="tab-login" data-mdb-toggle="pill" href="index.php?act=home" role="tab"
                    aria-controls="pills-login" aria-selected="true">Tác Phẩm</a>
                </button>
                </li>
                <li class="nav-item " role="presentation">
                <button class="btn">
                <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="index.php?act=tacgia" role="tab"
                    aria-controls="pills-register" aria-selected="false">Tác Giả</a>
                </button>
                </li>
            </ul>            
    </div>

        
              
        <div class ="my-5">
        <?php 
            if(isset($_POST["timkiem"])) echo'<p>Kết quả tìm kiếm cho tác giả '.$key.'</p>';
        ?>
        </div>

        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Tác Phẩm</th>
                    
                    <th scope="col">Số Tác Phẩm</th>
                    
                  </tr>
                </thead>
                <tbody>

        <?php

            try {
                $sth = $pdo->query($query);       
                while ($row = $sth->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars'; 
                   // $ten = $htmlspecialchars($row['tua']);
                    $tacgia = $htmlspecialchars($row['tacgia']);
                    $sl = $htmlspecialchars($row['sl']);
                    

                echo '<tr class="">
                <th><form method="post">
                <input type="hidden" name="tg" value ='.$tacgia.'>
                <input type="submit" name="tg" value="'.$tacgia.'"></form></th>
                                     
                
                <th>'.$sl.'</th>
                
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


