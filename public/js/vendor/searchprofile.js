$('document').ready(function(){
    var url = 'data/dbase.json';
    var tj = $('#result');
    
    $('#search').bind('click', function(){
        
        var values = document.querySelectorAll('div .put');
        var sel = document.getElementById('Edu');
        
        if(checkval(values, sel)){
            var num = 0;
        
            $('#sresult').text("Found " + num + " Profile(s)");

            var ch = tj.children('li');
            if(ch.length > 0){
                ch.remove();
}

            $.getJSON(url, function(info){

                var proceed = true;
                $.each(info,function(i,v){

                    var data = v.Employee; // target employee
                    var obj;

                    $.each(data, function(a,b){ //loop through 

    //                    search data
    //                    if search is true....
                        if(search(b, values)){
                            num = num + 1;
                            update(v.Employee[a], num);
    //                      ...log data object
                            console.log(v.Employee[a]);
                        }else{
                            console.log("no value found");                          
                        }
                    });
    //                
                });

});
        }else{
            $('#sresult').text("Please Enter a value to search");
        }
        
        function search(object, i){
            if(object.Age == i[0].value || 
               small(object.Hedu) == small(sel.value) || 
               small(object.FA) == small(i[1].value) || 
               object.Exp == i[2].value ){
                return true;
            }else{
                return false;
            }
        }
        
        function update(object, v){
                var d = object;
            
                $('#sresult').text("Found " + num + " Profile(s).");
            
                var li = $('<li/>') //main link
                    .addClass('col-sm-6 list-group-item')
                    .appendTo(tj);
            
                //first item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-user')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text(d.Name)
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //second item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-envelope')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text(d.Email)
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //third item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-calendar')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text("Age (" + d.Age + ")")
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //fourt and fifth item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-suitcase')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text("Functional Area - " + d.FA + ", Experiece - " + d.Exp + " year(s)")
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //sixth item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-phone')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text(d.Tel)
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //seventh item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-book')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text(d.Hedu)
                    .appendTo(div);
            
                var hr = $('<hr>').appendTo(li);
            
            //eighth item
                var div = $('<div/>')
                    .addClass('mli')
                    .appendTo(li);
                
                var i = $('<i/>')
                    .addClass('fa fa-home')
                    .appendTo(div);
                
                var sp = $('<span/>')
                    .addClass('left-space')
                    .text(d.Address)
                    .appendTo(div);
        }
        
        function small(text){
        var res = text.toLowerCase();
        return res;
    }
        
        function checkval(a,b){
            if(a[0].value.trim() == '' &&
               a[1].value.trim() == '' &&
               a[2].value.trim() == '' &&
               b.value.trim() == '')
            {
                console.log("failed");
                return false;  
            }else{
                console.log("passed");
                return true;
            }
        }
        
        
    });
});