
$('.preview').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
        url: '/user/show-product/:id'.replace(':id', id),
        type: 'GET',
        success: function (product) {
            $('#namePreview').val(product.name),
                $('#stockPreview').val(product.stock),
                $('#skuPreview').val(product.sku),
                $('#category_id_preview').html(product.category_id),
                $('#expired_at').val(product.expireds_at),
                $('#image_preview').attr('src', product.avatar);
        }
    })
})
