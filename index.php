<html>
<head>
    <title>Web3 Uygulaması</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        
        th, td {
            text-align: center;
            padding: 8px;
        }
        
        th {
            background-color: #0074D9;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        input[type=text], input[type=submit] {
            display: block;
            margin: 10px auto;
            padding: 5px;
            width: 60%;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        
        input[type=submit] {
            background-color: #0074D9;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">Cüzdan Adresi Kaydet</th>
        </tr>
        <form method="post" action="gonder.php">
          <tr>
              <td>Cüzdan adresi:</td>
              <td><input type="text" name="cuzdan_adresi"></td>
          </tr>
          <tr>
              <td colspan="2"><input type="submit" value="Kaydet"></td>
          </tr>
        </form>
    </table>
    
    <form action="cekilis.php">
        <input type="submit" value="Çekiliş Yap">
    </form>
</body>
</html>
