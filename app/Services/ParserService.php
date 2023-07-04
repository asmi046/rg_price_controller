<?php

namespace App\Services;

class ParserService {

    protected function get_html_string($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        return curl_exec($curl);
    }

    public function parse() {
        $url = "https://market.yandex.ru/product--shlang-naporno-vsasyvaiushchii-pvkh-forplast-2-30m/1816447227?cpc=FMN1DR1Bua042ZqXjIYJLTYJUSG7y7hX5rHE_ixYw1Dln2oCm6dqUNxlQGH992pY6THDF5ZadL-qFSS_sTKzbtiDwT5AfZxPDfsyywRPqFZvns-RoDPuRRgP6c5xqwGuvs-otguTznsrVppUPg_OOHNoCEau12VJ03UgJMxnpi4jH2_rJUfcUR1f_0IQLbbLV_coM2ob1dYNPxGkuXnErsOukfaPd9Bdnolcrlj-FpRejWNHmc603lXuZrmkg74x6skYI6haNbyTqpKh_OHgsQ%2C%2C&sku=101940092293&do-waremd5=Em7WWoCOpBUvooa89o4gdA&cpa=1&nid=18033952";
        $dom  = new \DOMDocument();

        libxml_use_internal_errors(true);
        $dom->loadHTML($this->get_html_string($url));
        libxml_use_internal_errors(false);

        $xpath = new \DOMXpath($dom);

        $item = $xpath->query('//*[@id="layoutPage"]/div[1]/div[4]/div[3]/div[3]/div/div[5]/h1', $dom)->item(0);
        return $xpath;
    }
}
