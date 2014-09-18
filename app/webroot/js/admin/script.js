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
    
    //AJAX change status
    $("a.ajax-change-status").on("click", function(){
        var $this       = $(this),
            id          = $this.data("id"),
            status      = $this.data("status"),
            url         = $this.closest("table").data("change");
        var confirmMsg  = {
            0   : 'unlock',
            1   : 'lock',
            ""  : 'unlock'
        }
        var changeStatus = {
            0: 1,
            1: 0,
            "": 1
        };
        var statusText = {
            0: '[ Activated ]',
            1: '[ Inactivated ]',
            "": '[ Activated ]',
        };
        
        if(confirm('Are you sure you want to ' + confirmMsg[status] + ' this item?')){
            $.ajax({
                url: siteConfigs.SITE_DIR + url,
                type: 'POST',
                data: {id: id, status: changeStatus[status]},
                success: function(eSucc){
                    if(eSucc === "OK"){
                        alert(confirmMsg[status] + ' item successful');
                        $this.data("status", changeStatus[status]);
                        $this.text(statusText[status]);
                    }else{
                        alert(eSucc);
                    }
                },
                error: function(xHR, aO, eErr){
                    alert('Error occurred while update ' + confirmMsg[status] + ' this item. Please try again.\n\nError: ' + eErr);
                }
            });
        }
        
        return false;
    });
    
    //AJAX delete item
    $("a.ajax-delete-item").on("click", function(){
        var $this           = $(this),
            id              = $(this).data("id"),
            url             = $this.closest("table").data("delete");
            
        if(confirm("Are you sure you want to delete this item?\nNotice: This action can't be undone.")){
            $.ajax({
                url: siteConfigs.SITE_DIR + url,
                type: 'post',
                data: {id: id},
                success: function(eSucc){
                    if(eSucc === "OK"){
                        alert("Delete item successful.");
                        $this.closest("tr").fadeOut(500, function(){
                            $(this).remove();
                        });
                    }else{
                        alert(eSucc);
                    }
                },
                error: function(xHR, aO, eErr){
                    alert(eErr);
                }
            });
        }
        
        return false;
    });
});

