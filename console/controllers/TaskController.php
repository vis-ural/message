<?php

namespace console\controllers;


use backend\modules\benbot\Bot;
use common\modules\bot\components\telegram\Telegram;
use common\modules\bot\Request;
use common\commands\command\SendSocketCommand;
use common\commands\SendContentCommand;
use common\commands\SendQueueCommand;
use common\components\Helper;
use common\components\Xml2Array;
use common\models\Article;
use common\models\Clients;
use common\models\News;
use common\models\NewsSearch;
use common\models\Partners;
use common\models\ReadArticle;
use common\models\RssChanels;
use common\models\User;
use common\modules\blog\models\BlogCatalog;
use common\modules\blog\models\BlogPost;
use common\modules\bot\models\Conversation;
use yii\console\Controller;
use yii\httpclient\Client;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class TaskController extends Controller
{

    public function log($txt)
    {

        \Yii::info($txt, 'chat');
        $this->stdout($txt);

    }

    public function actionSendBot()
    {


        $con = Conversation::find()->where(['status' => 'active'])->all();
        foreach ($con as $item) {
            print_r(\GuzzleHttp\json_decode($item->notes));
        }


    }

    public function actionSuncRss()
    {
        $Keys = [];//
        $localsocket = "tcp://" . env('FRONTEND_DOMAIN') . ":1236";

        $blogCat = BlogCatalog::find()->where(['status'=>1])->all();
        foreach ($blogCat as $blogCatItem) {

            $Keys = explode(",", trim($blogCatItem->seo_keywords));

            print_r($Keys);

            $rss = \common\modules\content\models\RssChanels::find()->where(['status' => 1])->all();
            foreach ($rss as $itemRss) {
                $xmlStr = file_get_contents($itemRss->url);
                $array = \common\modules\content\components\Xml2Array::go($xmlStr, 1, 'attribute');

                if (isset($array['rss'])) {


                    foreach ($array['rss']['channel']['item'] as $item) {

                        if (isset($item['description']['value']) && mb_strlen($item['description']['value'])>1500) {

                            $des = strip_tags(trim($item['description']['value']));


                            echo "\r\nBlog id -".$blogCatItem->id." chanel id - ".$itemRss->id."\r\n";

                            print_r($item['title']['value']);
                            print_r($itemRss->url);
                            echo "\r\n \r\n";

                            \Yii::info(" title >>>> " . print_r($item, true), 'chat');


                            if(!empty($des)){

                                    foreach ($Keys as $t){

                                        $itemDess = $des;
                                        $pos = strpos(strtolower($itemDess), strtolower($t));
                                        if ($pos === false) {
                                            echo "Строка: {$t} не найдена в строке: {$itemDess}\r\n\r\n";

                                        } else {

                                            print_r("\r\nBlog id -".$blogCatItem->id." chanel id - ".$itemRss->id." Сравнение  -".$itemDess."==".$t."-");
                                            $message = $item['title']['value'];
                                            $instance = stream_socket_client($localsocket);
                                            $txtjson = \GuzzleHttp\json_encode(['type' => 'out', 'message' => $message]);
                                            \Yii::info('Отправлено клиенту ', 'chat');
                                            // fwrite($instance, json_encode(['user' => $client->cookie, 'message' => $txtjson ])  . "\n");
                                            $sentSuccess = \Yii::$app->commandBus->handle(new \common\modules\queuemanager\commands\command\SendSocketCommand([

                                                'message' => $txtjson,
                                                'user' => 'backend'
                                            ]));


                                            $model = BlogPost::find()->where(['title'=>substr($item['title']['value'],0,256)])->one();
                                            if(!$model){
                                                $model = new BlogPost();
                                                $model->detachBehavior('image');
                                                $model->title = substr($item['title']['value'],0,256);
                                                $model->content = strip_tags($item['description']['value']);
                                              //  $model->surname = $item['link']['value'];
                                                $model->status = 0;
                                                $model->tags = strtolower($t);
                                                $model->user_id = 1;
                                              //  $model->surname = $this->url_slug(substr($item['title']['value'],0,256));
                                                $model->catalog_id = $blogCatItem->id;


                                                if(isset($item['enclosure']['attr']['url'])){
                                                    print_r($item['enclosure']['attr']['url']);
                                                }
                                                print_r("Img end \r\n");



//                                            $path = Helper::saveFileUrl($item['enclosure']['attr']['url']);
///                                            print_r($path);
//                                            echo "\r\n";
//                                            $path = explode('source/', $path);
//                                            $model->thumbnail_base_url = 'https://infomarketstudio.ru/storage/web/source';
//                                            $model->thumbnail_path = $path[1];
                                                if (!$model->save()) {

                                                    print_r($model->getErrors());
                                                    \Yii::info("ERROR DB IMG method >>>> " . print_r($model->getErrors(), true), 'chat');
                                                    die;
                                                }
                                            }
                                        }






//                                        if(!empty($itemDess) && !empty($t) &&  strtolower($itemDess) == strtolower($t)){
//
//
//
//
//
//
//
//
//                                        }
                                    }

//
//                                        $tmp = $this->strpos_array($itemDess, $Keys);
//
//                                        if ($tmp) {
//
//                                            \Yii::info(" ADD title >>>> " . print_r($item, true), 'chat');
//
//                                        }




                              //  }


                            }
                        }






                        // echo $this->strpos_array($item['title']['value'], $Keys); // Output is 10
                        //print_r($item['title']['value']); echo "\r\n";
                        //  print_r($item['description']['value']); echo "\r\n";
//            $page = explode("p=", $item['guid']['value']);
//
//            if (isset($page[1])) {
//                $newsModel = Article::find()->where(['page' => $page[1]])->one();
//                if ($newsModel) {
//                    \Yii::info("title >>>> найдена!!! " . print_r($item, true), 'infostudiobot');
//                } else {
//                    \Yii::info(" ADD title >>>> " . print_r($item, true), 'infostudiobot');
////                    $model = new Article();
////
////                    $model->detachBehavior('image');
////
////                    $model->page = $page[1];
////                    $model->title = $item['title']['value'];
////                    $model->body = strip_tags($item['content:encoded']['value']);
////                    $model->view = $item['link']['value'];
////                    $model->status = 1;
////                    $model->avto = 2;
////                    $model->publish_vk = 1;
////                    $model->publish_fb = 1;
////                    $model->publish_viber = 1;
////                    $model->publish_telegram = 1;
////                    $model->publish_whatsapp = 1;
////                    $model->category_id = 1;
////                    $model->client_id = 6;
////
////
////                    $path = Helper::saveFileUrl($item['enclosure']['attr']['url']);
////
////                    $path = explode('source/',$path);
////
////                    $model->thumbnail_base_url = 'https://roztorbot.ru/storage/web/source';
////                    $model->thumbnail_path = $path[1];
////
////                    if (!$model->save()) {
////                        \Yii::info("method >>>> " . print_r($model->getErrors(), true), 'infostudiobot');
////                    }
//
//                }
//
//            }
                        // }


                    }
                }

            }
        }

    }

    function strpos_array($haystack, $needles)
    {
        if (is_array($needles)) {
            foreach ($needles as $str) {
                if (is_array($str)) {
                    $pos = $this->strpos_array($haystack, $str);
                } else {
                    $pos = strpos($haystack, $str);
                }
                if ($pos !== FALSE) {
                    return $pos;
                }
            }
        } else {
            return strpos($haystack, $needles);
        }
    }

    function url_slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );

        // Merge options
        $options = array_merge($defaults, $options);

        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }


    public  function actionTest(){


        $bot = new \common\modules\bot\Bot('telegram');
        $data = [];
        $data['chat_id'] = 201378424;//'@chatbotbusiness'; //201378424;
        $data['text'] = "test";
        $data['parse_mode'] = 'HTML';
        $result = Request::sendMessage($data);



//        $lead = \Yii::$app->amocrm->lead;
//
//        $lead->debug(true); // Режим отладки
//        $lead['name'] = 'Иван 89250111405';
//        // $lead['date_create'] = '-2 DAYS';
//
//
//        $lead['tags'] = ['infomarketstudio.ru'];
//     //   $lead['visitor_uid'] = '12345678-52d2-44c2-9e16-ba0052d9f6d6';
//
//
//        $idLead = $lead->apiAdd();
//        print_r($idLead);
//
//
//
//
//        $contact = \Yii::$app->amocrm->contact;
//        $contact->debug(true); // Режим отладки
//        $contact['name'] = 'Заявка из сайта';
//
//
//
//        $idContact = $contact->apiAdd();
//        print_r($idContact);
//
//        $link = \Yii::$app->amocrm->links;
//        $link['from'] = 'leads';
//        $link['from_id'] =$idLead;
//        $link['to'] = 'contacts';
//        $link['to_id'] =$idContact;
//        var_dump($link->apiLink());

    }
}
