
function AgeIndays() {

    var birthyear = prompt("In which Year you were born ?");
    var ageindays = (2020 - birthyear) * 365;
    // console.log(ageindays)
    var h1 = document.createElement('h1');
    var textanswer = document.createTextNode("You are "+ ageindays +" Days old");
    h1.setAttribute('id','AgeIndays');
    h1.appendChild(textanswer);
    document.getElementById('flex-box-result').appendChild(h1);
}

function reset(){
    document.getElementById('AgeIndays').remove();
}
