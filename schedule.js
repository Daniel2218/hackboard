addLoadEvent(function () {
    var date = new Date();
	var month = date.getMonth();
	var year = date.getFullYear();
    createSced(month, year);
});

var currentDate = new Date();
var currentMonth = currentDate.getMonth();
var currentYear = currentDate.getFullYear();

function createSced(month, year) {
    var date = new Date();
    var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
    var days = getDaysInMonth(month, year);
    var daysLastMonth = getDaysLastMonth(1, month, year);
    days = daysLastMonth.concat(days);

    if (document.contains(document.getElementById("schedule"))) {
        document.getElementById("schedule").remove();
    }

    var scedTitle = document.getElementById("scedTitle");
    scedTitle.innerHTML = getMonthText(currentMonth) + " " + currentYear;

    var table = document.createElement("table");
    table.id = "schedule";
    table.style.width = "100%";
    var tr = document.createElement("tr");
    var weekDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    for(var i = 0; i < weekDays.length; i++) {
        var weekDay = weekDays[i];
        var th = document.createElement("th");
        var textNode = document.createTextNode(weekDay);
        th.appendChild(textNode);
        tr.appendChild(th);
    }
    table.appendChild(tr);

    var tr = document.createElement("tr");
    var opacityCount = daysLastMonth.length;
    for(var i = 0; i < days.length; i++) {
        var day = days[i].getDate();
        var textNode = document.createTextNode(day);
        var td = document.createElement("td");
        if (opacityCount > 0) {
            td.style.opacity = "0.3";
            --opacityCount;
        }
        if(days[i].getDate() == d &&  days[i].getMonth() == m &&
           days[i].getFullYear() == y) {
            td.style.background = "#eeeeee";
        }
        td.setAttribute("ondrop", "drop(event)");
        td.setAttribute("ondragover", "allowDrop(event)");
        td.appendChild(textNode);
        tr.appendChild(td);

        if((i + 1) % 7 == 0) {
            table.appendChild(tr);
            var tr = document.createElement("tr");
        }
    }
    table.appendChild(tr);
    var scheduleContainer = document.getElementById("scheduleContainer");
    scheduleContainer.appendChild(table);
}
function getDaysInMonth(month, year) {
     var date = new Date(year, month, 1);
     var days = [];
     while (date.getMonth() === month) {
        days.push(new Date(date));
        date.setDate(date.getDate() + 1);
     }
     return days;
}
function getDaysLastMonth(day, month, year) {
    var date = new Date(year, month, day);
    var days = [];

    while (date.getDay() != 0) {
        date.setDate(date.getDate() - 1);
        days.push(new Date(date));
    }
    return days.reverse();
}
function arrow(minus) {
    currentMonth =  (currentMonth - 1) * minus
                    + (currentMonth + 1) * !minus ;
    if (currentMonth == -1) {
        currentMonth = 11;
        currentYear = currentYear - 1;
    }
    if (currentMonth == 12) {
        currentMonth = 0;
        currentYear = currentYear + 1;
    }
    createSced(currentMonth, currentYear);
}
function getMonthText(month) {
    if (month === 11) {
        return "December";
    } else if (month === 10) {
        return "November";
    } else if (month === 9) {
        return "October";
    } else if (month === 8) {
        return "September";
    } else if (month === 7) {
        return "August";
    } else if (month === 6) {
        return "July";
    } else if (month === 5) {
        return "June";
    } else if (month === 4) {
        return "May";
    } else if (month === 3) {
        return "April";
    } else if (month === 2) {
        return "March";
    } else if (month === 1) {
        return "Feburary";
    } else if (month === 0) {
        return "January";
    }
}
function displayPopUpBox(displayType) {
    var popUpBox = document.getElementById("pop-up-box");
    if (displayType != 'none') popUpBox.focus();
    popUpBox.style.display = displayType;
    document.getElementsByName('eventName')[0].value = "";
    var entireScreen = document.getElementById("screen");
    entireScreen.style.display = displayType;
}
function addEvent() {
    var inputText = document.getElementsByName('eventName')[0].value;
    displayPopUpBox("none");
    var div = document.createElement("div");
    div.innerHTML = inputText;
    div.style.background = "black";
    div.style.color = "white";
    div.style.display = "inline-block";
    div.style.padding = "4px 6px";
    div.style.fontSize = "12px";
    div.style.fontWeight = "bold";
    div.style.marginLeft = "5px";
    div.style.marginBottom = "5px";
    div.style.fontFamily = "Open Sans, sans-serif";
    div.draggable = "true";
    div.addEventListener('dragstart', function() {drag(event)}, false);
    div.id = "drag1";
    document.getElementById("eventContainer").appendChild(div);
}
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("text/plain", ev.target.id);
}
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var element = document.getElementById(data);
    element.style.background = "#fb7a2c";
    element.style.fontSize = "12px";
    element.style.display = "block";
    element.style.width = "95%";
    element.style.padding = "6px 4px";
    element.style.marginTop = "2px";
    element.style.marginLeft = "0";
    element.style.marginBottom = "0";
    element.style.textAlign = "left";
    element.style.fontWeight = "normal";
    ev.target.appendChild(document.getElementById(data));
}
