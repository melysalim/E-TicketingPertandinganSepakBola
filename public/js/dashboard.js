// Konfigurasi Chart.js
const salesData = {
    labels: [],
    datasets: [
        {
            label: 'Total Tiket Terjual',
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 2,
            data: [],
        },
        {
            label: 'Total Penjualan (IDR)',
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2,
            data: [],
        },
    ],
};

const config = {
    type: 'bar',
    data: salesData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah' },
            },
            x: {
                title: { display: true, text: 'Bulan' },
            },
        },
        plugins: {
            legend: { display: true, position: 'top' },
        },
    },
};

const salesChart = new Chart(document.getElementById('salesChart'), config);

// Fetch data dari endpoint API
fetch('/admin/getSalesData')
    .then((response) => response.json())
    .then((data) => {
        const labels = data.map((item) => `Bulan ${item.bulan}`);
        const totalTiket = data.map((item) => item.total_tiket);
        const totalPenjualan = data.map((item) => item.total_penjualan);

        salesChart.data.labels = labels;
        salesChart.data.datasets[0].data = totalTiket;
        salesChart.data.datasets[1].data = totalPenjualan;
        salesChart.update();
    })
    .catch((error) => console.error('Error fetching sales data:', error));
