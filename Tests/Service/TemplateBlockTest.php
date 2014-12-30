<?php
namespace Lcn\TemplateBlockBundle\Tests\Service;

use Lcn\TemplateBlockBundle\Service\TemplateBlock;

class TemplateBlockTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $templateBlock = new TemplateBlock();

        $this->assertEquals('', $templateBlock->get('test'));
        $this->assertEquals('fallback-code', $templateBlock->get('test', 'fallback-code'));

        $templateBlock->add('test', 'test 1');
        $this->assertEquals('test 1', $templateBlock->get('test'));
        $this->assertEquals('test 1', $templateBlock->get('test', 'fallback-code'));
    }

    public function testAddMultipleBlocks()
    {
        $templateBlock = new TemplateBlock();

        $templateBlock->add('test_1', 'test 1');
        $templateBlock->add('test_2', 'test 2');
        $this->assertEquals('test 1', $templateBlock->get('test_1'));
        $this->assertEquals('test 2', $templateBlock->get('test_2'));
    }

    public function testAddUnique()
    {
        $templateBlock = new TemplateBlock();

        $value1 = 'test 1';
        $value2 = 'test 2';

        $templateBlock->add('test', $value1);
        $this->assertEquals($value1, $templateBlock->get('test'));

        $templateBlock->add('test', $value1);
        $this->assertEquals($value1, $templateBlock->get('test'));

        $templateBlock->add('test', $value2);
        $this->assertEquals($value1."\n".$value2, $templateBlock->get('test'));
    }

    public function testAddNonUnique()
    {
        $templateBlock = new TemplateBlock();

        $value = 'test';

        $templateBlock->add('test', $value);
        $this->assertEquals($value, $templateBlock->get('test'));

        $templateBlock->add('test', $value, false);
        $this->assertEquals($value."\n".$value, $templateBlock->get('test'));
    }

    public function testClear()
    {
        $templateBlock = new TemplateBlock();

        $templateBlock->add('test', 'test 1');
        $templateBlock->clear('test');
        $this->assertEquals('', $templateBlock->get('test'));
    }

    public function testSet()
    {
        $templateBlock = new TemplateBlock();

        $templateBlock->set('test', 'test 1');
        $this->assertEquals('test 1', $templateBlock->get('test'));

        $templateBlock->set('test', 'test 2');
        $this->assertEquals('test 2', $templateBlock->get('test'));
    }
}
