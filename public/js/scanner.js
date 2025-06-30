document.addEventListener('DOMContentLoaded', function() {
    let scanner = null;
    let isScanning = false;
    
    window.addEventListener('initQrScanner', function(event) {
        console.log("Browser event received:", event);
        setTimeout(() => {
            console.log("Initializing QR scanner");
            initializeScanner();
        }, 100);
    });
    
    window.addEventListener('stopQrScanner', function(event) {
        stopScanner();
    });
    
    function initializeScanner() {
        console.log("Starting scanner initialization");
        if (isScanning) return;
        
        const video = document.getElementById('qr-preview');
        const loading = document.getElementById('qr-loading');
       
        if (!video) {
            console.error('Video element not found');
            return;
        }

        // Check if Instascan is loaded
        if (typeof Instascan === 'undefined') {
            console.error('Instascan library not loaded');
            loading.innerHTML = '<p class="text-red-600">QR Scanner library not loaded. Please refresh the page.</p>';
            return;
        }

        try {
            scanner = new Instascan.Scanner({
                video: video,
                mirror: false,
                continuous: true,
                captureImage: false,
                backgroundScan: false
            });

            scanner.addListener('scan', function(content) {
                console.log('QR Code scanned:', content);
                Livewire.dispatch('qrScanned', { content: content });
                stopScanner();
            });

            // Add error listener for scanner
            scanner.addListener('inactive', function() {
                console.log('Scanner became inactive');
                loading.innerHTML = '<p class="text-orange-600">Scanner is inactive. Please try again.</p>';
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                console.log('Available cameras:', cameras.length);
                
                if (cameras.length > 0) {
                    loading.style.display = 'none';
                   
                    // Prefer back camera if available
                    let selectedCamera = cameras[0];
                    for (let i = 0; i < cameras.length; i++) {
                        if (cameras[i].name && cameras[i].name.toLowerCase().includes('back')) {
                            selectedCamera = cameras[i];
                            break;
                        }
                        // Also check for environment facing camera
                        if (cameras[i].name && cameras[i].name.toLowerCase().includes('environment')) {
                            selectedCamera = cameras[i];
                            break;
                        }
                    }
                    
                    console.log('Starting scanner with camera:', selectedCamera.name);
                    
                    scanner.start(selectedCamera).then(function() {
                        isScanning = true;
                        console.log('Scanner started successfully');
                    }).catch(function(error) {
                        console.error('Failed to start scanner:', error);
                        loading.innerHTML = '<p class="text-red-600">Failed to start camera. Please check permissions and try again.</p>';
                    });
                    
                } else {
                    loading.innerHTML = '<p class="text-red-600">No cameras found. Please check camera permissions and ensure you\'re using HTTPS.</p>';
                    console.error('No cameras found.');
                }
            }).catch(function(error) {
                console.error('Camera access error:', error);
                let errorMessage = 'Camera access denied or not available.';
                
                // Provide more specific error messages
                if (error.name === 'NotAllowedError') {
                    errorMessage = 'Camera access denied. Please allow camera permissions and try again.';
                } else if (error.name === 'NotFoundError') {
                    errorMessage = 'No camera found on this device.';
                } else if (error.name === 'NotSupportedError') {
                    errorMessage = 'Camera not supported on this device/browser.';
                } else if (error.name === 'NotReadableError') {
                    errorMessage = 'Camera is already in use by another application.';
                } else if (error.name === 'SecurityError') {
                    errorMessage = 'Security error: Please ensure you\'re using HTTPS.';
                }
                
                loading.innerHTML = `<p class="text-red-600">${errorMessage}</p>`;
            });
            
        } catch (error) {
            console.error('Scanner initialization error:', error);
            loading.innerHTML = '<p class="text-red-600">Failed to initialize scanner. Please refresh and try again.</p>';
        }
    }
    
    function stopScanner() {
        if (scanner && isScanning) {
            try {
                scanner.stop();
                isScanning = false;
                console.log('Scanner stopped');
            } catch (error) {
                console.error('Error stopping scanner:', error);
            }
        }
    }
    
    // Cleanup when page unloads
    window.addEventListener('beforeunload', function() {
        stopScanner();
    });
    
    // Also cleanup when modal closes (additional safety)
    window.addEventListener('modalClosed', function() {
        stopScanner();
    });
});