// html editor
    document.querySelectorAll('.editor').forEach(element => {
        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: uploadUrl,
                },
            })
            .then(newEditor => {})
            .catch(error => {
                console.error(error);
            });
    });
// html editor


// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if(form.checkValidity()) {
                form.querySelectorAll('.submit-button, .delete-button').forEach(function(button) {
                    button.disabled = true;
                });
            }
            else {
                form.reportValidity();
                event.preventDefault();
            }
        });
    });
// Prevent too many clicks