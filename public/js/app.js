const errors = {
    "title": "Please select your Title",
    "forename": "Please enter Forename",
    "surname": "Please enter Surname",
    "gender": "Please select Gender",
    "dob": "Please enter Date of birth",
    "dob_pattern": "Wrong format should be dd/mm/yyyy",
    "email": "Please enter E-mail address",
    "email_pattern": "Please enter correct email",
    "password": "Please enter Password",
    "address_one": "Please enter your current Address",
    "country": "Please select your Country",
    "town": "Please enter your Town",
    "post_code": "Please enter your Post code",
    "from_date": "Current Address from Date",
    "from_date_pattern": "Wrong format should be dd/mm/yyyy",
    "until_date": "Current Address until Date",
    "until_date_pattern": "Wrong format should be dd/mm/yyyy",
    "addresses_length" : "Both address shuould be less 60 symbols",
    "password_confirmation" : "The password confirmation does not match."
}

const submitButton = document.getElementById('submit-button');
const registerForm = document.getElementById('register-form');

const datePattern = /([0-2]\d{1}|3[0-1])\/(0\d{1}|1[0-2])\/(19|20)\d{2}/;
const emailPattern = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

const picker = new Pikaday({
    field: document.getElementById('dob-picker'),
    format: 'DD/MM/YYYY',
    onSelect: function() {
	    from.config({minDate: this.getDate()});
	}
});

const from = new Pikaday({
    field: document.getElementById('from-picker'),
    format: 'DD/MM/YYYY',
    onSelect: function() {
	    until.config({minDate: this.getDate()});
	}
});

const until = new Pikaday({
    field: document.getElementById('until-picker'),
    format: 'DD/MM/YYYY'
});

function closeAllAlerts() {
    let validity = document.querySelectorAll('.validity'),
        i = 0;
    l = validity.length;

    for (i; i < l; i++) {
        validity[i].style.display = 'none';
    }
}

submitButton.addEventListener("click", function(e) {

    closeAllAlerts();

    let addressOne = document.getElementById('address-one').value.length;
    let addressTwo = document.getElementById('address-two').value.length;
    let addressesSymbolsCount = addressOne+addressTwo;

    let inputGroup = document.querySelectorAll('.input-group');
    i = 0;
    l = inputGroup.length;

    let valid = true,
        message = '';

    for (i; i < l; i++) {

        let validity = document.getElementById(inputGroup[i].name);

        if (!inputGroup[i].value) {
            valid = false;
            validity.style.display = "inline";
            validity.innerHTML = errors[inputGroup[i].name];
        }

        if (inputGroup[i].name == 'email' && inputGroup[i].value !== "") {
            if (!emailPattern.test(inputGroup[i].value)) {
                valid = false;
                validity.style.display = "inline";
                validity.innerHTML = errors[inputGroup[i].name + '_pattern'];
            }
        }

        if (inputGroup[i].name == 'dob' && inputGroup[i].value !== "") {
            if (!datePattern.test(inputGroup[i].value)) {
                valid = false;
                validity.style.display = "inline";
                validity.innerHTML = errors[inputGroup[i].name + '_pattern'];
            }
        }
        if (inputGroup[i].name == 'from_date' && inputGroup[i].value !== "") {
            if (!datePattern.test(inputGroup[i].value)) {
                valid = false;
                validity.style.display = "inline";
                validity.innerHTML = errors[inputGroup[i].name + '_pattern'];
            }
        }
        if (inputGroup[i].name == 'until_date' && inputGroup[i].value !== "") {
            if (!datePattern.test(inputGroup[i].value)) {
                valid = false;
                validity.style.display = "inline";
                validity.innerHTML = errors[inputGroup[i].name + '_pattern'];
            }
        }
		let passwordConfirm = document.getElementById('password_confirmation');


        if (inputGroup[i].name == 'password' && inputGroup[i].value !== "") {
	        if (inputGroup[i].value !== passwordConfirm.value) {
	                valid = false;
		            passwordValidity = document.getElementById('password');
		            passwordValidity.style.display = "inline";
		            passwordValidity.innerHTML = errors["password_confirmation"];
	        }
   		}

		if(addressTwo != 0){
	        if(addressesSymbolsCount > 59){
	                valid = false;
	                addressValidity = document.getElementById('address_one');
	                addressValidity.style.display = "inline";
	                addressValidity.innerHTML = errors["addresses_length"];       	
	        }
    	}


    }

    if (valid) {
        registerForm.submit();
    }
}, false);
