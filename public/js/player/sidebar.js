let pageItems = document.getElementsByClassName('page-area');

/**
 * ページをクリックしたときの処理
 * 以下処理を行う
 * 
 * 1. 動画を再読み込み
 * 2. タイトルを再設定
 * 
 * @param {Event} e 
 */
async function clickPage(e)
{
    e.currentTarget.classList.add('selected');
    resetPlayer();
    setTitle(e);
    const videoId = e.currentTarget.dataset.videoId;
    setupYTPlayer(videoId);
    
    for (let i = 0; i < pageItems.length; i++) {
        if (pageItems[i].classList.contains('selected')) {
            pageItems[i].classList.remove('selected');
        }
    }

    const page = new PageComment(e.currentTarget.dataset.pageId);
    const comments = await page.getComments();
    resetTimeLabel();
    addTimeLabel(comments);
}

/**
 * タイムラベルをリセットする
 * @returns false
 */
function resetTimeLabel()
{
    document.getElementById('comment_area').innerHTML = '';
    return false;
}

/**
 * タイムラベル一覧を格納した配列
 * @param {Array} timeLabels 
 */
function addTimeLabel(timeLabels)
{
    if (timeLabels.length == 0) {
        return false;
    }

    for (let i = 0; i < timeLabels.length; i++) {
        const section = document.createElement('section');
        section.classList.add('comment');

        const comment_title = document.createElement('div');  
        comment_title.classList.add('comment-title');
        comment_title.innerText = timeLabels[i].title;
        comment_title.dataset.commentNo = timeLabels[i].id;
        comment_title.addEventListener('click', toggleVisibleComment);
        section.appendChild(comment_title);

        const comment_time = document.createElement('div');
        const small_tag = document.createElement('small');
        small_tag.innerText = '再生時間:';
        comment_time.appendChild(small_tag);
        section.appendChild(comment_time);

        const time_link = document.createElement('a');
        time_link.classList.add('seekTimeLink');
        time_link.href = '#';
        time_link.dataset.time = timeLabels[i].play_time;
        time_link.innerText = secoundToTime(timeLabels[i].play_time);
        time_link.addEventListener('click', seekBtn);
        small_tag.appendChild(time_link);

        const comment_body = document.createElement('div');
        comment_body.id = 'comment' + timeLabels[i].id;
        comment_body.classList.add('comment-body');

        const body_small_tag = document.createElement('small');
        body_small_tag.innerText = timeLabels[i].comment;
        comment_body.appendChild(body_small_tag);
        section.appendChild(comment_body);

        document.getElementById('comment_area').appendChild(section);
    }
}

/**
 * 秒を〇〇：〇〇という分：秒表示に変換する
 * 
 * @param {Int} secounds 
 * @returns {String}
 */
function secoundToTime(seconds)
{
    if (seconds < 60) {
        let second = ('00' + seconds).slice(-2);
        return '00:' + second;
    }
    
    // 分を取得
    let minuets = Math.floor(parseInt(seconds) / 60);
    minuets = ('00' + minuets).slice(-2);

    let second = seconds % 60;
    second = ('00' + second).slice(-2);
    return minuets + ':' + second;
}

/**
 * youtube playerをリセットする
 */
function resetPlayer()
{
    if (player) {
        stopVideo();
        player = null;
        const target = document.getElementById('player');
        target.remove();
        const div = document.createElement('div');
        div.id = 'player';

        document.getElementsByClassName('contents')[0].insertBefore(div, document.getElementById('comment_area'));
    }
}

/** ノートのタイトルを再設定する */
function setTitle(e)
{
    const title = e.currentTarget.dataset.pageTitle;
    document.getElementById('pageTitle').innerText = title;
}

for (let i = 0; i < pageItems.length; i++) {
    pageItems[i].addEventListener('click', clickPage);
}