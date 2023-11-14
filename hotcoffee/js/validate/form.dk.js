function validatePassword() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("pass_nl").value;

    if (password != confirmPassword) {
        alert("Mật khẩu không khớp. Vui lòng nhập lại.");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function() {
const profile = document.querySelector(".profile");
const dropdownMenu = document.querySelector(".dropdown-menu");

profile.addEventListener("click", function() {
    dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
});
});
