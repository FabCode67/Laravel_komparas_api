document.addEventListener('DOMContentLoaded', function () {
    // Get the image field, file input, and image preview container
    const imageField = document.getElementById('imageField');
    const fileInput = document.getElementById('profile_picture');
    const imagePreview = document.querySelector('.image-preview');

    // Add an event listener to the file input
    fileInput.addEventListener('change', function () {
        // Get the selected file
        const selectedFile = fileInput.files[0];

        // Check if a file is selected
        if (selectedFile) {
            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!allowedTypes.includes(selectedFile.type)) {
                alert('Invalid file type. Please select a valid image file.');
                // Reset the file input to clear the selected file
                fileInput.value = '';
                return;
            }

            // Update the image preview with the selected image
            imagePreview.style.backgroundImage = `url(${URL.createObjectURL(selectedFile)})`;
            imagePreview.style.backgroundSize = 'cover';
            imagePreview.style.backgroundRepeat = 'no-repeat';
            imagePreview.style.backgroundPosition = 'center';
        } else {
            // No file selected, reset the image preview
            imagePreview.style.backgroundImage = '';
        }
    });
});

