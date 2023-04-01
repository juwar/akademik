<?php

/** @var yii\web\View $this */

use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

$total = [];
$list_matkul = [];
foreach ($ts as $matkul) {
    $total[] = $matkul['total'];
    $list_matkul[] = $matkul['nama'];
}
// var_dump($total); die;

$this->title = 'PTI AKADEMIK';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
    </div>

    <div class="body-content">
        <div><br>
            <?= Html::img('@web/assets/img/pti.png', ['alt' => 'My logo', 'width' => '100%']) ?>

            <br><br>
            <center>
                <h3>
                    <font color=#008B8B>
                        <p>
                            PTI AKADEMIK portal layanan akademik Pendidikan Teknik Informatika
                        </p>
                    </font>
                </h3>
            </center>
        </div><br><br>

        <div><br>
            <center>
                <h5>
                    <font color=black>
                        <p>
                            Grafik mata kuliah yang akan dibuka pada semester genap 2023
                        </p>
                    </font>
                </h5>
            </center>
        </div>

        <div class="row mx-auto" style="width: 50%">
            <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 400,
                    'width' => 500
                ],
                'data' => [
                    'labels' => $list_matkul,
                    'datasets' => [
                        [
                            'label' => "Data Voting Mahasiswa",
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
        <div><br>
            <h5>
                <font color=red>
                    <p>
                        Keterangan :
                    </p>
                </font>
                <font color=black>
                    <p>
                        - Mata kuliah pilihan akan dibuka sesuai dengan hasil voting yang tertera pada grafik diatas.<br>
                        - 5 grafik teratas menunjukkan mata kuliah yang akan dibuka.

                    </p>
                </font>
            </h5>
        </div>
    </div>

</div>
<br><br><br><br><br><br><br><br>
<?= Html::img('@web/assets/img/fo.png', ['alt' => 'My logo', 'width' => '100%']) ?>