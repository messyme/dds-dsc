<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_dl_ann);
    google.charts.setOnLoadCallback(draw_dl_cnn);
    google.charts.setOnLoadCallback(draw_dl_rnn);
    google.charts.setOnLoadCallback(draw_cv_face_recognition);
    google.charts.setOnLoadCallback(draw_cv_object_detection);
    google.charts.setOnLoadCallback(draw_cv_ocr);
    google.charts.setOnLoadCallback(draw_nlp_nlp);
    google.charts.setOnLoadCallback(draw_hpc_pc);
    google.charts.setOnLoadCallback(draw_hpc_ec);
    google.charts.setOnLoadCallback(draw_rpa_rpa);

    function draw_dl_ann() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($dl_ann as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'ANN',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total'

            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('dl_ann'));

        chart.draw(data, options);

    };


    function draw_dl_cnn() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($dl_cnn as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'CNN',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total'

            }

        };
        var chart = new google.visualization.ColumnChart(document.getElementById('dl_cnn'));

        chart.draw(data, options);

    };


    function draw_dl_rnn() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($dl_rnn as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'RNN',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total',

            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('dl_rnn'));

        chart.draw(data, options);

    };

    function draw_cv_face_recognition() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($cv_face_recognition as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Face Recognition',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total'
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('cv_face_recognition'));

        chart.draw(data, options);

    };

    function draw_cv_object_detection() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($cv_object_detection as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Object Detection',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total'
            }

        };
        var chart = new google.visualization.ColumnChart(document.getElementById('cv_object_detection'));

        chart.draw(data, options);

    };


    function draw_cv_ocr() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($cv_ocr as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'OCR',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#5cb85c'],
            width: '100%',
            vAxis: {
                title: 'Total'
            }

        };
        var chart = new google.visualization.ColumnChart(document.getElementById('cv_ocr'));

        chart.draw(data, options);

    };

    function draw_nlp_nlp() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($nlp_nlp as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'NLP',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            backgroundColor: {
                fill: 'transparent'
            },

            fontSize: 11,
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            colors: ['#f10096'],
            width: '100%',
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "80%"
            },
            vAxis: {
                title: 'Total'
            }

        };
        var chart = new google.visualization.ColumnChart(document.getElementById('nlp_nlp'));

        chart.draw(data, options);

    };

    function draw_hpc_pc() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($hpc_pc as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Parallel Computing',
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            colors: ['#f66d00'],
            width: '100%',
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            vAxis: {
                title: 'Total'
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('hpc_pc'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };


    function draw_hpc_ec() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($hpc_ec as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Edge Computing',
            legend: {
                position: 'top',
                alignment: 'left'
            },
            backgroundColor: {
                fill: 'transparent'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            width: '100%',
            colors: ['#f66d00'],
            fontSize: 11,
            animation: {
                duration: 1500,
                easing: 'linear',
                startup: true
            },
            bar: {
                groupWidth: "90%"
            },
            vAxis: {
                title: 'Total',
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('hpc_ec'));

        // sort data
        // data.sort([{
        //     column: 0
        // }]);

        chart.draw(data, options);

    };


    function draw_rpa_rpa() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #ffa800');
        data.addColumn('number', 'Total Members'.toUpperCase(), 'color: #ffa800');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($rpa_rpa as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'RPA',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            width: '100%',
            colors: ['#ffa800'],
            fontSize: 11,
            vAxis: {
                title: 'Total',
            },


        };
        var chart = new google.visualization.ColumnChart(document.getElementById('rpa_rpa'));

        chart.draw(data, options);

    };
</script>

<script type="text/javascript">















</script>