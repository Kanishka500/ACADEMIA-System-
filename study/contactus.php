<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Contact Us Page</title>
    <style>
        .navbar {
            background-color: #8a4818;
            overflow: visible;
            position: absolute;
            /* Fix the position to the top */
            width: 100%;
            /* Take up the full width of the viewport */
            top: 0;
            /* Align to the top */
        }

        .navbar a {
            display: inline-block;
            /* Display the links in a line */
            color: #f2f2f2;
            text-align: center;
            padding: 30px 80px;
            text-decoration: none;
            font-size: 17px;
        }


        .navbar a:hover::content {
            background-color: #ddd;
            color: black;
        }

        /* CSS styles for the login form */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('newbackground.png');
            /* Replace with the actual path to your image */
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .title{
            position: absolute;
            top: 25%;
            left: 10%;
            transform: translate(-50%, -50%);
        }
        .title h3{
            color: Brown;
            font-size: 30px;
        }
	

		.Left1{
			display: block;
			margin-left:auto;
			margin-right: auto;
			width:2%;
		}
		.p2{
			display: block;
			margin-left:auto;
			margin-right: auto;
			width:2%;
		}
		.p3{
			display: block;
			margin-left:auto;
			margin-right: auto;
			width:2%;
		}

	
    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.php"><i class="bi bi-house-fill"></i> Home</a>
        <a href="profile.php"><i class="bi bi-person-fill"></i> profile</a>
        <a class="right" href="#"><i class="bi bi-telephone-fill"></i> Contact Us</a>
    </div>

    <div class="title">
        <h3>Contact Us</h3>
    </div>

    
        <img src="telephone.jpg" alt=" " class="Left1"> <p>+94716071858</p>
		<img src="Email.jpg" alt=" " class="p2"> <p>pubuduniayodhya@gamil.com</p>
		<img src="linkedin.jpg" alt=" " class="p3"> <p>www.linkedin.com/in/pubuduni-ayodhya</p>

	


</body>

</html>