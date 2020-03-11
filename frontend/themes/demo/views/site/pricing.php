<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('frontend','Pricing');
$this->params['breadcrumbs'][] = $this->title;
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>
<section class="iq-pricing">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-sm-12 text-center">
                <div class="title-box">
                    <h2 class="title text-dark">Pick a pricing plan. Start more <span>conversations. </span> Shrink your sales cycle.</h2>
                    <p class="mt-4">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                </div>
            </div>
        </div>
        <div class="row no-gutters mt-5">
            <div class="col-lg-4 col-sm-12">
                <div class="pricing-box text-center ">
                    <div class="price-head mt-2 mb-2">Free</div>
                    <div class="price-blog pt-4 pb-4">
                        <div class="price"> <span class="currency">$</span><strong>00/</strong><span class="month">Free</span> </div>
                    </div>
                    <div class="listing">
                        <ul class="mt-5">
                            <li>
<span class="time-of-year">
Case Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Hourly and Flat Fee Billing
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Custom Invoices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
 <span class="time-of-year">
Task Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Devices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Payment Plans
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Clio Launcher
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Trust Requests
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Advanced Reporting
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Priority Support
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                        </ul>
                    </div>
                    <a class="button grey mt-5" href="pricing.html#" role="button">Choose Package</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 r-mt3">
                <div class="pricing-box text-center ">
                    <div class="price-head mt-2 mb-2">Basic</div>
                    <div class="price-blog pt-4 pb-4">
                        <div class="price"> <span class="currency">$</span><strong>59/</strong><span class="month">Month</span> </div>
                    </div>
                    <div class="listing">
                        <ul class="mt-5">
                            <li>
<span class="time-of-year">
Advanced Reporting
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Priority Support
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Case Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Hourly and Flat Fee Billing
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Devices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Payment Plans
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Clio Launcher
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Trust Requests
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
 <span class="time-of-year">
Custom Invoices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Task Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                        </ul>
                    </div>
                    <a class="button grey mt-5" href="pricing.html#" role="button">Choose Package</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 r-mt3">
                <div class="pricing-box text-center ">
                    <div class="price-head mt-2 mb-2">Business</div>
                    <div class="price-blog pt-4 pb-4">
                        <div class="price"> <span class="currency">$</span><strong>99/</strong><span class="month">Month</span> </div>
                    </div>
                    <div class="listing">
                        <ul class="mt-5">
                            <li>
<span class="time-of-year">
Custom Invoices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Task Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Case Management
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Hourly and Flat Fee Billing
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Devices
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Payment Plans
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Clio Launcher
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Trust Requests
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Advanced Reporting
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                            <li>
<span class="time-of-year">
Priority Support
<span class="tooltip">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</span>
<i class="ion-information-circled"></i></span>
                            </li>
                        </ul>
                    </div>
                    <a class="button grey mt-5" href="pricing.html#" role="button">Choose Package</a>
                </div>
            </div>
        </div>
    </div>
</section>
