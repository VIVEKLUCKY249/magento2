<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Tests for \Magento\Framework\Data\Form\Element\Button
 */
namespace Magento\Framework\Data\Test\Unit\Form\Element;

class ButtonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_objectManagerMock;

    /**
     * @var \Magento\Framework\Data\Form\Element\Button
     */
    protected $_model;

    protected function setUp()
    {
        $factoryMock = $this->getMock(\Magento\Framework\Data\Form\Element\Factory::class, [], [], '', false);
        $collectionFactoryMock = $this->getMock(
            \Magento\Framework\Data\Form\Element\CollectionFactory::class,
            [],
            [],
            '',
            false
        );
        $escaperMock = $this->getMock(\Magento\Framework\Escaper::class, [], [], '', false);
        $this->_model = new \Magento\Framework\Data\Form\Element\Button(
            $factoryMock,
            $collectionFactoryMock,
            $escaperMock
        );
        $formMock = new \Magento\Framework\DataObject();
        $formMock->getHtmlIdPrefix('id_prefix');
        $formMock->getHtmlIdPrefix('id_suffix');
        $this->_model->setForm($formMock);
    }

    /**
     * @covers \Magento\Framework\Data\Form\Element\Button::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('button', $this->_model->getType());
        $this->assertEquals('textfield', $this->_model->getExtType());
    }

    /**
     * @covers \Magento\Framework\Data\Form\Element\Button::getHtmlAttributes
     */
    public function testGetHtmlAttributes()
    {
        $this->assertEmpty(
            array_diff(
                [
                    'type',
                    'title',
                    'class',
                    'style',
                    'onclick',
                    'onchange',
                    'disabled',
                    'readonly',
                    'tabindex',
                    'placeholder',
                    'data-mage-init',
                ],
                $this->_model->getHtmlAttributes()
            )
        );
    }
}
