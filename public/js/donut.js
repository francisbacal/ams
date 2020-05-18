// DONUT

$(function () {

    $.get('get-stocks/', function (data) {
        // let datas = jQuery.parseJSON(data)
        let labels = data[0];
        let total = data[1];




        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: labels,
            datasets: [{
                data: total,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
});
