"use strict";

window.onload = function(){
    let searchField = document.getElementById("country");
    let countrySearchBtn = document.getElementById("countryLookup");
    let citySearchBtn = document.getElementById("cityLookup");
    let resultDiv = document.getElementById("result");

    countrySearchBtn.addEventListener("click", (event) => {
        let query = searchField.value;

        fetch(`${document.location.origin}` +
            `/world.php?country=${query}`)
        .then(res => res.text())
        .then(res => resultDiv.innerHTML = res)
        .catch(err => console.log(err));
    });

    citySearchBtn.addEventListener("click", (event) => {
        let query = searchField.value;

        fetch(`${document.location.origin}` +
            `/world.php?country=${query}&context=city`)
        .then(res => res.text())
        .then(res => resultDiv.innerHTML = res)
        .catch(err => console.log(err));
    });
} // End window.onload
