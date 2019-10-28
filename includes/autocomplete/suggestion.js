function suggestion(inp, arr) {

    var current;
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        closeList();
        if (!val) { return false; }
        current = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.addEventListener("click", function () {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeList();
                });
                a.appendChild(b);
            }
        }
    });

    inp.addEventListener("active",function(){
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
                b = document.createElement("DIV");
                b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.addEventListener("click", function () {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeList();
                });
                a.appendChild(b);
            
        }
    })

    function closeList(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    document.addEventListener("click", function (e) {
        closeList(e.target);
    });
}

var url = 'http://localhost/php_rest_jobSearch/api/city/read.php'
fetch(url).then(response => {
    return response.json();
}).then(data => {
    var cities = []
     var citiesArr = data.data
    citiesArr.forEach(data => {
        cities.push(data.name)
    });
    suggestion(document.getElementById("search"), cities);
}).catch(err => {
    console.log(err)
})




