<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phonebook App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <Myheader></Myheader>
    <div class="container">
        <router-view></router-view>
    </div>
    <Myfooter></Myfooter>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    import Myheader from "../assets/js/components/Myheader";
    import Myfooter from "../assets/js/components/Myfooter";
    import Home from "../assets/js/components/Home";
    import About from "../assets/js/components/About";

    export default {
        components: {Myheader, Myfooter,Home,About}
    }
</script>

</body>
</html>
