
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>Login - Adminer</title>
<link rel="stylesheet" type="text/css" href="http://dev.kdsante.com/adminer-4.7.5.php?file=default.css&version=4.7.5">
<script src='adminer-4.7.5.php?file=functions.js&amp;version=4.7.5' nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI="></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer-4.7.5.php?file=favicon.ico&amp;version=4.7.5">
<link rel="apple-touch-icon" href="adminer-4.7.5.php?file=favicon.ico&amp;version=4.7.5">

<body class="ltr nojs">
<script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick, onload: partial(verifyVersion, '4.7.5', 'adminer-4.7.5.php?', '13088:108420')});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
var thousandsSeparator = ',';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<h2>Login</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<form action='' method='post'>
<div></div>
<table cellspacing='0' class='layout'>
<tr><th>System<td><select name='auth[driver]'><option value="server" selected>MySQL<option value="sqlite">SQLite 3<option value="sqlite2">SQLite 2<option value="pgsql">PostgreSQL<option value="oracle">Oracle (beta)<option value="mssql">MS SQL (beta)<option value="firebird">Firebird (alpha)<option value="simpledb">SimpleDB<option value="mongo">MongoDB<option value="elastic">Elasticsearch (beta)<option value="clickhouse">ClickHouse (alpha)</select><script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">qsl('select').onchange = function () { loginDriver(this); };</script>
<tr><th>Server<td><input name="auth[server]" value="" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>Username<td><input name="auth[username]" id="username" value="" autocomplete="username" autocapitalize="off"><script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();</script>
<tr><th>Password<td><input type="password" name="auth[password]" autocomplete="current-password">
<tr><th>Database<td><input name="auth[db]" value="" autocapitalize="off">
</table>
<p><input type='submit' value='Login'>
<label><input type='checkbox' name='auth[permanent]' value='1'>Permanent login</label>
</form>
</div>

<form action='' method='post'>
<div id='lang'>Language: <select name='lang'><option value="en" selected>English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs">Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="he">עברית<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ka">ქართული<option value="ko">한국어<option value="lt">Lietuvių<option value="ms">Bahasa Melayu<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="sv">Svenska<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select><script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">qsl('select').onchange = function () { this.form.submit(); };</script> <input type='submit' value='Use' class='hidden'>
<input type='hidden' name='token' value='134231:235763'>
</div>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.7.5</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version"></a>
</h1>
</div>
<script nonce="YzA4NTljMGFhYTllM2VmNmIyMmY1Mzc2YmY1ZjBlZTI=">setupSubmitHighlight(document);</script>
