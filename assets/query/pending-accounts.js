function refreshData() {
        fetchData(refreshData);
    }    
    
    fetchData();

    function fetchData(callback) {
        $.ajax({
            url: '../access/admin/display-pending-accounts',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var data = response.data;
                    var tableBody = $('#table-body');

                    tableBody.empty();

                    $.each(data, function(index, row) {
                        var newRow = '<tr>' +
                            '<td><img src="../access/' + row.profile_photo + '"></td>' +
                            '<td>' + row.full_name + '</td>' +
                            '<td>' + row.email + '</td>' +
                            '<td>' + row.role + '</td>' +
                            '<td>' + row.branch + '</td>' +
                            '<td><div><a href="../access/admin/accept-account?aid=' + row.id + ' " class="edit accept"><img src="../assets/svg/accept.svg"></a><a href="../access/admin/decline-account?aid=' + row.id + ' " class="delete"><img src="../assets/svg/decline.svg"></a></div></td>' +
                            '</tr>';

                        tableBody.append(newRow);
                    });

                    $('#no-data').hide(); 
                } else {
                    $('#table-body').empty(); 
                    $('#no-data').show(); 
                }
                
                // Call the callback function if provided
                if (typeof callback === 'function') {
                    callback();
                }
            },
            error: function() {
                console.log('Error fetching data');
                fetchData();
            }
        });
    }

    function searchTable() {
        isSearch = true;
        let input, filter, table, tbody, tr, td, i, j, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tbody = table.getElementsByTagName("tbody")[0]; 
        tr = tbody.getElementsByTagName("tr");
        let noDataMessage = document.getElementById("no-data");
        let hasData = false;

        for (i = 0; i < tr.length; i++) {
            let rowDisplay = false;

            td = tr[i].getElementsByTagName("td");

            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rowDisplay = true;
                    break; 
                }
            }

            if (rowDisplay) {
                tr[i].style.display = "";
                hasData = true;
            } else {
                tr[i].style.display = "none";
            }
        }

        if (!hasData) {
            tbody.style.display = "none"; 
            noDataMessage.style.display = "block";
        } else {
            tbody.style.display = ""; 
            noDataMessage.style.display = "none";
        }
        isSearch = false;
    }

    function showEntries() {
        let selectedValue = document.getElementById("entries").value;
        let table = document.getElementById("table");
        let tr = table.getElementsByTagName("tr");
        let th = document.getElementById("table-head").getElementsByTagName("th");

        if (selectedValue === "all") {
            for (let i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
            }
        } else {
            for (let i = 0; i < tr.length; i++) {
                if (i === 0 || i > selectedValue) {
                    tr[i].style.display = "none";
                } else {
                    tr[i].style.display = "";
                }
            }
        }

        // Show all table headers
        for (let i = 0; i < th.length; i++) {
            th[i].style.display = "";
        }
    }

$(document).ready(function() {
    $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var deleteLink = $(this).attr('href');
        var deleteButton = $(this);

        deleteButton.prop('disabled', true);

        $.ajax({
            url: deleteLink,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#validation').html('<div class="fading-handler success-handle"><img src="../assets/svg/success.svg"><span class="success">' + response.message + '</span></div>');
                    // Remove the deleted row from the table
                    deleteButton.closest('tr').remove();
                } else {
                    $('#validation').html('<div class="fading-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">Error deleting account:' + response.message +'</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#validation').html('<div class="fading-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">Error deleting account. Please try again later.</span></div>');
            },
            complete: function() {
                deleteButton.prop('disabled', false);
            }
        });
    });

    $(document).on('click', '.accept', function(event) {
        event.preventDefault();
        var acceptLink = $(this).attr('href');
        var acceptButton = $(this);

        acceptButton.prop('disabled', true);

        $.ajax({
            url: acceptLink,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#validation').html('<div class="fading-handler success-handle"><img src="../assets/svg/success.svg"><span class="success">' + response.message + '</span></div>');
                    // Remove the accepted row from the table
                    acceptButton.closest('tr').remove();
                } else {
                    $('#validation').html('<div class="fading-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">Error accepting account:' + response.message +'</span></div>');
                }
            },
            error: function(xhr, status, error) {
                $('#validation').html('<div class="fading-handler error-handle"><img src="../assets/svg/error.svg"><span class="danger">Error accepting account. Please try again later.</span></div>');
            },
            complete: function() {
                acceptButton.prop('disabled', false);
            }
        });
    });
});