
$.validator.addMethod("checkStartDate", function(value, element) {
    var currentDate = new Date();
    var inputStartDate = new Date(value);
    if (inputStartDate > currentDate)
        return true;
    return false;
});

$.validator.addMethod("checkEndDate", function(value, element) {
    var currentDate = new Date();
    var inputEndDate = new Date(value);
    if (inputEndDate > currentDate)
        return true;
    return false;
});

$("#createContent").validate({
    rules: {
        conten: {
            required: true,
            maxlength: 64
        },
        description: {
            required: function()
            {
                CKEDITOR.instances.description.updateElement();
            },
        },
        start: {
            required: true,
            checkStartDate: true
        },
        end: {
            required: true,
            checkEndDate: true
        },
    },
    messages: {
        conten: {
            required: "**Tên Group không được để trống",
            maxlength: "**Tên Group tối đa 64 ký tự"
        },
        description: {
            required: "**Mô tả không được để trống",
        },
        start: {
            required: "**Date không để trống",
            checkStartDate: "**Ngày tạo group lớn hơn ngày hiện tại"
        },
        end: {
            required: "**Date không để trống",
            checkEndDate: "**Ngày kết thúc lớn hơn ngày hiện tại"
        },
    },
});

$("#createContent").validate({
    onsubmit: false
});


