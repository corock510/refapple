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
        $host = 'http://selenium:4444/wd/hub';

        $options = new ChromeOptions();
        $options->addArguments(['--headless', '--no-sandbox', '--disable-dev-shm-usage']);

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

        $driver = RemoteWebDriver::create($host, $capabilities);

        $driver->get('https://www.apple.com/jp/shop/refurbished/mac/macbook-pro-64gb');

        // wait for the page to load
        $driver->wait()->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::className('rf-refurb-results'))
        );

        $elements = $driver->findElements(WebDriverBy::className('rf-refurb-results'));

        $items = [];
        foreach ($elements as $element) {
            // Get the image element
            $imageElement = $element->findElement(WebDriverBy::tagName('img'));
            // Get the src attribute of the image
            $imageUrl = $imageElement->getAttribute('src');
            // Get the text of the element
            $text = $element->getText();
            $items[] = ['imageUrl' => $imageUrl, 'text' => $text];
        }

        $driver->quit();

        // Pass the items to the view
        return view('index', ['items' => $items]);
    }
}
