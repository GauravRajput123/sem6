$(document).ready(function() {
    $("#searchInput").keyup(function() {
        var query = $(this).val();
        if (query !== '') {
            $.ajax({
                url: 'suggestions.php',
                type: 'POST',
                data: { query: query },
                dataType: 'json',
                success: function(response) {
                    displaySuggestions(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            $("#suggestions").empty();
        }
    });
});

function displaySuggestions(suggestions) {
    var suggestionList = "<ul>";
    suggestions.forEach(function(suggestion) {
        suggestionList += "<li>" + suggestion + "</li>";
    });
    suggestionList += "</ul>";
    $("#suggestions").html(suggestionList);
}
