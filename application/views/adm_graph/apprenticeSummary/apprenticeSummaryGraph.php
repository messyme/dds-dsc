<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_contract_expiredApprentice); 
    google.charts.setOnLoadCallback(draw_dscAlumniApprentice);
    google.charts.setOnLoadCallback(draw_internship_expired);
    google.charts.setOnLoadCallback(draw_graphApprYear);
    google.charts.setOnLoadCallback(draw_graphApprUniv);
    google.charts.setOnLoadCallback(draw_graphApprSpv);

    function draw_internship_expired() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Tahun Selesai Internship');
        data.addColumn('number', 'Total'.toUpperCase());

        data.addRows(
            <?php
            $resultc = array();
            foreach ($internship_expired as $value) {
                $resultc[] = array(strtoupper($value->internship_selesai), $value->total);
            }
            echo $c = json_encode($resultc, JSON_NUMERIC_CHECK);
            ?>
        );

        var options = {
            backgroundColor: {
                fill: 'transparent'
            },
            chartArea: {
                width: '90%',
                height: '90%'
            },
            is3D: true,
            // pieSliceText: 'label'
        };
        var chart = new google.visualization.PieChart(document.getElementById('internship_expired'));

        // sort data
        // data.sort([{column: 0}]);

        chart.draw(data, options);
    };

    function draw_contract_expiredApprentice() {
        console.log(<?php echo json_encode($contract_expired); ?>)
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Bulan Tahun');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($contract_expiredApprentice as $value) {                    
                $resultd[] = array(strtoupper($value->tahun), (int)$value->total, $value->total);
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
            isStacked: true,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%'
            },
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
        var chart = new google.visualization.BarChart(document.getElementById('contract_expiredApprentice'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);
    };

    function draw_dscAlumniApprentice() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Tahun');
        data.addColumn('number', 'Total Alumni'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphAlumniInt as $value) {
                $resultd[] = array(strtoupper($value->tahun), (int)$value->total, $value->total);
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
            isStacked: true,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%'
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            
        };
        var chart = new google.visualization.BarChart(document.getElementById('dscAlumniApprentice'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);
    };

    function draw_graphApprYear() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Name');
        data.addColumn('number', 'Total Apprentice Members'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphApprYear as $value) {
                $resultd[] = array($value->tahun, (int)$value->total, $value->total);
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
            isStacked: true,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%'
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            
        };
        var chart = new google.visualization.BarChart(document.getElementById('graphApprYear'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

    function draw_graphApprUniv() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Name');
        data.addColumn('number', 'Total Apprentice Members '.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphApprUniv as $value) {
                $resultd[] = array(strtoupper($value->nama_universitas), (int)$value->total, $value->total);
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
            isStacked: true,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%'
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            
        };
        var chart = new google.visualization.BarChart(document.getElementById('graphApprUniv'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

    function draw_graphApprSpv() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Name');
        data.addColumn('number', 'Total Apprentice Members'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphApprSpv as $value) {
                $resultd[] = array(strtoupper($value->nama_member), (int)$value->total, $value->total);
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
            isStacked: true,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%'
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            
        };
        var chart = new google.visualization.BarChart(document.getElementById('graphApprSpv'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

</script>