
        <div class="hello">
            <h1>Chào mừng bạn đến với trang quản trị</h1>
            <p>Tại đây bạn có thể thực hiện mọi thứ.</p>
            <div class="overview">
                <!--  -->
                <div class="stat-box">Tổng Số Người Dùng: </div>
                <div class="stat-box">Tổng Số Sản Phẩm: </div>
                <div class="stat-box">Tổng Doanh Thu: 1 tỷ</div>
            </div>
        </div>
        <div class="chart">
            <h2>Biểu đồ doanh thu bán hàng trong tháng</h2>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </main>
    <script>
        // Dữ liệu mẫu cho biểu đồ doanh số bán hàng trong 12 tháng
        const salesData = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh số bán hàng',
                data: [150, 200, 180, 220, 240, 300, 270, 310, 280, 330, 350, 400],
                borderColor: '#3e95cd',
                backgroundColor: 'rgba(62, 149, 205, 0.2)', // Màu nền dưới đường
                borderWidth: 2,
                pointRadius: 4, // Đường kính của điểm
                pointBackgroundColor: '#3e95cd', // Màu nền của điểm
                pointBorderColor: '#ffffff', // Màu viền của điểm
                lineTension: 0.4, // Làm mịn đường nối
                fill: true,
            }]
        };

        // Cấu hình cho biểu đồ
        const config = {
            type: 'line',
            data: salesData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#333333', // Màu chữ của nhãn trục X
                        },
                        grid: {
                            color: '#e0e0e0', // Màu của lưới trục X
                        }
                    },
                    y: {
                        ticks: {
                            color: '#333333', // Màu chữ của nhãn trục Y
                        },
                        grid: {
                            color: '#e0e0e0', // Màu của lưới trục Y
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Ẩn chú thích
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)', // Màu nền của tooltip
                        titleColor: '#ffffff', // Màu chữ của tiêu đề tooltip
                        bodyColor: '#ffffff', // Màu chữ của nội dung tooltip
                        mode: 'index', // Hiển thị tooltip khi trỏ vào từng dữ liệu
                        intersect: false // Tắt hiển thị tooltip khi trỏ vào vùng nền dưới đường
                    },
                    title: {
                        display: true,
                        text: 'Doanh số bán hàng',
                        color: '#333333',
                        font: {
                            size: 20,
                            weight: 'bold'
                        },
                        padding: {
                            top: 10,
                            bottom: 20
                        }
                    }
                }
            }
        };

        // Khởi tạo biểu đồ
        const salesChart = new Chart(
            document.getElementById('salesChart'),
            config
        );
    </script>