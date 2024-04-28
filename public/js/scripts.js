//-----------------BARRA DE NAVEGACION RESPONSIVA-------------------------------------------
const nav = document.querySelector("#nav");
const abrirMenu = document.querySelector("#abrirMenu");
const cerrarMenu = document.querySelector("#cerrarMenu");

abrirMenu.addEventListener("click", () =>{
    nav.classList.add("visible");
   
});

cerrarMenu.addEventListener("click", () =>{
    nav.classList.remove("visible");
});
document.addEventListener('click', (event)=>{
    
    if (event.target !== abrirMenu && !abrirMenu.contains(event.target)){
        nav.classList.remove("visible");  
    }         
});

