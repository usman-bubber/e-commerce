<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('contact', 'Home::contact');
$routes->get('about', 'Home::about');
$routes->get('shop', 'Home::shop');
$routes->get('product-detail/(:segment)', 'Home::product_detail/$1');
$routes->get('checkin', 'Home::checkin');
$routes->get('checkout', 'Home::checkout');
$routes->get('product-checkin', 'Home::product_checkin');
$routes->get('blog', 'Home::blog');
$routes->get('blog-details', 'Home::blog_details');
$routes->get('contact', 'Home::contact');
$routes->get('faq', 'Home::faq');
$routes->get('categories/(:segment)', 'Home::categories/$1');
$routes->get('/add_tocart', 'Home::add_tocart');
$routes->post('/order_placement', 'Home::order_placement');

// Login Routes
$routes->get('login', 'AuthController::index');
$routes->post('admin-login', 'AuthController::admin_login');
$routes->post('upload-resized-images', 'DropzoneController::upload_resized_images');
// Admin Routes
$routes->group('admin', ['filter' => 'authlogin_and_adminroutes'], function ($routes) {
    // jsut testing for dropzone 
    $routes->post('upload', 'DropzoneController::upload');
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('setting', 'DashboardController::setting');
    $routes->get('logout', 'DashboardController::logout');
    //    *** Products ***
    $routes->get('product-list', 'ProductController::product_list');
    $routes->get('add-product', 'ProductController::add_product');
    $routes->post('store-product', 'ProductController::store_product');
    $routes->get('product-detail/(:segment)', 'ProductController::product_detail/$1');
    $routes->get('edit-product/(:segment)', 'ProductController::edit_product/$1');
    $routes->post('save-edit-product/(:segment)', 'ProductController::save_edit_product/$1');
    $routes->get('cart-order', 'ProductController::cart_order');
    $routes->get('cart-checkout', 'ProductController::cart_checkout');
    $routes->get('delete-product/(:segment)', 'ProductController::delete_product/$1');
    //    *** Category ***
    $routes->get('category-list', 'CategoryController::category_list');
    $routes->get('add-category', 'CategoryController::add_category');
    $routes->post('store-category', 'CategoryController::store_category');
    $routes->get('category-detail/(:segment)', 'CategoryController::category_detail/$1');
    $routes->get('edit-category/(:segment)', 'CategoryController::edit_category/$1');
    $routes->post('save-edit-category/(:segment)', 'CategoryController::save_edit_category/$1');
    $routes->get('delete-category/(:segment)', 'CategoryController::delete_category/$1');
    //    *** Order ***
    $routes->get('order-list', 'OrderController::order_list');
    $routes->get('detail-order', 'OrderController::order_detail');
    $routes->get('edit-order', 'OrderController::edit_order');
    //    *** Inventory ***
    $routes->get('inventory-warehouse', 'InventoryController::inventory_warehouse');
    $routes->get('inventory-received-order', 'InventoryController::inventory_received_order');
    //    *** Attributes ***
    $routes->get('attributes-list', 'AttributesController::attributes_list');
    $routes->get('detail-attributes', 'AttributesController::attributes_detail');
    $routes->get('edit-attributes', 'AttributesController::edit_attributes');
    $routes->get('add-attributes', 'AttributesController::add_attributes');
    //    *** Invoice ***
    $routes->get('invoice-list', 'InvoiceController::invoice_list');
    $routes->get('detail-invoice', 'InvoiceController::invoice_detail');
    $routes->get('edit-invoice', 'InvoiceController::edit_invoice');
    $routes->get('add-invoice', 'InvoiceController::add_invoice');
    //    *** Sellers ***
    $routes->get('seller-list', 'SellersController::seller_list');
    $routes->get('seller-detail', 'SellersController::seller_detail');
    $routes->get('edit-seller', 'SellersController::edit_seller');
    $routes->get('add-seller', 'SellersController::add_seller');
    //    *** Customers ***
    $routes->get('customer-list', 'CustomerController::customer_list');
    $routes->get('customer-detail', 'CustomerController::customer_detail');
    //    *** Roles ***
    $routes->get('role-list', 'RolesController::role_list');
    $routes->get('role-detail/(:segment)', 'RolesController::role_detail/$1');
    $routes->get('edit-role/(:segment)', 'RolesController::edit_role/$1');
    $routes->get('add-role', 'RolesController::add_role');
    //    *** Permissions ***
    $routes->get('permission-list', 'PermissionController::permission_list');
    //    *** Coupons ***
    $routes->get('coupon-list', 'CouponsController::coupon_list');
    $routes->get('add-coupon', 'CouponsController::add_coupon');
    //    *** Reviews ***
    $routes->get('review-list', 'ReviewsController::review_list');
    $routes->get('review-detail', 'ReviewsController::review_detail');
    $routes->get('edit-review', 'ReviewsController::edit_review');
    $routes->get('add-review', 'ReviewsController::add_review');
    //    *** Chat ***
    $routes->get('chat', 'ChatController::chat');
    //    *** Email ***
    $routes->get('email', 'EmailController::email');
    //    *** Calendar ***
    $routes->get('calendar', 'CalendarController::calendar');
    //    *** Help-Center ***
    $routes->get('help', 'HelpController::help');
    //    *** Faq's ***
    $routes->get('faqs', 'FaqsController::faqs');
    //    *** Privacy Policy ***
    $routes->get('privacy-policy', 'PrivacyPolicyController::privacy_policy');
    //    *** Change Password ***
    $routes->get('change-password', 'ChangePasswordController::change_password');
});
