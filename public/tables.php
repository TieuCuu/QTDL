<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">     
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">                      
                        
                        <div class="card mb-4">                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Giá Bán</th>
                                            <th></th>
                                            <th></th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Giá Bán</th>
                                            <th></th>
                                            <th></th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php                                    
                                    session_start();
                                    ob_start();                                   
                                    
                                    include '../partials/db_connect.php';

                                        $query = "SELECT * FROM hanghoa ";

                                       
                                        try {
                                            $sth = $pdo->query($query);                                            
                                        

                                            while ($row = $sth->fetch()) {
                                                $htmlspecialchars = 'htmlspecialchars'; 
                                                $ten = $htmlspecialchars($row['TenHH']);
                                                $gia = $htmlspecialchars($row['Gia']);
                                                $img = $htmlspecialchars($row['TenHinh']);
                                                $gia = number_format($gia, 0, ",", ".");
                                                $id = $htmlspecialchars($row['MSHH']);


                                        echo'
                                            <tr>
                                            <td >'.$ten.'</td>
                                            <td><img class ="w-25" src="'.$img.'" alt=""></td>
                                            <th class="text-danger">'.$gia.' VND</th>
                                            <th><a href="index.php?act=edit&MSHH='.$id.'">Edit</a></th>
                                            <td><a href="index.php?act=delete&MSHH='.$id.'">Delete</a></td>
                                            </tr>';
                                         }                                 
                                        
                                        } catch (PDOException $e) {
                                            $error_message = 'Không thể lấy dữ liệu';
                                            $reason= $e->getMessage();
                                            include '../partials/show_error.php';
                                        }

                                        ?>

                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>                                            
                                        </tr>                                     
                                        
                                        
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
    </body>

</html>
