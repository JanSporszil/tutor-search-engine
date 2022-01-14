document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.signButton').addEventListener('click', function () {
        const select1 = document.querySelector('.sub').value;
        const select2 = document.querySelector('.day').value;
        const select3 = document.querySelector('.hour').value;
        const select4 = document.querySelector('.signButton').getAttribute('teacherid');

        if(select1 === "" || select2 === "" || select3 === ""){
            alert("Please choose every option");
        }

        else {
            let dataToSent = new FormData();
            dataToSent.append('sub', select1);
            dataToSent.append('day', select2);
            dataToSent.append('hour', select3);
            dataToSent.append('teacherid', select4);

            fetch('/bookingClasses', {
                method: 'POST', body: dataToSent
            })
                .then(res => res.json())
                .then(res => console.log(res))
        }

        //[...document.querySelectorAll('option[selected]')].forEach(element => element.selected = true);


    })
})