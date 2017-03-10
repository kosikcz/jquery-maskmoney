$(document).ready(function() {
    $('.nette-numeric').each(function () {
        var container = $(this);
        var prefix = 'maskmoney-';
        var options = {
            precision: container.data(prefix + 'precision'),
            decimal: container.data(prefix + 'decimal-separator'),
            thousands: container.data(prefix + 'thousand-separator'),
            prefix: container.data(prefix + 'prefix'),
            suffix: container.data(prefix + 'suffix'),
            affixesStay: container.data(prefix + 'affixes-stay'),
            allowZero: container.data(prefix + 'allow-zero'),
            allowNegative: container.data(prefix + 'allow-negative')
        };
        container.maskMoney(options);
    });
});