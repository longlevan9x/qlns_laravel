$(document).ready(function() {
    $(window).load(function (event) {
        $('body').find('form').each(function (index, value) {
            if ($(this).hasClass('validations')) {
                var id = $(this).attr('id');
                var data = {
                    messages : {
                        username : {
                            required : "Khong duoc de trong"
                        }
                    }
                }
                $("#" + id).validate(data);
            }
        });
    });
});