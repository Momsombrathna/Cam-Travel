function ShowPassword() {
    var x = document.getElementById("MyPassword");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    };
    var y = document.getElementById("MyConfirmPassword");
    if (y.type === "password") {
    y.type = "text";
    } else {
    y.type = "password";
    };
}

