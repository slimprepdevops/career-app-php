$('document').ready(function(){
    var tj = $('.findings');


    let num = 0;
    $('#searchfield').bind('keyup', function (e) {
        var key = $(this).val().trim();
        var rj = $('.radjobs');
        var rc = $('.radclient');
        var table = null;
        var hook = $('.findings');
        tj.children().remove();

        if(rc.prop('checked')){
            table = 'users';
            // console.log(table);
        }else if(rj.prop('checked')){
            table = 'jobs';
            // console.log(table);
        }else{
            table = 'none';
            console.log(table);
        }
        // setTimeout(function () {
        //     console.log($('#searchfield').val());
        // }, 1000);
        $.ajax({
            type: 'post',
            url: 'functions/search.php',
            data: {
                'table': table,
                'key': key
            },
            success: function(data) {


                try{
                    var x = JSON.parse(data);
                    if (x.success) {
                        if(x.type == 'user'){
                            num = 0;
                            var det = x.user;
                            $.each(det,function(i,v){
                                console.log( v);
                                num = num + 1;
                                updateu(v,i)
                            });


                        }else if(x.type == 'jobs'){
                            num = 0;
                            var det = x.jobs;
                            $.each(det,function(i,v){
                                console.log( v);
                                num = num + 1;
                                update(v,i)
                            });

                            // console.log(det);

                        }
                    }else{
                        $('#sresult').text('0 Found. Please Enter another search value!');
                    }
                }catch (Exception){
                    $('#sresult').text('Please Enter a value to search!');
                    // console.log(Exception)
                }

                // console.log(x);
            }
        });

    });

    function update(d, v){

        $('#sresult').text(num + " Jobs(s) Found.");

        var li = $('<li/>') //main link
            .addClass('list-group-item')
            .appendTo(tj);

        var div = $('<div/>')
            .addClass('mli')
            .appendTo(li);

        //job title

        var ic = $('<i/>')
            .addClass('fa fa-building')
            .appendTo(div);
        var sp = $('<span/>')
            .text(" " + d.title + ", " + d.indus + " Industry.")
            .appendTo(div);

        var sp = $('<a/>')
            .addClass('btn btn-xs btn-primary pull-right')
            .text("View")
            .attr('href', "job_view.php?id=" + d.id + "&table=jobs")
            .appendTo(div);

        //line break
        var hr = $('<hr>').appendTo(div);


        var div2 = $('<div/>')
            .addClass('row pbox').appendTo(div);

        //inner left div
        var div3 = $('<div/>')
            .addClass('col-md-6')
            .appendTo(div2);

        var hr = $('<hr>').appendTo(div3);
        var ic = $('<i/>')
            .addClass('fa fa-info-circle')
            .appendTo(div3);

        var sp = $('<span/>')
            .text(" "+d.description + " user(s) recruited.")
            .appendTo(div3);


        // inner right div
        var div4 = $('<div/>')
            .addClass('col-md-6')
            .attr('id', 'odainfo')
            .appendTo(div2);


        var hr = $('<hr>').appendTo(div4);
        var b = $('<b/>')
            .text('Interview Info')
            .appendTo(div4);
        var hr = $('<hr>').appendTo(div4);


        //line break
        var br = $('<br>').appendTo(div3);
        var br = $('<br>').appendTo(div3);
        var hr = $('<hr>').appendTo(div3);

        //Company title
        var st = $('<span/>')
            .appendTo(div3);
        var it = $('<i/>')
            .addClass('fa fa-suitcase')
            .appendTo(st);
        var st = $('<span/>')
            .text(" Position: "+d.pos + ", Functional Area - " + d.func_area)
            .appendTo(div3);

        //line break
        var br = $('<br>').appendTo(div3);
        var br = $('<br>').appendTo(div3);
        var hr = $('<hr>').appendTo(div3);

        var st = $('<span/>')
            .appendTo(div3);
        var it = $('<i/>')
            .addClass('fa fa-money')
            .appendTo(st);

        var st = $('<span/>')
            .text(" Proposed Salary - "+d.salary + " ")
            .appendTo(div3);

        /////////
        /* interview inside inner right div*/

        //job title
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-calendar')
            .appendTo(st);

        var st = $('<span/>')
            .text(" Interview Date: "+  d.idate + " ")
            .appendTo(div4);


        //line break
        var hr = $('<hr>').appendTo(div4);

        //Company title
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-clock-o')
            .appendTo(st);
        var st = $('<span/>')
            .text(" "+d.itime + " ")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

        //venue of interview
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-map-marker')
            .appendTo(st);
        var st = $('<span/>')
            .text(" "+d.ivenue+ " ")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

        //venue of interview
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-book')
            .appendTo(st);
        var st = $('<span/>')
            .text(" "+d.iexp + " years of experience")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

    }

    function updateu(d, v){

        $('#sresult').text(num + " Users(s) Found.");

        var li = $('<li/>') //main link
            .addClass('list-group-item')
            .appendTo(tj);

        var div = $('<div/>')
            .addClass('mli')
            .appendTo(li);

        //job title

        var ic = $('<i/>')
            .addClass('fa fa-user')
            .appendTo(div);
        var sp = $('<span/>')
            .text(" " + d.fname + " " + d.lname )
            .appendTo(div);

        var sp = $('<a/>')
            .addClass('btn btn-xs btn-primary pull-right')
            .text("View")
            .attr('href', "view_user.php?id=" + d.id + "&table=users")
            .appendTo(div);



        //line break
        var hr = $('<hr>').appendTo(div);


        var div2 = $('<div/>')
            .addClass('row pbox').appendTo(div);

        //inner left div



        // inner right div
        var div4 = $('<div/>')
            .addClass('col-md-12')
            .attr('id', 'odainfo')
            .appendTo(div2);


        var hr = $('<hr>').appendTo(div4);
        var b = $('<b/>')
            .text('Contact Details')
            .appendTo(div4);
        var hr = $('<hr>').appendTo(div4);


                /////////
        /* interview inside inner right div*/

        //job title
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-envelope')
            .appendTo(st);

        var st = $('<span/>')
            .text(" "+  d.email + " ")
            .appendTo(div4);


        //line break
        var hr = $('<hr>').appendTo(div4);

        //Company title
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-phone')
            .appendTo(st);
        var st = $('<span/>')
            .text(" "+d.phone + " ")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

        //venue of interview
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-map-marker')
            .appendTo(st);
        var st = $('<span/>')
            .text(" "+d.location+ " ")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

        //venue of interview
        var st = $('<span/>')
            .appendTo(div4);
        var it = $('<i/>')
            .addClass('fa fa-home')
            .appendTo(st);

        let h = '';
        if(d.address===''){
            h = 'Not Available.';
        }else{
            h = d.address;
        }
        var st = $('<span/>')
            .text(" "+ h + " ")
            .appendTo(div4);

        //line break
        var hr = $('<hr>').appendTo(div4);

    }
});