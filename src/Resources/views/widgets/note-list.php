<?php

use yii\helpers\Url;
use yii\helpers\Html;

$notes = $dataProvider->getModels();

if (!isset($active_id)) {
    $active_id = 0;
}

?>

<?php if (!empty($notes)): ?>
    <ul id="note-list" class="note-list">
        <?php foreach ($notes as $note): ?>
            <li class="note-list__row  note-row <?= ($note->getId() === $active_id)? 'active' : ''?>" data-key="<?= $note->getId() ?>">
                <div class="note-row__title"><?= Html::a($note->title, ['main/view', 'id' => $note->getId()]) ?></div>

                <div class="table-actions">
                    <div class="table-actions__button">
                        <?= Html::a(
                            '<span class="fa fa-edit text-blue"></span>',
                            ['update', 'id' => $note->getId()],
                            [
                                'title' => 'Редактирование',
                                'class' => 'table-actions__link',
                            ]
                        ) ?>
                    </div>
                    <div class="table-actions__button">
                        <?= Html::a(
                            '<span class="fa fa-trash text-red"></span>',
                            ['delete', 'id' => $note->getId()],
                            [
                                'title' => 'Удалить',
                                'class' => 'table-actions__link',
                                'aria-label' => 'Удалить',
                                'data-confirm' => 'Are you sure?',
                                'data-method' => 'post',
                            ]
                        ) ?>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
<?php else: ?>
    Empty
<?php endif ?>

<?php

$css = <<< 'Css'
    .note-list {
        display: block;
        list-style: none;
        padding: 0;
        margin-left: -10px;
        margin-right: -10px;
    }
    .note-list__row:hover {
        background: #efefef;
    }
    .note-list__placeholder {
        border: 1px dashed #bac9fd!important;
        background: #fef2ff;
    }
    .note-list > :last-child {
        border-bottom: none;
    }
    .note-list__row,
    .note-list__placeholder {
        display: flex;
        width: 100%;
        padding: 8px 10px;
        border-bottom: 1px solid #ececec;
    }
    .note-row__title {
        line-height: 2rem;
        flex-grow: 1;
    }

    .table-actions {
        display: flex;
        align-self: center;
        justify-self: end;
    }
    .table-actions__button {
        margin-left: .625rem;
        opacity: .6;
    }
    .table-actions__button:hover {
        opacity: 1;
    }
    .table-actions__link {
        line-height: 1;
        font-size: 1.8rem;
    }
Css;

$this->registerCss($css);
