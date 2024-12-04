<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductImagesModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    public function product_list()
    {
        // Get input parameters
        $input = $this->request->getGet();
        $page = max((int) ($input['page'] ?? 1), 1);
        $perpage = max((int) ($input['page_limit'] ?? 10), 1);
        $role_id = $input['role_id'] ?? null;

        $ProductModel = new ProductModel();
        // Build the query
        $ProductModel->select('products.*, categories.title AS category_title')
            ->join('categories', 'products.category_id = categories.id', 'left')
            ->orderBy('products.id', 'ASC')
            ->where('products.status', 'active');

        if (!empty($role_id)) {
            $ProductModel->where('roles.id', $role_id);
        }

        // Get total count of products
        $total_items = $ProductModel->countAllResults(false);

        // Fetch paginated products
        $products = $ProductModel->paginate($perpage, 'custom_pagination', $page);
        $pager = $ProductModel->pager;

        // Add sequence number to each product
        $start_sequence_number = ($page - 1) * $perpage + 1;
        foreach ($products as $index => &$product) {
            $product['sequence_number'] = $start_sequence_number + $index;
        }

        // Prepare data for the view
        $data = [

            'products' => $products,
            'total_items' => $total_items,
            'pager_links' => $pager->links('custom_pagination'),
        ];
        return view('pages/admin/product/product-list', $data);
    }
    public function add_product()
    {
        $CategoryModel = new CategoryModel();
        $data['categories'] = $CategoryModel->select('id, title')->findAll();
        return view('pages/admin/product/product-add', $data);
    }
    public function store_product()
    {
        $session = \Config\Services::session();
        $role_id = $session->get('role_id');
        // Load the Product and ProductImages models
        $productModel = new ProductModel();
        $productImagesModel = new ProductImagesModel();

        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'slug' => 'required',
            'stock' => 'required|integer',
            'meta_keywords' => 'required',
            'description' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Prepare product data for insertion
        $data = [
            'title' => $this->request->getPost('title'),
            'category_id' => $this->request->getPost('category_id'),
            'brand_name' => $this->request->getPost('brand_name'),
            'weight' => $this->request->getPost('weight'),
            'gender' => $this->request->getPost('gender'),
            'stock' => $this->request->getPost('stock'),
            'slug' => $this->request->getPost('slug'),
            'tags' => $this->request->getPost('tags'),
            'size' => json_encode($this->request->getPost('size')),
            'color' => json_encode($this->request->getPost('color')),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'discount' => $this->request->getPost('discount'),
            'tax' => $this->request->getPost('tax'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
            'meta_description' => $this->request->getPost('meta_description'),
            'created_by' => $role_id,
        ];

        // Handle the cover image upload
        $coverImage = $this->request->getFile('cover_image');

        // Define the upload path for the cover image
        $coverImageDir = FCPATH . 'uploads/products/cover_images/';

        // Check if the directory exists, if not, create it
        if (!is_dir($coverImageDir)) {
            mkdir($coverImageDir, 0755, true);
        }

        // Check if the cover image is valid and has been uploaded
        if ($coverImage && $coverImage->isValid() && !$coverImage->hasMoved()) {
            // Move the file to the upload directory and store the filename
            $coverImage->move($coverImageDir);
            // Store the relative path in the database
            $data['cover_image'] = $coverImage->getName();
        } else {
            // Handle file upload error
            return redirect()->back()->withInput()->with('fail', 'Cover image upload failed.');
        }

        // Insert the product data into the products table
        $productId = $productModel->insert($data);

        // Handle product images upload
        $productImagesDir = FCPATH . 'uploads/products/images/';

        // Ensure the product images directory exists
        if (!is_dir($productImagesDir)) {
            mkdir($productImagesDir, 0755, true);
        }

        // Check if product_images are set and then loop through them
        $productImages = $this->request->getFiles('product_images');

        if ($productImages) {
            foreach ($productImages['product_images'] as $productImage) {
                if ($productImage->isValid() && !$productImage->hasMoved()) {
                    // Generate a new random name for the image
                    $newProductImageName = $productImage->getRandomName();
                    // Move the product image directly to the product images directory
                    $productImage->move($productImagesDir, $newProductImageName);

                    // Save the product image details to the database
                    $productImagesModel->insert([
                        'product_id' => $productId, // Use the newly inserted product ID
                        'path'       => $newProductImageName, // Store the new image name
                    ]);
                }
            }
        }

        // Set a success message and redirect
        return redirect()->to('admin/product-list')->with('success', 'Product added successfully!');
    }
    public function edit_product($id)
    {
        // Load the models
        $ProductModel = new ProductModel();
        $CategoryModel = new CategoryModel();
        // Get the product data (including category and images)
        $data['product'] = $ProductModel->getData($id);

        if (empty($data['product'])) {
            // Handle case where product is not found
            return redirect()->to('/admin/products')->with('error', 'Product not found');
        }

        // Fetch categories for dropdown in case you need it for editing
        $data['categories'] = $CategoryModel->findAll();
        return view('pages/admin/product/product-edit', $data);
    }
    public function save_edit_product($id)
    {
        $session = \Config\Services::session();
        $role_id = $session->get('role_id');
        // Load the Product and ProductImages models
        $productModel = new ProductModel();
        $productImagesModel = new ProductImagesModel();

        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'meta_keywords' => 'required',
            'description' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Fetch the existing product to check if it exists
        $product = $productModel->find($id);

        if (!$product) {
            // Product not found, handle accordingly (you can redirect or show a 404 error)
            return redirect()->back()->with('fail', 'Product not found.');
        }

        // Prepare product data for updating
        $data = [
            'title' => $this->request->getPost('title'),
            'category_id' => $this->request->getPost('category_id'),
            'brand_name' => $this->request->getPost('brand_name'),
            'weight' => $this->request->getPost('weight'),
            'gender' => $this->request->getPost('gender'),
            'stock' => $this->request->getPost('stock'),
            'slug' => $this->request->getPost('slug'),
            'tags' => $this->request->getPost('tags'),
            'size' => json_encode($this->request->getPost('size')),
            'color' => json_encode($this->request->getPost('color')),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'discount' => $this->request->getPost('discount'),
            'tax' => $this->request->getPost('tax'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
            'meta_description' => $this->request->getPost('meta_description'),
            'updated_by' => $role_id, // Update the updater's role_id
        ];

        // Handle the cover image upload if a new image is provided
        $coverImage = $this->request->getFile('cover_image');

        if ($coverImage && $coverImage->isValid() && !$coverImage->hasMoved()) {
            // Define the upload path for the cover image
            $coverImageDir = FCPATH . 'uploads/products/cover_images/';
            if (!is_dir($coverImageDir)) {
                mkdir($coverImageDir, 0755, true);
            }
            // Move the new cover image file to the upload directory
            $coverImage->move($coverImageDir);
            // Update the cover image path in the data array
            $data['cover_image'] = $coverImage->getName();
        }

        // Update the product data in the database
        $productModel->update($id, $data);

        // Now handle product images upload (if there are new images)
        $productImagesDir = FCPATH . 'uploads/products/images/';

        if (!is_dir($productImagesDir)) {
            mkdir($productImagesDir, 0755, true);
        }

        // Check if product_images are set and then loop through them
        $productImages = $this->request->getFiles('product_images');
        if ($productImages) {
            foreach ($productImages['product_images'] as $productImage) {
                if ($productImage->isValid() && !$productImage->hasMoved()) {
                    // Move the product image
                    $newProductImageName = $productImage->getRandomName();
                    $productImage->move($productImagesDir, $newProductImageName);

                    // Save the new product image details to the database
                    $productImagesModel->insert([
                        'product_id' => $id, // Use the existing product ID
                        'path'       => $newProductImageName, // Store the new image name
                    ]);
                }
            }
        }

        // Set a success message and redirect to the product list
        return redirect()->to('admin/product-list')->with('success', 'Product updated successfully!');
    }
    public function product_detail($id)
    {
        return view('pages/admin/product/product-details');
    }
    public function cart_order()
    {
        return view('pages/admin/product/order-cart');
    }
    public function cart_checkout()
    {
        return view('pages/admin/product/order-checkout');
    }
    public function delete_product_backup($id)
    {
        $ProductModel = new ProductModel();
        $ProductImagesModel = new ProductImagesModel();

        // Find the product
        $product = $ProductModel->find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Fetch associated product images
        $productImages = $ProductImagesModel->where('product_id', $id)->findAll();

        // Delete the product images
        if ($productImages) {
            foreach ($productImages as $image) {
                // Optionally, you can also delete the image file from the server
                if (file_exists($image['path'])) {
                    unlink($image['path']);  // Delete the file from the server
                }

                // Delete the image record from the database
                $ProductImagesModel->delete($image['id']);
            }
        }

        // Delete the product itself
        if ($ProductModel->delete($id)) {
            return redirect()->back()->with('success', 'Product and associated images deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the product.');
        }
    }

    public function delete_product($id)
    {
        $ProductModel = new ProductModel();

        // Find the product
        $product = $ProductModel->find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Update the status to 'inactive'
        $updateData = ['status' => 'inactive'];
        if ($ProductModel->update($id, $updateData)) {
            return redirect()->back()->with('success', 'Product marked as inactive successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to mark the product as inactive.');
        }
    }
}
