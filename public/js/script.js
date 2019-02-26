$(function () {

    //Setting up functions
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.del').on('click', function (e) {
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteForm').attr('action', '/lecturer/class/' + id + '/delete');
        console.log(form);
    })

    $('.assDel').on('click', function (e) {
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteAss').attr('action', '/assignments/' + id + '/delete');
        // console.log(form);
    })

    $('.infoDel').on('click', function (e) {
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteInfo').attr('action', '/lecturer/information/' + id + '/delete');
        console.log(form);
    })


    $('.update').click(function (e) {

        e.preventDefault();
        //Grab the elements from the DOM
        $parent = $(this).parent().parent(); //tr element
        paragraphContent = $parent.find('.form-part p');
        inputContent = $parent.find('.form-part input');
        score = inputContent.val();
        studentId = $(this).attr('data-id');
        if (!$parent.hasClass('editing')) {
            paragraphContent.css('display', 'none');
            inputContent.css('display', 'block');
            $(this).text('Update');
            //Stop editing mode
            $parent.addClass('editing');
            return
        } else {
            $parent.removeClass('editing');
            $(this).text('Update Score');

            paragraphContent.css('display', 'block');
            inputContent.css('display', 'none');
            updateScore(studentId, score, paragraphContent);
        }

    });

    function updateScore(studentId, score, paragraphContent){
        $.ajax({
            type: 'GET',
            url: '/scoresheet/' + studentId + '/' + score,
            success: function (data) {
                paragraphContent.text(data);
                // toastr.info('hello');
            },
            error: function (data) {
                toastr.info('hello');

            }
        });

    }
})
