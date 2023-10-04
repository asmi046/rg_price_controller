<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

use DB;

use Shuchkin\SimpleXLSX;

class ProductInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = base_path() . '/public/base/all_tovar_0410.xlsx';

        $main_data = [];

        if (($handle = fopen($files, "r")) !== FALSE) {
            echo  $files."\n\r";
            $row = 0;
            // while (($data = fgetcsv($handle, 10000, "	")) !== FALSE) {
            //     if ($row == 0) {$row++; continue;}
            //     if (empty($data[0])) break;
            //     var_dump($data);
            //     $main_data[] = [
            //         // "marketplace" => iconv("windows-1251", "utf-8",  $data[0]),
            //         // "name" => iconv("windows-1251", "utf-8", $data[1]),
            //         // "saler" => iconv("windows-1251", "utf-8", $data[2]),
            //         // "manufacture" => iconv("windows-1251", "utf-8",  $data[3]),
            //         // "color" => iconv("windows-1251", "utf-8",  $data[4]),
            //         // "sfera" => iconv("windows-1251", "utf-8", $data[5]),
            //         // "analog_rg" => iconv("windows-1251", "utf-8", $data[6]),
            //         // "width" => intval($data[7]),
            //         // "diametr" => intval($data[8]),
            //         // "link" => iconv("windows-1251", "utf-8", $data[11]),

            //         "marketplace" =>  $data[0],
            //         "name" => $data[1],
            //         "saler" => $data[2],
            //         "manufacture" => $data[3],
            //         "color" =>  $data[4],
            //         "sfera" => $data[5],
            //         "analog_rg" =>  $data[6],
            //         "width" => intval($data[7]),
            //         "diametr" => intval($data[8]),
            //         "link" => $data[11],
            //     ];
            //     $row++;
            // }

            if ( $xlsx = SimpleXLSX::parse($files) ) {
                foreach( $xlsx->rows(3) as $r ) {
                    if (empty($r[1])) continue;
                    if ($r[1] === "Маркетплейс") continue;
                    $main_data[] = [
                        "marketplace" =>  $r[1],
                        "name" => $r[2],
                        "saler" => $r[3],
                        "manufacture" => $r[4],
                        "color" =>  $r[5],
                        "sfera" => $r[6],
                        "analog_rg" =>  $r[7],
                        "code_1c_rg" => $r[8],
                        "vc_plan" => floatval($r[9]),
                        "width" => intval($r[10]),
                        "diametr" => intval($r[11]),
                        "link" => $r[14],
                    ];
                    print_r($main_data);
                }
            } else {
                echo SimpleXLSX::parseError();
            }

            DB::table("product_information")->insert($main_data);
        }
    }
}
