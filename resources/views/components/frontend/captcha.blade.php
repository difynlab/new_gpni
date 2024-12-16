@php
    $contents = App\Models\CommonContent::find(1);
@endphp

<div class="captcha d-flex align-items-center justify-content-between p-3 rounded">
    <span class="text fs-16">{{ $contents->{'captcha_title_' . $middleware_language} ?? $contents->captcha_title_en }}</span>
    <div class="captcha-equation py-md-0 py-2 d-flex gap-2">
        <span class="number number-1 fs-16"></span>
        <span>+</span>
        <span class="number number-2 fs-16"></span>
        <span>=</span>
        <input type="text" class="form-control sum-value fs-16" placeholder="?" required>
    </div>
    <button type="button" class="btn verify-button fs-16">{{ $contents->{'captcha_button_' . $middleware_language} ?? $contents->captcha_button_en }}</button>
</div>