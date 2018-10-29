var countryData = $.fn.intlTelInput.getCountryData(),
  telInput = $("#phone"),
  addressDropdown = $("#country"); 


telInput.intlTelInput({
    initialCountry: "ua",
    nationalMode: false,  
    utilsScript: "/js/vendor/utils.js"
});


$.each(countryData, function(i, country) {
  addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
});

var initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
addressDropdown.val(initialCountry);

telInput.on("countrychange", function(e, countryData) {
  addressDropdown.val(countryData.iso2);
});


addressDropdown.change(function() {
  telInput.intlTelInput("setCountry", $(this).val());
});