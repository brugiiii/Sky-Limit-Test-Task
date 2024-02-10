let masks = {};

const inputElements = $('input[type="tel"]');

inputElements.each(function () {
    const input = $(this);
    const maskPlaceholder = input.attr('data-mask-placeholder');

    input.intlTelInput({
        geoIpLookup: function (callback) {
            $.get("http://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        initialCountry: "UA",
        preferredCountries: ['UA', "PL", "SK", "HU", "MD", "RO"],
        excludeCountries: ['RU', "BY"],
        separateDialCode: true
    });

    // Отримання країни за допомогою intlTelInput
    const selectedCountry = input.intlTelInput('getSelectedCountryData');
    const dialCode = selectedCountry.dialCode;
    let maskNumber = intlTelInputUtils.getExampleNumber(selectedCountry.iso2, 0, 0);

    if (maskNumber) {
        maskNumber = intlTelInputUtils.formatNumber(maskNumber, selectedCountry.iso2, 2);
        maskNumber = maskNumber.replace('+' + dialCode + ' ', '');
        const mask = maskNumber.replace(/[0-9+]/ig, '0');

        input.mask(mask, { placeholder: maskNumber });
        masks[input.attr('id')] = mask;
    }

    // Обробник події countrychange
    input.on('countrychange', function (e) {
        const selectedCountry = input.intlTelInput('getSelectedCountryData');
        const dialCode = selectedCountry.dialCode;
        let maskNumber = intlTelInputUtils.getExampleNumber(selectedCountry.iso2, 0, 0);

        input.val('');

        if (maskNumber) {
            maskNumber = intlTelInputUtils.formatNumber(maskNumber, selectedCountry.iso2, 2);
            maskNumber = maskNumber.replace('+' + dialCode + ' ', '');
            const mask = maskNumber.replace(/[0-9+]/ig, '0');

            input.mask(mask, { placeholder: maskNumber });
            masks[input.attr('id')] = mask;
        }
    });
});