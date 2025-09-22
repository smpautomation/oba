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
  function updateCurrentTime() {
      const now = new Date();
      const timeString = now.toLocaleString();
      try {
        document.getElementById('current-time').textContent = timeString;
      } catch (error) {

      }

  }

  // Update time every second
  setInterval(updateCurrentTime, 1000);
  updateCurrentTime();

  // Mobile menu toggle function
  function toggleMobileMenu() {
      const menu = document.getElementById('navbar-cta');
      menu.classList.toggle('hidden');
      menu.classList.toggle('visible');
  }

  // Close mobile menu function
  function closeMobileMenu() {
      const menu = document.getElementById('navbar-cta');
      menu.classList.add('hidden');
      menu.classList.remove('visible');
  }

  // Close mobile menu when clicking outside
  document.addEventListener('click', function(event) {
      const menu = document.getElementById('navbar-cta');
      const menuButton = document.querySelector('[data-collapse-toggle="navbar-cta"]');

      if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
          closeMobileMenu();
      }
  });

  // Handle keyboard navigation
  document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
          closeMobileMenu();
      }
  });



