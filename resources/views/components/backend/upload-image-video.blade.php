@props(['old_name', 'old_value', 'new_name', 'path', 'class', 'extension'])

<label for="image-video" class="form-label">Upload Image/ Video</label>

<div class="drop-area image-video-drop-area {{ isset($class) ? $class : '' }}">
    <i class="bi bi-cloud-arrow-up"></i>
    <p class="drag-drop">Drag and drop files here</p>
    <div class="row line-or">
        <div class="col">
            <hr>
        </div>
        <div class="col-2 text-center">
            <p>or</p>
        </div>
        <div class="col">
            <hr>
        </div>
    </div>
    <label for="{{ $new_name }}" class="button">Browse File</label>
    <p class="condition">Maximum file size is 2 MB</p>
    <input type="file" id="{{ $new_name }}" class="image-video-file-element" name="{{ $new_name }}" accept="image/*, video/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">

    <div class="image-video-preview">
        @if($old_value)
            @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                <img src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}">
            @elseif(in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv']))
                <video src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}" controls></video>
            @endif
        @endif
    </div>
</div>