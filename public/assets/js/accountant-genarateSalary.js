document.getElementById('generate-salary-btn').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "flex";

});

document.querySelector('.close').addEventListener("click", function() {
    document.querySelector('.bg-modal').style.display = "none";
    document.querySelector('body').style.overflowY = "auto";
});

 function closeModel() {
     document.querySelector('.model-footer').style.display = "none";
     document.querySelector('.bg-modal').style.display = "none";
     document.querySelector('body').style.overflow = "auto";
 }
