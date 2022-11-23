import "./bootstrap";
import { Commentaire } from "./components/Commentaire";
import.meta.glob(["../template/image/**"]);
import { render } from "./rimax.es";

const inputs = [...document.querySelectorAll(".rimax-form-add-commentaire")];
// console.log(inputs);
inputs.map((form) => {
    form.addEventListener("submitr", async (e) => {
        e.preventDefault();
        const body = new FormData(form);
        const res=await (await fetch(form.action, {
            method: "POST",
            body,
        })).json()

        form.reset()
        console.log(res);
        const idpost=form.getAttribute('idpost')
        const pOne=document.querySelector('#one-of-commentaire-'+idpost)
        const pList=document.querySelector('#list-of-commentaire-'+idpost)
        const commantaire=Commentaire(res)
        console.log(commantaire);
        if(pOne.children.length){
            pList.append(commantaire)
        }else{
            pOne.append(commantaire)
        }
    });
});
[...document.querySelectorAll('.btn-modif')].map(btn=>{
    btn.addEventListener('click',()=>{
        const input=document.querySelector(btn.getAttribute('input-target'))
        const text=document.querySelector(btn.getAttribute('text-target'))
        if(text&&input){
            input.value=text.textContent
        }
    })
})