$(document).ready(function() {
    $.ajax({
        url: 'books.xml',
        dataType: 'xml',
        success: function(xml) {
            $(xml).find('book').each(function() {
                var title = $(this).find('title').text();
                $('#selectBook').append('<option value="' + title + '">' + title + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    $('#selectBook').change(function() {
        var selectedBook = $(this).val();
        $.ajax({
            url: 'getBookDetails.php',
            type: 'POST',
            data: { bookTitle: selectedBook },
            dataType: 'html',
            success: function(response) {
                $('#bookDetails').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
