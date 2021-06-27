import axios from "axios";
import { easing } from "jquery";

const File = function () {

    const status = function () {
        let element = $(this);

        axios.post(element.attr('href'))
            .then(function (response) {
                let data = response.data

                let html = data.return.active === 1 ? '<i class="far fa-dot-circle"></i>' : '<i class="far fa-circle"></i>';
                element.html(html);
            });

        return false;
    }

    const destroy = function () {
        let element = $(this);

        axios.post(element.attr('href'))
            .then(function (response) {
                let data = response.data

                element.closest('.file').slideToggle('slow', function () {
                    $(this).remove();
                });
            });

        return false;
    }

    return {
        init: function () {
            $(document).on('click', '.act-status', status);
            $(document).on('click', '.act-destroy', destroy);
        }
    }

}();

export { File }