document.getElementById('login-form').addEventListener('submit', (e) => {
    e.preventDefault(); 

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    if (email === "admin@admin.com" && password === "1234") {
        
        window.location.href = "./dashboard.php"; 
        
    } else {
        alert("E-mail ou senha incorretos!");
    }
});
