function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
        $('#dataImage').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#bukti_sertifikasi").change(function(){
    readURL(this);
})

$("#bukti_pelatihan").change(function(){
    readURL(this);
})