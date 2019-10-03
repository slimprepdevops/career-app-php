function tryCrop(){
    var img = document.getElementById('cropbox');

    $('#cropbox').Jcrop({
        aspectRatio:1,
        trueSize:[img.width, img.height],
        boxWidth: 540, boxHeight: 540,
        onSelect: updateCoords});
}

// the doCrop function is too technical and repetitive hence, is not advised
function doCrop(){
    var h, w;
    // get reference of input for image
    var filetoload = $("#imgInp")[0];

    // initiate the file reader object
    var reader = new FileReader();

    // read the contents of image file
    reader.readAsDataURL(filetoload.files[0]);
    reader.onload = function(e){
        var idata = e.target.result;

        $('#cropbox').onload = function(){
//            h = $('#cropbox').height;
//            w = $('#cropbox').width;

            //alternative
            h = idata.height;
            w = idata.width;
            $('#cropbox').Jcrop({
                aspectRatio:1,
                trueSize:[h, w],
                boxWidth: 450, boxHeight: 450,
                onSelect: updateCoords});

            alert('data : ' + w + ", " + h);
        }
    }
}


function updateCoords(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}

function checkCoords(){
    if(parseInt($('#w').val())) return true;
    alert('Select where you want to crop.');
    return false;
}

function indicate(){
    alert('onloadeddata occured');
}

function closembox(){
    // get the image to show selected image
    var i = document.getElementById('imgInp');

    // get the modal div that covers the screen
    var b = document.getElementById('mbox');

    // hide the box
    b.style.display = "none";

    //remove image data from image tag
    document.getElementById('cropbox').src = "";

    // remove jcrop from image
    jQuery('#cropbox').data('Jcrop').destroy();

    //reset image width and height
    $('#cropbox').css('max-height', 'none');
    $('#cropbox').css('max-width', 'none');
    $('#cropbox').css('height', '0px');
    $('#cropbox').css('width', '0px');
}

function shwimg(){
    // get the image to show selected image
    var i = document.getElementById('imgInp');

    // get the modal div that covers the screen
    var b = document.getElementById('mbox');

    //get the span element that closes the modal
    // not using this line here
    // var span = document.getElementsByClassName("close")[0];

    //show the modal
    b.style.display = "block";

    //reset image width and height
    $('#cropbox').css('max-height', '540px');
    $('#cropbox').css('max-width', '540px');
    $('#cropbox').css('height', 'auto');
    $('#cropbox').css('width', 'auto');

    //
    var filetoload = $("#userdp")[0];

    // initiate the file reader object
    var reader = new FileReader();
    // read the contents of image file
    reader.readAsDataURL(filetoload.files[0]);
    reader.onload = function(e){
        // set the image source
        var srcs = e.target.result;

        jQuery('#cropbox').attr('src', srcs);

        // try to add result to another input
        jQuery('#imgurl').val(e.target.result);
    }
    // another way to get the source of a file
    //=======================================//
    //display selected image into the image tag
    //document.getElementById('thepicture').src = window.URL.createObjectURL(i.files[0]);
}