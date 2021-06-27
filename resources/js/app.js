const { File } = require('./components/file');
const { Form } = require('./components/form');

require('./bootstrap');

function app() {
    File.init();
    Form.init();
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}