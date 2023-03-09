{{-- <link rel="stylesheet" href="/css/note/add_page_modal.css"> --}}
<div id="addPageModal" class="micromodal-slide" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="addPageModalTitle">
            <header class="modal__header">
                <h2 id="addPageModalTitle">Add Page</h2>
            </header>
            <div id="addPageModalContent" class="modal__content">
                <form action="{{ route('note.addPage', $note->id) }}" method="POST">
                    @csrf
                    <div class="form-input">
                        <label id="inputPageTitle">Page Title</label>
                        <input type="text" id="inputPageTitle" name="title">
                    </div>
                    <div class="form-input">
                        <label id="inputPageVideoId">Video ID</label>
                        <input type="text" id="inputPageVideoId">
                    </div>
                    <div class="form-input">
                        <label id="inputPageContent">Content</label>
                        <textarea name="content" id="inputPageContent" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <footer class="modal__footer" aria-label="Close modal" data-micromodal-close>
                <button type="button" class="btn btn-submit-main">Cancel</button>
                <button type="submit" class="btn btn-accent" style="display: inline-block; float: right;">Add</button>
            </footer>
        </div>
    </div>
</div>