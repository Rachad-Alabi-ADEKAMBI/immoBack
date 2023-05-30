<?php
$current_url = $_SERVER['REQUEST_URI']; ?>


<div class="menu">
    <div class="menu__icon show" id="showMenu">
        open <i class="fas fa-chevron-down" onclick=showMenu()></i>
    </div>

    <div class="menu__icon close" id="closeMenu">
        close <i class="fas fa-chevron-up" onclick=closeMenu()></i>
    </div>
    <div class="menu__items" id="menu-list">
        <?php if (auth()->user()->role === 'admin') { ?>
        <div class="menu__items__item <?= $current_url == '/allAds'
            ? 'activee'
            : null ?>">
            <a class="btn btn-primary " href="/allAds">
                <i class="bi-list-task"></i> Annonces
            </a>
        </div>

        <div class="menu__items__item <?= $current_url == '/users'
            ? 'activee'
            : null ?>">
            <a class="btn btn-primary " href="/users">
                <i class="bi bi-people-fill"></i> Utilisateurs
            </a>
        </div>

        <div class="menu__items__item <?= $current_url == '/profile'
            ? 'activee'
            : null ?>">
            <a class="btn btn-primary " href="/allAds">
                <i class="bi bi-gear"></i> Paramètres
            </a>
        </div>



        </ul>
        <?php } else { ?>
        <div class="menu__items__item">
            <a class=" <?= $current_url == '/newAdView'
                ? 'activee'
                : null ?> btn btn-primary " href="/newAdView">
                <i class="fas fa-money-bill-trend-up"></i> Nouvelle annonce
            </a>
        </div>

        <a class=" <?= $current_url == '/myAds'
            ? 'activee'
            : null ?> btn btn-primary " href="/myAds">
            <i class="fas fa-money-bill-trend-up"></i> Mes annonces
        </a>

        <div class="menu__items__item <?= $current_url == '/'
            ? 'activee'
            : null ?>">
            <a class="btn btn-primary " href="/myAds">
                <i class="fas fa-money-bill-trend-up"></i> Paramètres
            </a>
        </div>
        <?php } ?>
    </div>

</div>