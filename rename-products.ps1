# Script Auto Rename Product Images
# Cara pakai: 
# 1. Download semua dari Google Drive ke folder temporary
# 2. Update $sourcePath di bawah ini dengan path folder download Anda
# 3. Jalankan script ini di PowerShell
# 4. Gambar yang sudah di-rename akan ada di folder 'renamed-products'

# ===== KONFIGURASI =====
$sourcePath = "E:\temp-download\HOMOGENEOUS SHEET"  # GANTI DENGAN PATH FOLDER DOWNLOAD ANDA
$outputPath = "E:\project-cvdinamika\public\uploads\products"
$reportFile = "E:\project-cvdinamika\rename-report.txt"

# ===== SCRIPT DIMULAI =====
Write-Host "===============================================" -ForegroundColor Cyan
Write-Host "Auto Rename Product Images Script" -ForegroundColor Cyan
Write-Host "===============================================" -ForegroundColor Cyan
Write-Host ""

# Cek apakah source folder ada
if (-not (Test-Path $sourcePath)) {
    Write-Host "ERROR: Folder tidak ditemukan: $sourcePath" -ForegroundColor Red
    Write-Host "Silakan download dari Google Drive dan update variable `$sourcePath" -ForegroundColor Yellow
    exit
}

# Buat output folder jika belum ada
if (-not (Test-Path $outputPath)) {
    New-Item -ItemType Directory -Path $outputPath -Force | Out-Null
    Write-Host "✓ Folder output dibuat: $outputPath" -ForegroundColor Green
}

# Mulai rename
$counter = 0
$report = @()
$report += "RENAME REPORT - $(Get-Date)"
$report += "=" * 80
$report += ""

Write-Host "Scanning folders..." -ForegroundColor Yellow
Write-Host ""

# Loop semua subfolder (brand/product)
Get-ChildItem -Path $sourcePath -Directory | ForEach-Object {
    $brandFolder = $_
    $brandName = $brandFolder.Name
    
    Write-Host "Processing brand: $brandName" -ForegroundColor Cyan
    
    # Cek apakah ada subfolder di dalam brand (seperti Armstrong/Medintone)
    $subFolders = Get-ChildItem -Path $brandFolder.FullName -Directory
    
    if ($subFolders.Count -gt 0) {
        # Ada subfolder (nested structure)
        foreach ($subFolder in $subFolders) {
            $productName = $subFolder.Name
            $imageFiles = Get-ChildItem -Path $subFolder.FullName -File -Include *.jpg,*.jpeg,*.png,*.JPG,*.JPEG,*.PNG
            
            $imageCounter = 1
            foreach ($image in $imageFiles) {
                $extension = $image.Extension.ToLower()
                $newName = "$brandName-$productName-$imageCounter$extension"
                $newPath = Join-Path $outputPath $newName
                
                Copy-Item -Path $image.FullName -Destination $newPath -Force
                
                $report += "✓ $($image.Name) → $newName"
                Write-Host "  ✓ $newName" -ForegroundColor Green
                
                $counter++
                $imageCounter++
            }
        }
    } else {
        # Tidak ada subfolder, gambar langsung di folder brand
        $imageFiles = Get-ChildItem -Path $brandFolder.FullName -File -Include *.jpg,*.jpeg,*.png,*.JPG,*.JPEG,*.PNG
        
        $imageCounter = 1
        foreach ($image in $imageFiles) {
            $extension = $image.Extension.ToLower()
            $newName = "$brandName-$imageCounter$extension"
            $newPath = Join-Path $outputPath $newName
            
            Copy-Item -Path $image.FullName -Destination $newPath -Force
            
            $report += "✓ $($image.Name) → $newName"
            Write-Host "  ✓ $newName" -ForegroundColor Green
            
            $counter++
            $imageCounter++
        }
    }
    
    $report += ""
}

# Simpan report
$report += ""
$report += "=" * 80
$report += "Total gambar di-rename: $counter"
$report | Out-File -FilePath $reportFile -Encoding UTF8

Write-Host ""
Write-Host "===============================================" -ForegroundColor Cyan
Write-Host "✓ SELESAI!" -ForegroundColor Green
Write-Host "Total gambar: $counter" -ForegroundColor Yellow
Write-Host "Output folder: $outputPath" -ForegroundColor Yellow
Write-Host "Report: $reportFile" -ForegroundColor Yellow
Write-Host "===============================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Silakan cek folder output dan report untuk detailnya." -ForegroundColor White
