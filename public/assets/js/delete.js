// xóa sản phẩm
$('.deleteProduct').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
        url:'/user/delete-product/:id'.replace(':id', id),
        type: 'GET',
        success: function (response) {
            if (response.status == 'success') {
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        },

    })
})
