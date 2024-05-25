function addRow() {
    let table = document.getElementById("rules");
    
    let rowCount = table.rows.length;

    let newRow = table.insertRow(rowCount);

    let cell1 = newRow.insertCell(0);
    cell1.innerHTML = rowCount + 1;
    
    let cell2 = newRow.insertCell(1);
    cell2.innerHTML = '<input type="text" name="description[]" class="form-control text-center" required>';
    
    let cell3 = newRow.insertCell(2);
    cell3.innerHTML = '<input type="text" name="details[]" class="form-control text-center" required>';
}