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

<? // echo "<pre>"; print_r($arResult); echo "</pre>";?>

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
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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
                                    <button type="button" class="grade__item" data-bs-toggle="modal"
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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
                                    <button type="button" class="grade__item" data-bs-toggle="modal"
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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
                                    <button type="button" class="grade__item" data-bs-toggle="modal"
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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
                                    <button type="button" class="grade__item" data-bs-toggle="modal"
                                            data-bs-target="#modal-icon<? echo $arItem["ID"] ?>"
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

<? foreach ($arResult["ITEMS"] as $arItem): ?>

    <div class="modal fade" id="modal-icon<? echo $arItem["ID"] ?>" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content grade-popup">
                <div>
                    <h2 id="staticBackdropLabel"><? echo $arItem["NAME"] ?>
                        <button id="BtnClass" type="button" class="btn-know grade__item"
                                data-favorite="<? echo $arItem["ID"] ?>" data-technology="<?= $arItem["ID"] ?>">
                            Я это знаю
                        </button>
                    </h2>
                </div>
                <div class="modal-body">
                    <p>
                        <? echo $arItem["PREVIEW_TEXT"] ?>
                    </p>
                    <h4>Ссылки на материалы</h4>
                    <ul>
                        <? foreach ($arItem["PROPERTIES"]["LINK"]["VALUE"] as $key => $link) {
                            foreach ($arItem["PROPERTIES"]["LINK_NAME"]["VALUE"] as $key1 => $link_name) {
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
                <div>
                    <button title="Close (Esc)" type="button" class="mfp-close btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
            </div>
        </div>
    </div>

<? endforeach; ?>



