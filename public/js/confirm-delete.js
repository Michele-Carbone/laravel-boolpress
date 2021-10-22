
const deleteButtons = document.querySelectorAll('.delete-button');  //querySelectorAll() ci permette di prendere piu di un elemento

deleteButtons.forEach(form => {
    form.addEventListener('submit', function (event) {
        event.preventDefult();
        const conf = confirm('Sei sicuro di voler cancellare questo post?');
        if (conf) this.submit();
    });
});