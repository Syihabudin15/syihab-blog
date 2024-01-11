function handleCollapse(){
    const menu = document.getElementById("menu-wrapper");
    const anyClass = document.getElementsByClassName("anyclass");
    menu.classList.toggle("collapsed")
    for(let i = 0; i < anyClass.length; i++){
        anyClass[i].classList.toggle('inlined');
    }
}