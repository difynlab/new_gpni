@extends('frontend.layouts.app')

@section('title', 'Module Exam')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-exam.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')
    <div class="modal fade" id="start-exam-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="title">{{ $student_dashboard_contents->courses_exam_start_modal_title }}</p>
                    <p class="description">{{ $student_dashboard_contents->courses_exam_start_modal_description }}</p>

                    {!! $student_dashboard_contents->courses_exam_start_modal_instructions !!}
                </div>

                <div class="modal-footer text-center">
                    <a href="{{ route('frontend.courses.show', $course) }}" class="return-link mx-3">
                        <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        {{ $student_dashboard_contents->courses_return }}
                    </a>
                    <button class="btn confirm-button start-exam-button mx-3">{{ $student_dashboard_contents->courses_exam_start_modal_start_exam }}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="exam-container">
        <div class="container-fluid top-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="title-section">
                            <h1 class="fs-39">{{ $course->title }}</h1>
                            <p class="fs-20">{{ $course_module->title }}</p>
                        </div>
                        <div class="instructions">
                            {!! $student_dashboard_contents->courses_exam_instructions !!}
                        </div>
                    </div>

                    @if($course_module->exam_time)
                        <div class="col-md-6 col-12">
                            <div class="timer-section">
                                <p class="remaining-time">{{ $student_dashboard_contents->courses_exam_remaining_time }}</p>
                                <p id="countdown" class="countdown fs-39">{{ $course_module->exam_time }}</p> 
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($questions->isNotEmpty())
            <div class="container-fluid bottom-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-12">
                            @foreach($questions as $key => $question)
                                @if($key == 0)
                                    <div class="question-section" data-question-id="{{ $question->id }}" id="question{{$key}}">
                                        <div class="question">
                                            <p>Q1.</p>
                                            <div>{!! $question->question !!}</div>
                                        </div>

                                        <div class="options">
                                            <div class="option" data-answer="A">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>A)</p>
                                                <div>{!! $question->option_a !!}</div>
                                            </div>
                                            <div class="option" data-answer="B">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>B)</p>
                                                <div>{!! $question->option_b !!}</div>
                                            </div>
                                            <div class="option" data-answer="C">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>C)</p>
                                                <div>{!! $question->option_c !!}</div>
                                            </div>
                                            <div class="option" data-answer="D">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>D)</p>
                                                <div>{!! $question->option_d !!}</div>
                                            </div>
                                        </div>

                                        <div class="navigation">
                                            <div class="button prev-button disabled">← {{ $student_dashboard_contents->courses_exam_previous }}</div>
                                            <div class="button next-button disabled">{{ $student_dashboard_contents->courses_exam_next }} →</div> 
                                        </div>
                                    </div>
                                @else
                                    <div class="question-section d-none" data-question-id="{{ $question->id }}" id="question{{$key}}">
                                        <div class="question">
                                            <p>Q{{ $key + 1 }}.</p>
                                            <div>{!! $question->question !!}</div>
                                        </div>

                                        <div class="options">
                                            <div class="option" data-answer="A">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>A)</p>
                                                <div>{!! $question->option_a !!}</div>
                                            </div>
                                            <div class="option" data-answer="B">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>B)</p>
                                                <div>{!! $question->option_b !!}</div>
                                            </div>
                                            <div class="option" data-answer="C">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>C)</p>
                                                <div>{!! $question->option_c !!}</div>
                                            </div>
                                            <div class="option" data-answer="D">
                                                <div class="radio">
                                                    <div class="radio-inner"></div>
                                                </div>
                                                <p>D)</p>
                                                <div>{!! $question->option_d !!}</div>
                                            </div>
                                        </div>

                                        <div class="navigation">
                                            <div class="button prev-button">← {{ $student_dashboard_contents->courses_exam_previous }}</div>
                                            <div class="button next-button">{{ $student_dashboard_contents->courses_exam_next }} →</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="remaining-questions mt-5 mt-lg-0">
                                <p class="remaining-questions-count">{{ $student_dashboard_contents->courses_exam_remaining_questions }}: <span>{{ $questions->count() }}</span></p>
                                <h2 class="all-questions-heading">All question</h2>
                                <hr class="divider-line">
                                <div class="question-nav">
                                    @foreach($questions as $key => $question)
                                        <div class="box text-center">
                                            <img src="{{ asset('storage/frontend/incomplete-flag.svg') }}" class="invisible"> 

                                            <div class="question-box" id="questionBox{{ $key + 1 }}">
                                                <span>{{ $key + 1 }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="legend-container">
                                    <div class="legend-section">
                                        <img src="{{ asset('storage/frontend/attempted.svg') }}">
                                        <span class="legend">{{ $student_dashboard_contents->courses_exam_attempted }}</span>
                                    </div>
                                    <div class="legend-section">
                                        <img src="{{ asset('storage/frontend/not-attempted.svg') }}">
                                        <span class="legend">{{ $student_dashboard_contents->courses_exam_not_attempted }}</span>
                                    </div>
                                    <div class="legend-section">
                                        <img src="{{ asset('storage/frontend/incomplete-flag.svg') }}">
                                        <span class="legend">{{ $student_dashboard_contents->courses_exam_incomplete }}</span>
                                    </div>
                                </div>

                                <button class="finish-exam-btn" data-bs-toggle="modal" data-bs-target="#submit-modal">{{ $student_dashboard_contents->courses_exam_finish_exam }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('frontend.module-exams.store', [$course, $course_module]) }}" method="POST">
            @csrf
            <div class="modal fade" id="submit-modal" tabindex="-1" aria-labelledby="submit-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <p class="dialog-header">{{ $student_dashboard_contents->courses_exam_submit_modal_title }}</p>
                            <p class="dialog-message">{!! $student_dashboard_contents->courses_exam_submit_modal_description !!}</p>
                        </div>

                        <div id="normal-answers-container"></div> 

                        <div class="modal-footer text-center">
                            <button type="button" class="btn cancel-button" data-bs-dismiss="modal">{{ $student_dashboard_contents->courses_exam_modal_close }}</button>
                            <button type="submit" class="btn confirm-button">{{ $student_dashboard_contents->courses_exam_modal_confirm }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('frontend.module-exams.store', [$course, $course_module]) }}" method="POST" id="timer-modal-form">
            @csrf
            <div class="modal fade" id="timer-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p class="title">{{ $student_dashboard_contents->courses_exam_time_modal_title }}</p>
                            <p class="description">{{ $student_dashboard_contents->courses_exam_time_modal_description }}</p>
                            <div id="time-up-answers-container"></div> 
                        </div>

                        <div class="modal-footer text-center">
                            <button type="submit" class="btn confirm-button">{{ $student_dashboard_contents->courses_exam_modal_confirm }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="success-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="title">{{ $student_dashboard_contents->courses_exam_success_modal_title }}</p>
                    <p class="description">{{ $student_dashboard_contents->courses_exam_success_modal_description }}</p>
                </div>

                <div class="modal-footer text-center">
                    @if(session('course_module_exam_id'))
                        <a href="{{ route('frontend.module-exams.results', [$course, $course_module, session('course_module_exam_id')]) }}" class="btn confirm-button">
                            {{ $student_dashboard_contents->courses_view_results }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            const examContainer = document.getElementById('exam-container');
            let isLocked = false;

            function enterFullscreen() {
                if(examContainer.requestFullscreen) {
                    examContainer.requestFullscreen().catch((err) => {
                        console.error(`Failed to enter fullscreen: ${err.message}`);
                    });
                }
                else {
                    alert('Fullscreen mode is not supported in your browser.');
                }
            }

            $('.start-exam-button').on('click', function () {
                $('#start-exam-modal').modal('hide');

                enterFullscreen();

                // Timer
                    let timeString = "{{ $course_module->exam_time }}";
                    if(timeString != ''){
                        function timeToSeconds(timeString) {
                            const [hours, minutes, seconds] = timeString.split(":").map(Number);
                            return hours * 3600 + minutes * 60 + seconds;
                        }

                        function formatTime(seconds) {
                            const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
                            const minutes = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
                            const secs = String(seconds % 60).padStart(2, '0');
                            return `${hours}:${minutes}:${secs}`;
                        }

                        let totalTime = timeToSeconds(timeString);
                        const countdownElement = document.getElementById('countdown');

                        const timer = setInterval(() => {
                            if(totalTime <= 0) {
                                clearInterval(timer);

                                $('#timer-modal').modal('show');
                            }

                            countdownElement.textContent = formatTime(totalTime);

                            totalTime--;
                        }, 1000);
                    }
                // Timer

                // Navigation and submission
                    const totalQuestions = "{{ $questions->count() }}";
                    let currentQuestionIndex = 0;
                    let answeredQuestions = new Array(totalQuestions).fill(false);
                    let answers = {};

                    function showQuestion(index) {
                        $(`#question${currentQuestionIndex}`).addClass('d-none');
                        $(`#question${index}`).removeClass('d-none');
                        currentQuestionIndex = index;

                        $('.question-box').each(function (i) {
                            if(i < index) {
                                const questionBox = $(this);
                                const flagImg = questionBox.closest('.box').find('img');

                                if(!questionBox.hasClass('attempted')) {
                                    flagImg.removeClass('invisible');
                                }
                                else {
                                    flagImg.addClass('invisible');
                                }
                            }
                        });

                        $('.prev-button').toggleClass('disabled', currentQuestionIndex === 0);
                        $('.next-button').toggleClass('disabled', !answeredQuestions[currentQuestionIndex]);
                    }

                    $('.next-button').on('click', function () {
                        if(!$(this).hasClass('disabled') && currentQuestionIndex < totalQuestions - 1) {
                            showQuestion(currentQuestionIndex + 1);
                        }
                    });

                    $('.prev-button').on('click', function () {
                        if(!$(this).hasClass('disabled') && currentQuestionIndex > 0) {
                            showQuestion(currentQuestionIndex - 1);
                        }
                    });

                    $('.option').on('click', function () {
                        const questionIndex = $(this).closest('.question-section').attr('id').replace('question', '');
                        answeredQuestions[questionIndex] = true;

                        if(currentQuestionIndex == questionIndex && currentQuestionIndex < totalQuestions - 1) {
                            $('.next-button').removeClass('disabled');
                        }

                        $(`#questionBox${+questionIndex + 1}`).addClass('attempted');

                        $(`#questionBox${+questionIndex + 1}`).closest('.box').find('img').addClass('invisible');

                        $(this).siblings().find('.radio').removeClass('active');
                        $(this).siblings().find('.radio').find('.radio-inner').removeClass('active');
                        $(this).find('.radio').addClass('active');
                        $(this).find('.radio').find('.radio-inner').addClass('active');

                        const questionId = $(this).closest('.question-section').data('question-id');
                        const selectedAnswer = $(this).data('answer');

                        answers[questionId] = selectedAnswer;

                        const normalAnswersContainer = $('#normal-answers-container');
                        normalAnswersContainer.empty();

                        const timeUpAnswersContainer = $('#time-up-answers-container');
                        timeUpAnswersContainer.empty();

                        for(const [questionId, selectedAnswer] of Object.entries(answers)) {
                            normalAnswersContainer.append(`
                                <input type="hidden" name="answers[${questionId}]" value="${selectedAnswer}">
                            `);

                            timeUpAnswersContainer.append(`
                                <input type="hidden" name="answers[${questionId}]" value="${selectedAnswer}">
                            `);
                        }

                        let remaining_questions = $('.remaining-questions-count span').text();
                        $('.remaining-questions-count span').text(remaining_questions - 1)
                    });

                    $('.question-box').on('click', function () {
                        const questionIndex = $('.question-box').index(this);
                        showQuestion(questionIndex);
                    });
                // Navigation and submission

                document.addEventListener('fullscreenchange', () => {
                    if(!document.fullscreenElement) {
                        blockInteraction();
                    }
                });

                function blockInteraction() {
                    if(isLocked) {
                        return;
                    }

                    isLocked = true;

                    $('#exam-container').append(`
                        <div id="lock-screen" style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.8);
                            color: white;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            z-index: 9999;
                        ">
                            <p>You have exited fullscreen mode. Please re-enter fullscreen to continue the exam.</p>
                            <button id="re-enter-fullscreen" class="btn btn-primary">Re-enter Fullscreen</button>
                        </div>
                    `);

                    $('#re-enter-fullscreen').on('click', () => {
                        $('#lock-screen').remove();
                        enterFullscreen();
                        isLocked = false;
                    });
                }

                document.addEventListener('copy', (e) => {
                    e.preventDefault();
                });

                document.addEventListener('cut', (e) => {
                    e.preventDefault();
                });

                document.addEventListener('paste', (e) => {
                    e.preventDefault();
                });

                let suspicionCount = 0;
                document.addEventListener('visibilitychange', () => {
                    if(document.hidden) {
                        alert('Avoid switching between tabs during the exam. If detected, the exam will be automatically submitted');

                        suspicionCount++;
                        if(suspicionCount > 3) {
                            $('#lock-screen').remove();
                            $('#timer-modal .title').text('Disqualified');
                            $('#timer-modal .description').text('You have been disqualified for switching tabs multiple times');
                            $('#timer-modal .confirm-button').addClass('d-none');

                            $('#timer-modal').modal('show');
                            
                            setTimeout(() => {
                                $('#timer-modal-form').submit();
                            }, 2000);
                        }
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if(e.altKey ||(e.ctrlKey && e.key === 'Tab')) {
                        e.preventDefault();
                    }
                });
            });

            document.addEventListener('contextmenu', (e) => {
                e.preventDefault();
            });

            document.addEventListener('keydown', (e) => {
                if(
                    e.key === 'F12' ||
                    (e.ctrlKey && e.shiftKey && e.key === 'I') ||
                    (e.ctrlKey && e.shiftKey && e.key === 'J') ||
                    (e.ctrlKey && e.key === 'U')
                ){
                    e.preventDefault();
                }
            });
        });
    </script>
    
    @if(session('success'))
        <script>
            $(document).ready(function() {
                $('#success-modal').modal('show');
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#start-exam-modal').modal('show');
            });
        </script>
    @endif
@endpush