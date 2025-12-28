<?php
$url = 'http://localhost/login';
$data = http_build_query(['username' => 'admin', 'password' => 'password']);
$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data,
        'ignore_errors' => true,
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo "HTTP response:\n";
if (isset($http_response_header)) {
    foreach ($http_response_header as $h) echo $h . "\n";
}
echo "\nBody:\n" . substr($result,0,1000) . "\n";
