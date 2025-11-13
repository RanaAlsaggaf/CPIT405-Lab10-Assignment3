<?php
/* Rana Alsaggaf - 2209314 */
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Books</title>
  <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
  <h2>Books</h2>

  <form id="createForm" method="post" action="../controllers/books.php?action=create">
    <input name="title" placeholder="Title" required>
    <input name="author" placeholder="Author" required>
    <input name="year" type="number" placeholder="Year">
    <select name="status">
      <option>Available</option>
      <option>Borrowed</option>
      <option>Damaged</option>
    </select>
    <button type="submit">Add Book</button>
  </form>

  <table border="1" cellpadding="6" id="tbl">
    <thead>
      <tr><th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Status</th><th>Actions</th></tr>
    </thead>
    <tbody></tbody>
  </table>

  <script src="../js/script1.js"></script>
  <script>
    loadBooks();

    document.getElementById('createForm').addEventListener('submit', async (e)=>{
      e.preventDefault();
      const fd=new FormData(e.target);
      await fetch(e.target.action,{method:'POST',body:fd});
      e.target.reset();
      loadBooks();
    });

    async function loadBooks(){
      const res=await fetch('../controllers/books.php?action=list');
      const data=await res.json();
      const tb=document.querySelector('#tbl tbody');
      tb.innerHTML='';
      data.forEach(row=>{
        const tr=document.createElement('tr');
        tr.innerHTML=`
          <td>${row.id}</td>
          <td><input value="${row.title}" data-id="${row.id}" class="title"></td>
          <td><input value="${row.author}" data-id="${row.id}" class="author"></td>
          <td><input type="number" value="${row.year_published??''}" data-id="${row.id}" class="year"></td>
          <td>
            <select data-id="${row.id}" class="status">
              ${['Available','Borrowed','Damaged'].map(s=>`<option ${row.status===s?'selected':''}>${s}</option>`).join('')}
            </select>
          </td>
          <td>
            <button onclick="updateBook(${row.id})">Update</button>
            <button onclick="deleteBook(${row.id})">Delete</button>
          </td>`;
        tb.appendChild(tr);
      });
    }
    async function updateBook(id){
      const fd=new FormData();
      fd.append('id',id);
      fd.append('title',document.querySelector(`input.title[data-id="${id}"]`).value);
      fd.append('author',document.querySelector(`input.author[data-id="${id}"]`).value);
      fd.append('year',document.querySelector(`input.year[data-id="${id}"]`).value);
      fd.append('status',document.querySelector(`select.status[data-id="${id}"]`).value);
      await fetch('../controllers/books.php?action=update',{method:'POST',body:fd});
      loadBooks();
    }
    async function deleteBook(id){
      const fd=new FormData(); fd.append('id',id);
      await fetch('../controllers/books.php?action=delete',{method:'POST',body:fd});
      loadBooks();
    }
  </script>
</body>
</html>
