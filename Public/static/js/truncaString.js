(function ($) {
    $.fn.truncaString = function (options) {
        var defaults = {
            length: 60,
            isHide: false,    //初始时是否收缩
            hideClue: false,  //是否显示收缩提示符 “...”
            moreText: '[Expansion]',  //展开按纽文本
            hideText: '[Shrink]',   //收缩按纽文本
            moreTitle: '',  //展开按纽标题（鼠标移上时提示文字）
            hideTitle: '',   //收缩按纽标题（鼠标移上时提示文字）
            boundary: /^\s+$/     //匹配分割符的正则表达式，匹配空格，因为英文单词不能从中间断开 /^(\s|\u002c|\u002e|\uff0c|\u3002|[\u4E00-\u9FA5])+$/
        };
        var options = $.extend(defaults, options);
        return this.each(function (num) {
            var stringLength = $(this).html().length;
            if (stringLength > defaults.length) {
                var whiteSpace = new RegExp(defaults.boundary);
                var moreHtml = '<a class="more_' + num + ' showhide" href="#" title="' + defaults.moreTitle + '">' + defaults.moreText + '</a> ';//“展开”按纽
                var hideHtml = '<a class="hide_' + num + ' showhide" href="#" title="' + defaults.hideTitle + '">' + defaults.hideText + '</a>';//“收缩”按纽

                //循环把分割点向后移动，直到找到空格
                for (var newLimit = defaults.length; newLimit < stringLength; newLimit++) {
                    var newSplitText = $(this).html().substr(0, newLimit);     //分割点前的字符（一直要显示的）
                    var newHiddenText = $(this).html().substr(newLimit);       //分割点后的字符（要隐藏的）
                    var newSplitPoint = newSplitText.slice(-1);              //拷贝分割点前的字符
                    if (whiteSpace.test(newSplitPoint)) {             //结尾是否匹配分割字符
                        var clue = defaults.hideClue ? '<span class="hideClue_' + num + '">...</span>' : '<span class="hideClue_' + num + '"></span>';
                        var hiddenText = '<span class="hiddenText_' + num + '">' + newHiddenText + '</span>';    //要隐藏的部分
                        var displayText = $(this).html().substr(0, newLimit - 1);     //要显示的部分
                        $(this).html(displayText).append(clue + hiddenText + moreHtml + hideHtml);

                        $('a.more_' + num).bind('click', function () { //展开
                            $('span.hiddenText_' + num).show();
                            $('span.hideClue_' + num).hide();
                            $('a.more_' + num).hide();
                            $('a.hide_' + num).show();
                            return false;
                        });
                        $('a.hide_' + num).bind('click', function () { //隐藏
                            $('span.hiddenText_' + num).hide();
                            $('span.hideClue_' + num).show();
                            $('a.more_' + num).show();
                            $('a.hide_' + num).hide();
                            return false;
                        });

                        if (defaults.isHide) {
                            $('a.hide_' + num).click();
                        } else {
                            $('a.more_' + num).click();
                        }

                        newLimit = stringLength;
                    }
                }
            }
        })
    }
})(jQuery);

