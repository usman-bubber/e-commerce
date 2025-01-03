<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductReviewModel;

class ReviewsController extends BaseController
{
    public function review_list()
    {
        // Get input parameters
        $input = $this->request->getGet();
        $page = max((int) ($input['page'] ?? 1), 1);
        $perpage = max((int) ($input['page_limit'] ?? 10), 1);

        // Build the query
        $ProductReviewModel = new ProductReviewModel();
        $ProductReviewModel->select('product_reviews.*, products.title as product_title')
            ->join('products', 'products.id = product_reviews.product_id', 'left')
            ->orderBy('product_reviews.id', 'ASC');

        // Get total count of products
        $total_items = $ProductReviewModel->countAllResults(false);

        // Fetch paginated products
        $reviews = $ProductReviewModel->paginate($perpage, 'custom_pagination', $page);
        $pager = $ProductReviewModel->pager;

        // Add sequence number to each product
        $start_sequence_number = ($page - 1) * $perpage + 1;
        foreach ($reviews as $index => &$review) {
            $review['sequence_number'] = $start_sequence_number + $index;
        }

        // Prepare data for the view
        $data = [

            'reviews' => $reviews,
            'total_items' => $total_items,
            'pager_links' => $pager->links('custom_pagination'),
        ];
        return view('pages/admin/review/review-list', $data);
    }
    public function review_detail()
    {
        return view('pages/admin/review/review-detail');
    }
    public function add_review()
    {
        return view('pages/admin/review/review-add');
    }
    public function edit_review()
    {
        return view('pages/admin/review/review-edit');
    }
}
