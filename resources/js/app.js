require('./bootstrap');

function app() {

}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}