
$("#edit").validate({
    rules: {
        name: {
            required: true,
            maxlength: 64
        },
        desciption: {
            required: true,
            maxlength: 500
        },

    },
    messages: {
        name: {
            required: "**Tên Course không được để trống",
            maxlength: "**Tên Course tối đa 64 ký tự"
        },
        desciption: {
            required: "**Mô tả không được để trống",
            maxlength:"**Mô tả tối đa 500 ký tự"
        },
    },
});

$("#edit").validate({
    onsubmit: false
});
$(".edit").click(function () {
    nameCourse = $(this).data().name;
    des = $(this).data().des;
    $("#name").val(nameCourse);
    $("#descriptionn").val(des);
    id = $(this).data().id;
    $("#edit").attr('action', 'http://lsn.ntq.solutions/course/edit/' + id);
    $("#edit").attr('method', 'POST');

    $("#error-course").html("");
    $("#error-description").html("");

});

$("#cancel").click(function () {
    $("#name").val(nameCourse);
    $("#descriptionn").val(des);

});

$("#edit").on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: 'http://lsn.ntq.solutions/course/edit/' + id,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.message) {
                    $("#message").html(data.message);
                    $("#message").css('font-size',20);
                    setTimeout(function () {
                        $("#message").html("")
                    },3000)
                }
            }
        })
});
