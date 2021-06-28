
function show_form() {
    let reg_form = document.getElementById("reg_form");
    (reg_form.style.display === "none")?
        reg_form.style.display = "initial":
        reg_form.style.display = "none";
}

/*const selectEl = document.getElementById("status");
function show_el() {
    const commentEl = document.getElementsByName("comment");
    const imageEl = document.getElementsByName("image");

    switch (selectEl.value) {
        case "Новая":
            break;
        case "Принято в работу":
            commentEl.style.display = "initial";
            imageEl.style.display = "none";
            break;
        case "Выполнено":{
            imageEl.style.display = "initial";
            commentEl.style.display = "none";
            break;
        }
    }
}

selectEl.addEventListener('change', show_el );*/