class NoteComment
{
    base_url = 'http://localhost/api/note/';
    constructor(noteId)
    {
        this.base_url = this.base_url + noteId + '/comment';
    }

    async get_comment()
    {
        return false;

    }

    /**
     * コメントを取得する
     * 
     * @returns {Array} 取得したコメント一覧
     */
    async getComments()
    {
        const res = await fetch(this.base_url);
        const result = await res.json();

        return result;
    }
}