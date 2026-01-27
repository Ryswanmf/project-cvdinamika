<?php
require 'vendor/autoload.php';

$db = \Config\Database::connect();

echo "Total Products: " . $db->table('products')->countAllResults() . PHP_EOL;

$categories = $db->table('products')->distinct()->select('category')->get()->getResultArray();
echo "Total Categories: " . count($categories) . PHP_EOL;
foreach($categories as $cat) {
    echo "  - " . $cat['category'] . PHP_EOL;
}
