<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            width: 100%;
            position: relative;
            box-sizing: border-box;
        }
        * {
            box-sizing: border-box;
        }
        #pdfViewer {
            width: 100%;
            height: 100vh;
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
    
      
        .social-icons {
            display: none;
            position: absolute;
            top: 50%;
            left: calc(100% + 10px);
            transform: translateY(-50%);
            padding: 0.5rem;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: auto;
        }

        .social-icons.visible {
            display: flex;
            flex-direction: row;
            gap: 1rem;
            opacity: 1;
            transform: translateY(-50%);
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
            width: 2.5rem;
            height: 2.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        .social-icons img {
            width: 3rem;
            height: 3rem;
            object-fit: contain;
            transition: all 0.3s ease;
            opacity: 1;
            display: block;
        }

        .social-icons a:hover img {
            transform: scale(1.2) rotate(360deg);
            filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.5));
        }

        .follow-button {
            position: relative;
            margin-top: 1rem;
            z-index: 50;
            display: inline-flex;
            align-items: center;
        }

        .follow-button button {
            background: rgba(0, 255, 0, 0.1);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            font-weight: 500;
            border: 1px solid rgba(0, 255, 0, 0.3);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.2);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
        }

        .follow-button button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(0, 255, 0, 0.2),
                transparent
            );
            transition: 0.5s;
        }

        .follow-button button:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.4);
            background: rgba(0, 255, 0, 0.15);
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 0 20px rgba(0, 255, 0, 0.3); }
            50% { box-shadow: 0 0 30px rgba(0, 255, 0, 0.5); }
            100% { box-shadow: 0 0 20px rgba(0, 255, 0, 0.3); }
        }

        .social-icons a span {
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover span {
            color: #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        /* Skills Section Styles */
        .skills-section {
            width: 100%;
            padding: 4rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            margin: 2rem 0;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .skills-section.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .skill-item {
            margin-bottom: 2rem;
            opacity: 1;
            transform: none;
        }
        .skill-header {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .skill-icon {
            width: 2.5rem;
            height: 2.5rem;
            margin-right: 1rem;
            object-fit: contain;
        }
        .skill-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
        }
        .progress-bar {
            height: 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
            flex: 1;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #00ff00, #39ff14, #00ff9d);
            border-radius: 1rem;
            width: 0;
            transition: width 1.5s ease-in-out;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }
        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                rgba(0, 255, 0, 0.2),
                rgba(57, 255, 20, 0.2),
                rgba(0, 255, 157, 0.2));
            animation: glow 2s ease-in-out infinite;
        }
        @keyframes glow {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }
        .skill-percentage {
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            min-width: 3rem;
            text-align: right;
        }
        .skill-progress-container {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 1rem;
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
        .skill-item {
            animation: slideIn 0.5s ease-out forwards;
            opacity: 0;
        }
        .skill-item:nth-child(1) { animation-delay: 0.1s; }
        .skill-item:nth-child(2) { animation-delay: 0.2s; }
        .skill-item:nth-child(3) { animation-delay: 0.3s; }
        .skill-item:nth-child(4) { animation-delay: 0.4s; }
        .skill-item:nth-child(5) { animation-delay: 0.5s; }
        .skill-item:nth-child(6) { animation-delay: 0.6s; }
        /* PDF Viewer Styles */
        .pdf-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 1000;
            display: none;
            backdrop-filter: blur(8px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .pdf-overlay.active {
            display: block;
            opacity: 1;
            animation: fadeIn 0.3s ease-out;
        }
        .pdf-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.95);
            width: 95%;
            max-width: 1400px;
            height: 95vh;
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
        }
        .pdf-overlay.active .pdf-container {
            transform: translate(-50%, -50%) scale(1);
        }
        .pdf-header {
            background: #f8fafc;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            position: relative;
        }
        .pdf-content {
            flex: 1;
            overflow: hidden;
            background: #f1f5f9;
        }
        .pdf-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .back-button {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: #f1f5f9;
            border: 2px solid #e2e8f0;
            border-radius: 0.75rem;
            color: #475569;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        .back-button:hover {
            background: #e2e8f0;
            color: #1e293b;
            transform: translateX(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .back-button:hover::before {
            left: 100%;
        }
        .back-button svg {
            margin-right: 0.75rem;
            transition: transform 0.3s ease;
        }
        .back-button:hover svg {
            transform: translateX(-3px);
        }
        .pdf-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        /* Profile Image Styles */
        .profile-image {
            width: 400px;
            height: 400px;
            border-radius: 50%;
            object-fit: cover;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }
        .profile-image:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(255,255,255,0.2);
        }

        /* Hero Section Layout */
        .hero-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 2rem;
            min-height: calc(100vh - 6rem);
            padding: 2rem 0;
            position: relative;
            flex-wrap: wrap;
            width: 100%;
        }
        .hero-content {
            flex: 1;
            max-width: 600px;
            position: relative;
            width: 100%;
        }
        .hero-image {
            flex-shrink: 0;
            position: relative;
            margin-top: 9rem;
            margin-left: 10rem;
        }
        .hero-image::after {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
            border-radius: 60%;
            z-index: -1;
            animation: pulse 2s infinite;
        }
       

        /* Video Section Styles */
        .video-section {
            width: 100%;
            max-width: 800px;
            margin: 2rem auto 0;
            position: relative;
        }
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 1rem;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
            backdrop-filter: blur(5px);
        }
        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
            z-index: 1;
            pointer-events: none;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: 2;
        }

        /* New Tech Heading Styles */
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

        /* Framework and Database Styles */
        .tech-stack {
            margin-top: 0.5rem;
            padding: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 0.5rem;
            backdrop-filter: blur(5px);
            width: 100%;
        }

        .tech-stack-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0.25rem 0;
            color: white;
            font-size: 0.875rem;
            flex-wrap: wrap;
        }

        .tech-stack-item img {
            width: 1.25rem;
            height: 1.25rem;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .tech-stack-item:hover img {
            transform: scale(1.2);
        }

        .tech-label {
            font-weight: 600;
            color: white;
            margin-right: 0.5rem;
        }

        /* Ensure all sections stay within viewport width */
        .max-w-7xl {
            width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }
        /* Ensure navigation is clickable */
        nav {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
        }
        /* Ensure all interactive elements are clickable */
        a, button, .follow-button, .skill-item, .tech-stack-item {
            position: relative;
            z-index: 2;
        }

        /* Copyright Footer Styles */
        .copyright-footer {
            width: 100%;
            padding: 1.5rem 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 4rem;
        }

        .copyright-footer p {
            margin: 0;
            line-height: 1.5;
        }

        .copyright-footer a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .copyright-footer a:hover {
            color: #00ff00;
        }

        /* Certificates Section Styles */
        .certificates-section {
            width: 100%;
            padding: 4rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            margin: 2rem 0;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .certificates-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .certificates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .certificate-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: slideIn 0.5s ease-out forwards;
        }

        .certificate-card:nth-child(1) { animation-delay: 0.1s; }
        .certificate-card:nth-child(2) { animation-delay: 0.2s; }
        .certificate-card:nth-child(3) { animation-delay: 0.3s; }
        .certificate-card:nth-child(4) { animation-delay: 0.4s; }
        .certificate-card:nth-child(5) { animation-delay: 0.5s; }
        .certificate-card:nth-child(6) { animation-delay: 0.6s; }

        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: rgba(0, 255, 0, 0.3);
        }

        .certificate-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            background: rgba(0, 0, 0, 0.2);
        }

        .certificate-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .certificate-card:hover .certificate-image {
            border-color: rgba(0, 255, 0, 0.3);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
        }

        .certificate-card:hover .certificate-img {
            transform: scale(1.1);
            border-color: rgba(0, 255, 0, 0.3);
        }

        .certificate-content {
            padding: 1.5rem;
        }

        .certificate-title {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .certificate-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #00ff00, transparent);
            transition: width 0.3s ease;
        }

        .certificate-card:hover .certificate-title::after {
            width: 100px;
        }

        .certificate-description {
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

        /* Certificate Modal Styles */
        .certificate-modal {
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

        .certificate-modal.active {
            display: flex;
            opacity: 1;
        }

        .certificate-modal-content {
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

        .certificate-modal.active .certificate-modal-content {
            transform: scale(1);
        }

        .certificate-modal-close {
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

        .certificate-modal-close:hover {
            background: rgba(255, 0, 0, 0.7);
            border-color: white;
            transform: rotate(90deg);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
        }

        .certificate-modal-close svg {
            width: 1.5rem;
            height: 1.5rem;
            stroke-width: 2.5;
        }

        .certificate-modal-image {
            width: 100%;
            height: 60vh;
            overflow: hidden;
            position: relative;
            margin: 1rem 0;
            border-radius: 0.5rem;
            background: rgba(0, 0, 0, 0.3);
            padding: 1rem;
        }

        .certificate-modal-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0.25rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .certificate-modal-info {
            padding: 2rem;
            color: white;
            margin-top: 1rem;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
        }

        .certificate-modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: white;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .certificate-modal-description {
            font-size: 1rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 1rem;
        }

        /* Add responsive adjustments */
        @media (max-width: 768px) {
            .certificate-modal-content {
                width: 95%;
                margin: 1rem auto;
                padding: 0.5rem;
            }

            .certificate-modal-image {
                height: 50vh;
                margin: 0.5rem 0;
                padding: 0.5rem;
            }

            .certificate-modal-info {
                padding: 1rem;
            }
        }

        /* Make certificate cards clickable */
        .certificate-card {
            cursor: pointer;
        }

        /* Add PDF Viewer Modal Styles */
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
<body class="bg-image">
    <!-- Navigation Bar -->         
        <div class="flex justify-end items-center h-16 px-8">
            <div class="flex items-center space-x-6">   
                <a href="dashboard" class="text-white hover:text-blue-400 transition-colors duration-300">Home</a>
                <a href="service" class="text-white hover:text-blue-400 transition-colors duration-300">Services</a>
                <a href="contact" class="text-white hover:text-blue-400 transition-colors duration-300">Contact</a>
                <a id="resumeLink" href="javascript:void(0)" onclick="openPdfModal('/pdf/Resume_2025.pdf')" class="text-white hover:text-blue-400 transition-colors duration-300">
                    CV
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline" id="logoutForm">
                    @csrf
                    <button type="submit" class="text-white hover:text-blue-400 transition-colors duration-300">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen pt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section with Image -->
            <div class="hero-container">
                <div class="hero-content">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                        Hello! I'm Jeremiah
                    </h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-white mb-8 leading-relaxed">
                     I strive to bring ideas to life through innovative and impactful digital solutions.
                    </p>
                    
                    <!-- Video Section -->
                    <div class="video-section">
                        <div class="video-container">
                            <iframe 
                                src="/vid/sample.mp4" 
                                title="Introduction Video" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <!-- Follow Me Button -->
                        <div class="follow-button">
                            <button class="hover:text-blue-600 transition-colors duration-300">
                                Follow me on    
                            </button>
                            <div class="social-icons">
                                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1024px-Facebook_Logo_%282019%29.png" alt="Facebook">
                                </a>
                                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png" alt="Instagram">
                                </a>
                                <a href="http://www.linkedin.com/in/jeremiah0313" target="_blank" rel="noopener noreferrer">
                                    <img src="https://static.licdn.com/sc/h/akt4ae504epesldzj74dzred8" alt="LinkedIn">
                                </a>
                                <a href="https://github.com" target="_blank" rel="noopener noreferrer">
                                    <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="GitHub">
                                </a>
                                <a href="https://www.tiktok.com" target="_blank" rel="noopener noreferrer">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3046/3046121.png" alt="TikTok">
                                </a>
                                <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer">
                                    <img src="https://www.youtube.com/s/desktop/12d6b690/img/favicon_144x144.png" alt="YouTube">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="/img/jeremie.jpg" alt="Jeremiah" class="profile-image">
                </div>
            </div>

            <!-- Skills Section -->
            <div class="skills-section">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="tech-heading-container">
                        <h2 class="tech-heading">Programming Languages I've Used</h2>
                    </div>
                    <div class="space-y-6">
                        <div class="skill-item">
                            <div class="skill-header">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" class="skill-icon">
                                <span class="skill-name">Java</span>
                            </div>
                            <div class="skill-progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" data-percentage="85"></div>
                                </div>
                                <span class="skill-percentage">65%</span>
                            </div>
                            <div class="tech-stack">
                                <div class="tech-stack-item">
                                    <span class="tech-label">Frameworks:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg" alt="Spring Boot">
                                    <span>Spring Boot</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/hibernate/hibernate-original.svg" alt="Hibernate">
                                    <span>Hibernate</span>
                                </div>
                                <div class="tech-stack-item">
                                    <span class="tech-label">Databases:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL">
                                    <span>MySQL</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" alt="PostgreSQL">
                                    <span>PostgreSQL</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" class="skill-icon">
                                <span class="skill-name">Flutter</span>
                            </div>
                            <div class="skill-progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" data-percentage="80"></div>
                                </div>
                                <span class="skill-percentage">80%</span>
                            </div>
                            <div class="tech-stack">
                                <div class="tech-stack-item">
                                    <span class="tech-label">Frameworks:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Provider">
                                    <span>Provider</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="GetX">
                                    <span>GetX</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Bloc">
                                    <span>Bloc</span>
                                </div>
                                <div class="tech-stack-item">
                                    <span class="tech-label">Databases:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sqlite/sqlite-original.svg" alt="SQLite">
                                    <span>SQLite</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain.svg" alt="Firebase">
                                    <span>Firebase</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="skill-icon">
                                <span class="skill-name">Python</span>
                            </div>
                            <div class="skill-progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" data-percentage="75"></div>
                                </div>
                                <span class="skill-percentage">55%</span>
                            </div>
                            <div class="tech-stack">
                                <div class="tech-stack-item">
                                    <span class="tech-label">Frameworks:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg" alt="Django">
                                    <span>Django</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flask/flask-original.svg" alt="Flask">
                                    <span>Flask</span>
                                </div>
                                <div class="tech-stack-item">
                                    <span class="tech-label">Databases:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg" alt="MongoDB">
                                    <span>MongoDB</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sqlite/sqlite-original.svg" alt="SQLite">
                                    <span>SQLite</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" class="skill-icon">
                                <span class="skill-name">PHP</span>
                            </div>
                            <div class="skill-progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" data-percentage="90"></div>
                                </div>
                                <span class="skill-percentage">90%</span>
                            </div>
                            <div class="tech-stack">
                                <div class="tech-stack-item">
                                    <span class="tech-label">Frameworks:</span>
                                    <img src="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" alt="Laravel">
                                    <span>Laravel</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg" alt="CodeIgniter">
                                    <span>CodeIgniter</span>
                                </div>
                                <div class="tech-stack-item">
                                    <span class="tech-label">Databases:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL">
                                    <span>MySQL</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mariadb/mariadb-original.svg" alt="MariaDB">
                                    <span>MariaDB</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg" alt="C#" class="skill-icon">
                                <span class="skill-name">C#</span>
                            </div>
                            <div class="skill-progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" data-percentage="70"></div>
                                </div>
                                <span class="skill-percentage">70%</span>
                            </div>
                            <div class="tech-stack">
                                <div class="tech-stack-item">
                                    <span class="tech-label">Frameworks:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg" alt=".NET Core">
                                    <span>.NET Core</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dot-net/dot-net-original.svg" alt="ASP.NET">
                                    <span>ASP.NET</span>
                                </div>
                                <div class="tech-stack-item">
                                    <span class="tech-label">Databases:</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/microsoftsqlserver/microsoftsqlserver-plain.svg" alt="SQL Server">
                                    <span>SQL Server</span>
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg" alt="Entity Framework">
                                    <span>Entity Framework</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificates Section -->
            <div class="certificates-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="tech-heading-container">
                        <h2 class="tech-heading">Professional Certifications</h2>
                    </div>
                    <div class="certificates-grid">
                        <!-- NC II Certificate -->
                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="/img/NC2.jpg" alt="NC II Computer Systems Servicing" class="certificate-img">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">NC II Computer Systems Servicing</h3>
                                <p class="certificate-description">
                                    Professional certification in computer systems servicing, demonstrating expertise in hardware and software maintenance, troubleshooting, and system configuration.
                                </p>
                            </div>
                        </div>

                        <!-- Participation Certificates -->
                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="/img/fundamentals_cert.jpg" alt="Fundamentals of Statistics with MS Excel" class="certificate-img">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">Fundamentals of Statistics with MS Excel</h3>
                                <p class="certificate-description">
                                    Covers the core concepts of statistics, including data types, measures of central tendency and dispersion, probability, and data visualization.
                                </p>
                            </div>
                        </div>

                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="/img/Ethicalhacking.png" alt="Ethical Hacking and Data Security" class="certificate-img">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">Ethical Hacking and Data Security</h3>
                                <p class="certificate-description">
                                    Advanced training in cybersecurity and ethical hacking techniques, focusing on penetration testing and security assessment.
                                </p>
                            </div>
                        </div>

                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="{{ asset('img/gamedev_cert.jpg') }}" alt="Game Development" class="certificate-img" onerror="this.onerror=null; this.src='/img/placeholder.jpg'; this.style.backgroundColor='rgba(0,0,0,0.1)';">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">Game Development</h3>
                                <p class="certificate-description">
                                    Specialized training in game development, covering game design principles, programming, and interactive media creation.
                                </p>
                            </div>
                        </div>

                        <!-- Mental Health Certificates -->
                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="/img/mentalhealth.jpg" alt="Mental Health Awareness and Support" class="certificate-img">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">Mental Health Awareness and Support</h3>
                                <p class="certificate-description">
                                    Demonstrates my understanding of mental health issues, including common conditions such as anxiety, depression, and stress.
                                </p>
                            </div>
                        </div>

                        <div class="certificate-card" onclick="openCertificateModal(this)">
                            <div class="certificate-image">
                                <img src="/img/mediation.jpg" alt="Mental Health First Aid" class="certificate-img">
                            </div>
                            <div class="certificate-content">
                                <h3 class="certificate-title">Mental Health First Aid</h3>
                                <p class="certificate-description">
                                    Advanced certification in mental health first aid, providing skills to support and assist individuals experiencing mental health challenges.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certificate Modal -->
    <div id="certificateModal" class="certificate-modal">
        <div class="certificate-modal-content">
            <button class="certificate-modal-close" onclick="closeCertificateModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="certificate-modal-image">
                <img id="modalImage" src="" alt="Certificate">
            </div>
            <div class="certificate-modal-info">
                <h3 id="modalTitle" class="certificate-modal-title"></h3>
                <p id="modalDescription" class="certificate-modal-description"></p>
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

    <!-- Copyright Footer -->
    <footer class="copyright-footer">
    <p>© {{ date('Y') }} Jeremiah's portfolio. All rights reserved.</p>
    
    <p>This portfolio website and its contents are the sole property of Jeremiah. Unauthorized use, reproduction, or distribution of any content, code, or media without explicit permission is strictly prohibited.</p>
    
    <p>Designed and developed with ❤️, curiosity, and dedication using modern web technologies. This site represents my journey, skills, and passion for crafting intuitive and impactful digital experiences.</p>
    
    <p>Built with Laravel. Hosted with care to ensure fast, secure, and responsive performance across all devices.</p>
    
</footer>


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

        // Skills Animation
        function animateSkills() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const percentage = bar.getAttribute('data-percentage');
                bar.style.width = percentage + '%';
            });
        }

        // Intersection Observer for skills animation
        const skillsSection = document.querySelector('.skills-section');
        const certificatesSection = document.querySelector('.certificates-section');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    if (entry.target === skillsSection) {
                        animateSkills();
                    }
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, { 
            threshold: 0.2,
            rootMargin: '0px'
        });

        if (skillsSection) {
            observer.observe(skillsSection);
        }

        if (certificatesSection) {
            observer.observe(certificatesSection);
        }

        // Add subtle movement to progress bars
        function addProgressBarAnimation() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const percentage = parseInt(bar.getAttribute('data-percentage'));
                const randomVariation = Math.random() * 2 - 1; // Random value between -1 and 1
                const newPercentage = Math.min(100, Math.max(0, percentage + randomVariation));
                bar.style.width = newPercentage + '%';
            });
        }

        // Animate progress bars every 2 seconds when visible
        setInterval(() => {
            if (skillsSection.classList.contains('visible')) {
                addProgressBarAnimation();
            }
        }, 2000);

        // Certificate Modal Functions
        function openCertificateModal(card) {
            const modal = document.getElementById('certificateModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');

            // Get the certificate data
            const image = card.querySelector('.certificate-img').src;
            const title = card.querySelector('.certificate-title').textContent;
            const description = card.querySelector('.certificate-description').textContent;

            // Set the modal content
            modalImage.src = image;
            modalTitle.textContent = title;
            modalDescription.textContent = description;

            // Show the modal
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeCertificateModal() {
            const modal = document.getElementById('certificateModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('certificateModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCertificateModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && pdfOverlay.classList.contains('active')) {
                closePdfModal();
            }
        });

        // Add event listener for logout form submission
        document.getElementById('logoutForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                this.submit();
            }
        });

        // Add this to your existing script section
        let socialIconsTimeout;

        document.querySelector('.follow-button').addEventListener('mouseenter', function() {
            clearTimeout(socialIconsTimeout);
            const socialIcons = this.querySelector('.social-icons');
            socialIcons.classList.add('visible');
        });

        document.querySelector('.follow-button').addEventListener('mouseleave', function() {
            const socialIcons = this.querySelector('.social-icons');
            socialIconsTimeout = setTimeout(() => {
                socialIcons.classList.remove('visible');
            }, 3000); // 3 seconds delay
        });

        // Clear timeout if mouse enters social icons
        document.querySelector('.social-icons').addEventListener('mouseenter', function() {
            clearTimeout(socialIconsTimeout);
        });

        // Restart timeout when mouse leaves social icons
        document.querySelector('.social-icons').addEventListener('mouseleave', function() {
            socialIconsTimeout = setTimeout(() => {
                this.classList.remove('visible');
            }, 3000); // 3 seconds delay
        });
    </script>

    <script src="/js/pdf-viewer.js"></script>
</body>
</html>