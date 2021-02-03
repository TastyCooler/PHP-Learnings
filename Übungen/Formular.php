<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="Formular2.php" method="post">
      Kraftstoffsorte
      <select name="kraftstoff">
        <option value="Diesel">Diesel</option>
        <option value="SuperE10">SuperE10</option>
        <option value="Super">Super</option>
        <option value="Super+">Super+</option>
      </select>
      <br>
      Tankmonat
      <select name="monat">
        <option>Januar</option>
        <option>Februar</option>
        <option>März</option>
        <option>April</option>
        <option>Mai</option>
        <option>Juni</option>
        <option>Juli</option>
        <option>August</option>
        <option>September</option>
        <option>Oktober</option>
        <option>November</option>
        <option>Dezember</option>
      </select>
      <br>
      <table cellspacing="0" cellpadding="10">
        <tr>
          <th>Nr</th>
          <th>Tankfüllung</th>
          <th>Zahlbetrag</th>
        </tr>
        <tr>
          <td>1</td>
          <td> <input type="text"><b>l</b></td>
          <td> <input type="text"><b>€</b></td>
        </tr>
        <tr>
          <td>2</td>
          <td> <input type="text"><b>l</b></td>
          <td> <input type="text"><b>€</b></td>
        </tr>
        <tr>
          <td>3</td>
          <td> <input type="text"><b>l</b></td>
          <td> <input type="text"><b>€</b></td>
        </tr>
        <tr>
          <td>4</td>
          <td> <input type="text"><b>l</b></td>
          <td> <input type="text"><b>€</b></td>
        </tr>
      </table>
      <input class="button" type="submit" value="Absenden">
    </form>
  </body>
</html>
