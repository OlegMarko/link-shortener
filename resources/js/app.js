import './bootstrap';
import 'bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const confirmation = confirm('Are you sure you want to delete this link record?');

            if (confirmation) {
                const form = this.closest('.delete-form');
                form.submit();
            }
        });
    });
});
