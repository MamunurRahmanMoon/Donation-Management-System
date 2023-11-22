function donationConfirmation(){
    
    let amount = document.getElementById('personDonate').value;
    let msg = document.getElementById('personMsg').value;
    let donation = {'amount': amount, 'msg': msg};
    let data = JSON.stringify(donation);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/donorCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('json='+data);
    xhttp.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){
            alert(this.responseText);
            let response = JSON.parse(this.responseText);
            document.getElementById(personDonateConfirm).innerHTML = response;
        }
        
    }
}