<?php

namespace App\Services;

class ParserService {

    protected function get_html_string($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


        return curl_exec($curl);
    }

    public function parse() {
        $url = "https://www.mptplastic.ru/products/naporno_vsasyvayushchie_shlangi_pvh/seriya_200sc/200sc75/";
        $dom  = new \DOMDocument();

        libxml_use_internal_errors(true);
        $dom->loadHTML($this->get_html_string($url));
        libxml_use_internal_errors(false);

        $xpath = new \DOMXpath($dom);

        $item = $xpath->query('//*[@id="layoutPage"]/div[1]/div[4]/div[3]/div[3]/div/div[5]/h1', $dom)->item(0);
        return $xpath;
    }
}
