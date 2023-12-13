function fetchProfilePhoto(callback) {
    $.ajax({
        url: '../access/admin/display-profile-photo',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                var profilePhoto = response.data.profile_photo;

                // Update profile photo
                $('#profile-photo').attr('src', '../access/' + profilePhoto);

                // Update full name
                $('#full-name').text(response.data.first_name + ' ' + response.data.last_name);

                // Call the callback function if provided
                if (typeof callback === 'function') {
                    callback();
                }
            }
        },
        error: function() {
            console.log('Error fetching profile photo');
        }
    });
}

// Function to fetch profile photo with minimal delay
function fetchProfileWithoutDelay() {
    fetchProfilePhoto(function() {
        setTimeout(fetchProfileWithoutDelay, 3000);
    });
}

// Initial call
fetchProfileWithoutDelay();
