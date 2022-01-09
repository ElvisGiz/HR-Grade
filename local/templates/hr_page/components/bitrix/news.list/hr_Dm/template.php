<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<?// echo "<pre>"; print_r($arResult); echo "</pre>";?>

<section class="grade-section">
    <div class="container grade-section__wrap">

        <button type="button" class="title grade-section__title">
            <span></span><? echo $arResult["NAME"] ?>
        </button>


        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Trainee</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                                <?
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Trainee'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Junior</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>

                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Junior'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Junior+</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>

                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Junior+'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Middle</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>

                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Middle'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Middle+</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>

                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Middle+'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="grade">
                        <h4 class="grade__title title title--grey">Senior</h4>
                        <div class="grade__block">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                                <? if ($arItem["PROPERTIES"]["GRADE"]["VALUE"] == 'Senior'): ?>
                                    <button type="button" class="grade__item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-icon"
                                            data-technology="<?= $arItem["ID"] ?>"
                                            id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <? echo $arItem["NAME"] ?>
                                    </button>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</section>



<?php if($arResult["ID"]==5){?>
<div class="modal fade" id="modal-icon">
    <div class="modal-dialog" id="modalTitleGrade">

    </div>
</div>
<?php }?>

