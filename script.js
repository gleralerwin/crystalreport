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

//get NCCC pricetype
function ncccgetPriceType()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data: {function: 'ncccpricetype'},
        success: function(data)
        {
            console.log(data);
            $('#pricetype').empty();
            $('#pricetype').append(data);
        }
    });
}
ncccgetPriceType();

//get RDS pricetype
// function rdsGetPriceType()
// {
//     $.ajax({
//         url: 'ajax.php',
//         type: 'post',
//         dataType: 'text',
//         data: {function: 'rdsPriceType'},
//         success: function(data)
//         {
//             console.log(data);
//             $('#rds_pricetype').empty();
//             $('#rds_pricetype').append(data);
//         }
//     });
// }
// rdsGetPriceType();

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

//sm sku list
function sm_list()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'smlist'},
        beforeSend: function()
        {
            $("#sm_loader").show();
        },
        complete: function()
        {
            $("#sm_loader").hide();
        },
        success: function(data)
        {
            // console.log(data);
            $('#sm_default_list').empty();
            $('#sm_default_list').append(data);
        }
    });
}
sm_list();

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

//export rds MD skulist
function Rds_MdExport()
{
    var retVal = confirm("Want To Download in Excel (MD) ?");
    if( retVal == true ) {
        window.location.href = './reports/rds_md_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'rds.php';
       return false;
    }    
}

//export SM REG skulist
function sm_RegExport()
{
    var retVal = confirm("Want To Download in Excel (REG) ?");
    if( retVal == true ) {
        window.location.href = './reports/sm_reg_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'sm.php';
       return false;
    }    
}

//export SM MD skulist
function sm_MdExport()
{
    var retVal = confirm("Want To Download in Excel (MD) ?");
    if( retVal == true ) {
        window.location.href = './reports/sm_md_skulist_excel.php';
       return true;
    }
    else {
       window.location.href = 'sm.php';
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
            console.log(data);
            // $('#ncccsearch').toggle('fast');
            $('#brand').empty();
            $('#brand').append(data);
        }
    });
}
ncccGetBrandName();

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
    let brand = $('#brand').val();
    let styleno = $('#styleno').val();
    let pricetype = $('#pricetype').val();
   
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brand:brand,
            styleno:styleno,
            pricetype:pricetype,
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
            $('#nccc_list').hide();
            $('#nccc_search').show();
            $('#nccc_search').empty();
            $('#nccc_search').append(data);
            
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
            $('#brandname').empty();
            $('#brandname').append(data);
        }
    });
}
rdssearch();

//nccc search
function rdsSearch()
{
    let brandname = $('#brandname').val();
    let styleno = $('#styleno').val();
    let rds_pricetype = $('#rds_pricetype').val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brandname:brandname,
            styleno:styleno,
            rds_pricetype:rds_pricetype,
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
            $('#rdslist').hide();
            $('#rds_searchlist').show();
            $('#rds_searchlist').empty();
            $('#rds_searchlist').append(data);
        }
    });
}

//sm search
function smSearch()
{
    let brandname = $('#brandname').val();
    let styleno = $('#styleno').val();
    let pricetype = $('#pricetype').val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            brandname:brandname,
            styleno:styleno,
            pricetype:pricetype,
            function: 'smSaveSearch'
        },
        beforeSend: function()
        {
            $("#sm_searchloader").show();
        },
        complete: function()
        {
            $("#sm_searchloader").hide();
        },
        success:function(data)
        {
            // console.log(data);

            if(pricetype == 'REG')
            {
                $('#sm_default_list').hide();
                $('#sm_defaultlist').hide();

                $('#display_sm_reglist').show();
                $('#sm_reglist').show();

                $('#display_sm_reglist').empty();
                $('#display_sm_reglist').append(data);
            }
            if(pricetype == 'MD')
            {
                $('#sm_default_list').hide();
                $('#sm_defaultlist').hide();

                $('#display_sm_mdlist').show();
                $('#sm_mdlist').show();

                $('#display_sm_mdlist').empty();
                $('#display_sm_mdlist').append(data);
            }
        }
    });
}

//get sm branchname
function sm_getBrandName()
{
    $.ajax({    
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'smBrandName'},
        success: function(data)
        {
            console.log(data);
            $('#sm_brandname').empty();
            $('#sm_brandname').append(data);
        }

    });
}
sm_getBrandName();

