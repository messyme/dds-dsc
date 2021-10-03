<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_total_responden_role);
    google.charts.setOnLoadCallback(draw_total_responden_level);

    function draw_total_responden_role() {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Role Responden');
        data.addColumn('number', 'Total Members'.toUpperCase());


        data.addRows(
            <?php
            $resultx = array();
            foreach ($total_responden_role as $value) {
                $resultx[] = array(strtoupper($value->nama_posisi), (int)$value->total);
            }
            echo $x = json_encode($resultx);
            ?>
        );

        var options = {
            legend: {
                position: 'bottom'
            },

            chartArea: {
                width: '90%',
                height: '80%'
            },
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('responden_roles'));

        chart.draw(data, options);


    };

    function draw_total_responden_level() {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Role Responden');
        data.addColumn('number', 'Total Members'.toUpperCase());

        data.addRows(
            <?php
            $resultx = array();
            foreach ($total_responden_level as $value) {
                $resultx[] = array(strtoupper($value->nama_posisi_type), (int)$value->total);
            }
            echo $x = json_encode($resultx);
            ?>
        );

        var options = {
            legend: {
                position: 'bottom'
            },

            chartArea: {
                width: '100%',
                height: '80%'
            },
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('responden_level'));

        chart.draw(data, options);


    };
</script>