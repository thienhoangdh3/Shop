$(document).ready(function(){
    $(document).on('click', '#buy', function(){
        if (confirm('Bạn có chắc chắn muốn mua không?')) {
            window.location.href = $(this).data('href');
        }
    });

});
