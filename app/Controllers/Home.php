<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\ProductReviewModel;
use App\Models\OrderDetailModel;

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
    public function faq(): string
    {
        return view('pages/landing_pages/faq');
    }
    public function about(): string
    {
        return view('pages/landing_pages/about');
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
    public function product_detail($id)
    {
        // Fetch Categories 
        $categoryModel = new CategoryModel();
        $data['categoryModel'] = $categoryModel;

        // Fetch product by slug
        $productModel = new ProductModel();
        $product = $productModel->where('id', $id)->first();
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
        }
        $data['product'] = $product;

        // Fetch Product Reviews 
        $ProductReviewModel = new ProductReviewModel();
        $reviews = $ProductReviewModel->where('product_id', $id)->findAll();
        $data['reviews'] = $reviews;

        // Fetch related images for the product
        $productImageModel = new ProductImagesModel();
        $productImages = $productImageModel->where('product_id', $product['id'])->findAll();
        $data['productImages'] = $productImages;

        // Pass productModel to the view
        $data['productModel'] = $productModel;
        return view('pages/landing_pages/product-detail', $data);
    }
    public function add_tocart()
    {
        $productid = $this->request->getGet('product_id');
        $quantity = $this->request->getGet('quantity');
        $colors = $this->request->getGet('color');
        $sizes = $this->request->getGet('size');

        if (empty($colors) || empty($sizes)) {
            return $this->response->setJSON(['status' => 0, 'message' => 'Please select at least one color and one size.']);
        }

        $product_model = new ProductModel();
        $product_detail = $product_model->select('id')->where('id', $productid)->first();

        if (!$product_detail) {
            return $this->response->setJSON(['status' => 0, 'message' => 'Product not found']);
        }

        // Prepare the data to be added to the cart
        $product_detail['quantity'] = $quantity;
        $product_detail['colors'] = $colors;
        $product_detail['sizes'] = $sizes;

        $cookieData = [$product_detail];
        $existingCookie = $this->request->getCookie('cart_cookie');

        if ($existingCookie) {
            $existingData = json_decode($existingCookie, true) ?? [];
            $combinedData = array_merge($existingData, $cookieData);
            $encodedData = json_encode($combinedData);
            $this->response->setCookie('cart_cookie', $encodedData, 3600);
        } else {
            $encodedData = json_encode($cookieData);
            $this->response->setCookie('cart_cookie', $encodedData, 3600);
        }

        $cartItems = $this->session->get('cart_items') ?? [];
        $cartItems[] = $product_detail;

        $this->session->set('cart_items', $cartItems);
        $this->session->set('total_items', count($cartItems));

        return $this->response->setJSON(['status' => 1, 'message' => 'Added to cart']);
    }
    public function checkin(): string
    {
        $data = [];
        $cart_cookie = $this->request->getCookie('cart_cookie');

        if (!empty($cart_cookie)) {
            // Decode the cookie data to access cart details
            $cart_detail = json_decode($cart_cookie, true);
            $product_model = new ProductModel();
            $product_details = [];

            // Fetch product details and merge with cart item data (color, size, quantity)
            foreach ($cart_detail as $key => $val) {
                $product_info = $product_model->where('id', $val['id'])->first();

                // Merge product data with selected color, size, and quantity
                $product_info['selected_color'] = is_array($val['colors']) ? implode(', ', $val['colors']) : $val['colors'];
                $product_info['selected_size'] = $val['sizes'];
                $product_info['selected_quantity'] = $val['quantity'];

                $product_details[$key] = $product_info;
            }

            // Pass the combined data to the view
            $data['product_detail'] = $product_details;
        }

        return view('pages/landing_pages/checkin', $data);
    }
    public function order_placement()
    {
        if (isset($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie);
            //start calculating amount 
            $product_optionmodel = new ProductModel();
            foreach ($cart_detail as $val) {
                $get_option = $product_optionmodel->where('id', $val->id)->first();
                $price = $get_option['price'];
            }

            $gender = $this->request->getPost('gender');
            $first_name = $_POST['first_name'];
            $last_name = $this->request->getPost('last_name');
            $email = $this->request->getPost('email');
            $phone_number = $this->request->getPost('phone_number');
            $address = $this->request->getPost('address');
            $zipcode = $this->request->getPost('zipcode');
            $city = $this->request->getPost('city');
            $country = $this->request->getPost('country');
            $payment_id = $this->request->getPost('payment_id');

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
            $data = [
                'gender' => $gender,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address,
                'zipcode' => $zipcode,
                'city' => $city,
                'country' => $country,
                'payment_id' => $payment_id,
            ];
            $OrderDetailModel = new OrderDetailModel();
            $OrderDetailModel->save($data);
            session()->setFlashdata(['success' => 'Order Place Successfully. Our agent will contact you soon.']);
            return redirect()->to('/thankyou?id=' . $insert_order);
        } else {
            session()->setFlashdata(['fail' => 'No product in Cart']);
            return redirect()->to('/cart_detail');
        }
    }
    public function checkout(): string
    {
        $data = [];
        if (!empty($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie, true); // Decode as an associative array
// print_r($cart_detail);exit;

            $product_model = new ProductModel();
            foreach ($cart_detail as $key => $val) {
                $product = $product_model->where('id', $val['id'])->first();
                if ($product) {
                    // Add colors and other details from cookie
                    $product['colors'] = $val['colors'];
                    $product['sizes'] = $val['sizes'];
                    $product['quantity'] = $val['quantity'];
                    $data['product_detail'][] = $product;
                }
            }
        }
        return view('pages/landing_pages/checkout', $data);
    }
    public function delete_item()
    {
        $input = $this->request->getJSON(true); // Get JSON data
        $productId = $input['id']; // Product ID from the request

        if (!empty($_COOKIE['cart_cookie'])) {
            $cart_cookie = $_COOKIE['cart_cookie'];
            $cart_detail = json_decode($cart_cookie, true);

            // Debugging: Log the structure of the cookie
            log_message('debug', 'Cart cookie structure: ' . print_r($cart_detail, true));

            $itemFound = false;
            foreach ($cart_detail as $key => $val) {
                // Check if 'product_id' exists before accessing it
                if (isset($val['product_id']) && $val['product_id'] == $productId) {
                    unset($cart_detail[$key]);
                    $itemFound = true;
                    break;
                }
            }

            if ($itemFound) {
                // Update the cookie
                setcookie('cart_cookie', json_encode(array_values($cart_detail)), time() + (86400 * 30), "/");

                return $this->response->setJSON(['success' => true, 'message' => 'Item removed from cart.']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Item not found in cart.']);
    }
    public function saveReview()
    {
        // Validate the input
        $validation = $this->validate([
            'name' => 'required|max_length[255]',
            'rating' => 'required|integer|greater_than[0]|less_than[6]',
            'message' => 'max_length[5000]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $files = $this->request->getFileMultiple('file');
        $filePaths = [];
        if ($files) {
            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/reviews', $newName);
                    $filePaths[] = $newName;
                }
            }
        }

        // Save review data
        $reviewData = [
            'product_id' => $this->request->getPost('product_id'),
            'name' => $this->request->getPost('name'),
            'rating' => $this->request->getPost('rating'),
            'message' => $this->request->getPost('message'),
            'images' => json_encode($filePaths),
        ];
        // print_r($reviewData);exit;
        $reviewModel = new ProductReviewModel();
        $reviewModel->save($reviewData);
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
    public function fetchMoreReviews()
    {
        $ProductReviewModel = new ProductReviewModel();
        // Get page number and product_id from AJAX
        $page = (int) ($_GET['page'] ?? 1);
        $product_id = (int) ($_GET['product_id'] ?? 0);

        if ($page == 0) {
            $page = 1;
        }
        $perpage = 2;  // Set perpage to 2 to load 2 reviews at a time
        $offset = ($page - 1) * $perpage;

        // Fetch reviews for the specified product ID
        $reviews = $ProductReviewModel->getfilterReviews($perpage, $offset, $product_id);

        if (!empty($reviews)) {
            return view('pages/landing_pages/load-more-reviews', ['reviews' => $reviews]);
        } else {
            return 'null';  // No more reviews
        }
    }
}
