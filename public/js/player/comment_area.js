const commentTitle = document.getElementsByClassName('comment-title');
for (let i = 0; i < commentTitle.length; i++) {
    commentTitle[i].addEventListener('click', toggleVisibleComment);
}

const seekTimeLinks = document.getElementsByClassName('seekTimeLink');
for (let i = 0; i < seekTimeLinks.length; i++) {
    seekTimeLinks[i].addEventListener('click', seekBtn);
}

/**
 * コメント本文の表示・非表示を切り替える
 * @param {Event} e 
 */
function toggleVisibleComment(e) {
    const targetNo = e.currentTarget.dataset.commentNo;
    const targetElm = document.getElementById('comment' + targetNo);
    if (targetElm.classList.contains('show')) {
        targetElm.classList.remove('show');
    } else {
        targetElm.classList.add('show');
    }
}

/**
 * ボタンクリック時の処理。
 * 動画の再生位置を指定の位置に移動させる
 * @param {Event} e 
 */
function seekBtn(e)
{
    e.preventDefault();
    seek(parseInt(e.currentTarget.dataset.time));
}
