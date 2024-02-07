<?php

$pdo = require_once "../database.php";

$date = $_GET['id'];
$datef = date('d/m/Y', strtotime($date));

$statement = $pdo->prepare('SELECT * FROM events WHERE date="'.$date.'"');
$statement->execute();
$events = $statement->fetchAll(PDO::FETCH_ASSOC);

function delete(){

}

?>

<?php require_once "../views/layout.php"; ?>
  <div>
  <div class="p-4 text-xl">Feriado <?php echo $datef ?></div>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Data (Dia-Mês-Ano)
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Feriado
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach($events as $event): ?>
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?php echo $datef ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?php echo $event['name'] ?>
                </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href="update.php?id=<?=$event['id']?>">Editar</a>
              <br>
                <a href="delete.php?id=<?=$event['id']?>">Deletar</a>
              </br>
              </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>