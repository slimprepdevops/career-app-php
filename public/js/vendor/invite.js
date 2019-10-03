$('document').ready(function(){
    $('.invited').on('click', function () {
        var id = $(this).children('.tid').val();
        var uid = $(this).children('.uid').val();
        // console.log(id);

        $.ajax({
            type: 'post',
            url: 'functions/invite.php',
            data: {
                '_id': id,
                'uid': uid
            },
            success: function(data) {

                var x = JSON.parse(data);
                if (x.success) {
                    alert('You have invited ' + x.names + ' for this job!');
                }else{
                    alert(x.errors);
                }
                console.log(x);
            }
        });
    })
});