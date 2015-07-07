# magento-tag-featured-product
Magento Tag Featured Product

Name: Tag Featured Product
Author: Cres Jie Labasano
Email:  cresjie@gmail.com
Description: display products(by tags) in a carousel
Dependency: owlcarousel - http://owlcarousel.owlgraphic.com/


/***********************
		Installation
************************/
1. Copy the directory "app" and "css" in your magento root directory
-Since the latest magento doesn't support default/default fallback on theme
2. copy everything in the package "app/design/frontend/default/default" into your current theme
3. copy everything in the package "skin/frontend/default/default" into your current skin


/***********************
		Configuration
************************/
 You can change the default configuration by following this steps

1. Login to your magento admin page
2. Goto System -> configuration -> SUITE900 EXTENSIONS -> Tag Featured


/***********************
		Usage
************************/

~ you add this code block anywhere in your CMS page content,
	{{block type="tagfeatured/tagfeatured" template="s900/tagfeatured.phtml" tagname="yourTag"}}

		~OR~
~ if your a developer, you can add this code block in your .phtml file
	$this->getLayout()->createBlock('tagfeatured/tagfeatured')->setTemplate('s900/tagfeatured.phtml')->setData('tagname','yourTag')->toHtml();

NOTE:
	the parameter tagname is required in the code, this will retrieve products by that tagname

additional param:
	limit => you can add this parameter in the block to override the number of items set in the admin configuration
			e.g. {{block type="tagfeatured/tagfeatured" template="s900/tagfeatured.phtml" tagname="yourTag" limit=10}}

