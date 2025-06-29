document.addEventListener('DOMContentLoaded', function() {
    let scanner = null;
    let isScanning = false;

    window.addEventListener('initQrScanner', function(event) {
        console.log("Browser event received:", event);
        setTimeout(() => {
            console.log("test if livewire receive dispatch - browser event");
            initializeScanner();
        }, 100);
    });

    window.addEventListener('stopQrScanner', function(event) {
        stopScanner();
    });

    function initializeScanner() {
        console.error("fuck");
        if (isScanning) return;

        const video = document.getElementById('qr-preview');
        const loading = document.getElementById('qr-loading');
        
        if (!video) return;

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

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                            // scanner.start(cameras[1]);

                            var selectedCam = cameras[0];
                            $.each(cameras, (i, c) => {
                                if (c.name.indexOf('back') != -1) {
                                    selectedCam = c;
                                    //return false;
                                }
                            });
                            scanner.start(selectedCam);

                            $("#myBtnF").click(function() {
                                // scanner.start(cameras[0]);

                                var selectedCam = cameras[0];
                                $.each(cameras, (i, c) => {
                                    if (c.name.indexOf('front') != -1) {
                                        selectedCam = c;
                                        //return false;
                                    }
                                });
                                scanner.start(selectedCam);
                            });
                        } else {
                            console.error('No cameras found.');
                        }
        }).catch(function(error) {
            loading.innerHTML = '<p class="text-red-600">Camera access denied or not available.</p>';
            console.error('Camera error:', error);
        });
    }

    function stopScanner() {
        if (scanner && isScanning) {
            scanner.stop();
            isScanning = false;
            console.log('Scanner stopped');
        }
    }

    // Cleanup when page unloads
    window.addEventListener('beforeunload', function() {
        stopScanner();
    });
});