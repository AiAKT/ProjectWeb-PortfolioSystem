<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart JS</title>
    <h2 align="center">จำนวนผลงานนิสิตตามชั้นปีการศึกษา</h2>

    <style>
    body {
        width: 550px;
        margin: 3rem auto;
    }

    #chart-container {
        width: 100%;
        height: auto;
    }
    </style>


</head>

<body>

    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
    $(document).ready(function() {
        showGraph();
    });

    function showGraph() {
        {
            $.post("data.php", function(data) {
                console.log(data);
                let year = [];
                let year1 = [];
                let num = [];

                for (let i in data) {
                    year.push(data[i].yearstd);
                    year1.push(data[i].semester);
                    num.push(data[i].total);
                }

                let chartdata = {
                    labels: year,
                    datasets: [{
                            label: 'จำนวนผลงานภาคต้น',
                            //backgroundColor: '#49e2ff',
                            backgroundColor: [
                                'rgba(117,192,149,1.00)',
                                'rgba(117,192,149,1.00)',
                                'rgba(241,221,106,1.00)',
                                'rgba(255,143,127,1.00)',
                                'rgba(1,166,186,1.00)',
                                'rgba(160,171,177,1.00)',
                                'rgba(255,199,122,1.00)',
                                'rgba(220,73,63,1.00)',
                                'rgba(0,110,188,1.00)',

                            ],
                            borderColor: '#fff',
                            hoverBackgroundColor: [
                                'rgba(117,192,149,1.00)',
                                'rgba(117,192,149,1.00)',
                                'rgba(241,221,106,1.00)',
                                'rgba(255,143,127,1.00)',
                                'rgba(1,166,186,1.00)',
                                'rgba(160,171,177,1.00)',
                                'rgba(255,199,122,1.00)',
                                'rgba(220,73,63,1.00)',
                                'rgba(0,110,188,1.00)',
                            ],
                            hoverBorderColor: '#666666',
                            data: num,
                        },
                        {
                            label: 'จำนวนผลงานภาคปลาย',
                            data: num,
                            borderColor: [
                                'rgba(241,221,106,1.00)',
                                'rgba(241,221,106,1.00)',
                                'rgba(255,143,127,1.00)',
                                'rgba(117,192,149,1.00)',
                            ],
                            backgroundColor: [
                                'rgba(241,221,106,1.00)',
                                'rgba(241,221,106,1.00)',
                                'rgba(255,143,127,1.00)',
                                'rgba(117,192,149,1.00)',
                            ],
                            type: 'bar'
                        }
                    ]
                };

                let graphTarget = $('#graphCanvas');
                let barGraph = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata
                })
            })
        }
    }
    </script>

</body>

</html>