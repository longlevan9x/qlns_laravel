$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
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
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // $("#imgInp").change(function(){
    //     readURL(this);
    // });


    $(document).on('click', '.image-preview-clear', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('#img-upload').removeAttr('src');
        $('input:file').val('');
        $('.show-text-file').val("");
        $(this).hide('slow');
        $('.show-text-file').attr({
            style: "width: 85% !important; margin-left:1%;"
        });
    });
});