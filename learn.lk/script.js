function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}
function tchangeView() {

    var signUpBox = document.getElementById("tsignUpBox");
    var signInBox = document.getElementById("tsignInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}
function signUp() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var g = document.getElementById("g");

    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "dashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var bm;
function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                document.getElementById("msg2").innerHTML = t

            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();



}

function showPassword() {



    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}
function showPassword2() {



    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}
function resetPassword() {

    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");


    var f = new FormData();

    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Your Password is Updated");
                bm.hide();

            } else {
                alert(t);
            }
        }

    };


    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}
function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location.reload();

            }
        }
    }


    r.open("GET", "signoutProcess.php", true);
    r.send();
}
function tsignout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "teachers.php";

            }
        }
    }


    r.open("GET", "tsignoutProcess.php", true);
    r.send();
}
function acsignout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "academicOfficer.php";

            }
        }
    }


    r.open("GET", "acsignoutProcess.php", true);
    r.send();
}
function showPassword() {



    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

};
function changeImage() {
    var viwe = document.getElementById("viweImg");
    var file = document.getElementById("profileimage");

    file.onchange = function () {
        var img = this.files[0];
        var url = window.URL.createObjectURL(img);
        viwe.src = url;
    }
};
function updateProfile() {
    var fname = document.getElementById("f");
    var lname = document.getElementById("l");
    var grade = document.getElementById("g");
    var image = document.getElementById("profileimage");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("g", grade.value);



    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}




var bm;
function st_uploade_assignment() {



    var m = document.getElementById("stassignmentUploade");
    bm = new bootstrap.Modal(m);
    bm.show();



}
function stuploadeass() {

  
    var san = document.getElementById("san");
    var sas = document.getElementById("sas");


    var assignment = document.getElementById("assignment");
    var f = new FormData();


    f.append("san", san.value);
    f.append("sas",sas.value);

    f.append("assignment", assignment.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;


            alert(t);

            window.location.reload();

        }
    }

    r.open("POST", "uploadeAssignmentProcess.php", true);
    r.send(f);
 }




// function stuploadeass() {



    

//     var assignment = document.getElementById("assignment");
//     var subject = document.getElementById("subject");
//     var name = document.getElementById("name");
//     var f = new FormData();


//     f.append("assignment", assignment.files[0]);
//     f.append("subject",subject.value);
//     f.append("name",name.value);


//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             if (t == "success") {
//                 alert("Your assignment is Successfully Uploaded");
//             } else {
//                 alert(t);
//             }
//         }
//     }

//     r.open("POST", "uploadeAssignmentProcess.php", true);
//     r.send(f);

// };
function signUpT() {


    var tf = document.getElementById("tf");
    var tl = document.getElementById("tl");
    var te = document.getElementById("te");
    var tp = document.getElementById("tp");
    var ts = document.getElementById("ts");


 





    var form = new FormData;
    form.append("tf", tf.value);
    form.append("tl", tl.value);
    form.append("te", te.value);
    form.append("tp", tp.value);
    form.append("ts", ts.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;






            if (text == "success") {
                document.getElementById("tmsg").innerHTML = text;
                document.getElementById("tmsg").className = "bi bi-check2-circle fs-5";
                document.getElementById("talertdiv").className = "alert alert-success";
                document.getElementById("tmsgdiv").className = "d-block";
            } else {
                document.getElementById("tmsg").innerHTML = text;
                document.getElementById("tmsgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "teacherSignUpProcess.php", true);
    request.send(form);

}

function signInT() {

    var email = document.getElementById("temail2");
    var password = document.getElementById("tpassword2");
    var rememberme = document.getElementById("trememberme");

    var f = new FormData();
    f.append("te", email.value);
    f.append("tp", password.value);
    f.append("tr", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "tdashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "teacherSignInProcess .php", true);
    r.send(f);

}

var bm;
function uploadeAssignment() {



    var m = document.getElementById("assignmentUploade");
    bm = new bootstrap.Modal(m);
    bm.show();



}
function uploadeass() {

  
    var an = document.getElementById("an");
    var as = document.getElementById("as");


    var ass = document.getElementById("ass");
    var f = new FormData();


    f.append("an", an.value);
    f.append("as",as.value);

    f.append("ass", ass.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;


            alert(t);

            window.location.reload();

        }
    }

    r.open("POST", "uploadeTeacherAssignmentProcess.php", true);
    r.send(f);
 }



var bm;
function uploadeNotes() {



    var m = document.getElementById("noteUploade");
    bm = new bootstrap.Modal(m);
    bm.show();



}
function uploadenote() {
    var n = document.getElementById("n");


    var no = document.getElementById("no");
    var f = new FormData();


    f.append("n", n.value);

    f.append("no", no.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;


            alert(t);

            window.location.reload();

        }
    }

    r.open("POST", "uploadeTeacherNoteProcess.php", true);
    r.send(f);
}
function achangeView() {

   

    var asignUpBox = document.getElementById("asignUpBox");
    var asignInBox = document.getElementById("asignInBox");

    asignUpBox.classList.toggle("d-none");
    asignInBox.classList.toggle("d-none");

}

function asignUp() {

    

    var af = document.getElementById("af");
    var al = document.getElementById("al");
    var ae = document.getElementById("ae");
    var ap = document.getElementById("ap");

 
    

    var form = new FormData;
    form.append("af", af.value);
    form.append("al", al.value);
    form.append("ae", ae.value);
    form.append("ap", ap.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("amsg").innerHTML = text;
                document.getElementById("amsg").className = "bi bi-check2-circle fs-5";
                document.getElementById("aalertdiv").className = "alert alert-success";
                document.getElementById("amsgdiv").className = "d-block";
            } else {
                document.getElementById("amsg").innerHTML = text;
                document.getElementById("amsgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "asignUpProcess.php", true);
    request.send(form);

}

function asignIn() {

    var email = document.getElementById("aemail2");
    var password = document.getElementById("apassword2");
    var rememberme = document.getElementById("arememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "acdashboard.php";
            } else {
                document.getElementById("amsg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "asignInProcess.php", true);
    r.send(f);

}

var bm;
function aforgotPassword() {

    var email = document.getElementById("aemail2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");

                var m = document.getElementById("aforgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                document.getElementById("asg2").innerHTML = t

            }

        }
    }

    r.open("GET", "aforgotPasswordProcess.php?e=" + email.value, true);
    r.send();



}

function ashowPassword() {



    var np = document.getElementById("anp");
    var npb = document.getElementById("anpb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}
function ashowPassword2() {



    var rnp = document.getElementById("arnp");
    var rnpb = document.getElementById("arnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}
function aresetPassword() {

    var aemail = document.getElementById("aemail2");
    var anp = document.getElementById("anp");
    var arnp = document.getElementById("arnp");
    var avcode = document.getElementById("avc");


    var f = new FormData();

    f.append("ae", aemail.value);
    f.append("an", anp.value);
    f.append("ar", arnp.value);
    f.append("av", avcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Your Password is Updated");
                bm.hide();

            } else {
                alert(t);
            }
        }

    };


    r.open("POST", "aresetPasswordProcess.php", true);
    r.send(f);

}
function achangeImage() {
    var viwe = document.getElementById("aviweImg");
    var file = document.getElementById("aprofileimage");

    file.onchange = function () {
        var img = this.files[0];
        var url = window.URL.createObjectURL(img);
        viwe.src = url;
    }
};
function aupdateProfile() {
    var fname = document.getElementById("af");
    var lname = document.getElementById("al");
 
    var image = document.getElementById("aprofileimage");

    var f = new FormData();
    f.append("acfn", fname.value);
    f.append("acln", lname.value);
    


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("acimage", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "acupdateProfileProcess.php", true);
    r.send(f);
}

function tchangeImage() {
    var viwe = document.getElementById("tviweImg");
    var file = document.getElementById("tprofileimage");

    file.onchange = function () {
        var img = this.files[0];
        var url = window.URL.createObjectURL(img);
        viwe.src = url;
    }
};
function tupdateProfile() {
    var fname = document.getElementById("tf");
    var lname = document.getElementById("tl");
 
    var image = document.getElementById("tprofileimage");

    var f = new FormData();
    f.append("tfn", fname.value);
    f.append("tln", lname.value);
    


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("timage", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "tupdateProfileProcess.php", true);
    
    r.send(f);
}


function upMarks() {
    var an = document.getElementById("an");
    var as = document.getElementById("as");
    var te = document.getElementById("te");
    var se = document.getElementById("se");
    var m = document.getElementById("m");


   
    var f = new FormData();


    f.append("an", an.value);
    f.append("as", as.value);
    f.append("te", te.value);
    f.append("se", se.value);
    f.append("m", m.value);

    


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;


            alert(t);

            window.location.reload();

        }
    }

    r.open("POST", "uploadeMarks.php", true);
    r.send(f);
}


var bm;
function uploade_Marks() {



    var m = document.getElementById("mUploade");
    bm = new bootstrap.Modal(m);
    bm.show();



}



var bm;
function sendMarks() {



    var m = document.getElementById("smUploade");
    bm = new bootstrap.Modal(m);
    bm.show();
}


function sendMarksToStudent(){


    var san = document.getElementById("san");
    var ase = document.getElementById("ase");
    var sm = document.getElementById("sm");


    var f = new FormData();


    f.append("san", san.value);
    f.append("ase", ase.value);
    f.append("sm", sm.value);
    

    

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
           alert(t);
           window.location.reload();

        }
    }

    r.open("POST", "sendMarksToStudent.php", true);
    r.send(f);




}


var av;
function adminVerification(){
    var email = document.getElementById("ade");

    var f = new FormData();
    f.append("e",email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Success"){
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","adminVerificationProcess.php",true);
    r.send(f);
}

function verify(){
    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                av.hide();
                window.location = "adminPanel.php";
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","verificationProcess.php?v="+verification.value,true);
    r.send();
}
var bm;
function tforgotPassword() {

    var email = document.getElementById("temail2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");

                var m = document.getElementById("tforgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                document.getElementById("tmsg2").innerHTML = t

            }

        }
    }

    r.open("GET", "tforgotPasswordProcess.php?e=" + email.value, true);
    r.send();



}

function showPassword() {



    var np = document.getElementById("tnp");
    var npb = document.getElementById("tnpb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}
function showPassword2() {



    var rnp = document.getElementById("trnp");
    var rnpb = document.getElementById("trnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}
function tresetPassword() {

    var temail = document.getElementById("temail2");
    var tnp = document.getElementById("tnp");
    var trnp = document.getElementById("trnp");
    var tvcode = document.getElementById("tvc");


    var f = new FormData();

    f.append("te", temail.value);
    f.append("tn", tnp.value);
    f.append("tr", trnp.value);
    f.append("tv", tvcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Your Password is Updated");
                bm.hide();

            } else {
                alert(t);
            }
        }

    };


    r.open("POST", "tresetPasswordProcess.php", true);
    r.send(f);

}