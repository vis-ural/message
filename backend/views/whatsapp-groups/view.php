<?php

use backend\controllers\WhatsappController;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\WhatsappGroups */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Whatsapp Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-groups-view">

    <p class="pull-right">
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>


        <button class="btn btn-danger create-group"   data-group-id="<?= $model->id?>">Создать группу в WhatsApp</button>

        <?php echo Html::a(Yii::t('backend', 'Добавить контакт', [
            'modelClass' => 'Whatsapp Groups',
        ]), ['/whatsapp-phones/create','gr'=>$model->id], ['class' => 'btn btn-success']) ?>


    </p>
    <?php Pjax::begin(['id' => 'grid', 'enablePushState' => false, 'timeout' => 1000000]); ?>

    <div class="row">

        <div class="col-md-6">
            <h4>Отправка сообщений в группу</h4>
            <div   id="mes_send" style="height: 250px; border: solid 1px #CCC;margin: 10px;padding: 10px; overflow-y: auto;overflow-x: auto;" >

                <?php if (!empty($model->group_id)):?>
                <?php foreach (WhatsappController::messages($model->group_id)['messages'] as $message):?>
                    <div ><?= date("H:s:i m.d.Y",$message['time'])?> - <?= $message['senderName']?> : <?= $message['body']?></div>

                <?php  endforeach;?>
                <?php  endif;?>

            </div>



                <div class="col-md-8">
                    <input type="text"  style="width: 100%;" name="mes"  id="mes">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary send-group" data-group-id="<?= $model->id?>">Отправить</button>
                </div>




        </div>
        <div class="col-md-6">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'group_id',
                    'desc:ntext',

                ],
            ]) ?>
<!--            <form id="data" method="post" enctype="multipart/form-data">-->
<!--                 <input type="file" name="myFile"   id="myFile">-->
<!--                <button type="button">Загрузить контакты из файла</button>-->
<!--            </form>-->
            <?php $form = \kartik\form\ActiveForm::begin([
                    'action'=>'/backend/web/whatsapp/loadfile',
                'options'=>['class' => 'form-horizontal', 'enctype'=>'multipart/form-data'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-9\">{input}</div> \n<div class=\"col-lg-12\">{error}</div>",
                    'labelOptions' => ['class' => ' control-label'],
                ],
            ]); ?>
            <?php echo $form->field($modelFile, 'gr')->textInput(['value'=>$model->group_id])?>
            <?php echo $form->field($modelFile, 'attachments')->widget(
                \trntv\filekit\widget\Upload::className(),
                [
                    'url' => ['/file/storage/upload'],
                    'sortable' => true,
                    'maxFileSize' => 10000000, // 10 MiB
                    'maxNumberOfFiles' => 10
                ]);
            ?>
            <div style="text-align:right">

                <label class="col-lg-12 control-label" for="">&nbsp;</label>
                <?= Html::submitButton('Отправить', ['class' =>  'btn btn-primary']) ?>
            </div>

            <?php \kartik\form\ActiveForm::end(); ?>
        </div>





    </div>

    <?php Pjax::end(); ?>



    <?php Pjax::begin(['id' => 'phone', 'enablePushState' => false, 'timeout' => 1000000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProviderPhones,
        'filterModel' => $searchModelPhones,
        'columns' => [
            

            'id',

            'fio',
            'desc',

            'phone',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '  {add}   {admin}   {deladmin}',  // the default buttons + your custom button
                'buttons' => [
                    'add' => function($url, $model1, $key)use($model) {     // render your custom button
                        return "<button class='btn btn-danger del-user' data-phone='{$model1->phone}' data-group-id='{$model->id}'>Удалить</button>";
                    },
                    'admin' => function($url, $model1, $key)use($model) {     // render your custom button
                        return "<button class='btn btn-warning admin' data-phone='{$model1->phone}' data-group-id='{$model->id}'>Админ</button>";
                    },
                    'deladmin' => function($url, $model1, $key)use($model) {     // render your custom button
                        return "<button class='btn btn-info del-admin' data-phone='{$model1->phone}' data-group-id='{$model->id}'>Remove Admin</button>";
                    },
                ]
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
