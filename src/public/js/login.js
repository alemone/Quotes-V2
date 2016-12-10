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
});
function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    verifyUser(id_token);
    $("#gsignin").hide();
    $("#gsignout").show();
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
        logout();
        location.reload();
    });
}
function verifyUser(id_token) {
    return $.ajax({
        method: "POST",
        url: "/api/login",
        data: {id: id_token}
    });
}
function logout() {
    return $.ajax({
        method: "DELETE",
        url: "/api/login"
    });
}