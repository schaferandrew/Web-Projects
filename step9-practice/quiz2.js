/**
 * Create a multiplication table and
 * put into an HTML element.
 * id - Id for a div to put table into
 * rows - Number of rows
 * cols - Number of cols
 */
function multTable(id, rows, cols) {
    html = "<table>"
        // rows
        for(var i = 1; i <= rows; i++)
        {
            html += "<tr>"
          // cells
          for(var j = 1; j <= cols; j++)
          {
              html += "<td>"+ (i*j) + "</td>"
          }
          html += "</tr>"
        }
        html += "</table"
        document.getElementById(id).innerHTML = html
    
    }