document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.deleteSubjectButton').addEventListener('click', function () {
        const select1 = document.querySelector('#subToDelete').value;

        if(select1 === ""){
            alert("Proszę wybrać przedmiot, który zamierzasz usunąć ze swojej listy");
        }
        else {
            let dataToSent = new FormData();
            dataToSent.append('subject', select1);

            fetch('/deleteSubjects', {
                method: 'POST', body: dataToSent
            })
                .then(res => res.json())
                .then(res => console.log(res))
        }

        [...document.querySelectorAll('option')].forEach(element => {
            if(element.value == "")
            element.selected = true;
            console.log(element, select1);
            if(element.value == select1){
                element.remove();
            }
        });


    })
})