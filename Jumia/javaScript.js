
    function autocomplete(inp, arr){
        var currentFocus;
        inp, addEventListener("input", function(e){
            var a, b, i, val = this.value;
            closeAllLists();
            if(!val){
                return false;
            }
            currentFocus = -1;
            a = document.createElement("DIV");
            a.setAttribute("id",this.id + "autocomplete-list");
            a.setAttribute("class","autocomplete-items");
            this.parentNode.appendChild(a);
            for(i = 0; i < arr.length; 1++){
                if(arr[i].substr(0, val.length) . toUpperCase() == val.toUpperCase()){
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e){
                        inp.value = this.getElementByTagName("input")[0].value;
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }

        });
                     inp.addEventListener("keydown", function(e){
                    var x = document.getElememtById(this.id + "autocomplete-list");
                    if(x) x = x.getElementById("div");
                    if(e.keyCode == 40){
                        currentFocus++;
                        addActive(x);
                    }else if(e.keyCode == 38){
                        currentFocus--;
                        addActive(x);
                    }else if(e.keyCode == 13){
                        e.preventDefault();
                        if(currentFocus > -1){
                            if(x) x[currentFocus].click();
                        }
                    }
                });
                function addActive(x){
                    if(!x) return false;
                    removeActive(x);
                    if(currentFocus >= x.length) currentFocus = 0;
                    if(currentFocus < 0) currentFocus = (x.length - 1);
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeAction(x){
                    for(var i = 0; i < x.length; i++){
                        x[i].classList.remove("autocomplete-active")
                    }
                }
                function closeAllLists(elmnt){
                    var x = document.getElementByClassName("autocomplete-items");
                    for(var i = 0; i < x.length; i++){
                        if(elmnt != x[i] && elmnt != inp){
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                document.addEventListener("click", function(e){

                });
                
            closeAllLists(e.target);

            
        }
        var items = ["Phone","Book","Handbag",
        "Laptop","Shoes","Cloths","Cameroon","Ghana","Nigeria","Congo"];
        autocomplete(document.getElementById("search"), items);

        let slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n){
            showSlides(slideIndex += n);
        }
        function currentSlide(n){
            showSlides(slideIndex += n);
        }
        function showSlides(n){
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementByClassName("dot");
            if(n > slides.length){
                slideIndex = 1
            }
            if(n < 1){
                slideIndex = slides.length
            }
            for(i = 0; 1 < slides.length; i++){
                slides[i].style.display = "none";
            }
            for(i = 0; i < dots.length; i++){
            dots[i].className = dots[i].className.replace("active","");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += "active";

    }

   
       


