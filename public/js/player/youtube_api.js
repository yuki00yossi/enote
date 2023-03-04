/** Youtubeプレイヤー */
let player;
/** Youtubeプレイヤーを表示する要素のID名 */
const playerID = 'player';
/** Youtube APIが読み込み完了かのフラグ */
let isReadyYTapi = false;
/** Youtube Video ID */
const ytVideId = 'zfPDUGWXBck';
// const ytVideId = 'SZvXm7ns3xM';

/** プレイヤーの縦横比 */
const playerRatio = {
    width: 16,
    height: 9
};

let size = calcPlayerSize();


/**
 * innerWidthをもとにYoutubeプレイヤーの縦横サイズを計算して返す
 * 
 * @returns {Obj} widthプロパティとheightプロパティを持ったオブジェクト
 */
function calcPlayerSize() {
    const playerWidth = window.innerWidth - (window.innerWidth * 0.3);
    const playerHeight = (playerWidth / playerRatio.width) * playerRatio.height;

    return { width: playerWidth, height: playerHeight };
}

/**
 * 
 * @param {String} videoId 
 */
function setupYTPlayer(videoId)
{
    player = new YT.Player(playerID, {
        height: size.height,
        width: size.width,
        videoId: videoId,
        events: {
            'onReady': onPlayerReady,
        }
    });
}

/**
 * Youtube Iframe APIの読み込み完了時の処理
 */
function onYouTubeIframeAPIReady() {
    isReadyYTapi = true;
}

/**
 * プレイヤーの準備完了時の処理
 * 動画を再生する
 * 
 * @param {Event} e 
 * 
 * @returns {void}
 */
function onPlayerReady(event) {
    event.target.playVideo();
    size = calcPlayerSize();

    document.getElementById('sidebar').style = "height: " + size.height + "px;";
    document.getElementById('comment_area').style = "height: " + size.height + "px;";
}

/**
 * 動画を開始する
 * 
 * @returns {void}
 */
function startVideo() {
    player.startVideo();
}

/**
 * 動画を再生する
 * @returns {void}
 */
function playVideo() {
    player.playVideo();
}

/**
 * 現在の再生位置を取得する
 * 
 * @returns {Int} 現在の再生位置（秒数）
 */
function currentTime() {
    return player.getCurrentTime();
}

/** 
 * 動画の再生位置を指定された秒数に変更 
 * 
 * @param {Int} seconds 再生位置に指定する秒数
 * @returns {void}
 */
function seek(seconds) {
    player.seekTo(seconds);
}

/**
 * 動画の再生位置を指定した秒数分移動する
 * 
 * @param {Int} seconds 移動する秒数
 * @returns {void}
 */
function slide(seconds) {
    seek(currentTime() + seconds);
}

/**
 * 動画を一時停止する
 * 
 * @returns {void}
 */
function pauseVideo() {
    player.pauseVideo();
}

/**
 * 動画の再生を停止する
 * 
 * @returns {void}
 */
function stopVideo() {
    player.stopVideo();
}

/**
 * youtube APIの読み込みが完了しているか確認する。
 * 読み込み未完了の場合は最大5秒待つ。
 * 読み込み失敗時OR5秒以上経過時はfalseを返す。
 * 
 * @returns {Bool} 読み込み結果
 */
// async function checkOrWaitLoadYTAPI() {
//     let time = 0;
//     const timer = await setInterval(() => {
//         if (isReadyYTapi) {
//             return true;
//         }
//         time += 50;
//         if (time >= 5000) {
//             clearInterval
//         }
//     }, 50)
    
//     return false;
// }


/** 
 * 画面サイズ変更時の処理
 * プレイヤーの縦横サイズを再計算して反映
 * 
 * @returns {void}
 */
window.addEventListener('resize', () => {
    const size = calcPlayerSize();

    const target = document.getElementById('player');
    target.width = size.width;
    target.height = size.height;
    document.getElementById('sidebar').style = "height: " + size.height + "px;";
    document.getElementById('comment_area').style = "height: " + size.height + "px;";
});

// 初期化処理
const tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

document.getElementById('sidebar').style = "height: " + size.height + "px;";
document.getElementById('comment_area').style = "height: " + size.height + "px;";