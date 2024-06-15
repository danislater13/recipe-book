document.addEventListener('DOMContentLoaded', function () {
    // addIngredients();
    function previewImage(input, previewElementId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var previewElement = document.getElementById(previewElementId);
                previewElement.src = e.target.result;
                previewElement.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('image1').addEventListener('change', function () {
        previewImage(this, 'preview1');
    });
});
