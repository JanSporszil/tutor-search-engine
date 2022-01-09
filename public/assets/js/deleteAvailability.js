document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.far.fa-times-circle').forEach(el => {
        el.addEventListener('click', event => {
            const day = el.getAttribute('data-day');
            const hour = el.getAttribute('data-hour');

            let dataToSent = new FormData();
            dataToSent.append('day', day);
            dataToSent.append('hour', hour);

            fetch('/deleteAvailability', {
                method:'POST', body: dataToSent
            })
                .then(res => res.json())
                .then(res => console.log(res))
        })
    })
})