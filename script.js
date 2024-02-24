document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    var email_phone = document.getElementById("email_phone").value;
    var password = document.getElementById("password").value;

    // Validation logic for email/phone and password
    if (!email_phone.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) && !email_phone.match(/^\d{10,}$/)) {
        alert("Masukkan alamat email yang valid atau nomor telepon yang valid");
        return false;
    }
    

    // Submit the form if validation passes
    this.submit();
});