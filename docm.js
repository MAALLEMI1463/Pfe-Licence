var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    //Animation à gauche
    function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }
    //Animation à droit
    function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
    }
    // //Search bar animation
    // const icon = document.querySelector(".icon");
    // const search = document.querySelector(".search");
    // //Add Class
    // function Add_Class(){
    //     search.classList.toggle("active");
    // }
    // //Add Class and icon where click
    // let menu = document.querySelector("#menu-bar");
    // let navbar = document.querySelector(".navbar");
    // let header = document.querySelector(".header-3");
    // menu.addEventListener('click', () =>{
    //     menu.classList.toggle('fa-times');
    //     navbar.classList.toggle('active');
    // });

    // window.onscroll = () =>{
    //     menu.classList.remove('fa-times');
    //     navbar.classList.remove('actives');
    //     if(window.scrollY > 250){
    //         header.classList.add('active');
    //     }else{
    //         header.classList.remove('active');
    //     }
    // }


    const submit_button = document.querySelector(".button");
submit_button.onclick = (e) => {
    e.preventDefault();
    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const email = document.getElementById("email").value;
    const pass = document.getElementById("pass").value;
    const cpass = document.getElementById("cpass").value;

    localStorage.setItem('FirstName', fname);
    localStorage.setItem('LastName', lname);
    localStorage.setItem('Email', email);
    localStorage.setItem('Password', pass);
    localStorage.setItem('Cpassword', cpass);
    if (fname == "" && lname == "" && email == "" && pass == "" && cpass == "") {
        Swal.fire(
            'Opps..!',
            'input field has no value!',
            'error'
        );
    }
    else {
        if (pass.length >= 6 && pass.length <= 20) {
            if (pass !== cpass) {
                Swal.fire(
                    'Opps..!',
                    'Password not matching!',
                    'error'
                );
            }
            else {
                Swal.fire(
                    'Good job!',
                    'Register successful!',
                    'success'
                );
                setTimeout(() => {
                    location.href = 'LoginBox.html';
                }, 5000)
            }
        }
        else {
            Swal.fire(
                'Opps..!',
                'Input mim six digit password!',
                'error'
            );
        }
    }


}