<div class="row">
                                          <!--  <div class="col-md-12">
                                                    <div class="card" style="height: 100%;">
                                                    <object data=" <?=  $documentopdf  ?> " type="application/pdf" style=" width: auto;" height="750px">
                                                        <embed src="<?=  $documentopdf  ?>" type="application/pdf">
                                                            <p>This browser does not support PDFs. Please download the PDF to view it: <a href="http://yoursite.com/the.pdf">Download PDF</a>.</p>
                                                        </embed>
                                                    </object>
                                                    </div>
                                                </div>
-->

                                        <div>
                                        <a class="btn btn-primary" id="downloadLink" href="<?=  $documentopdf  ?>" target="_blank" type="application/octet-stream" download="reportemovimiento.pdf">Descargar</a>    
                                        
                                        
                                        <button class="btn btn-primary" id="prev">Previous</button>
                                        <button class="btn btn-primary" id="next">Next</button>
                                        &nbsp; &nbsp;
                                        <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                                <div class="card" style="height: 100%;">
                                                    <canvas  id="the-canvas" ></canvas>
                                                </div>
                                        </div>


                                            <input type="hidden" id="url" name="url" value="<?= $url ?>">

                                        </div>

                                        <script src=" https://www.jsdelivr.com/package/npm/pdfjs-dist"></script>
                                        <script src="https://cdnjs.com/libraries/pdf.js"></script>
                                        <script src="https://unpkg.com/pdfjs-dist/"></script>
                                        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
                                       




<script>
    // If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url = '<?=  $documentopdf  ?> ';

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';


var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    console.log(viewport);
    canvas.height = viewport.height;
    canvas.width = 500 // viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});
</script>
<script src=" https://www.jsdelivr.com/package/npm/pdfjs-dist"></script>
                                        <script src="https://cdnjs.com/libraries/pdf.js"></script>
                                        <script src="https://unpkg.com/pdfjs-dist/"></script>
                                        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>