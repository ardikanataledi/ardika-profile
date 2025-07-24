<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web3 Jobs Portal - Otta Project</title>
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border: 3px solid #4ecdc4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #4ecdc4;
            font-size: 20px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: #4ecdc4;
            color: white;
        }

        .btn-primary:hover {
            background: #45b7aa;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: #4ecdc4;
            border: 2px solid #4ecdc4;
        }

        .btn-secondary:hover {
            background: #4ecdc4;
            color: white;
        }

        /* Search Section */
        .search-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .search-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .search-filters {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-weight: 600;
            color: #555;
        }

        .filter-group select,
        .filter-group input {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            outline: none;
            border-color: #4ecdc4;
        }

        /* Job Cards */
        .jobs-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }

        .job-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #4ecdc4;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .job-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .job-company {
            color: #4ecdc4;
            font-weight: 600;
        }

        .job-category {
            background: #4ecdc4;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .job-details {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .job-detail {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
            font-size: 14px;
        }

        .job-salary {
            font-size: 18px;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 15px;
        }

        .job-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .job-actions {
            display: flex;
            gap: 10px;
        }

        .btn-apply {
            background: #4ecdc4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            flex: 1;
        }

        .btn-apply:hover {
            background: #45b7aa;
        }

        .btn-details {
            background: transparent;
            color: #4ecdc4;
            border: 2px solid #4ecdc4;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: #4ecdc4;
            color: white;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .close {
            font-size: 30px;
            cursor: pointer;
            color: #999;
        }

        .close:hover {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4ecdc4;
        }

        .user-info {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #4ecdc4;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 15px;
            }

            .search-filters {
                grid-template-columns: 1fr;
            }

            .jobs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="nav">
                <div class="logo">
                    <div class="logo-icon">$</div>
                    <div class="logo-text">Web3 Jobs Portal</div>
                </div>
                <div class="auth-buttons">
                    <button class="btn btn-secondary" onclick="showLogin()">Login</button>
                    <button class="btn btn-primary" onclick="showRegister()">Register</button>
                </div>
            </div>
        </div>

        <!-- User Info (Hidden by default) -->
        <div class="user-info" id="userInfo">
            <div>Welcome, <span id="userName"></span>!</div>
            <button class="btn btn-secondary" onclick="logout()" style="margin-top: 10px;">Logout</button>
        </div>

        <!-- Stats -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number" id="totalJobs">156</div>
                <div class="stat-label">Total Jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="web3Jobs">89</div>
                <div class="stat-label">Web3 Jobs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="companies">45</div>
                <div class="stat-label">Companies</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="locations">6</div>
                <div class="stat-label">Locations</div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-title">Find Your Dream Web3 Job</div>
            <div class="search-filters">
                <div class="filter-group">
                    <label>Search by Skill/Keyword</label>
                    <input type="text" id="searchKeyword" placeholder="e.g., Smart Contract, DeFi, React">
                </div>
                <div class="filter-group">
                    <label>Category</label>
                    <select id="categoryFilter">
                        <option value="">All Categories</option>
                        <option value="Administrasi & Keuangan">Administrasi & Keuangan</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Layanan Pelanggan">Layanan Pelanggan</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Web3 Specialization</label>
                    <select id="web3Filter">
                        <option value="">All Web3</option>
                        <option value="DeFi">DeFi</option>
                        <option value="NFT">NFT</option>
                        <option value="Smart Contract">Smart Contract</option>
                        <option value="Blockchain">Blockchain</option>
                        <option value="System Development">System Development</option>
                        <option value="DeFi Marketing">DeFi Marketing</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Location</label>
                    <select id="locationFilter">
                        <option value="">All Locations</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bali">Bali</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Papua">Papua</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Education Level</label>
                    <select id="educationFilter">
                        <option value="">All Levels</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Salary Range</label>
                    <select id="salaryFilter">
                        <option value="">All Salaries</option>
                        <option value="5000000-7000000">Rp 5-7 Juta</option>
                        <option value="7000000-10000000">Rp 7-10 Juta</option>
                        <option value="10000000-15000000">Rp 10-15 Juta</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" onclick="searchJobs()">Search Jobs</button>
        </div>

        <!-- Jobs Section -->
        <div class="jobs-section">
            <div id="jobsGrid" class="jobs-grid"></div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Login</div>
                <span class="close" onclick="closeModal('loginModal')">&times;</span>
            </div>
            <form id="loginForm">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="loginEmail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="loginPassword" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Register</div>
                <span class="close" onclick="closeModal('registerModal')">&times;</span>
            </div>
            <form id="registerForm">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" id="registerName" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="registerEmail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="registerPassword" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="registerConfirmPassword" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
            </form>
        </div>
    </div>

    <!-- Job Detail Modal -->
    <div id="jobDetailModal" class="modal">
        <div class="modal-content" style="max-width: 700px;">
            <div class="modal-header">
                <div class="modal-title">Job Details</div>
                <span class="close" onclick="closeModal('jobDetailModal')">&times;</span>
            </div>
            <div id="jobDetailContent"></div>
        </div>
    </div>

    <script>
        // Database Simulation
        const users = [];
        let currentUser = null;
        
        const jobsDatabase = [
            {
                id: 1,
                title: "Smart Contract Developer",
                company: "DeFi Labs Indonesia",
                category: "Teknologi Informasi",
                web3Specialization: "Smart Contract",
                location: "Jakarta",
                education: "S1",
                major: "Semua Jurusan",
                salary: "8000000-12000000",
                description: "Develop and audit smart contracts for DeFi protocols. Experience with Solidity, Web3.js, and Ethereum ecosystem required.",
                jobdesk: "- Develop smart contracts using Solidity\n- Audit existing contracts for security vulnerabilities\n- Integrate smart contracts with frontend applications\n- Collaborate with blockchain architects\n- Write comprehensive tests",
                requirements: "- S1 degree in Computer Science or related field\n- 2+ years experience in blockchain development\n- Proficient in Solidity and Web3 technologies\n- Experience with Hardhat/Truffle framework",
                applyLink: "https://defilabs.id/careers/smart-contract-dev"
            },
            {
                id: 2,
                title: "DeFi Marketing Specialist",
                company: "Crypto Marketing Pro",
                category: "Pemasaran",
                web3Specialization: "DeFi Marketing",
                location: "Bali",
                education: "S1",
                major: "Semua Jurusan",
                salary: "6000000-9000000",
                description: "Lead marketing campaigns for DeFi products. Create content strategy and manage community engagement.",
                jobdesk: "- Develop marketing strategies for DeFi products\n- Create engaging content for social media\n- Manage community across multiple platforms\n- Analyze marketing metrics and ROI\n- Collaborate with product teams",
                requirements: "- S1 degree in Marketing or Communications\n- Understanding of DeFi ecosystem\n- Experience with social media marketing\n- Strong analytical skills",
                applyLink: "https://cryptomarketingpro.com/careers/defi-marketing"
            },
            {
                id: 3,
                title: "NFT Community Manager",
                company: "Digital Art Collective",
                category: "Layanan Pelanggan",
                web3Specialization: "NFT",
                location: "Surabaya",
                education: "D3",
                major: "Semua Jurusan",
                salary: "5000000-7000000",
                description: "Manage NFT community, engage with collectors, and coordinate marketing activities.",
                jobdesk: "- Manage Discord and Telegram communities\n- Engage with NFT collectors and creators\n- Coordinate marketing campaigns\n- Handle customer support\n- Organize community events",
                requirements: "- D3 degree minimum\n- Experience with Discord and social media\n- Understanding of NFT ecosystem\n- Excellent communication skills",
                applyLink: "https://digitalartcollective.com/jobs/community-manager"
            },
            {
                id: 4,
                title: "Blockchain Financial Analyst",
                company: "Crypto Finance Solutions",
                category: "Administrasi & Keuangan",
                web3Specialization: "DeFi",
                location: "Jakarta",
                education: "S1",
                major: "Semua Jurusan",
                salary: "7000000-10000000",
                description: "Analyze DeFi protocols, assess financial risks, and provide investment recommendations.",
                jobdesk: "- Analyze DeFi protocol tokenomics\n- Assess financial risks and opportunities\n- Prepare investment reports\n- Monitor market trends\n- Collaborate with investment team",
                requirements: "- S1 degree in Finance or Economics\n- Understanding of DeFi protocols\n- Strong analytical skills\n- Experience with financial modeling",
                applyLink: "https://cryptofinancesolutions.com/careers/analyst"
            },
            {
                id: 5,
                title: "Web3 Full Stack Developer",
                company: "Blockchain Innovations",
                category: "Teknologi Informasi",
                web3Specialization: "System Development",
                location: "Bandung",
                education: "S1",
                major: "Semua Jurusan",
                salary: "9000000-15000000",
                description: "Build decentralized applications and integrate blockchain technologies with traditional systems.",
                jobdesk: "- Develop full-stack dApps\n- Integrate blockchain with existing systems\n- Build user-friendly interfaces\n- Implement wallet connections\n- Optimize for performance and security",
                requirements: "- S1 degree in Computer Science\n- Experience with React, Node.js, Web3.js\n- Understanding of blockchain architecture\n- Portfolio of dApp projects",
                applyLink: "https://blockchaininnovations.com/jobs/fullstack-dev"
            },
            {
                id: 6,
                title: "Crypto Customer Support Lead",
                company: "Digital Wallet Indonesia",
                category: "Layanan Pelanggan",
                web3Specialization: "Blockchain",
                location: "Sumatera Utara",
                education: "D3",
                major: "Semua Jurusan",
                salary: "5500000-8000000",
                description: "Lead customer support team for crypto wallet application. Handle complex technical issues.",
                jobdesk: "- Lead customer support team\n- Handle escalated technical issues\n- Create support documentation\n- Train new support staff\n- Improve customer satisfaction metrics",
                requirements: "- D3 degree minimum\n- Experience in customer support\n- Understanding of cryptocurrency and wallets\n- Leadership skills",
                applyLink: "https://digitalwallet.id/careers/support-lead"
            },
            {
                id: 7,
                title: "DeFi Product Marketing Manager",
                company: "Yield Farming Co",
                category: "Pemasaran",
                web3Specialization: "DeFi Marketing",
                location: "Jakarta",
                education: "S1",
                major: "Semua Jurusan",
                salary: "8000000-12000000",
                description: "Drive product marketing strategy for DeFi yield farming platform. Focus on user acquisition and retention.",
                jobdesk: "- Develop product marketing strategies\n- Create go-to-market plans\n- Manage product launches\n- Analyze user behavior and metrics\n- Collaborate with product and dev teams",
                requirements: "- S1 degree in Marketing or Business\n- Experience with DeFi products\n- Strong analytical skills\n- Product marketing experience",
                applyLink: "https://yieldfarming.co/careers/product-marketing"
            },
            {
                id: 8,
                title: "Blockchain System Administrator",
                company: "Node Infrastructure",
                category: "Teknologi Informasi",
                web3Specialization: "Blockchain",
                location: "Papua",
                education: "S1",
                major: "Semua Jurusan",
                salary: "7000000-10000000",
                description: "Maintain blockchain node infrastructure and ensure high availability of decentralized systems.",
                jobdesk: "- Maintain blockchain node infrastructure\n- Monitor network performance\n- Implement security protocols\n- Troubleshoot technical issues\n- Optimize system performance",
                requirements: "- S1 degree in IT or related field\n- Experience with Linux and cloud platforms\n- Understanding of blockchain networks\n- DevOps experience preferred",
                applyLink: "https://nodeinfrastructure.com/jobs/sysadmin"
            }
        ];

        let filteredJobs = [...jobsDatabase];

        // Authentication Functions
        function showLogin() {
            document.getElementById('loginModal').style.display = 'block';
        }

        function showRegister() {
            document.getElementById('registerModal').style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function login(email, password) {
            const user = users.find(u => u.email === email && u.password === password);
            if (user) {
                currentUser = user;
                updateUI();
                closeModal('loginModal');
                alert('Login successful!');
            } else {
                alert('Invalid email or password');
            }
        }

        function register(name, email, password, confirmPassword) {
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }
            
            if (users.find(u => u.email === email)) {
                alert('Email already registered');
                return;
            }

            const newUser = {
                id: users.length + 1,
                name,
                email,
                password,
                registeredAt: new Date()
            };
            
            users.push(newUser);
            currentUser = newUser;
            updateUI();
            closeModal('registerModal');
            alert('Registration successful!');
        }

        function logout() {
            currentUser = null;
            updateUI();
        }

        function updateUI() {
            const authButtons = document.querySelector('.auth-buttons');
            const userInfo = document.getElementById('userInfo');
            
            if (currentUser) {
                authButtons.style.display = 'none';
                userInfo.style.display = 'block';
                document.getElementById('userName').textContent = currentUser.name;
            } else {
                authButtons.style.display = 'flex';
                userInfo.style.display = 'none';
            }
        }

        // Job Functions
        function searchJobs() {
            const keyword = document.getElementById('searchKeyword').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value;
            const web3 = document.getElementById('web3Filter').value;
            const location = document.getElementById('locationFilter').value;
            const education = document.getElementById('educationFilter').value;
            const salary = document.getElementById('salaryFilter').value;

            filteredJobs = jobsDatabase.filter(job => {
                const matchesKeyword = !keyword || 
                    job.title.toLowerCase().includes(keyword) ||
                    job.web3Specialization.toLowerCase().includes(keyword) ||
                    job.description.toLowerCase().includes(keyword);
                
                const matchesCategory = !category || job.category === category;
                const matchesWeb3 = !web3 || job.web3Specialization === web3;
                const matchesLocation = !location || job.location === location;
                const matchesEducation = !education || job.education === education;
                const matchesSalary = !salary || job.salary.includes(salary.split('-')[0]);

                return matchesKeyword && matchesCategory && matchesWeb3 && 
                       matchesLocation && matchesEducation && matchesSalary;
            });

            displayJobs();
        }

        function displayJobs() {
            const jobsGrid = document.getElementById('jobsGrid');
            
            if (filteredJobs.length === 0) {
                jobsGrid.innerHTML = '<p style="text-align: center; color: #666; font-size: 18px;">No jobs found matching your criteria.</p>';
                return;
            }

            jobsGrid.innerHTML = filteredJobs.map(job => `
                <div class="job-card">
                    <div class="job-header">
                        <div>
                            <div class="job-title">${job.title}</div>
                            <div class="job-company">${job.company}</div>
                        </div>
                        <div class="job-category">${job.web3Specialization}</div>
                    </div>
                    <div class="job-details">
                        <div class="job-detail">📍 ${job.location}</div>
                        <div class="job-detail">🎓 ${job.education}</div>
                        <div class="job-detail">💼 ${job.category}</div>
                    </div>
                    <div class="job-salary">Rp ${formatSalary(job.salary)}</div>
                    <div class="job-description">${job.description}</div>
                    <div class="job-actions">
                        <button class="btn-details" onclick="showJobDetails(${job.id})">View Details</button>
                        