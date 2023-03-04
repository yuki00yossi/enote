class Note extends API
{
    /**
     * 
     * @param {String} title 
     * @param {String} videoId 
     * @param {String} serviceType 
     */
    constructor(id='', title='', videoId='', serviceType='youtube')
    {
        this.title = title;
        this.videoId = videoId;
        this.serviceType = serviceType;

    }

    /**
     * ノートIDでノートを検索して取得する
     * @param {Int} id 
     */
    static async getById(id)
    {
        // const url = '';
        // fetch()

    }

    
}