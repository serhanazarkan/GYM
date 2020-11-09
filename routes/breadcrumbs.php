<?php
// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog > Index
Breadcrumbs::for('admin.blog.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Blog', route('blog.index'));
});

// Home > Blog > Create
Breadcrumbs::for('admin.blog.create', function ($trail) {
    $trail->parent('admin.blog.index');
    $trail->push(__('actions.Add_New_Item',['item' => trans_choice('site.Blog',1)]), route('blog.create'));
});

// Home > Blog > Edit
Breadcrumbs::for('admin.blog.edit', function ($trail, $blog) {
    $trail->parent('admin.blog.index');
    $trail->push($blog->name, route('blog.edit', ['blog' => $blog]));
});

