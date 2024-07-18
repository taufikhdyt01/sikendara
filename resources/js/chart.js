import ApexCharts from "apexcharts";

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("vehicle-usage-chart")) {
        const monthlyUsage = JSON.parse(
            document.getElementById("vehicle-usage-chart").dataset.monthlyUsage
        );

        const options = {
            colors: ["#1A56DB"],
            series: [
                {
                    name: "Pemakaian",
                    data: Object.values(monthlyUsage),
                },
            ],
            chart: {
                type: "bar",
                height: 400,
                fontFamily: "Inter, sans-serif",
                foreColor: "#4B5563",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%",
                    borderRadius: 4,
                },
            },
            tooltip: {
                shared: false,
                intersect: false,
                style: {
                    fontSize: "14px",
                    fontFamily: "Inter, sans-serif",
                },
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            grid: {
                show: true,
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                labels: {
                    show: true,
                },
                axisBorder: {
                    show: true,
                },
                axisTicks: {
                    show: true,
                },
            },
            yaxis: {
                show: true,
            },
            fill: {
                opacity: 1,
            },
        };

        const chart = new ApexCharts(
            document.getElementById("vehicle-usage-chart"),
            options
        );
        chart.render();
    }
});
