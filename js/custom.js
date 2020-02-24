// ############# FOR ./UPGAL.php #############

//upload correctly sized image
var _URL = window.URL || window.webkitURL;

$("#file").change(function(e) {
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            if((this.width < 800)||(this.height < 400)){
                alert('Image too small. Images must be bigger than 800 x 400');
                $('#file').val('');
            }
            
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);

    }

});
// #################### FOR ./trip-reports.php #######################







