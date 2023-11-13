function validatePassword() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("pass_nl").value;

    if (password != confirmPassword) {
        alert("Mật khẩu không khớp. Vui lòng nhập lại.");
        return false;
    }

    return true;
}
