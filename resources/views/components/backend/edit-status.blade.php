@props(['data'])

<div class="section">
    <p class="inner-page-title">Status</p>

    <div class="row form-input">
        <div class="col-12">
            <select class="form-control form-select" id="status" name="status" required>
                <option value="1" {{ old('status', $data->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="2" {{ old('status', $data->status) == '2' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>

    <div class="form-input">
        <button type="submit" class="submit-button">Save the updates</button>
    </div>
</div>