{{-- <link rel="stylesheet" href="/css/note/add_page_modal.css"> --}}
<div id="addPageModal" class="micromodal-slide" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="addPageModalTitle">
            <header class="modal__header">
                <h2 id="addPageModalTitle">Add Page</h2>
            </header>
            <div id="addPageModalContent" class="modal__content">
                <form id="addPageForm" action="{{ route('note.createPage', $note->id) }}" method="POST">
                    @csrf
                    <div class="form-input">
                        <label id="inputPageTitle">Page Title</label>
                        <input type="text" id="inputPageTitle" name="title">
                    </div>
                    <div class="form-input">
                        <label for="inputPageServiceType">type</label>
                        <select id="inputPageServiceType" name="serviceType">
                            @foreach($service_types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="inputPageVideoId">Video ID</label>
                        <input type="text" id="inputPageVideoId" name="videoId">
                    </div>
                    <div class="form-input">
                        <label id="inputPageContent">Content</label>
                        <textarea name="content" id="inputPageContent" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <footer class="modal__footer" aria-label="Close modal" data-micromodal-close>
                <button type="button" class="btn btn-submit-main">Cancel</button>
                <button id="addPageSubmit" type="button" class="btn btn-accent" style="display: inline-block; float: right;">Add</button>
            </footer>
            <script>
                const pageSubmitBtn = document.getElementById('addPageSubmit');
                pageSubmitBtn.addEventListener('click', (e) => {
                    document.getElementById('addPageForm').submit();
                });
            </script>
        </div>
    </div>
</div>