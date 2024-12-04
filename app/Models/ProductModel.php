<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'title',
        'category_id',
        'brand_name',
        'weight',
        'gender',
        'stock',
        'slug',
        'tags',
        'size',
        'color',
        'description',
        'price',
        'discount',
        'tax',
        'status',
        'meta_keywords',
        'meta_description',
        'highlights',
        'cover_image',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getData($id)
    {
        $results = $this->asArray()
            ->select('products.*, categories.title AS category_title, GROUP_CONCAT(product_images.path) AS images')
            ->join('categories', 'products.category_id = categories.id', 'left')
            ->join('product_images', 'products.id = product_images.product_id', 'left')
            ->where('products.id', $id)
            ->groupBy('products.id')->first();
    
        return $results;
    }
    
}

