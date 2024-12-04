<?php

namespace App\Libraries;

class CustomFileUpload
{
    public function uploadImage(string $uploadPath, $file)
    {
        $uploaded_name = $file->getName();
        $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $file->getSize();
        $uploaded_type = $file->getClientMimeType();
        $uploaded_tmp  = $file->getTempName();
        $target_path   = $uploadPath;
        $target_file   =  md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        $temp_file     = ((ini_get('upload_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('upload_tmp_dir')));
        $temp_file    .= DIRECTORY_SEPARATOR . md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        try {
            if ((strtolower($uploaded_ext) == 'jpg' || strtolower($uploaded_ext) == 'jpeg' || strtolower($uploaded_ext) == 'png') &&
                ($uploaded_size < 10000000) &&
                ($uploaded_type == 'image/jpeg' || $uploaded_type == 'image/png') &&
                getimagesize($uploaded_tmp)
            ) {
                if ($uploaded_type == 'image/jpeg') {
                    $img = imagecreatefromjpeg($uploaded_tmp);
                    imagejpeg($img, $temp_file, 100);
                } else {
                    $img = imagecreatefrompng($uploaded_tmp);
                    imagepng($img, $temp_file, 9);
                }
                imagedestroy($img);
                if (!file_exists(getcwd() . DIRECTORY_SEPARATOR . $target_path)) {
                    mkdir(getcwd() . DIRECTORY_SEPARATOR . $target_path, 0777, true);
                }
                if (rename($temp_file, (getcwd() . DIRECTORY_SEPARATOR . $target_path . $target_file))) {
                    return $target = $target_path . $target_file . '-orginal_name-' . $uploaded_name;
                } else {
                }
                if (file_exists($temp_file))
                    unlink($temp_file);
            } else {
                return 'format_error';
            }
        } catch (\Exception $e) {
            return 'format_error-orginal_name-' . $e->getMessage();
        }
    }
    public function uploadAdminImage(string $uploadPath, $file)
    {
        $uploaded_name = $file->getName();
        $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $file->getSize();
        $uploaded_type = $file->getClientMimeType();
        $uploaded_tmp  = $file->getTempName();
        $target_path   = $uploadPath;
        $target_file   =  md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        $temp_file     = ((ini_get('upload_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('upload_tmp_dir')));
        $temp_file    .= DIRECTORY_SEPARATOR . md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        if ((strtolower($uploaded_ext) == 'jpg' || strtolower($uploaded_ext) == 'jpeg' || strtolower($uploaded_ext) == 'png') &&
            ($uploaded_size < 10000000) &&
            ($uploaded_type == 'image/jpeg' || $uploaded_type == 'image/png') &&
            getimagesize($uploaded_tmp)
        ) {
            if ($uploaded_type == 'image/jpeg') {
                $img = imagecreatefromjpeg($uploaded_tmp);
                imagejpeg($img, $temp_file, 100);
            } else {
                $img = imagecreatefrompng($uploaded_tmp);
                imagepng($img, $temp_file, 9);
            }
            imagedestroy($img);
            if (!file_exists(getcwd() . DIRECTORY_SEPARATOR . $target_path)) {
                mkdir(getcwd() . DIRECTORY_SEPARATOR . $target_path, 0777, true);
            }
            if (rename($temp_file, (getcwd() . DIRECTORY_SEPARATOR . $target_path . $target_file))) {
                return $target = $target_path . $target_file;
            } else {
            }
            if (file_exists($temp_file))
                unlink($temp_file);
        } else {
            return 'format_error';
        }
    }
    public function uploadVideo(string $uploadPath, $file)
    {
        $uploaded_name = $file->getName();
        $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $file->getSize();
        $uploaded_type = $file->getClientMimeType();
        $uploaded_tmp  = $file->getTempName();
        $target_path   = $uploadPath;
        $target_file   =  md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        $temp_file     = ((ini_get('upload_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('upload_tmp_dir')));
        $temp_file    .= DIRECTORY_SEPARATOR . md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        if ((strtolower($uploaded_ext) == 'mp4' || strtolower($uploaded_ext) == 'wmv' || strtolower($uploaded_ext) == 'avi') &&
            ($uploaded_size < 10000000) &&
            ($uploaded_type == 'video/mp4')
        ) {
            if ($video = $file) {
                if ($video->isValid() && ! $video->hasMoved()) {
                    if (!file_exists(getcwd() . DIRECTORY_SEPARATOR . $target_path)) {
                        mkdir(getcwd() . DIRECTORY_SEPARATOR . $target_path, 0777, true);
                    }
                    $video->move($target_path, $target_file);
                    return $target_path . $target_file . '-orginal_name-' . $uploaded_name;
                }
            }
            if (file_exists($temp_file))
                unlink($temp_file);
        } else {
            return 'format_error';
        }
    }
    public function uploadDocument(string $uploadPath, $file)
    {
        $uploaded_name = $file->getName();
        $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $file->getSize();
        $uploaded_type = $file->getClientMimeType();
        $uploaded_tmp  = $file->getTempName();
        $target_path   = $uploadPath;
        $target_file   =  md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        $temp_file     = ((ini_get('upload_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('upload_tmp_dir')));
        $temp_file    .= DIRECTORY_SEPARATOR . md5(uniqid() . $uploaded_name) . '.' . $uploaded_ext;
        if ((strtolower($uploaded_ext) == 'pdf' || strtolower($uploaded_ext) == 'xlsx' || strtolower($uploaded_ext) == 'csv') &&
            ($uploaded_size < 10000000) &&
            ($uploaded_type == 'application/pdf') || ($uploaded_type == 'application/msword') || ($uploaded_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            || ($uploaded_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
        ) {
            if ($img = $file) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    if (!file_exists(getcwd() . DIRECTORY_SEPARATOR . $target_path)) {
                        mkdir(getcwd() . DIRECTORY_SEPARATOR . $target_path, 0777, true);
                    }
                    $img->move($target_path, $target_file);
                    return $target_path . $target_file . '-orginal_name-' . $uploaded_name;
                }
            }
            if (file_exists($temp_file))
                unlink($temp_file);
        } else {
            return 'format_error';
        }
    }
}
