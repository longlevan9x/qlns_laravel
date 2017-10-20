$(document).ready(function() {
    $(window).load(function (event) {
        $('body').find('form').each(function (index, value) {
            if ($(this).hasClass('validations')) {
                var id = $(this).attr('id');
                $("#" + id).each(function(index, value){
                    var _input = $(this).find('input');

                    /* check required input */
                    _input.blur(function (event) {
                        var name = $(this).attr('name');
                        var parent = $(this).parent();
                        if ($(this).attr("required") && $(this).val().length == 0) {
                            var error = parent.has('span.help-block');
                            if (error.length == 1) {
                                parent.find('.help-block').text(`${name} is required`);
                            }
                            else {
                                parent.append(`<span class="help-block">${name} is required</span>`);
                            }
                            parent.find('span.help-block').css("opacity", 1);
                        }
                        else {
                            parent.find('span.help-block').css("opacity", 0);
                            parent.find('span.help-block').text("");
                        }
                    });
                    _input.focusin(function (event) {
                        var parent = $(this).parent();
                        parent.find('span.help-block').css("opacity", 0);
                        parent.find('span.help-block').text("");
                    });
                    /*-------------------------*/
                    /*config input file*/
                    var input_file = $(this).find("input:file");
                    if (input_file.hasClass('upload-one-file')) {
                        var parent = input_file.parent();
                        parent.after("<img id='img-upload'/>");
                        parent.after('<input type="text" class="form-control show-text-file" readonly>');
                        parent.after('<button type="button" class="btn btn-default image-preview-clear"><span class="glyphicon glyphicon-remove"></span> Clear </button>');
                        parent.parent().addClass('input-group');
                    }
                    /*-------------------------*/

                });
                var data = {
                    messages : {
                    }
                }
                $("#" + id).validate(data);
            }
        });
    });


});