<?php $a = rand(0,1);?>
<style>
    div.img {
        background: url(<?php if($a) echo'https://i.gifer.com/Mvd3.gif'; else echo 'https://i.gifer.com/WbNM.gif';?>) no-repeat fixed;
        background-size: cover;
        background-position: center;
        position: absolute;
        width: 100vw;
        height: 100vh;
        filter: blur(5px);
        z-index: -1;
    }
    
    div.f {
        margin: 0 auto;
        text-align: center;
    }
    
    div.f h1 {
        color: #FFF;
        font-size: 8vw;
        text-shadow: 5px 5px black;
    }
    body::-webkit-scrollbar {
        width: 0 !important;
        height: 0 !important;
    }
    div.f h3 {
        color: #FFF;
        font-size: 3vw;
        text-shadow: 3px 3px black;
    }
    
    body {
        width: 100vw;
        height: 100vh;
        display: -webkit-flex;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<head>
    <title><?php echo $config['system']['title'];?></title>
</head>
<body>
    <div class="img"></div>
    <div class="f">
        <h1>Сайт пока недоступен,</h1>
        <h3>но админ уже <?php if($a) echo'бежит'; else echo 'едет';?> к решению проблемы</h3>
    </div>
</body>