/*Stolen from Dyatlov :)))  */
    document.onselectstart=function(){return false} 
    document.oncontextmenu=function(){return false} 
    document.oncopy=function(){return false}
     /* event handler function */
    function addHandler(event, handler){
        if (document.attachEvent) {
            document.attachEvent('on' + event, handler);
        }
        else if (document.addEventListener) {
            document.addEventListener(event, handler, false);
        }
    }
    function killSelection(){
        if (window.getSelection) {
            window.getSelection().removeAllRanges();
        }
        else if (document.selection && document.selection.clear) {
          document.selection.clear();
        }
    }
    function noSelectionEvent(event) {
        var event = event || window.event;
     
        /* Block Ctrl+A и Ctrl+U events */
        var key = event.keyCode || event.which;
        if  ( (event.ctrlKey && (key == 65 || key == 85)) || (key == 91 && (key == 65 || key == 85)) ) {
            killSelection();
            if (event.preventDefault) { event.preventDefault(); }
            else { event.returnValue = false; }
            return false;
        }
    }
    addHandler('keydown', noSelectionEvent);
    addHandler('keyup', noSelectionEvent);