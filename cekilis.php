<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Web3 Uygulaması - Çekiliş</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
      integrity="sha512-CV7WWnKlDyGAnEIsS1H11V2z6cqugOZvJxNy1Kyr0Mbx6UeY6w+LU6r5NJ6jK9pIiHYoFZkiqKqAilLXX8IcFQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body class="bg-light">
    <div class="container py-5">
    
      <table style="background-color: #0077be; color: white; border-collapse: collapse; width: 100%;">
        <tr>
          <th style="padding: 20px;"><h1>Web3 Uygulaması - Çekiliş</h1></th>
        </tr>
      </table>
      
      <table style="border-collapse: collapse; margin-top: 30px; width: 100%;">
        <tr>
          <td style="padding: 20px;">
            <?php
              // Load the list of wallet addresses from the text file
              $walletAddresses = file('cuzdanlar.txt', FILE_IGNORE_NEW_LINES);

              // Get a random wallet address as the winner
              $winnerAddress = $walletAddresses[array_rand($walletAddresses)];

              echo "<div class='card mb-3'><div class='card-header' style='border-color: #0077be; color: #0077be;'>Tebrikler! Kazanan adres:</div>";
              echo "<div class='card-body'><h1 class='card-title'>".$winnerAddress."</h1></div></div>";
            ?>
          </td>
        </tr>
      </table>

      <table style="margin-top: 30px; width: 100%;">
        <tr>
          <td style="text-align: center;">
            <button class="btn btn-primary" onclick="connectAndSend()">Ödül Gönder</button>
          </td>
        </tr>
      </table>
      
    </div>

    <!-- Load Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"
      integrity="sha512-z0AUJyCvMaD5U6rKj+MmW9zZ7AvBpxKKkZH2LgGELPNlJYwBK6U5E6lTGlsrdpN9sqPZoOIq3IepkMFxNcFtkQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    
    <!-- Load Web3.js and detect-provider.js libraries -->
    <script src="https://unpkg.com/@metamask/detect-provider/dist/detect-provider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>

    <script>
      // Set the reward amount and winner address
      const odul_miktari = 0.1;
      const kazanan_adres = "<?php echo $winnerAddress; ?>";

      // Connect to MetaMask and send reward to the winner address
      async function connectAndSend() {
        // Detect the MetaMask provider
        const provider = await detectEthereumProvider();

        if (provider) {
          // Use the provider to create a Web3 instance
          const web3 = new Web3(provider);

          try {
            // Get the selected account from MetaMask
            if (window.ethereum) {
              await window.ethereum.request({ method: "eth_requestAccounts" });
              const accounts = await web3.eth.getAccounts();
              const walletAddress = accounts[0];

              // Send transaction to the specified address with specified amount of ether
              web3.eth.sendTransaction({
from: walletAddress,
to: kazanan_adres,
value: web3.utils.toWei(odul_miktari.toString(), 'ether')
});
}
} catch (error) {
console.error(error);
alert('Bir hata oluştu: ' + error.message);
}
} else {
alert('Lütfen MetaMask yükleyerek bu özelliği kullanın');
}
}
</script>
</body>
</html>