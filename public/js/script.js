$(document).ready(function(){
    $('.edit-genre-btn').click(function(){
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        alert(id);
    });

    $('.delete-genre-btn').click(function(){
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        alert(id);
    });
});
