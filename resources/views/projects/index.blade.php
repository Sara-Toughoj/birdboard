<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="/projects/create">
                New Project
            </a>
            <div class="flex">
                @forelse($projects as $project)
                    <div class="bg-white mr-4 rounded-lg shadow-lg w-1/3 p-4 h-50">
                        <div class="text-xl mb-4 py-4">
                            {{Str::limit($project->title ,50)}}
                        </div>
                        <div class="mb-3 text-gray-400">
                            {{Str::limit($project->description , 100)}}
                        </div>
                    </div>
                @empty
                    <div>
                        No Projects Yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
