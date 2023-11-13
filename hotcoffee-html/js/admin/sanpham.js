function updatePrices() {
    var giaGoc = parseFloat(document.getElementById('gia_Goc').value);
    // Các bước tính toán giá khác
    var giaKm = giaGoc * 0.9;
    var giaM = giaGoc + 5;
    var giaL = giaGoc + 10;
    var giaXl = giaGoc + 15;

    document.getElementById('gia_Km').value = giaKm.toFixed(2);
    document.getElementById('sizeM').value = giaM.toFixed(2);
    document.getElementById('sizeL').value = giaL.toFixed(2);
    document.getElementById('sizeXl').value = giaXl.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt hàm updatePrices khi trang được tải
    updatePrices();

    // Khi giá gốc thay đổi, gọi hàm updatePrices
    document.getElementById('gia_Goc').addEventListener('input', updatePrices);
});


document.addEventListener('DOMContentLoaded', function() {
    var discountCheckbox = document.getElementById('discountCheckbox');
    var giaKmInput = document.getElementById('gia_Km');

    // Khi ô kiểm thay đổi
    discountCheckbox.addEventListener('change', function() {
        // Nếu ô kiểm được đánh dấu, đặt giá trị của ô nhập liệu giá khuyến mãi là 0, ngược lại là rỗng
        giaKmInput.value = discountCheckbox.checked ? '0' : '';
    });
});