<?

if($_REQUEST['AJAX_CALL']=='Y'){
$cp = $this->__component;
cclog($_REQUEST);
CModule::IncludeModule("iblock");
	switch($_REQUEST['do']){
		case 'change':
			$el = new CIBlockElement; 
			$res = $el->Update($_REQUEST['id'], array("NAME" => $_REQUEST['name']));
			//echo '<div class="error">Ошибка изменения</div>';
			LocalRedirect('/?PAGEN_1='.$_REQUEST['PAGEN_1']);
		break;
		
		case 'del':
			CIBlockElement::Delete($_REQUEST['id']);
			LocalRedirect('/?PAGEN_1='.$_REQUEST['PAGEN_1']);
		break;
		
		case 'add':
			$el = new CIBlockElement;
			$el->Add(array("IBLOCK_ID" => 5, "NAME" => $_REQUEST['name']));
			LocalRedirect('/?PAGEN_1='.$_REQUEST['PAGEN_1']);
		break;
	}
}