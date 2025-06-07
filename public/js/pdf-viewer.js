// PDF Viewer functionality
function openPdfModal(pdfUrl) {
    const modal = document.getElementById('pdfModal');
    const viewer = document.getElementById('pdfViewer');
    
    // Set the PDF URL
    viewer.src = pdfUrl;
    
    // Show the modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Add loading indicator
    viewer.onload = function() {
        viewer.style.opacity = '1';
    };
}

function closePdfModal() {
    const modal = document.getElementById('pdfModal');
    const viewer = document.getElementById('pdfViewer');
    
    // Hide the modal
    modal.classList.remove('active');
    
    // Clear the PDF source
    viewer.src = '';
    
    // Restore body scroll
    document.body.style.overflow = 'auto';
}

// Initialize PDF viewer functionality
document.addEventListener('DOMContentLoaded', function() {
    // Close modal when clicking outside the PDF container
    const modal = document.getElementById('pdfModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closePdfModal();
            }
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePdfModal();
        }
    });
}); 