document.addEventListener('DOMContentLoaded', function () {
    var loginButton = document.getElementById('loginButton');
    var accountButton = document.getElementById('accountButton');
    var isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

    if (isLoggedIn) {
        loginButton.style.display = 'none';
        accountButton.style.display = 'block';
    } else {
        loginButton.style.display = 'block';
        accountButton.style.display = 'none';
    }
});


document.getElementById('logoutButton').addEventListener('click', function () {
    localStorage.removeItem('isLoggedIn');
    window.location.href = '../html/index.html';
});

document.addEventListener('DOMContentLoaded', function () {
    var loginButton = document.getElementById('loginButton');
    var accountDropdown = document.getElementById('accountDropdown');
    var isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

    if (isLoggedIn) {
        loginButton.style.display = 'none';
        accountDropdown.style.display = 'block';
    } else {
        loginButton.style.display = 'block';
        accountDropdown.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var loginButton = document.getElementById('loginButton');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault();
        $('#loginModal').modal('show');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', function () {
        localStorage.removeItem('isLoggedIn');
        window.location.href = '../html/index.html';
    });
});
