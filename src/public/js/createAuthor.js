/**
 * Created by Ammonix on 06.12.2016.
 */
var author = {
    id: "",
    thumbnail: "",
    name: "",
    file: ""
};
$(function () {
    $("#createAuthorButton").on("click", function () {
        author.name = $("#authorName").val();
        var data = new FormData();
        data.append("thumbnail", author.file);
        data.append("name", author.name);
        $.when(postAuthor(data)).done(function (response) {
            window.location.replace("/");
        });
    });
    $("#authorThumbnailInput").change(function () {
        author.file = readURL(this);
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#authorThumbnail').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        return input.files[0];
    }
}

function postAuthor(author) {
    return $.ajax({
        method: "POST",
        url: "/api/authors",
        data: author,
        cache: false,
        contentType: false,
        processData: false
    });
}