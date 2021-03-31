let i, items;

items = document.getElementsByClassName("navigation-link__name");
for (i = 0; i < items.length; i++) {
    if(items[i].innerHTML.toString().includes(document.head.querySelector("#nav_item").content.toString() ) ){
        items[i].parentElement.className = items[i].parentElement.className + " active";
    }
    else{
        items[i].parentElement.className = items[i].parentElement.className.replace(" active", "");
    }

}