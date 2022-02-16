function balanceStatus(){
    var balance_ok = checkBalance();
    if(!balance_ok){
        document.getElementById('insufficientErrorMessage').innerHTML = "*Oops! Insufficient Balance. Deposit more KRW to purchase a package"
    }
    else{
        document.getElementById('insufficientErrorMessage').innerHTML = ""
    }
}

function checkBalance(){
    var available_amount = document.getElementById('available_amount').value;
    var amount_to_withdraw = document.getElementById('form-package-amount').value;
    if(Number(available_amount) < Number(amount_to_withdraw)){
        return false;
    }
    return true;
}

function validatePurchase(purchase_type, form_id){	
    var pin = document.getElementById('pin').value;
    var pinerr = document.getElementById('pin-error');
    var balance_ok = purchase_type === "repurchase" ? true : checkBalance();
    if(balance_ok){
        if(pin.length > 0){
            pinerr.innerHTML = "";
            document.getElementById(form_id).submit();
        }
        else{
            pinerr.innerHTML = "*Sorry. Your pin is required to proceed."
        }
    }
    else{
        alert("Insufficient Balance!")
    }
}

