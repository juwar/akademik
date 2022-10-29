<?php

/** @var yii\web\View $this */

use dosamigos\chartjs\ChartJs;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-6">
                <?= ChartJs::widget([
                    'type' => 'bar',
                    'options' => [
                        'height' => 400,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'label' => "My Second dataset",
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>
</div>