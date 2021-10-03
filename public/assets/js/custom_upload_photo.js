var $uploadCrop,
tempFilename,
rawImg,
imageId,
source;

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('.my-image').addClass('ready');
        $('#myModal').modal('show');
        rawImg = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        console.log("Sorry - you're browser doesn't support the FileReader API");
    }
}

// $uploadCrop = $('#my-image').croppie({
//     viewport: {
//     width: 300,
//     height: 300,
//     type: 'circle'
//     },
//     enforceBoundary: false,
//     enableExif: true
// });

// $('#myModal').on('shown.bs.modal', function(){
//     $uploadCrop.croppie('bind', {
//     url: rawImg
//     }).then(function(){
//     console.log('jQuery bind complete');
//     });
// });

$('#fotoGroup').on('change', function () { 
    imageId = $(this).data('id'); 
    console.log(imageId)
    tempFilename = $(this).val();
    $('#cancelCropBtn').data('id', imageId); 
    readURL(this); 
});

// $('#cropImageBtn').on('click', function (ev) {
//     $uploadCrop.croppie('result', {
//     type: 'base64',
//     format: 'png',
//     circle :true,
//     size: {width: 300, height: 300}
//     }).then(function (resp) {
//     source = resp
//     $('#imgTarget').attr('src', resp);
//     $('#fotoText').val(resp) 
//     console.log(resp)
//     $('#myModal').modal('hide');
//     });
// });