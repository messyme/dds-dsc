<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_statistics_descriptive);
    google.charts.setOnLoadCallback(draw_statistics_inferential);
    google.charts.setOnLoadCallback(draw_statistics_probability);
    google.charts.setOnLoadCallback(draw_statistics_time_series);
    google.charts.setOnLoadCallback(draw_mathematics_calculus);
    google.charts.setOnLoadCallback(draw_mathematics_linear_algebra);
    google.charts.setOnLoadCallback(draw_eda_eda);
    google.charts.setOnLoadCallback(draw_business_understanding_customer);
    google.charts.setOnLoadCallback(draw_business_understanding_growth_hacking);
    google.charts.setOnLoadCallback(draw_business_understanding_marketing);
    google.charts.setOnLoadCallback(draw_business_understanding_product);
    google.charts.setOnLoadCallback(draw_analytics_level_descriptive);
    google.charts.setOnLoadCallback(draw_analytics_level_diagnostic);
    google.charts.setOnLoadCallback(draw_analytics_level_predictive);
    google.charts.setOnLoadCallback(draw_analytics_level_prescriptive);

    function draw_statistics_descriptive() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($statistics_descriptive as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            series: {
                0: {
                    color: '#0072f0',
                    visibleInLegend: true
                }
            },
            backgroundColor: {
                fill: 'transparent'
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('statistics_descriptive'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_statistics_inferential() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($statistics_inferential as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#0072f0',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('statistics_inferential'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_statistics_probability() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($statistics_probability as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#0072f0',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('statistics_probability'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_statistics_time_series() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($statistics_time_series as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#0072f0',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('statistics_time_series'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_mathematics_calculus() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($mathematics_calculus as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#00b6cb',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('mathematics_calculus'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_mathematics_linear_algebra() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($mathematics_linear_algebra as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#00b6cb',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('mathematics_linear_algebra'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_eda_eda() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($eda_eda as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#f10096',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('eda_eda'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_business_understanding_customer() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($business_understanding_customer as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#f66d00',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('business_understanding_customer'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_business_understanding_growth_hacking() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($business_understanding_growth_hacking as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#f66d00',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('business_understanding_growth_hacking'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_business_understanding_marketing() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($business_understanding_marketing as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#f66d00',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('business_understanding_marketing'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_business_understanding_product() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($business_understanding_product as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#f66d00',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('business_understanding_product'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_analytics_level_descriptive() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($analytics_level_descriptive as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#ffa800',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('analytics_level_descriptive'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_analytics_level_diagnostic() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($analytics_level_diagnostic as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#ffa800',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('analytics_level_diagnostic'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_analytics_level_predictive() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($analytics_level_predictive as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#ffa800',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('analytics_level_predictive'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };

    function draw_analytics_level_prescriptive() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($analytics_level_prescriptive as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },
            series: {
                0: {
                    color: '#ffa800',
                    visibleInLegend: true
                }
            },
            isStacked: true,
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('analytics_level_prescriptive'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };
</script>