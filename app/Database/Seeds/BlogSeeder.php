<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Mengenal Vinyl Lantai Roll: Solusi Lantai Modern untuk Berbagai Kebutuhan',
            'slug' => 'mengenal-vinyl-lantai-roll-solusi-lantai-modern',
            'category' => 'Interior',
            'author' => 'CV Dinamika Inti',
            'image' => 'vinyl-lantai-roll.jpg',
            'content' => '<p>Vinyl lantai roll merupakan salah satu material penutup lantai yang semakin populer dan banyak diaplikasikan pada bangunan komersial maupun residensial. Popularitas ini tidak terlepas dari fleksibilitas desain, variasi ketebalan, serta daya tahannya yang tinggi. Dengan karakteristik tersebut, vinyl roll menjadi solusi lantai modern yang tidak hanya fungsional, tetapi juga mampu menunjang nilai estetika ruang.</p>

<h3>Apa Itu Vinyl Lantai Roll?</h3>
<p>Secara umum, vinyl lantai roll adalah lantai berbahan dasar PVC (Polyvinyl Chloride) yang diproduksi dalam bentuk gulungan panjang. Sistem pemasangan dilakukan dengan cara direkatkan langsung ke permukaan lantai menggunakan lem khusus vinyl, sehingga menghasilkan tampilan lantai yang rata, rapi, dan minim sambungan terbuka. Karakter ini menjadikan vinyl roll unggul untuk area yang membutuhkan lantai dengan kesan seamless dan profesional.</p>

<h3>Penerapan di Berbagai Sektor</h3>
<p>Dalam praktiknya, vinyl lantai roll banyak digunakan oleh berbagai sektor, mulai dari gedung perkantoran, rumah sakit, klinik, sekolah, hingga area komersial seperti hotel dan retail. Tidak hanya itu, hunian modern juga mulai mengadopsi vinyl roll karena sifatnya yang higienis, tahan lama, dan mudah dirawat. Namun, karena proses pemasangannya membutuhkan ketelitian tinggi dan teknik khusus, instalasi vinyl roll umumnya dilakukan oleh tenaga profesional yang berpengalaman.</p>

<h3>Area Penggunaan yang Ideal</h3>
<p>Dari sisi penerapan ruang, vinyl roll sangat cocok digunakan pada area indoor, terutama ruangan dengan lalu lintas aktivitas tinggi dan kebutuhan kebersihan yang ketat. Area luas yang memerlukan lantai dengan sambungan minimal juga menjadi lokasi ideal untuk penggunaan vinyl roll, karena material ini mampu memberikan hasil akhir yang rapi dan konsisten.</p>

<h3>Keunggulan Vinyl Lantai Roll</h3>
<p>Vinyl lantai roll menjadi pilihan tepat ketika proyek membutuhkan lantai dengan efisiensi perawatan jangka panjang, ketahanan terhadap kelembapan dan abrasi, serta standar keamanan dan kebersihan yang tinggi. Faktor-faktor inilah yang membuat vinyl roll sering dijumpai pada fasilitas publik dan bangunan komersial berskala besar.</p>

<p>Salah satu keunggulan utama vinyl roll terletak pada variasi ketebalannya, yang tersedia mulai dari 1,2 mm hingga 8 mm. Ketebalan ini dapat disesuaikan dengan tingkat kebutuhan dan intensitas penggunaan ruang. Selain itu, vinyl roll juga mudah dibersihkan, tahan air, dan relatif tahan aus, sehingga cocok untuk penggunaan jangka panjang.</p>

<h3>Jenis-Jenis Vinyl Lantai Roll</h3>
<p>Berdasarkan struktur lapisannya, vinyl lantai roll terbagi menjadi dua jenis utama:</p>
<ol>
<li><strong>Vinyl Homogeneous</strong> - Vinyl yang memiliki lapisan warna dan motif yang sama dari permukaan hingga lapisan bawah. Jenis ini dikenal lebih tahan terhadap keausan karena warna tidak akan berubah meskipun permukaannya terkikis.</li>
<li><strong>Vinyl Heterogeneous</strong> - Memiliki perbedaan lapisan antara bagian atas dan bawah, serta biasanya dilengkapi lapisan pelindung tambahan untuk meningkatkan daya tahan dan estetika.</li>
</ol>

<h3>Teknik Instalasi</h3>
<p>Dari segi instalasi, pemasangan vinyl lantai roll memerlukan teknik khusus. Prosesnya dilakukan dengan menggunakan lem khusus vinyl, kemudian setiap sambungan antar lembar vinyl disatukan menggunakan <em>welding rod</em> agar hasilnya kuat, rapi, dan tahan lama. Namun, untuk vinyl dengan ketebalan tertentu, umumnya antara 1,2 mm hingga 1,8 mm, penyambungan dapat dilakukan menggunakan teknik <em>overlapping</em> atau tumpang tindih.</p>

<p>Sebelum pemasangan, permukaan lantai harus dipastikan rata, kering, dan bersih agar hasil akhir optimal dan daya rekat maksimal.</p>

<h3>Kesimpulan</h3>
<p>Sebagai kesimpulan, vinyl lantai roll merupakan solusi lantai modern yang menawarkan kombinasi kekuatan, estetika, dan efisiensi perawatan. Dengan memahami karakteristik, jenis, ketebalan, serta metode instalasinya, pemilihan vinyl roll dapat disesuaikan secara optimal dengan kebutuhan ruang dan fungsi bangunan, baik untuk keperluan komersial maupun residensial.</p>',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insert blog
        $this->db->table('blogs')->insert($data);
        
        echo "✓ Blog 'Vinyl Lantai Roll' berhasil ditambahkan!\n";
        echo "========================================\n";
    }
}
