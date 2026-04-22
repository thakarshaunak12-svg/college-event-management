document.addEventListener("DOMContentLoaded", function(){

    const images = document.querySelectorAll(".gallery img");
    const modal = document.getElementById("imgModal");
    const modalImg = document.getElementById("fullImg");
    const closeBtn = document.querySelector(".close");

    // Open image
    images.forEach(img => {
        img.addEventListener("click", function(){
            modal.style.display = "block";
            modalImg.src = this.src;
        });
    });

    // Close button
    closeBtn.addEventListener("click", function(){
        modal.style.display = "none";
    });

    // Close when clicking outside
    modal.addEventListener("click", function(e){
        if(e.target === modal){
            modal.style.display = "none";
        }
    });

});