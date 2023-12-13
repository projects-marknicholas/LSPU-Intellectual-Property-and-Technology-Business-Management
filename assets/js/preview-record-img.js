document.getElementById('tech-image').addEventListener('change', function() {
    const previewImg = document.getElementById('preview-record-img');
    const previewSpan = document.querySelector('#preview-record span');

    const file = this.files[0];
    const reader = new FileReader();

    reader.onload = function() {
        previewImg.src = reader.result;
        previewSpan.style.display = 'none';
    }

    if(file) {
        reader.readAsDataURL(file);
    }
});