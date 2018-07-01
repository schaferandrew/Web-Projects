function TicTacToe(id) {
    this.board = [['', '', ''], ['', '', ''], ['', '', '']];
  
    this.board[0][0] = 'X';
    this.board[1][1] = 'O';
    this.board[2][1] = 'O';
    this.div = document.getElementById(id);

    this.present = function() {
        var html = "<table>";
        for(var r=0; r<3; r++) {
            html += "<tr>";
            for(var c=0;  c<3; c++) {
                html += "<td>" + this.board[r][c] + "</td>";
            }
         html += "</tr>";
        }
    
        html += "</table>";

        this.div.innerHTML = html;
    }

    this.present();
    
    this.makeMove = function(r,c) {
        this.board[r][c] = this.currentMove;
        var won = this.checkWin(); 
        
        if(this.currentMove === "X") {
            this.currentMove = "O"
        } else {
            this.currentMove = "X"
        }

	   if( won === false) {
            this.present();
	   }
    }
}