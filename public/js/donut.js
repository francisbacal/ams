// DONUT

$(function () {
    if (window.location.href.indexOf("tree-view") > -1) {
        $.get('get-stocks/', function (data) {
            // let datas = jQuery.parseJSON(data)
            let labels = data[0];
            let total = data[1];
            let colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
                '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
                '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
                '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
                '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
                '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
                '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
                '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
            ];
            let dataColor = [];

            console.log(labels.length);
            let x = labels.length;
            let i = colorArray.length;

            for (let a = 0; a < x; a++) {

                //draw random integer from 1 - x
                let randomInt = (Math.floor(Math.random() * Math.floor(i--)));

                dataColor.push(colorArray[randomInt]);

                dataColor.splice(randomInt, 1);

            }


            let donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            let donutData = {
                labels: labels,
                datasets: [{
                    data: total,
                    backgroundColor: dataColor,
                }]
            }
            let donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            let donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

        })
    }
});
