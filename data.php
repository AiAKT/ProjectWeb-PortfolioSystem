
<?php 
    header('Content-Type: application/json');

    require_once 'db.php';

    $sqlQuery = "SELECT semester , yearstd , COUNT(yearstd) as total FROM tb_addstd   GROUP BY semester;";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>