/**
 *  @author Eugene Terentev <eugene@terentev.net>
 */


$('#phone').intlTelInput({
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: "body",
    // excludeCountries: ["us"],
    formatOnDisplay: false,
//         geoIpLookup: function(callback) {
//           $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
//             var countryCode = (resp && resp.country) ? resp.country : "";
//             callback(countryCode);
//           });
//         },
    // hiddenInput: "full_number",
//         initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    //nationalMode: false,
    onlyCountries: ['ru', 'us', 'en', 'ch', 'de'],
    placeholderNumberType: 'MOBILE',
    preferredCountries: ['ru', 'us'],
    separateDialCode: true,
    // utilsScript: '<?= $bundlePath->baseUrl;?>/tonnel/utils.js"
});