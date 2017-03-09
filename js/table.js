function loadTable(keys, responce) {
    var table = document.getElementsByTagName("table");
    var tr = document.createElement("tr");

    keys.forEach(function (key) {
        var th = document.createElement("th");
        var textNode = document.createTextNode(key);
        th.appendChild(textNode);
        tr.appendChild(th);
    });

    responce.forEach(function(row) {
        var i = 0;
        row.forEach(function(entry) {
            var value = entry.keys[i++];
            var tr = document.createElement("tr");
            var td = document.createElement("td");
            var textNode = document.createTextNode(value);
            td.appendChild(textNode);
            tr.appendChild(td);
        });
        table.appendChild(tr);
    });
}

function addTableEntry() {
    var table = document.getElementsByTagName("table")[0];
    var inputs = document.querySelectorAll("#middle > input");
    if (inputs.length == 0) {
        inputs = document.querySelectorAll("#middle > div > input");
    }
    var tbody = document.getElementsByTagName("tbody")[0];
    var tr = document.createElement("tr");
    tr.className = "tr-color";

    inputs.forEach(function(input){
        var value = input.value;
        var td = document.createElement("td");
        var a = document.createElement("a");
        a.href = "#";
        var textNode = document.createTextNode(value);
        a.appendChild(textNode);
        td.appendChild(a);
        tr.appendChild(td);
    });
    tbody.appendChild(tr);
    displayPopUpBox("none");
}
function displayPopUpBox(displayType) {
    var popUpBox = document.getElementById("pop-up-box");
    popUpBox.style.display = displayType;
    var entireScreen = document.getElementById("screen");
    entireScreen.style.display = displayType;
    entireScreen.setAttribute("onclick", "displayPopUpBox('none')");
    var inputs = document.querySelectorAll("#middle > input");
    if (inputs.length == 0) {
        inputs = document.querySelectorAll("#middle > div > input");
    }
    inputs[0].focus();
    inputs.forEach(function(input) { input.value = ""; });
}
