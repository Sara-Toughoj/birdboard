<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                            <a href="/projects"> cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
