{setTitle title="Preview Notes"}
{jQueryReady}

{/jQueryReady}
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<style>
#the-canvas {
  border: 1px solid black;
  direction: ltr;
}
</style>
<h1 class="text-center">{$pdfdesc}</h1>
<input type="button" value="Return to Previous Page" onclick="history.go(-1)" style="margin-left: 50px;">
<pre>
{*{$SITE_URL}?page=patient&action=notes&schedule={$schID}*}
</pre>

<div>
  <button id="prev">Previous</button>
  <button id="next">Next</button>
  &nbsp; &nbsp;
  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
</div>

<canvas id="the-canvas" width="920px"></canvas>

<script type="text/javascript">
// If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url = '{$SITE_URL}/?page=patient&action=downloadNotesFile&schedule={$schedule->pubid}&idx={$idx}';
{literal}
// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 10,
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
    //var viewport = page.getViewport({scale: scale});

var desiredWidth = 920;
var viewport = page.getViewport({ scale: 1, });
var scale = desiredWidth / viewport.width;
var scaledViewport = page.getViewport({ scale: scale, });
    canvas.height = scaledViewport.height;
    canvas.width = scaledViewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: scaledViewport
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
{/literal}