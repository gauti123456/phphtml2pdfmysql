<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML2PDF PHP Example to Insert Data From Table to PDF Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">
            HTML2PDF Example to Insert Data in PDF Document From Database
        </h1>
        <form id="form" method="POST">
            <div class="form-group container">
                <label for="name">Enter your Name:</label>
                <input type="text" id="name" required class="form-control">
            </div>
            <div class="form-group container">
                <label for="country">Enter your Team:</label>
                <input type="text" id="team" required class="form-control">
            </div>
            <div class="form-group container">
                <label for="country">Enter your Country:</label>
                <input type="text" id="country" required class="form-control">
            </div>
            <div class="form-group container">
                <button type="submit" class="btn btn-danger btn-block">
                    Insert Data in Table
                </button>
            </div>
        </form>
                        <button id="button" class="btn btn-primary btn-block" onclick="downloadPDF()">Download PDF</button>


        <table id="table" class="table table-striped">
          <thead>
              <th>Name</th>
              <th>Team</th>
              <th>Country</th>
          </thead>
          <tbody id="result">
              <?php require_once('displaydata.php') ?>
          </tbody>
        </table>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$("#form").submit((e) => {
    e.preventDefault()

    $.ajax({
        method:"POST",
        url:'insertdata.php',
        data:{name_of_player:$("#name").val(),team:$("#team").val(),country:$("#country").val()},
        success:function(data){
            $("#name").val("")
            $("#country").val("")
            $("#team").val("")
            if(data == "success"){
                location.reload()
            }
        }
    })

})

function downloadPDF(){

    let table = document.getElementById('table')

    let options = {
        margin:1,
        filename:'test.pdf',
        image:{
            type:'png',
            quality:1
        },
        html2canvas:{
            scale:2
        },
        jsPDF:{
            unit:'in',
            format:'tabloid',
            orientation:'landscape'
        }
    }

    html2pdf().from(table).set(options).save()
} 
</script>
</html>