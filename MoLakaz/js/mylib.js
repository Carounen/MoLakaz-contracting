function fetchLS(){
    document.querySelector("#txtemail").value = localStorage.getItem("svem");
    document.querySelector("#txtpass").value = localStorage.getItem("svpwd");
    }
    window.addEventListener("load", fetchLS);
    function remem(){
    var chk = document.querySelector("#chkrem");
    if (chk.checked){
    var em = document.querySelector("#txtemail").value;
    var pwd = document.querySelector("#txtpass").value;
    localStorage.setItem("svem", em);
    localStorage.setItem("svpwd", pwd);
    }
    else{
    localStorage.removeItem("svem");
    localStorage.removeItem("svpwd");
    }
    }



    function fetchLSs(){
        document.querySelector("#txtcemail").value = localStorage.getItem("ssvem");
        document.querySelector("#txtcpassword").value = localStorage.getItem("ssvpwd");
        }
        window.addEventListener("load", fetchLS);
        function remem(){
        var chk = document.querySelector("#chkrem");
        if (chk.checked){
        var em = document.querySelector("#txtcemail").value;
        var pwd = document.querySelector("#txtcpassword").value;
        localStorage.setItem("ssvem", em);
        localStorage.setItem("ssvpwd", pwd);
        }
        else{
        localStorage.removeItem("ssvem");
        localStorage.removeItem("ssvpwd");
        }
        }