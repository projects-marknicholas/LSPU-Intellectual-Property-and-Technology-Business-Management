document.getElementById('photo').addEventListener('change', function() {
    var preview = document.getElementById('preview-photo');
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function() {
        preview.style.backgroundImage = 'url(' + reader.result + ')';
    }

    if (file) {
        reader.readAsDataURL(file);
    }
});