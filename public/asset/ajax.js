$(document).ready(function(){

    $('#search_blog').on('keyup',function() {
        var query = $(this).val();
        if(query != '') {
            $.ajax({
                url: "ajax/search",
                type: "GET",
                data: {'name': query},
                success: function (data) {
                    $('#post_list').html(data);
                }
            })
        }
    });

    $(document).on('click', 'li', function(){
        var value = $(this).text();
        $('#search_blog').val(value);
        $('#post_list').html("");
    });

    $('#search__blog').on('keyup',function() {
        var query = $(this).val();
        if(query != '') {
            $.ajax({
                url: "ajax/search",
                type: "GET",
                data: {'name': query},
                success: function (data) {
                    $('#post__list').html(data);
                }
            })
        }
    });

    $(document).on('click', 'li', function(){
        var value = $(this).text();
        $('#search__blog').val(value);
        $('#post__list').html("");
    });

    $('#cat_name').blur(function () {
       var title = $(this).val();
       if(title != ''){
           $.ajax({
               url : "cat_check",
               type:'GET',
               data:{'title': title},
               success: function (data) {
                   $('#response').html(data);
                   console.log(data)
               }
           })
       }
    })

});