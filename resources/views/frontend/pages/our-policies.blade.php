@extends('frontend.layouts.app')

@section('title', 'Our Policies')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/our-policies.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container policies-section">
            <h2>{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h2>
            <div>{!! $contents->{'description_' . $middleware_language} ?? $contents->description_en !!}</div>

            @if($policy_categories->isNotEmpty())
                <ul class="nav nav-tabs justify-content-center pt-5" id="policiesTabs" role="tablist">
                    @foreach($policy_categories as $key => $policy_category)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="{{ $policy_category->id }}-tab" data-bs-toggle="tab" href="#{{ $policy_category->id }}" role="tab" aria-controls="{{ Str::slug($policy_category->name) }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                {{ $policy_category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                
                <div class="tab-content" id="policiesTabsContent">
                    @foreach($policy_categories as $key => $policy_category)
                        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ $policy_category->id }}" role="tabpanel" aria-labelledby="{{ $policy_category->id }}-tab">
                            <div class="accordion pt-5" id="{{ $policy_category->id }}Accordion">
                                @foreach($policies->where('policy_category_id', $policy_category->id) as $policy)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $policy->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $policy->id }}" aria-expanded="false" aria-controls="collapse{{ $policy->id }}">
                                                {{ $policy->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $policy->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $policy->id }}" data-bs-parent="#{{ $policy_category->id }}Accordion">
                                            <div class="accordion-body">
                                                {!! $policy->content !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

@endsection