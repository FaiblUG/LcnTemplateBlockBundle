Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require locaine/lcn-template-block-bundle "~1"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Lcn\TemplateBlockBundle\LcnTemplateBlockBundle(),
        );

        // ...
    }

    // ...
}
```


Usage
============

PHP
---

Example controller code:

```php
//add code to a block
$this->container->get('lcn.template_block')->add('BLOCK_NAME', 'BLOCK_CONTENT');

////adding the same code to a block again is ignored by default. You can force adding the same code by supplying false as third argument
$this->container->get('lcn.template_block')->add('BLOCK_NAME', 'BLOCK_CONTENT', false);

//you can set the code in a block effectively overriding existing code in the block
$this->container->get('lcn.template_block')->set('BLOCK_NAME', 'BLOCK_CONTENT');

//clear a block
$this->container->get('lcn.template_block')->clear('BLOCK_NAME');

//get the code of a block
$this->container->get('lcn.template_block')->get('BLOCK_NAME', 'OPTIONAL_FALLBACK_CODE');
```

TWIG
----

Example Twig template code:

```tiwg
//add code to a block
{{ lcn_add_to_template_block('BLOCK_NAME', 'BLOCK_CONTENT') }}

//adding the same code to a block again is ignored by default. You can force adding the same code by supplying false as third argument
{{ lcn_add_to_template_block('BLOCK_NAME', 'BLOCK_CONTENT', false) }}

//you can set the code in a block effectively overriding existing code in the block
{{ lcn_set_template_block('BLOCK_NAME', 'BLOCK_CONTENT') }}

//clear a block
{{ lcn_clear_template_block('BLOCK_NAME') }}

//get the code of a block
{{ lcn_template_block('BLOCK_NAME', 'OPTIONAL_FALLBACK_CODE') }}
```
