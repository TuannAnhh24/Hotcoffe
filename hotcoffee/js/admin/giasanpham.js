function updatePrices() {
    var giaGocInput = document.getElementById('gia_Goc');
    var giaKmInput = document.getElementById('gia_Km');

    var giaGoc = parseFloat(giaGocInput.value);

    // Các bước tính toán giá khác
    var giaKm = giaGoc * 0.9;


    giaKmInput.value = giaKm.toFixed(2);

}

document.addEventListener('DOMContentLoaded', function() {
    var giaGocInput = document.getElementById('gia_Goc');
    var discountCheckbox = document.getElementById('discountCheckbox');
    var giaKmInput = document.getElementById('gia_Km');

    // Khi giá gốc thay đổi, gọi hàm updatePrices
    giaGocInput.addEventListener('input', function() {
        updatePrices();
    });

    // Khi ô kiểm thay đổi
    discountCheckbox.addEventListener('change', function() {
        // Nếu ô kiểm được đánh dấu, đặt giá trị của ô nhập liệu giá khuyến mãi là 0, ngược lại là rỗng
        giaKmInput.value = discountCheckbox.checked ? '0' : '';
    });
});