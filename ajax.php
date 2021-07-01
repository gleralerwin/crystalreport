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
    $brand = $_POST['brand'];
    nccc_desc($brand);
}
elseif($function == 'rdsBrandName')
{
    rdsBrandName();
}
elseif($function == 'rdsSaveSearch')
{
    $brandname = $_POST['brandname'];
    $shortdesc = $_POST['shortdesc'];
    $styleno = $_POST['styleno'];
    $sku = $_POST['sku'];
    rdsSaveSearch($brandname, $shortdesc, $styleno, $sku);
}
elseif($function == 'getDesc')
{
    $getdesc =  $_POST['brand'];
    getDesc($getdesc);
}




//////////////////////////////////////////////////////////////

//fetch nccc sku list
function getskulist_nccc()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT * FROM tblSKU ORDER BY id DESC';
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
                <td>'.$row['EntryDate']->format('Y/m/d').'</td>
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

    $i=1;    
    while($row = sqlsrv_fetch_array($result)){

        $subdeptclass = $row['SubDeptClass'];
        $sku = $row['SKU'];
        $upc = $row['UPC'];
        $mfno = $row['MFno'];
        $styleno = $row['StyleNo'];
        $itemdesc = $row['ItemDesc'];
        $shortdesc = $row['ShortDesc'];
        $brandname = $row['BrandName'];
        $buyercode = $row['BuyerCode'];
        $origprice = $row['OrigPrice'];
        $pricetype = $row['PriceType'];
        $createdate = $row['CreateDate']->format('Y/m/d');
        $irmsname = $row['IRMSName'];
        $vendorcode = $row['VendorCode'];
        
        echo '
            <tr>
            <td>'.$i++.'</td>
            <td>'.$brandname.'</td>
            <td>'.$shortdesc.'</td>
            <td>'.$itemdesc.'</td>
            <td>'.$sku.'</td>
            <td>'.$upc.'</td>
            <td>'. $mfno.'</td>
            <td>'.$styleno.'</td>
            <td>'. $buyercode.'</td>
            <td>'. $origprice.'</td>
            <td>'. $pricetype.'</td>
            <td>'. $createdate.'</td>
            <td>'.$irmsname.'</td>
            <td>'.$vendorcode.'</td>
            <td>'.$subdeptclass.'</td>
            </tr>
        ';
    }
}

//get by brand in tblSKU
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


//NCCC customize search
function ncccsearch($brand, $styleno, $sku)
{
    include './inc/nccc_db.php';
   
    $sql = "SELECT * FROM tblsku WHERE brand LIKE '%$brand%' AND styleno LIKE '%$styleno%' AND sku LIKE '%$sku%' ";
    $result = sqlsrv_query($nccc_conn, $sql);

    // checked brand    
    if($brand)
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
    elseif(isset($styleno) || isset($sku))
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

//get by brand in vwMasterlistREG
function rdsBrandName()
{
    include './inc/rds_db.php';
    $sql = 'SELECT DISTINCT BrandName FROM vwMasterlistREG ORDER BY BrandName ASC';
    $result = sqlsrv_query($rds_conn, $sql);
   
    while($row = sqlsrv_fetch_array($result))
    {
        $brandname = $row['BrandName'];
        echo '<option>'.$brandname.'</option>';
    }
}

// RDS customize search
function rdsSaveSearch($brandname, $shortdesc, $styleno, $sku)
{
    include './inc/rds_db.php';
   
    $sql = "SELECT * FROM vwMasterlistREG WHERE brandname LIKE '%$brandname%' AND shortdesc LIKE '%$shortdesc%' AND styleno LIKE '%$styleno%' AND sku LIKE '%$sku%' ";
    $result = sqlsrv_query($rds_conn, $sql);

    // checked brand    
    if($brandname)
    {
       $i=1;
       while($rowbrandname = sqlsrv_fetch_array($result))
       {
        $subdeptclass = $rowbrandname['SubDeptClass'];
        $sku = $rowbrandname['SKU'];
        $upc = $rowbrandname['UPC'];
        $mfno = $rowbrandname['MFno'];
        $styleno = $rowbrandname['StyleNo'];
        $itemdesc = $rowbrandname['ItemDesc'];
        $shortdesc = $rowbrandname['ShortDesc'];
        $brandname = $rowbrandname['BrandName'];
        $buyercode = $rowbrandname['BuyerCode'];
        $origprice = $rowbrandname['OrigPrice'];
        $pricetype = $rowbrandname['PriceType'];
        $createdate = $rowbrandname['CreateDate']->format('Y/m/d');
        $irmsname = $rowbrandname['IRMSName'];
        $vendorcode = $rowbrandname['VendorCode'];
        
        echo '
        <tr>
        <td>'.$i++.'</td>
        <td>'.$brandname.'</td>
        <td>'.$shortdesc.'</td>
        <td>'.$itemdesc.'</td>
        <td>'.$sku.'</td>
        <td>'.$upc.'</td>
        <td>'. $mfno.'</td>
        <td>'.$styleno.'</td>
        <td>'. $buyercode.'</td>
        <td>'. $origprice.'</td>
        <td>'. $pricetype.'</td>
        <td>'. $createdate.'</td>
        <td>'.$irmsname.'</td>
        <td>'.$vendorcode.'</td>
        <td>'.$subdeptclass.'</td>
        </tr>
        ';
       }
    }
    elseif(isset($styleno) || isset($sku))
    {
        $i=1;
        while($rowstyleno = sqlsrv_fetch_array($result))
       {
        $subdeptclass = $rowbrandname['SubDeptClass'];
        $sku = $rowbrandname['SKU'];
        $upc = $rowbrandname['UPC'];
        $mfno = $rowbrandname['MFno'];
        $styleno = $rowbrandname['StyleNo'];
        $itemdesc = $rowbrandname['ItemDesc'];
        $shortdesc = $rowbrandname['ShortDesc'];
        $brandname = $rowbrandname['BrandName'];
        $buyercode = $rowbrandname['BuyerCode'];
        $origprice = $rowbrandname['OrigPrice'];
        $pricetype = $rowbrandname['PriceType'];
        $createdate = $rowbrandname['CreateDate']->format('Y/m/d');
        $irmsname = $rowbrandname['IRMSName'];
        $vendorcode = $rowbrandname['VendorCode'];

        echo '
        <tr>
        <td>'.$i++.'</td>
        <td>'.$brandname.'</td>
        <td>'.$shortdesc.'</td>
        <td>'.$itemdesc.'</td>
        <td>'.$sku.'</td>
        <td>'.$upc.'</td>
        <td>'. $mfno.'</td>
        <td>'.$styleno.'</td>
        <td>'. $buyercode.'</td>
        <td>'. $origprice.'</td>
        <td>'. $pricetype.'</td>
        <td>'. $createdate.'</td>
        <td>'.$irmsname.'</td>
        <td>'.$vendorcode.'</td>
        <td>'.$subdeptclass.'</td>
        </tr>
        ';
       }
    } 
    else {
        echo "No Data Match !!!";
    }

}

function getDesc($getdesc)
{
    include './inc/nccc_db.php';
   
    $sql = "SELECT id FROM tblsku WHERE brand='.$getdesc.' ";
    $result = sqlsrv_query($nccc_conn, $sql);
    $checkResult = sqlsrv_fetch_array($result);

    echo $result;

}

?>