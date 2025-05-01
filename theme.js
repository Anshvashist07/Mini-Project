
        const themeSwitch = document.getElementById('theme-switch');
    const toggleBtn = document.querySelector('.theme-toggle-btn');
    
    toggleBtn.addEventListener('click', () => {
      themeSwitch.checked = !themeSwitch.checked;
      document.body.classList.toggle('dark-theme');
    });

// swither end