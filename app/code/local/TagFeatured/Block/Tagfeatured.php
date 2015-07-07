<?php

class S900_TagFeatured_Block_Tagfeatured extends Mage_Core_Block_Template{
	

	protected function getProductCollection(){
        
        $limit = $this->getData('limit') ? $this->getData('limit') : $this->getGeneralConfig('number_of_items');
		$tagString = $this->getData('tagname');
        $storeId = Mage::app()->getStore()->getId();
        
        $tagByName = Mage::getModel('tag/tag')->loadByName($tagString);
        $tag = null;
        if($tagByName->getId()){
            $tag = Mage::getModel('tag/tag')->load($tagByName->getId());
        }
        if(!$tag || !$tag->getId() || !$tag->isAvailableInStore($storeId)) {
            return new Varien_Data_Collection();
        }

        $productIds = $tag->getRelatedProductIds();
        
        if(!count($productIds)){
            return new Varien_Data_Collection();
        }
        
        $productCollection = Mage::getModel('catalog/product')->getCollection()
            ->setStoreId($storeId)
            ->addAttributeToSelect('*')
            ->addFieldToFilter('entity_id', $productIds)
            ->setPageSize( $limit );
            
    	return $productCollection;
    }

    public function getGeneralConfig($name, $toBooleanString = false){  
    	$config =  Mage::getStoreConfig("tagfeatured/general/$name",Mage::app()->getStore());

    	if($toBooleanString)
    		$config = $config ? 'true' :'false';
    	return $config;
    }
}