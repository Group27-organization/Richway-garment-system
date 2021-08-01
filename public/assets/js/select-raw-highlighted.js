function selectRow(evt) {
    let i, tblrows;

    if (evt != null) {
        tblrows = document.getElementsByClassName("tblrow");
        for (i = 0; i < tblrows.length; i++) {
            tblrows[i].className = tblrows[i].className.replace(" active-row", "");
        }
        evt.currentTarget.className += " active-row";
    }
}