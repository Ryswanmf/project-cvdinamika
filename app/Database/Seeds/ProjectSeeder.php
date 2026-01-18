<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Data projects dari halaman static
        $projects = [
            // KLINIK
            [
                'title' => 'Clinic DR Belle Pondok Indah',
                'category' => 'Klinik',
                'badge_text' => 'Klinik',
                'image' => 'instalasiklinik-1.png',
                'product_details' => "Gerflor Mipolam Ambiance Ultra - 0043\nLG Hausys Origin - 1203"
            ],
            [
                'title' => 'Dental Clinic 911 Bali',
                'category' => 'Klinik',
                'badge_text' => 'Dental Clinic',
                'image' => 'instalasiklinik-2.png',
                'product_details' => "Omega - LG2001"
            ],
            [
                'title' => 'Klinik Kemenlu',
                'category' => 'Klinik',
                'badge_text' => 'Klinik',
                'image' => 'instalasiklinik-3.png',
                'product_details' => "LG Hausys Origin – SMO1206\nLG Hausys Origin – SMO1203\nLG Hausys Origin – SMO1219"
            ],
            
            // RUMAH SAKIT
            [
                'title' => 'RS Orthopedi Siaga Raya',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-1.jpg',
                'product_details' => "Mipolam 180 - 2009"
            ],
            [
                'title' => 'Madaya Royal Hospital Puri',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-2.png',
                'product_details' => "LG Hausys Supreme – SPR1802"
            ],
            [
                'title' => 'IGD Soedarso',
                'category' => 'Rumah Sakit',
                'badge_text' => 'IGD',
                'image' => 'rumahsakit-3.png',
                'product_details' => "LG Hausys Origin – SMO1228"
            ],
            [
                'title' => 'RS Mata JEC',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit Mata',
                'image' => 'rumahsakit-4.png',
                'product_details' => "Vinyl Flooring Premium"
            ],
            [
                'title' => 'RSK Dharmais',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-5.png',
                'product_details' => "Ambiance Ultra - 2054"
            ],
            [
                'title' => 'RSIA Kemang Medical Care',
                'category' => 'Rumah Sakit',
                'badge_text' => 'RSIA',
                'image' => 'rumahsakit-6.png',
                'product_details' => "Allroad GF - 81004\nAllroad GF - 81010"
            ],
            [
                'title' => 'RS Bhayangkara Pontianak',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-7.png',
                'product_details' => "LG Hausys Unite 4212"
            ],
            [
                'title' => 'RS Muhammadiyah Taman Puring',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-8.png',
                'product_details' => "LG Hausys Unite"
            ],
            [
                'title' => 'RS Immanuel Way Halim',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-9.png',
                'product_details' => "Omega – DG 2002"
            ],
            [
                'title' => 'RSUD Simo Kab Boyolali',
                'category' => 'Rumah Sakit',
                'badge_text' => 'RSUD',
                'image' => 'rumahsakit-10.png',
                'product_details' => "LG Hausys Origin – SMO1212\nLG Hausys Origin – SMO1201"
            ],
            [
                'title' => 'RSUD Tarakan Jakarta',
                'category' => 'Rumah Sakit',
                'badge_text' => 'RSUD',
                'image' => 'rumahsakit-11.png',
                'product_details' => "Gerflor Mipolam Concept – 5025\nMipolam Ambiance Ultra – 0044"
            ],
            [
                'title' => 'RSKIA Kopo Bandung',
                'category' => 'Rumah Sakit',
                'badge_text' => 'RSKIA',
                'image' => 'rumahsakit-12.png',
                'product_details' => "LG Hausys Unite – SMU4212"
            ],
            [
                'title' => 'RSUD Kab Bengkayang',
                'category' => 'Rumah Sakit',
                'badge_text' => 'RSUD',
                'image' => 'rumahsakit-13.jpg',
                'product_details' => "LG Hausys Unite – SMU4212"
            ],
            [
                'title' => 'RS Humana Prima Bandung',
                'category' => 'Rumah Sakit',
                'badge_text' => 'Rumah Sakit',
                'image' => 'rumahsakit-14.png',
                'product_details' => "LG Hausys Allroad 81007"
            ],
            
            // INSTITUT PENDIDIKAN
            [
                'title' => 'BPK Penabur Bandung',
                'category' => 'Institut Pendidikan',
                'badge_text' => 'Sekolah',
                'image' => 'pendidikan-1.png',
                'product_details' => "LG Hausys Leisure - 6400"
            ],
            [
                'title' => 'Universitas Solo - Ruang Alkes',
                'category' => 'Institut Pendidikan',
                'badge_text' => 'Universitas',
                'image' => 'pendidikan-2.png',
                'product_details' => "LG Hausys Unite"
            ],
            [
                'title' => 'Universitas Mataram - Fakultas Kedokteran',
                'category' => 'Institut Pendidikan',
                'badge_text' => 'Universitas',
                'image' => 'pendidikan-3.png',
                'product_details' => "GFlor Allroad - 81010"
            ],
            [
                'title' => 'Cita Buana',
                'category' => 'Institut Pendidikan',
                'badge_text' => 'Pendidikan',
                'image' => 'pendidikan-4.png',
                'product_details' => "LG Hausys Unite"
            ],
            
            // AREA OLAHRAGA
            [
                'title' => 'GOR Kalimantan',
                'category' => 'Area Olahraga',
                'badge_text' => 'GOR',
                'image' => 'olahraga-1.png',
                'product_details' => "Kumgang Sport 4.5mm"
            ],
            
            // COMMERCIAL
            [
                'title' => 'PT Bernofarm Petojo Gudang Obat',
                'category' => 'Commercial',
                'badge_text' => 'Industri',
                'image' => 'commercial-1.png',
                'product_details' => "LG Hausys Palace - PAL9201"
            ],
            [
                'title' => 'PT Panasonic Manufacturing',
                'category' => 'Commercial',
                'badge_text' => 'Manufacturing',
                'image' => 'commercial-2.png',
                'product_details' => "Omega - 18015"
            ],
            [
                'title' => 'Hotel Gran Melia Kuningan (Dapur Cake)',
                'category' => 'Commercial',
                'badge_text' => 'Hotel',
                'image' => 'commercial-3.png',
                'product_details' => "GFlor Allroad – AR81004"
            ],
            [
                'title' => 'Gedung MPP Pontianak',
                'category' => 'Commercial',
                'badge_text' => 'Gedung Pemerintah',
                'image' => 'commercial-4.png',
                'product_details' => "LG Hausys Decotile 60x60 – 6523"
            ],
            
            // HEALTHY CARE
            [
                'title' => 'PMI Kutai Kertanegara',
                'category' => 'Healthy Care',
                'badge_text' => 'PMI',
                'image' => 'healthycare-1.png',
                'product_details' => "Omega – Cream 18013"
            ],
            [
                'title' => 'PMI Serang',
                'category' => 'Healthy Care',
                'badge_text' => 'PMI',
                'image' => 'healthycare-2.png',
                'product_details' => "GFlor Allroad – AR81037"
            ],
        ];

        // Copy images dari img ke uploads/projects
        $sourceDir = FCPATH . 'img/';
        $targetDir = FCPATH . 'uploads/projects/';
        
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        echo "Mengimpor data...\n\n";
        
        foreach ($projects as $project) {
            // Copy image
            $sourceFile = $sourceDir . $project['image'];
            $targetFile = $targetDir . $project['image'];
            
            if (file_exists($sourceFile) && !file_exists($targetFile)) {
                copy($sourceFile, $targetFile);
                echo "✓ Copied: {$project['image']}\n";
            }
            
            // Insert data
            $this->db->table('projects')->insert([
                'title' => $project['title'],
                'category' => $project['category'],
                'badge_text' => $project['badge_text'],
                'image' => $project['image'],
                'product_details' => $project['product_details'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            echo "✓ Imported: {$project['title']}\n";
        }
        
        echo "\n========================================\n";
        echo "Import selesai! Total: " . count($projects) . " proyek\n";
        echo "========================================\n";
    }
}
