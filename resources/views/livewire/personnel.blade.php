<div>
    <button id="startBtn">Start Camera</button>
    <video id="video" width="400" height="300" autoplay playsinline></video>
    
    <script>
    document.getElementById('startBtn').onclick = function() {
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            const video = document.getElementById('video');
            video.srcObject = stream;
            console.log('Camera started successfully');
        })
        .catch(err => {
            console.error('Camera error:', err);
            alert('Camera error: ' + err.message);
        });
    };
    </script>
</div>