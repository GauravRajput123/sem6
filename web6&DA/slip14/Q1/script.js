$(document).ready(function() {
    // Fetch teacher names from the server and populate the dropdown
    $.ajax({
        url: 'getTeacherNames.php',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, teacher) {
                $('#selectTeacher').append('<option value="' + teacher.tno + '">' + teacher.tname + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    // Handle the change event of the dropdown
    $('#selectTeacher').change(function() {
        var selectedTeacher = $(this).val();
        if (selectedTeacher !== '') {
            $.ajax({
                url: 'getTeacherDetails.php',
                type: 'POST',
                data: { tno: selectedTeacher },
                dataType: 'json',
                success: function(data) {
                    displayTeacherDetails(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            $('#teacherDetails').empty();
        }
    });

    // Function to display teacher details
    function displayTeacherDetails(teacher) {
        var details = '<p>Teacher Number: ' + teacher.tno + '</p>' +
                      '<p>Name: ' + teacher.tname + '</p>' +
                      '<p>Qualification: ' + teacher.qualification + '</p>' +
                      '<p>Salary: $' + teacher.salary + '</p>';
        $('#teacherDetails').html(details);
    }
});
