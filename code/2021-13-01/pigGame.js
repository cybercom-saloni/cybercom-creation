/* Game Rules:
- the game has 2 players,playing in rounds.
- In each turn,a player rolls a dice as many times as he wishes.Each result get added to his round score.
- But,if the player rolls a 1,all his round score gets lost.After that,it's the next player's turn.
- The player can choose to 'hold',which means his round score gets added to his GLOBAL Score.After that,it's the next player's turn.
- The first player to reach 100 points on GLOBAL Score wins the game.
*/

var scores,roundScore,activePlayer;
scores=[0,0];
roundScore=0;
activePlayer=0;

document.querySelector('.dice').style.display='none';

document.getElementById('score-0').textContent='0';
document.getElementById('score-1').textContent='0';
document.getElementById('Current-0').textContent='0';
document.getElementById('Current-0').textContent='0';
document.querySelector('.btn-roll').addEventListener('click',function(){

	// 1.random no
			var dice=Math.floor(Math.random()*6)+1;

	// 2.display the result

		document.querySelector('.dice').style.display='block';

		
		var diceDOM= document.querySelector('.dice');
		diceDOM.style.display='block';
		diceDOM.src='dice-'+dice+'.png';

	// 3.update the round score if the rolled no is not 1
		// change value on the web page setter sets the value
		// document.querySelector('#Current-'+activePlayer).textContent=dice;
 		document.querySelector('#Current-'+activePlayer).innerHTML='<em>'+dice+'</em>';

 		// getter to get the values.
		var x=document.querySelector('#score-0').textContent;
		console.log(x);
});	