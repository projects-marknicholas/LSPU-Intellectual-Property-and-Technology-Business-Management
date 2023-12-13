$(document).ready(function(){
    // Define a function to fetch technologies
    function fetchTechnologies() {
        $.ajax({
            url: '../access/admin/display-inventor',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    // Clear the existing table rows
                    $('#body').empty();

                    // Iterate through the technologies and append them to the table
                    $.each(data.message, function(index, row) {
                        $('#body').append('<tr>' +
                            '<td>' + row.branch + '</td>' +
                            '<td>' + row.technology + '</td>' +
                            '<td>' + row.inventor + '</td>' + // Render as HTML
                            '<td><span class="tech-invent-status status-' + row.status.toLowerCase().replace(/\s/g, '') + '">' + row.status + '</span></td>' +
                            '<td><div><a href="view-technology?tech_id=' + row.id + '" class="edit"><img src="../assets/svg/edit.svg"></a><a href="#" data-id="' + row.id + '" class="delete"><img src="../assets/svg/delete.svg"></a></div></td>' +
                            '</tr>');
                    });

                    // Display the table
                    $('#no-data').toggle(data.message.length === 0);
                    $('#table').toggle(data.message.length > 0);
                } else {
                    // Display a message if no technologies are found
                    $('#no-data').show();
                    $('#table').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching technologies:', error);
            }
        });
    }

    // Function to handle technology deletion
    function deleteTechnology(id) {
        $.ajax({
            url: '../access/admin/delete-technology',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                // Check if the deletion was successful
                if (data.status === 'success') {
                    // Remove the deleted technology from the table
                    $('#body').find('tr[data-id="' + id + '"]').remove();
                    console.log('Technology deleted successfully.');
                    fetchTechnologies();
                } else {
                    console.error('Error deleting technology:', data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error deleting technology:', error);
            }
        });
    }

    // Event listener for delete button click
    $('#body').on('click', '.delete', function() {
        var technologyId = $(this).data('id');
        if (confirm('Are you sure you want to delete this technology?')) {
            deleteTechnology(technologyId);
            fetchTechnologies();
        }
    });

    fetchTechnologies();
    setInterval(fetchTechnologies, 30000);
});
