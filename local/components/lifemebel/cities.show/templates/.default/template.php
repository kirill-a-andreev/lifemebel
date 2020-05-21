<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($arResult['is_ajax']=='y'){
	
}
else{
	  foreach($arResult['ITEMS'] as $item){
		  ?><b><?=$item['NAME'];?></b> <a href="" attr_id="<?=$item['ID'];?>" class="change">изменить</a> <a href="" attr_id="<?=$item['ID'];?>" class="del">удалить</a><br />
		  <form name="change_form" class="change_form" id="change<?=$item['ID'];?>" method="post">
		  <input type="text" name="name" value="<?=$item['NAME'];?>" />
		  <input type="hidden" name="id" value="<?=$item['ID'];?>" />
		  <input type="hidden" name="is_ajax" value="y" />
		  <input type="hidden" name="ACTION" value="update" />
		  <input type="submit"/></form>
		  <?
	  }
	  ?>
	  <hr /><b>Добавить город</b>
		  <form name="add_form" class="add_form"  method="post">
		  <input type="text" name="name" value="" />
		  <input type="hidden" name="is_ajax" value="y" />
		  <input type="hidden" name="ACTION" value="add" />
		  <input type="submit"/></form>
	  <?
	  echo "<br />";
	  echo $arResult["NAV_STRING"];
	}?>
	<div class="information"></div>