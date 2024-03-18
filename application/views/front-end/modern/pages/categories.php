<main>
    <section class="container py-4">
        <div class="mb-4">
            <h3 class="section-title"><?= label('category', 'Categorises') ?></h3>
        </div>
        <div class="row g-4">
            <?php foreach ($categories as $key => $row) { 
                ?>
                <div class="col-xl-4 col-md-6 col-12">
                    <a href="<?= base_url('products/category/' . html_escape($row['slug'])) ?>">
                        <div class="categorises-container">
                            <div class="categorises-banner-img">
                                <img src="<?= $row['banner'] ?>" alt="">
                            </div>
                            <div class="overlay"></div>
                            <div class="category-body">
                                <h3><?= html_escape($row['name']) ?></h3>
                                <button class="btn btn-primary explore-btn"><?= label('explore', 'Explore') ?></button>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
</main>