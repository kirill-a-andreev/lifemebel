<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<b><?echo $arItem["NAME"]?></b>
<a href="#1"  attr_id="<?=$arItem["ID"];?>" class="change">изменить</a>&nbsp;<a href="" attr_id="<?=$arItem["ID"];?>" class="del">удалить</a>
<form name="" action="" method="get" id="form<?=$arItem['ID'];?>">
<input type="hidden" name="do" value="change">
<input type="name" value="<?=$arItem["NAME"];?>" name="name"/>
<input name="id" type="hidden" value="<?=$arItem["ID"];?>" />
<input type="hidden" name="PAGEN_1" value="<?=$_REQUEST['PAGEN_1'];?>"/>
<input type="submit" />
</form>

<form name="" action="" method="get" id="del<?=$arItem['ID'];?>">
<input type="hidden" name="do" value="del">
<input name="id" type="hidden" value="<?=$arItem["ID"];?>" />
<input type="hidden" name="PAGEN_1" value="<?=$_REQUEST['PAGEN_1'];?>"/>
<input type="submit" />
</form>
<br />
<?endforeach;?>
<hr />
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<br /><br />
<form action="" method="get" class="city_add">
<b>Добавить новый город</b><br />
<input type="text" name="name" />
<input type="hidden" name="do" value="add">
<input type="hidden" name="PAGEN_1" value="<?=$_REQUEST['PAGEN_1'];?>"/>
<input type="submit" />
</form>
</div>


   