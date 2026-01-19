<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Backup extends BaseController
{
    public function index()
    {
        // Hanya izinkan admin yang login (sudah dihandle filter auth, tapi double check ok)
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('login');
        }

        try {
            // Load database utility
            // Note: CI4 tidak punya built-in db backup utility sekuat CI3.
            // Kita akan gunakan mysqldump shell command jika memungkinkan, atau PHP fallback sederhana.
            // Karena ini di Windows (Laragon) dan mungkin hosting shared, PHP fallback lebih aman meski terbatas.
            
            $db = \Config\Database::connect();
            $dbname = $db->database;
            $hostname = $db->hostname;
            $username = $db->username;
            $password = $db->password;

            // Nama file backup
            $filename = 'backup_' . $dbname . '_' . date('Y-m-d_H-i-s') . '.sql';
            
            // Header untuk download
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . $filename . "\"");

            // 1. Get Tables
            $tables = $db->listTables();
            
            // Output SQL header
            echo "-- Backup Database: " . $dbname . "\n";
            echo "-- Generated: " . date('Y-m-d H:i:s') . "\n\n";
            echo "SET FOREIGN_KEY_CHECKS=0;\n\n";

            foreach ($tables as $table) {
                // Structure
                $createTable = $db->query("SHOW CREATE TABLE `$table`")->getRowArray();
                echo "-- Structure for table `$table`\n";
                echo "DROP TABLE IF EXISTS `$table`;\n";
                echo $createTable['Create Table'] . ";\n\n";

                // Data
                $rows = $db->table($table)->get()->getResultArray();
                if (!empty($rows)) {
                    echo "-- Data for table `$table`\n";
                    foreach ($rows as $row) {
                        $values = array_map(function($val) use ($db) {
                            if ($val === null) return 'NULL';
                            return $db->escape($val);
                        }, $row);
                        
                        echo "INSERT INTO `$table` VALUES (" . implode(", ", $values) . ");\n";
                    }
                    echo "\n";
                }
            }
            
            echo "SET FOREIGN_KEY_CHECKS=1;\n";
            exit;

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }
}
