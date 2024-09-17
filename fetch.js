document.querySelector('.login').addEventListener('submit', function(e) {
    e.preventDefault();

let formData = new FormData(this);

fetch('validation.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success === "true") {
            alert("Данные успешно отправлены!");
        } else {
            let errors = data.errors;
            for (let key in errors) {
                document.querySelector(`[name="${key}"]`).setCustomValidity(errors[key]);
                document.querySelector(`[name="${key}"]`).reportValidity();
            }
        }
    })
    .catch(error => console.error('Error:', error));
});