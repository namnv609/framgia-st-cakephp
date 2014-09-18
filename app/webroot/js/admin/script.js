CKFinder.setupCKEditor(null, siteConfigs.SITE_DIR + 'js/admin/ckfinder/');
$(window).ready(function(){
    $("#btnSelectImage").on("click", function(){
        var $this           = $(this),
            iWidth          = $this.data("width"),
            iHeight         = $this.data("height"),
            $inputElm       = $this.data("input"),
            $previewElm     = $this.data("preview");
            
        browseServer(setPreviewImage, iWidth, iHeight, $inputElm, $previewElm);
    });
    
    function setPreviewImage(fileUrl, iW, iH, inpElm, prvElm){
        $(prvElm).attr("src", siteConfigs.SITE_DIR + 'timthumb.php?src=' + fileUrl + '&amp;w=' + iW + '&amp;h=' + iH);
        $(inpElm).val(fileUrl);
    }
    
    function browseServer(callback, iW, iH, inpElm, prvElm){
        var finder          = new CKFinder();
        
        finder.basePath     = siteConfigs.SITE_DIR + 'js/admin/ckfinder';
        finder.selectActionFunction = function(fileUrl){
            setPreviewImage(fileUrl, iW, iH, inpElm, prvElm);
        };
        finder.popup();
    }
});

