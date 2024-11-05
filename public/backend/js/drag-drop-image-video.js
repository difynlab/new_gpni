$(document).ready(function() {
    let dropAreas = document.querySelectorAll('.image-video-drop-area');
    let fileInputs = document.querySelectorAll('.image-video-file-element');
    let imageVideoPreviews = document.querySelectorAll('.image-video-preview');

    dropAreas.forEach((dropArea, index) => {
        let fileInput = fileInputs[index];
        let imageVideoPreview = imageVideoPreviews[index];

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });
    
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
    
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('highlight'), false);
        });
    
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('highlight'), false);
        });
    
        dropArea.addEventListener('drop', handleDrop, false);
    
        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
            handleFiles(files);
        }
    
        fileInput.addEventListener('change', (e) => {
            let files = fileInput.files;
            handleFiles(files);
        });
    
        function handleFiles(files) {
            if(files.length > 0) {
                const file = files[0];
                fileInput.files = files;
                previewFile(file);
            }
        }
    
        function previewFile(file) {
            if(!file.type.startsWith('image/') && !file.type.startsWith('video/')) {
                alert('Please upload an image or video file.');
                return;
            }
    
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                if(file.type.startsWith('image/')) {
                    let img = document.createElement('img');
                    img.src = reader.result;
                    imageVideoPreview.innerHTML = '';
                    imageVideoPreview.appendChild(img);
                }
                else if (file.type.startsWith('video/')) {
                    let video = document.createElement('video');
                    video.src = reader.result;
                    video.controls = true;
                    imageVideoPreview.innerHTML = '';
                    imageVideoPreview.appendChild(video);
                }
                else {
                    alert('Unsupported file type.');
                }
            }
        }
    });
});