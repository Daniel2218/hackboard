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
