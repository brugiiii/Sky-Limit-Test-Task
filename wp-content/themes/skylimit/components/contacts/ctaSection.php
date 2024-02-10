<section>
    <div class="container">
        <h2 class="text-center mb-3">
            Lorem ipsum dolor sit amet.
        </h2>
        <p class="w-75 mx-auto mb-5 text-center">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad animi eveniet rerum! Amet aut corporis,
            deserunt earum eligendi esse fugit labore laborum laudantium molestiae quasi quisquam ratione sit tempore.
            Lorem ipsum dolor.
        </p>
        <div class="cta__wrapper position-relative">
            <form class="cta-form mx-auto d-flex gap-3 flex-column w-25"
                  action="<?php echo admin_url('admin-ajax.php'); ?>"
                  method="post">
                <input class="cta-form__input" type="text" name="name" placeholder="Едуард"/>
                <input class="cta-form__input" type="tel" name="phone"/>
                <button class="cta-form__button border-0" type="submit">
                    Надіслати
                </button>
            </form>
            <div class="thank-you position-absolute top-50 start-50 translate-middle w-100">
                <h3 class="text-center">
                    Дякуємо!
                </h3>
                <p class="text-center">
                    Найближчим часом ми з вами звяжемось
                </p>
            </div>
            <div class="loader">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
</section>