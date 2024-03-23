<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>AboutUs Page</title>
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

        .title1{
            position: absolute;
            top: 30%;
            left: 10%;
            transform: translate(-50%, -50%);
        }
        .title1 h3{
            color: Brown;
            font-size: 30px;
        }
		
        .subtitle1{
            position: absolute;
            top: 50%;
            left: 40%;
            transform: translate(-50%, -50%);
            color: black;
            font-size: 15px;
			text-align:justify;
        }

		.title2{
            position: absolute;
            top: 120%;
            left: 1%;
            transform: translate(-50%, -50%);
        }
        .title2 h3{
            color: Brown;
            font-size: 25px;
        }
		
        .subtitle2{
            position: absolute;
            top: 180%;
            left: 34%;
            transform: translate(-50%, -50%);
            color: black;
            font-size: 15px;
			font-style: Calibri;
        }
		
		.title3{
            position: absolute;
            top: 250%;
            left: 1%;
            transform: translate(-50%, -50%);
        }
        .title3 h3{
            color: Brown;
            font-size: 25px;
        }
		
        .subtitle3{
            position: absolute;
            top: 350%;
            left: 34%;
            transform: translate(-50%, -50%);
            color: black;
            font-size: 15px;
			font-style: Calibri;
        }
		

    </style>
</head>

<body>
    <div class="navbar">
        <a href="#"><i class="bi bi-house-fill"></i> Home</a>
        <a href="#"><i class="bi bi-person-fill"></i> profile</a>
        <a class="right" href="#"><i class="bi bi-telephone-fill"></i> Contact Us</a>
    </div>

    <div class="title1">
        <h3>About Us</h3>
    </div>

    <div class="subtitle1">
        <p><i><b>Introducing an innovative web application aimed at transforming the academic landscape, our project is centred around creating a dynamic platform for students to seamlessly share notes, assignments, and lecture materials. The primary goal is to foster collaborative learning by providing students with a centralized hub where they can access and download educational resources effortlessly, saving valuable time and enabling learning on the go. 
In addition to facilitating resource sharing, our platform will feature an interactive space for students to engage with subject matter experts. Following expert registration, users can establish personalized profiles, showcasing their academic prowess and expertise. This unique feature empowers students to make informed decisions when selecting study materials, allowing them to tailor their choices based on expert profiles, academic results, or grades. By combining accessibility with a personalized approach to expertise, our web application seeks to revolutionize how students engage with and leverage educational content for a more enriched learning experience.
</b></i></p>

	<div class="title2">
			<h3>Background</h3>
		</div>

		<div class="subtitle2">
			<p><i><b>In the dynamic landscape of education, fostering effective collaboration and resource sharing among students is paramount. Recognizing the need for a centralized platform to streamline the exchange of notes, assignments, and lecture materials, we have embarked on the journey to create a web application tailored to meet the unique requirements of students and educators alike. 
Our vision is to establish a user-friendly platform that addresses the challenges students face in accessing and sharing relevant lecture materials. This platform will serve as a hub where students can collaborate, share valuable insights, and seek guidance from experts, thereby fostering a more enriched learning experience.
</b></i></p>
		</div>
		
	<div class="title3">
			<h3>Our Services</h3>
		</div>

		<div class="subtitle3">
			<ul>
				<li><i><b>Improve the overall user experience by implementing an intuitive and visually appealing interface, ensuring easy navigation and accessibility for all users.</b></i></li>
				<li><i><b>Streamline the process of accessing and sharing educational resources, reducing the time spent on searching for materials and facilitating quick downloads.</b></i></li>
				<li><i><b>Minimize the need for physical study materials by providing a centralized platform for sharing, thus reducing printing costs and promoting environmental sustainability.</b></i></li>
				<li><i><b>Facilitate effective collaboration among students by creating a space for sharing insights, engaging with experts, and receiving timely notifications on relevant updates.</b></i></li>
				<li><i><b>Foster a sense of community by connecting students and experts, encouraging meaningful discussions, and providing a platform for experts to share their knowledge.</b></i></li>
				<li><i><b>Improve content organization through subject categorization and intelligent search functionalities, enabling users to swiftly locate specific materials and optimize their study processes.</b></i></li>
		</div>

</body>

</html>