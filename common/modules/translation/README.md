# shop
##Модуль интернет магазина
###установка основного модуля
php console/yii migrate --migrationPath=common/modules/shop/migrations
###установка дополнительных модулей
* php console/yii migrate --migrationPath=common/modules/shop/modules/gallery/migrations
* php console/yii migrate --migrationPath=common/modules/shop/modules/filter/migrations
* php console/yii migrate --migrationPath=common/modules/shop/modules/seo/migrations
* php console/yii migrate --migrationPath=common/modules/shop/modules/cart/migrations