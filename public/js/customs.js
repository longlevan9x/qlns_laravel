$(document).ready(function() {
    $(window).load(function (event) {
        $('body').find('form').each(function (index, value) {
            /*add validate */
            if ($(this).hasClass('validations')) {
                var id = $(this).attr('id');
                $("#" + id).each(function(index, value){
                    var _input = $(this).find('input');

                    /* check required input */
                    // _input.blur(function (event) {
                    //     var name = $(this).attr('name');
                    //     var parent = $(this).parent();
                    //     if ($(this).attr("required") && $(this).val().length == 0) {
                    //         var error = parent.has('span.help-block');
                    //         if (error.length == 1) {
                    //             parent.find('.help-block').text(`${name} is required`);
                    //         }
                    //         else {
                    //             parent.append(`<span class="help-block">${name} is required</span>`);
                    //         }
                    //         parent.find('span.help-block').css("opacity", 1);
                    //     }
                    //     else {
                    //         parent.find('span.help-block').css("opacity", 0);
                    //         parent.find('span.help-block').text("");
                    //     }
                    // });
                    // _input.focusin(function (event) {
                    //     var parent = $(this).parent();
                    //     parent.find('span.help-block').css("opacity", 0);
                    //     parent.find('span.help-block').text("");
                    // });
                    /*-------------------------*/
                    /*config input file*/
                    var input_file = $(this).find("input:file");
                    if (input_file.hasClass('upload-one-file')) {
                        var parent = input_file.parent();
                        parent.after('<input class="form-control show-text-file" readonly >');
                        parent.after('<button type="button" class="btn btn-default image-preview-clear"><span class="glyphicon glyphicon-remove"></span> Clear </button>');
                        parent.parent().addClass('input-group');
                    }
                    /*-------------------------*/
                });

                $("#" + id).validate({
                    errorPlacement: function (error, element) {
                        if ($(element).attr('aria-invalid') || typeof $(element).attr('aria-invalid') == 'undefined') {
                            $(element).parents('.form-group').addClass('has-error');
                        }
                        error.insertAfter(element);
                    },
                    errorClass : 'form-control-focus',
                    onfocusout: function(element) {
                        if ($(element).hasClass('valid')) {
                            $(element).parents('.form-group').removeClass('has-error');
                        }
                        this.element(element);
                    },
                });
            }
            /*-------------------------*/

            /*Add enctype */
            if (typeof $(this).attr('enctype') == 'undefined') {
                $(this).attr('enctype', 'multipart/form-data');
            }

            /*add id to input*/
            $(this).find('input,select,textarea').each(function (index, item) {
                var _input_name = $(this).attr('name');
                if (typeof $(this).attr('id') == 'undefined') {
                    $(this).attr('id', _input_name);
                }
            });
            /* --------------------------*/
        });
    });

    /*config widget alert */
    var delay = $('.alert.alert-widget').data('delay');
    if (isNaN(delay) || !$.isNumeric(delay)) {
        delay = 3000;
    }
    $('.alert.alert-widget').delay(delay).slideUp();
    /*-------------------*/
});