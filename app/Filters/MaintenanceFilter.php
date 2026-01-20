<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SiteSettingModel;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Cek URI. Jika sedang di admin atau login, abaikan.
        $uri = $request->getUri()->getPath();
        if (strpos($uri, 'admin') === 0 || strpos($uri, 'login') === 0 || strpos($uri, 'logout') === 0) {
            return;
        }

        // 2. Cek apakah Admin sedang login (Biar admin bisa lihat web meski mode maintenance on)
        if (session()->get('admin_logged_in')) {
            return;
        }

        // 3. Ambil setting maintenance_mode
        $cache = cache('site_settings');
        if (!$cache) {
            $model = new SiteSettingModel();
            $settings = $model->findAll();
            $cache = [];
            foreach ($settings as $s) {
                $cache[$s['key_name']] = $s['value'];
            }
            cache()->save('site_settings', $cache, 3600);
        }

        $isMaintenance = ($cache['maintenance_mode'] ?? 'off') == 'on';

        if ($isMaintenance) {
            echo view('maintenance');
            exit;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
