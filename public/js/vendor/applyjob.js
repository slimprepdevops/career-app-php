$('document').ready(function(){
    $('#applyjob').on('click', function () {
        var jid = $('#job_id').val();
        var uid = $('#user_id').val();
        var cid = $('#com_id').val();
        $.ajax({
            type: 'post',
            url: 'functions/applyjob.php',
            data: {

                'com_id': cid,
                'user_id': uid,
                'job_id': jid
            },
            success: function(data) {

                var x = JSON.parse(data);
                if (x.success) {
                    alert('You have applied for this job!');
                }else{
                    alert(x.errors);
                }
                console.log(x);
            },
        });
    })
});