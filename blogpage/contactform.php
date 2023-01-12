<!DOCTYPE html>
<head>

    <?php require_once('config.php') ?>
    <link rel="stylesheet" href="css/generalcss.css">
    <link rel="stylesheet" href="css/contactform.css">

</head>
<body>
    
    <?php require_once('navbar.php') ?>


    <form id="contact-form">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br>
        <button class="button" type="submit">Send</button>
      </form>
      
      <script>
        const form = document.getElementById('contact-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault(); // prevent the form from being submitted
      
          const name = document.getElementById('name').value;
          const email = document.getElementById('email').value;
          const message = document.getElementById('message').value;
      
          // construct the email message
          const body = `Name: ${name}\nEmail: ${email}\n\n${message}`;
      
          window.location.href = `mailto:cagrisengul123@gmail.com?subject=Contact Form Submission&body=${encodeURIComponent(body)}`;
        });
      </script>


    <div class="footer">
          <p>Event Reviews &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
