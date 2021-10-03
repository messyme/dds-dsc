<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(draw_graphPython);
    google.charts.setOnLoadCallback(draw_graphR);
    google.charts.setOnLoadCallback(draw_graphPHP);
    google.charts.setOnLoadCallback(draw_graphCPLUS);
    google.charts.setOnLoadCallback(draw_graphshell);
    google.charts.setOnLoadCallback(draw_graphgit);
    google.charts.setOnLoadCallback(draw_graphelastic);
    google.charts.setOnLoadCallback(draw_graphpythonr);
    google.charts.setOnLoadCallback(draw_graphpowerbi);
    google.charts.setOnLoadCallback(draw_graphtableu);
    google.charts.setOnLoadCallback(draw_graphGDS);
    google.charts.setOnLoadCallback(draw_grapd3js);

    // PYTHON
    function draw_graphPython() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_python->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Python',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        // var options = {
        //     title: 'Python',
        //     chartArea: {
        //         // leave room for y-axis labels
        //         width: '94%'
        //     },
        //     legend: {
        //         position: 'top'
        //     },
        //     width: '100%',
        //     colors: ['rgb(124, 179, 66)'],
        // };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphPython'));

        chart.draw(data, options);
    }
    // end bar chart PYTHON

    // R
    function draw_graphR() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_R->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'R',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphR'));

        chart.draw(data, options);
    }
    // end bar chart R

    // PHP
    function draw_graphPHP() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_PHP->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'PHP',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphPHP'));

        chart.draw(data, options);
    }
    // end bar chart PHP

    // C++
    function draw_graphCPLUS() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_CPLUS->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'C++',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphCPLUS'));

        chart.draw(data, options);
    }
    // end bar chart c++

    // SHELL
    function draw_graphshell() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_shell->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Shell Scripting',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphshell'));

        chart.draw(data, options);
    } // end bar chart shell
    // Elastic
    function draw_graphelastic() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_elastic->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Elasticsearch',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphelastic'));

        chart.draw(data, options);
    }


    // Git
    function draw_graphgit() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_git->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Git',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphgit'));

        chart.draw(data, options);
    }
    // end bar chart git

    // Python/R
    function draw_graphpythonr() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_pythonr->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Python/R Library',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#1A73E8'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphpythonr'));

        chart.draw(data, options);
    } // end bar chart python / R

    // Power BI
    function draw_graphpowerbi() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_powerbi->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Power BI',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#1A73E8'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphpowerbi'));

        chart.draw(data, options);
    } // end bar chart Power bi

    // TABLEAU
    function draw_graphtableu() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_tableau->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Tableau',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#1A73E8'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphtableau'));

        chart.draw(data, options);
    } // end bar chart tableu

    // D3JS
    function draw_grapd3js() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_d3js->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'D3.JS',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#1A73E8'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphd3js'));

        chart.draw(data, options);
    } // end bar chart d3js

    // GDS
    function draw_graphGDS() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_GDS->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Google Data Studio',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#1A73E8'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphGDS'));

        chart.draw(data, options);
    } // end bar chart GDS
</script>