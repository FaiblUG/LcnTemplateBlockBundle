<?php
namespace Lcn\TemplateBlockBundle\Twig;

use Lcn\TemplateBlockBundle\Service\TemplateBlock;

class TemplateBlockExtension extends \Twig_Extension {

    /**
     * @var TemplateBlock
     */
    private $templateBlock;

    public function __construct(TemplateBlock $templateBlock) {
        $this->templateBlock = $templateBlock;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return array(
            'lcn_add_to_template_block' => new \Twig_Function_Method($this, 'addToTemplateBlockFunction'),
            'lcn_template_block' => new \Twig_Function_Method($this, 'templateBlockFunction'),
            'lcn_template_block_raw' => new \Twig_Function_Method($this, 'templateBlockFunction', array('is_safe' => array('html'))),
        );
    }

    public function addToTemplateBlockFunction($blockName, $code) {
        $this->templateBlock->add($blockName, $code);
    }

    public function templateBlockFunction($blockName, $fallbackCode = '') {
        return $this->templateBlock->get($blockName, $fallbackCode);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'lcn_template_block';
    }
}