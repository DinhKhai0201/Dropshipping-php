// var printPDF = function printPDF() {
// 	var quality = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
// 	var filename = 'GerarPDF.pdf';
// 	html2canvas(document.querySelector('.container'), { scale: quality },{
// 		onrendered: function (canvas)  {
// 			var pdf = new jsPDF('p', 'mm', 'a4');
// 			// pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
// 			pdf.addImage(canvas.toDataURL('image/jpeg', 1.0), 'JPEG', 0, 0, 0, 0);
// 			pdf.save(filename);
// 		}});
// };
function xoa_dau(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}
var printPDF = function printPDF() {
  // var quality = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  // var filename = 'GerarPDF.pdf';
  // html2canvas(document.querySelector('#content-pdf'), { scale: quality }).then(function (canvas) {
  // 	var pdf = new jsPDF('p', 'mm', 'a4');
  // 	//pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
  // 	pdf.addImage(canvas.toDataURL('image/jpeg', 1.0), 'JPEG', 0, 0, 0, 0);
  // 	pdf.save(filename);
  // });
  var name = xoa_dau($("#Fullname").html());
  var career = xoa_dau($("#Career_goals").html());
  var quality = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  var filename = name + "-" + career + ".pdf";
  html2canvas(document.querySelector("#content-pdf"), { scale: quality }).then(
    function(canvas) {
      var imgData = canvas.toDataURL("image/JPEG", 1.0);
      /*
        Here are the numbers (paper width and height) that I found to work. 
        It still creates a little overlap part between the pages, but good enough for me.
        if you can find an official number from jsPDF, use them.
        */
      var imgWidth = 210;
      var pageHeight = 297;
      var imgHeight = (canvas.height * imgWidth) / canvas.width;
      var heightLeft = imgHeight;

      var doc = new jsPDF("p", "mm", "a4");
      var position = 0;

      doc.addImage(imgData, "JPEG", 0, position, 0, 0);
      heightLeft -= pageHeight;

      while (heightLeft >= 0) {
        position = heightLeft - imgHeight;
        doc.addPage();
        doc.addImage(imgData, "JPEG", 0, position, 0, 0);
        heightLeft -= pageHeight;
      }
      doc.save(filename);
    }
  );
};
// kick button xuatCV call function printPDF
$(document).ready(function() {
  $(".exportcv_pdf").click(function() {
    setTimeout(
      () => {
        printPDF();
        // printRawHtml();
        setTimeout(() => {
            $("#myModalCVExport").css("display", "none");
            $("#myModalCVExport").removeClass("in");
            $('#page-top').removeClass('modal-open')
        }, 100);
      },
      400,
    );
  });

function printRawHtml() {
    printJS({
      printable: $('#content-pdf').html(),
      type: 'raw-html',
      style: `
      .header-modal{
        margin-bottom: 20px;
        background: rgb(243, 180, 0);
    }
    .crop-modal-content {
        background-color: #fefefe;
        margin: 30px auto;
        border: 1px solid #888;
    }
    .mainDetails{
        padding: 25px 35px;
    
    }
    #headshot{
        width: 12.5%;
        float: left;
        margin-right: 30px;
    }
    .mainDetails #name{
        float: left;
    }
    .mainDetails #name h1{
        font-weight: 700;
        margin-bottom: -6px;
        font-size: 34px;
        color: #fff;
        margin-top: -14px;
    }
    .mainDetails #name h2{
        margin-left: 2px;
        font-size: 16px;
        margin-top: 3px;
        color: #fff;
    }
    #mainArea{
        padding: 0 40px;
        padding-bottom: 60px;
    }
    #mainArea section{
        padding: 0px;
    }
    .sectionTitle {
        float: left;
        width: 25%;
        font-size: 20px;
        text-transform: uppercase;
    }
    .sectionContent {
        float: right;
        width: 72.5%;
    }
    
    .sectionContent h2 {
        margin: 0px;
        margin-bottom: -2px;
        font-weight: bold;
        font-size: 16px;
        display: inline-block;
    }
    .modal-backdrop.fade.in{
        z-index: -1;
    }
    .exportcv_pdf{
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        padding: 6px 20px;
    }
    .keySkills {
        list-style-type: none;
        margin: 0;
        padding: 0;
        margin-bottom: 20px;
        color: #444;
    }
      `
    })
  }
});
