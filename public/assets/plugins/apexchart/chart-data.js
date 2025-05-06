if ($('#apexcharts-area').length > 0) {
    var options = {
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "smooth"
        },
        series: [{
            name: "Total Payments",
            data: totals
        }],
        xaxis: {
            categories: months
        }
    };

    var chart = new ApexCharts(
        document.querySelector("#apexcharts-area"),
        options
    );
    chart.render();
}
