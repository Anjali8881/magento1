<?php
class Ccc_Practice3_Adminhtml_Practice3Controller extends Mage_Adminhtml_Controller_Action{

	public function indexAction(){
		$this->loadLayout();
		$this->renderLayout();
	}

	public function newAction(){
		$this->_forward('edit');
	}

	public function editAction(){
		$practice3Id = $this->getRequest()->getParam('id');
		$practice3Model = Mage::getModel('ccc_practice3/practice3')->load($practice3Id);
		if($practice3Model->getId()){
			Mage::register('practice3_data',$practice3Model);
		}
		$this->loadLayout();
		$this->renderLayout();
	}

	public function saveAction(){
		if($this->getRequest()->getPost()){
			try{
				$practice3Data = $this->getRequest()->getPost('practice3');
				$id = $this->getRequest()->getParam('id');
				$practice3Model = Mage::getModel('ccc_practice3/practice3')->load($id);
				if($practice3Model->getId()){
					$practice3Model->setData($practice3Data);
					$practice3Model->setId($id);
					$practice3Model->updated_time = date('Y-m-d H:i:s');
					Mage::getSingleton('Adminhtml/Session')->addSuccess('practice3 Data Updated Successfully');
				}else{
					$practice3Model->setData($practice3Data);
					$practice3Model->created_time = date('Y-m-d H:i:s');
					Mage::getSingleton('Adminhtml/Session')->addSuccess('practice3 Data Inserted Successfully');
				}
				$practice3Model->save();
				$this->_redirect('*/*/');
			}catch(Exception $e){

			}
		}
		$this->_redirect('*/*/');
	}

	public function deleteAction(){
		try{
			$practice3Id = $this->getRequest()->getParam('id');
			$practice3Model = Mage::getModel('ccc_practice3/practice3')->load($practice3Id)->delete();
			Mage::getSingleton('Adminhtml/Session')->addSuccess('practice3 Data Deleted Successfully');
			$this->_redirect('*/*/');
		}catch(Exception $e){

		}
	}
}
?>