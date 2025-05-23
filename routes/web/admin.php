<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Settings\AdminController;
use App\Http\Controllers\Admin\Settings\ClientController;
use App\Http\Controllers\Admin\Settings\ContactUsController;
use App\Http\Controllers\Admin\Settings\FaqsController;
use App\Http\Controllers\Admin\Settings\HomepageWidgetController;
use App\Http\Controllers\Admin\Settings\InfoController;
use App\Http\Controllers\Admin\Settings\LanguageController;
use App\Http\Controllers\Admin\Settings\PageController;
use App\Http\Controllers\Admin\Settings\PaymentController;
use App\Http\Controllers\Admin\Settings\ReviewController;
use App\Http\Controllers\Admin\Settings\ServiceController;
use App\Http\Controllers\Admin\Settings\SliderController;
use App\Http\Controllers\Admin\Settings\StoryController;
use App\Http\Controllers\Admin\Settings\TopMenuController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400, 'Language not supported');
    }
    App::setlocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');





Route::prefix('/admin')->group(function () {

    Route::get('/', function () {
        return view(
            'admin/auth/boxed/sign-in',
            [
                'catName' => 'auth',
                'title' => 'Sign In',
                "breadcrumbs" => ["Authentication", "Sign In"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('login');



    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login/check', [LoginController::class, 'check'])->name('login.check');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');






    Route::prefix('/settings')->group(function () {

        Route::prefix('/info')->group(function () {

            Route::get('/', [InfoController::class, 'index'])->name('admin.settings.index');
            Route::get('/{setting}/update', [InfoController::class, 'update'])->name('admin.settings.update');
            Route::get('/{setting}/update/image', [InfoController::class, 'edit'])->name('admin.settings.update.image');

            Route::put('/{setting}/update', [InfoController::class, 'update'])->name('admin.settings.update.post');
            Route::post('/{setting}/update/image', [InfoController::class, 'updateImage'])->name('admin.settings.update.image.post');
        });

        Route::prefix('/stories')->group(function () {

            Route::get('/', [StoryController::class, 'index'])->name('admin.stories.index');

            Route::get('/create', [StoryController::class, 'create'])->name('admin.stories.create');

            Route::post('', [StoryController::class, 'store'])->name('admin.stories.store');

            Route::get('/{story}/edit', [StoryController::class, 'edit'])->name('admin.stories.edit');

            Route::put('/{story}', [StoryController::class, 'update'])->name('admin.stories.update');

            Route::delete('/{story}', [StoryController::class, 'destroy'])->name('admin.stories.destroy');
        });


        Route::prefix('/pages')->group(function () {

            Route::get('/', [PageController::class, 'index'])->name('admin.pages.index');
            Route::get('/create', [PageController::class, 'create'])->name('admin.pages.create');
            Route::post('', [PageController::class, 'store'])->name('admin.pages.store');
            Route::get('/{page}/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
            Route::put('/{page}', [PageController::class, 'update'])->name('admin.pages.update');
            Route::delete('/{page}', [PageController::class, 'destroy'])->name('admin.pages.destroy');


            // Routes for AJAX actions
            Route::post('/useful-links', [PageController::class, 'toggleUsefulLinks'])->name('admin.pages.useful-links');
            Route::post('/top-menu', [PageController::class, 'toggleTopMenu'])->name('admin.pages.top-menu');
            Route::post('/change-ordering', [PageController::class, 'changeOrdering'])->name('admin.pages.change-ordering');
        });



        Route::prefix('/faqs')->group(function () {
            Route::get('/', [FaqsController::class, 'index'])->name('admin.faqs.index');
            Route::get('/create', [FaqsController::class, 'create'])->name('admin.faqs.create');
            Route::post('/store', [FaqsController::class, 'store'])->name('admin.faqs.store');
            Route::delete('/{faq}', [FaqsController::class, 'destroy'])->name('admin.faqs.delete');
        });


        Route::prefix('/contact_us')->group(function () {
            Route::get('/', [ContactUsController::class, 'index'])
                ->name('admin.contact_us.index');

            Route::get('/{id}', [ContactUsController::class, 'show'])
                ->name('admin.contact_us.show');

            Route::delete('/{id}', [ContactUsController::class, 'destroy'])
                ->name('admin.contact_us.delete');
        });


        Route::prefix('/reviews')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('admin.reviews.index');
            Route::delete('/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.delete');
        });

        Route::prefix('/admins')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.admins.index');
            Route::get('/create', [AdminController::class, 'create'])->name('admin.admins.create');
            Route::post('/store', [AdminController::class, 'store'])->name('admin.admins.store');
            Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.admins.edit');
            Route::put('/{admin}', [AdminController::class, 'update'])->name('admin.admins.update');
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.admins.delete');
        });


        Route::prefix('/payments')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.payments.index');
            Route::get('/create', [PaymentController::class, 'create'])->name('admin.payments.create');
            Route::post('/store', [PaymentController::class, 'store'])->name('admin.payments.store');
            Route::get('/{payment}/edit', [PaymentController::class, 'edit'])->name('admin.payments.edit');
            Route::put('/{payment}', [PaymentController::class, 'update'])->name('admin.payments.update');
            Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('admin.payments.delete');

            Route::post('/fetch_students', [PaymentController::class, 'fetchStudents'])->name('fetch_students');
            Route::post('/fetch_courses', [PaymentController::class, 'fetchCourses'])->name('fetch_courses');
        });

        Route::prefix('/clients')->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('admin.clients.index');
            Route::get('/create', [ClientController::class, 'create'])->name('admin.clients.create');
            Route::post('/store', [ClientController::class, 'store'])->name('admin.clients.store');
            Route::get('/{admin}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
            Route::put('/{admin}', [ClientController::class, 'update'])->name('admin.clients.update');
            Route::delete('/{id}', [ClientController::class, 'destroy'])->name('admin.clients.delete');


            Route::put('change-ordering', [ClientController::class, 'changeOrdering'])
                ->name('admin.client.change-ordering');

            Route::put('change-programs-count', [ClientController::class, 'changeProgramsCount'])
                ->name('admin.client.change-programs-count');
        });

        Route::prefix('top-menu')->group(function () {
            Route::get('/', [TopMenuController::class, 'index'])->name('admin.top-menu.index');
            Route::post('/', [TopMenuController::class, 'store'])->name('admin.top-menu.store');
            Route::put('/status', [TopMenuController::class, 'updateStatus'])->name('admin.top-menu.status');
            Route::delete('/{id}', [TopMenuController::class, 'destroy'])->name('admin.top-menu.destroy');
        });


        Route::prefix('sliders')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('admin.sliders.index');
            Route::get('/create', [SliderController::class, 'create'])->name('admin.sliders.create');
            Route::post('/', [SliderController::class, 'store'])->name('admin.sliders.store');
            Route::delete('/{id}', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
        });

        Route::prefix('homepage_widgets')->group(function () {
            Route::get('/', [HomepageWidgetController::class, 'index'])->name('admin.homepage_widgets.index');
            Route::get('/create', [HomepageWidgetController::class, 'create'])->name('admin.homepage_widgets.create');
            Route::post('/', [HomepageWidgetController::class, 'store'])->name('admin.homepage_widgets.store');
            Route::get('/{widget}/edit', [HomepageWidgetController::class, 'edit'])->name('admin.homepage_widgets.edit');
            Route::put('/{widget}', [HomepageWidgetController::class, 'update'])->name('admin.homepage_widgets.update');
            Route::delete('/{id}', [HomepageWidgetController::class, 'destroy'])->name('admin.homepage_widgets.destroy');

            Route::post('/update-status', [HomepageWidgetController::class, 'updateStatus'])->name('admin.homepage_widgets.update_status');
            Route::post('/change-ordering', [HomepageWidgetController::class, 'changeOrdering'])->name('admin.homepage_widgets.change_ordering');
            Route::post('/change-effect', [HomepageWidgetController::class, 'changeEffect'])->name('admin.homepage_widgets.change_effect');
            Route::post('/change-effect-duration', [HomepageWidgetController::class, 'changeEffectDuration'])->name('admin.homepage_widgets.change_effect_duration');
        });

        Route::prefix('languages')->group(function () {
            Route::get('/', [LanguageController::class, 'index'])->name('admin.languages.index');
            Route::get('/create', [LanguageController::class, 'create'])->name('admin.languages.create');
            Route::post('/', [LanguageController::class, 'store'])->name('admin.languages.store');
            Route::delete('/{id}', [LanguageController::class, 'destroy'])->name('admin.languages.destroy');


            Route::patch('/{id}/toggle-active', [LanguageController::class, 'toggleActive'])
                ->name('admin.settings.languages.toggle.active');

            Route::patch('/{id}/toggle-main', [LanguageController::class, 'toggleMain'])
                ->name('admin.settings.languages.toggle.main');
        });

        Route::prefix('services')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('admin.services.index');
            Route::get('/create', [ServiceController::class, 'create'])->name('admin.services.create');
            Route::post('/', [ServiceController::class, 'store'])->name('admin.services.store');
            Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
            Route::put('/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
            Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        });
    });











    //  -------------------------------------------------
    //-------------------------------------------------
    Route::get('/lockscreen', function () {
        // return 'boxed-lockscreen';
        return view(
            'admin/auth/boxed/unlock',
            [
                'catName' => 'auth',
                'title' => 'LockScreen Boxed',
                "breadcrumbs" => ["Authentication", "LockScreen"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('boxedLockscreen');
    Route::get('/password-reset', function () {
        // return 'boxed-password-reset';
        return view(
            'admin/auth/boxed/reset',
            [
                'catName' => 'auth',
                'title' => 'Password Reset Boxed',
                "breadcrumbs" => ["Authentication", "Password Reset"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('boxedPasswordReset');
    Route::get('/2-step-verification', function () {
        // return 'boxed-2-step-verification';
        return view(
            'admin/auth/boxed/2-step',
            [
                'catName' => 'auth',
                'title' => '2 Step Verification Boxed',
                "breadcrumbs" => ["Authentication", "2 Step Verification"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('boxed2sv');
});


/**
 * =======================
 *          Dashboard
 * =======================
 */
Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view(
            'admin/settings/analytics',
            [
                'catName' => 'dashboard',
                'title' => 'CORK Admin - Multipurpose Bootstrap Dashboard Template',
                "breadcrumbs" => ["Dashboard", "Analytics"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('dashboard');

    Route::get('/sales', function () {
        return view(
            'admin/dashboard/sales',
            [
                'catName' => 'dashboard',
                'title' => 'Sales Admin',
                "breadcrumbs" => ["Dashboard", "Sales"],
                'scrollspy' => 0,
                'simplePage' => 0,
            ]
        );
    })->name('sales');
});


/**
 * =======================
 *          Apps
 * =======================
 */
Route::prefix('app')->group(function () {
    Route::get('/calendar', function () {
        return view(
            'admin/apps/calendar',
            [
                'catName' => 'app',
                'title' => 'Javascript Calendar',
                "breadcrumbs" => ["Apps", "Calendar"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('calendar');
    Route::get('/chat', function () {
        return view(
            'admin/apps/chat',
            [
                'catName' => 'app',
                'title' => 'Chat Application',
                "breadcrumbs" => ["Apps", "Chat"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('chat');
    Route::get('/contacts', function () {
        return view(
            'admin/apps/contacts',
            [
                'catName' => 'app',
                'title' => 'Contact Profile',
                "breadcrumbs" => ["Apps", "Contact"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('contacts');
    Route::get('/mailbox', function () {
        return view(
            'admin/apps/mailbox',
            [
                'catName' => 'app',
                'title' => 'Mailbox',
                "breadcrumbs" => ["Apps", "analytics"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('mailbox');
    Route::get('/notes', function () {
        return view(
            'admin/apps/notes',
            [
                'catName' => 'app',
                'title' => 'Notes',
                "breadcrumbs" => ["Apps", "analytics"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('notes');
    Route::get('/scrumboard', function () {
        return view(
            'admin/apps/scrumboard',
            [
                'catName' => 'app',
                'title' => 'Scrum Task Board',
                "breadcrumbs" => ["Apps", "Scrumboard"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('scrumboard');
    Route::get('/todolist', function () {
        return view(
            'admin/apps/todo-list',
            [
                'catName' => 'app',
                'title' => 'Todo List',
                "breadcrumbs" => ["Apps", "Todo List"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('todolist');

    // Apps => Invoice
    Route::prefix('invoice')->group(function () {
        Route::get('/create', function () {
            return view(
                'admin/apps/invoice/create',
                [
                    'catName' => 'app',
                    'submenu' => 'invoice',
                    'title' => 'Invoice Add',
                    "breadcrumbs" => ["Apps", "Invoice", "Create"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('icreate');
        Route::get('/edit', function () {
            return view(
                'admin/apps/invoice/edit',
                [
                    'catName' => 'app',
                    'submenu' => 'invoice',
                    'title' => 'Invoice Edit',
                    "breadcrumbs" => ["Apps", "Invoice", "Edit"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('iedit');
        Route::get('/list', function () {
            return view(
                'admin/apps/invoice/list',
                [
                    'catName' => 'app',
                    'submenu' => 'invoice',
                    'title' => 'Invoice List',
                    "breadcrumbs" => ["Apps", "Invoice", "List"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('ilist');
        Route::get('/preview', function () {
            return view(
                'admin/apps/invoice/preview',
                [
                    'catName' => 'app',
                    'submenu' => 'invoice',
                    'title' => 'Invoice Preview',
                    "breadcrumbs" => ["Apps", "Invoice", "Preview"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('ipreview');
    });

    // Apps => Ecommerce
    Route::prefix('ecommerce')->group(function () {
        Route::get('/create', function () {
            return view(
                'admin/apps/ecommerce/create',
                [
                    'catName' => 'app',
                    'submenu' => 'ecommerce',
                    'title' => 'Ecommerce Create',
                    "breadcrumbs" => ["Apps", "Ecommerce", "Create"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bcreate');
        Route::get('/edit', function () {
            return view(
                'admin/apps/ecommerce/edit',
                [
                    'catName' => 'app',
                    'submenu' => 'ecommerce',
                    'title' => 'Ecommerce Edit',
                    "breadcrumbs" => ["Apps", "Ecommerce", "Edit"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bedit');
        Route::get('/list', function () {
            return view(
                'admin/apps/ecommerce/list',
                [
                    'catName' => 'app',
                    'submenu' => 'ecommerce',
                    'title' => 'Ecommerce List',
                    "breadcrumbs" => ["Apps", "Ecommerce", "List"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('blist');
        Route::get('/product', function () {
            return view(
                'admin/apps/ecommerce/product',
                [
                    'catName' => 'app',
                    'submenu' => 'ecommerce',
                    'title' => 'Ecommerce Product Details',
                    "breadcrumbs" => ["Apps", "Ecommerce", "Product"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bproduct');
        Route::get('/shop', function () {
            return view(
                'admin/apps/ecommerce/shop',
                [
                    'catName' => 'app',
                    'submenu' => 'ecommerce',
                    'title' => 'Ecommerce Shop',
                    "breadcrumbs" => ["Apps", "Ecommerce", "Shop"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bshop');
    });

    // Apps => Blog
    Route::prefix('blog')->group(function () {
        Route::get('/create', function () {
            return view(
                'admin/apps/blog/create',
                [
                    'catName' => 'app',
                    'submenu' => 'blog',
                    'title' => 'Blog Create',
                    "breadcrumbs" => ["Apps", "Blog", "Create"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bcreate');
        Route::get('/edit', function () {
            return view(
                'admin/apps/blog/edit',
                [
                    'catName' => 'app',
                    'submenu' => 'blog',
                    'title' => 'Blog Edit',
                    "breadcrumbs" => ["Apps", "Blog", "Edit"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bedit');
        Route::get('/list', function () {
            return view(
                'admin/apps/blog/list',
                [
                    'catName' => 'app',
                    'submenu' => 'blog',
                    'title' => 'Blog List',
                    "breadcrumbs" => ["Apps", "Blog", "List"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('blist');
        Route::get('/grid', function () {
            return view(
                'admin/apps/blog/grid',
                [
                    'catName' => 'app',
                    'submenu' => 'blog',
                    'title' => 'Blog',
                    "breadcrumbs" => ["Apps", "Blog", "Grid"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bgrid');
        Route::get('/post', function () {
            return view(
                'admin/apps/blog/post',
                [
                    'catName' => 'app',
                    'submenu' => 'blog',
                    'title' => 'Post Content',
                    "breadcrumbs" => ["Apps", "Blog", "Post"],
                    'scrollspy' => 0,
                    'simplePage' => 0
                ]
            );
        })->name('bpost');
    });
});


/**
 * =======================
 *          Components
 * =======================
 */
Route::prefix('component')->group(function () {
    Route::get('/tabs', function () {
        return view(
            'admin/components/tabs',
            [
                'catName' => 'component',
                'title' => 'Tabs',
                "breadcrumbs" => ["Component", "Tabs"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('tabs');
    Route::get('/accordions', function () {
        return view(
            'admin/components/accordions',
            [
                'catName' => 'component',
                'title' => 'Accordions',
                "breadcrumbs" => ["Component", "Accordions"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('accordions');
    Route::get('/modals', function () {
        return view(
            'admin/components/modals',
            [
                'catName' => 'component',
                'title' => 'Modals',
                "breadcrumbs" => ["Component", "Modals"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('modals');
    Route::get('/cards', function () {
        return view(
            'admin/components/cards',
            [
                'catName' => 'component',
                'title' => 'Card',
                "breadcrumbs" => ["Component", "Cards"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('cards');
    Route::get('/carousel', function () {
        return view(
            'admin/components/carousel',
            [
                'catName' => 'component',
                'title' => 'Bootstrap Carousel',
                "breadcrumbs" => ["Component", "Carousel"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('carousel');
    Route::get('/splide', function () {
        return view(
            'admin/components/splide',
            [
                'catName' => 'component',
                'title' => 'Splide',
                "breadcrumbs" => ["Component", "Splide"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('splide');
    Route::get('/sweet-alerts', function () {
        return view(
            'admin/components/sweetalerts',
            [
                'catName' => 'component',
                'title' => 'SweetAlert',
                "breadcrumbs" => ["Component", "Sweetalerts"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('sweetAlert');
    Route::get('/timeline', function () {
        return view(
            'admin/components/timeline',
            [
                'catName' => 'component',
                'title' => 'Timeline',
                "breadcrumbs" => ["Component", "Timeline"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('timeline');
    Route::get('/notifications', function () {
        return view(
            'admin/components/notifications',
            [
                'catName' => 'component',
                'title' => 'Snackbar',
                "breadcrumbs" => ["Component", "Notifications"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('notifications');
    Route::get('/media-objects', function () {
        return view(
            'admin/components/media-object',
            [
                'catName' => 'component',
                'title' => 'Media Object',
                "breadcrumbs" => ["Component", "Media Objects"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('mediaObject');
    Route::get('/list-group', function () {
        return view(
            'admin/components/list-group',
            [
                'catName' => 'component',
                'title' => 'List Group',
                "breadcrumbs" => ["Component", "List Group"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('listGroup');
    Route::get('/pricing-tables', function () {
        return view(
            'admin/components/pricing-tables',
            [
                'catName' => 'component',
                'title' => 'Pricing Tables',
                "breadcrumbs" => ["Component", "Pricing Tables"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('pricingTable');
    Route::get('/lightbox', function () {
        return view(
            'admin/components/lightbox',
            [
                'catName' => 'component',
                'title' => 'Lightbox',
                "breadcrumbs" => ["Component", "Lightbox"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('lightbox');
    Route::get('/drag-drop', function () {
        return view(
            'admin/components/drag-drop',
            [
                'catName' => 'component',
                'title' => 'Dragula Drag and Drop',
                "breadcrumbs" => ["Component", "Drag and Drop"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('dragDrop');
    Route::get('/font-icons', function () {
        return view(
            'admin/components/font-icon',
            [
                'catName' => 'component',
                'title' => 'Fonticon Icon',
                "breadcrumbs" => ["Component", "Font Icons"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('fontIcons');
    Route::get('/flag-icons', function () {
        return view(
            'admin/components/flag-icon',
            [
                'catName' => 'component',
                'title' => 'SVG Flag Icons',
                "breadcrumbs" => ["Component", "Flag Icons"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('flagIcons');
});


/**
 * =======================
 *          Elements
 * =======================
 */
Route::prefix('element')->group(function () {
    Route::get('/alerts', function () {
        return view(
            'admin/elements/alerts',
            [
                'catName' => 'element',
                'title' => 'Alerts',
                "breadcrumbs" => ["Element", "Alerts"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('alerts');
    Route::get('/avatar', function () {
        return view(
            'admin/elements/avatar',
            [
                'catName' => 'element',
                'title' => 'Avatar',
                "breadcrumbs" => ["Element", "Avatar"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('avatar');
    Route::get('/badges', function () {
        return view(
            'admin/elements/badges',
            [
                'catName' => 'element',
                'title' => 'Badge',
                "breadcrumbs" => ["Element", "Badge"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('badges');
    Route::get('/breadcrumbs', function () {
        return view(
            'admin/elements/breadcrumbs',
            [
                'catName' => 'element',
                'title' => 'Breadcrumb',
                "breadcrumbs" => ["Element", "Breadcrumb"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('breadcrumbs');
    Route::get('/button-groups', function () {
        return view(
            'admin/elements/button-groups',
            [
                'catName' => 'element',
                'title' => 'Button Group',
                "breadcrumbs" => ["Element", "Button Group"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('buttonGroups');
    Route::get('/buttons', function () {
        return view(
            'admin/elements/buttons',
            [
                'catName' => 'element',
                'title' => 'Bootstrap Buttons',
                "breadcrumbs" => ["Element", "Bootstrap Buttons"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('buttons');
    Route::get('/color-library', function () {
        return view(
            'admin/elements/color-lib',
            [
                'catName' => 'element',
                'title' => 'Color Library',
                "breadcrumbs" => ["Element", "Color Library"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('colorLibrary');
    Route::get('/dropdown', function () {
        return view(
            'admin/elements/dropdown',
            [
                'catName' => 'element',
                'title' => 'Dropdown',
                "breadcrumbs" => ["Element", "Dropdown"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('dropdown');
    Route::get('/infobox', function () {
        return view(
            'admin/elements/infobox',
            [
                'catName' => 'element',
                'title' => 'Infobox',
                "breadcrumbs" => ["Element", "Infobox"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('infobox');
    Route::get('/loader', function () {
        return view(
            'admin/elements/loader',
            [
                'catName' => 'element',
                'title' => 'Loaders',
                "breadcrumbs" => ["Element", "Loaders"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('loader');
    Route::get('/pagination', function () {
        return view(
            'admin/elements/pagination',
            [
                'catName' => 'element',
                'title' => 'Pagination',
                "breadcrumbs" => ["Element", "Pagination"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('pagination');
    Route::get('/popovers', function () {
        return view(
            'admin/elements/popovers',
            [
                'catName' => 'element',
                'title' => 'Popovers',
                "breadcrumbs" => ["Element", "Popovers"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('popovers');
    Route::get('/progressbar', function () {
        return view(
            'admin/elements/progress-bar',
            [
                'catName' => 'element',
                'title' => 'Bootstrap Progress Bar',
                "breadcrumbs" => ["Element", "Bootstrap Progress Bar"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('progressbar');
    Route::get('/search', function () {
        return view(
            'admin/elements/search',
            [
                'catName' => 'element',
                'title' => 'Search',
                "breadcrumbs" => ["Element", "Search"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('search');
    Route::get('/tooltips', function () {
        return view(
            'admin/elements/tooltips',
            [
                'catName' => 'element',
                'title' => 'Tooltips',
                "breadcrumbs" => ["Element", "Tooltips"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('tooltips');
    Route::get('/treeview', function () {
        return view(
            'admin/elements/treeview',
            [
                'catName' => 'element',
                'title' => 'Tree View',
                "breadcrumbs" => ["Element", "Tree View"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('treeview');
    Route::get('/typography', function () {
        return view(
            'admin/elements/typography',
            [
                'catName' => 'element',
                'title' => 'Typography',
                "breadcrumbs" => ["Element", "Typography"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('typography');
});


/**
 * =======================
 *          Maps
 * =======================
 */
Route::get('/maps', function () {
    return view(
        'admin/maps',
        [
            'catName' => 'maps',
            'title' => 'jVector Maps',
            "breadcrumbs" => ["Maps"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]
    );
})->name('maps');


/**
 * =======================
 *          Charts
 * =======================
 */
Route::get('/charts', function () {
    return view(
        'admin/charts',
        [
            'catName' => 'charts',
            'title' => 'Apex Chart',
            "breadcrumbs" => ["User Interface", "Chart"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]
    );
})->name('charts');


/**
 * =======================
 *          Widgets
 * =======================
 */
Route::get('/widgets', function () {
    return view(
        'admin/widgets',
        [
            'catName' => 'widgets',
            'title' => 'Widgets',
            "breadcrumbs" => ["User Interface", "Widgets"],
            'scrollspy' => 0,
            'simplePage' => 0
        ]
    );
})->name('widgets');




/**
 * =======================
 *          Tables => Datatable
 * =======================
 */
Route::prefix('datatable')->group(function () {
    Route::get('/basic', function () {
        return view(
            'admin/datatables/basic',
            [
                'catName' => 'datatable',
                'title' => 'DataTables Basic',
                "breadcrumbs" => ["DataTables", "Basic"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('basic');
    Route::get('/striped', function () {
        return view(
            'admin/datatables/striped',
            [
                'catName' => 'datatable',
                'title' => 'DataTables Striped',
                "breadcrumbs" => ["DataTables", "Striped"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('striped');
    Route::get('/custom', function () {
        return view(
            'admin/datatables/custom',
            [
                'catName' => 'datatable',
                'title' => 'Custom DataTables',
                "breadcrumbs" => ["DataTables", "Custom"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('custom');
    Route::get('/miscellaneous', function () {
        return view(
            'admin/datatables/miscellaneous',
            [
                'catName' => 'datatable',
                'title' => 'Miscellaneous DataTables',
                "breadcrumbs" => ["DataTables", "Miscellaneous"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('miscellaneous');
});


/**
 * =======================
 *          Forms
 * =======================
 */
Route::prefix('form')->group(function () {
    Route::get('/auto-complete', function () {
        return view(
            'admin/forms/auto-complete',
            [
                'catName' => 'form',
                'title' => 'AutoComplete',
                "breadcrumbs" => ["Form", "AutoComplete"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('autoComplete');
    Route::get('/basic', function () {
        return view(
            'admin/forms/basic',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Forms',
                "breadcrumbs" => ["Form", "Basic"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('basic');
    Route::get('/checkbox', function () {
        return view(
            'admin/forms/checkbox',
            [
                'catName' => 'form',
                'title' => 'Checkbox',
                "breadcrumbs" => ["Form", "Checkbox"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('checkbox');
    Route::get('/clipboard', function () {
        return view(
            'admin/forms/clipboard',
            [
                'catName' => 'form',
                'title' => 'Clipboard',
                "breadcrumbs" => ["Form", "Clipboard"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('clipboard');
    Route::get('/date-time-picker', function () {
        return view(
            'admin/forms/date-time-picker',
            [
                'catName' => 'form',
                'title' => 'Date and Time Picker',
                "breadcrumbs" => ["Form", "Date Time Picker"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('dateTimePicker');
    Route::get('/file-upload', function () {
        return view(
            'admin/forms/file-upload',
            [
                'catName' => 'form',
                'title' => 'File Upload',
                "breadcrumbs" => ["Form", "File Upload"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('fileUpload');
    Route::get('/input-group', function () {
        return view(
            'admin/forms/input-group',
            [
                'catName' => 'form',
                'title' => 'Input Group',
                "breadcrumbs" => ["Form", "Input Group"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('inputGroup');
    Route::get('/input-mask', function () {
        return view(
            'admin/forms/input-mask',
            [
                'catName' => 'form',
                'title' => 'Input Mask',
                "breadcrumbs" => ["Form", "Input Mask"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('inputMask');
    Route::get('/layouts', function () {
        return view(
            'admin/forms/layouts',
            [
                'catName' => 'form',
                'title' => 'Form Layouts',
                "breadcrumbs" => ["Form", "Layouts"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('layouts');
    Route::get('/markdown-editor', function () {
        return view(
            'admin/forms/markdown-editor',
            [
                'catName' => 'form',
                'title' => 'Markdown Editor',
                "breadcrumbs" => ["Form", "Markdown"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('markdownEditor');
    Route::get('/maxlength', function () {
        return view(
            'admin/forms/maxlength',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Maxlength',
                "breadcrumbs" => ["Form", "Maxlength"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('maxlength');
    Route::get('/quill-editor', function () {
        return view(
            'admin/forms/quill-editor',
            [
                'catName' => 'form',
                'title' => 'Quill Editor',
                "breadcrumbs" => ["Form", "Quill"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('quillEditor');
    Route::get('/radio', function () {
        return view(
            'admin/forms/radio',
            [
                'catName' => 'form',
                'title' => 'Radio',
                "breadcrumbs" => ["Form", "Radio"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('radio');
    Route::get('/slider', function () {
        return view(
            'admin/forms/slider',
            [
                'catName' => 'form',
                'title' => 'Range Slider',
                "breadcrumbs" => ["Form", "Range Slider"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('slider');
    Route::get('/switches', function () {
        return view(
            'admin/forms/switches',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Toggle',
                "breadcrumbs" => ["Form", "Toggle"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('switches');
    Route::get('/tagify', function () {
        return view(
            'admin/forms/tagify',
            [
                'catName' => 'form',
                'title' => 'Tagify',
                "breadcrumbs" => ["Form", "Tagify"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('tagify');
    Route::get('/tom-select', function () {
        return view(
            'admin/forms/tom-select',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Select',
                "breadcrumbs" => ["Form", "Tom Select"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('tomSelect');
    Route::get('/touchspin', function () {
        return view(
            'admin/forms/touch-spin',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Touchspin',
                "breadcrumbs" => ["Form", "Touchspin"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('touchspin');
    Route::get('/validation', function () {
        return view(
            'admin/forms/validation',
            [
                'catName' => 'form',
                'title' => 'Bootstrap Form Validation',
                "breadcrumbs" => ["Form", "Validation"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('validation');
    Route::get('/wizards', function () {
        return view(
            'admin/forms/wizards',
            [
                'catName' => 'form',
                'title' => 'Wizards',
                "breadcrumbs" => ["Form", "Wizards"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    })->name('wizards');
});


/**
 * =======================
 *          Layout
 * =======================
 */
Route::prefix('layout')->group(function () {
    Route::get('/blank', function () {
        return view(
            'admin/layouts/blank',
            [
                'catName' => 'layout',
                'title' => 'Blank Page',
                "breadcrumbs" => ["Layout", "Blank"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('blank');
    Route::get('/empty', function () {
        return view(
            'admin/layouts/empty',
            [
                'catName' => 'layout',
                'title' => 'Empty Page',
                "breadcrumbs" => ["Layout", "Empty"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('empty');
    Route::get('/full-width', function () {
        return view(
            'admin/layouts/full-width',
            [
                'catName' => 'layout',
                'title' => 'Full Width',
                "breadcrumbs" => ["Layout", "Full Width"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('full-width');
    Route::get('/collapsible', function () {
        return view(
            'admin/layouts/collapsed',
            [
                'catName' => 'layout',
                'title' => 'Collapsible Menu',
                "breadcrumbs" => ["Layout", "Collapsible"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('collapsed');
});


/**
 * =======================
 *          Users
 * =======================
 */
Route::prefix('user')->group(function () {
    Route::get('/account-setting', function () {
        return view(
            'admin/users/account-settings',
            [
                'catName' => 'user',
                'title' => 'Account Settings',
                "breadcrumbs" => ["User", "Account Settings"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('accountSetting');
    Route::get('/profile', function () {
        return view(
            'admin/users/profile',
            [
                'catName' => 'user',
                'title' => 'User Profile',
                "breadcrumbs" => ["User", "Profile"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('profile');
});


/**
 * =======================
 *          Pages
 * =======================
 */
Route::prefix('pages')->group(function () {
    Route::get('/knowledge-base', function () {
        return view(
            'admin/pages/knowledge-base',
            [
                'catName' => 'page',
                'title' => 'Knowledge Base',
                "breadcrumbs" => ["Pages", "Knowledge Base"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('knowledgeBase');
    Route::get('/faq', function () {
        return view(
            'admin/pages/faq',
            [
                'catName' => 'page',
                'title' => 'FAQs',
                "breadcrumbs" => ["Pages", "FAQs"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('faq');
    Route::get('/contact-us', function () {
        return view(
            'admin/pages/contact-form',
            [
                'catName' => 'page',
                'title' => 'Contact Us',
                "breadcrumbs" => ["Pages", "Contact Us"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    })->name('contactForm');
    Route::get('/404', function () {
        return view(
            'admin/pages/404',
            [
                'catName' => 'page',
                'title' => '404',
                "breadcrumbs" => ["Pages", "404"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('error404');
    Route::get('/maintenance', function () {
        return view(
            'admin/pages/maintenance',
            [
                'catName' => 'page',
                'title' => 'Maintenence',
                "breadcrumbs" => ["Pages", "Maintenence"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    })->name('maintenance');
});
