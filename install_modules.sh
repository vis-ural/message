#!/bin/sh

www_path="/home/projects"
#### Установка системных модулей
git clone http://rlogachev:Derw45sh84@89.223.95.169/components/zadarma.git  $www_path/demo/common/components/zadarma
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/modulemanager.git $www_path/demo/common/modules/modulemanager
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/system.git  $www_path/demo/common/modules/system
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/file.git  $www_path/demo/common/modules/file
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/permit.git  $www_path/demo/common/modules/permit
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/rbac.git  $www_path/demo/common/modules/rbac
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/queuemanager.git  $www_path/demo/common/modules/queuemanager
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/stat.git  $www_path/demo/common/modules/stat
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/translation.git  $www_path/demo/common/modules/translation
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/zadarma.git  $www_path/demo/common/modules/zadarma
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/content.git  $www_path/demo/common/modules/content
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/widget.git  $www_path/demo/common/modules/widget
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/blog.git  $www_path/demo/common/modules/blog
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/shop.git $www_path/demo/common/modules/shop
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/chat.git  $www_path/demo/common/modules/chat
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/crm.git  $www_path/demo/common/modules/crm
git clone http://rlogachev:Derw45sh84@89.223.95.169/modules/bot.git  $www_path/demo/common/modules/bot


php $www_path/demo/console/yii migrate --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/modulemanager/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/queuemanager/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/stat/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/blog/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/filter/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/cart/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/emailtemplates/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/field/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/gallery/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/order/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/promocode/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/shop/modules/seo/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/chat/migrations --interactive=0
php $www_path/demo/console/yii migrate --migrationPath=@common/modules/bot/migrations --interactive=0

