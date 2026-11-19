</main>

<footer class="site-footer">
    <div class="wrap">
        <?php if (empty($hide_footer_cta)): ?>
        <div class="footer-cta">
            <div>
                <h2>Soutenez la mission de l'Église dans l'archipel</h2>
                <p>Chaque don aide nos paroisses, nos jeunes et les familles les plus vulnérables.</p>
            </div>
            <div class="btn-row">
                <a class="btn btn-gold" href="donation.php"><i class="fa-solid fa-heart" aria-hidden="true"></i> Faire un don</a>
                <a class="btn btn-ghost" href="contact.php">Nous écrire</a>
            </div>
        </div>
        <?php endif; ?>

        <div class="footer-grid">
            <div>
                <a class="brand" href="index.php">
                    <img src="images/lologo.jpeg" alt="" width="50" height="50" loading="lazy">
                    <span class="brand-text"><strong>Vicariat Apostolique</strong><small>de l'Archipel des Comores</small></span>
                </a>
                <p>Annoncer l'Évangile, servir les communautés chrétiennes et promouvoir la foi, l'espérance et la charité dans tout l'archipel.</p>
                <?php $socials = social_links(); if ($socials): ?>
                    <div class="social-row">
                        <?php foreach ($socials as $s): ?>
                            <a href="<?= e($s[0]) ?>" target="_blank" rel="noopener" aria-label="<?= e($s[2]) ?>"><i class="<?= e($s[1]) ?>" aria-hidden="true"></i></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div>
                <h3>Le Vicariat</h3>
                <ul>
                    <li><a href="aprops.php">À propos</a></li>
                    <li><a href="parishes.php">Paroisses</a></li>
                    <li><a href="programs.php">Programmes</a></li>
                    <li><a href="donation.php">Faire un don</a></li>
                </ul>
            </div>

            <div>
                <h3>Actualité</h3>
                <ul>
                    <li><a href="news.php">Actualités</a></li>
                    <li><a href="events.php">Événements</a></li>
                    <li><a href="garellyUI.php">Galerie</a></li>
                    <li><a href="media.php">Médiathèque</a></li>
                    <li><a href="search.php">Rechercher</a></li>
                </ul>
            </div>

            <div>
                <h3>Contact</h3>
                <ul class="footer-contact">
                    <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span><?= e(setting('address')) ?></span></li>
                    <li><i class="fa-solid fa-phone" aria-hidden="true"></i><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', setting('phone'))) ?>"><?= e(setting('phone')) ?></a></li>
                    <li><i class="fa-regular fa-envelope" aria-hidden="true"></i><a href="mailto:<?= e(setting('email')) ?>"><?= e(setting('email')) ?></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© <?= date('Y') ?> <?= e(setting('site_name')) ?></p>
            <p><a href="login.php">Espace administration</a></p>
        </div>
    </div>
</footer>

<script src="js/site.js?v=20261119.2" defer></script>
<?php if (!empty($page_scripts)) { echo $page_scripts; } ?>
</body>
</html>
