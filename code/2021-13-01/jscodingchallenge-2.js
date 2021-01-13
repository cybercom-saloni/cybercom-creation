function calc(bill)
{
	var billcount;
	if(bill<50)
	billcount= 20/100;
else if (bill >=50 && bill<200) 
{
	billcount =15/100;

}
else
{
	billcount=10/100;
}
return billcount * bill;

}

var resto=[124,48,268];
var tipdif =[calc(resto[0]),
			calc(resto[1]),
			calc(resto[2])];
console.log(tipdif);
