$('document').ready(function(){
    var url = 'data/dbase.json';
    var tj = $('#result');
    
    $('#search').bind('click', function(){
        
        var values = document.querySelectorAll('div input');
        
        
        if(checkval(values)){
            
             var num = 0;
        
            $('#sresult').text(num + " Jobs(s) Found.");

            var ch = tj.children('li');

            console.log('child is ' + ch.length);
            
            
            if(ch.length > 0){
                ch.remove();
            }


            $.getJSON(url, function(info){

                var proceed = true;
                $.each(info,function(i,v){

                    var data = v.Company; // target company
                    var obj;

                    $.each(data, function(a,b){ //loop through 

    //                    search data
    //                    if search is true....
                        if(search(b, values)){
                            num = num + 1;
    //                      ...log data object
    //                        console.log(v.Company[a]);
                            update(v.Company[a], num);

                        }else{
                            console.log("no value found"); 

                        }
                    });
    //                
                });

});
            
        }else{
            console.log('failed');
            $('#sresult').text("Please Enter a value to search");
        }
        
        
        function search(object, i){
            if(small(object.Indus) == small(i[0].value) || 
               small(object.FA) == small(i[1].value) || 
               small(object.Jlocation) == small(i[2].value) || 
               object.Exp == i[3].value ){
                return true;
            }else{
                return false;
            }
        }
        
        function update(object, v){
                var d = object;
            
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
                    .text(" "+d.Sponsor + ", " + d.Indus + " Industry.")
                    .appendTo(div);
            
            // job location
                var spr = $('<span/>')
                    .addClass('pull-right')
                    .appendTo(div);
                var ic = $('<i/>')
                    .addClass('fa fa-map-marker')
                    .appendTo(spr);
                var sp = $('<span/>')
                    .text(" "+d.Jlocation + " ")
                    .appendTo(spr);
                
            //line break
                var hr = $('<hr>').appendTo(div);
                
            
                var div2 = $('<div/>')
                    .addClass('row pbox').appendTo(div);
            
                //inner left div
                var div3 = $('<div/>')
                    .addClass('col-md-6')
                    .text(d.Profile)
                    .appendTo(div2);
            
                var hr = $('<hr>').appendTo(div3);
                var ic = $('<i/>')
                    .addClass('fa fa-user-circle')
                    .appendTo(div3);
                
                var sp = $('<span/>')
                    .text(" "+d.Recruit + " user(s) recruited.")
                    .appendTo(div3);
                
                
            // inner right div
                var div4 = $('<div/>')
                    .addClass('col-md-6')
                    .attr('id', 'odainfo')
                    .appendTo(div2);
                
                var ic = $('<i/>')
                    .addClass('fa fa-phone')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d.Tel)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-envelope-o')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d.Email)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-twitter')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d.Twitter)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-facebook')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d.Facebook)
                    .appendTo(div4);
            
                var hr = $('<hr>').appendTo(div4);
                var b = $('<b/>')
                    .text('Interview Info')
                    .appendTo(div4);
                var hr = $('<hr>').appendTo(div4);
            
            
            
            /////////
            /* more job info inside inner left div*/
            var br = $('<br>').appendTo(div3);
            var br = $('<br>').appendTo(div3);
            var hr = $('<hr>').appendTo(div3);
            //job title
            var st = $('<span/>')
                .appendTo(div3);
            var it = $('<i/>')
                .addClass('fa fa-suitcase')
                .appendTo(st);
            var st = $('<span/>')
                .text(" "+d.Jtitle + " ")
                .appendTo(div3);


            //line break
            var br = $('<br>').appendTo(div3);
            var br = $('<br>').appendTo(div3);
            var hr = $('<hr>').appendTo(div3);

            //Company title
            var st = $('<span/>')
                .appendTo(div3);
            var it = $('<i/>')
                .addClass('fa fa-user')
                .appendTo(st);
            var st = $('<span/>')
                .text(" Position - "+d.Pos + ", Functional Area - " + d.FA)
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
                .text(" Proposed Salary - "+d.Salary + " ")
                .appendTo(div3);
            
             //line break
            var br = $('<br>').appendTo(div3);
            var br = $('<br>').appendTo(div3);
            var hr = $('<hr>').appendTo(div3);

            var st = $('<span/>')
                .appendTo(div3);
            var it = $('<i/>')
                .addClass('fa fa-suitcase')
                .appendTo(st);

            var st = $('<span/>')
                .text(" Job Experience Required - "+d.Exp + " year(s)")
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
                .text(" Interview Date - "+d.Interview.Date + " ")
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
                .text(" "+d.Interview.Time + " ")
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
                .text(" "+d.Interview.Venue + " ")
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
                .text(" "+d.Interview.MinR + " ")
                .appendTo(div4);
            
            //line break
            var hr = $('<hr>').appendTo(div4);

            //venue of interview
            var st = $('<span/>')
                .appendTo(div4);
            var it = $('<i/>')
                .addClass('fa fa-question')
                .appendTo(st);
            var st = $('<span/>')
                .text(" "+d.Interview.Inquiries + " ")
                .appendTo(div4);
        }
        
        function small(text){
            var res = text.toLowerCase();
            var val = res.trim();
        return val;
    }
        
        function checkval(boo){
            if(boo[0].value.trim() == '' &&
               boo[1].value.trim() == '' &&
               boo[2].value.trim() == '' &&
               boo[3].value.trim() == '')
            {
                return false;
            }else{
                return true;
            }
        }
        
        
    });
});