var amount = document.getElementById("amount").getAttribute("data-name");
paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: amount
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details['id'])
            sessionStorage.setItem("id", details['id']);
            sessionStorage.setItem("amount", amount);
            window.location.replace("http://localhost/PayPal_Integration/success.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost/PayPal_Integration/Oncancel.php")
    }
}).render('#paypal-payment-button');