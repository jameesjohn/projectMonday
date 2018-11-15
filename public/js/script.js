$(function(){
    $('.del').on('click', function(e){
        e.preventDefault();
        var id = this.getAttribute('data-id');
        var form = $('#deleteForm').attr('action','/lecturer/class/' + id +'/delete');
        console.log(form);
    })
})
