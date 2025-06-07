<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="/css/pdf-viewer.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            padding-top: 80px;
        }
        .bg-image {
            background-image: url('/img/dashboardbg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            width: 100%;
        }
        .contact-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }
        .contact-card:hover::before {
            transform: translateX(100%);
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .contact-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .contact-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
            animation: shine 3s infinite;
        }
        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }
        .contact-card:hover .contact-icon {
            transform: scale(1.1) rotate(360deg);
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }
        .contact-form input,
        .contact-form textarea {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }
        .submit-button {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        .submit-button:hover::before {
            left: 100%;
        }
        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        /* PDF Viewer Styles */
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

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        .nav.hidden {
            transform: translateY(-100%);
        }

        .nav.visible {
            transform: translateY(0);
        }

        /* Add padding to body to prevent content from hiding under fixed nav */
        body {
            padding-top: 80px;
        }

        /* Simple white navigation links */
        .nav a {
            color: white;
            text-decoration: none;
        }

        .nav a:hover {
            color: white;
        }

        /* Google Maps Section Styles */
        .map-section {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 4rem auto;
            background: #000;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.15);
            border: 1px solid rgba(0, 255, 0, 0.2);
            overflow: hidden;
        }

        .map-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0, 255, 0, 0.2);
            background: rgba(0, 0, 0, 0.8);
        }

        .map-title-container {
            color: #00ff00;
        }

        .map-main-title {
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            margin: 0;
            letter-spacing: 1px;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .map-subtitle {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 0.3rem;
        }

        .map-stats {
            display: flex;
            gap: 2rem;
        }

        .map-stat-item {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .stat-label {
            font-size: 0.7rem;
            color: rgba(0, 255, 0, 0.6);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 0.9rem;
            color: #00ff00;
            font-family: 'Courier New', monospace;
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 400px;
            background: #000;
            overflow: hidden;
        }

        .map-frame {
            width: 100%;
            height: 100%;
            border: none;
            filter: hue-rotate(90deg) saturate(150%) contrast(120%);
        }

        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 255, 0, 0.05), transparent);
            pointer-events: none;
        }

        .map-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, transparent 0%, rgba(0, 255, 0, 0.05) 100%);
            pointer-events: none;
        }

        .map-scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: rgba(0, 255, 0, 0.3);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.4);
            animation: scan 3s linear infinite;
            pointer-events: none;
        }

        .map-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            border-top: 1px solid rgba(0, 255, 0, 0.2);
            background: rgba(0, 0, 0, 0.8);
        }

        .map-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #00ff00;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
            animation: pulse 2s infinite;
        }

        .status-text {
            font-family: 'Courier New', monospace;
            color: #00ff00;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .map-controls {
            display: flex;
            gap: 1rem;
        }

        .map-control-btn {
            background: none;
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #00ff00;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .map-control-btn:hover {
            background: rgba(0, 255, 0, 0.1);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.2);
        }

        @keyframes scan {
            0% {
                top: 0;
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
            100% {
                top: 100%;
                opacity: 0.5;
            }
        }

        @keyframes pulse {
            0% {
                opacity: 0.5;
                transform: scale(0.8);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0.5;
                transform: scale(0.8);
            }
        }

        @media (max-width: 768px) {
            .map-section {
                width: 95%;
                margin: 2rem auto;
            }

            .map-container {
                height: 350px;
            }
        }

        @media (max-width: 480px) {
            .map-section {
                width: 100%;
                margin: 1.5rem auto;
                border-radius: 10px;
            }

            .map-container {
                height: 300px;
            }
        }
    </style>
</head>
<body class="bg-image">
    <!-- Navigation Bar -->
    <nav class="nav fixed top-0 right-9">
        <div class="flex justify-end items-center h-16">
            <div class="flex items-center space-x-4">   
                <a href="dashboard" class="text-white 600">Home</a>
                <a href="service" class="text-white 600">Services</a>
                <a href="#contact" class="text-white 600 ">Contact</a>
                <a id="resumeLink" href="javascript:void(0)" onclick="openPdfModal('/pdf/Resume_2025.pdf')" class="text-white hover:text-blue-400 transition-colors duration-300">
                    CV
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline" id="logoutForm">
                    @csrf
                    <button type="button" onclick="confirmLogout()" class="text-white 600">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen pt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="space-y-6">
                    <h1 class="text-4xl font-bold text-white mb-8 floating">Your Message Matters</h1>
                    <p class="text-lg text-gray-200 mb-8">Every message you send is a privilege I deeply value. Your thoughts, ideas, and feedback are not just words - they're opportunities for meaningful connection and growth. I'm here to listen and respond with the attention and respect you deserve.</p>
                    
                    <div class="contact-card p-6 flex items-start space-x-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Email</h3> 
                            <p class="text-gray-200">jeremiesotero0313@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-card p-6 flex items-start space-x-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Phone</h3>
                            <p class="text-gray-200">+63 951 876 7031</p>
                        </div>
                    </div>

                    <div class="contact-card p-6 flex items-start space-x-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Location</h3>
                            <p class="text-gray-200">San Pablo City Laguna 4000, Philippines</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <form class="space-y-6" id="contactForm">
                        <div>
                            <label for="name" class="block text-white mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg text-white placeholder-gray-300" placeholder="Your name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-white mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg text-white placeholder-gray-300" placeholder="Your email" required>
                        </div>
                        <div>
                            <label for="message" class="block text-white mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 rounded-lg text-white placeholder-gray-300" placeholder="Your message" required></textarea>
                        </div>
                        <button type="submit" class="submit-button px-8 py-3 rounded-lg text-white font-semibold w-full">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps Section -->
    <section class="map-section">
        <div class="map-header">
            <div class="map-title-container">
                <h2 class="map-main-title">[LOCATION_TRACKING]</h2>
                <div class="map-subtitle">Barangay Sta. Monica, San Pablo City</div>
            </div>
            <div class="map-stats">
                <div class="map-stat-item">
                    <span class="stat-label">LATITUDE</span>
                    <span class="stat-value">14.0683° N</span>
                </div>
                <div class="map-stat-item">
                    <span class="stat-label">LONGITUDE</span>
                    <span class="stat-value">121.3255° E</span>
                </div>
            </div>
        </div>
        <div class="map-container">
            <iframe 
                class="map-frame"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.5!2d121.3255!3d14.0683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5b0b07c9d8c1%3A0x1c3e0e2c2c2c2c2c!2sBarangay%20Sta.%20Monica%2C%20San%20Pablo%20City%2C%20Laguna!5e0!3m2!1sen!2sph!4v1620000000000!5m2!1sen!2sph"
                allowfullscreen=""
                loading="lazy">
            </iframe>
            <div class="map-overlay"></div>
            <div class="map-glow"></div>
            <div class="map-scan-line"></div>
        </div>
        <div class="map-footer">
            <div class="map-status">
                <span class="status-dot"></span>
                <span class="status-text">[SYSTEM_ACTIVE]</span>
            </div>
            <div class="map-controls">
                <button class="map-control-btn">
                    <i class="fas fa-expand"></i>
                </button>
                <button class="map-control-btn">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- PDF Viewer Modal -->
    <div id="pdfModal" class="pdf-modal">
        <button class="pdf-close" onclick="closePdfModal()">&times;</button>
        <div class="pdf-container">
            <iframe id="pdfViewer" src="" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        function confirmLogout() {
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        // Form submission handling
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Add loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitButton.disabled = true;

            // Simulate form submission (replace with actual form submission)
            setTimeout(() => {
                submitButton.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
                submitButton.style.background = 'linear-gradient(135deg, #10B981, #059669)';
                
                // Reset form
                this.reset();
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                    submitButton.style.background = 'linear-gradient(135deg, #6366f1, #8b5cf6)';
                }, 3000);
            }, 1500);
        });

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

        document.addEventListener('DOMContentLoaded', function() {
            let lastScrollTop = 0;
            const nav = document.querySelector('.nav');
            const scrollThreshold = 50;

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                // Add a small delay to prevent rapid toggling
                if (Math.abs(currentScroll - lastScrollTop) < scrollThreshold) {
                    return;
                }

                if (currentScroll > lastScrollTop && currentScroll > 100) {
                    // Scrolling down
                    nav.classList.remove('visible');
                    nav.classList.add('hidden');
                } else {
                    // Scrolling up
                    nav.classList.remove('hidden');
                    nav.classList.add('visible');
                }

                lastScrollTop = currentScroll;
            });

            // Show nav when at the top of the page
            window.addEventListener('scroll', () => {
                if (window.pageYOffset === 0) {
                    nav.classList.remove('hidden');
                    nav.classList.add('visible');
                }
            });
        });
    </script>

    <script src="/js/pdf-viewer.js"></script>
</body>
</html>