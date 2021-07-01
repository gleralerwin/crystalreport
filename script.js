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
            $('#nccc_list').show(data);
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
            $('#rdslist').show(data);
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
            $('#ncccsearch').toggle('fast');
            $('#brand').empty();
            $('#brand').append(data);
        }
    });
}

//nccc get description
function ncccGetDesc()
{
    let ncccdesc = $('#brand').val();
    
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            ncccGetDesc:ncccGetDesc,
            function: 'getDesc'
        },
        success: function(data)
        {
            console.log(data);
            document.getElementById('display').innerHTML = data;
        }

    });
}

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
        beforeSend: function()
        {
            $("#nccc_searchloader").show();
        },
        complete: function()
        {
            $("#nccc_searchloader").hide();
        },
        success:function(data)
        {
            // console.log(data);
            $('#nccc_search').empty();
            $('#nccc_search').show(data);
            $('#nccc_search').append(data);
            $('#nccc_list').hide(data);
        }
    });
}

// rds get brand name
function rdssearch()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'rdsBrandName'},
        success: function(data)
        {
            // console.log(data);
            $('#rds_search').toggle('fast');
            $('#brandname').empty();
            $('#brandname').append(data);
        }
    });
}

//nccc search
function rdsSearch()
{
    let brandname = $('#brandname').val();
    let shortdesc = $('#shortdesc').val();
    let styleno = $('#styleno').val();
    let sku = $('#sku').val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brandname:brandname,
            shortdesc:shortdesc,
            styleno:styleno,
            sku:sku,
            function: 'rdsSaveSearch'
        },
        beforeSend: function()
        {
            $("#rds_searchloader").show();
        },
        complete: function()
        {
            $("#rds_searchloader").hide();
        },
        success:function(data)
        {
            // console.log(data);
            $('#rds_searchlist').empty();
            $('#rds_searchlist').show(data);
            $('#rds_searchlist').append(data);
            $('#rdslist').hide(data);
        }
    });
}

