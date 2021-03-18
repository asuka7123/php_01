<?php
$hands=["グー","チョキ","パー"];
$picts=['janken_gu','janken_choki','janken_pa'];
$results=["あいこ","あなたの負け","あなたの勝ち！"];

if(isset($_POST["hand"])){
  $userHand=(int)$_POST["hand"];
  $pcHand=rand(0,count($hands)-1);
 }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css?v=2">
<title>じゃんけんぽん</title>
</head>

<body>

<p id=title>じゃんけんゲーム</p>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  const CLASSNAME = "-visible";
  const TIMEOUT = 1500;
  const $target = $(".title");

  setInterval(() => {
    $target.addClass(CLASSNAME);
    setTimeout(() => {
    $target.removeClass(CLASSNAME);
    }, TIMEOUT);
  }, TIMEOUT * 2);
</script>

<form method="post">
<?php for($i=0;$i<count($hands);$i++):?>
  <?php $checked=isset($userHand) && $userHand===$i ? "checked":"";?>
  <input type="radio" name="hand" value="<?=$i?>" <?=$checked?>><?=$hands[$i]?><br>
<?php endfor;?>
  <button type="submit" id="jankenpon">じゃんけんぽん！</button>
</form>
<?php if(isset($_POST['hand'])):?>
  <div>
    <img src="img/<?=$picts[$userHand]?>.png">
    <img src="img/<?=$picts[$pcHand]?>.png">
  </div>
  <p><?=$results[($userHand + 3 -$pcHand) % 3]?></p>
<?php endif;?>

</body>
</html>
