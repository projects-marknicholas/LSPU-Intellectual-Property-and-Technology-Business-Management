$(document).ready(function() {
    var isSearch = false;

    function refreshData() {
        fetchData(refreshData);
    }    
    
    fetchData();

    function fetchData(callback) {
        $.ajax({
            url: '../access/admin/display-active-accounts',
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
});