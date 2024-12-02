document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("loginBtn");
    const registerBtn = document.getElementById("registerBtn");
    const loginModal = document.getElementById("loginModal");
    const registerModal = document.getElementById("registerModal");
    const closeButtons = document.querySelectorAll(".close");

    if (loginBtn && loginModal) {
        loginBtn.addEventListener("click", () => {
            loginModal.style.display = "flex";
        });
    } else {
        console.error("Login button or modal not found!");
    }

    if (registerBtn && registerModal) {
        registerBtn.addEventListener("click", () => {
            registerModal.style.display = "flex";
        });
    } else {
        console.error("Register button or modal not found!");
    }

    closeButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (btn.closest(".modal")) {
                btn.closest(".modal").style.display = "none";
            }
        });
    });

    window.addEventListener("click", (event) => {
        if (event.target === loginModal) {
            loginModal.style.display = "none";
        }
        if (event.target === registerModal) {
            registerModal.style.display = "none";
        }
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    // Обработка формы логина
    document.getElementById("submitLogin").addEventListener("click", async () => {
        const formData = new FormData(loginForm);
        const response = await fetch('/user/login', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            alert("Вы успешно вошли!");
            window.location.reload(); // Перезагрузка страницы (если нужно)
        } else {
            alert(result.message || "Ошибка входа");
        }
    });

    // Обработка формы регистрации
    document.getElementById("submitRegister").addEventListener("click", async () => {
        const formData = new FormData(registerForm);
        const response = await fetch('/user/register', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            alert("Вы успешно зарегистрировались!");
            window.location.reload(); // Перезагрузка страницы (если нужно)
        } else {
            alert(result.message || "Ошибка регистрации");
        }
    });
});
