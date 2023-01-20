<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
* {
    padding: 0px;
    margin: 0px;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}

body {
    background-image: url(images/bg-01.jpg);
    background-size: cover;
    background-attachment: fixed;
}

nav {
    background: black;
    height: 80px;
}

label.logo {
    color: white;
    font-size: 35px;
    line-height: 80px;
    padding: 0 100px;
    font-weight: bold;
}

nav ul {
    float: right;
    margin-right: 60px;
}

nav ul li {
    display: inline-block;
    line-height: 80px;
    margin: 0 20px;
}

nav ul li a {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
}

a.active,
a:hover {
    background: #999999;
    border-radius: 3px;
    padding: 7px 13px;
    transition: .5s;


}

div.image {
    padding-top: 100px;
    width: 50%;
    height: 50%;
    text-align: center;
    margin: auto;
}
</style>

<body>
    <nav>
        <label class="logo">VOTE</label>
        <ul>
            <li><a class="active" href="projet_avoter.php">Objet A Voter</a></li>
            <li><a href="#">statistic</a></li>
            <li><a href="#">Deconnection </a></li>

        </ul>
    </nav>
    <div class="image">
        <img src="images/Vote.png" alt="">
    </div>
</body>

</html>