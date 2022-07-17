<?php include "views/components/header.php"; ?>

<main>
    <section id="home">
        <div class="container">
            <div class="text">
                <h1>Ремонт квартир <br> и загородных домов</h1>
                <ul>
                    <li>Индивидуальные решения от лучших дизайнеров России</li>
                    <li>Длительность ремонта от 3 дней</li>
                    <li>Гарантия 10 лет</li>
                </ul>
                <button onclick="<?= empty($_SESSION["id"]) ? "openModal('authModal')" : "document.location.href = 'profile'" ?>">Сделать
                    заказ</button>
            </div>
        </div>
    </section>

    <section id="finishedOrders">
        <div class="container">
            <div class="title">
                <h2>Выполненные заказы</h2>
                <div class="counter"><?= $counter ?></div>
            </div>
            <div class="ordersContainer">
                <?php if (!empty($orders)) : ?>
                    <?php while ($o = mysqli_fetch_assoc($orders)) : ?>
                        <div class="card">
                            <div class="imgBox">
                                <img src="<?= $PATH ?>uploadFiles/photoBefore/<?= $o["o_photoBefore"] ?>" alt="" class="img1">
                                <img src="<?= $PATH ?>uploadFiles/photoAfter/<?= $o["o_photoAfter"] ?>" alt="" class="img2">
                            </div>
                            <div class="text">
                                <h3><?= $o["c_name"] ?></h3>
                                <p class="date"><?= $o["o_date"] ?></p>
                                <p><?= $o["o_address"] ?></p>
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