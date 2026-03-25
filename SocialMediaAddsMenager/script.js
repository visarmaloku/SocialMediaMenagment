function selectPlan(planName, price) {
    document.getElementById('selected-plan').value = planName + " - €" + price;
    document.getElementById('order-section').scrollIntoView({ behavior: 'smooth' });
}

document.getElementById('agencyForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('form-message');
    
    messageDiv.innerHTML = "Duke u dërguar...";

    fetch('order.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        messageDiv.innerHTML = data;
        if(data.includes("Success")) {
            document.getElementById('agencyForm').reset();
        }
    })
    .catch(error => {
        messageDiv.innerHTML = "Gabim: " + error;
    });
});