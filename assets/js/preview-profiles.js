function displaySelectedImage(formId) {
    const form = document.getElementById(formId);
    const fileInput = form.querySelector('input[type="file"]');
    const image = form.querySelector('img');

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        image.src = e.target.result;
    }

    reader.readAsDataURL(file);
}