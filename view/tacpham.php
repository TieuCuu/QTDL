<?php

//$query = 'SELECT * FROM docgia, muon WHERE docgia.ND = muon.ND AND docgia.ND = '.$_GET['ND'].'';
// $query = 'SELECT tua, tacgia, sach.ns, COUNT(sach.NS) as sl 
//             from sach, tacpham
//             WHERE tacpham.NT = sach.NT 
//             and tacpham.tacgia = "%'.$_GET['NT'].'%"
//             and sach.NS not IN ( SELECT muon.NS FROM muon)
//             GROUP BY sach.NT';

$query = "SELECT tacpham.NT,tua,tacgia, sach.ns, SL
            From tacpham, sach WHERE tacpham.NT = sach.NT and tua LIKE '%".$key."%' ";
?>
    <div class="mt-5 pb-5">
            <table class="table table-bordered">
                <label class="mb-3 justify-content-center" for=""><b> Các tác phẩm của <?=$_GET['tacgia']?></b></label>
                <thead>
                  <tr>
                    <th scope="col">Tác Phẩm</th>
                    <th scope="col">Số lượng còn lại</th>
                    <th scope="col"></th>
                    <?php  if (isset($_SESSION['username']) && $_SESSION['username']!="") {
                    echo ' <th scope="col"></th>';}
                    ?>
                  </tr>
                </thead>
                <tbody>

        <?php

try {
                                                  
    $sth = $pdo->query($query);
    while ($row = $sth->fetch()) {   
    $htmlspecialchars = 'htmlspecialchars'; 
    $ten = $htmlspecialchars($row['tua']);
    $tacgia = $htmlspecialchars($row['tacgia']);
    $sl = $htmlspecialchars($row['sl']);
    $ns = $htmlspecialchars($row['ns']);
                                
                echo '<tr class="">
                <th >'.$ten.'</th>                        
                <th class="">'.$sl.'</th>';
                if (isset($_SESSION['username']) && $_SESSION['username']!=""){
                    echo '<th><form method="post">
               <input type="hidden" name="ns" value ='.$ns.'>
               <input type="hidden" name="SL" value ='.$sl.'>
               <input type="submit" name="muon" value="Mượn"></form></th>'; }
           echo '</tr>';

        }
            } catch (PDOException $e) {
                $error_message = 'Không thể lấy dữ liệu';
                $reason= $e->getMessage();
                //include '../partials/show_error.php';
            }
          
        ?>     
            </tbody>
        </table>
  </div>
            <?php

                if(isset($_POST['muon']) ){ //&& $_POST['tra']   
                    $nd = $_SESSION['nd'] ;           
                    $ns = $_POST['ns'];
                    $sl = $_POST['sl'] - 1;

                    $date1 = date("Y/m/d");
                    //$date2 =  date("Y/m/d","+14 days");
                    $date2 = '2023-09-09';


                    $query ="INSERT INTO muon (NS, ngaymuon, hantra, ND) value(?, ?, ?, ?)";
                    $sth = $pdo->prepare($query);
                    $sth->execute([$ns, $date1, $date2, $nd]);

                    $query2 = 'update sach set sl =? where NS=?';
                    $sth = $pdo->prepare($query2);
                    $sth->execute([$sl,$ns       ]);


                    header ('Location: index.php?act=user&ND='.$nd.'');
                    
            }

            ?>   
