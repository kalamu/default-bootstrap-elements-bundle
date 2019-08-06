<?php

/*
 * This file is part of the kalamu/cms-admin-bundle package.
 *
 * (c) ETIC Services
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kalamu\DefaultBootstrapElementsBundle\Element;

use Kalamu\DashboardBundle\Model\AbstractConfigurableElement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;
/**
 * Element that display a menu
 */
class MenuElement extends AbstractConfigurableElement
{

    protected $template;

    public function __construct($template) {
        $this->template = $template;
    }

    public function getTitle() {
        return 'cms.menu.title';
    }

    public function getDescription() {
        return 'cms.menu.description';
    }

    public function getForm(Form $form){
        $form->add("menu", EntityType::class, array('label' => 'Menu',
            'class' => 'KalamuCmsAdminBundle:Menu',
        ));

        return $form;
    }

    /**
     * @return string
     */
    public function render(TwigEngine $templating){
        $menu = $this->parameters['menu'];

        return $templating->render($this->template, array('menu' => $menu));
    }

}