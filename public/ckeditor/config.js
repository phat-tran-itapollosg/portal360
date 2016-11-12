/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	var base = $("base").attr('href');
	// Define changes to default configuration here. For example:
	 config.language = 'vi';
	// config.uiColor = '#AADC6E';
	// config.disableNativeSpellChecker = false;

	// config.filebrowserBrowseUrl = '../ckfinder/ckfinder.html';
	// config.filebrowserImageBrowseUrl = '../ckfinder/ckfinder.html?type=Images';
	// config.filebrowserFlashBrowseUrl = '../ckfinder/ckfinder.html?type=Flash';
	// config.filebrowserUploadUrl = '../ckfinder/core/connector/java/connector.java?command=QuickUpload&type=Files';
	// config.filebrowserImageUploadUrl = '../ckfinder/core/connector/java/connector.java?command=QuickUpload&type=Images';
	// config.filebrowserFlashUploadUrl = '../ckfinder/core/connector/java/connector.java?command=QuickUpload&type=Flash';
	

	// config.filebrowserBrowseUrl= 'http://localhost/test_ckfinder/';
	// config.filebrowserBrowseUrl = 'http://localhost/apolloportal/public/templateEditor/kcfinder/browse.php?opener=ckeditor&type=files';
    // config.filebrowserImageBrowseUrl = 'http://localhost/apolloportal/public/templateEditor/kcfinder/browse.php?opener=ckeditor&type=images';
    // config.filebrowserFlashBrowseUrl = 'http://localhost/apolloportal/public/templateEditor/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = base+'/public/kcfinder/upload.php?opener=ckeditor&type=files';
    // config.filebrowserImageUploadUrl = 'http://localhost/apolloportal/public/templateEditor/kcfinder/upload.php?opener=ckeditor&type=images';
    // config.filebrowserFlashUploadUrl = 'http://localhost/apolloportal/public/templateEditor/kcfinder/upload.php?opener=ckeditor&type=flash';


	// config.filebrowserBrowseUrl= 'http://localhost/test_kcfinder/';
	
};
