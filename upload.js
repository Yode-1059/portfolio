
const hdbtn = document.querySelector("#hdpush")
const imgbtn = document.querySelector("#imgpush")
const imgtwinbtn = document.querySelector("#imgpushtwin");
const txt = document.querySelector("#txt")
const form = document.querySelector(".a_img");
const pop = document.querySelector("#pop");
const del = document.querySelector("#del");
const i_vol = document.querySelector("#img_vol");
let f_v = 1;
let hd_v = 0;
let img_v = 0;

pop.addEventListener("click", () => {
    f_v++;
    let create = document.createElement("input");
    create.type = "file";
    create.name = `i_${f_v}`;
    create.classList.add("img");
    create.required = true;
    form.append(create);
    i_vol.setAttribute("value", f_v);
    console.log(f_v);
})

del.addEventListener("click", () => {
    const d_inp = document.querySelector(".img:last-child");
    console.log(d_inp);
    d_inp.remove();
    f_v--;
    i_vol.setAttribute("value", f_v);
})

const input = (i) => {
    document.getElementById("txt").value += i;
}

hdbtn.addEventListener("click", () => {
    // document.getElementById("txt").value += `\n<h3 class="article__hd" id="h_${hd_v}"></h3>`;
    input("\n[|]hd[|]");
    hd_v++
})

imgbtn.addEventListener("click", () => {
    // const postval = document.getElementById("postval").value
    //     document.getElementById("txt").value +=
    //         `
    // <div class="article__flex">
    //     <img src="./f${postval}/img_${img_v}.png" alt="">
    // </div>`;
    input("\n[|]img[|]");
    img_v++
})

imgtwinbtn.addEventListener("click", () => {
    // const postval = document.getElementById("postval").value
    //     document.getElementById("txt").value +=
    //         `
    // <div class="article__flex">
    //     <img src="./f${postval}/img_${img_v}.png" alt="">
    //     <img src="./f${postval}/img_${img_v + 1}.png" alt="">
    // </div>`;
    input("\n[|]img2[|]");
    img_v += 2;
})
