<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//pr($arParams);
?>



<div id="upload">
	<button>
		Выгрузить
	</button>
</div>



<script>
	const urlAJAX = () => <?=CUtil::PhpToJSObject($component->getPath().'/ajax/ajax.php', false, true)?>;
</script>