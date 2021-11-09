"use strict";

window.onload = function(){
    let searchField = document.getElementById("country");
    let searchBtn = document.getElementById("lookup");
    let resultDiv = document.getElementById("result");

    let onSearch = (event) => {
        let query = searchField.value;

        fetch(`${document.location.origin}/world.php?country=${query}`)
        .then(res => res.text())
        .then(res => resultDiv.innerHTML = res)
        .catch(err => console.log(err));
    };

    searchField.addEventListener("submit", onSearch);
    searchBtn.addEventListener("click", onSearch);
} // End window.onload
