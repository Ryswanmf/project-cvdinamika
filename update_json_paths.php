<?php

$jsonPath = 'public/data/products.json';
$baseUploadPath = 'public/uploads/products/';

if (!file_exists($jsonPath)) {
    die("JSON file not found\n");
}

$catalog = json_decode(file_get_contents($jsonPath), true);

function find_image($categoryName, $brandName, $collectionName, $productName) {
    global $baseUploadPath;
    
    // Map JSON category names to folder names if needed
    $categoryFolder = strtoupper($categoryName);
    // Special case for Heterogeneous Speciality Sheet -> HETEROGENEOUS SPECIALITY
    if ($categoryName == "Heterogeneous Speciality Sheet") $categoryFolder = "HETEROGENEOUS SPECIALITY";
    // Special case for Heterogeneous Sheet -> HETEROGENOUS SHEET (typo in folder name)
    if ($categoryName == "Heterogeneous Sheet") $categoryFolder = "HETEROGENOUS SHEET";
    
    $brandFolder = $brandName; // Usually matches exactly
    
    $path = $baseUploadPath . $categoryFolder . '/' . $brandFolder . '/';
    if ($collectionName) {
        $path .= $collectionName . '/';
    }
    
    // Extensions to try
    $extensions = ['jpg', 'jpeg', 'png', 'webp', 'jfif'];
    
    foreach ($extensions as $ext) {
        $fullPath = $path . $productName . '.' . $ext;
        if (file_exists($fullPath)) {
            return str_replace('public/', '', $fullPath);
        }
    }
    
    // Try without mapping if not found
    // Recursive search as fallback
    return null;
}

// Deep search fallback
$allFiles = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseUploadPath));
foreach ($iterator as $file) {
    if ($file->isFile()) {
        $allFiles[pathinfo($file->getFilename(), PATHINFO_FILENAME)] = str_replace('\\', '/', str_replace('public/', '', $file->getPathname()));
    }
}

foreach ($catalog['categories'] as &$category) {
    foreach ($category['brands'] as &$brand) {
        if (isset($brand['subfolders'])) {
            foreach ($brand['subfolders'] as &$collection) {
                foreach ($collection['items'] as &$item) {
                    $found = find_image($category['name'], $brand['name'], $collection['name'], $item['name']);
                    if ($found) {
                        $item['image'] = $found;
                    } elseif (isset($allFiles[$item['name']])) {
                        $item['image'] = $allFiles[$item['name']];
                    }
                }
            }
        }
        
        if (isset($brand['items'])) {
            foreach ($brand['items'] as &$item) {
                $found = find_image($category['name'], $brand['name'], null, $item['name']);
                if ($found) {
                    $item['image'] = $found;
                } elseif (isset($allFiles[$item['name']])) {
                    $item['image'] = $allFiles[$item['name']];
                }
            }
        }
    }
}

file_put_contents($jsonPath, json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "Finished updating products.json\n";

