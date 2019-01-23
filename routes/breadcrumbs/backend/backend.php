<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(
        __('strings.backend.dashboard.title'),
        route('admin.dashboard')
    );
});

//start_Person_start
Breadcrumbs::register('admin.man.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(
        __('strings.backend.men.title'),
        route('admin.man.index')
    );
});

Breadcrumbs::register('admin.man.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.man.index');
    $breadcrumbs->push(
        __('labels.backend.men.create'),
        route('admin.man.create')
    );
});

Breadcrumbs::register('admin.man.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.man.index');
    $breadcrumbs->push(
        __('menus.backend.men.view'),
        route('admin.man.show', $id)
    );
});

Breadcrumbs::register('admin.man.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.man.index');
    $breadcrumbs->push(
        __('menus.backend.men.edit'),
        route('admin.man.edit', $id)
    );
});
//end_Person_end

//*****Do Not Delete Me

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';
