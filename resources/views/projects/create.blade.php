<h1>
    Create a Project
</h1>
<div>
    <form action="/projects" method="post">
        @csrf
        <div>
            <input name="title"/>
        </div>
        <div>
            <textarea name="description"></textarea>
        </div>
        <button type="submit"> Submit</button>
    </form>
</div>
