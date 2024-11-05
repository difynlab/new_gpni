<?php

use App\Http\Controllers\Frontend\Pages\HomepageController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use App\Http\Controllers\Frontend\Pages\HistoryOfGpniController;
use App\Http\Controllers\Frontend\Pages\AdvisoryBoardExpertLectureController;
use App\Http\Controllers\Frontend\Pages\FAQController;
use App\Http\Controllers\Frontend\Pages\ISSNOfficialPartnerController;
use App\Http\Controllers\Frontend\Pages\OurPolicyController;
use App\Http\Controllers\Frontend\Pages\ConferenceController;
use App\Http\Controllers\Frontend\Pages\InsuranceProfessionalMembershipController;
use App\Http\Controllers\Frontend\Pages\GiftCardController;
use App\Http\Controllers\Frontend\Pages\PodcastController;
use App\Http\Controllers\Frontend\Pages\ArticleController;
use App\Http\Controllers\Frontend\Pages\WhyWeAreDifferentController;
use App\Http\Controllers\Frontend\Pages\MembershipController;
use App\Http\Controllers\Frontend\Pages\ContactUsController;
use App\Http\Controllers\Frontend\Pages\GlobalEducationPartnersController;
use App\Http\Controllers\Frontend\Pages\NutritionistController;
use App\Http\Controllers\Frontend\Student\MyStorageController;
use App\Http\Controllers\Frontend\Student\CourseDetailController;
use App\Http\Controllers\Frontend\Student\AskExpertController;
use App\Http\Controllers\Frontend\Pages\GpniTvController;
use App\Http\Controllers\Frontend\Pages\CourseController;
use App\Http\Controllers\Frontend\Student\PasswordController;
use App\Http\Controllers\Frontend\Student\StudentProfileController;
use App\Http\Controllers\Frontend\Student\StudentMaterialController;
use App\Http\Controllers\Frontend\Student\MembersCornerController;
use App\Http\Controllers\Frontend\Student\MyOrdersController;
use App\Http\Controllers\Frontend\Student\QualificationsController;
use App\Http\Controllers\Frontend\Student\ReferFriendController;
use App\Http\Controllers\Frontend\Student\CartController;
use App\Http\Controllers\Frontend\Pages\ProductController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::middleware(['set_language'])->group(function () {
    // Pages routes
        Route::get('/', [HomepageController::class, 'index'])->name('homepage');
        Route::get('why-we-are-different', [WhyWeAreDifferentController::class, 'index'])->name('why-we-are-different');
        Route::get('membership', [MembershipController::class, 'index'])->name('membership');
        Route::get('advisory-board-and-expert-lectures', [AdvisoryBoardExpertLectureController::class, 'index'])->name('advisory-board-and-expert-lectures');
        Route::get('faqs', [FAQController::class, 'index'])->name('faqs');
        Route::get('history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');
        Route::get('our-policies', [OurPolicyController::class, 'index'])->name('our-policies');
        Route::get('insurance-and-professional-membership', [InsuranceProfessionalMembershipController::class, 'index'])->name('insurance-and-professional-membership');
        Route::get('global-education-partners', [GlobalEducationPartnersController::class, 'index'])->name('global-education-partners');
        
        
        Route::get('issn-official-partners', [ISSNOfficialPartnerController::class, 'index'])->name('issn-official-partners');
        
        Route::get('gift-cards', [GiftCardController::class, 'index'])->name('gift-cards');
        Route::get('podcasts', [PodcastController::class, 'index'])->name('podcasts');
        

        Route::get('conferences', [ConferenceController::class, 'index'])->name('conferences');
        Route::get('conferences/{id}', [ConferenceController::class, 'show'])->name('single-conference');

        Route::get('articles', [ArticleController::class, 'index'])->name('articles');
        Route::get('articles/{id}', [ArticleController::class, 'show'])->name('single-article');

        Route::get('nutritionists', [NutritionistController::class, 'index'])->name('nutritionists');
        Route::get('nutritionists/{id}', [NutritionistController::class, 'viewCoach'])->name('view-coach');

        Route::get('pne-level-1-course', [CourseController::class, 'show_pne_level_1'])->name('pne-level-1-course');
        Route::get('master-class', [CourseController::class, 'show_master_class'])->name('master-class');

        
        Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us');
        
        Route::get('gpni-tv', [GpniTvController::class, 'index'])->name('gpni-tv');
        Route::get('products', [ProductController::class, 'index'])->name('products');
    // Pages routes

    // Student routes
        Route::middleware('auth', 'role:student')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('change-password', [PasswordController::class, 'index'])->name('change-password');
            Route::post('change-password', [PasswordController::class, 'update'])->name('change-password.update');

            Route::get('payment-flow/{id}', [CourseController::class, 'enrollNow'])->name('payment-flow');

            Route::get('my-storage', [MyStorageController::class, 'index'])->name('my-storage');
            Route::get('course-detail', [CourseDetailController::class, 'index'])->name('course-detail');
            Route::get('course-detail-open/{id}', [CourseDetailController::class, 'show'])->name('course-detail-open');

            Route::get('ask-expert', [AskExpertController::class, 'index'])->name('ask-expert');
            Route::get('view-history', [AskExpertController::class, 'viewHistory'])->name('view-history');
            Route::get('question-and-answer/{id?}', [AskExpertController::class, 'questionAnswer'])->name('question-and-answer');
            Route::post('ask-expert', [AskExpertController::class, 'store'])->name('ask-expert.store');
            Route::post('send-reply', [AskExpertController::class, 'sendReply'])->name('send-reply');

            Route::get('course-list', [CourseDetailController::class, 'list'])->name('course-list');
            Route::get('student-profile', [StudentProfileController::class, 'index'])->name('student-profile');
            Route::get('student-materials', [StudentMaterialController::class, 'index'])->name('student-materials');
            Route::get('members-corner', [MembersCornerController::class, 'index'])->name('members-corner');
            Route::get('my-orders', [MyOrdersController::class, 'index'])->name('my-orders');
            
            Route::get('refer-friend', [ReferFriendController::class, 'index'])->name('refer-friend');
            Route::get('get-history', [ReferFriendController::class, 'showHistory'])->name('get-history');
            Route::post('send-invite', [ReferFriendController::class, 'sendInvite'])->name('send-invite');

            Route::get('qualifications', [QualificationsController::class, 'index'])->name('qualifications');
            Route::get('cart', [CartController::class, 'index'])->name('cart');
        });
    // Student routes 
});