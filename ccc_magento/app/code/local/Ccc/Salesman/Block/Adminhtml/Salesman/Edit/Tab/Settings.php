<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2017 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Create product settings tab
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Ccc_Salesman_Block_Adminhtml_Salesman_Edit_Tab_Settings extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareLayout()
    {
        $this->setChild('continue_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('catalog')->__('Continue'),
                    'onclick'   => "setSettings('".$this->getContinueUrl()."','attribute_set_id')",
                    'class'     => 'save'
                    ))
                );
        return parent::_prepareLayout();
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('settings', array('legend'=>Mage::helper('catalog')->__('Create Product Settings')));

        $entityType = Mage::registry('current_salesman')->getResource()->getEntityType();

        $fieldset->addField('attribute_set_id', 'select', array(
            'label' => Mage::helper('catalog')->__('Attribute Set'),
            'title' => Mage::helper('catalog')->__('Attribute Set'),
            'name'  => 'set',
            'value' => $entityType->getDefaultAttributeSetId(),
            'values'=> Mage::getResourceModel('eav/entity_attribute_set_collection')
                ->setEntityTypeFilter($entityType->getId())
                ->load()
                ->toOptionArray()
        ));

        
        $fieldset->addField('continue_button', 'note', array(
            'text' => $this->getChildHtml('continue_button'),
        ));

        $this->setForm($form);
    }

    public function getContinueUrl()
    {
        return $this->getUrl('*/*/new', array(
            '_current'  => true,
            'set'       => '{{attribute_set}}',
            'type'      => '{{type}}'
        ));
    }

}
?>
<script>
    var productTemplateSyntax = /(^|.|\r|\n)({{(\w+)}})/;
    function setSettings(urlTemplate, setElement) {
        var template = new Template(urlTemplate, productTemplateSyntax);
        setLocation(template.evaluate({attribute_set:$F(setElement)}));
    }
</script>