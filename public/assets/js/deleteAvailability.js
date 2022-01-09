document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.far fa-times-circle').addEventListener('click', function () {
        const select1 = document.querySelector('.selectDay').value;

        if(select1 === ""){
            alert("Please choose both options");
        }
        else {
            let dataToSent = new FormData();
            dataToSent.append('day', select1);
            dataToSent.append('time', select2);

            fetch('/addAvailability', {
                method: 'POST', body: dataToSent
            })
                .then(res => res.json())
                .then(res => console.log(res))
        }

        [...document.querySelectorAll('option[selected]')].forEach(element => element.selected = true);


    })
})

//TODO DOKONCZYC SKRYPT