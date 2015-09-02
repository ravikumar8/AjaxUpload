[![Build Status](https://travis-ci.org/ravikumar8/AjaxUpload.svg?branch=master)](https://travis-ci.org/ravikumar8/AjaxUpload) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ravikumar8/AjaxUpload/build-status/master) [![Dependency Status](https://www.versioneye.com/user/projects/55e76aae211c6b001f0006a7/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55e76aae211c6b001f0006a7)
AjaxUpload
==========
This class can process image files uploaded via AJAX.

It takes a form submission request to upload a file via AJAX and returns messages to the browser to communicate the result of the file processing.

The class returns error messages in case no file was uploaded, or the file name extension is not in the list of accepted extensions, or the file size was exceeded the allowed limit, or the file already exists in the destination directory.

If the file upload is valid, the class moves it to the destination directory and returns a HTML message to display the uploaded image file in the browser.
