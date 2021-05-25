function createPDF() {
    var doc = new jsPDF();          
    var elementHandler = {
      '.ignorePDF': function (element, renderer) {
        return true;
      }
    };
    var source = window.document.getElementById('printtext');
    doc.fromHTML(
        source,
        15,
        15,
        {
          'width': 180,'elementHandlers': elementHandler
        });
    
    doc.save();
}