<?php
/**
 * @var $this    yii\web\View
 * @var $content string
 */

use backend\assets\BackendAsset;
use common\modules\system\models\SystemLog;
use backend\widgets\Menu;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\log\Logger;
use yii\widgets\Breadcrumbs;

$bundle = BackendAsset::register($this);

?>

<?php $this->beginContent('@backend/views/layouts/base.php'); ?>

<div class="">
    <!-- header logo: style can be found in header.less -->
    <header class="main-header">
        <a href="<?php echo Yii::$app->urlManagerFrontend->createAbsoluteUrl('/') ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?php echo Yii::$app->name ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li id="timeline-notifications" class="notifications-menu">
                        <a href="<?php echo Url::to(['/system/timeline-event/index']) ?>">
                            <i class="fa fa-bell"></i>
                            <span class="label label-success">
                                <?php echo \common\modules\system\models\TimelineEvent::find()->today()->count() ?>
                            </span>
                        </a>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li id="log-dropdown" class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                <?php echo SystemLog::find()->count() ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num' => SystemLog::find()->count()]) ?></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php foreach (SystemLog::find()->orderBy(['log_time' => SORT_DESC])->limit(5)->all() as $logEntry): ?>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['/system/log/view', 'id' => $logEntry->id]) ?>">
                                                <i class="fa fa-warning <?php echo $logEntry->level === Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                <?php echo $logEntry->category ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <?php echo Html::a(Yii::t('backend', 'View all'), ['/system/log/index']) ?>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                 class="user-image">
                            <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header light-blue">
                                <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    <?php echo Yii::$app->user->identity->username ?>
                                    <small>
                                        <?php echo Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                    </small>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Profile'), ['/sign-in/profile'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Account'), ['/sign-in/account'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-right">
                                    <?php echo Html::a(Yii::t('backend', 'Logout'), ['/sign-in/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                         class="img-circle"/>
                </div>
                <div class="pull-left info">
                    <p><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->getPublicIdentity()]) ?></p>


                </div>


            </div>
            <?php \yii\widgets\Pjax::begin([ 'id' =>'operator_success']); ?>
            <div class="user-panel">
                <a href="<?php echo Url::to(['/sign-in/profile']) ?>">
                    Статус: <i class="fa fa-circle text-success"></i>
                    <span class="user_status"> <?php // \common\components\Helper::getStatusUser(); ?></span>
                </a>

            </div>
            <?php \yii\widgets\Pjax::end(); ?>
            <div class="user-panel">

                <a href="<?php echo Url::to(['/sign-in/profile']) ?>">

                    <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                </a>

            </div>
            <?php echo Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'linkTemplate' => '<a href="{url}"> {icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents' => true,
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Сообщения'),
                        'url' => ['/message/index'],
                        'icon' => '<i class="fa fa-folder-open-o"></i>',
                        'active' => (Yii::$app->controller->id == 'chat-alerts'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Просмотр сообщений'),
                                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                                'url' => ['/message/index'],
                                'badge' => \common\models\Message::find()->active()->count(),
                                'badgeBgClass' => 'label-success',
                                'active' => (Yii::$app->controller->id == 'message') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Добавить сообщение'),
                                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                                'url' => ['/message/create'],

                                'badgeBgClass' => 'label-success',
                                'active' => (Yii::$app->controller->id == 'message') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],


                        ],
                    ],
                    [
                        'label' => Yii::t('backend', 'Категории'),
                        'url' => ['/category/index'],
                        'icon' => '<i class="fa fa-folder-open-o"></i>',
                        'active' => (Yii::$app->controller->id == 'category'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Просмотр категорий'),
                                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                                'url' => ['/category/index'],
                                'badge' => \common\models\Message::find()->active()->count(),
                                'badgeBgClass' => 'label-success',
                                'active' => (Yii::$app->controller->id == 'category') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Добавить категорию'),
                                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                                'url' => ['/category/create'],

                                'badgeBgClass' => 'label-success',
                                'active' => (Yii::$app->controller->id == 'category') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],


                        ],
                    ],
                    //системный модуль
                    [
                        'label' => Yii::t('backend', 'Workspace'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-dashboard"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => ((Yii::$app->controller->module->id == 'system')
                                        && ((Yii::$app->controller->id == 'log')
                                            ||  (Yii::$app->controller->id == 'information')
                                            ||  (Yii::$app->controller->id == 'cache')))
                            ||
                            (Yii::$app->controller->id == 'timeline-event'),
                        'visible' => Yii::$app->user->can('system-module'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Timeline'),
                                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                                'url' => ['/system/timeline-event/index'],
                                'badge' => \common\modules\system\models\TimelineEvent::find()->today()->count(),
                                'badgeBgClass' => 'label-success',
                                'active' => (Yii::$app->controller->id == 'timeline-event') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],
                            [
                                'label' => Yii::t('backend', 'System Information'),
                                'url' => ['/system/information/index'],
                                'icon' => '<i class="fa fa-dashboard"></i>',
                                'active' => (Yii::$app->controller->id == 'information') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Cache'),
                                'url' => ['/system/cache/index'],
                                'icon' => '<i class="fa fa-refresh"></i>',
                                'active' => (Yii::$app->controller->id == 'cache') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],
                            [
                                'label' => Yii::t('modulemanager', 'Modules manager'),
                                'url' => ['/modulemanager/default/index'],
                                'icon' => '<i class="fa fa-refresh"></i>',
                                'active' => (Yii::$app->controller->id == 'default') ,
                                'visible' => Yii::$app->user->can('modulemanager-module'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Logs'),
                                'url' => ['/system/log/index'],
                                'icon' => '<i class="fa fa-warning"></i>',
                                'badge' => SystemLog::find()->count(),
                                'badgeBgClass' => 'label-danger',
                                'active' => (Yii::$app->controller->id == 'log') ,
                                'visible' => Yii::$app->user->can('administrator'),
                            ],

                        ],
                    ],


                ],
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Center side column. Contains the navbar and content of the page -->
    <aside class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->title ?>
                <?php if (isset($this->params['subtitle'])): ?>
                    <small><?php echo $this->params['subtitle'] ?></small>
                <?php endif; ?>
            </h1>

            <?php echo Breadcrumbs::widget([
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if (Yii::$app->session->hasFlash('alert')): ?>
                <?php echo Alert::widget([
                    'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ]) ?>
            <?php endif; ?>
            <?php echo $content ?>
        </section><!-- /.content -->
    </aside><!-- /wrapper. -->
    <!-- Right side column  -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Settings tab content -->
            <div class="active tab-pane" id="control-sidebar-settings-tab">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="/backend/web/system/settings" style="color:inherit">Theme preferences</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="/backend/web/sign-in/account" style="color:inherit">My account</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="/backend/web/sign-in/profile" style="color:inherit">My profile</a>                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="#" style="color:inherit">Change email</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="#" style="color:inherit">Change password</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="#" style="color:inherit">Share link to register</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="#" style="color:inherit">Invite to register</a>                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <a href="/backend/web/sign-in/logout" data-method="post" style="color:inherit">Logout</a>                    </label>
                </div>



            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div><!-- ./right-side -->

<?php $this->endContent(); ?>
