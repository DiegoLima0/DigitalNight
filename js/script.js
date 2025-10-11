//Página Soporte support.php

const faqs=document.querySelectorAll(".faq");

faqs.forEach(faq => {
    faq.querySelector(".ques").addEventListener("click", () => {
        if (faq.classList.contains("active")) {
            faq.classList.remove("active");
            return;
        }

        faqs.forEach(f => f.classList.remove("active"));

        faq.classList.add("active");
    });
});