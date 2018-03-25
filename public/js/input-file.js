$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this);
        // var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        var label = "";
        for (let i = 0; i < input[0].files.length; i++) {
            label += input[0].files[i].name + ", ";
        }
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        // $(this).parents('.input-group').find(':text')
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
            // input.text(log);
            $('.image-preview-clear').show();
            $('.show-text-file').attr({
                style: "width: 76% !important; margin-left:10%;"
            });
        } else {
            if( log ) alert(log);
        }
        readURL(this);
    });

    function readURL(input) {
        $("img[id*='img-upload']").remove();
        for (let i = 0; i < input.files.length; i++) {
            var parent = $(input).parents('.input-group');

            parent.append(`<img id='img-upload${i}'/>`);
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $(`#img-upload${i}`).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }

    // $("#imgInp").change(function(){
    //     readURL(this);
    // });


    $(document).on('click', '.image-preview-clear', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("img[id*='img-upload']").remove();
        $('input:file').val('');
        $('.show-text-file').val("");
        $(this).hide('slow');
        $('.show-text-file').attr({
            style: "width: 85% !important; margin-left:1%;"
        });
    });
});