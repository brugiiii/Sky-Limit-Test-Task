$('button[type="submit"]').on('click', function (e) {
    e.preventDefault();

    const button = $(e.target);

    const form = $(this).closest('form');
    const telInput = form.find('input[type="tel"]');
    const nameInput = form.find('input[name="name"]');

    const telNumber = telInput.intlTelInput('getNumber');
    const telIso = telInput.intlTelInput('getSelectedCountryData').iso2;
    const isValidTelNumber = intlTelInputUtils.isValidNumber(telNumber, telIso);

    isValidTelNumber ? telInput.addClass('valid') : telInput.addClass('invalid');

    const nameValue = nameInput.val().trim();
    const isValidName = (nameValue !== '' && /^[a-zA-Zа-яА-Я\s]+$/.test(nameValue));

    isValidName ? nameInput.addClass('valid') : nameInput.addClass('invalid');

    if (isValidTelNumber && isValidName) {
        const formData = {
            action: 'send_mail',
            name: nameValue,
            phone: telNumber,
        };

        form[0].reset();
        button.prop('disabled', true);

        const ctaWrapper = $('.cta__wrapper');

        ctaWrapper.addClass('loading');

        $.ajax({
            type: 'POST',
            url: settings.ajax_url,
            data: formData,
            success: function(response) {
                ctaWrapper.addClass('mail-send');
                ctaWrapper.removeClass('loading');

                button.prop('disabled', false);
            },
            error: function(error) {
                console.error('Error submitting form', error);
            }
        });
    }
});

$('input').on("input", function () {
    const $this = $(this);
    if ($this.hasClass("invalid")) {
        $this.removeClass("invalid");
    }

    if ($this.hasClass("valid")) {
        $this.removeClass("valid");
    }
});