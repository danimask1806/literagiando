document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 117 ||
			 e.keyCode === 118 ||
             e.keyCode === 122 ||
             e.keyCode === 85 ||
             e.keyCode === 86 ||
             e.keyCode === 90 ||
             e.keyCode === 13 ||
             e.keyCode === 27 ||
             e.keyCode === 17)) {
            return false;
        } else {
            return true;
        }
};
