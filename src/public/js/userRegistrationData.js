validate.extend(validate.validators.datetime, {
    parse: function (value, options) {
        return +moment.utc(value);
    },

    format: function (value, options) {
        var format = options.dateOnly ? "YYYY-MM-DD" : "YYYY-MM-DD hh:mm:ss";
        return moment.utc(value).format(format);
    }
});

validate.validators.telMask = function (value, options, key, attributes) {
    if (!options) {
        return null;
    }
    var telInput = $('[name = ' + key + ']');
    if ($.trim(telInput.val())) {
        if (telInput.intlTelInput("isValidNumber")) {
            return null;
        }
    }
    return "wrong telephone format";
};

var constraints = {
    firstname: {
        presence: true,
        length: {
            minimum: 2,
            maximum: 80
        }
    },

    lastname: {
        presence: true,
        length: {
            minimum: 2,
            maximum: 80
        }
    },

    birthdate: {
        presence: true,       
    },

    reportsubject: {
        presence: true,
        length: {
            minimum: 2,
            maximum: 255
        }
    },

    country: {
        presence: true,
        length: {
            maximum: 80
        }
    },

    phone: {
        presence: true,
        telMask: true
    },

    email: {
        presence: true,
        email: true,
        length: {
            maximum: 80
        }
    }
};

var form = document.querySelector("#userRegistrationData");

var inputs = form.querySelectorAll("input, textarea, select");
for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function (ev) {
        var errors = validate(form, constraints) || {};
        showErrorsForInput(this, errors[this.name])
    });
}

function handleFormSubmit(form, input) {
    var errors = validate(form, constraints);
    showErrors(form, errors || {});
    return !errors;
}

function showErrors(form, errors) {

    form.querySelectorAll("input[name], select[name]").forEach(function (input) {
        showErrorsForInput(input, errors && errors[input.name]);
    });
}

function showErrorsForInput(input, errors) {
    var formGroup = closestParent(input.parentNode, "form-group");

    if (!formGroup) {
        return;
    }

    var messages = formGroup.querySelector(".messages"); 
    resetFormGroup(formGroup);

    if (errors) {
        formGroup.classList.add("has-error");
        errors.forEach(function (error) {
            addError(messages, error);
        });
    } else {
        formGroup.classList.add("has-success");
    }
}

function closestParent(child, className) {
    if (!child || child == document) {
        return null;
    }
    if (child.classList.contains(className)) {
        return child;
    } else {
        return closestParent(child.parentNode, className);
    }
}

function resetFormGroup(formGroup) {

    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");

    formGroup.querySelectorAll(".help-block.error").forEach(function (el) {
        el.parentNode.removeChild(el);
    });
}

function addError(messages, error) {
    var block = document.createElement("p");
    block.classList.add("help-block");
    block.classList.add("error");
    block.innerText = error;
    messages.appendChild(block);
}

var flag = 'showSecondForm';

$('#userAdditionalInfo').hide();
$('#button-social-network').hide();

if (localStorage.getItem(flag)) {
    $('#userRegistrationData').hide();
    $('#userAdditionalInfo').show();
}

$('#userRegistrationData').on('submit', function (event) {
    event.preventDefault();
    var formValid = handleFormSubmit(form);

    if (formValid) {
        var userRegistrationData = $("#userRegistrationData").serialize();

        var settings = {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        };

        axios.post('/participant', userRegistrationData, settings)
            .then(function (response) {
                $('#form-container').html(response.data);
            })
            .catch(function (error) {
               if (!error.response.hasOwnProperty('data')) {
                  console.log(error.response);
                  return;
               }
               setErrors(error.response.data);
            });
    }
});

function setErrors(data) {
    $('.form-errors').remove();

    for(var field in data) {
        var errors = document.createElement("small");

        $(errors)
            .addClass('form-errors')
            .text(data[field]);

        $('#' + field).after(errors);
    }
}
