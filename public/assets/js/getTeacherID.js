document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.enrollButton').forEach(el => {
        el.addEventListener('click', event => {
            const teacherid = el.getAttribute('teacherid');

            let dataToSend = new FormData();
            dataToSend.append('teacherid', teacherid);

            fetch('/getInfoAboutClasses', {
                method: 'POST', body: dataToSend
            })
                .then(res => res.json())
                .then(res => console.log(res))
        })
    })
})