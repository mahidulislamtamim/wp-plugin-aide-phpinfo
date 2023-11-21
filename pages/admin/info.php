<style type="text/css">
body {opacity: 0;}
.aidephpinfo-container pre {margin: 0; font-family: monospace;}
.aidephpinfo-container a:link {color: #009; text-decoration: none; background-color: #fff;}
.aidephpinfo-container a:hover {text-decoration: underline;}
.aidephpinfo-container table {border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}
.aidephpinfo-container .center {text-align: center;}
.aidephpinfo-container .center table {margin: 1em auto; text-align: left;}
.aidephpinfo-container .center th {text-align: center !important;}
.aidephpinfo-container td, th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}
.aidephpinfo-container th {position: sticky; top: 0; background: inherit;}
.aidephpinfo-container h1 {font-size: 150%;}
.aidephpinfo-container h2 {font-size: 125%;}
.aidephpinfo-container .p {text-align: left;}
.aidephpinfo-container .e {background-color: #ccf; width: 300px; font-weight: bold;}
.aidephpinfo-container .h {background-color: #99c; font-weight: bold;}
.aidephpinfo-container .v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}
.aidephpinfo-container .v i {color: #999;}
.aidephpinfo-container img {float: right; border: 0;}
.aidephpinfo-container hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}
</style>
<div class="aidephpinfo-container">
    <?php
        phpinfo();
    ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(document).find(".aidephpinfo-container style").remove();
        jQuery(document).find("body").css("opacity", "1");
    })
</script>
