@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/nutritionists.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container my-5">
            <section class="learn-best-section">

                <x-frontend.notification></x-frontend.notification>

                <div class="container">
                    <h1 class="fs-49">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
                    <h1 class="fs-39">{{ $contents->{'sub_title_' . $middleware_language} ?? $contents->sub_title_en }}</h1>

                    <form action="{{ route('frontend.nutritionists.index') }}" method="GET">
                        <div class="search-field">
                            <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" alt="Search Icon">
                            <input type="text" name="nutritionist" value="{{ $nutritionist ?? '' }}" placeholder="{{ $contents->{'search_' . $middleware_language} ?? $contents->search_en }}">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    @endif

    @if($nutritionists->isNotEmpty())
        <div class="coaches-section">
            <div class="container">
                <div class="row">
                    @foreach($nutritionists as $nutritionist)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="coach-card">
                                <div class="flex-grow">
                                    <div class="qualified-coach">{{ $contents->{'qualified_coach_' . $middleware_language} ?? $contents->qualified_coach_en }}</div>

                                    @if($nutritionist->image)
                                        <img src="{{ asset('storage/backend/persons/nutritionists/' . $nutritionist->image) }}" class="image" alt="User Image">
                                    @else
                                        <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" class="image">
                                    @endif

                                    <div class="coach-name fs-20">{{ $nutritionist->name }}</div>

                                    <div class="coach-location-row">
                                        <div class="coach-location-item">
                                            <img src="{{ asset('storage/frontend/globe-icon.svg') }}" alt="Location Icon" width="20px" height="20px">
                                            <span>{{ $nutritionist->country }}</span>
                                        </div>
                                        <div class="coach-location-item coach-contact-link" id="{{ $nutritionist->id }}">
                                            <img src="{{ asset('storage/frontend/connect-icon.svg') }}" alt="Contact Icon" width="20px" height="20px">
                                            <span>{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</span>
                                        </div>
                                    </div>

                                    <div class="coach-info-row">
                                        <div class="coach-info fs-16">{{ $contents->{'age_' . $middleware_language} ?? $contents->age_en }}: {{ $nutritionist->age }}</div>

                                        @if($nutritionist->credentials)
                                            <div class="coach-info">{{ $contents->{'credentials_' . $middleware_language} ?? $contents->credentials_en }}: 
                                                @foreach(json_decode($nutritionist->credentials) as $credential)
                                                    {{ $credential }}
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="coach-info">{{ $contents->{'cec_status_' . $middleware_language} ?? $contents->cec_status_en }}: <span class="cec-status">{{ $nutritionist->cec_status == '1' ? $contents->{'active_' . $middleware_language} ?? $contents->active_en : $contents->{'inactive_' . $middleware_language} ?? $contents->inactive_en }}</span></div>
                                    </div>
                                </div>

                                <span class="view-profile-btn btn-responsive" id="{{ $nutritionist->id }}" data-bs-toggle="modal" data-bs-target="#view-modal">{{ $contents->{'view_profile_' . $middleware_language} ?? $contents->view_profile_en }}</span>
                            </div>
                        </div>
                    @endforeach

                    {{ $nutritionists->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>
    @endif

    <form action="#" method="POST" class="contact-modal">
        @csrf
        <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="country">{{ $contents->{'country_' . $middleware_language} ?? $contents->country_en }}</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">{{ $contents->{'choose_country_' . $middleware_language} ?? $contents->choose_country_en }}</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cabo Verde">Cabo Verde</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                <option value="Congo, Republic of the">Congo, Republic of the</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Greece">Greece</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, North">Korea, North</option>
                                <option value="Korea, South">Korea, South</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="North Macedonia">North Macedonia</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Sudan">South Sudan</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">{{ $contents->{'city_' . $middleware_language} ?? $contents->city_en }}</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone-number">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                            <input type="tel" class="form-control" id="phone-number" name="phone_number" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="email">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="appChat">{{ $contents->{'app_chat_' . $middleware_language} ?? $contents->app_chat_en }}</label>
                            <select class="form-select" id="appChat" name="app" required>
                                <option value="">{{ $contents->{'choose_app_chat_' . $middleware_language} ?? $contents->choose_app_chat_en }}</option>
                                <option value="WhatsApp">{{ $contents->{'app_chat_first_' . $middleware_language} ?? $contents->app_chat_first_en }}</option>
                                <option value="Skype">{{ $contents->{'app_chat_second_' . $middleware_language} ?? $contents->app_chat_second_en }}</option>
                                <option value="WeChat">{{ $contents->{'app_chat_third_' . $middleware_language} ?? $contents->app_chat_third_en }}</option>
                                <option value="Other">{{ $contents->{'app_chat_fourth_' . $middleware_language} ?? $contents->app_chat_fourth_en }}</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="app-id">{{ $contents->{'app_chat_id_' . $middleware_language} ?? $contents->app_chat_id_en }}</label>
                            <input type="text" class="form-control" id="app-id" name="app_id" required>
                        </div>

                        <button type="submit" class="btn submit-btn">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="profile-content">
                        <div class="side-section">
                            <img src="" alt="Coach Image" class="coach-image">
                        </div>
                        <div class="details-content">
                            <img src="{{ asset('storage/frontend/qr.png') }}" alt="QR Code" class="qr-code">

                            <h5 class="mb-2 name">{{ $contents->{'coach_name_' . $middleware_language} ?? $contents->coach_name_en }}</h5>
                            
                            <p><strong>{{ $contents->{'age_' . $middleware_language} ?? $contents->age_en }}:</strong> <span class="age"></span></p>

                            <p><strong>{{ $contents->{'country_' . $middleware_language} ?? $contents->country_en }}:</strong> <span class="country"></span></p>

                            <p><strong>{{ $contents->{'cec_status_' . $middleware_language} ?? $contents->cec_status_en }}:</strong> <span class="highlight cec-status"></span></p>

                            <p><strong>{{ $contents->{'credentials_' . $middleware_language} ?? $contents->credentials_en }}:</strong> <span class="credentials"></span></p>

                            <p><strong>{{ $contents->{'certificate_number_' . $middleware_language} ?? $contents->certificate_number_en }}:</strong> <span class="certificate-number"></span></p>

                            <p><strong>{{ $contents->{'membership_credential_status_' . $middleware_language} ?? $contents->membership_credential_status_en }}:</strong> <span class="membership-credential-status"></span></p>

                            <div>
                                <strong>{{ $contents->{'area_of_interest_' . $middleware_language} ?? $contents->area_of_interest_en }}</strong>
                                <div class="mt-2 d-flex flex-wrap area-of-interest">
                                </div>
                            </div>

                            <div class="mt-3">
                                <strong>{{ $contents->{'self_introduction_' . $middleware_language} ?? $contents->self_introduction_en }}</strong>
                                <p class="mt-2 intro-paragraph"></p>
                            </div>

                            <div class="bottom-section">
                                <span class="qualified-coach">{{ $contents->{'qualified_coach_' . $middleware_language} ?? $contents->qualified_coach_en }}</span>
                                <div class="coach-location-model-item coach-contact-link">
                                    <a class="contact-now">{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('after-scripts')
    <script>
        $('.coach-contact-link').on('click', function() {
            let id = $(this).attr('id');
            let url = "{{ route('frontend.nutritionists.contact', [':id']) }}";
            url = url.replace(':id', id);

            $('.contact-modal').attr('action', url);
            $('.contact-modal .modal').modal('show');
        });

        $('.view-profile-btn').on('click', function() {
            let id = $(this).attr('id');
            let url = "{{ route('frontend.nutritionists.fetch', [':id']) }}";
            url = url.replace(':id', id);

            let noImageUrl = "{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}";

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if(response.image) {
                        $('#view-modal .coach-image').attr('src', 'storage/backend/persons/nutritionists/' + response.image);
                    }
                    else {
                        $('#view-modal .coach-image').attr('src', noImageUrl);
                    }
                    
                    $('#view-modal .name').text(response.name);
                    $('#view-modal .age').text(response.age);
                    $('#view-modal .country').text(response.country);
                    $('#view-modal .cec-status').text(response.cec_status == '1' ? 'Active' : 'Inactive');
                    $('#view-modal .certificate-number').text(response.certificate_number);
                    $('#view-modal .membership-credential-status').text(response.membership_credential_status == '1' ? 'Active' : 'Inactive');
                    $('#view-modal .intro-paragraph').text(response.self_introduction);

                    let credentials = JSON.parse(response.credentials);
                    $('#view-modal .credentials').text(credentials.join(', '));

                    let areaOfInterests = JSON.parse(response.area_of_interests);
                    let areaOfInterestContainer = $('#view-modal .area-of-interest');
                    areaOfInterestContainer.empty();
                    areaOfInterests.forEach(function(interest) {
                        areaOfInterestContainer.append('<span class="interest-btn">' + interest + '</span>');
                    });

                    $('#view-modal .coach-contact-link').attr('id', response.id);
                },
                error: function(xhr) {
                    console.log("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });

            $('.view-modal').modal('show');
        });
    </script>
@endpush