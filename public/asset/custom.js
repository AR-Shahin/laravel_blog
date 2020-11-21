$(document).ready(function () {

$('#delete_swal').on('click',function (e) {
    e.preventDefault();

    var url = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        timer: 9500
    }).then((result) => {
        if(result.isConfirmed) {
            window.location.href = url;
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    }
})
});
    $('.del_form').on('submit',function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            timer: 4500
        }).then((result) => {
            if(result.isConfirmed) {
            window.location.href = url;
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
    });
});
