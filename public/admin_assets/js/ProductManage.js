document.getElementById("productSubmitForm").addEventListener("click", function (event) {
    event.preventDefault();


    const formData = new FormData();


// Add the main product image
    formData.append('picture', document.getElementById('productImage').files[0]);

// Add additional images
    const additionalImages = document.querySelectorAll('input[name="productImage[]"]');
    additionalImages.forEach(function (fileInput, index) {
        formData.append('additionalImages[]', fileInput.files[0]);
    });

// Add other// ... (other form fields)

    const csrfTokenInput = document.querySelector('input[name="_token"]');
    const csrfTokenValue = csrfTokenInput.value;
    // formData.append('picture', document.getElementById('banner').files[0]);
    formData.append('productName', $('#productName').val());
    formData.append('productPrice', $('#productPrice').val());
    formData.append('productWarranty', $('#productWarranty').val());
    formData.append('productSlug', $('#productSlug').val());
    formData.append('productKey', $('#productKey').val());
    formData.append('productQuantity', $('#productQuantity').val());
    formData.append('productDescription', $('#productDescription').val());
    formData.append('productShortDescription', $('#productShortDescription').val());
    formData.append('productTechnicalSpecification', $('#productTechnicalSpecification').val());
    // formData.append('description', $('#banner_description').val());

    let url = '/products_manage_process';
    fetch(url, {
        method: 'POST',
        body: formData,

        headers: {
            'X-CSRF-TOKEN': csrfTokenValue,
        },
    }).then(response => response.json()) // Parse the JSON response
        .then(data => {
            let message = data.message;
            if (data.message === 'successful') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Product uploaded successfully',
                    timer: 3000,
                    showConfirmButton: false, // Hide the "OK" button
                });
                setTimeout(function() {
                    // Redirect to the specified URL after the timer expires
                    window.location.href = data.url;
                }, 3000); // Delay in milliseconds, matches the timer duration in Swal
            }else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Failed',
                    text:data.message,
                    timer:3000
                });
            }
        }).catch((err) => {
        console.error(err);

    }).finally(() => {
        $('#exampleModal').modal('hide');
    });
});

function addImageField() {
    var additionalImages = document.getElementById('additionalImages');
    var newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.className = 'form-control-file mt-2';
    newInput.name = 'productImage[]';
    newInput.accept = 'image/*';
    newInput.setAttribute('onchange', 'previewImage(this, "additionalImagePreview' + additionalImages.childElementCount + '")');

    var previewImage = document.createElement('img');
    previewImage.id = 'additionalImagePreview' + additionalImages.childElementCount;
    previewImage.className = 'img-thumbnail mt-2';
    previewImage.style.maxWidth = '200px';
    previewImage.style.maxHeight = '200px';
    previewImage.alt = 'Additional Image Preview';

    additionalImages.appendChild(newInput);
    additionalImages.appendChild(previewImage);
}

function previewImage(input, imageId) {
    var preview = document.getElementById(imageId);
    var file = input.files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
    }
}







