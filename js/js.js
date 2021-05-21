function myFunction() {
    var x = document.getElementsByid("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
