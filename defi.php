<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeFi School Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header h1 {
            color: white;
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1em;
        }

        .wallet-status {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 15px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .wallet-info {
            color: white;
            font-weight: bold;
        }

        .connect-btn {
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .connect-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .card h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-content {
            color: rgba(255, 255, 255, 0.9);
        }

        .student-item, .teacher-item, .grade-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid #ffa500;
        }

        .student-item h3, .teacher-item h3, .grade-item h3 {
            color: white;
            margin-bottom: 5px;
        }

        .student-item p, .teacher-item p, .grade-item p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3px;
        }

        .blockchain-hash {
            font-family: monospace;
            font-size: 0.8em;
            color: #ffa500;
            margin-top: 5px;
        }

        .action-btn {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 205, 196, 0.4);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #ffa500;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9em;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: white;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .loading {
            text-align: center;
            color: white;
            padding: 20px;
        }

        .icon {
            font-size: 1.2em;
            margin-right: 8px;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏫 DeFi School Management System</h1>
            <p>Sistem Manajemen Sekolah Berbasis Blockchain Web3</p>
            
            <div class="wallet-status">
                <div class="wallet-info">
                    <span id="wallet-status">Wallet Status: Tidak Terhubung</span>
                </div>
                <button class="connect-btn" onclick="connectWallet()">Connect Wallet</button>
            </div>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">150</div>
                <div class="stat-label">Total Siswa</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">25</div>
                <div class="stat-label">Guru & Staff</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">12</div>
                <div class="stat-label">Kelas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <div class="stat-label">Data Integrity</div>
            </div>
        </div>

        <div class="dashboard">
            <!-- Student Data Card -->
            <div class="card">
                <h2><span class="icon">👨‍🎓</span>Data Siswa</h2>
                <div class="card-content">
                    <div class="form-group">
                        <label>Cari Siswa:</label>
                        <input type="text" placeholder="Masukkan NISN atau Nama" id="student-search">
                    </div>
                    <button class="action-btn" onclick="searchStudent()">Cari Data</button>
                    <button class="action-btn" onclick="addStudent()">Tambah Siswa</button>
                    
                    <div id="student-results">
                        <div class="student-item">
                            <h3>Ahmad Fauzi</h3>
                            <p>NISN: 001234567890</p>
                            <p>Kelas: XII IPA 1</p>
                            <p>Status: Aktif</p>
                            <div class="blockchain-hash">Hash: 0x4a7b...8c9d</div>
                        </div>
                        <div class="student-item">
                            <h3>Siti Rahma</h3>
                            <p>NISN: 001234567891</p>
                            <p>Kelas: XII IPS 2</p>
                            <p>Status: Aktif</p>
                            <div class="blockchain-hash">Hash: 0x2e5f...1a3b</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grades Card -->
            <div class="card">
                <h2><span class="icon">📊</span>Nilai Siswa</h2>
                <div class="card-content">
                    <div class="form-group">
                        <label>Pilih Siswa:</label>
                        <select id="student-select">
                            <option>Ahmad Fauzi - XII IPA 1</option>
                            <option>Siti Rahma - XII IPS 2</option>
                            <option>Budi Santoso - XI IPA 3</option>
                        </select>
                    </div>
                    <button class="action-btn" onclick="viewGrades()">Lihat Nilai</button>
                    <button class="action-btn" onclick="addGrade()">Input Nilai</button>
                    
                    <div id="grade-results">
                        <div class="grade-item">
                            <h3>Matematika</h3>
                            <p>Nilai: 88</p>
                            <p>Semester: Ganjil 2024</p>
                            <p>Verified: ✅</p>
                            <div class="blockchain-hash">Hash: 0x7c8d...4e5f</div>
                        </div>
                        <div class="grade-item">
                            <h3>Fisika</h3>
                            <p>Nilai: 92</p>
                            <p>Semester: Ganjil 2024</p>
                            <p>Verified: ✅</p>
                            <div class="blockchain-hash">Hash: 0x9f1a...6b7c</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teacher Performance Card -->
            <div class="card">
                <h2><span class="icon">👩‍🏫</span>Kinerja Guru & Staff</h2>
                <div class="card-content">
                    <div class="form-group">
                        <label>Pilih Periode:</label>
                        <select id="period-select">
                            <option>Semester Ganjil 2024</option>
                            <option>Semester Genap 2024</option>
                            <option>Tahun Ajaran 2024/2025</option>
                        </select>
                    </div>
                    <button class="action-btn" onclick="viewPerformance()">Lihat Laporan</button>
                    <button class="action-btn" onclick="addEvaluation()">Input Evaluasi</button>
                    
                    <div id="performance-results">
                        <div class="teacher-item">
                            <h3>Drs. Bambang Suharto</h3>
                            <p>Mata Pelajaran: Matematika</p>
                            <p>Rating: 4.8/5.0</p>
                            <p>Kehadiran: 98%</p>
                            <div class="blockchain-hash">Hash: 0x3d4e...9a1b</div>
                        </div>
                        <div class="teacher-item">
                            <h3>Sri Mulyani, S.Pd</h3>
                            <p>Mata Pelajaran: Bahasa Indonesia</p>
                            <p>Rating: 4.9/5.0</p>
                            <p>Kehadiran: 100%</p>
                            <div class="blockchain-hash">Hash: 0x8e7f...2c3d</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blockchain Status Card -->
            <div class="card">
                <h2><span class="icon">🔗</span>Status Blockchain</h2>
                <div class="card-content">
                    <div class="student-item">
                        <h3>Network Status</h3>
                        <p>Status: <span style="color: #4ecdc4;">●</span> Connected</p>
                        <p>Block Height: 1,234,567</p>
                        <p>Gas Price: 25 Gwei</p>
                        <p>TPS: 15 transaksi/detik</p>
                    </div>
                    <div class="student-item">
                        <h3>Smart Contract</h3>
                        <p>Address: 0x1234...5678</p>
                        <p>Version: v2.1.0</p>
                        <p>Last Updated: 2024-01-15</p>
                        <p>Verified: ✅</p>
                    </div>
                    <button class="action-btn" onclick="syncData()">Sync Data</button>
                    <button class="action-btn" onclick="validateContract()">Validate Contract</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let walletConnected = false;
        let currentAccount = null;

        // Wallet Connection
        async function connectWallet() {
            try {
                const button = document.querySelector('.connect-btn');
                const status = document.getElementById('wallet-status');
                
                button.textContent = 'Connecting...';
                button.disabled = true;
                
                // Simulate wallet connection
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                walletConnected = true;
                currentAccount = '0x' + Math.random().toString(16).substr(2, 40);
                
                status.textContent = `Connected: ${currentAccount.substr(0, 6)}...${currentAccount.substr(-4)}`;
                button.textContent = 'Disconnect';
                button.disabled = false;
                
                showNotification('Wallet berhasil terhubung!', 'success');
                
            } catch (error) {
                showNotification('Gagal menghubungkan wallet', 'error');
                document.querySelector('.connect-btn').textContent = 'Connect Wallet';
                document.querySelector('.connect-btn').disabled = false;
            }
        }

        // Search Student
        function searchStudent() {
            const searchTerm = document.getElementById('student-search').value;
            const results = document.getElementById('student-results');
            
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            if (!searchTerm) {
                showNotification('Masukkan NISN atau nama siswa', 'warning');
                return;
            }
            
            results.innerHTML = '<div class="loading pulse">Mencari data di blockchain...</div>';
            
            setTimeout(() => {
                results.innerHTML = `
                    <div class="student-item">
                        <h3>Hasil Pencarian: ${searchTerm}</h3>
                        <p>NISN: 001234567892</p>
                        <p>Kelas: XI IPA 2</p>
                        <p>Status: Aktif</p>
                        <div class="blockchain-hash">Hash: 0x5f6a...7b8c</div>
                    </div>
                `;
                showNotification('Data siswa ditemukan', 'success');
            }, 1500);
        }

        // Add Student
        function addStudent() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            const nama = prompt('Nama Siswa:');
            const nisn = prompt('NISN:');
            const kelas = prompt('Kelas:');
            
            if (nama && nisn && kelas) {
                showNotification('Sedang menambahkan siswa ke blockchain...', 'info');
                
                setTimeout(() => {
                    const hash = '0x' + Math.random().toString(16).substr(2, 40);
                    showNotification(`Siswa ${nama} berhasil ditambahkan! Hash: ${hash.substr(0, 6)}...${hash.substr(-4)}`, 'success');
                }, 2000);
            }
        }

        // View Grades
        function viewGrades() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            const student = document.getElementById('student-select').value;
            const results = document.getElementById('grade-results');
            
            results.innerHTML = '<div class="loading pulse">Mengambil data nilai dari blockchain...</div>';
            
            setTimeout(() => {
                results.innerHTML = `
                    <div class="grade-item">
                        <h3>Kimia</h3>
                        <p>Nilai: 89</p>
                        <p>Semester: Ganjil 2024</p>
                        <p>Verified: ✅</p>
                        <div class="blockchain-hash">Hash: 0x8a9b...3c4d</div>
                    </div>
                    <div class="grade-item">
                        <h3>Biologi</h3>
                        <p>Nilai: 94</p>
                        <p>Semester: Ganjil 2024</p>
                        <p>Verified: ✅</p>
                        <div class="blockchain-hash">Hash: 0x5e6f...1a2b</div>
                    </div>
                `;
                showNotification('Data nilai berhasil dimuat', 'success');
            }, 1500);
        }

        // Add Grade
        function addGrade() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            const mataPelajaran = prompt('Mata Pelajaran:');
            const nilai = prompt('Nilai:');
            
            if (mataPelajaran && nilai) {
                showNotification('Sedang menyimpan nilai ke blockchain...', 'info');
                
                setTimeout(() => {
                    const hash = '0x' + Math.random().toString(16).substr(2, 40);
                    showNotification(`Nilai ${mataPelajaran} berhasil disimpan! Hash: ${hash.substr(0, 6)}...${hash.substr(-4)}`, 'success');
                }, 2000);
            }
        }

        // View Performance
        function viewPerformance() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            const period = document.getElementById('period-select').value;
            const results = document.getElementById('performance-results');
            
            results.innerHTML = '<div class="loading pulse">Mengambil data kinerja dari blockchain...</div>';
            
            setTimeout(() => {
                results.innerHTML = `
                    <div class="teacher-item">
                        <h3>Ahmad Hidayat, S.Pd</h3>
                        <p>Mata Pelajaran: Sejarah</p>
                        <p>Rating: 4.7/5.0</p>
                        <p>Kehadiran: 96%</p>
                        <div class="blockchain-hash">Hash: 0x6d7e...8f9a</div>
                    </div>
                    <div class="teacher-item">
                        <h3>Rina Sari, M.Pd</h3>
                        <p>Mata Pelajaran: Geografi</p>
                        <p>Rating: 4.8/5.0</p>
                        <p>Kehadiran: 99%</p>
                        <div class="blockchain-hash">Hash: 0x4b5c...2d3e</div>
                    </div>
                `;
                showNotification('Data kinerja berhasil dimuat', 'success');
            }, 1500);
        }

        // Add Evaluation
        function addEvaluation() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            const guru = prompt('Nama Guru:');
            const rating = prompt('Rating (1-5):');
            
            if (guru && rating) {
                showNotification('Sedang menyimpan evaluasi ke blockchain...', 'info');
                
                setTimeout(() => {
                    const hash = '0x' + Math.random().toString(16).substr(2, 40);
                    showNotification(`Evaluasi ${guru} berhasil disimpan! Hash: ${hash.substr(0, 6)}...${hash.substr(-4)}`, 'success');
                }, 2000);
            }
        }

        // Sync Data
        function syncData() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            showNotification('Sinkronisasi data dengan blockchain...', 'info');
            
            setTimeout(() => {
                showNotification('Data berhasil disinkronisasi', 'success');
            }, 3000);
        }

        // Validate Contract
        function validateContract() {
            if (!walletConnected) {
                showNotification('Silakan hubungkan wallet terlebih dahulu', 'warning');
                return;
            }
            
            showNotification('Memvalidasi smart contract...', 'info');
            
            setTimeout(() => {
                showNotification('Smart contract tervalidasi dengan sukses', 'success');
            }, 2000);
        }

        // Notification System
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#4ecdc4' : type === 'error' ? '#ff6b6b' : type === 'warning' ? '#ffa500' : '#667eea'};
                color: white;
                padding: 15px 20px;
                border-radius: 10px;
                z-index: 1000;
                font-weight: bold;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                animation: slideIn 0.5s ease;
            `;
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.5s ease';
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('Sistem DeFi School Management siap digunakan!', 'success');
        });
    </script>
</body>
</html>