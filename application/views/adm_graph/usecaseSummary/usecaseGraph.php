<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_member_perusecase);
    google.charts.setOnLoadCallback(draw_member_perusecaseApp);
    google.charts.setOnLoadCallback(draw_member_pertribe);
    google.charts.setOnLoadCallback(draw_member_pertribeApp);
    google.charts.setOnLoadCallback(draw_squadGraph);
    google.charts.setOnLoadCallback(draw_squadGraphApp);
    google.charts.setOnLoadCallback(draw_groupGraph);
    google.charts.setOnLoadCallback(draw_groupGraphApp);
    
    function draw_member_perusecase() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'Employee MOBILITY'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Organic'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Outsourcing'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Pro Hire'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Probation'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Digital Talent'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($member_perusecase as $value) {
                
                $resultf[] = array(strtoupper($value->nama_usecase), (int)$value->EMPEX, $value->EMPEX, (int)$value->Organik, $value->Organik, (int)$value->Outsource, $value->Outsource, (int)$value->ProHire, $value->ProHire, (int)$value->Probation, $value->Probation, (int)$value->DigitalTalent, $value->DigitalTalent);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('member_perusecase'));

        chart.draw(data, options);
    };

    function draw_member_perusecaseApp() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'Apprentice'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($member_perusecaseApp as $value) {
                
                $resultf[] = array(strtoupper($value->nama_usecase), (int)$value->total, $value->total);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('member_perusecaseApp'));

        chart.draw(data, options);
    };

    function draw_member_pertribe() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Tribe');
        data.addColumn('number', 'Employee MOBILITY'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Organic'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Outsourcing'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Pro Hire'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Probation'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Digital Talent'.toUpperCase());
        data.addColumn({ role: 'annotation' });

        data.addRows(
            <?php
            $resultg = array();
            foreach ($member_pertribe as $value) {
                $resultg[] = array(strtoupper($value->nama_tribe), (int)$value->EMPEX, $value->EMPEX, (int)$value->Organik, $value->Organik, (int)$value->Outsource, $value->Outsource, (int)$value->ProHire, $value->ProHire, (int)$value->Probation, $value->Probation, (int)$value->DigitalTalent, $value->DigitalTalent);
            }
            echo $g = json_encode($resultg);
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
                groupWidth: "50%"
            }
        };
        var chart = new google.visualization.BarChart(document.getElementById('member_pertribe'));

        chart.draw(data, options);
    };

    function draw_member_pertribeApp() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Tribe');
        data.addColumn('number', 'TOTAL APPRENTICE MEMBERS'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addRows(
            <?php
            $resultg = array();
            foreach ($member_pertribeApp as $value) {
                $resultg[] = array(strtoupper($value->nama_tribe), (int)$value->total, $value->total);
            }
            echo $g = json_encode($resultg);
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
                groupWidth: "50%"
            }
        };
        var chart = new google.visualization.BarChart(document.getElementById('member_pertribeApp'));

        chart.draw(data, options);
    };

    function draw_squadGraph() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'Employee MOBILITY'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Organic'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Outsourcing'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Pro Hire'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Probation'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Digital Talent'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($graphSquad as $value) {
                
                $resultf[] = array(strtoupper($value->nama_squad), (int)$value->EMPEX, $value->EMPEX, (int)$value->Organik, $value->Organik, (int)$value->Outsource, $value->Outsource, (int)$value->ProHire, $value->ProHire, (int)$value->Probation, $value->Probation, (int)$value->DigitalTalent, $value->DigitalTalent);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('squadGraph'));

        chart.draw(data, options);
    };

    function draw_squadGraphApp() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'TOTAL APPRENTICE MEMBERS'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($graphSquadApp as $value) {
                
                $resultf[] = array(strtoupper($value->nama_squad), (int)$value->total, $value->total);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('squadGraphApp'));

        chart.draw(data, options);
    };

    function draw_groupGraph() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'Employee MOBILITY'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Organic'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Outsourcing'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Pro Hire'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Probation'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        data.addColumn('number', 'Digital Talent'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($graphGroup as $value) {
                
                $resultf[] = array(strtoupper($value->nama_groups), (int)$value->EMPEX, $value->EMPEX, (int)$value->Organik, $value->Organik, (int)$value->Outsource, $value->Outsource, (int)$value->ProHire, $value->ProHire, (int)$value->Probation, $value->Probation, (int)$value->DigitalTalent, $value->DigitalTalent);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('groupGraph'));

        chart.draw(data, options);
    };

    function draw_groupGraphApp() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Nama Usecase');
        data.addColumn('number', 'TOTAL APPRENTICE MEMBERS'.toUpperCase());
        data.addColumn({ role: 'annotation' });
        
        data.addRows(
            <?php
            $resultf = array();
            foreach ($graphGroupApp as $value) {
                
                $resultf[] = array(strtoupper($value->nama_groups), (int)$value->total, $value->total);
            }
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
            isStacked: true,
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
        var chart = new google.visualization.BarChart(document.getElementById('groupGraphApp'));

        chart.draw(data, options);
    };

</script>