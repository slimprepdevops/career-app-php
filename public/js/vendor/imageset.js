function onloaded(){
    var img = document.getElementById('cropbox');
//     alert('data = ' + img.width + ', ' + img.height);


    $('#cropbox').Jcrop({
        aspectRatio:1,

        trueSize:[img.width, img.height],
        boxWidth: 450, boxHeight: 450, // fix large image crop issue
        onSelect: updateCoords
    });

//    $.Jcrop('#cropbox',{trueSize:[img.width, img.height]});


};

function showme(){
    var img = document.getElementById('cropbox');
    alert('data = ' + img.width + ', ' + img.height);
    alert("hello");

};

function updateCoords(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function checkCoords(){
    if(parseInt($('#w').val())) return true;
    alert('Select where you want to crop.');
    return false;
};


