function fetch_nccc_list()
{   
    $.ajax({ 
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{function: 'getskulist_nccc'},
        success: function(data)
        {
            console.log(data);
            $('#displaysku').empty();
            $('#displaysku').append(data);
        }
    });
}
fetch_nccc_list();