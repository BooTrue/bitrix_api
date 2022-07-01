<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Товары");
CModule::IncludeModule("iblock");
?>

<?
$res = CIBlockElement::GetList(
    $arOrder = array("NAME" => "ASC"),
    $arFilter = array(
        "IBLOCK_ID" => "2",
    ),
    $arGroupBy = false,
    $arNavStartParams = false,
    $arSelectFields = array('ID', 'NAME', 'PREVIEW_PICTURE')
);

while ($arFields = $res->GetNext()) {
    $renderImage = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], Array("width" => 150, "height" => 200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
    
    echo '<h4>'.$arFields['NAME'].'</h4>';
    echo CFile::ShowImage($renderImage['src'], 150, 200, "border=0", "", true);
    echo "<hr>";
}
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>