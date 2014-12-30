<?php
namespace Lcn\TemplateBlockBundle\Service;

class TemplateBlock {

    private $blocks = array();

    public function add($blockName, $code, $unique = true)
    {
        if (!array_key_exists($blockName, $this->blocks)) {
            $this->blocks[$blockName] = array();
        }
        if (!$unique || !in_array($code, $this->blocks[$blockName])) {
            $this->blocks[$blockName][] = $code;
        }
    }

    public function get($blockName, $default = null) {
        if (array_key_exists($blockName, $this->blocks)) {
            return implode(PHP_EOL, $this->blocks[$blockName]);
        }
        else {
            return $default;
        }

    }

}