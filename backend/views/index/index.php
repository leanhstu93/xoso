<?php

use frontend\models\News;
use yii\web\View;
use \frontend\models\Sessions;
?>
<!-- Page -->
<div class="page">
    <?php echo $this->render("//element/breadcrumb"); ?>

    <div class="page-content css__table ">
        <div class="panel">
            <div class="panel-body">
                <?php echo $this->render("//element/message"); ?>
                <div class="card card-shadow" id="widgetLinepointDate">
                    <div class="card-block p-30">
                        <h3 class="card-title">Truy cập
                        </h3>
                    </div>
                    <div class="example text-center">
                        <canvas id="js__ ChartjsLine" height="300" width="750"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn-sm btn-warning">
                            <i class="icon fa-newspaper-o"></i>
                        </button>
                        <span class="ml-15 font-weight-400">Tin tức</span>
                        <div class="content-text text-center mb-0">
                            <span class="font-size-40 font-weight-100">
                                <?php
                                echo News::find()->count();
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn-sm btn-danger">
                            <i class="icon fa-newspaper-o"></i>
                        </button>
                        <div class="content-text text-center mb-0">
                            <span class="font-size-40 font-weight-100">
                                <?php
                                echo \frontend\models\NewsCategory::find()->count();
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn-sm btn-success">
                            <i class="icon wb-video"></i>
                        </button>
                        <span class="ml-15 font-weight-400">Video</span>
                        <div class="content-text text-center mb-0">
                            <span class="font-size-40 font-weight-100">
                                <?php
                                echo \frontend\models\Video::find()->count();
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 info-panel">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn btn-floating btn-sm btn-primary">
                            <i class="icon wb-users" aria-hidden="true"></i>
                        </button>
                        <span class="ml-15 font-weight-400">Tổng lượt truy cập</span>
                        <div class="content-text text-center mb-0">
                            <span class="font-size-40 font-weight-100">
                                <?php
                                $company =  \frontend\models\company::find()->one();
                                echo $company->count_visit;
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// luot truy cap
$this->beginBlock('block1');
?>
    <script>
        $(function(){
            let labels = [];
            let series = [];
            <?php
            $dataChart = [];

            for ($i = 9; $i >= 0; $i--) {
                $day = strtotime("-$i day");
                $timestampDayStart = mktime(0,0,0,date('m',$day),date('d',$day),date('Y',$day));
                $timestampDayEnd = mktime(23,59,59,date('m',$day),date('d',$day),date('Y',$day));

                $count = Sessions::find()->where("session_start >= $timestampDayStart and session_start <= $timestampDayEnd")->count();

                echo "labels.push('".date('d/m',$day)."');\r\n";
                echo "series.push(".$count.");\r\n";

            }
            ?>
            var lineChartData = {
            	labels: labels,
                datasets: [{
            		label: "Truy cập",
                    fill: true,
                    backgroundColor: "rgba(98, 168, 234, .1)",
                    borderColor: Config.colors("primary", 600),
                    pointRadius: 4,
                    borderDashOffset: 2,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: Config.colors("primary", 600),
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: Config.colors("primary", 600),
            		data: series,


            	}]
            };
            base.initChartJs(lineChartData);
        })
    </script>
<?php $this->endBlock(); ?>