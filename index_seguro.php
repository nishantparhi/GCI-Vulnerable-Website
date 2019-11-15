<?php
header("X-XSS-Protection: 0");
?>
<?php
$value = 'password123';
setcookie("XSS", $value);
?>
<html>
<head>
    <title>XSS</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php include('bower_includes.html') ?>
</head>
<body>
<script>
    function formValidation() {


        var form = document.forms["form-a"];
        for (var i = 0; i < form.length; i++) {

            form.elements[i].value = form.elements[i].value.replace("<", '');
            form.elements[i].value = form.elements[i].value.replace(">", '');
            form.elements[i].value = form.elements[i].value.replace("&#60", '');
            form.elements[i].value = form.elements[i].value.replace("&#62", '');
            form.elements[i].value = form.elements[i].value.replace("&gt;", '');
            form.elements[i].value = form.elements[i].value.replace("&lt;", '');
            form.elements[i].value = form.elements[i].value.replace("(", '');
            form.elements[i].value = form.elements[i].value.replace("&#40;", '');
            form.elements[i].value = form.elements[i].value.replace("iframe", '');
            form.elements[i].value = form.elements[i].value.replace("javascript:", '');
            form.elements[i].value = form.elements[i].value.replace("vbscript:", '');
            form.elements[i].value = form.elements[i].value.replace("onload=", '');
            form.elements[i].value = form.elements[i].value.replace("onload =", '');
            form.elements[i].value = form.elements[i].value.replace("script", '');
            form.elements[i].value = form.elements[i].value.replace("eval (", '');
            form.elements[i].value = form.elements[i].value.replace("eval(", '');
        }
        return true;
    }
    ;
    function xssValidation(values) {
        if (!('contains' in String.prototype)) {
            String.prototype.contains = function (str, startIndex) {
                return ''.indexOf.call(this, str, startIndex) !== -1;
            };
        }
        if (values.contains("<") || values.contains(">") || values.contains("&#60")
            || values.contains("&#62") || values.contains("&gt;") || values.contains("&lt;")
            || values.contains("(")
            || values.contains("&#40;") || values.contains("iframe")
            || values.contains("javascript:") || values.contains("vbscript:")
            || values.contains("onload=") || values.contains("onload =") || values.contains("script")
            || values.contains("eval (") || values.contains("eval(")) {
            return true;
        }
        else {
            return false;
        }
    }
    var element = document.createElement('p');
    element.innerHTML=document.cookie.toString();
    document.getElementById('content').appendChild(element);

</script>
<div class="row">
    <div class="jumbotron text-center">
        <h1>Seguridad informatica</h1>
        <h2>Ejemplo de XSS(seguro)</h2>
    </div>
</div>
<form method="get" action="xss.php" id="form-a" onsubmit="return formValidation();">
    <div class="row text-center">
        <div class="col-md-12">
            <input type="text" name="vulnerabilidad">
            <input type="submit" value="Enviar">
        </div>

    </div>
</form>
</body>
</html>