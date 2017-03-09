<div id ="pop-up-box" tabindex="1" onkeydown="if(event.keyCode == 27) displayPopUpBox('none');">
    <div id = "top">
        <p id = "makeInline"> Add a new event </p>
        <i onclick="displayPopUpBox('none')" id = "floatRight" class="fa fa-times fa-lg" aria-hidden="true"></i>
    </div>
    <div id  = "middle">
        <p> Enter event name: </p>
         <input autofocus id = "pop-up-input" type="text" name="eventName" onkeydown="if(event.keyCode == 13) addEvent();">
    </div>
    <div id = "bottom">
        <div id = "positionLeft">
            <a class="pop-up-a" id = "add-event-btn" onclick="addEvent()" href="#"> Add Event </a>
            <a class="pop-up-a" id = "cancel-btn" onclick="displayPopUpBox('none')" href="#"> Cancel </a>
        </div>
    </div>
</div>
<div onclick="displayPopUpBox('none')"id ="screen"> </div>
