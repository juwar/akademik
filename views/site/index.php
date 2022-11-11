<?php

/** @var yii\web\View $this */

use dosamigos\chartjs\ChartJs;

$total = [];
$list_matkul = [];
foreach ($ts as $matkul) {
    $total[] = $matkul['total'];
    $list_matkul[] = $matkul['nama'];
}
// var_dump($total); die;

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
                        'labels' => $list_matkul,
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => $total
                            ],
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>
</div>