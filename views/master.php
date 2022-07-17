<?php include "views/components/header.php"; ?>

<main>
    <section class="profileInfo">
        <div class="container">
            <div class="info">
                <h2>Панель управления</р>
            </div>
        </div>
    </section>
    <section id="cats">
        <div class="container">
            <div class="title">
                <h2>Управление категориями</h2>
                <button onclick="openModal('newCatModal')">Добавить категорию</button>
            </div>
            <div class="catsContainer">
                <?php while ($c = mysqli_fetch_assoc($allCats)) : ?>
                    <div class="card">
                        <div class="text">
                            <h3><?= $c["c_name"] ?></h3>
                            <p><i><?= getOrdersCount($c["c_id"]) ?> заявок</i></p>
                        </div>
                        <button class="del" onclick="delCat('<?= $c['c_id'] ?> ')">
                            <img src="<?= $PATH ?>/img/icons/close.svg"></img>
                        </button>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <section id="orders">
        <div class="container">
            <div class="title">
                <h2>Управление заявками</h2>
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
                            <button class="editBtn" onclick="editOrder('<?= $o['o_id'] ?>', '<?= $o['o_stat'] ?>')">Редактировать</button>
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