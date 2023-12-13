$(document).ready(function(){
    function fetchTechnologies() {
        $.ajax({
            url: '../access/admin/display-technology',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    $('#body').empty();

                    $.each(data.message, function(index, row) {
                        $('#body').append('<tr>' +
                            '<td>' + row.year + '</td>' +
                            '<td>' + row.title + '</td>' +
                            '<td><div><a href="view-technology?tech_id=' + row.id + '" class="view"><img src="../assets/svg/view.svg"></a></div></td>' +
                            '</tr>');
                    });

                    $('#no-data').hide();
                    $('#table').show();
                } else {
                    $('#no-data').show();
                    $('#table').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching technologies:', error);
            }
        });
    }

    fetchTechnologies();
    setInterval(fetchTechnologies, 30000);
});