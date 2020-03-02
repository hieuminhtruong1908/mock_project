$(document).ready(function () {
    $imgSrc = $('#imgProfile').attr('src');

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgProfile').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#btnChangePicture').on('click', function () {
        // document.getElementById('profilePicture').click();
        if (!$('#btnChangePicture').hasClass('changing')) {
            $('#profilePicture').click();
        } else {
            // change
        }
    });
    $('#profilePicture').on('change', function () {
        readURL(this);
        $('#btnChangePicture').addClass('changing');
        $('#btnChangePicture').attr('value', 'Confirm');
        $('#btnChangePicture').attr('type', 'submit');
        $('#btnDiscard').removeClass('d-none');
        $('#btnDiscard').css('z-index',3);
        // $('#imgProfile').attr('src', '');
    });
   /* $('#btnDiscard').on('click', function () {
        // if ($('#btnDiscard').hasClass('d-none')) {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', 'Change');
        $('#btnDiscard').addClass('d-none');
        $('#imgProfile').attr('src', $imgSrc);
        $('#profilePicture').val('');
        // }

        $('#btnChangePictureCover').removeClass('changing');
        $('#btnChangePictureCover').attr('value', 'Change');
        $('#btnDiscard').addClass('d-none');
        $('#imgProfileCover').css('background-image', $imgSrc);
        $('#profilePictureCover').val('');



    });*/
});


$(document).ready(function () {

    function readURL1(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgProfileCover').css('background-image', "url(" + e.target.result + ")");
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#btnChangePictureCover').on('click', function () {
        // document.getElementById('profilePicture').click();
        if (!$('#btnChangePictureCover').hasClass('changing')) {
            $('#profilePictureCover').click();
        } else {
            // change
        }
    });
    $('#profilePictureCover').on('change', function () {
        readURL1(this)
        $('#btnChangePictureCover').addClass('changing');
        $('#btnChangePictureCover').attr('value', 'OK');
        $('#btnChangePictureCover').attr('type', 'submit');
        $('#btnDiscard').removeClass('d-none');
        // $('#imgProfile').attr('src', '');
    });

});


$(document).ready(function () {
    $('#formupload').on('submit', function (event) {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', 'Change');
        event.preventDefault();
        let id = $("#id-group").val();
        $.ajax({
            url: 'http://lsn.ntq.solutions/group/home/uploadavatar/' + id,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                setTimeout(function () {
                    $("#message").css('display','none')
                },3000)
            }

        })
    });
});


$(document).ready(function () {
    $('#form_upload_cover').on('submit', function (event) {
        $('#btnChangePictureCover').removeClass('changing');
        $('#btnChangePictureCover').attr('value', 'Change');
        event.preventDefault();
        let id = $("#id-group").val();
        $.ajax({
            url: 'http://lsn.ntq.solutions/group/home/uploadcover/' + id,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
                success: function (data) {
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    setTimeout(function () {
                        $("#message").css('display','none')
                    },3000)
                }
        })
    });
});



