<?
global $APPLICATION;

$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    $cp->arResult["ERROR"] = '';
	$cp->SetResultCacheKeys(array("ERROR"));
	$arResult['ERROR'] = $cp->arResult['ERROR'];
}
