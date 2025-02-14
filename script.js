document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;

    
        const lastName = document.getElementById("last_name");
        const lastNameError = document.getElementById("last_name_error");
        if (!/^[A-Za-z\s]+$/.test(lastName.value)) {
            lastNameError.textContent = "❌ Only letters and spaces allowed.";
            isValid = false;
        } else {
            lastNameError.textContent = "";
        }


        const firstName = document.getElementById("first_name");
        const firstNameError = document.getElementById("first_name_error");
        if (!/^[A-Za-z\s]+$/.test(firstName.value)) {
            firstNameError.textContent = "❌ Only letters and spaces allowed.";
            isValid = false;
        } else {
            firstNameError.textContent = "";
        }

    
        const middleInitial = document.getElementById("middle_initial");
        const middleInitialError = document.getElementById("middle_initial_error");
        if (!/^[A-Za-z]$/.test(middleInitial.value)) {
            middleInitialError.textContent = "❌ Only one letter allowed.";
            isValid = false;
        } else {
            middleInitialError.textContent = "";
        }

        // If validation fails, prevent form submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});



const form = document.querySelector("form"),
        nextBtn = document.querySelector(".nextBtn"),
        backBtn = document.querySelector(".backBtn"),
        allInput = document.querySelectorAll(".first input");

        nextBtn.addEventListener("click", ()=>{
            allInput.forEach(input =>{
                if(input.value != ""){
                    form.classList.add('secActive');
                }else{
                    form.classList.remove('secActive');
                }
            }) 

        })

        nextBtn.addEventListener("click", ()=>   form.classList.remove('secActive'));




        civilStatusSelect.addEventListener("change", function() {
            if (this.value === "Others") {
                othersInput.style.display = "block";
                othersInput.setAttribute("required", "true");
            } else {
                othersInput.style.display = "none";
                othersInput.removeAttribute("required");
            }
        });
        function toggleOthersField() {
            var status = document.getElementById("civil_status").value;
            var othersField = document.getElementById("others_input");
            if (status === "Others") {
                othersField.style.display = "block";
            } else {
                othersField.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {

            const civilStatus = document.getElementById("civil-status");

            const othersField = document.getElementById("others-field");

            civilStatus.addEventListener("change", function() {

                   othersField.style.display = this.value === "others" ? "block" : "none";

            });

});
function toggleOtherField() {
    var statusSelect = document.getElementById("civilStatus");
    var otherInput = document.getElementById("othersInput");

    if (statusSelect.value === "Others") {
        otherInput.style.display = "block";
        otherInput.setAttribute("required", "required"); 
    } else {
        otherInput.style.display = "none";
        otherInput.removeAttribute("required"); 
    }
}
document.addEventListener('DOMContentLoaded', function() {

    const countryList = [
        "Afghanistan",        "Albania",        "Algeria",        "American Samoa",        "Andorra",        "Angola",        "Anguilla",        "Antarctica",        "Antigua and Barbuda",        "Argentina",        "Armenia",        "Aruba",        "Australia",        "Austria",        "Azerbaijan",        "Bahamas (the)",        "Bahrain",        "Bangladesh",        "Barbados",        "Belarus",        "Belgium",        "Belize",        "Benin",        "Bermuda",        "Bhutan",        "Bolivia (Plurinational State of)",        "Bonaire, Sint Eustatius and Saba",        "Bosnia and Herzegovina",        "Botswana",        "Bouvet Island",        "Brazil",        "British Indian Ocean Territory (the)",        "Brunei Darussalam",        "Bulgaria",        "Burkina Faso",        "Burundi",        "Cabo Verde",        "Cambodia",        "Cameroon",        "Canada",        "Cayman Islands (the)",        "Central African Republic (the)",        "Chad",        "Chile",        "China",        "Christmas Island",        "Cocos (Keeling) Islands (the)",        "Colombia",        "Comoros (the)",        "Congo (the Democratic Republic of the)",        "Congo (the)",        "Cook Islands (the)",        "Costa Rica",        "Croatia",        "Cuba",        "Curaçao",        "Cyprus",        "Czechia",        "Côte d'Ivoire",        "Denmark",        "Djibouti",        "Dominica",        "Dominican Republic (the)",        "Ecuador",        "Egypt",        "El Salvador",        "Equatorial Guinea",        "Eritrea",        "Estonia",        "Eswatini",        "Ethiopia",        "Falkland Islands (the) [Malvinas]",        "Faroe Islands (the)",        "Fiji",        "Finland",        "France",        "French Guiana",        "French Polynesia",        "French Southern Territories (the)",        "Gabon",        "Gambia (the)",        "Georgia",        "Germany",        "Ghana",        "Gibraltar",        "Greece",        "Greenland",        "Grenada",        "Guadeloupe",        "Guam",        "Guatemala",        "Guernsey",        "Guinea",        "Guinea-Bissau",        "Guyana",        "Haiti",        "Heard Island and McDonald Islands",        "Holy See (the)",        "Honduras",        "Hong Kong",        "Hungary",        "Iceland",        "India",        "Indonesia",        "Iran (Islamic Republic of)",        "Iraq",        "Ireland",        "Isle of Man",        "Israel",        "Italy",        "Jamaica",        "Japan",        "Jersey",        "Jordan",        "Kazakhstan",        "Kenya",        "Kiribati",        "Korea (the Democratic People's Republic of)",        "Korea (the Republic of)",        "Kuwait",        "Kyrgyzstan",        "Lao People's Democratic Republic (the)",        "Latvia",        "Lebanon",        "Lesotho",        "Liberia",        "Libya",        "Liechtenstein",        "Lithuania",        "Luxembourg",        "Macao",        "Madagascar",        "Malawi",        "Malaysia",        "Maldives",        "Mali",        "Malta",        "Marshall Islands (the)",        "Martinique",        "Mauritania",        "Mauritius",        "Mayotte",        "Mexico",        "Micronesia (Federated States of)",        "Moldova (the Republic of)",        "Monaco",        "Mongolia",        "Montenegro",        "Montserrat",        "Morocco",        "Mozambique",        "Myanmar",        "Namibia",        "Nauru",        "Nepal",        "Netherlands (the)",        "New Caledonia",        "New Zealand",        "Nicaragua",        "Niger (the)",        "Nigeria",        "Niue",        "Norfolk Island",        "Northern Mariana Islands (the)",        "Norway",        "Oman",        "Pakistan",        "Palau",        "Palestine, State of",        "Panama",        "Papua New Guinea",        "Paraguay",        "Peru",        "Philippines (the)",        "Pitcairn",        "Poland",        "Portugal",        "Puerto Rico",        "Qatar",        "Republic of North Macedonia",        "Romania",        "Russian Federation (the)",        "Rwanda",        "Réunion",        "Saint Barthélemy",        "Saint Helena, Ascension and Tristan da Cunha",        "Saint Kitts and Nevis",        "Saint Lucia",        "Saint Martin (French part)",        "Saint Pierre and Miquelon",        "Saint Vincent and the Grenadines",        "Samoa",        "San Marino",        "Sao Tome and Principe",        "Saudi Arabia",        "Senegal",        "Serbia",        "Seychelles",        "Sierra Leone",        "Singapore",        "Sint Maarten (Dutch part)",        "Slovakia",        "Slovenia",        "Solomon Islands",        "Somalia",        "South Africa",        "South Georgia and the South Sandwich Islands",        "South Sudan",        "Spain",        "Sri Lanka",        "Sudan (the)",        "Suriname",        "Svalbard and Jan Mayen",        "Sweden",        "Switzerland",        "Syrian Arab Republic",        "Taiwan",        "Tajikistan",        "Tanzania, United Republic of",        "Thailand",        "Timor-Leste",        "Togo",        "Tokelau",        "Tonga",        "Trinidad and Tobago",        "Tunisia",        "Turkey",        "Turkmenistan",        "Turks and Caicos Islands (the)",        "Tuvalu",        "Uganda",        "Ukraine",        "United Arab Emirates (the)",        "United Kingdom of Great Britain and Northern Ireland (the)",        "United States Minor Outlying Islands (the)",        "United States of America (the)",        "Uruguay",        "Uzbekistan",        "Vanuatu",        "Venezuela (Bolivarian Republic of)",        "Viet Nam",        "Virgin Islands (British)",        "Virgin Islands (U.S.)",        "Wallis and Futuna",        "Western Sahara",        "Yemen",        "Zambia",        "Zimbabwe",        "Åland Islands"
    ];
    
        const selectElement = document.getElementById('country');
    
            countryList.forEach(country => {
                const option = document.createElement('option');
                option.value = country;
                option.textContent = country;
                selectElement.appendChild(option);
            });
    });
    document.addEventListener("DOMContentLoaded", function () {
        const fields = document.querySelectorAll("input, select");
    
        fields.forEach(field => {
            field.addEventListener("input", function () {
                document.getElementById(`error-${field.name}`)?.innerText = "";
            });
        });
    });