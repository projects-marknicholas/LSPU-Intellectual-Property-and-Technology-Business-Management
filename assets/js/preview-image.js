document.getElementById('photo').addEventListener('change', function() {
    var preview = document.getElementById('preview-photo');
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function() {
        preview.innerHTML = ''; // Clear previous content
        var img = new Image();
        img.src = reader.result;
        preview.appendChild(img);
    }

    if (file) {
        reader.readAsDataURL(file);
    }
});
