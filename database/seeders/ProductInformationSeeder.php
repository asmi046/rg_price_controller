<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

use DB;

class ProductInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = base_path() . '/public/base/all_tovars.csv';

        $main_data = [];

        if (($handle = fopen($files, "r")) !== FALSE) {
            echo  $files."\n\r";
            $row = 0;
            while (($data = fgetcsv($handle, 10000, "	")) !== FALSE) {
                if ($row == 0) {$row++; continue;}
                if (empty($data[0])) break;
                var_dump($data);
                $main_data[] = [
                    // "marketplace" => iconv("windows-1251", "utf-8",  $data[0]),
                    // "name" => iconv("windows-1251", "utf-8", $data[1]),
                    // "saler" => iconv("windows-1251", "utf-8", $data[2]),
                    // "manufacture" => iconv("windows-1251", "utf-8",  $data[3]),
                    // "color" => iconv("windows-1251", "utf-8",  $data[4]),
                    // "sfera" => iconv("windows-1251", "utf-8", $data[5]),
                    // "analog_rg" => iconv("windows-1251", "utf-8", $data[6]),
                    // "width" => intval($data[7]),
                    // "diametr" => intval($data[8]),
                    // "link" => iconv("windows-1251", "utf-8", $data[11]),

                    "marketplace" =>  $data[0],
                    "name" => $data[1],
                    "saler" => $data[2],
                    "manufacture" => $data[3],
                    "color" =>  $data[4],
                    "sfera" => $data[5],
                    "analog_rg" =>  $data[6],
                    "width" => intval($data[7]),
                    "diametr" => intval($data[8]),
                    "link" => $data[11],
                ];
                $row++;
            }

            DB::table("product_information")->insert($main_data);
        }
    }
}
