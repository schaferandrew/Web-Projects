function TicTacToe(id) {
    this.board = [['', '', ''], ['', '', ''], ['', '', '']];
    this.currentMove = "X";
    this.div = document.getElementById(id);

    this.present = function() {
        var html = "<table>";
        html += "<tr>";
        if(this.board[0][0] === '') {
            html += "<td onclick='ttt.makeMove(0, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][0] + "</td>";
        }
        if(this.board[0][1] === '') {
            html += "<td onclick='ttt.makeMove(0, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][1] + "</td>";
        }
        if(this.board[0][2] === '') {
            html += "<td onclick='ttt.makeMove(0, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][2] + "</td>";
        }
        html += "</tr>";
        if(this.board[1][0] === '') {
            html += "<td onclick='ttt.makeMove(1, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][0] + "</td>";
        }
        if(this.board[1][1] === '') {
            html += "<td onclick='ttt.makeMove(1, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][1] + "</td>";
        }        
        if(this.board[1][2] === '') {
            html += "<td onclick='ttt.makeMove(1, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][2] + "</td>";
        }
        html += "</tr>";
        if(this.board[2][0] === '') {
            html += "<td onclick='ttt.makeMove(2, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][0] + "</td>";
        }
        if(this.board[2][1] === '') {
            html += "<td onclick='ttt.makeMove(2, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][1] + "</td>";
        }
        if(this.board[2][2] === '') {
            html += "<td onclick='ttt.makeMove(2, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][2] + "</td>";
        }
        html += "</tr>";
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
    
    this.presentWin = function(msg) {
        var html = "<table>";
        html += "<tr>";
        if(this.board[0][0] === '') {
            html += "<td onclick='ttt.makeMove(0, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][0] + "</td>";
        }
        if(this.board[0][1] === '') {
            html += "<td onclick='ttt.makeMove(0, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][1] + "</td>";
        }
        if(this.board[0][2] === '') {
            html += "<td onclick='ttt.makeMove(0, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[0][2] + "</td>";
        }
        html += "</tr>";
        if(this.board[1][0] === '') {
            html += "<td onclick='ttt.makeMove(1, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][0] + "</td>";
        }
        if(this.board[1][1] === '') {
            html += "<td onclick='ttt.makeMove(1, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][1] + "</td>";
        }        
        if(this.board[1][2] === '') {
            html += "<td onclick='ttt.makeMove(1, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[1][2] + "</td>";
        }
        html += "</tr>";
        if(this.board[2][0] === '') {
            html += "<td onclick='ttt.makeMove(2, 0);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][0] + "</td>";
        }
        if(this.board[2][1] === '') {
            html += "<td onclick='ttt.makeMove(2, 1);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][1] + "</td>";
        }
        if(this.board[2][2] === '') {
            html += "<td onclick='ttt.makeMove(2, 2);'>&nbsp;</td>";
        } else {
            html += "<td>" + this.board[2][2] + "</td>";
        }
        html += "</tr>";
        html += "</table>";
        html += msg;
        html += "<p><a href=''>New Game</a></p>";

        this.div.innerHTML = html;
        console.log(this.div.innerHTML);
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
            this.presentWin(msg);
	        return true;
        } else if (msg === "<p>O Wins!</p>") {
            this.presentWin(msg);
	        return true;
        } else {
	        return false;
	}	
    }
}