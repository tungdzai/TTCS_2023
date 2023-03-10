$(document).ready(function () {
    $.ajax({
        url: 'http://beetech.vn/admin/user/provinces',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            let options = '<option value="">-- Chọn Tỉnh/Thành phố: --</option>';
            let province_id = localStorage.getItem('province_id');
            let selected = '';
            $.each(data, function (key, value) {
                if (province_id == value.id){
                    selected = 'selected'
                    options += '<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>';
                    localStorage.clear();
                }else {
                    options += '<option value="' + value.id + '">' + value.name + '</option>';
                }
            });

            $('#province').html(options);
        }
    });
    $('#province').change(function () {
        let province_id = $(this).val();
        localStorage.setItem('province_id', province_id);
        if (province_id) {
            $.ajax({
                url: 'http://beetech.vn/admin/user/districts/' + province_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let options = '<option value="">-- Chọn huyện --</option>';
                    let district_id = localStorage.getItem('district_id');
                    let selected = '';
                    $.each(data, function (key, value) {
                        if (district_id == value.id){
                            selected = 'selected'
                            options += '<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>';
                            localStorage.clear();
                        }else {
                            options += '<option value="' + value.id + '">' + value.name + '</option>';
                        }
                    });
                    $('#district').html(options);
                    $('#commune').html('<option value="">-- Chọn xã --</option>');
                }
            });
        } else {
            $('#district').html('<option value="">-- Chọn huyện --</option>');
            $('#commune').html('<option value="">-- Chọn xã --</option>');
        }
    });
    $('#district').change(function () {
        let district_id = $(this).val();
        localStorage.setItem('district_id', district_id);
        if (district_id) {
            $.ajax({
                url: 'http://beetech.vn/admin/user/communes/' + district_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var options = '<option value="">-- Chọn phường/xã --</option>';
                    $.each(data, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#commune').html(options);
                }
            });
        }
    });
    if (localStorage.getItem('province_id')){
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/user/districts/' + localStorage.getItem('province_id'),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let options = '<option value="">-- Chọn huyện --</option>';
                $.each(data, function (key, value) {
                    options += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#district').html(options);
                $('#commune').html('<option value="">-- Chọn xã --</option>');
            }
        });
    }
});
