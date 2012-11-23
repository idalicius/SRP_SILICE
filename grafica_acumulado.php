<?php include_once("./data.tsv2.php"); ?>

<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            title: {
                text: 'Grafico total acumulado por tipo de arena'
            },
            xAxis: {
                categories: [ <?php echo $arenas; ?> ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
			
			credits: {
				text: 'Silice del Istmo',
				href: './'
			},	
			
            yAxis: {
                min: 0,
                title: {
                    text: 'Total (toneladas)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Acumulado total: '+ Highcharts.numberFormat(this.y, 1) +
                        ' toneladas';
                }
            },
            series: [{
                name: 'Toneladas',
                data: [ <?php echo $totales; ?> ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    
});
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
