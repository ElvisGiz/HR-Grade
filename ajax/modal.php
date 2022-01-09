<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
$id=json_decode($_POST["id"]);


$name=CIBlockElement::GetByID("$id");

if($ob_res = $name->GetNextElement()){
    $ar_res = $ob_res->GetFields();
    $ar_prop=$ob_res->GetProperties();
    //echo $ar_res['NAME'];
?><div class="modal-content grade-popup">
    <div>
        <h2 id="staticBackdropLabel">
            <?echo $ar_res['NAME'];?>
            <button id="BtnClass" type="button" class="btn-know grade__item js-add-favorite"
                    data-favorite="<?=$ar_res['ID']?>"
                    data-technology="<?=$ar_res['ID']?>">
                Я это знаю
            </button>
        </h2>
    </div>
    <div class="modal-body">
        <?=$ar_res["PREVIEW_TEXT"]?>
        <h4>Ссылки на материалы</h4>
        <ul>
            <? foreach ($ar_prop["LINK"]["VALUE"] as $key => $link) {
                foreach ($ar_prop["LINK_NAME"]["VALUE"] as $key1 => $link_name) {
                    if ($key == $key1) {
                        ?>
                        <li><a class="tag" href="<?= $link; ?>" target="_blank" rel="noopener noreferrer"><?= $link_name ?></a></li>
                        <?
                    }
                }
            }
            ?>
        </ul>
    </div>
    <div id="modal_btn" class="modal-close-button">
        <button title="Close (Esc)" type="button" class="mfp-close btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
    </div>
    </div><?php
}

//echo "<pre>";
//echo print_r($ar_prop);
//echo "</pre>";
?>




