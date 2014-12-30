<?php

namespace Lcn\TemplateBlockBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lcn-template-block/demo');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertTrue(false !== strpos($crawler->html(), '&lt;div&gt;TEST TWIG ADD 1&lt;/div&gt;'));
    }
}
