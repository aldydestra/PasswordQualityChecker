<html>

<head>
    <link rel="stylesheet" type="text/css" href="password_style.css">
    <script type="text/javascript" src="jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#password").keyup(function() {
                cek_pass();
            });
        });

        function cek_pass() {
            var pass = document.getElementById("password").value;
            var balok = document.getElementById("balok");
            var no = 0;
            if (pass != "") {
                // jika panjang password melebihi 6
                if (pass.length <= 6) no = 1;

                // jika panjang password melebihi 6 dan harus berisi campuran alfabet, angka dan karakter spesial dalam bentuk low case
                if (pass.length > 6 && (pass.match(/[a-z]/) || pass.match(/\d+/) || pass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

                // jika panjang password melebihi 6 dan harus berisi campuran alfabet, angka dan karakter spesial
                if (pass.length > 6 && ((pass.match(/[a-z]/) && pass.match(/\d+/)) || (pass.match(/\d+/) && pass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (pass.match(/[a-z]/) && pass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;

                // jika panjang password melebihi 6 dan harus berisi campuran alfabet, angka dan karakter spesial
                if (pass.length > 6 && pass.match(/[a-z]/) && pass.match(/\d+/) && pass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

                if (no == 1) {
                    $("#balok").animate({
                        width: '50px'
                    }, 300);
                    balok.style.backgroundColor = "red";
                    document.getElementById("pass_type").innerHTML = "Sederhana";
                }

                if (no == 2) {
                    $("#balok").animate({
                        width: '100px'
                    }, 300);
                    balok.style.backgroundColor = "	#FFBF00";
                    document.getElementById("pass_type").innerHTML = "Mudah";
                }

                if (no == 3) {
                    $("#balok").animate({
                        width: '150px'
                    }, 300);
                    balok.style.backgroundColor = "#FF9000";
                    document.getElementById("pass_type").innerHTML = "Cukup Rumit";
                }

                if (no == 4) {
                    $("#balok").animate({
                        width: '200px'
                    }, 300);
                    balok.style.backgroundColor = "#7CFC00";
                    document.getElementById("pass_type").innerHTML = "Rumit";
                }
            } else {
                balok.style.backgroundColor = "white";
                document.getElementById("pass_type").innerHTML = "";
            }
        }
    </script>
</head>

<body>
    <p id="heading">Pengecek Tingkat Kerumitan Password</p>
    <input type="password" id="password" placeholder="      ---------> Cek Password anda disini <---------">
    <div id="balok_wrapper">
        <div id="balok"></div>
    </div>
    <br>

    <span id="pass_type"></span>
</body>

</html>