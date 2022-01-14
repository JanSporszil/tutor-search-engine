document.addEventListener("DOMContentLoaded", async function() {
    const url = window.location.pathname;
    const teacherid = url.split("/").pop();

    const selectEl = document.querySelector('.day');
    const availability = await getData(teacherid);


    selectEl.addEventListener('change', event => {
        let selected = selectEl.value;
        let size = availability[selected].length;


        const select = document.querySelector('.hour');
        select.innerHTML="";

        select.removeAttribute('hidden');
        for(let i = 0; i < size; i++){
            select.options[select.options.length] = new Option(availability[selected][i]);
        }

    })
})

async function getData(teacherid) {
    return await fetch('/getBookedClasses', {
        method: 'POST', body: JSON.stringify( {
            id: teacherid
        })
    })
        .then(res => res.json())
}