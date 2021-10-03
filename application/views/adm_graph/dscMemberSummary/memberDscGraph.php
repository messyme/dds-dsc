<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_member_status);
    google.charts.setOnLoadCallback(draw_member_statusBar);
    google.charts.setOnLoadCallback(draw_contract_expired);
    google.charts.setOnLoadCallback(draw_dscAlumni);
    google.charts.setOnLoadCallback(draw_graphBand);
    google.charts.setOnLoadCallback(draw_graphPosition);
    

    function draw_member_status() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Status');
        data.addColumn('number', 'Jumlah');
        

        data.addRows(
            <?php
            $resulta = array();
            foreach ($member_status as $value) {
                $resulta[] = array(strtoupper($value->nama_status), $value->total);
            }
            echo $a = json_encode($resulta, JSON_NUMERIC_CHECK);
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
        };
        var chart = new google.visualization.PieChart(document.getElementById('member_status'));

        // sort data
        data.sort([{
            column: 1
        }]);

        chart.draw(data, options);
    };

    function draw_member_statusBar() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Posisi');
        data.addColumn('number', 'Organic'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Employee MOBILITY'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Pro Hire'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Outsourcing'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Probation'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Apprentice'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            
                
                    $resultf[] = array(
                    strtoupper('DSC Members'), 
                    (int)$member_status[1]->total, 
                    $member_status[1]->total, 
                    (int)$member_status[0]->total, 
                    $member_status[0]->total, 
                    (int)$member_status[3]->total, 
                    $member_status[3]->total, 
                    (int)$member_status[2]->total, 
                    $member_status[2]->total, 
                    (int)$member_status[4]->total, 
                    $member_status[4]->total, 
                    (int)$member_status[5]->total, 
                    $member_status[5]->total);
            
            echo $f = json_encode($resultf);
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
            isStacked: false,
            chartArea: {
                left: 250,
                width: '100%',
                height: '90%',
                
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
        var chart = new google.visualization.BarChart(document.getElementById('member_statusBar'));

        chart.draw(data, options);
    };

    

    // bar chart Contract Expired
    function draw_contract_expired() {
        console.log(<?php echo json_encode($contract_expired); ?>)
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Bulan Tahun');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({ role: 'annotation' });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($contract_expired as $value) {
                
                $resultd[] = array(strtoupper($value->kontrak_selesai), (int)$value->total, $value->total);
                
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
        var chart = new google.visualization.BarChart(document.getElementById('contract_expired'));

        chart.draw(data, options);
    };
    // end bar chart Contract Expired

    // bar chart dsc alumni
    function draw_dscAlumni() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Tahun');
        data.addColumn('number', 'Total Alumni'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphAlumni as $value) {
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
        var chart = new google.visualization.BarChart(document.getElementById('dscAlumni'));

        chart.draw(data, options);
    };
    // end bar chart dsc alumni

    // bar chart dsc band
    function draw_graphBand() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'name band');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphBand as $value) {
                $resultd[] = array(strtoupper($value->nama_band), (int)$value->total, $value->total);
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
        var chart = new google.visualization.BarChart(document.getElementById('graphBand'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };
    // end bar chart dsc band

    // bar chart dsc position
    function draw_graphPosition() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'name Position');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($graphPosition as $value) {
                $resultd[] = array(strtoupper($value->nama_posisi), (int)$value->total, $value->total);
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
        var chart = new google.visualization.BarChart(document.getElementById('graphPosition'));

        // sort data
        data.sort([{
            column: 0
        }]);

        chart.draw(data, options);
    };
    // end bar chart dsc position

</script>