<?php

if (!function_exists('upload_and_compress')) {
    /**
     * Upload and compress image automatically
     *
     * @param \CodeIgniter\HTTP\Files\UploadedFile $file The uploaded file instance
     * @param string $path The destination folder (relative to writable/uploads or public/uploads)
     * @param string $name The new file name
     * @param int $quality The compression quality (0-100)
     * @param int $maxWidth The maximum width in pixels
     * @return bool|string Returns file name on success, false on failure
     */
    function upload_and_compress($file, $path, $name, $quality = 80, $maxWidth = 1024)
    {
        if (!$file->isValid() || $file->hasMoved()) {
            return false;
        }

        // Tentukan full path tujuan
        // Asumsi: $path adalah subfolder di dalam 'uploads/' pada root project (sesuai struktur saat ini)
        // Kita perlu mengecek apakah folder tujuan ada, jika tidak buat
        
        // Catatan: Struktur folder Anda tampaknya menyimpan upload di 'uploads/' di root atau public?
        // Dari controller sebelumnya: $fileImage->move('uploads/products', $imageName);
        // Ini berarti path relatif terhadap index.php (public/uploads) atau root project.
        // Mari kita asumsikan 'uploads/' ada di root publik atau root project yang bisa diakses web.
        
        // Pindahkan file asli dulu
        try {
            $file->move($path, $name);
        } catch (\Exception $e) {
            return false;
        }

        // Path lengkap file yang baru diupload
        $filePath = $path . '/' . $name;

        // Mulai proses manipulasi gambar
        try {
            $image = \Config\Services::image();
            
            $image->withFile($filePath);

            // Cek dimensi gambar
            $width = $image->getWidth();
            $height = $image->getHeight();

            // Resize jika lebar melebihi batas maksimal
            if ($width > $maxWidth) {
                $image->resize($maxWidth, 0, true, 'width'); // Maintain aspect ratio
            }

            // Save dengan kualitas yang dikompres
            // CodeIgniter Image Library 'save' method accepts quality as second parameter
            // Tapi behavior-nya tergantung driver (GD/Imagick). 
            // Untuk GD, kualitas defaultnya sudah cukup baik, tapi kita paksa set.
            $image->save($filePath, $quality);
            
            return $name;

        } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
            // Jika gagal manipulasi, kembalikan nama file asli (minimal file terupload)
            // Log error jika perlu
            log_message('error', 'Image compression failed: ' . $e->getMessage());
            return $name;
        }
    }
}
