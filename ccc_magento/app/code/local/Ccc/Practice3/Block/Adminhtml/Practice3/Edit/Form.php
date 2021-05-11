<?php 
class Ccc_Practice3_Block_Adminhtml_Practice3_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	protected function _prepareForm(){
		$form = new Varien_Data_Form(['id' => 'edit_form','action' => $this->getUrl('*/*/save',['id' => $this->getRequest()->getParam('id')]),'method' => 'post']);
		$form->setUseContainer(true);
		$this->setForm($form);

		$fieldset = $form->addFieldSet('display',[
			'legend' => 'Practice3 Information',
			'class' => 'fieldset'
		]);

		$fieldset->addField('title','text',[
			'name' => 'practice3[title]',
			'label' => 'Title',
			'required' => true
		]);

		$fieldset->addField('status','select',[
			'name' => 'practice3[status]',
			'label' => 'status',
			'values' => [
				[
					'value' => 1,
					'label' => 'Active'
				],
				[
					'value' => 0,
					'label' => 'Inactive'
				]
			]
		]);

		//for edit
		if(Mage::registry('practice3_data')){
			$form->setValues(Mage::registry('practice3_data')->getData());
		}

		return parent::_prepareForm();
	}
}
?>