document.addEventListener('DOMContentLoaded', function () {
	var imgWrap = "";
	var imgArray = [];

	document.querySelectorAll('.upload__inputfile').forEach(function (input) {
		input.addEventListener('change', function (e) {
			imgWrap = this.closest('.upload__box').querySelector('.upload__img-wrap');
			var maxLength = this.getAttribute('data-max_length');

			var files = e.target.files;
			var filesArr = Array.prototype.slice.call(files);
			var iterator = 0;
			filesArr.forEach(function (f, index) {

				if (!f.type.match('image.*')) {
					return;
				}

				if (imgArray.length > maxLength) {
					return false;
				} else {
					var len = 0;
					for (var i = 0; i < imgArray.length; i++) {
						if (imgArray[i] !== undefined) {
							len++;
						}
					}
					if (len > maxLength) {
						return false;
					} else {
						imgArray.push(f);

						var reader = new FileReader();
						reader.onload = function (e) {
							// var img = document.createElement('img');
							var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'>&times;</div></div></div>";
							imgWrap.insertAdjacentHTML('beforeend', html);
							iterator++;
						}
						reader.readAsDataURL(f);
					}
				}
			});
		});
	});

	document.querySelector('body').addEventListener('click', function (e) {
		if (e.target.classList.contains('upload__img-close')) {
			var file = e.target.parentElement.dataset.file;
			for (var i = 0; i < imgArray.length; i++) {
				if (imgArray[i].name === file) {
					imgArray.splice(i, 1);
					break;
				}
			}
			e.target.parentElement.parentElement.removeChild(e.target.parentElement);
		}
	});
});
