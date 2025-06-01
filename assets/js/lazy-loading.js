document.addEventListener("DOMContentLoaded", function () {
  const lazyImages = document.querySelectorAll('img.lazy-img');
  const lazyVideos = document.querySelectorAll('video.lazy-video');

  if ('IntersectionObserver' in window) {
    const imgObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy-img');
          observer.unobserve(img);
        }
      });
    });

    lazyImages.forEach(img => imgObserver.observe(img));

    const videoObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const video = entry.target;
          video.src = video.dataset.src;
          video.load();
          video.classList.remove('lazy-video');
          observer.unobserve(video);
        }
      });
    });

    lazyVideos.forEach(video => videoObserver.observe(video));

  } else {
    lazyImages.forEach(img => {
      img.src = img.dataset.src;
      img.classList.remove('lazy-img');
    });

    lazyVideos.forEach(video => {
      video.src = video.dataset.src;
      video.load();
      video.classList.remove('lazy-video');
    });
  }

  // Custom video controls
  document.addEventListener('click', function(e) {
    if (e.target.closest('.video-play-btn')) {
      const btn = e.target.closest('.video-play-btn');
      const videoContainer = btn.closest('.video-container');
      const video = videoContainer.querySelector('video');
      const playIcon = btn.querySelector('.play-icon');
      const pauseIcon = btn.querySelector('.pause-icon');

      if (video.paused) {
        video.play();
        playIcon.style.display = 'none';
        pauseIcon.style.display = 'block';
      } else {
        video.pause();
        playIcon.style.display = 'block';
        pauseIcon.style.display = 'none';
      }
    }
  });

  // Reset play button when video ends
  document.addEventListener('ended', function(e) {
    if (e.target.tagName === 'VIDEO') {
      const videoContainer = e.target.closest('.video-container');
      if (videoContainer) {
        const btn = videoContainer.querySelector('.video-play-btn');
        const playIcon = btn.querySelector('.play-icon');
        const pauseIcon = btn.querySelector('.pause-icon');
        
        playIcon.style.display = 'block';
        pauseIcon.style.display = 'none';
      }
    }
  }, true);
});