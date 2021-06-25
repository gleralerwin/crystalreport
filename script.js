//nccc sku list
function fetch_nccc_list()
{ 
    $.ajax({ 
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'getskulist_nccc'},
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
        success: function(data)
        {
            // console.log(data);
            $('#rdslist').empty();
            $('#rdslist').append(data);
        }
    });
}
fetch_rdslist();

//export nccc MD skulist
function Nccc_MdExport()
{
    window.location.href = './reports/nccc_md_skulist_excel.php';
}

//export nccc REG skulist
function Nccc_RegExport()
{
    window.location.href = './reports/nccc_reg_skulist_excel.php';
}

//export rds REG skulist
function Rds_RegExport()
{
    window.location.href = './reports/rds_reg_skulist_excel.php';
}

//export rds REG skulist
function Rds_MdExport()
{
    window.location.href = './reports/rds_md_skulist_excel.php';
}