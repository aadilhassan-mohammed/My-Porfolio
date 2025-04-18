<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="style.css">
    <script src="transitions.js" defer></script>
    <style>
        .expand-button {
            background-color: #0c260b;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .expand-button:hover {
            background-color: #154128;
        }
        .project-details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="heading">Projects</h1>
            <nav>
                <ul class="nav-list">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="project.php">Projects</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="project">
        <div class="container">
            <?php include 'fetch_projects.php'; ?>
            <?php foreach ($projects as $project): ?>
                <div class="project">
                    <h3 class="project-title"><?php echo $project['title']; ?></h3>
                    <button class="expand-button">Expand</button>
                    <div class="project-details">
                        <p><?php echo $project['description']; ?></p>
                        <form method="POST" action="manage_projects.php">
                            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                            <button type="submit" name="delete_project">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Add New Project</h2>
        <form method="POST" action="manage_projects.php">
            <input type="text" name="title" placeholder="Project Title" required>
            <textarea name="description" placeholder="Project Description" required></textarea>
            <button type="submit" name="add_project">Add Project</button>
        </form>
    </section>

    <footer>
        <p>Email: <a href="mailto:aadilh26519@gmail.com">aadilh26519@gmail.com</a> | © 2023 Aadil Hassan. All rights reserved.</p>
    </footer>
    <script>
        const buttons = document.querySelectorAll('.expand-button');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const details = button.nextElementSibling;
                if (details.style.display === "none" || details.style.display === "") {
                    details.style.display = "block";
                    button.textContent = "Collapse";
                } else {
                    details.style.display = "none";
                    button.textContent = "Expand";
                }
            });
        });
    </script>
</body>
</html>
