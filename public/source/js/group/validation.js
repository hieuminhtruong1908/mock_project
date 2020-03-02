$.validator.addMethod("checkDate", function(value, element) {
    var currentDate = new Date();
    var inputDate = new Date(value);
    if (inputDate > currentDate)
        return true;
    return false;
});

$("#createGroup").validate({
    rules: {
        name: {
            required: true,
            maxlength: 64
        },
        description: {
            required: true,
            maxlength: 255
        },
        start_date: {
            required: true,
            checkDate: true
        },
    },
    messages: {
        name: {
            required: "**Tên Group không được để trống",
            maxlength: "**Tên Group tối đa 64 ký tự"
        },
        description: {
            required: "**Mô tả không được để trống",
            maxlength: "**Mô tả tối đa 255 ký tự"
        },
        start_date: {
            required: "**Date không để trống",
            checkDate: "**Ngày tạo group lớn hơn ngày hiện tại"
        },
    },
});

$("#createGroup").validate({
    onsubmit: false
});
