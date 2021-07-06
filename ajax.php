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
elseif($function == 'ncccpricetype')
{
    ncccpricetype();
}
elseif($function == 'ncccsearch')
{
    $brand = $_POST['brand'];
    $styleno = $_POST['styleno'];
    $pricetype = $_POST['pricetype'];
    ncccsearch($brand, $styleno, $pricetype);
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
    $styleno = $_POST['styleno'];
    $rds_pricetype = $_POST['rds_pricetype'];
    rdsSaveSearch($brandname, $styleno, $rds_pricetype);
}
elseif($function == 'getDesc')
{
    $getdesc =  $_POST['brand'];
    getDesc($getdesc);
}
elseif($function == 'smlist')
{
    smlist();
}
elseif($function == 'smSaveSearch')
{
    $brandname = $_POST['brandname'];
    $styleno = $_POST['styleno'];
    $pricetype = $_POST['pricetype'];
    smSaveSearch($brandname, $styleno, $pricetype);
}
elseif($function == 'smBrandName')
{
    smBrandName();
}
// elseif($function == 'rdsPriceType')
// {
//     rdsPriceType();
// }



//////////////////////////////////////////////////////////////

//fetch nccc sku list
function getskulist_nccc()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT * FROM tblSKU ORDER BY Brand ASC';
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

//nccc pricetype
function ncccpricetype()
{
    include './inc/nccc_db.php';
    $sql = 'SELECT DISTINCT(PriceType) FROM tblsku ORDER BY PriceType DESC';
    $result = sqlsrv_query($nccc_conn, $sql);
   
    while($row = sqlsrv_fetch_array($result))
    {
        $pricetype = $row['PriceType'];
        echo '<option>'.$pricetype.'</option>';
    }
}

//rds pricetype
// function rdsPriceType()
// {
//     include './inc/rds_db.php';
//     $sql = 'SELECT pricetype FROM vwMasterlistREG JOIN vwMasterlistMD ON vwMasterlistREG.SubDeptClass = vwMasterlistMD.SubDeptClass';

//     // $sql = 'SELECT distinct(PriceType) from vwMasterlistREG';

//     $result = sqlsrv_query($rds_conn, $sql);
   
//     while($row = sqlsrv_fetch_array($result))
//     {
//         $rdspricetype = $row['pricetype'];
//         echo '<option>'.$rdspricetype.'</option>';
//     }

// }

//fetch rds sku list
function rdsSkuList()
{
    include './inc/rds_db.php';
    $sql = 'SELECT * FROM vwMasterlistREG ORDER BY BrandName ASC';
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

//get sm skulist
function smlist()
{
    include './inc/sm_db.php';
    $sql = 'SELECT * FROM vwSMitems ORDER BY BrandName ASC';
    $result = sqlsrv_query($sm_conn, $sql);

    $i=1;    
    while($row = sqlsrv_fetch_array($result)){

        $vend_code = $row['vend_code'];
        $reg = $row['REG'];
        $md = $row['MD'];
        $cost = $row['Cost'];
        $brandname = $row['BrandName'];
        $ap_type = $row['AP_Type'];
        $dept = $row['dept'];
        $subdept = $row['subdept'];
        $class = $row['class'];
        $subclass = $row['subclass'];
        $styleno  = $row['styleno'];
        $skutype = $row['SKUtype'];
        $insku = $row['inSKU'];
        $stylesize = $row['StyleSize'];
        $sm_upc = $row['sm_upc'];
        $vendor_upc = $row['vendor_upc'];
        $stkcode = $row['stk_code'];
        $stylecolor = $row['StyleColor'];
        $entrydate = $row['EntryDate']->format('Y/m/d');
        $category = $row['Category'];
        $styledesc = $row['StyleDesc'];
        $brandcode = $row['brand_code'];
        $stkdesc = $row['stk_desc'];

        echo '
            <tr>
            <td>Main</td>
            <td>'.$i++.'</td>
            <td>'.$vend_code.'</td>
            <td>'.$reg.'</td>
            <td>'.$md.'</td>
            <td>'.$cost.'</td>
            <td>'.$brandname.'</td>
            <td>'.$ap_type.'</td>
            <td>'.$dept.'</td>
            <td>'.$subdept.'</td>
            <td>'.$class.'</td>
            <td>'.$subclass.'</td>
            <td>'.$styleno.'</td>
            <td>'.$skutype.'</td>
            <td>'.$insku.'</td>
            <td>'.$stylesize.'</td>
            <td>'.$sm_upc.'</td>
            <td>'.$vendor_upc.'</td>
            <td>'.$stkcode.'</td>
            <td>'.$stylecolor.'</td>
            <td>'.$entrydate.'</td>
            <td>'.$category.'</td>   
            <td>'.$styledesc.'</td>
            <td>'.$brandcode.'</td>
            <td>'.$stkdesc.'</td>
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
function ncccsearch($brand, $styleno, $pricetype)
{
    include './inc/nccc_db.php';
   
    $sql = "SELECT * FROM tblsku WHERE brand LIKE '%$brand%' AND styleno LIKE '%$styleno%' AND pricetype LIKE '%$pricetype%' ";
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
    elseif(isset($styleno))
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
    elseif(isset($pricetype)) 
    {
        $i=1;
        while($rowpricetype = sqlsrv_fetch_array($result))
       {
        $brand = $rowpricetype['Brand'];
        $desc = $rowpricetype['Descrip'];
        $sizeset = $rowpricetype['SizeSet'];
        $styleno = $rowpricetype['StyleNo'];
        $buyercode = $rowpricetype['BuyerCode'];
        $skutype = $rowpricetype['SKUType'];
        $vendorcode = $rowpricetype['VendorCode'];
        $srp = $rowpricetype['SRP'];
        $upc = $rowpricetype['UPC'];
        $uom = $rowpricetype['UoM'];
        $sku = $rowpricetype['SKU'];
        $dept = $rowpricetype['Dept'];
        $subdept = $rowpricetype['SubDept'];
        $class = $rowpricetype['Class'];
        $subclass = $rowpricetype['SubClass'];
        $entrydate = $rowpricetype['EntryDate']->format('Y/m/d');
        $pricetype = $rowpricetype['PriceType'];

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
function rdsSaveSearch($brandname, $styleno, $rds_pricetype)
{
    if($rds_pricetype == 'REG')
    {
        include './inc/rds_db.php';
        $sql = "SELECT * FROM vwMasterlistREG WHERE brandname LIKE '%$brandname%' AND styleno LIKE '%$styleno%' AND pricetype LIKE '%$rds_pricetype%' ";
        $result = sqlsrv_query($rds_conn, $sql);

        if(isset($brandname))
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
        elseif(isset($styleno))
        {
            $i=1;
            while($rowstyleno = sqlsrv_fetch_array($result))
           {
            $subdeptclass = $rowstyleno['SubDeptClass'];
            $sku = $rowstyleno['SKU'];
            $upc = $rowstyleno['UPC'];
            $mfno = $rowstyleno['MFno'];
            $styleno = $rowstyleno['StyleNo'];
            $itemdesc = $rowstyleno['ItemDesc'];
            $shortdesc = $rowstyleno['ShortDesc'];
            $brandname = $rowstyleno['BrandName'];
            $buyercode = $rowstyleno['BuyerCode'];
            $origprice = $rowstyleno['OrigPrice'];
            $pricetype = $rowstyleno['PriceType'];
            $createdate = $rowstyleno['CreateDate']->format('Y/m/d');
            $irmsname = $rowstyleno['IRMSName'];
            $vendorcode = $rowstyleno['VendorCode'];
    
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
        elseif(isset($rds_pricetype)) 
        {
            $i=1;
            while($row_rdspricetype = sqlsrv_fetch_array($result))
           {
            $subdeptclass = $row_rdspricetype['SubDeptClass'];
            $sku = $row_rdspricetype['SKU'];
            $upc = $row_rdspricetype['UPC'];
            $mfno = $row_rdspricetype['MFno'];
            $styleno = $row_rdspricetype['StyleNo'];
            $itemdesc = $row_rdspricetype['ItemDesc'];
            $shortdesc = $row_rdspricetype['ShortDesc'];
            $brandname = $row_rdspricetype['BrandName'];
            $buyercode = $row_rdspricetype['BuyerCode'];
            $origprice = $row_rdspricetype['OrigPrice'];
            $pricetype = $row_rdspricetype['PriceType'];
            $createdate = $row_rdspricetype['CreateDate']->format('Y/m/d');
            $irmsname = $row_rdspricetype['IRMSName'];
            $vendorcode = $row_rdspricetype['VendorCode'];
    
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
    }
    elseif($rds_pricetype == 'MD')
    {
        include './inc/rds_db.php';
        $sql = "SELECT * FROM vwMasterlistMD WHERE brandname LIKE '%$brandname%' AND styleno LIKE '%$styleno%' AND pricetype LIKE '%$rds_pricetype%' ";
        $result = sqlsrv_query($rds_conn, $sql);

        if(isset($brandname))
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
        elseif(isset($styleno))
        {
            $i=1;
            while($rowstyleno = sqlsrv_fetch_array($result))
           {
            $subdeptclass = $rowstyleno['SubDeptClass'];
            $sku = $rowstyleno['SKU'];
            $upc = $rowstyleno['UPC'];
            $mfno = $rowstyleno['MFno'];
            $styleno = $rowstyleno['StyleNo'];
            $itemdesc = $rowstyleno['ItemDesc'];
            $shortdesc = $rowstyleno['ShortDesc'];
            $brandname = $rowstyleno['BrandName'];
            $buyercode = $rowstyleno['BuyerCode'];
            $origprice = $rowstyleno['OrigPrice'];
            $pricetype = $rowstyleno['PriceType'];
            $createdate = $rowstyleno['CreateDate']->format('Y/m/d');
            $irmsname = $rowstyleno['IRMSName'];
            $vendorcode = $rowstyleno['VendorCode'];
    
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
        elseif(isset($rds_pricetype)) 
        {
            $i=1;
            while($row_rdspricetype = sqlsrv_fetch_array($result))
           {
            $subdeptclass = $row_rdspricetype['SubDeptClass'];
            $sku = $row_rdspricetype['SKU'];
            $upc = $row_rdspricetype['UPC'];
            $mfno = $row_rdspricetype['MFno'];
            $styleno = $row_rdspricetype['StyleNo'];
            $itemdesc = $row_rdspricetype['ItemDesc'];
            $shortdesc = $row_rdspricetype['ShortDesc'];
            $brandname = $row_rdspricetype['BrandName'];
            $buyercode = $row_rdspricetype['BuyerCode'];
            $origprice = $row_rdspricetype['OrigPrice'];
            $pricetype = $row_rdspricetype['PriceType'];
            $createdate = $row_rdspricetype['CreateDate']->format('Y/m/d');
            $irmsname = $row_rdspricetype['IRMSName'];
            $vendorcode = $row_rdspricetype['VendorCode'];
    
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
    }
}

//sm customize search
function smSaveSearch($brandname, $styleno, $pricetype)
{
    if($pricetype == 'REG')
    {
        include './inc/sm_db.php';
        $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brandname%' AND styleno LIKE '%$styleno%' ";
        $result = sqlsrv_query($sm_conn, $sql);

        if(isset($brandname))
        {
           $i=1;
           while($row = sqlsrv_fetch_array($result))
           {
            $vend_code = $row['vend_code'];
            $reg = $row['REG'];
            $cost = $row['Cost'];
            $brandname = $row['BrandName'];
            $ap_type = $row['AP_Type'];
            $dept = $row['dept'];
            $subdept = $row['subdept'];
            $class = $row['class'];
            $subclass = $row['subclass'];
            $styleno  = $row['styleno'];
            $skutype = $row['SKUtype'];
            $insku = $row['inSKU'];
            $stylesize = $row['StyleSize'];
            $sm_upc = $row['sm_upc'];
            $vendor_upc = $row['vendor_upc'];
            $stkcode = $row['stk_code'];
            $stylecolor = $row['StyleColor'];
            $entrydate = $row['EntryDate']->format('Y/m/d');
            $category = $row['Category'];
            $styledesc = $row['StyleDesc'];
            $brandcode = $row['brand_code'];
            $stkdesc = $row['stk_desc'];
            
            echo '
            <tr>
                <td>'.$i++.'</td>
                <td>'.$brandname.'</td>
                <td>'.$vend_code.'</td>
                <td>'.$dept.'</td>
                <td>'.$subdept.'</td>
                <td>'.$class.'</td>
                <td>'.$subclass.'</td>
                <td>'.$stkcode.'</td>
                <td>'.$sm_upc.'</td>
                <td>'.$styleno.'</td>
                <td>'.$styledesc.'</td>
                <td>'.$stylecolor.'</td>
                <td>'.$stylesize.'</td>
                <td>'.$reg.'</td>
                <td>'.$entrydate.'</td>
            </tr>
            ';
           }
        }
        elseif(isset($styleno))
        {
            $i=1;
            while($row = sqlsrv_fetch_array($result))
            {
             $vend_code = $row['vend_code'];
             $reg = $row['REG'];
             $brandname = $row['BrandName'];
             $ap_type = $row['AP_Type'];
             $dept = $row['dept'];
             $subdept = $row['subdept'];
             $class = $row['class'];
             $subclass = $row['subclass'];
             $styleno  = $row['styleno'];
             $vendor_upc = $row['vendor_upc'];
             $stkcode = $row['stk_code'];
             $styledesc = $row['StyleDesc'];
             $brandcode = $row['brand_code'];

             echo '
             <tr>
                 <td>'.$i++.'</td>
                 <td>'.$vend_code.'</td>
                 <td>'.$dept.'</td>
                 <td>'.$subdept.'</td>
                 <td>'.$class.'</td>
                 <td>'.$subclass.'</td>
                 <td>'.$brandcode.'</td>
                 <td>'.$styledesc.'</td>
                 <td>'.$styleno.'</td>
                 <td>'.$reg.'</td>
                 <td>'.$vendor_upc.'</td>
                 <td>'.$stkcode.'</td>
                 <td>'.$brandname.'</td>
                 <td>'.$ap_type.'</td>
             </tr>
             ';
            }
        }
    }
    elseif($pricetype == 'MD')
    {
           include './inc/sm_db.php';
           $sql = "SELECT * FROM vwSMitems WHERE BrandName LIKE '%$brandname%' AND styleno LIKE '%$styleno%' ";
           $result = sqlsrv_query($sm_conn, $sql);

           $i=1;
           while($row = sqlsrv_fetch_array($result))
           {
            $vend_code = $row['vend_code'];
            $brandname = $row['BrandName'];
            $dept = $row['dept'];
            $subdept = $row['subdept'];
            $class = $row['class'];
            $subclass = $row['subclass'];
            $styleno  = $row['styleno'];
            $reg = $row['REG'];
            $vendor_upc = $row['vendor_upc'];
            $stkcode = $row['stk_code'];
            $brandcode = $row['brand_code'];
            $stkdesc = $row['stk_desc'];
            $sm_upc = $row['sm_upc'];
            $ap_type = $row['AP_Type'];
            
            echo '
            <tr>
                <td>'.$i++.'</td>
                <td>'.$vend_code.'</td>
                <td>'.$dept.'</td>
                <td>'.$subdept.'</td>
                <td>'.$class.'</td>
                <td>'.$subclass.'</td>
                <td>'.$brandcode.'</td>
                <td>'.$stkdesc.'</td>
                <td>'.$styleno.'</td>
                <td>'.$reg.'</td>
                <td>'.$vendor_upc.'</td>
                <td>'.$sm_upc.'</td>
                <td>'.$stkcode.'</td>
                <td>'.$brandname.'</td>
                <td>'.$ap_type.'</td>
            </tr>
            ';
           }
    }
}

//sm get brandname
function smBrandName()
{
    include './inc/sm_db.php';
    $sql = 'SELECT DISTINCT BrandName FROM vwSMitems ORDER BY  BrandName ASC';
    $result = sqlsrv_query($sm_conn, $sql);

    while($row = sqlsrv_fetch_array($result))
    {
        $brandname = $row['BrandName'];
        echo '<option>'.$brandname.'</option>';
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