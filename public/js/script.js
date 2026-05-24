document.addEventListener('DOMContentLoaded', function () {
	// Attach submit handler to forms that spoof DELETE
	document.querySelectorAll('form').forEach(function (form) {
		var methodInput = form.querySelector('input[name="_method"][value="DELETE"]');
		if (methodInput) {
			form.addEventListener('submit', function (e) {
				if (!confirm('¿Confirma la eliminación de este registro?')) {
					e.preventDefault();
				}
			});
		}
	});

	// Fallback: delegation for buttons that may trigger submission
	document.addEventListener('click', function (ev) {
		var el = ev.target;
		if (!el) return;

		// find nearest submit button or button inside form
		var btn = el.closest('button[type="submit"], input[type="submit"]');
		if (!btn) return;

		var form = btn.form || btn.closest('form');
		if (!form) return;

		var methodInput = form.querySelector('input[name="_method"][value="DELETE"]');
		if (methodInput) {
			if (!confirm('¿Confirma la eliminación de este registro?')) {
				ev.preventDefault();
				ev.stopPropagation();
			}
		}
	}, true);
});
