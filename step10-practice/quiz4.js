function TicTacToe(id) {
    this.board = [['', '', ''], ['', '', ''], ['', '', '']];
    this.currentMove = "X";
    this.div = document.getElementById(id);
    this.present = function() {
        html = "<table>";
        for(var r=0; r<3; r++) {
            html += "<tr>";
            for(var c=0;  c<3; c++) {
                if (this.board[r][c]=='') {
                    html += "<td onclick='ttt.makeMove("+r+", "+c+");'>&nbsp;</td>";
                } else {
                    html += "<td>" + this.board[r][c] + "</td>";
                }
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

    this.checkWin = function() {
        var msg = "";
        if(this.board[0][0] === "X" && this.board[0][1] === "X" && this.board[0][2] === "X") {
            msg = "<p>X Wins!</p>";
        } else if (this.board[0][0] === "O" && this.board[0][1] === "O" && this.board[0][2] === "O") {
            msg = "<p>O Wins!</p>";
        } else if (this.board[0][0] === "X" && this.board[1][0] === "X" && this.board[2][0] === "X") {
            msg = "<p>X Wins!</p>";
        } else if (this.board[0][0] === "O" && this.board[1][0] === "O" && this.board[2][0] === "O") {
            msg = "<p>O Wins!</p>";
        } else if (this.board[2][0] === "X" && this.board[2][1] === "X" && this.board[2][2] === "X") {
            msg = "<p>X Wins!</p>";
        } else if (this.board[2][0] === "O" && this.board[2][1] === "O" && this.board[2][2] === "O") {
            msg = "<p>O Wins!</p>";
        } else if (this.board[1][0] === "O" && this.board[1][1] === "O" && this.board[1][2] === "O") {
            msg = "<p>O Wins!</p>";
        } else if (this.board[1][0] === "X" && this.board[2][1] === "X" && this.board[2][2] === "X") {
            msg = "<p>X Wins!</p>";
        } else if (this.board[1][0] === "O" && this.board[1][1] === "O" && this.board[1][2] === "O") {
            msg = "<p>O Wins!</p>";
        } else if (this.board[0][1] === "O" && this.board[1][1] === "O" && this.board[2][1] === "O") {
            msg = "<p>O Wins!</p>";
         } else if (this.board[0][1] === "X" && this.board[1][1] === "X" && this.board[2][1] === "X") {   
            msg = "<p>X Wins!</p>";
         } else if (this.board[0][2] === "O" && this.board[1][2] === "O" && this.board[2][2] === "O") {
            msg = "<p>O Wins!</p>";
         } else if (this.board[0][2] === "X" && this.board[1][2] === "X" && this.board[2][2] === "X") {
            msg = "<p>X Wins!</p>";
         } else if (this.board[0][2] === "O" && this.board[1][1] === "O" && this.board[2][0] === "O") {
            msg = "<p>O Wins!</p>";
         } else if (this.board[0][2] === "X" && this.board[1][1] === "X" && this.board[2][0] === "X") {
            msg = "<p>X Wins!</p>";
         } else if (this.board[0][0] === "O" && this.board[1][1] === "O" && this.board[2][2] === "O") {
           msg = "<p>O Wins!</p>";
         } else if (this.board[0][0] === "X" && this.board[1][1] === "X" && this.board[2][2] === "X") {
           msg = "<p>X Wins!</p>";
        }
        
        if (msg === "<p>X Wins!</p>") {
            this.present();
            this.newGame(msg);
	        return true;
        } else if (msg === "<p>O Wins!</p>") {
            this.present();
            this.newGame(msg);
	        return true;
        } else {
	        return false;
	    }	
    }
    this.newGame = function(msg) {
        html += "<p>" + msg + "</p>" +
        "<a href=''>New Game</a>";
    
        this.div.innerHTML = html;

    }
}