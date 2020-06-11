<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Naslovna (aktuelno)', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('O nama', route('about'));
});

// Home > Search
Breadcrumbs::register('search', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pretraga', route('search'));
});


// Home > Blog
Breadcrumbs::register('become_member', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Postani član', route('become_member'));
});

Breadcrumbs::register('members', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Članovi', route('members'));
});

Breadcrumbs::register('activities', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Aktivnosi', route('activities'));
});


// Home > Blog > Post
Breadcrumbs::register('post', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($post->title, route('posts.show', $post));
});
