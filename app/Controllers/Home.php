<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;

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
    public function checkin($id): string
    {
        return view('pages/landing_pages/checkin');
    }
    public function checkout(): string
    {
        return view('pages/landing_pages/checkout');
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
}
