<?php

/**
 * http://www.sitepoint.com/guzzle-php-http-client/
 * http://phpunit.de/manual/3.7/en/
 * http://plantuml.sourceforge.net
 * Class HelloWorldTest
 */
class HelloWorldTest extends PHPUnit_Framework_TestCase
{
    public function testString()
    {
        $string = "Hello world";
        $this->assertEquals("Hello world", $string);
    }

    /**
     * @startuml
     * actor client
     * client -> Web: запрашиваем страницу услуги (/services/)
     * Web -> client: возвращает [response]
     * note left #cyan
     *        проверяем
     *        response.status = 200
     * end note
     * @enduml
     */
    public function testWeb()
    {
        $client   = new \Guzzle\Http\Client('http://' . MAIN_DOMAIN_NAME);
        $request  = $client->get('/service/');
        $response = $request->send();
        $this->assertEquals($response->getStatusCode(), 200);
    }

}
 
