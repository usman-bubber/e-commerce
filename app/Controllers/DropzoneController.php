<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DropzoneController extends BaseController
{
    public function upload_resized_images()
    {
        $width = $this->request->getPost('width');
        $height = $this->request->getPost('height');
        $image = $this->request->getFile('cover_image');
        $info       = getimagesize($image->getTempName());
        $fileWidth  = $info[0];
        $fileHeight = $info[1];
        $dimensionRule = '';
        if (!empty($width) && !empty($height)) {
            $dimensionRule = 'min_dims[' . $fileWidth . ',' . $fileHeight . ',' . $width . ',' . $height . ']';
        }
        $this->validation->setRules(
            [
                'cover_image' => 'uploaded[cover_image]|max_size[cover_image,5000]|mime_in[cover_image,image/png,image/jpg,image/jpeg,image/gif,image/bmp]|ext_in[cover_image,png,jpg,jpeg,gif,bmp]|' . $dimensionRule,
            ],
            [
                'cover_image' => [
                    'uploaded' => 'Please upload an image file (JPEG, PNG, JPG)',
                    'max_size' => 'Image size must be less than 5 MB',
                    'min_dims' => "Image dimensions must be atleast " . $width . "x" . $height,
                    'mime_in' => 'Please upload an image file (JPEG, PNG, JPG)',
                    'ext_in' => 'Please upload an image file (JPEG, PNG, JPG)',
                ],
            ]
        );
        if (!$this->validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['error' => true, 'errors' => $this->validation->getErrors()])->setStatusCode(400);
        }
        $image = $this->request->getFile('cover_image');
        $originalName = $image->getName();
        if (!empty($this->request->getPost('directory'))) {
            $directory = $this->request->getPost('directory');
        } else {
            return $this->response->setJSON(['error' => true, 'errors' => ['Provide the directory folders for image']])->setStatusCode(400);
        }
        if (!empty($this->request->getPost('dir_folder'))) {
            $subDirectory = $this->request->getPost('dir_folder');
        } else {
            return $this->response->setJSON(['error' => true, 'errors' => ['Provide the directory folders for thumbnails']])->setStatusCode(400);
        }
        if (!empty($this->request->getPost('dimensionsWithPath'))) {
            $dimensionsWithPath = $this->request->getPost('dimensionsWithPath');
        } else {
            return $this->response->setJSON(['error' => true, 'errors' => ['Provide the dimensions for thumbnails']])->setStatusCode(400);
        }
        $path = uploadResizeImage($directory, $subDirectory, $image, $dimensionsWithPath);
        $img_info = [
            'encoded_name' => $path,
            'original_name' => $originalName,
        ];
        return json_encode($img_info);
    }

    public function upload()
    {
        // Load the file helper
        helper('file');

        // Get the uploaded file
        $file = $this->request->getFile('cover_image');

        // Check if the file is valid
        if ($file->isValid() && !$file->hasMoved()) {
            // Define the upload path
            $uploadPath = WRITEPATH . 'uploads/category/'; // Make sure this directory exists

            // Move the file to the upload directory
            $file->move($uploadPath);

            return $this->response->setJSON(['status' => 'success', 'message' => 'File uploaded successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'File upload failed.']);
        }
    }
}
