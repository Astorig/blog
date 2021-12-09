
<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Добавить комментарий
    </h3>

    @include('layout.errors')

    <div class="mb-3">
        <label for="inputComment" class="form-label">Комментарий</label>
        <textarea name="body" class="form-control" id="inputComment" placeholder="Введите комментарий">

        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
</div>
