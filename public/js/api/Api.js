/**
 * enoteサーバーとやり取りする為のベースクラス
 */
class API
{
    constructor()
    {
        /** @prop csrf_token CSRFトークン */
        this.csrf_token = document.cookie.split('; ')
            .find(row => row.startsWith('XSRF-TOKEN')).split('=')[1];
        /** @prop base_url base_url */
        this.base_url = 'localhost/api/';
        /** @prop headers APIを使用する際に付与するHTTPヘッダー */
        this.headers = {
            Accept: "application/json",
            "Content-Type": "application/json;charset=utf-8"
        };
    }

    /**
     * GETリクエストを送信する
     * @param {String} url エンドポイント
     * @returns API結果の連想配列
     *     http_status_codeプロパティにレスポンスコードを格納
     */
    async get(url)
    {
        const response = await fetch(url, {
            headers: this.headers
        });

        const result = await response.json();
        result.http_status_code = response.status;

        return result;
    }

    async post(url)
    {
        const post_headers = this.headers;
        post_headers['X-XSRF-TOKEN'] = this.csrf_token;

        const resnponse = await fetch(url, {
            headers: this.post_headers,
        });

        const result = await resnponse.json();
        result.http_status_code = resnponse.status;

        return result;
    }
}