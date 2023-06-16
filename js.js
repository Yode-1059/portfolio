const header = document.querySelector("header");
const hum = document.querySelector(".humbar");
const title = document.querySelector(".sitetop");
const prof = document.querySelector(".prof");
const tec = document.querySelector(".tec");
const work = document.querySelector(".work");
const top_j = document.querySelector("#top");
const h_inner = document.querySelector(".header__inner");

header.addEventListener('click', () => {
    header.classList.remove("active");
    h_inner.classList.remove("active");
    hum.classList.remove("active");
})

hum.addEventListener('click', () => {
    header.classList.toggle("active");
    h_inner.classList.toggle("active");
    hum.classList.toggle("active");
})

window.addEventListener("load", () => {
    title.classList.add("active");
    setTimeout('prof.classList.add("active")', 800);
    setTimeout('tec.classList.add("active")', 1300);
})

function workpop(entries) {
    if (entries[0].intersectionRatio == 0) {
        return;
    }
    else {
        work.classList.add("active")
    }
}

const option = {
    threshold: 0.5
}

const workpopup = new IntersectionObserver(workpop, option);
workpopup.observe(work);
