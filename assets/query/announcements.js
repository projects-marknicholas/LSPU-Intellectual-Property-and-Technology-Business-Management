$(document).ready(function(){
    // Define a function to fetch announcements
    function fetchAnnouncements() {
        $.ajax({
            url: '../access/admin/display-announcements',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    // Clear the existing table rows
                    $('#body').empty();

                    // Iterate through the announcements and append them to the table
                    $.each(data.message, function(index, announcement) {
                        $('#body').append('<tr>' +
                            '<td><img src="../access/files/announcements/' + announcement.banner_img + '" alt="Announcement Image"></td>' +
                            '<td>' + announcement.title + '</td>' +
                            '<td>' + announcement.to + '</td>' +
                            '<td><div><a href="" class="delete"><img src="../assets/svg/delete.svg"></a></div></td>' +
                            '</tr>');
                    });

                    // Display the table
                    $('#no-data').hide();
                    $('#table').show();
                } else {
                    // Display a message if no announcements are found
                    $('#no-data').show();
                    $('#table').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching announcements:', error);
            }
        });
    }

    fetchAnnouncements();
    setInterval(fetchAnnouncements, 30000);
});