$('document').ready(function(){
    var url = 'data/dbase.json';
    var tj = $('#topjobs');
        
    
    $.getJSON(url, function(info){
        // using foreach to get data.
        $.each(info, function(i,v){ // returns json parent object
            
            var d = v.Company; // targeting child with company from the parent object
            
            var o = d.sort(function(a,b){ //sorting 'd' 
                return parseFloat(b.Recruit) - parseFloat(a.Recruit); 
                //rearanging them based on descending i.e highest recruits first. 
                //revers a and b position above for ascending.
            });
            
            // you can decide to use $.each function but since i need only 5 
            // i will be using forloop
            
            var k; // create variable and condition to handle length error
            
            if(o.length > 4){
                k = 4;
            }else{
                k = o.length;
            }
            
            for(i = 0; i < k; i++){
                /**
                Dynamically Add Data into ul li 
                for top jobs based on number of recruitments
                */
                
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
                    .text(" "+d[i].Sponsor + " ")
                    .appendTo(div);
                
                var spr = $('<span/>')
                    .addClass('pull-right')
                    .appendTo(div);
                
                var ic = $('<i/>')
                    .addClass('fa fa-map-marker')
                    .appendTo(spr);
                
                var sp = $('<span/>')
                    .text(" "+d[i].Jlocation + " ")
                    .appendTo(spr);
                
                var hr = $('<hr>').appendTo(div);
                
                var div2 = $('<div/>')
                    .addClass('row pbox').appendTo(div);
                
                var div3 = $('<div/>')
                    .addClass('col-md-6')
                    .text(d[i].Profile)
                    .appendTo(div2);
                var hr = $('<hr>').appendTo(div3);
                var ic = $('<i/>')
                    .addClass('fa fa-user-circle')
                    .appendTo(div3);
                
                var sp = $('<span/>')
                    .text(" "+d[i].Recruit + " user(s) recruited.")
                    .appendTo(div3);
                var br = $('<br>').appendTo(div3);
                var br = $('<br>').appendTo(div3);
                
                var div4 = $('<div/>')
                    .addClass('col-md-6')
                    .attr('id', 'odainfo')
                    .appendTo(div2);
                
                var ic = $('<i/>')
                    .addClass('fa fa-phone')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d[i].Tel)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-envelope-o')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d[i].Email)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-twitter')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d[i].Twitter)
                    .appendTo(div4);
                
                var hr = $('<hr>').appendTo(div4);
                //
                
                var ic = $('<i/>')
                    .addClass('fa fa-facebook')
                    .appendTo(div4);
                
                var sp = $('<span/>')
                    .text(" " + d[i].Facebook)
                    .appendTo(div4);
                
            }
            
        });
        
        
    });
    
    
});