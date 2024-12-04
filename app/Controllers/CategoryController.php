<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function category_list()
    {
        // Get input parameters
        $input = $this->request->getGet();
        $page = max((int) ($input['page'] ?? 1), 1);
        $perpage = max((int) ($input['page_limit'] ?? 10), 1);
        $role_id = $input['role_id'] ?? null;

        $CategoryModel = new CategoryModel();
        // Build the query 
        $CategoryModel->select('categories.*, categories.title AS category_title, roles.title AS role_name')
            ->join('roles', 'categories.created_by = roles.id', 'left')
            ->orderBy('categories.id', 'ASC');

        if (!empty($role_id)) {
            $CategoryModel->where('roles.id', $role_id);
        }

        // Get total count of categories
        $total_items = $CategoryModel->countAllResults(false); // No reset of the query

        // Fetch paginated categories
        $categories = $CategoryModel->paginate($perpage, 'custom_pagination', $page);
        $pager = $CategoryModel->pager;

        // Add sequence number to each category
        $start_sequence_number = ($page - 1) * $perpage + 1;
        foreach ($categories as $index => &$category) {
            $category['sequence_number'] = $start_sequence_number + $index;
        }

        // Prepare data for the view
        $data = [
            'categories' => $categories,
            'pager_links' => $pager->links('custom_pagination'),
            'total_items' => $total_items, // Pass the total items count
        ];

        return view('pages/admin/category/category-list', $data);
    }
    public function add_category()
    {
        return view('pages/admin/category/category-add');
    }
    public function store_category()
    {
        // Retrieve role_id from session
        $session = \Config\Services::session();
        $role_id = $session->get('role_id');

        // Validation rules
        $validationRules = [
            'title' => 'required',
            'meta_keywords' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata(['fail' => 'Please fill your form correctly.']);
            return redirect()->back()->withInput();
        }

        // Prepare data for insertion including role_id
        $data = [
            'title' => $this->request->getPost('title'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
            'description' => $this->request->getPost('description'),
            'meta_description' => $this->request->getPost('meta_description'),
            'created_by' => $role_id,
        ];

        // Handle the cover image upload
        $coverImage = $this->request->getFile('cover_image');

        // Validate cover image
        if (!$coverImage->isValid()) {
            return redirect()->back()->withInput()->with('fail', 'Cover image upload failed. ' . $coverImage->getErrorString());
        }

        // Define the upload path for the cover image
        $coverImageDir = FCPATH . 'uploads/categories/';

        // Check if the directory exists, if not, create it
        if (!is_dir($coverImageDir)) {
            mkdir($coverImageDir, 0755, true);
        }

        // Move the uploaded file to the destination directory
        if ($coverImage->move($coverImageDir)) {
            $data['cover_image'] = $coverImage->getName();
        } else {
            return redirect()->back()->withInput()->with('fail', 'Cover image upload failed.');
        }

        // Insert category data into the database
        $categoryModel = new CategoryModel();
        if ($categoryModel->insert($data)) {
            return redirect()->to(base_url('admin/category-list'))->with('success', 'Category added successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add category.');
        }
    }
    public function edit_category($id)
    {
        $CategoryModel = new CategoryModel();
        $data['category'] = $CategoryModel->find($id);
        return view('pages/admin/category/category-edit', $data);
    }
    public function save_edit_category($id)
    {
        // Retrieve role_id from session
        $session = \Config\Services::session();
        $role_id = $session->get('role_id');

        // Validation rules
        $validationRules = [
            'title' => 'required',
            'meta_keywords' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata(['fail' => 'Please fill your form correctly.']);
            return redirect()->back()->withInput();
        }

        // Prepare data for insertion including role_id
        $data = [
            'title' => $this->request->getPost('title'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
            'description' => $this->request->getPost('description'),
            'meta_description' => $this->request->getPost('meta_description'),
            'status' => $this->request->getPost('status'),
            'created_by' => $role_id,
        ];
        // Handle the cover image upload if a new image is provided
        $coverImage = $this->request->getFile('cover_image');

        if ($coverImage && $coverImage->isValid() && !$coverImage->hasMoved()) {
            // Define the upload path for the cover image
            $coverImageDir = FCPATH . 'uploads/categories/';
            if (!is_dir($coverImageDir)) {
                mkdir($coverImageDir, 0755, true);
            }
            // Move the new cover image file to the upload directory
            $coverImage->move($coverImageDir);
            // Update the cover image path in the data array
            $data['cover_image'] = $coverImage->getName();
        }
        // Update the data in the database
        $model = new CategoryModel();
        $model->update($id, $data);
        session()->setFlashdata('success', 'Category updated successfully');
        return redirect()->to('admin/category-list');
    }
    public function category_detail($id)
    {
        $model = new CategoryModel();
        $category = $model->find($id);
        if ($category) {
            return view('pages/admin/category/category-detail', ['category' => $category]);
        } else {
            return redirect()->back()->with('error', 'category not found.');
        }
    }
    public function delete_category($id)
    {
        $CategoryModel = new CategoryModel();
        $category = $CategoryModel->find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Perform the delete operation
        if ($CategoryModel->delete($id)) {
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the category.');
        }
    }
}
