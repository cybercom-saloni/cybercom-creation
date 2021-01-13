var John={
	fullname:'John',
	johnMass:100,
	johnHeight:1.55
};

var Mark={
	fullname:'Mark',
	markMass:120,
	markHeight:1.45
};

function johnBMI()
{
	return John.johnMass/(John.johnHeight*John.johnHeight);
}

function markBMI()
{
	return Mark.markMass/(Mark.markHeight*Mark.markHeight);

}

if(johnBMI>markBMI)
{
	console.log("JOHN has highest BMI"+johnBMI());
	alert("JOHN has highest BMI"+johnBMI());

}
else
{
	console.log("MARK has highest BMI"+markBMI());
	alert("MARK has highest BMI"+markBMI());
}