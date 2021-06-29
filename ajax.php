<?php
$function = $_POST['function'];
if($function == 'getskulist_nccc')
{
    getskulist_nccc();
}
elseif($function == 'rdsSkuList')
{
    rdsSkuList();
}
elseif($function == 'NcccBrandName')
{
    NcccBrandName();
}
elseif($function == 'ncccsearch')
{
    $brand = $_POST['brand'];
    $styleno = $_POST['styleno'];
    $sku = $_POST['sku'];
    $vendorcode = $_POST['vendorcode'];
    ncccsearch($brand, $styleno, $sku, $vendorcode);
}


//////////////////////////////////////////////////////////////

//fetch nccc sku list
function getskulist_nccc()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT * FROM tblSKU ORDER BY id ASC';
    $result = sqlsrv_query($nccc_conn, $sql);

    $i=1;
    while($row = sqlsrv_fetch_array($result)){
        echo '
            <tr>
                <td>'.$i++.'</td>
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

//fetch rds sku list
function rdsSkuList()
{
    include './inc/rds_db.php';
    $sql = 'SELECT * FROM vwMasterlistREG';
    $result = sqlsrv_query($rds_conn, $sql);

    while($row = sqlsrv_fetch_array($result)){
        echo '
            <tr>
                <td>'.$row['SubDeptClass'].'</td>
                <td>'.$row['SKU'].'</td>
                <td>'.$row['UPC'].'</td>
                <td>'.$row['MFno'].'</td>
                <td>'.$row['StyleNo'].'</td>
                <td>'.$row['ItemDesc'].'</td>
                <td>'.$row['ShortDesc'].'</td>
                <td>'.$row['BrandName'].'</td>
                <td>'.$row['BuyerCode'].'</td>
                <td>'.$row['OrigPrice'].'</td>
                <td>'.$row['PriceType'].'</td>
                <td>'.$row['IRMSName'].'</td>
                <td>'.$row['VendorCode'].'</td>
            </tr>
        ';
    }
}

//search by brand
function NcccBrandName()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT DISTINCT brand FROM tblsku ORDER BY brand';
    $result = sqlsrv_query($nccc_conn, $sql);
   
    while($row = sqlsrv_fetch_array($result))
    {
        $id = $row['id'];
        $brand = $row['brand'];
        echo '<option value='.$id.'>'.$brand.'</option>';
    }
}

function ncccsearch($brand, $styleno, $sku, $vendorcode)
{
    include './inc/nccc_db.php';
    $sql = 'SELECT * FROM tblsku WHERE brand='.$brand.' AND styleno='.$styleno.' AND sku='.$sku.' AND vendorcode='.$vendorcode.'  ';
    $result = sqlsrv_query($nccc_conn, $sql);

    while($row = sqlsrv_fetch_array($result))
    {
        echo $row['brand'];
    }
}

?>