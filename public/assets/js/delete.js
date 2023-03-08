// delete ajax
$('.deleteProduct').on('click', function () {
    const id = $(this).data('id');
    console.log('/user/delete-product/:id'.replace(':id', id));
    $.ajax({
        url:'/user/delete-product/:id'.replace(':id', id),
        type: 'GET',
        success: function (response) {
            if (response.status == 'success') {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    location.reload();
                },2000)
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },

    })
})
