$(function(){
    $('.del').on('click', function(e){
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteForm').attr('action','/lecturer/class/' + id +'/delete');
        console.log(form);
    })
    $('.assDel').on('click', function(e){
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteAss').attr('action','/assignments/' + id +'/delete');
        // console.log(form);
    })
    $('.infoDel').on('click', function(e){
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteInfo').attr('action','/assignments/' + id +'/delete');
        // console.log(form);
    })
})
