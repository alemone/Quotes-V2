/**
 * Created by Ammonix on 06.12.2016.
 */

var quote = {
    id: "",
    content: "",
    date: "",
    author: ""
};
var author = {
    id: "",
    thumbnail: "",
    name: ""
};
$(function () {
    $('select').material_select();
    $("#createQuoteButton").on("click", function () {
        var content = $("#quoteContent").val();
        var id = $("#quoteAuthor").val();
        var date = $("#quoteDate").val();
        author.id = id;
        quote.content = content;
        quote.date = date;
        quote.author = author;
        $.when(postQuote(quote)).done(function (response) {
            window.location.replace("/");
        });
    });
});
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});

function postQuote(quote) {
    return $.ajax({
        method: "POST",
        url: "/api/quotes",
        data: quote
    });
}