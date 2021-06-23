function fetch_nccc_list()
{   
    $.ajax({ 
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:{function: 'getskulist_ncc'},
        success: function(data)
        {
            console.log(data);
        }
    });
}