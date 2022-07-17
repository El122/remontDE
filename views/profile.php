<?php include "views/components/header.php"; ?>

<main>
    <section class="profileInfo">
        <div class="container">
            <div class="info">
                <h2>Добро пожаловать, <?= $_SESSION["fio"] ?></р>
            </div>
        </div>
    </section>
    <section id="orders">
        <div class="container">
            <div class="title">
                <h2>Ваши заявки</h2>
                <button onclick="openModal('newOrderModal')">Добавить заявку</button>
            </div>
            <div class="filter">
                <span>Отфильтровать</span>
                <select id="filter">
                    <option value="all">Все заявки</option>
                    <option value="newOrder">Новая</option>
                    <option value="nowOrder">Ремонтируется</option>
                    <option value="finishedOrder">Отремонтировано</option>
                </select>
            </div>
            <div class="ordersContainer">
                <?php if (!empty($orders)) : ?>
                <?php while ($o = mysqli_fetch_assoc($orders)) : ?>
                <div class="card <?= setStat($o["o_stat"]) ?>">
                    <div class="stat <?= setStat($o["o_stat"]) ?>"><?= $o["o_stat"] ?></div>
                    <?php if ($o["o_stat"] == "Новая") : ?>
                    <button class="delBtn" onclick="delOrder('<?= $o['o_id'] ?>')">Удалить</button>
                    <?php endif; ?>
                    <div class="imgBox <?= $o["o_stat"] == "Отремонтировано" ? "boxAnimate" : "" ?> ">
                        <img src="<?= $PATH ?>uploadFiles/photoBefore/<?= $o["o_photoBefore"] ?>" alt="" class="img1">
                        <img src="<?= $PATH ?>uploadFiles/photoAfter/<?= $o["o_photoAfter"] ?>" alt="" class="img2">
                    </div>
                    <div class="info">
                        <div><b>Категория: </b><span><?= $o["c_name"] ?></span></div>
                        <div><b>Временная метка: </b><span><?= $o["o_date"] ?></span></div>
                        <?php if (!empty($o["o_finishProce"])) : ?>
                        <div><b>Согласованная цена: </b><span><?= $o["o_finishProce"] ?></span></div>
                        <?php else : ?>
                        <div><b>Предложенная цена: </b><span><?= $o["o_maxPrice"] ?></span></div>
                        <?php endif; ?>
                        <div><b>Адрес: </b><span><?= $o["o_address"] ?></span></div>
                        <div><b>Описание: </b><br><span><?= $o["o_desc"] ?></span></div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <p class="empty">Заявок пока нет</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php include "views/components/footer.php"; ?>