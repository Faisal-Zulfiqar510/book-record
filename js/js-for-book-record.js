function delRow(val) {
    let ans = confirm("Are you sure to delete entry from table");
    console.log(ans);
    if (ans) {
        window.location.replace("DDL-DML/delete-data.php?delete="+val);
    } else {
        return;
    }

}
function editRow(val) {
    window.location.replace("home.php?edit="+val);

}


/*
function chk_me(v){
   // let v = $("#searchBox").val();
    console.log(v)
    if (v!="") {
        window.location.replace("table-for-books.php?text=" + v);
    }
    alert("hello");
}*/
