const { File } = require('./components/file');

require('./bootstrap');

function app() {
    File.init();
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}