<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
    <!--PDF-->
<link rel="stylesheet" href="./include/pdf/pdf.viewer.css">
<script src="./include/pdf/pdf.js"></script>
<!--Docs-->
<script src="./include/docx/jszip-utils.js"></script>
<script src="./include/docx/mammoth.browser.min.js"></script>
<!--PPTX-->
<link rel="stylesheet" href="./include/PPTXjs/css/pptxjs.css">
<link rel="stylesheet" href="./include/PPTXjs/css/nv.d3.min.css">
<!-- optional if you want to use revealjs (v1.11.0) -->
<link rel="stylesheet" href="./revealjs/reveal.css">
<script type="text/javascript" src="./include/PPTXjs/js/filereader.js"></script>
<script type="text/javascript" src="./include/PPTXjs/js/d3.min.js"></script>
<script type="text/javascript" src="./include/PPTXjs/js/nv.d3.min.js"></script>
<script type="text/javascript" src="./include/PPTXjs/js/pptxjs.js"></script>
<script type="text/javascript" src="./include/PPTXjs/js/divs2slides.js"></script>

<!--All Spreadsheet -->
<link rel="stylesheet" href="./include/SheetJS/handsontable.full.min.css">
<script type="text/javascript" src="./include/SheetJS/handsontable.full.min.js"></script>
<script type="text/javascript" src="./include/SheetJS/xlsx.full.min.js"></script>
<!--Image viewer-->
<link rel="stylesheet" href="./include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css">
<script type="text/javascript" src="./include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
<!--officeToHtml-->
<script src="./include/officeToHtml.js"></script>
<link rel="stylesheet" href="./include/officeToHtml.css">
</head>

<body>
<h2>{{$data->title}}</h2>
<h2>{{$data->description}}</h2>
<p>
    <iframe src="{{url($data->file)}}" style="width:600px; height:500px"></iframe>

    <iframe src="https://docs.google.com/gview?url=http://remote.url.tld/{{url($data->file)}}/to/document.doc&embedded=true"></iframe>

    <div id="resolte-contaniner">

        <h1>View DocX,Pdf,PPTX</h1>
    </div>

    <script>
        var file_path = "path/to/file.pptx";
        $("#resolte-contaniner").officeToHtml({
            url: file_path
        });
    </script>


    <input type="file" id="select_file" />

    <script src="officetohtml/officeToHtml.js"></script>

    <script>

    var viewer=$("#resolte-contaniner").officeToHtml({
    url: file_path,
    inputObjId: "select_file",
    pdfSetting: {
        // setting for pdf
    },
    docxSetting: {
        // setting for docx
    },
    pptxSetting: {
        $("#resolte-contaniner").officeToHtml({
    url: file_path,
    inputObjId: "select_file",
    pptxSetting: {
        slidesScale: "50%", //Change Slides scale by percent
        slideMode: true, /** true,false*/
        slideType: "divs2slidesjs", /*'divs2slidesjs' (default) , 'revealjs'(https://revealjs.com) */
        revealjsPath: "", /*path to js file of revealjs. default:  './revealjs/reveal.js'*/
        keyBoardShortCut: true,  /** true,false ,condition: slideMode: true*/
        mediaProcess: true, /** true,false: if true then process video and audio files */
        jsZipV2: false,
        slideModeConfig: {
            first: 1,
            nav: true, /** true,false : show or not nav buttons*/
            navTxtColor: "black", /** color */
            keyBoardShortCut: false, /** true,false ,condition: */
            showSlideNum: true, /** true,false */
            showTotalSlideNum: true, /** true,false */
            autoSlide:1, /** false or seconds , F8 to active ,keyBoardShortCut: true */
            randomAutoSlide: false, /** true,false ,autoSlide:true */
            loop: true,  /** true,false */
            background: false, /** false or color*/
            transition: "default", /** transition type: "slid","fade","default","random" , to show transition efects :transitionTime > 0.5 */
            transitionTime: 1 /** transition time between slides in seconds */
        },
        revealjsConfig: {} /*revealjs options. see https://revealjs.com */
    }
});
    },
    sheetSetting: {
        // setting for excel
    },
    imageSetting: {
        // setting for  images
    }
});


    </script>

    <script>

    </script>

</p>
</body>
</html>
