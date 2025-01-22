<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="mystyle.css">
</head>

<body>
    <div class="profile-container">
        <h1>Profile</h1>
        <img src="Profile.jpg" alt="Profile Picture" class="Profile-img">
        <?php
        $FirstName = "Atittaya";
        $LastName = "Laksanosurang";
        $IDStudent = "6606021611091";
        $Age = "19";
        $Major = "IT";
        $Faculty = "Faculty of industrial Technology and Management.";

        echo "<p>My name is $FirstName $LastName <br/> 
                    ID Student : $IDStudent Age : $Age years old <br/> 
                    Major : $Major  $Faculty</p>";
        ?>
</body>

</html>