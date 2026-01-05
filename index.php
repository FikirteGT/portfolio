<?php
// Handle form submission
$successMessage = '';
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Simulate sending email or processing (in real scenario, use mail() or a library)
        $successMessage = "Thank you, $name! Your message has been sent.";
    } else {
        $errorMessage = "Please fill out all fields correctly.";
    }
}

// Determine the current page
$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikirte's Portfolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #d4bed3ff; }
        header { background-color: #e07cd8ff; color: white; padding: 5px; text-align: center; }
        nav ul { list-style-type: none; padding: 0; }
        nav ul li { display: inline; margin: 0 15px; }
        nav ul li a { color: white; text-decoration: none; }
        main { max-width: 800px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        footer { background-color: #333; color: white; text-align: center;  padding: 10px; margin-top: 200px}
        form { display: flex; flex-direction: column; }
        form label { margin-top: 10px; }
        form input, form textarea { padding: 8px; margin-top: 5px; }
        form button { margin-top: 15px;padding: 10px; background-color: #333; color: white; border: none; cursor: pointer; }
        .success { color: green; }
        .error { color: red; }
        .project { margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
    </style>
</head>
<body>

<header>
    <h1>Fikirte  's Portfolio</h1>
    <nav>
        <ul>
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=about">About Me</a></li>
            <li><a href="?page=projects">Projects</a></li>
            <li><a href="?page=contact">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <?php if ($page === 'home'): ?>
        <h2>Welcome to My Portfolio</h2>
        <p>Hello, I'm Fikirte  .</p>
        <p>Short Bio: I am a passionate web developer with a focus on backend technologies.</p>
        <p>Career Goal: To become a full-stack developer specializing in scalable web applications.</p>
    <?php elseif ($page === 'about'): ?>
        <h2>About Me</h2>
        <p>Education: I am currently a student in Information Systems at XYZ University.</p>
        <p>Interests: PHP, web development, and databases.</p>
    <?php elseif ($page === 'projects'): ?>
        <h2>My Projects</h2>
        <div class="project">
            <h3>Project 1: Simple Blog System</h3>
            <p>Description: A basic blog platform where users can post and comment on articles.</p>
            <p>Technologies: PHP, HTML, CSS, MySQL</p>
        </div>
        <div class="project">
            <h3>Project 2: E-commerce Website</h3>
            <p>Description: A simple online store with product listings and a shopping cart.</p>
            <p>Technologies: PHP, HTML, CSS, MySQL</p>
        </div>
        <div class="project">
            <h3>Project 3: Personal Portfolio</h3>
            <p>Description: This very website showcasing my skills.</p>
            <p>Technologies: PHP, HTML, CSS</p>
        </div>
    <?php elseif ($page === 'contact'): ?>
        <h2>Contact Me</h2>
        <?php if ($successMessage): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit" name="submit">Send Message</button>
        </form>
    <?php else: ?>
        <h2>Page Not Found</h2>
        <p>Sorry, the page you are looking for  s not exist.</p>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; 2025 Fikirte. All rights reserved.</p>
</footer>

</body>
</html>