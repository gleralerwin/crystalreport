//nccc sku list
function fetch_nccc_list()
{ 
    $.ajax({ 
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'getskulist_nccc'},
        beforeSend: function()
        {
            $("#nccc_loader").show();
        },
        complete: function()
        {
            $("#nccc_loader").hide();
        },
        success: function(data)
        {
            // console.log(data);
            $('#nccc_list').empty();
            $('#nccc_list').append(data);
        }
    });
}
fetch_nccc_list();

//rds sku list
function fetch_rdslist()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'rdsSkuList'},
        beforeSend: function()
        {
            $("#rds_loader").show();
        },
        complete: function()
        {
            $("#rds_loader").hide();
        },
        success: function(data)
        {
            // console.log(data);
            $('#rdslist').empty();
            $('#rdslist').append(data);
        }
    });
}
fetch_rdslist();

//export nccc REG skulist
function Nccc_RegExport()
{
    var retVal = confirm("Want To Download in Excel (REG) ?");
    if( retVal == true ) {
       window.location.href = './reports/nccc_reg_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'nccc.php';
       return false;
    }    
}

//export nccc MD skulist
function Nccc_MdExport()
{
    var retVal = confirm("Want To Download in Excel (MD) ?");
    if( retVal == true ) {
        window.location.href = './reports/nccc_md_skulist_excel.php'; 
       return true;
    }
    else {
       window.location.href = 'nccc.php';
       return false;
    }    
}

//export rds REG skulist
function Rds_RegExport()
{
    var retVal = confirm("Want To Download in Excel (REG) ?");
    if( retVal == true ) {
        window.location.href = './reports/rds_reg_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'rds.php';
       return false;
    }    
}

//export rds REG skulist
function Rds_MdExport()
{
    var retVal = confirm("Want To Download in Excel (REG) ?");
    if( retVal == true ) {
        window.location.href = './reports/rds_md_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'rds.php';
       return false;
    }    
}

//NCCC get brand name
function ncccGetBrandName()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'ncccBrandName'},
        success: function(data)
        {
            // console.log(data);
            $('#ncccsearch').toggle('slow');
            $('#brand').empty();
            $('#brand').append(data);
        }
    });
}

//nccc description
function ncccdesc()
{
    // var brandname = $('#brand').val();
    var brandname = document.getElementById().value;
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brandname:brandname,
            function: 'nccc_desc'
        },
        success: function(data)
        {
            console.log();
            $('#display').empty();
            $('#display').append(data);
        }
    });
}
ncccdesc();

//nccc search
function ncccSearch()
{
    var brand = $('#brand').val();
    var styleno = $('#styleno').val();
    var sku = $('#sku').val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brand:brand,
            styleno:styleno,
            sku:sku,
            function: 'ncccsearch'
        },
        success:function(data)
        {
            console.log(data);
            $('#test').empty();
            $('#test').append(data);
        }
    });
}

