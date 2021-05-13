<?php

namespace App\Http;

use App\Http\Middleware\branch_create;
use App\Http\Middleware\branch_delete;
use App\Http\Middleware\branch_edit;
use App\Http\Middleware\branch_index;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\collection_createAssign_btn;
use App\Http\Middleware\collection_createCollection_btn;
use App\Http\Middleware\collection_createComment_btn;
use App\Http\Middleware\collection_onethirty_index;
use App\Http\Middleware\file_import;
use App\Http\Middleware\IT;
use App\Http\Middleware\permission_create;
use App\Http\Middleware\permission_delete;
use App\Http\Middleware\permission_edit;
use App\Http\Middleware\permission_index;
use App\Http\Middleware\portfolio_index;
use App\Http\Middleware\region_create;
use App\Http\Middleware\region_delete;
use App\Http\Middleware\region_edit;
use App\Http\Middleware\region_index;
use App\Http\Middleware\role_ban;
use App\Http\Middleware\role_create;
use App\Http\Middleware\role_delete;
use App\Http\Middleware\role_edit;
use App\Http\Middleware\role_index;
use App\Http\Middleware\SuperUser;
use App\Http\Middleware\Ticket_Approve_ACC;
use App\Http\Middleware\Ticket_Approve_BM;
use App\Http\Middleware\Ticket_Approve_IT;
use App\Http\Middleware\Ticket_Approve_SP;
use App\Http\Middleware\ticket_create;
use App\Http\Middleware\ticket_index;
use App\Http\Middleware\ticket_reject;
use App\Http\Middleware\user_ban;
use App\Http\Middleware\user_create;
use App\Http\Middleware\user_delete;
use App\Http\Middleware\user_edit;
use App\Http\Middleware\user_index;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'checkLogin' => CheckLogin::class,
        'superuser' => SuperUser::class,
        'IT'=>IT::class,

        'user_create' => user_create::class,
        'user_index' => user_index::class,
        'user_edit' => user_edit::class,
        'user_delete' => user_delete::class,
        'user_ban' => user_ban::class,

        'role_create' => role_create::class,
        'role_index' => role_index::class,
        'role_edit' => role_edit::class,
        'role_delete' => role_delete::class,
        'role_ban' => role_ban::class,

        'permission_create' => permission_create::class,
        'permission_index' => permission_index::class,
        'permission_edit' => permission_edit::class,
        'permission_delete' => permission_delete::class,

        'region_create' => region_create::class,
        'region_index' => region_index::class,
        'region_edit'  => region_edit::class,
        'region_delete' => region_delete::class,

        'branch_create' => branch_create::class,
        'branch_index' => branch_index::class,
        'branch_edit' =>  branch_edit::class,
        'branch_delete' => branch_delete::class,

        'ticket_create' => ticket_create::class,
        'ticket_index'  =>  ticket_index::class,
        'ticket_reject' =>  ticket_reject::class,

        'Ticket_Approve_SP' => Ticket_Approve_SP::class,
        'Ticket_Approve_ACC' => Ticket_Approve_ACC::class,
        'Ticket_Approve_BM' => Ticket_Approve_BM::class,
        'Ticket_Approve_IT' =>  Ticket_Approve_IT::class,

        'portfolio_index' => portfolio_index::class,
        'file_import'     => file_import::class,

        'collection_onethirty_index' => collection_onethirty_index::class,
        'collection_createAssign_btn' => collection_createAssign_btn::class,
        'collection_createCollection_btn' => collection_createCollection_btn::class,
        'collection_createComment_btn' => collection_createComment_btn::class,


    ];
}
