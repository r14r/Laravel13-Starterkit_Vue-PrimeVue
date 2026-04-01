<?php

use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
});

Route::middleware(['auth'])->prefix('primevue')->group(function () {
    Route::inertia('/', 'primevue/Index')->name('primevue.index');
    Route::inertia('/buttons', 'primevue/Buttons')->name('primevue.buttons');
    Route::inertia('/form', 'primevue/FormComponents')->name('primevue.form');
    Route::inertia('/data', 'primevue/DataComponents')->name('primevue.data');
    Route::inertia('/panels', 'primevue/PanelComponents')->name('primevue.panels');
    Route::inertia('/overlay', 'primevue/OverlayComponents')->name('primevue.overlay');
    Route::inertia('/messages', 'primevue/Messages')->name('primevue.messages');
    Route::inertia('/media', 'primevue/MediaMisc')->name('primevue.media');
    Route::inertia('/navigation', 'primevue/Navigation')->name('primevue.navigation');
    Route::inertia('/charts', 'primevue/Charts')->name('primevue.charts');
    Route::inertia('/misc', 'primevue/MiscComponents')->name('primevue.misc');
    Route::inertia('/file', 'primevue/FileUpload')->name('primevue.file');
});

require __DIR__.'/settings.php';
