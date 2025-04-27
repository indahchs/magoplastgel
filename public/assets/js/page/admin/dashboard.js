// "use strict";

function fetchData(url) {
    return fetch(url)
        .then(response => response.json())
        .then(data => {
            return {
                labels: data.data.labels,
                totals: data.data.data
            };
        })
        .catch(error => console.error('Error fetching data:', error));
}

var ctx = document.getElementById('orderChart').getContext('2d');
var orderChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [], // Tanggal
        datasets: [{
            label: 'Total penjualan',
            data: [], // Total pesanan
            borderWidth: 5,
            borderColor: '#348e38',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#348e38',
            pointRadius: 4
        }]
    },
    options: {
        legend: {
        display: false
        },
        scales: {
        yAxes: [{
            gridLines: {
                display: false,
                drawBorder: false,
            },
            ticks: {
                stepSize: 2
            }
        }],
        xAxes: [{
            gridLines: {
                color: '#fbfbfb',
                lineWidth: 2
            }
        }]
        },
    }
});

function updateChart(labels, data) {
    orderChart.data.labels = labels;  // Ganti label (tanggal)
    orderChart.data.datasets[0].data = data;  // Ganti data (jumlah pesanan)
    orderChart.update();  // Perbarui chart dengan data baru
}

$('#week-chart').on('click', function(){
    fetchData('/dashboard/chart/week').then(data => {
        updateChart(data.labels, data.totals);
    });
});

$('#month-chart').on('click', function(){
    fetchData('/dashboard/chart/month').then(data => {
        updateChart(data.labels, data.totals);
    });
});

window.onload = function() {
    fetchData('/dashboard/chart/week').then(data => {
        updateChart(data.labels, data.totals);
        
    });
};