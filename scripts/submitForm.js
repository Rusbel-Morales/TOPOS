function submitForm() {
    const Form = document.getElementById("Form");
    if (Form.checkValidity()) {
        Form.submit();
    } else {
        Form.reportValidity();
    }
}