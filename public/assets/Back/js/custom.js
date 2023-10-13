/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': window.csrf_token
    }
});


function logout(){
    Swal.fire({
        title: 'Keluar Sistem ',
        text: 'Apakah anda yakin akan melakukan tindakan ini ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Kembali'
    }).then(result => {
        if (result.value){
            // Run axios to endpoint logout
            axios.post('/logout', [])
                .then(res => {
                    location.href = '/'
                }).catch(err => {
                console.log(err)
            })
        }
    })
}
function showLoader(text) {
    Swal.fire({
        text: text,
        allowOutsideClick: false,
        onBeforeOpen: function() {
            Swal.showLoading();
        }
    });
}

function disable_simpan() {
    $('#btn-simpan').prop('disabled', true);
}

function enable_simpan() {
    $('#btn-simpan').prop('disabled', false);
}

(function($) {

    $.fn.loadValue = function(data, exceptional, addition) {
        function isCheckbox(el) {

        }

        function isTextarea(el) {
            return (el.prop('tagName') == 'TEXTAREA');
        }

        function isRadio(el) {
            if (el.prop('tagName') == 'INPUT') {
                if (el.attr('type') == 'radio') {
                    return true;
                }
            }

            return false;
        }

        function isHidden(el) {
            if (el.prop('tagName') == 'INPUT') {
                if (el.attr('type') == 'hidden') {
                    return true;
                }
            }

            return false;
        }

        function isTypeable(el) {
            if (el.prop('tagName') == 'INPUT') {
                let acceptedType = [
                    'text', 'number', 'email'
                ];

                let type = el.attr('type');

                if (acceptedType.indexOf(type) > -1) {
                    return true;
                }
            } else if (el.prop('tagName') == 'TEXTAREA') {
                return true;
            }

            return false;
        }

        function exceptional_exists(key) {
            if (exceptional) {
                if (exceptional[key]) {
                    if ('undefined' != typeof exceptional[key]) {
                        return true;
                    }
                }
            }

            return false;
        }

        for (const [key, value] of Object.entries(data)) {
            let el = $('[name=' + key + ']');
            let el_id = $('#' + el.attr('id'));

            if (exceptional_exists(key)) {
                exceptional[key](el_id);
            } else if (isTypeable(el) || isHidden(el) || isTextarea(el)) {
                el.val(value);
            } else if (isRadio(el)) {
                $('[name=' + key + '][value="' + value + '"]').prop('checked', true);
            }
        }

        if (addition) {
            for (const [key, value] of Object.entries(addition)) {
                let el = $('#' + key);

                value(el);
            }
        }
    }

    $.fn.select2SetValue = function(id, text) {
        var newOption = $("<option selected='selected'></option>")
            .val(id)
            .text(text);

        this.append(newOption).trigger('change');
    }

    $.fn.select2Readonly = function (readonly) {
        if (readonly === true) {
            $(this).next().find('.disabled-select').remove();
            $(this).next().prepend('<div class="disabled-select"></div>');
        } else {
            $(this).next().find('.disabled-select').remove();
        }
    };

    $.fn.loadPreviewImage = function(image) {
        let id = this.attr('id');

        let preview_el = $('#image-preview-' + id);

        preview_el.html(
            '<div class="col-lg-6 col-md-6 col-12">' +
            '<div class="card" style="width: 100%;">' +
            '<img style="width: 100%" class="card-img-top" src="' + image + '" alt="Card image cap">' +
            '</div>' +
            '</div>'
        );
	}

	$.fn.loadPreviewVideo = function(url) {
		let id = this.attr('id');

		let preview_el = $('#video-preview-' + id);

		preview_el.html(
			'<div class="col-lg-6 col-md-6 col-12">' +
			'<div class="card">' +
			'<video width="400" controls>' +
			'<source src="' + url + '">'+
			'	Your browser does not support HTML5 video.'+
			'</video>'+
			'</div>' +
			'</div>'
		);
	}

    $.fn.hideBrowseButton = function() {
        let id = this.attr('id');

        $(`#${id}-chooser`).hide();
	}

    $.fn.showBrowseButton = function() {
        let id = this.attr('id');

        $(`#${id}-chooser`).show();
	}

	$.fn.loadPreviewImageArray = function(url, array, nameField) {
        let id = this.attr('id');

		let preview_el = $('#image-preview-' + id);
		let html = '';

		for (let index = 0; index < array.length; index++) {
			image = url+array[index][nameField];
			html += ('<div class="col-lg-6 col-md-6 col-12">' +
            '<div class="card" style="width: 100%;">' +
            '<img style="width: 100%" class="card-img-top" src="' + image + '" alt="Card image cap">' +
            '</div>' +
            '</div>');
		}

        preview_el.html(html);
    }

    $.fn.removePreviewImage = function() {
        let id = this.attr('id');

        let preview_el = $('#image-preview-' + id);

        this.next().text('');

        preview_el.html('');
    }

    $.fn.hideChooser = function () {
		let id = this.attr('id');

		let chooser_el = $('#' + id + '-chooser');

		chooser_el.hide();
	}

	$.fn.showChooser = function () {
		let id = this.attr('id');

		let chooser_el = $('#' + id + '-chooser');

		chooser_el.show();
    }

}(jQuery))

function getTableData(e) {
    let tr = $(e.target).parents('tr');
    let data = table_data.row(tr).data();

    return data;
}

function ajaxFail(response) {
    Swal.close();

    if (response.status == 403) {
		if (response.responseJSON.message) {
			Swal.fire({
				text: response.responseJSON.message,
				icon: 'error'
			});
		} else {
			Swal.fire({
				text: 'Ups, anda tidak diizinkan melakukan tindakan ini',
				icon: 'error'
			});
		}
    }else if (response.status == 401) {
        Swal.fire({
            text: 'Ups, Silahkan login terlebih dahulu',
            icon: 'error'
        });
    } else if (response.status == 500) {
        Swal.fire({
            text: 'Ups, terjadi kesalahan. Mohon coba beberapa saat lagi',
            icon: 'error'
        });
    } else if (response.status == 422) {
        let p = $(document.createElement('p'))
        let ul = $(document.createElement('ul'));

        p.addClass('alert alert-danger')
            .html('<span class="font-weight-bold">Ups, data yang anda masukkan belum sesuai.</span>');

        ul.addClass('list-group')

        for (let i in response.responseJSON.errors) {
            for (let j in response.responseJSON.errors[i]) {
                let li = $(document.createElement('li'));

                li.addClass('text-left text-black list-group-item p-2');
                li.text(response.responseJSON.errors[i][j]);

                ul.append(li);
            }
        }

        p.append(ul)

        Swal.fire({
            html: p,
            icon: 'error'
        });
    }
}

function formatMoney(amount, decimalCount = 0, decimal = ",", thousands = ".") {
    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = amount < 0 ? "-" : "";

        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;

        return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
        console.log(e)
    }
}

function get_data(e)
{
    let tr = $(e.target).parents('tr');
    let data = table_data.row(tr).data();

    return data;
}

function swal_confirm(text)
{
    return Swal.fire({
        icon: 'warning',
        title: 'Apa anda yakin?',
        text: text,
        showCancelButton: true,
        confirmButtonText: 'Ya, lanjutkan',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
    });
}

function swal_success(text)
{
    Swal.fire({
        icon: 'success',
        text: text
    });
}

function swal_error(text)
{
    Swal.fire({
        icon: 'error',
        text: text
    });
}

function create_table_btn(title, btn_class, icon)
{
    let btn = $(document.createElement('button'))
                    .addClass(btn_class)
                    .attr('title', title)
                    .append(
                        $('<i></i>').addClass(icon)
                    );

    return btn;
}

function visiting()
{
	$.post(`${window.visitor_url}`, {
		url: window.current_path
	})
}

var CustomVuePlugin = {
    install: function (Vue, options) {
		Vue.prototype.formatMoney = formatMoney;
		Vue.prototype.$formatMoney = formatMoney;
		Vue.prototype.swal_confirm = swal_confirm;
    }
}

Vue.use(CustomVuePlugin);
