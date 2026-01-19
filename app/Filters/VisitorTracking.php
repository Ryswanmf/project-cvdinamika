<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VisitorModel;

class VisitorTracking implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jangan catat jika request ke halaman admin atau API
        $uri = $request->getUri()->getPath();
        if (strpos($uri, 'admin') === 0 || strpos($uri, 'api') === 0) {
            return;
        }

        $ip = $request->getIPAddress();
        $agent = $request->getUserAgent()->getAgentString();
        $today = date('Y-m-d');

        $model = new VisitorModel();

        // Cek apakah IP ini sudah berkunjung hari ini
        $exists = $model->where('ip_address', $ip)
                        ->where('visit_date', $today)
                        ->first();

        if (!$exists) {
            $model->insert([
                'ip_address' => $ip,
                'user_agent' => $agent,
                'visit_date' => $today
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
