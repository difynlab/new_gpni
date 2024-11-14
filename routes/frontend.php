<?php

use App\Http\Controllers\Frontend\Page\HomepageController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use App\Http\Controllers\Frontend\Page\HistoryOfGpniController;
use App\Http\Controllers\Frontend\Page\AdvisoryBoardExpertLectureController;
use App\Http\Controllers\Frontend\Page\FAQController;
use App\Http\Controllers\Frontend\Page\ISSNOfficialPartnerAffiliateController;
use App\Http\Controllers\Frontend\Page\OurPolicyController;
use App\Http\Controllers\Frontend\Page\ConferenceController;
use App\Http\Controllers\Frontend\Page\InsuranceProfessionalMembershipController;
use App\Http\Controllers\Frontend\Page\GiftCardController;
use App\Http\Controllers\Frontend\Page\PodcastController;
use App\Http\Controllers\Frontend\Page\ArticleController;
use App\Http\Controllers\Frontend\Page\CertificationClassController;
use App\Http\Controllers\Frontend\Page\WhyWeAreDifferentController;
use App\Http\Controllers\Frontend\Page\MembershipController;
use App\Http\Controllers\Frontend\Page\ContactUsController;
use App\Http\Controllers\Frontend\Page\GlobalEducationPartnersController;
use App\Http\Controllers\Frontend\Page\NutritionistController;
use App\Http\Controllers\Frontend\Student\MyStorageController;
use App\Http\Controllers\Frontend\Student\CourseController;
use App\Http\Controllers\Frontend\Student\AskQuestionController;
use App\Http\Controllers\Frontend\Page\TvController;
use App\Http\Controllers\Frontend\Page\MasterClassController;
use App\Http\Controllers\Frontend\Student\ProfileController;
use App\Http\Controllers\Frontend\Student\BuyStudyMaterialController;
use App\Http\Controllers\Frontend\Student\MemberCornerController;
use App\Http\Controllers\Frontend\Student\MyOrderController;
use App\Http\Controllers\Frontend\Student\QualificationsController;
use App\Http\Controllers\Frontend\Student\ReferFriendController;
use App\Http\Controllers\Frontend\Student\CartController;
use App\Http\Controllers\Frontend\Page\ProductController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::middleware(['set_language'])->group(function () {
    // Page routes
        Route::get('/', [HomepageController::class, 'index'])->name('homepage');
        Route::get('why-we-are-different', [WhyWeAreDifferentController::class, 'index'])->name('why-we-are-different');
        Route::get('membership', [MembershipController::class, 'index'])->name('membership');
        Route::get('advisory-board-and-expert-lectures', [AdvisoryBoardExpertLectureController::class, 'index'])->name('advisory-board-and-expert-lectures');
        Route::get('faqs', [FAQController::class, 'index'])->name('faqs');
        Route::get('history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');
        Route::get('our-policies', [OurPolicyController::class, 'index'])->name('our-policies');
        Route::get('insurance-and-professional-membership', [InsuranceProfessionalMembershipController::class, 'index'])->name('insurance-and-professional-membership');
        Route::get('global-education-partners', [GlobalEducationPartnersController::class, 'index'])->name('global-education-partners');
        Route::get('issn-official-partners-and-affiliates', [ISSNOfficialPartnerAffiliateController::class, 'index'])->name('issn-official-partners-and-affiliates');
        Route::prefix('articles')->name('articles.')->group(function() {
            Route::get('/', [ArticleController::class, 'index'])->name('index');
            Route::get('show/{article}', [ArticleController::class, 'show'])->name('show');
        });
        Route::prefix('conferences')->name('conferences.')->group(function() {
            Route::get('/', [ConferenceController::class, 'index'])->name('index');
            Route::get('show/{conference}', [ConferenceController::class, 'show'])->name('show');
        });
        Route::prefix('contact-us')->name('contact-us.')->group(function() {
            Route::get('/', [ContactUsController::class, 'index'])->name('index');
            Route::post('/', [ContactUsController::class, 'store'])->name('store');
        });
        Route::prefix('gift-cards')->name('gift-cards.')->group(function() {
            Route::get('/', [GiftCardController::class, 'index'])->name('index');
            Route::post('checkout', [GiftCardController::class, 'checkout'])->name('checkout');
            Route::get('success', [GiftCardController::class, 'success'])->name('success');
        });
        Route::get('gpni-tv', [TvController::class, 'index'])->name('gpni-tv');
        Route::prefix('podcasts')->name('podcasts.')->group(function() {
            Route::get('/', [PodcastController::class, 'index'])->name('index');
            Route::get('show/{podcast}', [PodcastController::class, 'show'])->name('show');
        });
        Route::prefix('nutritionists')->name('nutritionists.')->group(function() {
            Route::get('/', [NutritionistController::class, 'index'])->name('index');
            Route::get('show/{nutritionist}', [NutritionistController::class, 'show'])->name('show');
            Route::post('contact/{nutritionist}', [NutritionistController::class, 'contact'])->name('contact');
            Route::get('fetch/{nutritionist}', [NutritionistController::class, 'fetch'])->name('fetch');
        });
        Route::prefix('master-classes')->name('master-classes.')->group(function() {
            Route::get('/', [MasterClassController::class, 'index'])->name('index');
            Route::get('show/{course}', [MasterClassController::class, 'show'])->name('show');
        });
        Route::prefix('products')->name('products.')->group(function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
        });




        Route::prefix('certification-courses')->name('certification-courses.')->group(function() {
            // Route::get('/', [CertificationClassController::class, 'index'])->name('index');
            Route::get('show/{course}', [CertificationClassController::class, 'show'])->name('show');
        });
    // Page routes


    // Student routes
        Route::middleware(['auth', 'role:student'])->group(function () {
            // All payment routes
                Route::prefix('master-classes')->name('master-classes.')->group(function() {
                    Route::post('checkout', [MasterClassController::class, 'checkout'])->name('checkout');
                    Route::get('success', [MasterClassController::class, 'success'])->name('success');
                });

                Route::prefix('certification-courses')->name('certification-courses.')->group(function() {
                    Route::post('checkout', [CertificationClassController::class, 'checkout'])->name('checkout');
                    Route::get('success', [CertificationClassController::class, 'success'])->name('success');
                });

                Route::prefix('products')->name('products.')->group(function() {
                    Route::post('checkout', [ProductController::class, 'checkout'])->name('checkout');
                    Route::get('success', [ProductController::class, 'success'])->name('success');
                });

                Route::prefix('buy-study-materials')->name('buy-study-materials.')->group(function() {
                    Route::post('checkout', [BuyStudyMaterialController::class, 'checkout'])->name('checkout');
                    Route::get('success', [BuyStudyMaterialController::class, 'success'])->name('success');
                });
    
            // All payment routes

            Route::prefix('dashboard')->name('dashboard.')->group(function() {
                Route::get('/', [DashboardController::class, 'index'])->name('index');
            });

            Route::prefix('ask-questions')->name('ask-questions.')->group(function() {
                Route::get('/', [AskQuestionController::class, 'index'])->name('index');
                Route::post('/', [AskQuestionController::class, 'store'])->name('store');
                Route::get('histories', [AskQuestionController::class, 'histories'])->name('histories');
                Route::get('histories/{ask_question}', [AskQuestionController::class, 'show'])->name('show');
                Route::post('histories/update/{ask_question}', [AskQuestionController::class, 'update'])->name('update');
            });

            Route::prefix('courses')->name('courses.')->group(function() {
                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('{course}', [CourseController::class, 'show'])->name('show');
                Route::get('{course}/{course_module}/{course_chapter}', [CourseController::class, 'showMore'])->name('show-more');
            });

            Route::prefix('carts')->name('carts.')->group(function() {
                Route::get('/', [CartController::class, 'index'])->name('index');
                Route::post('/', [CartController::class, 'store'])->name('store');
                Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('update-quantity');
                Route::post('delete-item', [CartController::class, 'destroy'])->name('destroy');
            });

            Route::get('my-orders', [MyOrderController::class, 'index'])->name('my-orders');
            
            Route::get('my-storage', [MyStorageController::class, 'index'])->name('my-storage');

            Route::prefix('refer-friends')->name('refer-friends.')->group(function() {
                Route::get('/', [ReferFriendController::class, 'index'])->name('index');
                Route::post('/', [ReferFriendController::class, 'store'])->name('store');
            });

            Route::prefix('profile')->name('profile.')->group(function() {
                Route::get('/', [ProfileController::class, 'index'])->name('index');
                Route::post('/', [ProfileController::class, 'update'])->name('update');
            });

            Route::get('buy-study-materials', [BuyStudyMaterialController::class, 'index'])->name('buy-study-materials');

            Route::get('member-corner', [MemberCornerController::class, 'index'])->name('member-corner');


            

            Route::get('qualifications', [QualificationsController::class, 'index'])->name('qualifications');
        });
    // Student routes 
});