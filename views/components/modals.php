<div class="modal" id="authModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Авторизация</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST" id="authForm">
            <label for="authLogin">
                Логин <br>
                <input type="text" id="authLogin" placeholder="Логин" name="authLogin">
            </label>
            <label for="authPass">
                Пароль <br>
                <input type="password" id="authPass" placeholder="Пароль" name="authPass">
            </label>
            <span class="error" id="loginError" style="display: none;">
                <object data="views/assets/img/icons/error.svg" width="10" height="10"></object>
                Неправильный логин или пароль</span>
            <button class="mainBtn">Войти</button>
        </form>
        <button class="secondBtn" onclick="openModal('regModal')">Не зарегистрированы?</button>
    </div>
</div>

<div class="modal" id="regModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Регистрация</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST">
            <label for="regLogin">
                Логин <br>
                <input type="text" id="regLogin" placeholder="Логин" pattern="[A-Za-z\.]+$" required name="regLogin">
            </label>
            <span class="error" id="checkLoginError" style="display: none;">
                <object data="views/assets/img/icons/error.svg" width="10" height="10"></object>
                Логин занят</span>
            <label for="regfio">
                ФИО <br>
                <input type="text" id="regfio" placeholder="ФИО" pattern="[А-Яа-яЁё\s\-]+$" required name="regfio">
            </label>
            <label for="regEmail">
                E-mail <br>
                <input type="email" id="regEmail" placeholder="E-mail" required name="regEmail">
            </label>
            <label for="regPass">
                Пароль <br>
                <input type="password" id="regPass" placeholder="Пароль" required name="regPass">
            </label>
            <label for="regPass">
                Повторите пароль <br>
                <input type="password" id="regPass2" placeholder="Поаторите пароль" required name="regPass2">
            </label>
            <span class="error" id="passError" style="display: none;">
                <object data="views/assets/img/icons/error.svg" width="10" height="10"></object>
                Пароли различаются</span>
            <label for="regCheck" class="small">
                <input type="checkbox" id="regCheck" required>
                Согласие на обработку персональных данных
            </label>
            <button class="mainBtn" id="regBtn">Зарегистрироваться</button>
        </form>
        <button class="secondBtn" onclick="openModal('authModal')">Уже зарегистрированы?</button>
    </div>
</div>

<div class="modal" id="newOrderModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Новая заявка</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <label for="address">
                Адрес <br>
                <textarea id="address" placeholder="Адрес" required name="address"></textarea>
            </label>
            <label for="desc">
                Описание <br>
                <textarea id="desc" placeholder="Описание" required name="desc"></textarea>
            </label>
            <label for="cat">
                Категория <br>
                <?php include "views/components/catsSelect.php"; ?>
            </label>
            <label for="maxPrice">
                Максимальная цена <br>
                <input type="number" id="maxPrice" placeholder="Максимальная цена" required name="maxPrice">
            </label>
            <label for="photo">
                Фото <br>
                <input type="file" id="photo" placeholder="Фото" required name="photo">
            </label>
            <button class="mainBtn">Отправить</button>
        </form>
    </div>
</div>

<div class="modal" id="delOrderModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Вы уверены что хотите удалить заказ?</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST">
            <input type="hidden" name="delOrderId" />
            <button class="mainBtn">Да</button>
        </form>
        <button class="secondBtn close">Нет</button>
    </div>
</div>

<div class="modal" id="editOrderModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Редактировать заявку</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" id="editOrderId" name="editOrderId" />
            <label for="newCat">
                Категория <br>
                <?php include "views/components/catsSelect.php"; ?>
            </label>
            <label for="newStat">
                Статус <br>
                <select name="newStat" id="newStat">
                </select>
            </label>
            <label for="finishedPrice" id="finishedPriceContainer" style="display: none;">
                Предложенная цена <br>
                <input type="number" id="finishedPrice" placeholder="Максимальная цена" name="finishedPrice">
            </label>
            <label for="finishedPhoto" id="finishedPhotoContainer" style="display: none;">
                Фото <br>
                <input type="file" id="finishedPhoto" placeholder="Фото" name="finishedPhoto">
            </label>
            <button class="mainBtn">Сохранить</button>
        </form>
    </div>
</div>

<div class="modal" id="newCatModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Добавить категорию</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST">
            <label for="authLogin">
                Название <br>
                <input type="text" id="catName" placeholder="Название" name="catName">
            </label>
            <button class="mainBtn">Добавить</button>
        </form>
    </div>
</div>

<div class="modal" id="delCatModal" style="display: none;">
    <div class="container">
        <div class="title">
            <h2>Вы уверены что хотите удалить заказ?</h2>
            <button class="close">
                <img src="<?= $PATH ?>/img/icons/close.svg"></img>
            </button>
        </div>
        <form method="POST">
            <input type="hidden" name="delCatId" />
            <button class="mainBtn">Да</button>
        </form>
        <button class="secondBtn close">Нет</button>
    </div>
</div>