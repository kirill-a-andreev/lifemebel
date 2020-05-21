<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	$arSort = array(
		$arParams["SORT_FIELD"] => $arParams["SORT_ORDER"],
	);

	$arFilter = array("IBLOCK_ID" => $arParams['IBLOCK_ID']);


		if($arParams['ACTION']!=''){
			$action = time();
		}
		else
			$action = 0;

	if($_REQUEST['is_ajax']=='y'){
		$ajax_result = array();
		$APPLICATION->RestartBuffer();
		$ajax_result['ERROR'] = false;
		switch($_REQUEST['ACTION']){
			case 'add':
					if (preg_match("#^[а-яА-ЯёЁ\d-\s+]+$#u",$_REQUEST['name'])) {
						$el = new CIBlockElement;
					   	      if (!$el->Add(array("IBLOCK_ID" => 5, "NAME" => $_REQUEST['name']))) {
								  $ajax_result['ERROR'] = true;
								  $ajax_result['ERROR_TEXT'] = $el->LAST_ERROR; 
							   }
							   else{
								   $ajax_result['TEXT'] = 'Город '.$_REQUEST['name'].' успешно добавлен!';
							   }
					} else {
					   	$ajax_result['ERROR'] = true;
						$ajax_result['ERROR_TEXT'] = 'Название города содержит недопустимые символы';
					}
			break;
			case 'update':
					if (preg_match("#^[а-яА-ЯёЁ\d-\s+]+$#u",$_REQUEST['name'])) {
						$el = new CIBlockElement;
					   	      if (!$el->Update($_REQUEST['id'], array("NAME" => $_REQUEST['name']))) {
								  $ajax_result['ERROR'] = true;
								  $ajax_result['ERROR_TEXT'] = $el->LAST_ERROR; 
							   }
							   else{
								   $ajax_result['TEXT'] = 'Новое название города - '.$_REQUEST['name'];
							   }
					} else {
					   	$ajax_result['ERROR'] = true;
						$ajax_result['ERROR_TEXT'] = 'Название города содержит недопустимые символы';
					}
			break;
			case 'del':
				if(!CIBlockElement::Delete($_REQUEST['id'])){
					$ajax_result['ERROR'] = true;
					$ajax_result['ERROR_TEXT'] = 'Ошибка удаления';
				}
				else
					$ajax_result['TEXT'] = 'Город с ID = '.$_REQUEST['id'].' успешно удален!';
			break;
		}
		echo json_encode($ajax_result);
		die();
	}
		
$arNavParams = array(
	"nPageSize" => $arParams["SHOW_ELEMENTS"],
	"bDescPageNumbering" => "N",
	"bShowAll" => "Y",
);

$arNavigation = CDBResult::GetNavParams($arNavParams);

		if(CModule::IncludeModule("iblock"))
		{
			if ($this->StartResultCache($arParams['CACHE_TIME'], Array($arFilter, $arNavigation, $action, $_REQUEST['is_ajax'])))
			{
				$rsElements = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, array("NAME", "ID"));
				while($obElement = $rsElements->GetNext())
				{
					$arResult['ITEMS'][] = $obElement;
				}
				$arResult["NAV_STRING"] = $rsElements->GetPageNavStringEx($navComponentObject, "Города", $arParams["PAGER_TEMPLATE"], "Y");
				$this->IncludeComponentTemplate();
			}
			

		}
		

?>