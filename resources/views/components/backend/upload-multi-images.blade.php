@props(['image_count', 'old_name', 'old_value', 'new_name', 'path'])

<label class="form-label">Upload Images</label>

<div class="drop-area images-drop-area">
    <i class="bi bi-cloud-arrow-up"></i>
    <p class="drag-drop">Drag and drop files here</p>
    <p class="condition">Maximum of {{ $image_count }} images should be uploaded</p>
    <input type="file" class="image-file-elements" name="{{ $new_name }}" accept="image/*" style="display:none" multiple>
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">
    <input type="hidden" class="image-counts" value="{{ $image_count }}">

    <div class="images-preview">
        @if($old_value)
            @foreach(json_decode(htmlspecialchars_decode($old_value)) as $value)
                <img src="{{ asset('storage/backend/' . $path . '/' . $value) }}">
            @endforeach
        @endif
    </div>
</div>