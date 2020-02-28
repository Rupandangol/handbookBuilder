<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .page_break {
        page-break-before: always;
    }
    @font-face {
        src: url("vendor/dompdf/dompdf/lib/fonts/PREETI.ttf") format('truetype');
        font-family: "Preeti";
    }
    body{
        font-family: 'Preeti', sans-serif;
    }

</style>

<body>

@foreach($data as $value)
    @if($value->getContent)
        <?php
        echo
        htmlspecialchars_decode(str_replace('src="/kcfinder/upload','src="'.url('kcfinder/upload'),
            $value->getContent->myProjectContent
        ))
        ?>
        <div class="page_break"></div>
    @endif


@endforeach
<script type="text/php">
if ( isset($pdf) ) {
    $pdf->page_script('
        if ($PAGE_COUNT > 1) {
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 12;
            $pageText =  $PAGE_NUM-1;
            $y = 800;
            $x = 300;
            if($pageText!=0){
            $pdf->text($x, $y, $pageText, $font, $size);
            }
        }
    ');
}

</script>
</body>
</html>
