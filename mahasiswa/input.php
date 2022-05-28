<!DOCTYPE html>
<html>
    <head>
        <style>
            h1{
                text-align: center;
            }
            .container{
                width: 400px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <h1>Input Data</h1>
        <div class="container">
            <form id="form_Mahasiswa" action="proses_inputMahasiswa.php" method="post">
                <fieldset>
                    <legend>Input Data Mahasiswa</legend>
                    <p>
                        <label for="nama">Nama Mahasiswa : </label>
                        <input type="text" name="namaMHS" id="namaMHS">
                    </p>
                    <p>
                        <label for="ipk">No HP : </label>
                        <input type="text" name="noHP" id="noHP" placeholder="Contoh : 0811222333444">
                    </p>
                </fieldset>
                <p>
                  <input type="submit" name="input" value="Simpan">
                </p>
            </form>
        </div>
    </body>
</html>
