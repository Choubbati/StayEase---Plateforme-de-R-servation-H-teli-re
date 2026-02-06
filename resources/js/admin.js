let hotels = document.getElementById('hotelsBtn');7
let gerant = document.getElementById('GestionGerantsBtn');
let users = document.getElementById('usersBtn');
let roles = document.getElementById('rolesBtn');

hotels.addEventListener('click', function() {
    document.getElementById('dashboardMain').style.display = 'none';
    document.getElementById('hotels').style.display = 'block';
    document.getElementById('gerant').style.display = 'none';
    document.getElementById('users').style.display = 'none';
    document.getElementById('roles').style.display = 'none';
});

gerant.addEventListener('click', function() {
    document.getElementById('dashboardMain').style.display = 'none';
    document.getElementById('hotels').style.display = 'none';
    document.getElementById('gerant').style.display = 'block';
    document.getElementById('users').style.display = 'none';
    document.getElementById('roles').style.display = 'none';
});

users.addEventListener('click', function() {
    document.getElementById('dashboardMain').style.display = 'none';
    document.getElementById('hotels').style.display = 'none';
    document.getElementById('gerant').style.display = 'none';
    document.getElementById('users').style.display = 'block';
    document.getElementById('roles').style.display = 'none';
});

roles.addEventListener('click', function() {
    document.getElementById('dashboardMain').style.display = 'none';
    document.getElementById('hotels').style.display = 'none';
    document.getElementById('gerant').style.display = 'none';
    document.getElementById('users').style.display = 'none';
    document.getElementById('roles').style.display = 'block';
});