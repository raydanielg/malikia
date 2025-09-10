<?php
// Root front-controller shim for shared hosting (e.g., cPanel)
// Prefer pointing the domain's document root to /public.
// If you cannot, this file and the root .htaccess will forward requests to /public.

// If the request is for the root path, redirect to /public/ for correct asset paths
$uri = $_SERVER['REQUEST_URI'] ?? '/';
if ($uri === '/' || $uri === '/index.php') {
    header('Location: public/');
    exit;
}

// Fallback: run the normal Laravel front controller from /public
require __DIR__ . '/public/index.php';
