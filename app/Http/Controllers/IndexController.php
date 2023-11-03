<?php

namespace App\Http\Controllers;


use Facebook\WebDriver\Chrome\ChromeDriverService;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // top page
    public function index()
    {
        // ChromeDriverのURL
        $host = 'http://selenium:4444/wd/hub';

        // ChromeOptionsのインスタンスを作成
        $options = new ChromeOptions();

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY_W3C, $options);

        // RemoteWebDriverを起動し、ChromeDriverに接続
        $driver = RemoteWebDriver::create($host, $capabilities);

        // スクレイピングしたいウェブページにアクセス
        $driver->get('https://www.apple.com/jp/shop/refurbished/mac/macbook-pro-64gb');

        // 5秒待機
        $driver->wait(10);

        // class="rf-refurb-results"を含む要素を取得して表示
        $elements = $driver->findElements(WebDriverBy::className('rf-refurb-results'));
        // foreach ($elements as $element) {
        //     echo $element->getText() . PHP_EOL;
        // }
        dd($elements);


        // return view("index");
    }
}
