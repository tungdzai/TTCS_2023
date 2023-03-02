function previewImage() {
    var file = document.getElementById("avatar").files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        $("#preview").attr("src", e.target.result);
        $("#preview").show();
    }
    reader.readAsDataURL(file);
}
