$(document).ready(function() {
    // Fetch employee names from the server and populate the dropdown
    $.ajax({
        url: 'getEmployeeNames.php',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, employee) {
                $('#selectEmployee').append('<option value="' + employee.eno + '">' + employee.ename + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    // Handle the change event of the dropdown
    $('#selectEmployee').change(function() {
        var selectedEmployee = $(this).val();
        if (selectedEmployee !== '') {
            $.ajax({
                url: 'getEmployeeDetails.php',
                type: 'POST',
                data: { eno: selectedEmployee },
                dataType: 'json',
                success: function(data) {
                    displayEmployeeDetails(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            $('#employeeDetails').empty();
        }
    });

    // Function to display employee details
    function displayEmployeeDetails(employee) {
        var details = '<p>Employee Number: ' + employee.eno + '</p>' +
                      '<p>Name: ' + employee.ename + '</p>' +
                      '<p>Designation: ' + employee.designation + '</p>' +
                      '<p>Salary: $' + employee.salary + '</p>';
        $('#employeeDetails').html(details);
    }
});
