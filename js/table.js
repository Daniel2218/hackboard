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
    var inputs = document.querySelectorAll("#middle > div > input");
    var tbody = document.getElementsByTagName("tbody")[0];
    var tr = document.createElement("tr");
    tr.className = "tr-color";
    var postData = new Object();
    var i = 0;
    var arr = inputs;
    if(document.URL.replace(/^.*[\\\/]/, '').slice(0,-5) == "prizes"){
        var arr = Array.prototype.slice.call(inputs);
        arr.shift();
    }

    arr.forEach(function(input){
        var value = input.value;
        postData[i++] = input.value;
        var td = document.createElement("td");
        var a = document.createElement("a");
        a.href = "#";
        var textNode = document.createTextNode(value);
        a.appendChild(textNode);
        td.setAttribute("contenteditable", true);
        td.appendChild(a);
        tr.appendChild(td);
    });
    tbody.appendChild(tr);
    displayPopUpBox("none");
    insertRequest(postData);
}
function displayPopUpBox(displayType) {
    var popUpBox = document.getElementById("pop-up-box");
    popUpBox.style.display = displayType;
    var entireScreen = document.getElementById("screen");
    entireScreen.style.display = displayType;
    entireScreen.setAttribute("onclick", "displayPopUpBox('none')");
    var inputs = document.querySelectorAll("#middle > input");

    if (inputs.length == 0) { inputs = document.querySelectorAll("#middle > div > input"); }

    inputs[0].focus();
    inputs.forEach(function(input) { input.value = ""; });
}

function insertRequest(postData) {
    postData.endpoint = document.URL.replace(/^.*[\\\/]/, '').slice(0,-5) + "/add";
    console.log(postData.endpoint);
    $.ajax({
        url:"requests.php",
        data: {postData},
        type: 'post',
        success: function(data) {
            // alert(data);
            location.reload();
        }
    });
}

function deleteRow(row) {
    var tr = row.parentElement.parentElement.parentElement;
    var id = tr.childNodes[0].childNodes[0].innerHTML;
    var postData = new Object();
    postData.endpoint = document.URL.replace(/^.*[\\\/]/, '').slice(0,-5) + "/delete";
    postData.id = id;
    console.log(postData.endpoint);
    $.ajax({
        url:"requests.php",
        data: {postData},
        type: 'post',
        success: function(data) {
            // alert(data);
            // tr.remove();
            location.reload();
        }
    });
}

function updateRow(row) {
    var tr = row.parentElement.parentElement.parentElement;
    var id = tr.childNodes[0].childNodes[0].innerHTML;
    var inputVals = new Array();

    tr.childNodes.forEach(function(td){
        var value = td.childNodes[0].innerHTML;
        inputVals.push(value);
    });

    displayPopUpBox("block");
    var button = document.getElementById("add-event-btn");
    button.innerHTML = button.innerHTML.replace("Add", "Update");
    var inputs = document.querySelectorAll("#middle > input");
    if (inputs.length == 0) { inputs = document.querySelectorAll("#middle > div > input"); }
    var i = 0;

    inputs.forEach(function(input){
        input.value = inputVals[i++];
        input.setAttribute("onkeydown", "if(event.keyCode == 13) updateRowInBackEnd(); ");
    });
    // var cancelBtn = document.getElementById("cancel-btn");
    // cancel.setAttribute("onclick", "location.reload();");
    var screen = document.getElementById("screen");
    screen.setAttribute("onclick", "location.reload();");
    var screen = document.getElementById("screen");
    screen.setAttribute("onclick", "location.reload();");
    var closeIcon = document.getElementsByClassName("fa-times")[0];
    closeIcon.setAttribute("onclick", "location.reload();");
    var popUpBox = document.getElementById("pop-up-box");
    // popUpBox.setAttribute("onclick", "location.reload();");
    button.setAttribute("onclick", "updateRowInBackEnd();");
}

function updateRowInBackEnd() {
    var postData = {};
    postData.endpoint = document.URL.replace(/^.*[\\\/]/, '').slice(0,-5) + "/edit";
    console.log(postData.endpoint);
    var inputs = document.querySelectorAll("#middle > input");
    if (inputs.length == 0) { inputs = document.querySelectorAll("#middle > div > input"); }
    var i = 0;
    postData.values = [];
    inputs.forEach(function(input){
        postData.values.push(input.value);
    });

    $.ajax({
        url:"requests.php",
        data: {postData},
        type: 'post',
        success: function(data) {
            // alert(data);
            // location.reload();
            location.reload();
        }
    });

}
