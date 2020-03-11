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

                    <p><simple>роль: </simple><?=  \common\modules\chat\components\Helper::GetRoleUser(); ?></p>

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
                        'label' => Yii::t('backend', 'Chat Alerts'),
                        'url' => ['/chat/chat-alerts/index'],
                        'icon' => '<i class="fa fa-folder-open-o"></i>',
                        'active' => (Yii::$app->controller->id == 'chat-alerts'),
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
                    //Модуль аналитики
                    [
                        'label' => Yii::t('backend', 'Analytics'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-quote-right"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'stat') ,
                        'visible' => Yii::$app->user->can('stat-module'),
                        'items' => [

                            [
                                'label' => Yii::t('backend', 'Dashboards Stats'),
                                'url' => ['/stat/dashboard/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'dashboard')&& (Yii::$app->controller->action->id == 'index'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Dashboards Forms'),
                                'url' => ['/stat/dashboard/forms'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'dashboard') && (Yii::$app->controller->action->id == 'forms'),
                            ],
                        ],
                    ],
                    //Модуль CRM
                    [
                        'label' => Yii::t('backend', 'CRM'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-quote-right"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'crm') ,
                        'visible' => Yii::$app->user->can('stat-module'),
                        'items' => [

                            [
                                'label' => Yii::t('backend', 'Dashboards CRM'),
                                'url' => ['/crm/site/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'site'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Boards'),
                                'url' => ['/crm/board/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'board'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Columns'),
                                'url' => ['/crm/column/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'columns') ,
                            ],
                            [
                                'label' => Yii::t('backend', 'Deal'),
                                'url' => ['/crm/deal/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'deal') ,
                            ],
                            [
                                'label' => Yii::t('backend', 'Task'),
                                'url' => ['/crm/task/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'task') ,
                            ],
                            [
                                'label' => Yii::t('backend', 'News'),
                                'url' => ['/crm/sitenews/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'sitenews') ,
                            ],
                            [
                                'label' => Yii::t('backend', 'Resolution'),
                                'url' => ['/crm/resolution/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'resolution'),
                            ],
                        ],
                    ],
                    //модуль пользователей
                    [
                        'label' => Yii::t('backend', 'Users'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-users"></i>',
                        'options' => ['class' => 'treeview'],
                        'visible' => Yii::$app->user->can('administrator') || Yii::$app->user->can('user'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Users'),
                                'icon' => '<i class="fa fa-users"></i>',
                                'url' => ['/user/index'],
                                'active' => (Yii::$app->controller->id == 'user') ,
                                'visible' => Yii::$app->user->can('administrator') || Yii::$app->user->can('user'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Assignment'),
                                'url' => ['/permit/access/role'],
                                'active' =>  (Yii::$app->controller->id == 'access') && (Yii::$app->controller->action->id == 'role'),
                                'icon' => '<i class="fa fa-user-plus"></i>',
                                'visible' => Yii::$app->user->can('administrator')
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Items'),
                                'url' => ['/permit/access/permission'],
                                'active' => (Yii::$app->controller->id ==  'access' ) && (Yii::$app->controller->action->id == 'permission'),
                                'icon' => '<i class="fa fa-user"></i>',
                                'visible' => Yii::$app->user->can('administrator')
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Assignment'),
                                'url' => ['/rbac/rbac-auth-assignment/index'],
                                'active' =>  (Yii::$app->controller->id == 'rbac-auth-assignment'),
                                'icon' => '<i class="fa fa-user-plus"></i>',
                                'visible' => Yii::$app->user->can('administrator')
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Item Child'),
                                'url' => ['/rbac/rbac-auth-item-child/index'],
                                'active' => (Yii::$app->controller->id ==  'rbac-auth-item-child' ),
                                'icon' => '<i class="fa fa-user-plus"></i>',
                                'visible' => Yii::$app->user->can('administrator')
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Rules'),
                                'url' => ['/rbac/rbac-auth-rule/index'],
                                'active' => (Yii::$app->controller->id ==    'rbac-auth-rule' ),
                                'icon' => '<i class="fa fa-user-plus"></i>',
                                'visible' => Yii::$app->user->can('administrator')
                            ],

                        ],
                    ],
                    //модуль контента
                    [
                        'label' => Yii::t('backend', 'Content'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-files-o"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'content')
                            || ((Yii::$app->controller->module->id == 'system')
                                && ((Yii::$app->controller->id == 'category')
                                    || (Yii::$app->controller->id == 'article')
                                    || (Yii::$app->controller->id == 'key-storage')))
                            || ((Yii::$app->controller->module->id == 'widget')
                                && ((Yii::$app->controller->id == 'text')
                                    || (Yii::$app->controller->id == 'menu')
                                    || (Yii::$app->controller->id == 'carousel'))),
                        'visible' => Yii::$app->user->can('content-module'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Static pages'),
                                'url' => ['/content/page/index'],
                                'icon' => '<i class="fa fa-thumb-tack"></i>',
                                'active' => (Yii::$app->controller->id == 'page'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Article Categories'),
                                'url' => ['/content/category/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'category'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Articles'),
                                'url' => ['/content/article/index'],
                                'icon' => '<i class="fa fa-file-o"></i>',
                                'active' => (Yii::$app->controller->id == 'article'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Key-Value Storage'),
                                'url' => ['/system/key-storage/index'],
                                'icon' => '<i class="fa fa-arrows-h"></i>',
                                'active' => (Yii::$app->controller->id == 'key-storage'),
                                'visible' => Yii::$app->user->can('system/key-storage/index'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Widgets'),
                                'url' => '#',
                                'icon' => '<i class="fa fa-code"></i>',
                                'options' => ['class' => 'treeview'],
                                'active' => (Yii::$app->controller->module->id == 'widget'),
                                'items' => [
                                    [
                                        'label' => Yii::t('backend', 'Text Blocks'),
                                        'url' => ['/widget/text/index'],
                                        'icon' => '<i class="fa fa-circle-o"></i>',
                                        'active' => (Yii::$app->controller->id == 'text'),
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Widget Menus'),
                                        'url' => ['/widget/menu/index'],
                                        'icon' => '<i class="fa fa-circle-o"></i>',
                                        'active' => (Yii::$app->controller->id == 'menu'),
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Widget Carousels'),
                                        'url' => ['/widget/carousel/index'],
                                        'icon' => '<i class="fa fa-circle-o"></i>',
                                        'active' => in_array(Yii::$app->controller->id, ['carousel', 'carousel-item']),
                                    ],
                                ],
                            ],




                        ],
                    ],
                    //модуль проекты
                    [
                        'label' => Yii::t('backend', 'Projects'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-files-o"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => ( (Yii::$app->controller->module->id == 'prpart') && (Yii::$app->controller->id == 'cases'))
                                    || ( (Yii::$app->controller->module->id == 'prpart')     && (Yii::$app->controller->id == 'partners')),
                        'visible' => Yii::$app->user->can('administrator'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Cases'),
                                'url' => ['/prpart/cases/index'],
                                'icon' => '<i class="fa fa-thumb-tack"></i>',
                                'active' => (Yii::$app->controller->id == 'cases'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Partners'),
                                'url' => ['/prpart/partners/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'partners'),
                            ],





                        ],
                    ],
                    //модуль файл
                    [
                        'label' => Yii::t('backend', 'Files'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-files-o"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => ( (Yii::$app->controller->module->id == 'file') && (Yii::$app->controller->id == 'manager'))
                            || ( (Yii::$app->controller->module->id == 'file')     && (Yii::$app->controller->id == 'storage')),
                        'visible' => Yii::$app->user->can('administrator'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'File Manager'),
                                'url' => ['/file/manager/index'],
                                'icon' => '<i class="fa fa-thumb-tack"></i>',
                                'active' => (Yii::$app->controller->id == 'manager'),
                            ],
                            [
                                'label' => Yii::t('backend', 'File Storage'),
                                'url' => ['/file/storage/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'storage'),
                            ],





                        ],
                    ],
                    //модуль блога
                    [
                        'label' => Yii::t('backend', 'Blog'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-text"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'blog') ,
                        'visible' => Yii::$app->user->can('blog-module'),

                        'items' => [


                            [
                                'label' => Yii::t('backend', 'Каталог'),
                                'url' => ['/blog/blog-catalog'],
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-catalog'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Посты'),
                                'url' => ['/blog/blog-post'],
                                'icon' => '<i class="fa fa-file"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-post'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Комменты'),
                                'url' => ['/blog/blog-comment'],
                                'icon' => '<i class="fa fa-commenting"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-comment'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Тэги'),
                                'url' => ['/blog/blog-tag'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-tag'),
                            ],
                        ],
                    ],
                    //модуль магазин
                    [
                        'label' => Yii::t('backend', 'Shop'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-text"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'shop') || (Yii::$app->controller->module->id == 'order'),
                        'visible' => Yii::$app->user->can('shop-module'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'KPI Shopping'),
                                'url' => ['/shop'],
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->module->id == 'shop')  && (Yii::$app->controller->id == 'default'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Заказы'),
                                'url' => ['/order '],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->module->id == 'order') && (Yii::$app->controller->id == 'default'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Склады'),
                                'url' => ['/shop/stock/index'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'stock'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Производители'),
                                'url' => ['/shop/producer/index'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'producer'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Catalog'),
                                'url' => ['/shop/category'],
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->id == 'category'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Товары'),
                                'url' => ['/shop/product'],
                                'icon' => '<i class="fa fa-file"></i>',
                                'active' => (Yii::$app->controller->id == 'product'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Поступление'),
                                'url' => ['/shop/incoming/index'],
                                'icon' => '<i class="fa fa-commenting"></i>',
                                'active' => (Yii::$app->controller->id == 'incoming'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Отправление'),
                                'url' => ['/shop/outcoming/create'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'outcoming'),
                            ],

                            [
                                'label' => Yii::t('backend', 'Типы цен'),
                                'url' => ['/shop/price-type/index'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'price-type'),
                            ],



                        ],
                    ],
                    //модуль чат
                    [
                        'label' => Yii::t('backend', 'Chat'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-text"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'chat') ,
                        'visible' => Yii::$app->user->can('chat-module'),

                        'items' => [

                            [
                                'label' => Yii::t('backend', 'Chat Widgets'),
                                'url' =>  Yii::$app->urlManager->createAbsoluteUrl('chat/chat-widgets/index'),
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->id == 'chat-widgets'),
                                'visible' => Yii::$app->user->can('chat/chat-widgets/index'),

                            ],
                            [
                                'label' => Yii::t('backend', 'Landing Page'),
                                'url' =>  '/chat/default/index/',
                                'icon' => '<i class="fa fa-list"></i>',
                                'options' => [
                                    'target' => '_blank',
                                ],
                                'active' => (Yii::$app->controller->id == 'default'),
                                'visible' => Yii::$app->user->can('chat/default/index'),

                            ],
                            [
                                'label' => Yii::t('backend', 'Тестирование бота'),
                                'url' => '/chat/default/chat/',
                                'options' => [
                                    'target' => '_blank',
                                ],
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->id == 'default'),
                                'visible' => Yii::$app->user->can('chat/default/chat'),

                            ],

                            [
                                'label' => Yii::t('backend', 'Клиенты'),
                                'url' => ['/chat/clients/index/'],
                                'icon' => '<i class="fa fa-commenting"></i>',
                                'active' => (Yii::$app->controller->id == 'clients'),
                                'visible' => Yii::$app->user->can('chat/clients/index'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Диалоги'),
                                'url' => ['/chat/dialogs/index/'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'dialogs'),
                                'visible' => Yii::$app->user->can('chat/dialogs/index'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Сообщения'),
                                'url' => ['/chat/messages/index/'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'messages'),
                                'visible' => Yii::$app->user->can('chat/messages/index'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Нераспознанные вопросы'),
                                'url' => ['/chat/messages/novalid/'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-tag'),
                                'visible' => Yii::$app->user->can('chat/messages/novalid'),
                            ],
                            [
                                'label' => Yii::t('backend', 'База знаний'),
                                'url' => ['/chat/question/index/'],
                                'icon' => '<i class="fa fa-tags"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-tag'),
                                'visible' => Yii::$app->user->can('chat/question/index'),
                            ],
                        ],
                    ],
                    //модуль бот
                    [
                        'label' => Yii::t('backend', 'Bot'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-text"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'bot') ,
                        'visible' => Yii::$app->user->can('bot-module'),

                        'items' => [


                            [
                                'label' => Yii::t('backend', 'Экраны'),
                                'url' => ['/bot/screens/index'],
                                'icon' => '<i class="fa fa-list"></i>',
                                'active' => (Yii::$app->controller->id == 'blog-catalog'),
                            ],

                        ],
                    ],

                    //Файлы
                    [
                        'label' => Yii::t('back', 'Files'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-photo-o"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'file'),
                        'visible' => Yii::$app->user->can('file-module'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'File Storage'),
                                'url' => ['/file/storage/index'],
                                'icon' => '<i class="fa fa-database"></i>',
                                'active' => (Yii::$app->controller->id == 'storage'),
                            ],
                            [
                                'label' => Yii::t('backend', 'File Manager'),
                                'url' => ['/file/manager/index'],
                                'icon' => '<i class="fa fa-television"></i>',
                                'active' => (Yii::$app->controller->id == 'manager'),
                            ],

                        ],
                    ],
                    //Прототип Whatsapp
                    [
                        'label' =>  'WhatsApp' ,
                        'url' => '#',
                        'icon' => '<i class="fa fa-file-photo-o"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->id == 'whatsapp' || Yii::$app->controller->id == 'whatsapp-groups' || Yii::$app->controller->id == 'whatsapp-phones'),
                        'visible' => Yii::$app->user->can('whatsapp-module'),
                        'items' => [
                            [
                                'label' =>  'WhatsApp Index' ,
                                'url' => ['/whatsapp/index'],
                                'icon' => '<i class="fa fa-database"></i>',
                                'active' => (Yii::$app->controller->id == 'whatsapp'),
                            ],
                            [
                                'label' =>  'WhatsApp Groups' ,
                                'url' => ['/whatsapp-groups/index'],
                                'icon' => '<i class="fa fa-database"></i>',
                                'active' => (Yii::$app->controller->id == 'whatsapp-groups'),
                            ],
                            [
                                'label' =>  'WhatsApp phones' ,
                                'url' => ['/whatsapp-phones/index'],
                                'icon' => '<i class="fa fa-television"></i>',
                                'active' => (Yii::$app->controller->id == 'whatsapp-phones'),
                            ],

                            ],
                        ],

                    //Модуль телефонии
                    [
                    'label' => Yii::t('backend', 'Phones'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-phone"></i>',
                    'options' => ['class' => 'treeview'],
                    'active' => (Yii::$app->controller->module->id == 'zadarma') ,
                    'visible' => Yii::$app->user->can('zadarma-module'),
                    'items' => [

                        [
                            'label' => Yii::t('backend', 'Phones Stats'),
                            'url' => ['/zadarma/zadorma-stat/stat'],
                            'icon' => '<i class="fa fa-folder-open-o"></i>',
                            'active' => (Yii::$app->controller->id == 'zadorma-stat')&& (Yii::$app->controller->action->id == 'stat'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Phones History'),
                            'url' => ['/zadarma/zadorma-stat/index'],
                            'icon' => '<i class="fa fa-file-o"></i>',
                            'active' => (Yii::$app->controller->id == 'zadorma-stat')&& (Yii::$app->controller->action->id == 'index'),
                        ],
                    ],
                ],
                    //Модуль очередей и др
                    [
                        'label' => Yii::t('backend', 'Others'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-code"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'queuemanager') ,
                        'visible' => Yii::$app->user->can('queuemanager-module'),
                        'items' => [

                            [
                                'label' => Yii::t('backend', 'Queue Manager'),
                                'url' => ['/queuemanager/default/index'],
                                'icon' => '<i class="fa fa-folder-open-o"></i>',
                                'active' => (Yii::$app->controller->id == 'default'),
                            ],

                        ],
                    ],

                    //Переводы сайта
                    [
                        'label' => Yii::t('backend', 'Translations'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-language"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => (Yii::$app->controller->module->id == 'translation'),
                        'visible' => Yii::$app->user->can('translation-module'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Translation'),
                                'url' => ['/translation/default/index'],
                                'icon' => '<i class="fa fa-language"></i>',
                                'active' => (Yii::$app->controller->id == 'default'),
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
                <!--<div class="form-group">
    <label class="control-sidebar-subheading">
        Report panel usage
        <input type="checkbox" class="pull-right" checked/>
    </label>
    <p>
        Some information about this general settings option
    </p>
</div>-->
                <!-- /.form-group -->


            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div><!-- ./right-side -->

<?php $this->endContent(); ?>
