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
elseif($function == 'ncccBrandName')
{
    ncccBrandName();
}
elseif($function == 'ncccsearch')
{
    $brand = $_POST['brand'];
    $styleno = $_POST['styleno'];
    $sku = $_POST['sku'];
    ncccsearch($brand, $styleno, $sku);
}
elseif($function == 'nccc_desc')
{
    $brandname = $_POST['brand'];
    nccc_desc($brandname);
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

//get by brand
function ncccBrandName()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT DISTINCT brand FROM tblsku ORDER BY brand ASC';
    $result = sqlsrv_query($nccc_conn, $sql);
   
    while($row = sqlsrv_fetch_array($result))
    {
        $brand = $row['brand'];
        echo '<option>'.$brand.'</option>';
    }
}

//get by description
function nccc_desc($brandname)
{
    include './inc/nccc_db.php';
    $sql = 'SELECT * FROM tblsku WHERE brand LIKE '%$brandname%' ';
    $result = sqlsrv_query($nccc_conn, $sql);
    
    while($row = sqlsrv_fetch_array($result))
    {
        $id = $row['id'];
        $brandname = $row['brand'];
        echo '<option value= '.$id.'>'.$brandname.'</option>';
    }
}

//customize search
function ncccsearch($brand, $styleno, $sku)
{
    include './inc/nccc_db.php';
   
    $sql = "SELECT * FROM tblsku WHERE brand LIKE '%$brand%' AND styleno LIKE '%$styleno%' AND sku LIKE '%$sku%' ";
    $result = sqlsrv_query($nccc_conn, $sql);

    // checked brand    
    if($brand == true)
    {
       $i=1;
       while($rowbrand = sqlsrv_fetch_array($result))
       {
        $brand = $rowbrand['Brand'];
        $desc = $rowbrand['Descrip'];
        $sizeset = $rowbrand['SizeSet'];
        $styleno = $rowbrand['StyleNo'];
        $buyercode = $rowbrand['BuyerCode'];
        $skutype = $rowbrand['SKUType'];
        $vendorcode = $rowbrand['VendorCode'];
        $srp = $rowbrand['SRP'];
        $upc = $rowbrand['UPC'];
        $uom = $rowbrand['UoM'];
        $sku = $rowbrand['SKU'];
        $dept = $rowbrand['Dept'];
        $subdept = $rowbrand['SubDept'];
        $class = $rowbrand['Class'];
        $subclass = $rowbrand['SubClass'];
        $entrydate = $rowbrand['EntryDate']->format('Y/m/d');
        $pricetype = $rowbrand['PriceType'];

        echo '
        <tr>
        <td>'.$i++.'</td>
        <td>'.$brand.'</td>
        <td>'.$desc.'</td>
        <td>'.$sizeset.'</td>
        <td>'.$styleno.'</td>
        <td>'.$buyercode.'</td>
        <td>'. $skutype.'</td>
        <td>'.$vendorcode.'</td>
        <td>'. $srp.'</td>
        <td>'. $upc.'</td>
        <td>'. $uom.'</td>
        <td>'. $sku.'</td>
        <td>'.$dept.'</td>
        <td>'.$subdept.'</td>
        <td>'.$class.'</td>
        <td>'.$subclass.'</td>
        <td>'.$entrydate.'</td>
        <td>'.$pricetype.'</td>
        </tr>
        ';
       }
    }
    elseif(isset($styleno) && isset($sku))
    {
        $i=1;
        while($rowstyleno = sqlsrv_fetch_array($result))
       {
        $brand = $rowstyleno['Brand'];
        $desc = $rowstyleno['Descrip'];
        $sizeset = $rowstyleno['SizeSet'];
        $styleno = $rowstyleno['StyleNo'];
        $buyercode = $rowstyleno['BuyerCode'];
        $skutype = $rowstyleno['SKUType'];
        $vendorcode = $rowstyleno['VendorCode'];
        $srp = $rowstyleno['SRP'];
        $upc = $rowstyleno['UPC'];
        $uom = $rowstyleno['UoM'];
        $sku = $rowstyleno['SKU'];
        $dept = $rowstyleno['Dept'];
        $subdept = $rowstyleno['SubDept'];
        $class = $rowstyleno['Class'];
        $subclass = $rowstyleno['SubClass'];
        $entrydate = $rowstyleno['EntryDate']->format('Y/m/d');
        $pricetype = $rowstyleno['PriceType'];

        echo '
        <tr>
        <td>'.$i++.'</td>
        <td>'.$brand.'</td>
        <td>'.$desc.'</td>
        <td>'.$sizeset.'</td>
        <td>'.$styleno.'</td>
        <td>'.$buyercode.'</td>
        <td>'. $skutype.'</td>
        <td>'.$vendorcode.'</td>
        <td>'. $srp.'</td>
        <td>'. $upc.'</td>
        <td>'. $uom.'</td>
        <td>'. $sku.'</td>
        <td>'.$dept.'</td>
        <td>'.$subdept.'</td>
        <td>'.$class.'</td>
        <td>'.$subclass.'</td>
        <td>'.$entrydate.'</td>
        <td>'.$pricetype.'</td>
        </tr>
        ';
       }
    } 
    else {
        echo "No Data Match !!!";
    }

}
?>