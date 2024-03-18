<main>
    <section class="container home_faq_sec py-4" id="faq_sec">
        <div class="main-content">
            <div class="row">
                <div class="home_faq col-md-7">
                    <h3><span class="section-title"><?= !empty($this->lang->line('faq')) ? $this->lang->line('faq') : 'FAQ' ?></span></h3>
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($faq['data'] as $row) { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?= "h-" . $row['id'] ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= "c-" . $row['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?= html_escape($row['question']) ?>
                                    </button>
                                </h2>
                                <div id="<?= "c-" . $row['id'] ?>" class="accordion-collapse collapse" aria-labelledby="<?= "h-" . $row['id'] ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= html_escape($row['answer']) ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="faq_image">
                        <img src="<?= base_url('assets/front_end/modern/image/pictures/faq-img.png') ?>" alt="faq">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>