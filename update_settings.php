<?php
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();

$data = [
    ['key_name' => 'contact_email_2', 'value' => 'toko.kumgang26@gmail.com'],
    ['key_name' => 'contact_phone_2', 'value' => '0857-7112-2100'],
    ['key_name' => 'contact_email', 'value' => 'harmony.decor26@gmail.com'],
    ['key_name' => 'contact_phone', 'value' => '0813-1974-0808'],
];

foreach ($data as $row) {
    $check = $db->table('site_settings')->where('key_name', $row['key_name'])->get()->getRow();
    if ($check) {
        $db->table('site_settings')->where('key_name', $row['key_name'])->update(['value' => $row['value']]);
    } else {
        $db->table('site_settings')->insert($row);
    }
}

// Clear cache
$cache = \Config\Services::cache();
$cache->delete('site_settings');

echo "Database updated successfully.";
