<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Services</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/pdf-viewer.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #1e293b;
            color: #fff;
            position: relative;
            overflow-x: hidden;
        }

        .bg-image {
            background-image: url('/img/dashboardbg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            width: 100%;
            position: relative;
        }

        .bg-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 50% 50%, 
                    rgba(30, 41, 59, 0.1) 0%, 
                    transparent 50%
                ),
                radial-gradient(circle at 80% 20%, 
                    rgba(30, 41, 59, 0.1) 0%, 
                    transparent 50%
                );
            animation: pulse 10s ease-in-out infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Navigation Styles */
        .nav-container {
            position: fixed;
            top: 0;
            right: 0;
            padding: 1rem 2rem;
            z-index: 1000;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #60a5fa;
        }

        /* Tech Heading Styles */
        .tech-heading {
            font-family: 'Inter', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tech-heading::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            animation: glowing 20s linear infinite;
            border-radius: 12px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .tech-heading:hover::before {
            opacity: 1;
        }

        .tech-heading::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 10px;
            padding: 2px;
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            background-size: 400%;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            animation: glowing 20s linear infinite;
        }

        @keyframes glowing {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        .tech-heading-container {
            position: relative;
            padding: 1rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tech-heading-container::before,
        .tech-heading-container::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            background: white;
            opacity: 0.5;
        }

        .tech-heading-container::before {
            left: 0;
            transform: translateX(-100%);
        }

        .tech-heading-container::after {
            right: 0;
            transform: translateX(100%);
        }

        .tech-heading:hover {
            transform: scale(1.05);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .tech-heading:focus {
            outline: none;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.5);
        }

        /* Main Content Styles */
        .main-content {
            padding-top: 80px;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .page-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #fff;
            position: relative;
            padding-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
            animation: titleGlow 2s ease-in-out infinite alternate;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #00ff00, transparent);
            animation: borderGlow 2s ease-in-out infinite alternate;
        }

        @keyframes borderGlow {
            0% {
                box-shadow: 0 0 5px rgba(0, 255, 0, 0.3);
            }
            100% {
                box-shadow: 0 0 10px rgba(0, 255, 0, 0.6),
                            0 0 20px rgba(0, 255, 0, 0.4);
            }
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: slideIn 0.5s ease-out forwards;
            cursor: pointer;
        }

        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: rgba(0, 255, 0, 0.3);
        }

        .service-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            background: rgba(0, 0, 0, 0.2);
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .service-card:hover .service-image {
            border-color: rgba(0, 255, 0, 0.3);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
        }

        .service-card:hover .service-image img {
            transform: scale(1.1);
            border-color: rgba(0, 255, 0, 0.3);
        }

        .service-content {
            padding: 1.5rem;
        }

        .service-title {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .service-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #00ff00, transparent);
            transition: width 0.3s ease;
        }

        .service-card:hover .service-title::after {
            width: 100px;
        }

        .service-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            line-height: 1.5;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Service Modal Styles */
        .service-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .service-modal.active {
            display: flex;
            opacity: 1;
        }

        .service-modal-content {
            position: relative;
            width: 90%;
            max-width: 1000px;
            margin: 2rem auto;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            overflow: hidden;
            transform: scale(0.9);
            transition: transform 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 1000;
            padding: 1rem;
        }

        .service-modal.active .service-modal-content {
            transform: scale(1);
        }

        .service-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 0, 0, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            transition: all 0.3s ease;
            z-index: 1001;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .service-modal-close:hover {
            background: rgba(255, 0, 0, 0.7);
            border-color: white;
            transform: rotate(90deg);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
        }

        .service-modal-image {
            width: 100%;
            height: 60vh;
            overflow: hidden;
            position: relative;
            margin: 1rem 0;
            border-radius: 0.5rem;
            background: rgba(0, 0, 0, 0.3);
            padding: 1rem;
        }

        .service-modal-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0.25rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .service-modal-info {
            padding: 2rem;
            color: white;
            margin-top: 1rem;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
        }

        .service-modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: white;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .service-modal-description {
            font-size: 1rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .service-modal-content {
                width: 95%;
                margin: 1rem auto;
                padding: 0.5rem;
            }

            .service-modal-image {
                height: 50vh;
                margin: 0.5rem 0;
                padding: 0.5rem;
            }

            .service-modal-info {
                padding: 1rem;
            }
        }

        /* PDF Viewer Modal Styles */
        .pdf-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            overflow: hidden;
            backdrop-filter: blur(8px);
        }

        .pdf-modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-out;
        }

        .pdf-container {
            width: 70%;
            height: 70%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.95);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .pdf-modal.active .pdf-container {
            transform: translate(-50%, -50%) scale(1);
        }

        .pdf-close {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            z-index: 10000;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .pdf-close:hover {
            background: rgba(255, 0, 0, 0.7);
            border-color: white;
            transform: rotate(90deg);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
        }

        #pdfViewer {
            width: 100%;
            height: 100%;
            border: none;
            background: white;
            display: block;
            margin: 0 auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            .pdf-container {
                width: 90%;
                height: 80%;
            }
            .pdf-close {
                top: 15px;
                right: 15px;
                width: 35px;
                height: 35px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <!-- Navigation -->
        <nav class="nav-container">
            <div class="nav-links">
                <a href="dashboard" class="nav-link">Home</a>
                <a href="service" class="nav-link">Services</a>
                <a href="contact" class="nav-link">Contact</a>
                <a id="resumeLink" href="javascript:void(0)" onclick="openPdfModal('/pdf/Resume_2025.pdf')" class="nav-link">
                    CV
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline" id="logoutForm">
                    @csrf
                    <button type="button" onclick="confirmLogout()" class="nav-link" style="background: none; border: none; cursor: pointer;">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="tech-heading-container">
                    <h2 class="tech-heading" tabindex="0">My Services</h2>
                </div>
                
                <div class="services-grid">
                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s1.jpg') }}" alt="Network Troubleshooting" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">Network Troubleshooting</h2>
                            <p class="service-description">Professional network troubleshooting services to identify and resolve connectivity issues, optimize network performance, and ensure your network infrastructure runs smoothly.</p>
                        </div>
                    </div>

                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s2.jpg') }}" alt="PC Troubleshooting" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">PC Troubleshooting</h2>
                            <p class="service-description">Expert personal computer troubleshooting services to diagnose and fix hardware and software issues, ensuring your PC operates at peak performance.</p>
                        </div>
                    </div>

                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s3.jpg') }}" alt="Development Services" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">Development Services</h2>
                            <p class="service-description">Comprehensive development services for desktop applications, mobile apps, and web projects, delivering custom solutions tailored to your needs.</p>
                        </div>
                    </div>

                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s4.jpg') }}" alt="System Quality Check" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">System Quality Check</h2>
                            <p class="service-description">Thorough system quality assessment and testing to ensure optimal performance, security, and reliability of your systems.</p>
                        </div>
                    </div>

                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s5.jpg') }}" alt="Laptop Repair" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">Laptop Repair</h2>
                            <p class="service-description">Professional laptop repair services for all makes and models, addressing hardware issues, screen repairs, and performance optimization.</p>
                        </div>
                    </div>

                    <div class="service-card" onclick="openServiceModal(this)">
                        <div class="service-image">
                            <img src="{{ asset('img/s6.jpg') }}" alt="System Unit Repair" class="service-img">
                        </div>
                        <div class="service-content">
                            <h2 class="service-title">System Unit Repair</h2>
                            <p class="service-description">Expert system unit repair services, including component replacement, hardware upgrades, and performance optimization for desktop computers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Modal -->
    <div id="serviceModal" class="service-modal">
        <div class="service-modal-content">
            <button class="service-modal-close" onclick="closeServiceModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="service-modal-image">
                <img id="modalImage" src="" alt="Service">
            </div>
            <div class="service-modal-info">
                <h3 id="modalTitle" class="service-modal-title"></h3>
                <p id="modalDescription" class="service-modal-description"></p>
            </div>
        </div>
    </div>

    <!-- PDF Viewer Modal -->
    <div id="pdfModal" class="pdf-modal">
        <button class="pdf-close" onclick="closePdfModal()">&times;</button>
        <div class="pdf-container">
            <iframe id="pdfViewer" src="" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        function openPdfModal(pdfUrl) {
            const modal = document.getElementById('pdfModal');
            const viewer = document.getElementById('pdfViewer');
            viewer.src = pdfUrl;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePdfModal() {
            const modal = document.getElementById('pdfModal');
            const viewer = document.getElementById('pdfViewer');
            modal.classList.remove('active');
            viewer.src = '';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside the PDF container
        document.getElementById('pdfModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePdfModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePdfModal();
            }
        });

        function confirmLogout() {
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>
</html>
