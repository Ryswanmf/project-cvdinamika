<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductCatalog extends BaseController
{
    protected $catalogPath;
    protected $uploadPath;
    protected $brochurePath;

    public function __construct()
    {
        $this->catalogPath = FCPATH . 'data' . DIRECTORY_SEPARATOR . 'products.json';
        $this->uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;
        $this->brochurePath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'brochures' . DIRECTORY_SEPARATOR;
    }

    /**
     * Main catalog management page
     */
    public function index()
    {
        $catalog = $this->loadCatalog();
        
        $data = [
            'title' => 'Manajemen Katalog Produk',
            'catalog' => $catalog
        ];
        
        return view('admin/product-catalog/index', $data);
    }

    /**
     * View category details and brands
     */
    public function category($categoryId)
    {
        $catalog = $this->loadCatalog();
        $category = $this->findCategory($catalog, $categoryId);
        
        if (!$category) {
            return redirect()->to('/admin/product-catalog')->with('error', 'Kategori tidak ditemukan');
        }
        
        $data = [
            'title' => 'Manajemen Brand - ' . $category['name'],
            'category' => $category,
            'categoryId' => $categoryId
        ];
        
        return view('admin/product-catalog/category', $data);
    }

    /**
     * View brand details and collections/products
     */
    public function brand($categoryId, $brandId)
    {
        $catalog = $this->loadCatalog();
        $category = $this->findCategory($catalog, $categoryId);
        
        if (!$category) {
            return redirect()->to('/admin/product-catalog')->with('error', 'Kategori tidak ditemukan');
        }
        
        $brand = $this->findBrand($category, $brandId);
        
        if (!$brand) {
            return redirect()->to('/admin/product-catalog/category/' . $categoryId)->with('error', 'Brand tidak ditemukan');
        }
        
        $data = [
            'title' => 'Manajemen ' . $brand['name'],
            'category' => $category,
            'categoryId' => $categoryId,
            'brand' => $brand,
            'brandId' => $brandId
        ];
        
        return view('admin/product-catalog/brand', $data);
    }

    /**
     * View collection/subfolder and products
     */
    public function collection($categoryId, $brandId, $collectionId)
    {
        $catalog = $this->loadCatalog();
        $category = $this->findCategory($catalog, $categoryId);
        $brand = $this->findBrand($category, $brandId);
        
        if (!$brand || !$brand['has_subfolders']) {
            return redirect()->back()->with('error', 'Koleksi tidak ditemukan');
        }
        
        $collection = $this->findCollection($brand, $collectionId);
        
        if (!$collection) {
            return redirect()->back()->with('error', 'Koleksi tidak ditemukan');
        }
        
        $data = [
            'title' => 'Manajemen Produk - ' . $collection['name'],
            'category' => $category,
            'categoryId' => $categoryId,
            'brand' => $brand,
            'brandId' => $brandId,
            'collection' => $collection,
            'collectionId' => $collectionId
        ];
        
        return view('admin/product-catalog/collection', $data);
    }

    /**
     * Add new category
     */
    public function addCategory()
    {
        $catalog = $this->loadCatalog();
        
        $newCategory = [
            'id' => $this->generateId($this->request->getPost('name')),
            'name' => $this->request->getPost('name'),
            'description_file' => $this->request->getPost('description_file') ?? '',
            'brands' => []
        ];
        
        $catalog['categories'][] = $newCategory;
        $this->saveCatalog($catalog);
        
        return redirect()->to(base_url('admin/product-catalog'))->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Add new brand
     */
    public function addBrand($categoryId)
    {
        $catalog = $this->loadCatalog();
        $hasSubfolders = $this->request->getPost('has_subfolders') === 'yes';
        
        $newBrand = [
            'id' => $this->generateId($this->request->getPost('name')),
            'name' => $this->request->getPost('name'),
            'has_subfolders' => $hasSubfolders,
        ];
        
        if ($hasSubfolders) {
            $newBrand['subfolders'] = [];
        } else {
            $newBrand['items'] = [];
        }
        
        // Find and update category
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                $category['brands'][] = $newBrand;
                break;
            }
        }
        
        $this->saveCatalog($catalog);
        
        return redirect()->to(base_url('admin/product-catalog/category/' . $categoryId))->with('success', 'Brand berhasil ditambahkan');
    }

    /**
     * Add new collection/subfolder
     */
    public function addCollection($categoryId, $brandId)
    {
        $catalog = $this->loadCatalog();
        
        $newCollection = [
            'id' => $this->generateId($this->request->getPost('name')),
            'name' => $this->request->getPost('name'),
            'description_file' => $this->request->getPost('description_file') ?? '',
            'items' => []
        ];
        
        // Find and update brand
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId) {
                        $brand['subfolders'][] = $newCollection;
                        break 2;
                    }
                }
            }
        }
        
        $this->saveCatalog($catalog);
        
        return redirect()->to(base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId))->with('success', 'Koleksi berhasil ditambahkan');
    }

    /**
     * Edit category name
     */
    public function editCategory($categoryId)
    {
        $catalog = $this->loadCatalog();
        $newName = $this->request->getPost('name');
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                $category['name'] = $newName;
                break;
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog'))->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Upload description file for category
     */
    public function uploadDescription($categoryId)
    {
        $catalog = $this->loadCatalog();
        
        // Validate file upload
        $validationRule = [
            'description_file' => [
                'label' => 'File Deskripsi',
                'rules' => 'uploaded[description_file]|max_size[description_file,5120]|ext_in[description_file,doc,docx]'
            ]
        ];
        
        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('error', $this->validator->listErrors());
        }
        
        $file = $this->request->getFile('description_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            try {
                // Ensure brochure directory exists
                $targetDir = rtrim($this->brochurePath, DIRECTORY_SEPARATOR);
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                    chmod($targetDir, 0777);
                }
                
                // Find category
                $categoryName = '';
                foreach ($catalog['categories'] as &$category) {
                    if ($category['id'] === $categoryId) {
                        $categoryName = $category['name'];
                        
                        // Generate unique filename with timestamp to avoid file locking
                        $timestamp = date('YmdHis');
                        $newFileName = 'DESKRIPSI_PRODUK_' . strtoupper(str_replace([' ', '&'], '_', $categoryName)) . '_' . $timestamp . '.docx';
                        $targetPath = $targetDir . DIRECTORY_SEPARATOR . $newFileName;
                        
                        // Delete old file if exists (but keep trying to upload even if delete fails)
                        if (!empty($category['description_file'])) {
                            $oldFile = $targetDir . DIRECTORY_SEPARATOR . $category['description_file'];
                            if (file_exists($oldFile)) {
                                clearstatcache(true, $oldFile);
                                @chmod($oldFile, 0777);
                                @unlink($oldFile);
                                clearstatcache(true, $oldFile);
                            }
                        }
                        
                        // Clear any file stat cache for target path
                        clearstatcache(true, $targetPath);
                        
                        // Read file content and write to destination
                        $fileContent = file_get_contents($file->getTempName());
                        if ($fileContent === false) {
                            return redirect()->back()->with('error', 'Gagal membaca file yang diupload.');
                        }
                        
                        // Write file to destination
                        $bytesWritten = @file_put_contents($targetPath, $fileContent, LOCK_EX);
                        if ($bytesWritten === false) {
                            // Try alternative method
                            $handle = @fopen($targetPath, 'wb');
                            if ($handle) {
                                fwrite($handle, $fileContent);
                                fclose($handle);
                            } else {
                                return redirect()->back()->with('error', 'Gagal menulis file. Folder mungkin write-protected.');
                            }
                        }
                        
                        // Set file permission
                        @chmod($targetPath, 0666);
                        
                        // Verify file was created
                        if (!file_exists($targetPath)) {
                            return redirect()->back()->with('error', 'File tidak ditemukan setelah upload.');
                        }
                        
                        // Update catalog
                        $category['description_file'] = $newFileName;
                        break;
                    }
                }
                
                $this->saveCatalog($catalog);
                return redirect()->to(base_url('admin/product-catalog'))->with('success', 'File deskripsi berhasil diupload');
                
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
        
        return redirect()->back()->with('error', 'File tidak valid atau sudah dipindahkan.');
    }

    /**
     * Delete description file for category
     */
    public function deleteDescription($categoryId)
    {
        $catalog = $this->loadCatalog();
        
        // Find category and delete file
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                // Delete physical file if exists
                if (!empty($category['description_file'])) {
                    $targetDir = rtrim($this->brochurePath, DIRECTORY_SEPARATOR);
                    $filePath = $targetDir . DIRECTORY_SEPARATOR . $category['description_file'];
                    
                    if (file_exists($filePath)) {
                        // Clear file stat cache
                        clearstatcache(true, $filePath);
                        
                        // Try to chmod before delete
                        @chmod($filePath, 0777);
                        
                        // Delete file
                        if (@unlink($filePath)) {
                            // Clear cache again after delete
                            clearstatcache(true, $filePath);
                            // Small delay to ensure file system updates
                            usleep(100000); // 0.1 second
                        }
                    }
                    
                    // Clear description_file from catalog
                    $category['description_file'] = '';
                }
                break;
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog'))->with('success', 'File deskripsi berhasil dihapus');
    }

    /**
     * Delete category
     */
    public function deleteCategory($categoryId)
    {
        $catalog = $this->loadCatalog();
        
        foreach ($catalog['categories'] as $key => $category) {
            if ($category['id'] === $categoryId) {
                // Delete all images in this category
                $this->deleteCategoryImages($category);
                unset($catalog['categories'][$key]);
                break;
            }
        }
        
        $catalog['categories'] = array_values($catalog['categories']);
        $this->saveCatalog($catalog);
        
        return redirect()->to(base_url('admin/product-catalog'))->with('success', 'Kategori berhasil dihapus');
    }

    /**
     * Edit brand name
     */
    public function editBrand($categoryId, $brandId)
    {
        $catalog = $this->loadCatalog();
        $newName = $this->request->getPost('name');
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId) {
                        $brand['name'] = $newName;
                        break 2;
                    }
                }
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog/category/' . $categoryId))->with('success', 'Brand berhasil diubah');
    }

    /**
     * Delete brand
     */
    public function deleteBrand($categoryId, $brandId)
    {
        $catalog = $this->loadCatalog();
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as $key => $brand) {
                    if ($brand['id'] === $brandId) {
                        // Delete all images in this brand
                        $this->deleteBrandImages($brand);
                        unset($category['brands'][$key]);
                        $category['brands'] = array_values($category['brands']);
                        break 2;
                    }
                }
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog/category/' . $categoryId))->with('success', 'Brand berhasil dihapus');
    }

    /**
     * Edit collection name
     */
    public function editCollection($categoryId, $brandId, $collectionId)
    {
        $catalog = $this->loadCatalog();
        $newName = $this->request->getPost('name');
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId && isset($brand['subfolders'])) {
                        foreach ($brand['subfolders'] as &$subfolder) {
                            if ($subfolder['id'] === $collectionId) {
                                $subfolder['name'] = $newName;
                                break 3;
                            }
                        }
                    }
                }
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId))->with('success', 'Koleksi berhasil diubah');
    }

    /**
     * Delete collection
     */
    public function deleteCollection($categoryId, $brandId, $collectionId)
    {
        $catalog = $this->loadCatalog();
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId && isset($brand['subfolders'])) {
                        foreach ($brand['subfolders'] as $key => $subfolder) {
                            if ($subfolder['id'] === $collectionId) {
                                // Delete all images in this collection
                                if (isset($subfolder['items'])) {
                                    foreach ($subfolder['items'] as $item) {
                                        if (isset($item['image'])) {
                                            $imagePath = FCPATH . $item['image'];
                                            if (file_exists($imagePath)) {
                                                unlink($imagePath);
                                            }
                                        }
                                    }
                                }
                                unset($brand['subfolders'][$key]);
                                $brand['subfolders'] = array_values($brand['subfolders']);
                                break 3;
                            }
                        }
                    }
                }
            }
        }
        
        $this->saveCatalog($catalog);
        return redirect()->to(base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId))->with('success', 'Koleksi berhasil dihapus');
    }

    /**
     * Upload product images
     */
    public function uploadProducts()
    {
        $categoryId = $this->request->getPost('category_id');
        $brandId = $this->request->getPost('brand_id');
        $collectionId = $this->request->getPost('collection_id');
        $productNames = $this->request->getPost('product_names'); // Array of product names from form
        
        $files = $this->request->getFiles();
        
        if (!$files || !isset($files['products'])) {
            return redirect()->back()->with('error', 'Tidak ada file yang diupload');
        }
        
        $catalog = $this->loadCatalog();
        $uploadedCount = 0;
        $index = 0;
        
        foreach ($files['products'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($this->uploadPath, $newName);
                
                // Use name from form input if available, otherwise use filename without extension
                $productName = isset($productNames[$index]) && !empty($productNames[$index]) 
                    ? $productNames[$index] 
                    : pathinfo($file->getName(), PATHINFO_FILENAME);
                
                $productItem = [
                    'id' => uniqid('prod-'),
                    'name' => $productName,
                    'image' => 'uploads/products/' . $newName,
                    'description' => ''
                ];
                
                // Add to appropriate location
                $this->addProductToPath($catalog, $categoryId, $brandId, $collectionId, $productItem);
                $uploadedCount++;
                $index++;
            }
        }
        
        $this->saveCatalog($catalog);
        
        return redirect()->back()->with('success', $uploadedCount . ' produk berhasil diupload');
    }

    /**
     * Edit product name and description
     */
    public function editProduct($categoryId, $brandId, $collectionId = null)
    {
        $catalog = $this->loadCatalog();
        $productId = $this->request->getPost('product_id');
        $newName = $this->request->getPost('name');
        $newDesc = $this->request->getPost('description');
        
        $updated = false;
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId) {
                        if ($collectionId && isset($brand['subfolders'])) {
                            // Edit product in collection
                            foreach ($brand['subfolders'] as &$subfolder) {
                                if ($subfolder['id'] === $collectionId) {
                                    foreach ($subfolder['items'] as &$item) {
                                        if ($item['id'] === $productId) {
                                            $item['name'] = $newName;
                                            $item['description'] = $newDesc;
                                            $updated = true;
                                            break 4;
                                        }
                                    }
                                }
                            }
                        } else {
                            // Edit product in brand
                            foreach ($brand['items'] as &$item) {
                                if ($item['id'] === $productId) {
                                    $item['name'] = $newName;
                                    $item['description'] = $newDesc;
                                    $updated = true;
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }
        }
        
        if ($updated) {
            $this->saveCatalog($catalog);
            
            if ($collectionId) {
                return redirect()->to(base_url('admin/product-catalog/collection/' . $categoryId . '/' . $brandId . '/' . $collectionId))
                    ->with('success', 'Nama produk berhasil diubah');
            } else {
                return redirect()->to(base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId))
                    ->with('success', 'Nama produk berhasil diubah');
            }
        }
        
        return redirect()->back()->with('error', 'Produk tidak ditemukan');
    }

    /**
     * Delete product
     */
    public function deleteProduct($categoryId, $brandId, $productId, $collectionId = null)
    {
        $catalog = $this->loadCatalog();
        $deleted = false;
        
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId) {
                        if ($collectionId && isset($brand['subfolders'])) {
                            foreach ($brand['subfolders'] as &$subfolder) {
                                if ($subfolder['id'] === $collectionId) {
                                    $this->removeProduct($subfolder['items'], $productId);
                                    $deleted = true;
                                    break 3;
                                }
                            }
                        } else {
                            $this->removeProduct($brand['items'], $productId);
                            $deleted = true;
                            break 2;
                        }
                    }
                }
            }
        }
        
        if ($deleted) {
            $this->saveCatalog($catalog);
            
            // Redirect to appropriate page
            if ($collectionId) {
                return redirect()->to(base_url('admin/product-catalog/collection/' . $categoryId . '/' . $brandId . '/' . $collectionId))
                    ->with('success', 'Produk berhasil dihapus');
            } else {
                return redirect()->to(base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId))
                    ->with('success', 'Produk berhasil dihapus');
            }
        }
        
        return redirect()->to(base_url('admin/product-catalog'))->with('error', 'Produk tidak ditemukan');
    }

    // ===== Helper Methods =====

    private function loadCatalog()
    {
        if (!file_exists($this->catalogPath)) {
            return ['categories' => []];
        }
        
        $json = file_get_contents($this->catalogPath);
        return json_decode($json, true);
    }

    private function saveCatalog($catalog)
    {
        $json = json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->catalogPath, $json);
    }

    private function findCategory($catalog, $categoryId)
    {
        foreach ($catalog['categories'] as $category) {
            if ($category['id'] === $categoryId) {
                return $category;
            }
        }
        return null;
    }

    private function findBrand($category, $brandId)
    {
        foreach ($category['brands'] as $brand) {
            if ($brand['id'] === $brandId) {
                return $brand;
            }
        }
        return null;
    }

    private function findCollection($brand, $collectionId)
    {
        if (!isset($brand['subfolders'])) return null;
        
        foreach ($brand['subfolders'] as $subfolder) {
            if ($subfolder['id'] === $collectionId) {
                return $subfolder;
            }
        }
        return null;
    }

    private function generateId($name)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    }

    private function addProductToPath(&$catalog, $categoryId, $brandId, $collectionId, $product)
    {
        foreach ($catalog['categories'] as &$category) {
            if ($category['id'] === $categoryId) {
                foreach ($category['brands'] as &$brand) {
                    if ($brand['id'] === $brandId) {
                        if ($collectionId && isset($brand['subfolders'])) {
                            foreach ($brand['subfolders'] as &$subfolder) {
                                if ($subfolder['id'] === $collectionId) {
                                    $subfolder['items'][] = $product;
                                    return;
                                }
                            }
                        } else {
                            $brand['items'][] = $product;
                            return;
                        }
                    }
                }
            }
        }
    }

    private function removeProduct(&$items, $productId)
    {
        foreach ($items as $key => $item) {
            if ($item['id'] === $productId) {
                // Delete physical file
                if (isset($item['image']) && file_exists(FCPATH . $item['image'])) {
                    unlink(FCPATH . $item['image']);
                }
                unset($items[$key]);
                $items = array_values($items); // Re-index array
                break;
            }
        }
    }

    private function deleteCategoryImages($category)
    {
        if (isset($category['brands'])) {
            foreach ($category['brands'] as $brand) {
                $this->deleteBrandImages($brand);
            }
        }
    }

    private function deleteBrandImages($brand)
    {
        if (isset($brand['items'])) {
            foreach ($brand['items'] as $item) {
                if (isset($item['image'])) {
                    $imagePath = FCPATH . $item['image'];
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }
        
        if (isset($brand['subfolders'])) {
            foreach ($brand['subfolders'] as $subfolder) {
                if (isset($subfolder['items'])) {
                    foreach ($subfolder['items'] as $item) {
                        if (isset($item['image'])) {
                            $imagePath = FCPATH . $item['image'];
                            if (file_exists($imagePath)) {
                                unlink($imagePath);
                            }
                        }
                    }
                }
            }
        }
    }
}
