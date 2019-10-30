$('#sidebar-left').unbind('click').click(function(e){
    e.preventDefault();
    e.stopPropagation();

    // please provide the URL of the PHP page
    var url = 'generatelist.html';

    $.post(url,
        function(data) {
            if ('' !== data) {
                // here data is the content of the whole php page
                // Inner HTML for php page content
                $('.loadpage').empty().html(data);
            }
        }
    );
});