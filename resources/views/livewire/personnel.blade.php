<div class="max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl py-4">
    <div class="bg-white rounded-3xl card-shadow overflow-hidden">
        <!-- Enhanced Header -->
        <div class="gradient-bg text-white px-8 py-6">
            <div class="flex items-center justify-center">
                <div class="bg-white/20 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Personnel Information</h1>
                    <p class="text-white/80 mt-1">Complete the form below with accurate information</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <!-- Basic Information Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-purple-600 rounded-full mr-3"></div>
                    Basic Information
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Shipping PIC -->
                    <div>
                        <div class="form-group">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                                <label for="7-shippingpic" class="block text-sm font-semibold text-gray-700 mb-3">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Shipping PIC
                                    </div>
                                </label>
                                
                                <div class="relative">
                                    <x-inputText
                                        id="7-shippingpic"
                                        wire:model='inputs.shipping_pic'
                                        wire:focusout="dispatchMe('shipping_pic')"
                                        :inputStatus="$inputStatus['shipping_pic'] ?? null"
                                        class="input-field w-full px-4 py-3 pr-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-500"
                                        placeholder="Enter shipping person in charge or scan code">
                                    </x-inputText>
                                    
                                    <!-- QR/Barcode Scanner Button -->
                                    <button 
                                        type="button"
                                        wire:click="openScanner"
                                        class="absolute right-2 top-1/2 transform -translate-y-1/2 p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors"
                                        title="Scan QR Code or Barcode">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h2M4 8h4m0 0V4m0 4h.01M4 16h4m0 0v4m0-4h.01m8-12h.01M16 4h4v4m-4 0h.01"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <!-- Scan Message -->
                                @if($scanMessage)
                                    <div class="mt-2 p-2 rounded-lg text-sm {{ str_contains($scanMessage, 'successfully') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $scanMessage }}
                                        <button wire:click="clearScanMessage" class="ml-2 text-gray-500 hover:text-gray-700">
                                            <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Scanner Modal -->
                        @if($showScanner)
                            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Scan QR Code or Barcode</h3>
                                        <button wire:click="closeScanner" class="text-gray-400 hover:text-gray-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="relative">
                                        <video id="scanner-video" class="w-full rounded-lg bg-black" autoplay playsinline></video>
                                        <canvas id="scanner-canvas" class="hidden"></canvas>
                                        
                                        <!-- Scanner overlay -->
                                        <div class="absolute inset-0 pointer-events-none">
                                            <div class="flex items-center justify-center h-full">
                                                <div class="w-48 h-48 border-2 border-blue-500 rounded-lg relative">
                                                    <div class="absolute top-0 left-0 w-4 h-4 border-t-4 border-l-4 border-blue-500"></div>
                                                    <div class="absolute top-0 right-0 w-4 h-4 border-t-4 border-r-4 border-blue-500"></div>
                                                    <div class="absolute bottom-0 left-0 w-4 h-4 border-b-4 border-l-4 border-blue-500"></div>
                                                    <div class="absolute bottom-0 right-0 w-4 h-4 border-b-4 border-r-4 border-blue-500"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-center">
                                        <p class="text-sm text-gray-600">Position the QR code or barcode within the frame</p>
                                        <button wire:click="closeScanner" class="mt-3 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                            <label for="7-date" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Date
                                </div>
                            </label>
                            <input 
                                type="date" 
                                id="7-date" 
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900"
                                wire:model='inputs.date' 
                                wire:focusout="dispatchMe('date')"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- OBA Check Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-orange-500 to-red-600 rounded-full mr-3"></div>
                    OBA Verification
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- OBA Checked By -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100">
                            <label for="7-oba" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    OBA Checked By
                                </div>
                            </label>
                            <x-inputText 
                                id="7-oba" 
                                wire:model='inputs.oba_checked_by' 
                                wire:focusout="dispatchMe('oba_checked_by')" 
                                :inputStatus="$inputStatus['oba_checked_by'] ?? null"
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Enter inspector name">
                            </x-inputText>
                        </div>
                    </div>

                    <!-- OBA Judgement -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                            <label for="7-judgement-oba" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                    Judgement
                                </div>
                            </label>
                            <x-inputText 
                                id="7-judgement-oba" 
                                wire:model='inputs.check_judgement' 
                                wire:focusout="dispatchMe('check_judgement')" 
                                :inputStatus="$inputStatus['check_judgement'] ?? null"
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Enter judgement result">
                            </x-inputText>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OBA Picture Section -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-teal-500 to-cyan-600 rounded-full mr-3"></div>
                    OBA Picture Documentation
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- OBA Picture By -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 border border-teal-100">
                            <label for="7-obapic" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    OBA Picture By
                                </div>
                            </label>
                            <x-inputText 
                                id="7-obapic" 
                                wire:model='inputs.oba_picture_by' 
                                wire:focusout="dispatchMe('oba_picture_by')" 
                                :inputStatus="$inputStatus['oba_picture_by'] ?? null"
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Enter photographer name">
                            </x-inputText>
                        </div>
                    </div>

                    <!-- Picture Judgement -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-100">
                            <label for="7-judgement-obapic" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    Picture Judgement
                                </div>
                            </label>
                            <x-inputText 
                                id="7-judgement-obapic" 
                                wire:model='inputs.picture_judgement' 
                                wire:focusout="dispatchMe('picture_judgement')" 
                                :inputStatus="$inputStatus['picture_judgement'] ?? null"
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-500"
                                placeholder="Enter picture quality judgement">
                            </x-inputText>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsQR/1.4.0/jsQR.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

<script>
let stream = null;
let scanning = false;
let video = null;
let canvas = null;
let context = null;

function startScanner() {
    console.log('Starting scanner...');
    
    video = document.getElementById('scanner-video');
    canvas = document.getElementById('scanner-canvas');
    
    if (!video || !canvas) {
        console.error('Video or canvas element not found');
        return;
    }
    
    context = canvas.getContext('2d');
    
    // Check if getUserMedia is supported
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        console.error('getUserMedia not supported');
        @this.dispatch('scan-error', 'Camera not supported in this browser');
        return;
    }
    
    // Request camera access
    navigator.mediaDevices.getUserMedia({ 
        video: { 
            facingMode: 'environment',  // Use back camera if available
            width: { ideal: 1280 },
            height: { ideal: 720 }
        } 
    })
    .then(function(mediaStream) {
        console.log('Camera access granted');
        stream = mediaStream;
        video.srcObject = stream;
        
        video.addEventListener('loadedmetadata', function() {
            console.log('Video metadata loaded');
            video.play().then(() => {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                scanning = true;
                console.log('Starting scan loop');
                scanFrame();
            }).catch(err => {
                console.error('Error playing video:', err);
                @this.dispatch('scan-error', 'Error starting camera');
            });
        });
        
        video.addEventListener('error', function(e) {
            console.error('Video error:', e);
            @this.dispatch('scan-error', 'Video error occurred');
        });
    })
    .catch(function(error) {
        console.error('Camera access error:', error);
        let errorMessage = 'Camera access denied';
        if (error.name === 'NotFoundError') {
            errorMessage = 'No camera found';
        } else if (error.name === 'NotAllowedError') {
            errorMessage = 'Camera permission denied';
        } else if (error.name === 'NotReadableError') {
            errorMessage = 'Camera is already in use';
        }
        @this.dispatch('scan-error', errorMessage);
    });
}

function scanFrame() {
    if (!scanning || !video || !context || video.readyState !== video.HAVE_ENOUGH_DATA) {
        if (scanning) {
            requestAnimationFrame(scanFrame);
        }
        return;
    }

    try {
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        
        // Try QR code detection first
        const qrCode = jsQR(imageData.data, imageData.width, imageData.height);
        if (qrCode && qrCode.data) {
            console.log('QR Code detected:', qrCode.data);
            handleScanResult(qrCode.data);
            return;
        }

        // Try barcode detection
        scanBarcode(canvas);
    } catch (error) {
        console.error('Scan frame error:', error);
    }

    // Continue scanning
    if (scanning) {
        requestAnimationFrame(scanFrame);
    }
}

function scanBarcode(canvas) {
    try {
        Quagga.decodeSingle({
            decoder: {
                readers: [
                    "code_128_reader",
                    "ean_reader",
                    "ean_8_reader",
                    "code_39_reader",
                    "code_39_vin_reader",
                    "codabar_reader",
                    "upc_reader",
                    "upc_e_reader",
                    "i2of5_reader"
                ]
            },
            locate: true,
            src: canvas.toDataURL()
        }, function(result) {
            if (result && result.codeResult && result.codeResult.code) {
                console.log('Barcode detected:', result.codeResult.code);
                handleScanResult(result.codeResult.code);
            }
        });
    } catch (error) {
        console.error('Barcode scan error:', error);
    }
}

function handleScanResult(code) {
    if (scanning && code) {
        console.log('Handling scan result:', code);
        scanning = false;
        stopCamera();
        @this.dispatch('code-scanned', code);
    }
}

function stopCamera() {
    console.log('Stopping camera...');
    scanning = false;
    if (stream) {
        stream.getTracks().forEach(track => {
            track.stop();
            console.log('Track stopped:', track.kind);
        });
        stream = null;
    }
    if (video) {
        video.srcObject = null;
        video.pause();
    }
}

// Livewire event listeners
document.addEventListener('livewire:init', function() {
    Livewire.on('stop-scanner', function() {
        stopCamera();
    });
});

// Listen for Livewire updates to detect when modal opens
document.addEventListener('livewire:updated', function() {
    const scannerVideo = document.getElementById('scanner-video');
    if (scannerVideo && !scanning && !stream) {
        console.log('Scanner modal detected, starting camera...');
        // Small delay to ensure modal is fully rendered
        setTimeout(startScanner, 300);
    }
});
</script>
@endpush