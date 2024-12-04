<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use App\Models\OrderModel;

class Home extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        // Fetch categories and products with their related images
        $data['categories'] = $categoryModel->findAll();
        $data['productModel'] = $productModel;
        $data['categoryModel'] = $categoryModel;
        return view('pages/landing_pages/index', $data);
    }
    public function product_detail($id)
    {
        $productModel = new ProductModel();
        $productImageModel = new ProductImagesModel();

        // Fetch product by slug
        $product = $productModel->where('id', $id)->first();

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
        }

        // Fetch related images for the product
        $productImages = $productImageModel->where('product_id', $product['id'])->findAll();

        // Pass data to the view
        $data['product'] = $product;
        $data['productImages'] = $productImages;

        return view('pages/landing_pages/product-detail', $data);
    }
    public function faq(): string
    {
        return view('pages/landing_pages/faq');
    }
    public function about(): string
    {
        return view('pages/landing_pages/about');
    }
    public function product_checkin(): string
    {
        return view('pages/landing_pages/product-checkin');
    }
    public function checkin(): string
    {
        $data = [];
        if (!empty($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie);

            $product_model = new ProductModel();


            foreach ($cart_detail as $key => $val) {
                $data['product_detail'][$key] = $product_model->where('id', $val->product_detail->id)->first();
            }
        }
        return view('pages/landing_pages/checkin', $data);
    }
    public function checkout(): string
    {

        $data = [];
        if (!empty($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie);

            $product_model = new ProductModel();


            foreach ($cart_detail as $key => $val) {
                $data['product_detail'][$key] = $product_model->where('id', $val->product_detail->id)->first();
            }
        }
        return view('pages/landing_pages/checkout', $data);
    }
    public function blog(): string
    {
        return view('pages/landing_pages/blog');
    }
    public function blog_details(): string
    {
        return view('pages/landing_pages/blog-details');
    }
    public function contact(): string
    {
        return view('pages/landing_pages/contact');
    }
    public function shop()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->where('status', 'active')->findAll();
        return view('pages/landing_pages/shop', $data);
    }
    public function categories($categoryId = null)
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        // Fetch the category title and related products
        $category = $categoryModel->find($categoryId);
        $products = $productModel
            ->where('category_id', $categoryId)
            ->where('status', 'active')
            ->findAll();

        return view('pages/landing_pages/categories', [
            'categoryTitle' => $category['title'] ?? 'Category Not Found',
            'products' => $products,
        ]);
    }

    public function add_tocart()
    {
        $productid = $this->request->getGet('product_id');
        $quantity = $this->request->getGet('quantity');

        $product_model = new ProductModel();
        $data['product_detail'] = $product_model->select('id')->where('id', $productid)->first();
        $data['product_detail']['quantity'] = $quantity;
        $response = \Config\Services::response();
        // Data to be stored in the cookie
        $cookieData = [
            $data
        ];

        // Retrieve existing cookie data if available
        $existingCookie = $this->request->getCookie('cart_cookie');


        if ($existingCookie) {
            if (is_string($existingCookie)) {
                // Decode the existing cookie data
                $existingData = json_decode($existingCookie, true);

                // Check if decoding was successful and it's an array
                if (is_array($existingData)) {
                    // Append new data to the existing data
                    $combinedData = array_merge($existingData, $cookieData);



                    // Serialize or encode the combined data
                    $encodedData = json_encode($combinedData);





                    // Update the cookie with the combined data
                    $response->setCookie('cart_cookie', $encodedData, 3600); // Expiration time of 1 hour



                    // Calculate total items in cookies
                    $totalItemsInCookies = count($combinedData);

                    // Update session with total items
                    $this->session->set('total_items_in_cookies', $totalItemsInCookies);
                    $myresponse['status'] = 1;
                    $myresponse['message'] = 'Added to cart';
                } else {
                    // Existing data in the cookie is not in the expected format
                    $myresponse['status'] = 0;
                    $myresponse['message'] = 'Existing data in the cookie is not in the expected format';
                }
            } else {
                // Existing cookie data is not a string
                $myresponse['status'] = 0;
                $myresponse['message'] = 'Existing cookie data is not a string';
            }
        } else {
            // If no existing cookie data, set the cookie with the new data
            $encodedData = json_encode($cookieData);
            $response->setCookie('cart_cookie', $encodedData, 3600); // Expiration time of 1 hour

            // Update session with total items
            $this->session->set('total_items_in_cookies', 1);
            $myresponse['status'] = 1;
            $myresponse['message'] = 'Added to cart';
        }

        // Start maintaining session
        $cartItems = $this->session->get('cart_items') ?? []; // Retrieve cart items from session or initialize as an empty array if not set

        // Assuming your new item data is stored in $data['product_detail']
        $cartItems[] = $data['product_detail']; // Add the new item to the cart

        //  var_dump(count($cartItems));
        //  exit;
        $totalItems = count($cartItems); // Get the total number of items in the cart
        $this->session->set('cart_items', $cartItems); // Set the updated cart items in the session
        $this->session->set('isnotemptyCart', true); // Set session flag indicating cart is not empty
        $this->session->set('total_items', $totalItems); // Set session variable with the total number of items

        // End maintaining session
        echo json_encode($myresponse);
        return $response;
    }

    public function order_placement()
    {

        if (isset($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie);
            //start calculating amount 

            $product_optionmodel = new ProductModel();
            foreach ($cart_detail as $val) {
                $get_option = $product_optionmodel->where('id', $val->product_detail->id)->first();
                $price = $get_option['price'];
            }
            // $gender = $this->request->getPost('gender');
            // $firstname = $_POST['firstname'];
            // $lastname = $this->request->getPost('lastname');
            // $email = $this->request->getPost('email');
            // $nationality = $this->request->getPost('nationality');
            // $mobile_no = $this->request->getPost('mobile_no');
            // $extra_detail = $this->request->getPost('extra_detail');
            // $create_account = $this->request->getPost('create_account');
            // $area_name = $this->request->getPost('area_name');
            // $address = $this->request->getPost('address');
            // $residents = $this->request->getPost('residents');
            // $hotel_no = $this->request->getPost('hotel_no');
            // $hotel_name = $this->request->getPost('hotel_name');
            // $whatsappphone_no = $this->request->getPost('whatsappphone_no');

            $order_model = new OrderModel();

            foreach ($cart_detail as $val) {
             
                $order_data = [
                    'user_id' => session('userid'),
                    'product_id' => $val->product_detail->id,
                    'order_status_id' => '1', //$insert_orderstatus,
                    'payment_method_id' => '1', //$insert_paymentstatus,
                ];
                $insert_order = $order_model->insert($order_data);
            }


            // Retrieve cart items from session or initialize as an empty array if not set
            $cartItems = [];
            // Set the updated empty cart items in the session
            $this->session->set('cart_items', $cartItems);
            // Set session flag indicating cart is empty
            $this->session->set('isnotemptyCart', false);
            // Set total_items to 0
            $this->session->set('total_items', 0);
            $response = \Config\Services::response();
            // Unset the cookie by setting its expiration time to a past value
            $response->setCookie('cart_cookie', '', time() - 3600);
            // Send the response to the client
            $response->send();

            session()->setFlashdata(['success' => 'Order Place Successfully. Our agent will contact you soon.']);
            //return redirect()->to('/admin/orders/detail?id=' . $insert_order);
            return redirect()->to('/thankyou?id=' . $insert_order);
        } else {
            session()->setFlashdata(['fail' => 'No product in Cart']);
            return redirect()->to('/cart_detail');
        }
    }
}
