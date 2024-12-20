<link rel="stylesheet" href="/css/modals/auth_modal.css">

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Вход</h2>
        <form id="loginForm">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="button" id="submitLogin">Войти</button>
        </form>
    </div>
</div>

<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Регистрация</h2>
        <form id="registerForm">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="User">User</option>
                <option value="Investor">Investor</option>
            </select>
            <button type="button" id="submitRegister">Зарегистрироваться</button>
        </form>
    </div>
</div>
