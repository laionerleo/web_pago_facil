<div class="row">
                                            <div class="col-md-12">
                                                <div class="card" style="height: 100%;">
                                                <object data=" <?=  $documentopdf  ?> " type="application/pdf" width="750px" height="750px">
                                                    <embed src="<?=  $documentopdf  ?>" type="application/pdf">
                                                        <p>This browser does not support PDFs. Please download the PDF to view it: <a href="http://yoursite.com/the.pdf">Download PDF</a>.</p>
                                                    </embed>
                                                </object>
                                                </div>
                                            </div>


                                            <input type="hidden" id="url" name="url" value="<?= $url ?>">

                                        </div>
