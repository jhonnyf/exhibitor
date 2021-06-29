import axios from "axios";

const File = function () {

    const form = function () {
        let element = $(this);

        Fancybox.show([
            {
                src: element.attr('href'),
                type: "ajax"
            },
        ]);

        return false;
    }

    const status = function () {
        let element = $(this);

        axios.post(element.attr('href'))
            .then(function (response) {
                let data = response.data

                let html = data.return.active === 1 ? '<i data-feather="check-circle"></i>' : '<i data-feather="circle"></i>';
                element.html(html);
                feather.replace();
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
            $(document).on('click', '.act-form', form);
            $(document).on('click', '.act-status', status);
            $(document).on('click', '.act-destroy', destroy);
        }
    }

}();

export { File }

File.init();