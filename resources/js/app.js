require('./bootstrap')

setTimeout(function(){
    $('.alert').slideUp();
},3000);


// $(document).ready(function() {
//     $('#summernote').summernote();
//   });


$(document).on('click','.delete-category',function(e){

    e.preventDefault();
    let clicked=confirm('Are You Sure Want To Delete Category');

    if(clicked)
    {
        $(this).parent().find('form').submit();
    }
});

$(document).on('click','.delete-news',function(e){

    e.preventDefault();
    let clicked=confirm('Are You Sure Want To Delete News');

    if(clicked)
    {
        $(this).parent().find('form').submit();
    }
});