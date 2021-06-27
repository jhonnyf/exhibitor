import axios from "axios";

const Form = function () {

    const formAjax = function () {
        let element = $(this);

        axios.put(element.attr('action'), element.serialize())
            .then(function (response) {
                let data = response.data;

                element.prepend('<div class="alert alert-success" role="alert">' + data.message + '</div>');
            });

        return false;
    }

    return {
        init: function () {
            $(document).on('submit', '.form-ajax', formAjax);
        }
    }

}();

export { Form }