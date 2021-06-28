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
            $("#ajaxSpinnerContainer").show();
        },
        success: function(data)
        {
            // console.log(data);
            $('#nccc_list').empty();
            $('#nccc_list').append(data);
            $("#ajaxSpinnerContainer").hide();
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

//filtering   brand
function searchBtn()
{
   $.ajax({
       url: 'ajax.php',
       dataType: 'text',
       success: function(data)
       {
            console.log(data);
            alert('ok');
       }
   });

}