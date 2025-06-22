function isMobile() {
    return /Mobi|Android/i.test(navigator.userAgent);
  }

  // Initialize Flatpickr only on desktop
  if (!isMobile()) {
    flatpickr("#datetime", {
      enableTime: true,         // Enable time picker
      dateFormat: "Y-m-d H:i",  // Date and time format
      time_24hr: true,          // Use 24-hour format for time
      minDate: "today",         // Prevent past date selection
      allowInput: true,
      touch: true,         // Allow manual input
    });
  } else {
    // If it's a mobile device, use the native date picker
    document.getElementById('3-datetime').setAttribute('type', 'datetime-local');
  }