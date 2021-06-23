<?php

$function = $_POST['function'];

if($function == 'getskulist_nccc')
{
    getskulist_nccc();
}

//////////////////////////////////////////////////////////////

function getskulist_nccc()
{
    include 'DB.php';
    $sql = 'SELECT * FROM tblSKU';
    $result = sqlsrv_query($nccc_conn, $sql);

    while($row = sqlsrv_fetch_array($result)){
        echo '
            <tr>
                <td>'.$row['Brand'].'</td>
                <td>'.$row['Descrip'].'</td>
                <td>'.$row['SizeSet'].'</td>
                <td>'.$row['StyleNo'].'</td>
                <td>'.$row['BuyerCode'].'</td>
                <td>'.$row['SKUType'].'</td>
                <td>'.$row['VendorCode'].'</td>
                <td>'.$row['SRP'].'</td>
                <td>'.$row['UPC'].'</td>
                <td>'.$row['UoM'].'</td>
                <td>'.$row['SKU'].'</td>
                <td>'.$row['Dept'].'</td>
                <td>'.$row['SubDept'].'</td>
                <td>'.$row['Class'].'</td>
                <td>'.$row['SubClass'].'</td>
                <td>'.$row['PriceType'].'</td>
            </tr>
        ';
    }
}


?>