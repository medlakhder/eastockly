
<?php session_start(); ?>




<?php

if(!isset($_SESSION['password']) || !isset($_POST['qr_code'])){

  header('location: index.php');
}

include 'include/conn.php';




?>

<!DOCTYPE html>
<html>
<head>
    <!-----------------Include those files---------------------->


    <script src="https://kendo.cdn.telerik.com/2020.3.915/js/jquery.min.js"></script>
    
    <script src="https://kendo.cdn.telerik.com/2020.3.915/js/jszip.min.js"></script>
    
    <script src="https://kendo.cdn.telerik.com/2020.3.915/js/kendo.all.min.js"></script>


    <!-----------------Include those files---------------------->


  <script src="https://kit.fontawesome.com/d281bae09b.js" crossorigin="anonymous"></script> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <title></title>

<style type="text/css">
  

* {

  position: inline;
  padding:0;
  margin:0;
  font-family: 'Cairo', sans-serif;
}



.clean{
  margin:15px;
  outline: none;
  background:black;
  font-size: 20px;
  color:white;
  padding:30px;
  width:100%; 
  border:3px solid black;
  transition: all 0.2s ease-in-out;
  padding:10px;
  bottom: -19px;
  right: -15px;

}

.clean:hover{
  background:white;
  border:1px solid white;
  color:#1f49b6;
  transition: all 0.2s ease-in-out;
}

::placeholder{
  color:white;
  font-size: 17px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color:white;
}

td, th {
  border:none;
  border-bottom: 1px solid grey;
  width: 100%;
  text-align: left;
  padding: 10px;
}


.button_search{
  margin:7px;
  width: 230px;
  padding:8px;
  background:transparent;
  color:white;
  border:1px solid white;
  font-size: 17px;
  outline:none;

}
.button_search:hover{
  background:white;
  color:#003873;
  border:1px solid white;
}

</style>

</head>
<body style='background:#003873'>



<br>

<p style="color:white;font-size: 18px;text-align: center;">التعريف : <?php echo $_POST['qr_code'];  ?></p>
<center><hr color="white" style="margin:7px;" width="50%"></hr></center>


<!---------------------------------------------------------------------->
<!------------------- Check if the Qr Code exist ----------------------->
<!---------------------------------------------------------------------->

<?php
                                
                $conn = $pdo->open();

                $qr = $_POST['qr_code'];

                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM eat WHERE qr_code=:qr");
                $stmt->execute(['qr'=>$qr]);
                $urow =  $stmt->fetch();

                if($urow['numrows']==0){

                    echo "<center><p style='margin-top:160px;color:white;opacity:0.8;padding:10px;font-size:25px'>المنتج غير موجود</p></center>";
                }


                
              ?>

<!---------------------------------------------------------------------->
<!------------------- Check if the Qr Code exist ----------------------->
<!---------------------------------------------------------------------->








<!---------------------------------------------------------------------->
<!------------------- Display Product Here ----------------------------->
<!---------------------------------------------------------------------->

<?php
                
                $conn = $pdo->open();

                $qr = $_POST['qr_code'];

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:qr");
                $stmt->execute(['qr'=>$qr]);
                foreach ($stmt as $row) {
                  
                  $id = $row['id'];
                  $nom = $row['nom'];
                  $buy_date = $row['buy_date']; 
                  $buy_price = $row['buy_price']; 
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $die_date = $row['die_date']; 
                  $supplier_name = $row['supplier_name']; 
                  $supplier_phone = $row['supplier_phone'];              
                    
                    echo"

                      <center>
                      <div  style='background:#003873' >
                     
                <div style='margin:50px;padding:10px'>


                <center style='color:white;font-size:20px'><p id='title'>".$nom."</p></center>
                
                
                <br>
                <center>
                <img style='opacity:0.6' src='images/".$photo."' width='200px' height='200px' >
                </center>

                <table>
  <tr>
    <td>$buy_date</td>
    <td id='buy_date'><b>تاريخ الشراء </b></td>

  </tr>
  <tr>
    <td>$buy_price Dh </b></td>
    <td id='buy_price'><b>ثمن الشراء</td>
  
  </tr>
  <tr>
    <td>$sell_price Dh </b></td>
    <td id='sell_price'><b>ثمن البيع</td>
  
  </tr>
  <tr>
    <td>$die_date</td>
    <td id='die_date'><b>انتهاء الصلاحية</b></td>
  
  </tr>
    <tr>
    <td>$supplier_name</td>
    <td id='supp_name'><b>المورد </b></td>
  
  </tr>
<tr>
    <td>$supplier_phone</td>
    <td id='supp_phone'><b>هاتف المورد </b></td>
  
  </tr>

</table>
               
                </div>
                </center>
                </div>


                <center><div class='content-medoo' style='height: 200px;width: 230px;border:none;background:white'>

                      <div style='height: 50%;width: 100%;background: linear-gradient(to left,#005799 0,#48dbfc)'>
                        
                        <p style='padding-top:22px;font-size: 28px;color:white'>$qr</p>

                      </div>
                        <div style='height: 50%;width: 100%;display: inline-flex;'>
                            
                            <img style='position: relative;top:10px;right:-8px' width='80px' height='80px' src='images/qrcode.png'>  
                            <p style='top:15px;font-weight: lighter;position:relative;font-size: 40px;right:-25px'>$sell_price Dh</p>

                        </div>


                    </div></center>
                    <br>

                <center>
                    <div>
                      <form action='edit.php' method='post'>
                      <input type='hidden' name='id' value='".$id."'>
                      <button name='edit' class='button_search' type='submit'>تغيير   <i class='far fa-edit'></i></button>
                      </form> 
                        
                        <form action='include/del_or_edit.php' method='post'>
                      <input type='hidden' name='id' value='".$id."'>
                      <button name='delete' class='button_search' type='submit'>حذف  <i class='fas fa-trash'></i></button>
                      </form> 
                        
                      
                      
                      <button style='font-weight:bolder;background:white;border:1px solid white;color:#003873' onclick='ChangeText()' name='print' class='button_search export-pdf'>تحميل  <i class='fas fa-print'></i></button>  
 
                    </div>
                  </center>


                    ";
                  
                }
                


                


              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();

              ?> 
              
              
                  
                  
                  

              
                  <br><br><br>


                    

                    

<!---------------------------------------------------------------------->
<!------------------- Display Product Here ----------------------------->
<!---------------------------------------------------------------------->

<center><a href='dashboard.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  رجوع <i style="font-size: 15px" class='fas fa-arrow-right'></i></a></center>



<!----------------- Important file ---------------------->


<script>


    kendo.pdf.defineFont({
        "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
        "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
        "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "WebComponentsIcons"      : "https://kendo.cdn.telerik.com/2017.1.223/styles/fonts/glyphs/WebComponentsIcons.ttf"
    });
</script>

<!-- Load Pako ZLIB library to enable PDF compression -->
<script src="https://kendo.cdn.telerik.com/2017.3.913/js/pako_deflate.min.js"></script>

<script>
$(document).ready(function() {

    $(".export-pdf").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".content-medoo"))
        .then(function(group) {
            // Render the result as a PDF file
            return kendo.drawing.exportPDF(group, {
                paperSize: "auto",
                margin: { left: "0cm", top: "0cm", right: "0cm", bottom: "0cm" } // Chhal padding dlpage
            });
        })
        .done(function(data) {
            // Save the PDF file
            kendo.saveAs({
                dataURI: data,
                fileName: "ticket.pdf",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });

 



    var data = [{
      "source": "Approved",
      "percentage": 237
    }, {
      "source": "Rejected",
      "percentage": 112
    }];

    var refs = [{
      "source": "Dev",
      "percentage": 42
    }, {
      "source": "Sales",
      "percentage": 18
    }, {
      "source": "Finance",
      "percentage": 29
    }, {
      "source": "Legal",
      "percentage": 11
    }];

    $("#applications").kendoChart({
      legend: {
        position: "bottom"
      },
      dataSource: {
        data: data
      },
      series: [{
        type: "donut",
        field: "percentage",
        categoryField: "source"
      }],
      chartArea: {
          background: "none"
      },
      tooltip: {
        visible: true,
        template: "${ category } - ${ value } applications"
      }
    });

    $("#users").kendoChart({
        legend: {
            visible: false
        },
        seriesDefaults: {
            type: "column"
        },
        series: [{
            name: "Users Reached",
            data: [340, 894, 1345, 1012, 3043, 2013, 2561, 2018, 2435, 3012]
        }, {
            name: "Applications",
            data: [50, 80, 120, 203, 324, 297, 176, 354, 401, 349]
        }],
        valueAxis: {
            labels: {
                visible: false
            },
            line: {
                visible: false
            },
            majorGridLines: {
                visible: false
            }
        },
        categoryAxis: {
            categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
            line: {
                visible: false
            },
            majorGridLines: {
                visible: false
            }
        },
        chartArea: {
            background: "none"
        },
        tooltip: {
            visible: true,
            format: "{0}",
            template: "#= series.name #: #= value #"
        }
    });

    $("#referrals").kendoChart({
      legend: {
        position: "bottom"
      },
      dataSource: {
        data: refs
      },
      series: [{
        type: "pie",
        field: "percentage",
        categoryField: "source"
      }],
      chartArea: {
          background: "none"
      },
      tooltip: {
        visible: true,
        template: "${ category } - ${ value }%"
      }
    });

    $("#grid").kendoGrid({
      dataSource: {
        type: "odata",
        transport: {
          read: "https://demos.telerik.com/kendo-ui/service/Northwind.svc/Customers"
        },
        pageSize: 15,
        group: { field: "ContactTitle" }
      },
      height: 450,
      groupable: true,
      sortable: true,
      selectable: "multiple",
      reorderable: true,
      resizable: true,
      filterable: true,
      pageable: {
        refresh: true,
        pageSizes: true,
        buttonCount: 5
      },
      columns: [
        {
          field: "ContactName",
          template: "<div class=\'customer-name\'>#: ContactName #</div>",
          title: "Contact",
          width: 200
        },{
          field: "ContactTitle",
          title: "Contact Title",
          width: 220
        },{
          field: "Phone",
          title: "Phone",
          width: 160
        },{
          field: "CompanyName",
          title: "Company Name"
        },{
          field: "City",
          title: "City",
          width: 160
        }
      ]
    });
   });
</script>

</body>
</html>