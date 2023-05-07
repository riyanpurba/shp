$(function () {
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});

	$('[data-mask]').inputmask();

	$('#datepicker').datepicker({
		autoclose: true
	});

	$('#tablejabatan').DataTable();
	$('#tablepengaduan').DataTable();
	$('#tablemenu1').DataTable();
	$('#tablemenu2').DataTable();
});


$(document).on("change", ".uploadProfileInput", function () {
	var triggerInput = this;
	var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
	var holder = $(this).closest(".pic-holder");
	var wrapper = $(this).closest(".profile-pic-wrapper");
	$(wrapper).find('[role="alert"]').remove();
	triggerInput.blur();
	var files = !!this.files ? this.files : [];
	if (!files.length || !window.FileReader) {
		return;
	}
	if (/^image/.test(files[0].type)) {
		// only image file
		var reader = new FileReader(); // instance of the FileReader
		reader.readAsDataURL(files[0]); // read the local file

		reader.onloadend = function () {
			$(holder).addClass("uploadInProgress");
			$(holder).find(".pic").attr("src", this.result);
			$(holder).append(
				'<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
			);

			// Dummy timeout; call API or AJAX below
			setTimeout(() => {
				$(holder).removeClass("uploadInProgress");
				$(holder).find(".upload-loader").remove();
				// If upload successful
				if (Math.random() < 0.9) {
					$(wrapper).append(
						'<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
					);

					// Clear input after upload
					$(triggerInput).val("");

					setTimeout(() => {
						$(wrapper).find('[role="alert"]').remove();
					}, 3000);
				} else {
					$(holder).find(".pic").attr("src", currentImg);
					$(wrapper).append(
						'<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
					);

					// Clear input after upload
					$(triggerInput).val("");
					setTimeout(() => {
						$(wrapper).find('[role="alert"]').remove();
					}, 3000);
				}
			}, 1500);
		};
	} else {
		$(wrapper).append(
			'<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
		);
		setTimeout(() => {
			$(wrapper).find('role="alert"').remove();
		}, 3000);
	}
});

$(function(){
	'use strict';
	$('.editmenu1').on("click", function () {
		var id = $(this).data('id');
		$.ajax({
			url: 'edit_menu1',
			type: "post",
			data: {
				id: id
			},
			dataType: "json",
			success: function (data) {
				$('#modaleditmenu1').modal('show');
				$('#menuid').val(data.menu_id);
				$('#menuname').val(data.menu_name);
				$('#menuicon').val(data.menu_class);
				$('#menulink').val(data.menu_url);
				$('#havesubmenu').val(data.have_submenu);
			}
		})
	});
	$('.deletemenu1').on('click', function(){
		var id = $(this).data('id');
		$.ajax({
			url: 'delete_menu1',
			type: "post",
			data: {
				id: id
			},
			dataType: "json",
			success: function (data) {
				if (data == true) {
					window.location.reload();
				}
			}
		});
	});
	$('.editmenu2').on("click", function () {
		var id = $(this).data('id');
		$.ajax({
			url: 'edit_menu2',
			type: "post",
			data: {
				submenuid: id
			},
			dataType: "json",
			success: function (data) {
				console.log(data.submenu_name);
				$('#modaleditmenu2').modal('show');
				$('#submenuid').val(data.submenu_id);
				$('#submenuname').val(data.submenu_name);
				$('#submenuicon').val(data.submenu_class);
				$('#submenulink').val(data.submenu_url);
				$('#menu_id option[value="' + data.menu_id + '"]').prop('selected', true);
			}
		})
	});
	$('.deletemenu2').on('click', function () {
		var id = $(this).data('id');
		$.ajax({
			url: 'delete_menu2',
			type: "post",
			data: {
				submenuid: id
			},
			dataType: "json",
			success: function (data) {
				if (data == true) {
					window.location.reload();
				}
			}
		});
	});
})
