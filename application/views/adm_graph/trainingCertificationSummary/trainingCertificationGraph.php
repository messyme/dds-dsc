<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_trained_certified_pie);
    google.charts.setOnLoadCallback(draw_trained_member_pertahun);
    google.charts.setOnLoadCallback(draw_certified_member_pertahun);

    function draw_trained_certified_pie() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Jenis');
        data.addColumn('number', 'Total'.toUpperCase());

        data.addRows([
            ['TRAINED', <?= $total_trained_member ?>],
            ['CERTIFIED', <?= $total_certified_member ?>]
        ]);

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
        var chart = new google.visualization.PieChart(document.getElementById('trained_certified_pie'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

    function draw_trained_member_pertahun() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Training');
        data.addColumn('number', '2018');
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', '2019');
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', '2020');
        data.addColumn({ role: 'annotation' });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($trained_member_pertahun as $value) {
                $resultd[] = array(strtoupper($value->nama_pelatihan), (int)$value->perjenis_2018, $value->perjenis_2018, (int)$value->perjenis_2019, $value->perjenis_2019, (int)$value->perjenis_2020, $value->perjenis_2020);
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
        var chart = new google.visualization.BarChart(document.getElementById('trained_member_pertahun'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

    function draw_certified_member_pertahun() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Sertifikasi');
        data.addColumn('number', '2018');
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', '2019');
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', '2020');
        data.addColumn({ role: 'annotation' });


        data.addRows(
            <?php
            $resulte = array();
            foreach ($certified_member_pertahun as $value) {
                $resulte[] = array(strtoupper($value->nama_sertifikasi), (int)$value->perjenis_2018, $value->perjenis_2018, (int)$value->perjenis_2019, $value->perjenis_2019, (int)$value->perjenis_2020, $value->perjenis_2020);
            }
            echo $e = json_encode($resulte);
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
                height: '90%',
                right:20
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
        };
        var chart = new google.visualization.BarChart(document.getElementById('certified_member_pertahun'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };

</script>